<!DOCTYPE html>
<html lang="en">

<head>
    @include('common.head')
</head>
<style>
    .login-page {
        min-height: calc(100vh - 208px);
        padding: 0px;
    }

    header {
        border-bottom: 0px;
        background-color: transparent;
    }

    .login-page::before {
        display: none;
    }


    .login-box {
        border-radius: 20px;
        border: 1px solid #A1FF00;
        background: #0F0F0F;
    }

    .new-header {
        padding-top: 30px;
        padding-bottom: 30px;
        border-bottom: 5px solid rgba(255, 255, 255, 0.3);
        display: block;
    }

    .login-box h5 {
        font-size: 22px;
        margin-block: 5px;
        font-weight: 600;
    }

    .login-box form {
        padding: 40px 80px 70px 80px;
    }

    .login-box form .field .field-label {
        font-size: 18px;
        font-weight: 400;
        margin-block: 5px
    }

    .login-box form .field span:not(.login-box form .field .field-label span) {
        font-size: 12px;
        font-weight: 400;
        margin-bottom: 10px;
        display: block;
        opacity: 0.7;
    }

    .login-box form .submit-button {
        margin-top: 70px;
    }

    .login-box form .field input {
        font-size: 18px;
        margin-bottom: 20px;
    }

    .login-box form .forgot-pssword {
        font-size: 16px;
        font-weight: 400;
    }

    /* media css */
    @media screen and (max-width: 1399px) {
        .login-box form {
            padding: 25px 30px;
        }

        .new-header {
            padding-top: 15px;
            padding-bottom: 12px
        }

        .login-box form .submit-button {
            margin-top: 20px
        }

        .login-box form .field .field-label,
        .login-box form .field input {
            font-size: 16px
        }

        .login-box form .forgot-pssword {
            letter-spacing: 0px;
            font-size: 14px;
        }
    }

    @media screen and (max-width: 650px) {
        .login-box form {
            padding: 20px;
        }

        .login-box #passwordIconId {
            margin-bottom: 0px;
        }
    }
</style>

<body onunload="deleteAllCookies()">
    <main></main>
    <div> @include('common.header') </div>

    <div class="login-page">
        <div class="container">
            <div class="login-box">
                <div class="new-header">
                    <h5 class="better_world_technology text-center">Forgot Password</h5>
                </div>
                <form class="form" method="POST" action="{{route('postForgotPassword')}}">
                    @csrf
                    <div class="field">
                        <label for="email" class="field-label">Email Address<span class="text-danger">*</span></label>
                        <input type="email" class="field-input" name="email" id="email" required />
                    </div>
                    <a class="forgot-pssword digital_buisness_heading" href="{{route('login')}}">Back to Login</a>
                    <div class="submit-button">
                        <input type="submit" value="SUBMIT" class="button-custom">
                    </div>
                </form>
            </div>
        </div>
    </div>


    @include('common.footer-script')

    <script>
        var emailpattern = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

    $.validator.addMethod(
        "regex",
        function(value, element, regexp) {
            var re = new RegExp(regexp);
            return this.optional(element) || re.test(value);
        },
        "Please enter a valid email address."
    );
    $(".form").validate({
        rules: {
            email: {
                required: true,
                email: email,
                regex: emailpattern,
            },
        },
        messages: {
            email: {
                required: "Please enter email",
            }
        },
    });
    </script>

</body>

</html>
