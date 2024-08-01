<!DOCTYPE html>
<html lang="en">

<head>
    @include('common.head')
</head>

<body onunload="deleteAllCookies()">

    <div> @include('common.header') </div>

    <div class="login-page">
        <div class="container">
            <div class="login-box">
                <a href="{{route('home')}}" class="logo d-flex align-items-center justify-content-center w-100 mb-2">
                    <img src="{{url('assets/img/flashx_logo_white.png')}}" alt="" height="68">
                </a>
                <h1 class="better_world_technology mb-4">Resend Verification Link</h1>
                @include('common.flash')
                <form class="form" method="POST" action="{{route('resendVerificationLink')}}">
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
