<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link href="{{ env('WEB_BASE_URL').('assets/img/favicon.png') }}" rel="icon">
<meta name="robots" content="noindex">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="{{ env('WEB_BASE_URL').('front-new/css/bootstrap.min.css') }}" rel="stylesheet" media="screen">
<link rel="stylesheet" href="{{ url('front-new/css/font-awesome.css') }}">
<link rel="stylesheet" href="{{ url('front-new/css/all.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ env('WEB_BASE_URL').('front-new/css/toastr.min.css') }}">
<link rel="stylesheet" href="{{ env('WEB_BASE_URL').('front-new/css/intlTelInput.css') }}" />

@if (request()->is('login') || request()->is('forgot-password') || request()->is('otp/*') || request()->is('register'))
<link rel="stylesheet" href="{{ env('WEB_BASE_URL').('assets/css/style.css') }}">
<link rel="stylesheet" href="{{ env('WEB_BASE_URL').('front-new/css/home.css') }}">
<link rel="stylesheet" href="{{ env('WEB_BASE_URL').('front-new/css/style.css') }}">
@else
<link rel="stylesheet" href="{{ env('WEB_BASE_URL').('front-new/css/style.css') }}">
@endif
@if (request()->is('/'))
<link rel="stylesheet" href="{{ env('WEB_BASE_URL').('front-new/css/home.css') }}">
@endif
@if (request()->is('blog'))
<link rel="stylesheet" href="{{ env('WEB_BASE_URL').('front-new/css/blog.css') }}">
@endif
@if (request()->is('blog/*'))
<link rel="stylesheet" href="{{ env('WEB_BASE_URL').('front-new/css/blog-detail.css') }}">
@endif
@if (request()->is('career'))
<link rel="stylesheet" href="{{ env('WEB_BASE_URL').('front-new/css/career.css') }}" />
@endif
@if (request()->is('pricing'))
<link rel="stylesheet" href="{{ env('WEB_BASE_URL').('front-new/css/pricing.css') }}" />
@endif

@if (request()->is('how-it-works'))
<link rel="stylesheet" href="{{ env('WEB_BASE_URL').('front-new/css/how-it-works.css') }}" />
@endif
@if (request()->is('im-print*'))
<link rel="stylesheet" href="{{ env('WEB_BASE_URL').('front-new/css/Imprint.css') }}" />
@endif
@if (request()->is('conditions'))
<link rel="stylesheet" href="{{ env('WEB_BASE_URL').('front-new/css/conditions.css') }}" />
@endif
@if (request()->is('privacy-policy'))
<link rel="stylesheet" href="{{ env('WEB_BASE_URL').('front-new/css/privacy-policy.css') }}" />
@endif
@if (request()->is('contact-us'))
<link rel="stylesheet" href="{{ env('WEB_BASE_URL').('front-new/css/contact-us.css') }}" />
@endif
@if (request()->is('career/*'))
<link rel="stylesheet" href="{{ env('WEB_BASE_URL').('front-new/css/apply-now.css') }}" />
@endif
@if (request()->is('use-cases'))
<link rel="stylesheet" href="{{ env('WEB_BASE_URL').('front-new/css/use-cases.css') }}" />
@endif
<title>{{ env('APP_NAME') }}</title>
<style>
    /*---------- Custom Toast Design As Per Figma Start------------*/
    #toast-container>div {
        background-color: #595959;
        border-left: 10px solid #A1FF00;
        border-radius: 20px;
        padding: 22px 13px 22px 64px;
        width: 400px;
        box-shadow: 0 0 12px #000 !important;
        opacity: 1;
    }

    .toast-progress {
        background-color: #A1FF00;
    }

    .toast-close-button {
        font-weight: 300;
        color: #ffffff;
    }

    .toast-close-button:hover {
        color: #A1FF00;
        opacity: 1;
    }

    #toast-container>.toast-success {
        background-image: url("data:image/svg+xml,%3Csvg width='35' height='35' viewBox='0 0 39 39' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M13 20.5714L16.8621 24L27 15M37 19.5C37 29.165 29.165 37 19.5 37C9.83502 37 2 29.165 2 19.5C2 9.83502 9.83502 2 19.5 2C29.165 2 37 9.83502 37 19.5Z' stroke='%23A1FF00' stroke-width='2.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E%0A") !important;
    }

    /*----------- Custom Toast Design As Per Figma END--------------*/
    .dark-popup .input-grp {
        position: relative;
    }

    .dark-popup #validation-icon-success,
    .dark-popup #validation-icon-error {
        position: absolute;
        top: 59%;
        transform: translateY(-50%);
        right: 15px;
    }

    .modal {
        backdrop-filter: blur(10px);
    }

    .dark-popup.modal {
        backdrop-filter: blur(5px) brightness(1);
        background-color: rgb(47 47 47 / 50%);
    }

    .dark-popup .modal-content {
        background-color: #000;
    }

    .black-bg {
        background-color: #191919 !important;
    }

    .modal {
        backdrop-filter: blur(5px);
    }

    .modal .modal-header {
        display: block;
    }

    .modal .modal-header h5 {
        font-size: 22px;
        margin-block: 5px;
    }

    .modal .modal-header p {
        font-size: 12px;
        margin-block: 0px;
    }

    .modal .custom-design .input-grp {
        padding: 10px 0;
    }

    .modal .custom-design .input-grp label {
        font-size: 18px;
        margin-bottom: 0;
    }

    .modal .custom-design .input-grp span {
        font-size: 12px;
        margin-bottom: 10px;
    }

    small.small-line {
        font-size: 12px;
    }

    .modal .modal-header {
        border-bottom: 5px solid rgba(255, 255, 255, 0.3);
        padding-bottom: 0px;
    }

    .modal .custom-design .input-grp input {
        border-radius: 5px;
        border: 2px solid rgba(255, 255, 255, 0.30);
        background: linear-gradient(108deg, rgba(255, 255, 255, 0.10) 0%, rgba(255, 255, 255, 0.00) 100%);
        backdrop-filter: blur(100px);
        font-size: 18px;
        padding: 15px 20px;
        line-height: 1;
        outline: none;
        width: 100%;
        color: #fff;
    }

    .error-title {
        margin-top: 10px;
        color: #EA4335;
    }

    .registration-user-profile input::placeholder {
        font-size: 18px;
        line-height: 26px;
        font-weight: 400;
        color: #888;
        opacity: 0.2;
    }

    .custom-design {
        padding: 30px calc(2.25vw + 15px);
    }

    .border-white-btn {
        border: 1px solid #fff;
        border-radius: 5px;
        color: #fff;
        padding: 10px 45px;
        margin-right: 15px;
        font-weight: 600;
        font-size: 16px;
    }

    .small-btn {
        font-size: 16px;
        background-color: #A1FF00;
        border-radius: 4px;
        padding: 10px 45px;
        color: #000;
        border: 2px solid #A1FF00;
        font-weight: 600;
    }

    .small-btn>* {
        margin: 0;
    }

    .input-grp label {
        color: #fff;
        display: block;
    }

    .input-grp span {
        font-weight: 400;
        font-size: 12px;
        line-height: 18px;
        opacity: .7;
        margin-bottom: 8px;
        display: block;
    }

    .save-box {
        margin-top: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    path {
        transition: fill 0.3s ease;
    }

    @media screen and (max-width: 425px) {
        .modal .custom-design .input-grp label {
            font-size: 16px
        }
    }
</style>
