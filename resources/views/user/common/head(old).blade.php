<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="baseUrl" content="{{ url('/') }}">
<meta name="robots" content="noindex">
<link href="{{url('assets/img/favicon.png')}}" rel="icon">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="{{ url('assets/user/css/style.css') }}">
<link rel="stylesheet" href="{{ url('assets/user/css/custom.css') }}">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
@yield('css')
<title>FlashX | @yield('title')</title>
<meta name="csrf-token" content="{{ csrf_token() }}" />

<style>
    .form-control,
    .form-control:focus {
        border-style: solid;
        border-width: 1px;
        border-color: rgba(0, 40, 86, 0.25);
        border-radius: 4px;
        display: block;
        width: 100%;
        padding: 8px 12px;
        font-size: 14px;
        line-height: 1.4;
        color: #333333;
        background-color: rgba(255, 255, 255, 0.15);
        color: inherit;
        outline: none;
    }

    .small-btn {
        font-size: 16px;
        background-color: #A1FF00;
        border-radius: 4px;
        padding: 5px 15px;
        color: #000;
        border: 2px solid #A1FF00;
    }

    .themeColor {
        background: {{ Auth::user()->themeColor ?? ''}}
    }

    .fontColor {
        color: {{ Auth::user()->fontColor ?? '' }}!important
    }

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
</style>
