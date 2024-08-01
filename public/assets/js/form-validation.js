var emailpattern = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i;

// /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

var baseUrl = $('meta[name="baseUrl"]').attr("content");

$.validator.addMethod(
    "regex",
    function (value, element, regexp) {
        var re = new RegExp(regexp);
        return this.optional(element) || re.test(value);
    },
    "Please enter a valid email address."
);

$(document).on("keypress", ".numeric", function (evt) {
    var charCode = evt.which ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) return false;
    return true;
});

// UPDATE PROFILE VALIDATION
$(".update-profile").validate({
    rules: {
        // email: {
        //     required: true,
        //     regex: emailpattern,
        //     maxlength: 50,
        // },
        firstName: {
            required: true,
            maxlength: 50,
        },
        lastName: {
            required: true,
            maxlength: 50,
        },
        mobileNumber: {
            required: true,
        },
    },
    messages: {
        // email: {
        //     required: "Please enter email",
        // },
        firstName: {
            required: "Please enter first name",
        },
        lastName: {
            required: "Please enter last name",
        },
        mobileNumber: {
            required: "Please enter mobile number",
        },
    },
});

// $(".user-profile").validate({
//     rules: {
//         email: {
//             required: true,
//             regex: emailpattern,
//             maxlength: 50
//         },
//         firstName: {
//             required: true,
//             maxlength: 50
//         },
//         lastName: {
//             required: true,
//             maxlength: 50
//         },
//         password: {
//             required: function (element) {
//                 var action = $("#userId").val();
//                 if (action != "") {
//                     return false;
//                 } else {
//                     return true;
//                 }
//             },
//             maxlength: 15,
//             minlength: 6
//         },
//         confirmPassword: {
//             required: function (element) {
//                 var action = $("#userId").val();
//                 if (action != "") {
//                     return false;
//                 } else {
//                     return true;
//                 }
//             },
//             maxlength: 15,
//             minlength: 6,
//             regex: passwordPatter,
//             equalTo: "#password"
//         },
//         // profilePicture: {
//         //     required: true,
//         //     extension: "jpeg|png|jpg|gif|svg"
//         // }
//     },
//     messages: {
//         email: {
//             required: "Please enter email",
//         },
//         firstName: {
//             required: "Please enter first name",
//         },
//         lastName: {
//             required: "Please enter last name",
//         },
//         password: {
//             required: "Please enter password",
//         },
//         confirmPassword: {
//             required: "Please enter confirm password",
//             regex: "Password must be an including number, upper, lower and one special character"
//         },
//         // profilePicture: {
//         //     required: "Please upload file.",
//         //     extension: "Please upload file in these format only (jpg, jpeg, png, gif, svg)."
//         // }
//     },
// });

// add users validation
$(".user-profile").validate({
    ignore: [],
    rules: {
        email: {
            required: true,
            regex: emailpattern,
            maxlength: 50,
            remote: {
                url: baseUrl + "/check/unique/users/email/id",
                type: "post",
                data: {
                    value: function () {
                        return $("#email").val();
                    },
                    id: function () {
                        return $("#id").val();
                    },
                },
            },
        },
        "employeeId": {
            required: true,
            minlength: 3,
            maxlength: 10,
            remote: {
                url: baseUrl + "/check/unique-employee-id/users/employeeId/id",
                type: "post",
                data: {
                    value: function () {
                        return $("#employeeId").val();
                    },
                    id: function () {
                        return $("#id").val();
                    },
                },
            },
        },
        // "userRole[]": {
        //     required: true,
        //     minlength: 1,
        // },
    },
    messages: {
        email: {
            required: "Please enter email",
            remote: "This email has already available. Please make it different!",
        },
        employeeId: {
            required: "Please enter employee ID",
            remote: "This employee ID has already available. Please make it different!",
        }
        // "userRole[]": {
        //     required: "Please select at least one types of role.",
        //     minlength: "Please select at least one types of role.",
        // },
    },
    errorPlacement: function (error, element) {
        var inputId = element.attr('id');

        const input = document.querySelector('#' + inputId);
        input.addEventListener('input', () => {
            // Add your tracking logic here
            if (inputId == "employeeId") {
                // Display the validation icon when an error occurs
                $('#validation-icon-success').hide();
                $('#validation-icon-error').show();
            }
        });

        if (inputId == "employeeId") {
            // Display the validation icon when an error occurs
            $('#validation-icon-success').hide();
            $('#validation-icon-error').show();
        }
        error.insertAfter(element);
    },
    success: function (label) {

        var labelId = label.attr('id');
        // console.log(inputId);
        if (labelId == "employeeId-error") {
            // Hide the validation icon when the input is valid
            $('#validation-icon-error').hide();
            $('#validation-icon-success').show();
        }
        return false;

    }
});

// edit user role modal validation
$(".edit-user").validate({
    ignore: [],
    rules: {
        // "userRole[]": {
        //     required: true,
        //     minlength: 1,
        // },
        "userName": {
            required: true,
            minlength: 3,
            maxlength: 40,
        },
        "email": {
            required: true,
            regex: emailpattern,
            maxlength: 50,
            remote: {
                url: baseUrl + "/check/unique/users/email/id",
                type: "post",
                data: {
                    value: function () {
                        return $("#edit-email").val();
                    },
                    id: function () {
                        return $("#edit-user-id").val();
                    },
                },
            },
        },
        // "mobileNumber": {
        //     required: true,
        // },
    },
    messages: {
        "userName": {
            required: "Please enter user name",
        },
        "email": {
            required: "Please enter email",
            remote: "This email has already available. Please make it different!",
        },
        // "mobileNumber": {
        //     required: "Please enter mobile number",
        // },
        // "userRole[]": {
        //     required: "Please select at least one types of role.",
        //     minlength: "Please select at least one types of role.",
        // },
    },
});

var passwordPatter =
    /^(?!.* )(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;

// CHANGE PASSWORD VALIDATION
$(".change-password").validate({
    rules: {
        password: {
            required: true,
            minlength: 8,
        },
        newPassword: {
            required: true,
            maxlength: 50,
            minlength: 8,
            regex: passwordPatter,
        },
        confirmPassword: {
            required: true,
            maxlength: 50,
            minlength: 8,
            regex: passwordPatter,
            equalTo: "#newPassword",
        },
    },
    messages: {
        password: {
            required: "Please enter old password",
        },
        newPassword: {
            required: "Please enter new password",
            regex: "Password must be an including number, upper, lower and one special character",
        },
        confirmPassword: {
            required: "Please enter confirm password",
            regex: "Password must be an including number, upper, lower and one special character",
        },
    },
});

// UPLOAD CLOUD FILE VALIDATION
$(".upload-cloud-file").validate({
    ignore: [],
    rules: {
        title: {
            required: true,
        },
        accessKey: {
            required: "#input-file-name:blank",
        },
        fileName: {
            required: "#accessKey:blank",
        },
    },
    messages: {
        title: {
            required: "Please enter title",
        },
        accessKey: {
            required: "Please enter key",
        },
        fileName: {
            required: "Please upload key",
        },
    },
});

// Add Password Form Validation
// $(".add-password").validate({
//     // ignore: [],
//     rules: {
//         platform: {
//             required: true,
//             minlength: 3,
//             maxlength: 100
//         },
//         title: {
//             required: true,
//             minlength: 3,
//             maxlength: 100
//         },
//         accountUrl: {
//             required: true,
//         },
//         faviconUrl: {
//             required: true,
//         },
//         accountId: {
//             required: true,
//             minlength: 3,
//             maxlength: 100,
//             remote: {
//                 url: baseUrl + "/check/unique-account/platform_accounts/accountId/platform",
//                 type: "post",
//                 data: {
//                     value: function () {
//                         return $("#accountId").val();
//                     },
//                     id: function () {
//                         return $("#platform").val();
//                     },
//                 },
//             },
//         },
//         password: {
//             required: true,
//             minlength: 6,
//             maxlength: 16
//         },
//     },
//     messages: {
//         platform: {
//             required: "Please enter platform",
//         },
//         title: {
//             required: "Please enter title",
//         },
//         accountUrl: {
//             required: "Please enter website url",
//         },
//         faviconUrl: {
//             required: "Please enter platform favicon url",
//         },
//         accountId: {
//             required: "Please enter account user id",
//             remote: "This account user id has already available. Please make it different!",
//         },
//         password: {
//             required: "Please enter password",
//         },
//     },
// });

$("#pFeaturesValue").rules("add", {
    required: true,
    messages: {
        required: "Required input",
    },
});

$(".updatePlan").validate({
    rules: {
        planName: {
            required: true,
            maxlength: 50,
        },
        description: {
            required: true,
            maxlength: 1000,
        },
        price: {
            required: true,
            max: 22,
            min: 11,
        },
        type: {
            required: true,
        },
        members: {
            required: true,
            max: 22,
            min: 11,
        },
        storage: {
            required: true,
            max: 22,
            min: 11,
        },
        storageType: {
            required: true,
        },
    },
    messages: {
        planName: {
            required: "Please enter planName",
        },
        description: {
            required: "Please enter description",
        },
        price: {
            required: "Please enter price",
        },
        type: {
            required: "Please enter type",
        },
        members: {
            required: "Please enter members ss",
        },
        storage: {
            required: "Please enter storage",
        },
        storageType: {
            required: "Please enter storageType",
        },
    },
});


