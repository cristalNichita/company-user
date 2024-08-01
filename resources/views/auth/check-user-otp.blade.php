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

    body {
        background-image: url('./assets/img/login-bg.webp');
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
        padding-top: 20px;
        padding-bottom: 22px;
        border-bottom: 5px solid rgba(255, 255, 255, 0.3);
        display: block;
    }

    .login-box h5 {
        font-size: 22px;
        margin-block: 5px;
        font-weight: 600;
    }

    .login-box small.small-line {
        font-size: 14px;
    }

    .login-box form {
        padding: 64px 80px 40px 80px;
    }

    .login-box .hide-detail svg {
        margin-left: 10px;
    }

    .login-box form .field input.otp-box {
        width: 90px;
        height: 60px;
        border: none;
        border-radius: 5px;
        background-color: hsla(240, 100%, 99%, 0.1);
        text-align: center;
    }

    .login-box form .field .otp-main input {
        font-size: 18px;
    }

    .login-box form .field span:not(.login-box form .field .field-label span) {
        font-size: 14px;
        font-weight: 400;
        opacity: 0.7;
        display: block;
    }

    .login-box .otp-main {
        margin-top: 10px;
        margin-bottom: 15px;
    }

    .login-box .resent-otp-btn {
        display: block;
        text-align: right;
        margin-left: auto;
    }

    .login-box .resent-otp-btn span {
        color: #A1FF00;
        font-size: 16px;
        font-weight: 500;
        margin-right: 15px;
    }

    .login-box .resent-otp-btn a {
        font-size: 16px;
        font-weight: 500;
        color: #A1FF00;
    }

    .login-box .save-box {
        margin-top: 60px;
    }

    .login-box .field .row {
        margin-bottom: 28px;
    }

    .login-box .hide-detail {
        display: flex;
        font-size: 12px;
        font-weight: 400;
        letter-spacing: 4.2px;
        padding-left: 40px;

    }

    .login-box .hide-detail span {
        color: #888C94;
    }

    .login-box .hide-detail.email span {
        letter-spacing: 4.2px;
    }

    .login-box .hide-detail.email {
        letter-spacing: 0.6px;
    }

    .login-box input[type="radio"] {
        display: none;
    }

    .custom_radio {
        margin-bottom: 10px;
        font-weight: 500;
    }

    .login-box [type="radio"]:checked+label,
    .login-box [type="radio"]:not(:checked)+label {
        position: relative;
        padding-left: 40px;
        display: inline-block;

    }

    .login-box [type="radio"]:checked+label:before,
    .login-box [type="radio"]:not(:checked)+label:before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        width: 25px;
        height: 25px;
        border: 1px solid #fff;
        border-radius: 100%;
        background: #000;
    }

    .login-box [type="radio"]:checked+label:after,
    .login-box [type="radio"]:not(:checked)+label:after {
        content: '';
        width: 13px;
        height: 13px;
        background: #A1FF00;
        position: absolute;
        top: 6px;
        left: 6px;
        border-radius: 100%;
        -webkit-transition: all 0.2s ease;
        transition: all 0.2s ease;
    }

    .login-box [type="radio"]:not(:checked)+label:after {
        opacity: 0;
        -webkit-transform: scale(0);
        transform: scale(0);
    }

    .login-box [type="radio"]:checked+label:after {
        opacity: 1;
        -webkit-transform: scale(1);
        transform: scale(1);
    }

    .login-box .resent-otp-btn a:hover {
        color: #1964FF;
    }

    sup.text-danger {
        font-size: 18px;
        top: 0;
        font-weight: 400;
    }


    @media screen and (max-width: 768px) {
        .login-box form .field input.otp-box {
            width: 70px;
        }
    }
</style>

<body onunload="deleteAllCookies()">
    <main></main>

    <div> @include('common.header') </div>

    <div class="login-page">
        <div class="container">
            <div class="login-box ">
                <div class="new-header">
                    <h5 class="new-title text-center" id="registrationModelLabel">Verify OTP</h5>
                    <p class="text-center">
                        <small class="small-line">Please enter the OTP send and verify to authenticate.</small>
                    </p>
                </div>

                <form class="form" method="POST" action="{{route('checkUserOtp')}}"> @csrf
                    <div class="field">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="custom_radio"><input type="radio" id="twoFactorEmail" name="contactMethod"
                                        value="twoFactorEmail" checked="checked" onclick="toggleDiv(true)" />
                                    <label for="twoFactorEmail">Email</label>
                                </div>
                                <div class="hide-detail email"><span>******</span>&nbsp;{{ substr($email, -16) }}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="custom_radio"><input type="radio" id="twoFactorMobileNumber"
                                        name="contactMethod" value="twoFactorMobileNumber" onclick="toggleDiv(true)" />
                                    <label for="twoFactorMobileNumber">Mobile OTP</label>
                                </div>
                                <div class="hide-detail"><span>******</span>&nbsp;{{ substr($number, -4) }}
                                </div>
                            </div>
                        </div>
                        <span>Enter OTP here</span>
                        <div class="otp-main d-flex justify-content-between">
                            <input class="otp-box" name="otp[]" type="text" oninput='digitValidate(this)'
                                onkeyup='tabChange(1)' maxlength=1 required>
                            <input class="otp-box" name="otp[]" type="text" oninput='digitValidate(this)'
                                onkeyup='tabChange(2)' maxlength=1 required>
                            <input class="otp-box" name="otp[]" type="text" oninput='digitValidate(this)'
                                onkeyup='tabChange(3)' maxlength=1 required>
                            <input class="otp-box" name="otp[]" type="text" oninput='digitValidate(this)'
                                onkeyup='tabChange(4)' maxlength=1 required>
                            <input class="otp-box" name="otp[]" type="text" oninput='digitValidate(this)'
                                onkeyup='tabChange(5)' maxlength=1 required>
                            <input class="otp-box" name="otp[]" type="text" oninput='digitValidate(this)'
                                onkeyup='tabChange(6)' maxlength=1 required>
                        </div>
                    </div>
                    <div class="resent-otp-btn" id="targetDiv"><span></span><a id="getOTP" class="general-color"
                            href="#">Get OTP</a></div>
                    <div class="save-box"> <a href="{{route('login')}}" class="submit-btn border-white-btn">CANCEL</a>
                        <button type="submit" class="dark-submit small-btn"
                            style="width: auto; margin-bottom: 0;">SUBMIT</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    @include('common.footer-script')
    <script>
        function toggleDiv(show) {
            var targetDiv = document.getElementById('targetDiv');
            targetDiv.style.display = show ? 'block' : 'none';
        }
    </script>
    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    function getOTP() {
        // Check which radio button is selected
        var contactMethod = document.querySelector('input[name="contactMethod"]:checked');

        if (!contactMethod) {
            alert('Please select a contact method (Email or Mobile Number)');
            return;
        }

        // Get the value of the selected radio button
        var contactValue = contactMethod.value;
        // Make an AJAX request to send the OTP
        $.ajax({
                url: "{{ route('selectedUserTwoFactorOtp') }}",
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    contactValue: contactMethod.value,
                    otp : "{{ $otp }}",
                    email : "{{ $email }}",
                    number : "{{ $number }}"
                },
                dataType: 'JSON',
                success: function(result) {
                    if (result.status == 1) {
                        toastr.success(result.message);
                        return true;
                    }
                    toastr.error(result.message);
                }
            });
    }

    document.getElementById('getOTP').addEventListener('click', getOTP);
    </script>

    <script>
        let digitValidate = function (ele) {
        console.log(ele.value);
        ele.value = ele.value.replace(/[^0-9]/g, '');
    }

    let tabChange = function (val) {
        let ele = document.querySelectorAll('.otp-box');
        if (val < ele.length && ele[val - 1].value !== '') {
            ele[val].focus();
        } else if (val > 1 && ele[val - 1].value === '') {
            ele[val - 2].focus();
        }
    }
    </script>
</body>

</html>
