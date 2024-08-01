<!DOCTYPE html>
<html lang="en">

<head>
    @section('title', 'Reset Password')
    @include('user.common.head')

    <style>
        .login-page {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-box {
            border-radius: 20px;
            border: 1px solid #A1FF00;
            background: #0F0F0F;
            margin: 0 auto;
            max-width: 800px;
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
            color: #FFF
        }

        .login-box form {
            padding: 50px 80px 50px 80px;
        }

        .login-box form .field {
            position: relative;
        }

        .field-input {
            margin-bottom: 0px;
            border-style: solid;
            border-width: 1px;
            border-color: rgba(0, 40, 86, 0.25);
            border-radius: 4px;
            display: block;
            width: 100%;
            height: 38px;
            padding: 8px 12px;
            font-size: 14px;
            line-height: 1.42857143;
            color: #333333;
            vertical-align: middle;
            background-color: rgba(255, 255, 255, 0.15);
            color: #fff;
            margin-bottom: 10px;
        }

        .field-label {
            font-size: 16px;
            font-weight: 300;
            display: block;
            margin-bottom: 0px;
            color: #FFF;
        }

        .login-box form .field .field-label {
            font-size: 18px;
            font-weight: 400;
            margin-block: 5px
        }

        .login-box form .field input {
            font-size: 18px;
            padding: 16px;
            margin-bottom: 20px;
            background-color: hsla(240, 100%, 99%, 0.1);
            outline: none;
            color: hsla(240, 100%, 99%, 0.7);
            line-height: 1.3;
            height: auto;
        }

        .password-field a {
            position: absolute;
            bottom: 13px;
            right: 15px;
            z-index: 99;
            color: #fff;
        }

        .button-custom {
            padding: 20px 40px;
            width: 100%;
            margin: 40px auto 0;
            line-height: 0;
            border: 0;
            background: none;
            font-size: 16px;
            background: #A1FF00;
            transition: 0.3s;
            border-radius: 4px;
            color: black;
            display: block;
            box-shadow: #a1ff00 0px 0px 15px;
        }

        .login-box form .button-custom {
            font-size: 16px;
            padding: 15px;
            box-shadow: none;
            margin-top: 30px;
            height: 50px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        @media screen and (max-width: 1399px) {
            .login-box {
                max-width: 650px;
            }

            .new-header {
                padding-top: 15px;
                padding-bottom: 12px;
            }

            .login-box form {
                padding: 25px 30px;
            }

            .login-box form .field .field-label,
            .login-box form .field input {
                font-size: 16px;
            }

            .login-box form .field input {
                padding: 12px;
            }
        }
    </style>

</head>

<body>

    <section class="login-page">
        <div class="container">
            <div class="logo-parent text-center mb-4">
                <a href="{{route('home')}}">
                    <img src="{{asset('assets/user/images/logo.png')}}" alt="">
                </a>
            </div>
            <div class="login-box">
                <div class="new-header">
                    <h5 class="text-center">Reset Password</h5>
                </div>
                <form class="form" method="post" action="{{route('resetPassword')}}">
                    @csrf
                    <input type="hidden" value="{{$info->email}}" name="email">
                    <input type="hidden" value="{{$info->token}}" name="token">

                    <div class="field password-field">
                        <label class="field-label">Password<sup class="text-danger">*</sup></label>
                        <input type="password" placeholder="Enter your password" name="password" id="password"
                            class="field-input" required>
                        <a href="javascript:void(0)" class="btn-design"
                            onclick="showPassword('password', 'passwordIconIdN')"><span id="passwordIconIdN"><i
                                    class="fa fa-eye-slash"></i></span></a>
                    </div>
                    <div class="field password-field">
                        <label class="field-label">Confirm Password<sup class="text-danger">*</sup></label>
                        <input type="password" placeholder="Enter your confirm password" name="confirmPassword"
                            id="confirmPassword" class="field-input" required>
                        <a href="javascript:void(0)" class="btn-design"
                            onclick="showPassword('confirmPassword', 'confirmationPasswordIconId')"><span
                                id="confirmationPasswordIconId"><i class="fa fa-eye-slash"></i></span></a>
                    </div>
                    <button class="submit button-custom" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </section>

    @include('user.common.footer-script')

    <script>
        function showPassword(inputId, iconId) {
            var passwordInput = document.getElementById(inputId);
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                $('#' + iconId).find('i').removeClass("fa fa-eye-slash").addClass("fa fa-eye");
            } else {
                passwordInput.type = "password";
                $('#' + iconId).find('i').removeClass("fa fa-eye").addClass("fa fa-eye-slash");
            }
        }

        var emailpattern =
          /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

        $.validator.addMethod(
            "regex",
            function(value, element, regexp) {
                var re = new RegExp(regexp);
                return this.optional(element) || re.test(value);
            },
            "Please enter a valid email address."
        );
        var passwordPatter =/^(?!.* )(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{10,}$/;

        $(".form").validate({
            rules: {

                password: {
                    required: true,
                    maxlength:50,
                    minlength:10,
                    regex: passwordPatter
                },
                confirmPassword: {
                    required: true,
                    maxlength:50,
                    minlength:10,
                    regex: passwordPatter,
                    equalTo : "#password"
                }
            },
            messages: {
                password: {
                    required: "Please enter password",
                    regex:"Password must be an including number, upper, lower and one special character"
                },
                confirmPassword: {
                    required: "Please enter confirm password",
                    regex:"Password must be an including number, upper, lower and one special character"
                },
            },
        });
    </script>
</body>

</html>
