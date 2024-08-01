
// ================================================= COMMON CODE ======================================================

var page = 2;
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
$('#load-more').click(function(){
    let url = $(this).attr("data-url")+"?page="+page;
    $.ajax({
        url: url,
            success: function(result){
                if(result){
                    if(result.data.includes('Record not found')){
                        $("#load-more").hide();
                    } else {
                        page++;
                        $("#table-body").append(result.data);
                        if(!result.hasMore){
                            $("#load-more").hide();
                        }
                    }
                } else {
                    $("#load-more").hide();
                }
            }
        });
});

//================================================== DASHBOARD CODE ============================================
// bytesToSize();
// function bytesToSize() {
//     var bytes = $('#fileSize').html();
//     var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
//     if (bytes == 0) return '0 Byte';
//     var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
//     bytes = Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
//     $('#fileSize').html(bytes);
//  }


 // ============================================== CLOUD CODE ==================================================

$('#cloud-file-table').on('change', '.private-box', function() {
    var info = JSON.parse($(this).attr("data-info"));

        if(info.privacyStatus == 0){
             // CHANGE TO PRIVATE STATUS
            getRandomString(20)
            var statusstr ="Private encryption Key : " + $('#status-input-private-key').val();
            createDownloadLink("#status-download-text",statusstr,"privatekey.txt");
            $('#status-input-id').val(info.id);
            $('#privacyStatus').modal('show');
            return
        } else {
             // CHANGE TO PUBLIC STATUS
            $('#input-privacy-id').val(info.id);
            $('#publicStatus').modal('show');
        }
});


$('#cloud-file-table').on('click', '.cloud-file-delete', function() {
    $('#delete-id').val($(this).attr("data-id"));
    $('#deleteCloudFile').modal('show');
});

$('#user-table').on('click', '.user-delete', function() {
    $('#delete-user-id').val($(this).attr("data-id"));
    $('#userDelete').modal('show');
});

// delete accessKey from view
$('#accessKeyDiv').on('click', '.accessKey-delete', function() {
    $('#delete-cloud-id').val($(this).attr("data-id"));
    $('#cloudDelete').modal('show');
});

// delete accessKey from modal
$('#viewDetailsModal').on('click', '.modal-accessKey-delete', function() {
    $('#delete-cloud-id').val($(this).attr("data-id"));
    $('#cloudDelete').modal('show');
});

$('#role-table').on('click', '.role-delete', function() {
    $('#delete-role-id').val($(this).attr("data-id"));
    $('#roleDelete').modal('show');
});

$('#user-table').on('click', '.user-edit', function() {
    var info = JSON.parse($(this).attr("data-info"));
    $('#userId').val(info.id);
    $('#firstName').val(info.firstName);
    $('#lastName').val(info.lastName);
    $('#email').val(info.email);
    // $('#profilePicture').val(info.profilePicture);

    $('#userModel').modal('show');
});

$('#user-table').on('click', '.user-view', function() {
    var info = JSON.parse($(this).attr("data-info"));
    $('#userId').val(info.id);
    $('#firstName').val(info.firstName);
    $('#lastName').val(info.lastName);
    $('#email').val(info.email);
});

//Manage-Group-Edit
$('#group-table').on('click', '.group-edit', function() {
    var info = JSON.parse($(this).attr("data-info"));
    console.log(info.getGroupMemberDetails);
    $('#userId').val(info.id);
    $('#groupName').val(info.groupName);
    $('#multiple').val([info.getGroupMemberDetails]);
    $('#groupModelLabel').text('Edit Group');
    $('#email').val(info.email);

    $('#groupModel').modal('show');
});

$('#group-table').on('click', '.group-delete', function() {
    $('#delete-group-id').val($(this).attr("data-id"));
    $('#groupDelete').modal('show');
});


//Manage-Application-Edit
$('#application-table').on('click', '.application-edit', function() {
    var info = JSON.parse($(this).attr("data-info"));
    $('#userId').val(info.id);
    $('#applicationName').val(info.applicationName);
    $('#applicationModelLabel').text('Edit Application');
    $('#applicationModel').modal('show');
});

$('#application-table').on('click', '.application-delete', function() {
    $('#delete-application-id').val($(this).attr("data-id"));
    $('#applicationDelete').modal('show');
});

function privateStatus(){
    //CHANGE TO PRIVATE STATUS
    var id = $('#status-input-id').val();
    var key = $('#status-input-private-key').val();
    changeStatus(id,key);
}

function publicStatus(){
    var id = $('#input-privacy-id').val();
    var key = $('#input-privacy-key').val();
    if(key == ""){
        $('#privacy-error').html('Please enter privacy key');
        return
    }
    changeStatus(id,key);
}

function changeStatus(id,privacyKey){
    $.ajax({
        url:    'cloud/change-status',
        type: 'POST',
        data: {_token: CSRF_TOKEN, id:id, privacyKey:privacyKey},
        dataType: 'JSON',
        success: function (data) {
            if(data.status == 'success'){
                $('#privacyStatus').modal('hide');
                $('#publicStatus').modal('hide');
                $('#'+id).attr('data-info',JSON.stringify(data.data));
                toastr.success(data.message);
            } else {
                toastr.error(data.message);
            }
        }
    });
}

$('#user-table').on('change', '.user-status', function() {
    var info = JSON.parse($(this).attr("data-info"));
    $.ajax({
        url:    'members/change-status',
        type: 'POST',
        data: {_token: CSRF_TOKEN, id:info.id},
        dataType: 'JSON',
        success: function (data) {
            if(data.status == 'success'){
                $('#privacyStatus').modal('hide');
                $('#publicStatus').modal('hide');
                $('#'+id).attr('data-info',JSON.stringify(data.data));
                toastr.success(data.message);
            } else {
                toastr.error(data.message);
            }
        }
    });

});

$('#role-table').on('change', '.role-status', function() {
    var info = JSON.parse($(this).attr("data-info"));
    $.ajax({
        url:    'custom-role/change-status',
        type: 'POST',
        data: {_token: CSRF_TOKEN, id:info.id},
        dataType: 'JSON',
        success: function (data) {
            if(data.status == 'success'){
                $('#privacyStatus').modal('hide');
                $('#publicStatus').modal('hide');
                $('#'+id).attr('data-info',JSON.stringify(data.data));
                toastr.success(data.message);
            } else {
                toastr.error(data.message);
            }
        }
    });

});

var clipboard = new ClipboardJS('.btn');
function getRandomString(length) {

    var randomChars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var result = '';
    for ( var i = 0; i < length; i++ ) {
        result += randomChars.charAt(Math.floor(Math.random() * randomChars.length));
    }
    $('#private-key').html(result);
    $('#input-private-key').val(result);
    $('#status-private-key').html(result);
    $('#status-input-private-key').val(result);
}

function privateFunction(){
    $('#private-key-section').show();
    getRandomString(20)
    $('#copy-text').html('Copy Key');

    var str ="Private Key : " + $('#input-private-key').val();
    createDownloadLink("#download-text",str,"privatekey.txt");
}

function publicFunction(){
    $('#private-key-section').hide();
    $('#private-key').html();
    $('#input-private-key').val();
}
function downloadFile(){
    createDownloadLink("#private-key-7aaeb99a-8d6f-4b1c-9e59-17422bcd3cbf","KISHAN","privatekey.txt")
}

function changeText(){
    $('#copy-text').html('Copied Key');
    $('#status-copy-text').html('Copied Key');
}
var blobObject = null;

function createDownloadLink(anchorSelector,str, fileName){
	if(window.navigator.msSaveOrOpenBlob) {
		var fileData = [str];
		blobObject = new Blob(fileData);
		$(anchorSelector).click(function(){
			window.navigator.msSaveOrOpenBlob(blobObject, fileName);
		});
	} else {
		var url = "data:text/plain;charset=utf-8," + encodeURIComponent(str);
		$(anchorSelector).attr("href", url);
	}
}




//     document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {
//             const dropZoneElement = inputElement.closest(".drop-zone");

//             dropZoneElement.addEventListener("click", (e) => {
//                 inputElement.click();
//             });

//             inputElement.addEventListener("change", (e) => {
//                 if (inputElement.files.length) {
//                     updateThumbnail(dropZoneElement, inputElement.files[0]);
//                 }
//             });

//             dropZoneElement.addEventListener("dragover", (e) => {
//                 e.preventDefault();
//                 dropZoneElement.classList.add("drop-zone--over");
//             });

//             ["dragleave", "dragend"].forEach((type) => {
//                 dropZoneElement.addEventListener(type, (e) => {
//                     dropZoneElement.classList.remove("drop-zone--over");
//                 });
//             });

//             dropZoneElement.addEventListener("drop", (e) => {
//                 e.preventDefault();

//                 if (e.dataTransfer.files.length) {

//                     inputElement.files = e.dataTransfer.files;
//                     updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
//                 }

//                 dropZoneElement.classList.remove("drop-zone--over");
//             });
//         });

//         /**
//          * Updates the thumbnail on a drop zone element.
//          *
//          * @param {HTMLElement} dropZoneElement
//          * @param {File} file
//          */
//         function updateThumbnail(dropZoneElement, file) {
//             if(file.size >= 268435456){
//                 $("#max_file_validation").html("File size is too big, please upload other file");
//                 return
//             }
//             let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");

//         // First time - remove the prompt
//         if (dropZoneElement.querySelector(".drop-zone__prompt")) {
//             dropZoneElement.querySelector(".drop-zone__prompt").remove();
//         }

//         // First time - there is no thumbnail element, so lets create it
//         if (!thumbnailElement) {
//             thumbnailElement = document.createElement("div");
//             thumbnailElement.classList.add("drop-zone__thumb");
//             dropZoneElement.appendChild(thumbnailElement);
//         }

//         thumbnailElement.dataset.label = file.name;

//         // Show thumbnail for image files
//         if (file.type.startsWith("image/")) {
//             const reader = new FileReader();

//             reader.readAsDataURL(file);
//             reader.onload = () => {
//                 thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
//             };
//         } else {
//             thumbnailElement.style.backgroundImage = null;
//         }

//         uploadFileUsingAjax(file);
//         }


//  function uploadFileUsingAjax(file){
//     var form_data = new FormData(); // Creating object of FormData class
//         form_data.append("cloudFile", file) // Appending parameter named file with properties of file_field to form_data
//         form_data.append("_token", CSRF_TOKEN)
//         $.ajax({
//             xhr: function() {
//                 var xhr = new window.XMLHttpRequest();
//                 xhr.upload.addEventListener("progress", function(evt) {
//                     if (evt.lengthComputable) {
//                         var percentComplete = ((evt.loaded / evt.total) * 90);
//                         $(".progress-bar").width(percentComplete + '%');
//                         $(".progress-bar").html(percentComplete+'%');
//                     }
//                 }, false);
//                 return xhr;
//             },
//             type: 'POST',
//             url: 'cloud/ajax-upload-file',
//             data: form_data,
//             contentType: false,
//             cache: false,
//             processData:false,
//             beforeSend: function(){
//                 $(".progress-bar").width('0%');
//             },
//             success: function(resp){
//                 if(resp.status == 'success'){
//                     $('#upload-file').prop('disabled', false)
//                     $(".progress-bar").width(100 + '%');
//                     $(".progress-bar").html(100+'%');
//                     $('#input-file-name').val(resp.fileName);
//                     $('#input-file-size').val(resp.fileSize);
//                     $("#max_file_validation").html("");
//                 } else {
//                     $(".progress-bar").width(0 + '%');
//                     $(".progress-bar").html(0+'%');
//                     $("#max_file_validation").html(resp.message);
//                 }
//             }
//         });
//  }


 // ================================================= TRASH CODE =====================================================


$('#trash-table').on('click', '.delete-file', function() {
    $('#delete-id').val($(this).attr("data-id"));
    $('#hardDeleteCloudFile').modal('show');
});

