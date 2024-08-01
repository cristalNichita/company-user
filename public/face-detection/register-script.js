const video = document.getElementById('video')
const captureButton = document.getElementById("capture");
const canvas = document.getElementById("canvas");
const ctx = canvas.getContext("2d");

function startCamera() {
  Promise.all([
    faceapi.nets.tinyFaceDetector.loadFromUri('./face-detection/models'),
    faceapi.nets.faceLandmark68Net.loadFromUri('./face-detection/models'),
    faceapi.nets.faceRecognitionNet.loadFromUri('./face-detection/models'),
    faceapi.nets.faceExpressionNet.loadFromUri('./face-detection/models')
  ]).then(startVideo)


//   function startVideo() {
//     navigator.getUserMedia(
//       { video: {} },
//       stream => video.srcObject = stream,
//       err => console.error(err)
//     )
//   }

  function startVideo() {
    navigator.mediaDevices.getUserMedia({ video: true })
    .then(stream => video.srcObject = stream)
    .catch(err => console.error(err));
  }


  video.addEventListener('play', () => {
    const canvas = faceapi.createCanvasFromMedia(video)
    //document.body.append(canvas)
    document.getElementById("canvas-body").append(canvas);
    const displaySize = { width: video.width, height: video.height }
    faceapi.matchDimensions(canvas, displaySize)
    setInterval(async () => {
      const detections = await faceapi.detectAllFaces(video, new faceapi.TinyFaceDetectorOptions()).withFaceLandmarks().withFaceExpressions()
      const resizedDetections = faceapi.resizeResults(detections, displaySize)
      canvas.getContext('2d').clearRect(0, 0, canvas.width, canvas.height)
       if (detections.length > 0 && detections[0].detection.score >= 0.9) {
           capturePhoto();
       }
      faceapi.draw.drawDetections(canvas, resizedDetections)
      faceapi.draw.drawFaceLandmarks(canvas, resizedDetections)
      faceapi.draw.drawFaceExpressions(canvas, resizedDetections)
    }, 1000)
  })

  setTimeout(function () {
    $("#capture").removeClass('d-none');
    $("#face-id-submit").removeClass("d-none");
  }, 5000);
}

captureButton.addEventListener('click', () => {
  // Capture a frame from the video and draw it on the canvas
  ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
  const imageDataURL = canvas.toDataURL('image/jpeg');
  $("#image").val(imageDataURL);
});

let apiCall1 = 1;
function capturePhoto() {
  ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
    const imageDataURL = canvas.toDataURL("image/jpeg");
    $("#image").val(imageDataURL);
  if (apiCall1 == 1) {
      setTimeout(() => {
        $("#face-id-submit").click();
         apiCall1 = 0;
      }, 2000);
    }
}
