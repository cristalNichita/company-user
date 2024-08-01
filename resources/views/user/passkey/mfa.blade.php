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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">

<link rel="stylesheet" href="{{ url('assets/user/css/access-keys.css') }}">
<style>
    div.top-border {
        font-size: 1.5em;
        padding: 20px;
        border-top-width: 7px;
        border-top-style: solid;
        border-top-color: #A1FF00;
        border-radius: 20px 20px 20px 20px;
    }

    .gen-bordered-password-box {
        border: 1px solid hsla(82, 100%, 50%, 1);
        border-radius: 15px;
    }

    .view-password-btn {
        font-size: 14px;
        background-color: #A1FF00;
        border-radius: 4px;
        padding: 2px 15px;
        color: #000;
        border: 2px solid #A1FF00;
    }

    .view-password-details-btn {
        font-size: 14px;
        border-radius: 4px;
        padding: 5px 15px;
        color: #A1FF00;
        border: 1px solid transparent;
    }

    .passkey-box-head {
        color: #FFF
    }
</style>

<div class="content-panel">

    <div class="content-view-box access-keys-list">
        <div class="inner-box">
            <div class="gen-box">
                <div class="box-small-title">Passkey</div>
                <div class="img-box">
                    <img src="{{url('assets/img/passkey.svg')}}" />
                </div>
                <div class="button-box">
                    <a href="javascript:void(0);" onclick="validate.a()" class="filled-btn">Authenticate</a>
                    <a href="javascript:void(0);" class="normal-btn">Learn More</a>
                </div>
            </div>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="{{ url('assets/js/jquery-3.2.1.min.js?v=1') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.8/dist/clipboard.min.js"></script>
    <script type="text/javascript" src="{{ url('assets/js/common.js') }}"></script>
    <script src="{{ url('js/all.min.js') }}"></script>


    <script type="text/javascript" src="{{ url('assets/js/web-authn-helper.js') }}"></script>

    <script>
        var APP_URL = "{{ env('APP_URL') }}";
    </script>
