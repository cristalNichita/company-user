const video = document.getElementById('video')
const captureButton = document.getElementById("capture");
const canvas = document.getElementById("canvas");
const ctx = canvas.getContext("2d");
let getStream;

function startCamera() {
    Promise.all([
        faceapi.nets.tinyFaceDetector.loadFromUri('./face-detection/models'),
        faceapi.nets.faceLandmark68Net.loadFromUri('./face-detection/models'),
        faceapi.nets.faceRecognitionNet.loadFromUri('./face-detection/models'),
        faceapi.nets.faceExpressionNet.loadFromUri('./face-detection/models')
    ]).then(startVideo)

    // function startVideo() {
    //     navigator.getUserMedia(
    //         { video: {} },
    //         stream => { video.srcObject = stream, getStream = stream },
    //         err => console.error(err)
    //     )
    //     // console.log(mediaStream)
    // }

    function startVideo() {
        navigator.mediaDevices.getUserMedia({ video: true })
        .then(stream => {
            video.srcObject = stream;
            getStream = stream;  // Assuming getStream is a variable declared elsewhere in your code
          })
        .catch(err => console.error(err));
      }



    let detectionInterval;
    video.addEventListener('play', () => {
        const canvas = faceapi.createCanvasFromMedia(video)
        //document.body.append(canvas)
        document.getElementById("canvas-body").append(canvas);
        const displaySize = { width: video.width, height: video.height }
        faceapi.matchDimensions(canvas, displaySize)
        setInterval(async () => {
            const detections = await faceapi.detectAllFaces(video, new faceapi.TinyFaceDetectorOptions()).withFaceLandmarks().withFaceExpressions()
            const resizedDetections = faceapi.resizeResults(detections, displaySize)
            // if (detections.length > 0 && detections[0].detection.score >= 0.8) {
            //     // Capture photo or perform any action
            //     capturePhoto();
            //     // clearInterval(detectionInterval);
            // }
            canvas.getContext('2d').clearRect(0, 0, canvas.width, canvas.height)
            faceapi.draw.drawDetections(canvas, resizedDetections)
            faceapi.draw.drawFaceLandmarks(canvas, resizedDetections)
            faceapi.draw.drawFaceExpressions(canvas, resizedDetections)
        }, 1000)
    })
}
captureButton.addEventListener('click', () => {
    // Capture a frame from the video and draw it on the canvas
    ctx.drawImage(video, 0, 0, canvas.width, canvas.height);

    // Convert the canvas image to a data URL
    const imageDataURL = canvas.toDataURL('image/jpeg');
    $("#image").val(imageDataURL);
    //faceAuthentication();
    //   console.log(imageDataURL)
    // You can now send the captured image data (imageDataURL) to your PHP server for processing or storage.
    // Example: Send the data using an XMLHttpRequest or fetch.
    // Send imageDataURL to PHP using AJAX or another method of your choice.
});
let apiCall = 1;
function stopCamera() {
    // console.log(getStream)
    if (getStream) {
        getStream.getTracks().forEach(track => track.stop());
    }
}
function capturePhoto() {
    // Capture a frame from the video and draw it on the canvas
    ctx.drawImage(video, 0, 0, canvas.width, canvas.height);

    // Convert the canvas image to a data URL
    const imageDataURL = canvas.toDataURL('image/jpeg');
    $("#image").val(imageDataURL);
    if (apiCall == 1) {
        faceAuthentication();
        apiCall = 0;
    }

}
