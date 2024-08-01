<!doctype html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }} | Sign In</title>
    <link rel="stylesheet" href="{{ asset('assets/css/apexcharts.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/keenicons/styles.bundle.css') }}">

    <link href="{{ asset('admin-assets/node_modules/toast-master/css/jquery.toast.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ env('WEB_BASE_URL').('front-new/css/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ env('WEB_BASE_URL').('front-new/css/intlTelInput.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
</head>
<body class="flex h-full">
<div class="flex items-center justify-center grow bg-center bg-no-repeat page-bg">
    <div class="card max-w-[370px] w-full">
        <form action="{{ route('postLogin') }}" class="card-body flex flex-col gap-5 p-10 form" id="sign_in_form" method="post">
            @csrf
            <div class="text-center">
                <h3 class="text-lg font-semibold text-gray-900 leading-none mb-2.5">Sign in</h3>
                <div class="flex items-center justify-center font-medium">
                    <span class="text-2sm text-gray-600 me-1.5">Need an account?</span>
                    <a class="text-2sm link" href="{{ route('register') }}">Sign up</a>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <span class="border-t border-gray-200 w-full">
                </span>
                <span class="text-2xs text-gray-500 font-medium uppercase">Or</span>
                <span class="border-t border-gray-200 w-full"></span>
            </div>
            <div class="flex flex-col gap-1">
                <label class="form-label text-gray-900">
                    Email
                </label>
                <input class="input" placeholder="email@email.com" type="text" name="email"/>
            </div>
            <div class="flex flex-col gap-1">
                <div class="flex items-center justify-between gap-1">
                    <label class="form-label text-gray-900">Password</label>
                    <a class="text-2sm link shrink-0"
                       href="{{ route('forgotPassword') }}">
                        Forgot Password?
                    </a>
                </div>
                <label class="input" data-toggle-password="true">
                    <input name="password" placeholder="Enter Password" type="password"/>
                    <div class="btn btn-icon" data-toggle-password-trigger="true">
                        <i class="ki-filled ki-eye text-gray-500 toggle-password-active:hidden">
                        </i>
                        <i class="ki-filled ki-eye-slash text-gray-500 hidden toggle-password-active:block">
                        </i>
                    </div>
                </label>
            </div>
            <label class="checkbox-group">
                <input class="checkbox checkbox-sm" name="check" type="checkbox" value="1"/>
                <span class="checkbox-label">
                    Remember me
                </span>
            </label>
            <button class="btn btn-primary flex justify-center grow">
                Sign In
            </button>
        </form>
    </div>
</div>
<script src="{{ asset('assets/js/core.bundle.js') }}"></script>
<script src="{{ asset('assets/js/apexcharts.min.js') }}"></script>

@include('common.footer-script')
<script>


    $(".form").validate({
        rules: {
            email: {
                required: true,
                maxlength:60
            },
            password: {
                required: true,
                maxlength:16,
                minlength:8
            },
        },
        messages: {
            email: {
                required: "Please enter user id/email",
            },
            password: {
                required: "Please enter password",
            },
        },
    });
</script>
</body>
</html>
