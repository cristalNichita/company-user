@extends('user.layouts.front')
@section('title', 'Contact Us')
@section('css')
<style>
    .input-box {
        border: 2px solid rgba(255, 255, 255, 0.2);
        padding: 30px;
        display: flex;
        align-items: center;
        margin-top: 24px;
    }

    .contact-box {
        max-width: 1450px;
        margin: 0 auto;
        width: 100%;
        background: #333333;
        padding: 80px 150px;
    }

    .input-box {
        border: 2px solid rgba(255, 255, 255, 0.2);
        padding: 30px;
        display: flex;
        align-items: center;
        margin-top: 24px;
    }

    .input-box svg {
        margin-right: 20px;
        min-width: 35px;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }

    .input-box div:not(.phone-box):not(.usage-box) {
        flex: 1;
    }

    .input-box select {
        border: none;
        color: #FFF;
        background: transparent;
        font-weight: 500;
        font-size: 20px;
        line-height: 30px;
        letter-spacing: 0.035em;
    }

    .input-box select:focus {
        border: none;
        outline: none;
    }

    .input-box select option {
        color: #000;
    }

    .input-box input {
        box-sizing: border-box;
        width: 100%;
        height: 30px;
        border: none;
        background: transparent;
        resize: none;
        outline: none;
        letter-spacing: 0.035em;
        color: #FFFFFF;
        font-weight: 500;
        font-size: 20px;
        line-height: 30px;
    }

    .input-box input:focus,
    .input-box input:valid,
    .input-box input:invalid {
        transform: translate(0, .5em);
        transition-duration: .2s;
    }

    .input-box input:focus+label[placeholder]:before {
        /* color: #00bafa; */
    }

    .input-box input::placeholder {
        opacity: 0;
    }

    .input-box input:focus+label[placeholder]:before,
    .input-box input:valid:not(:placeholder-shown)+label[placeholder]:before,
    .input-box input:invalid:not(:placeholder-shown):not(:focus)+label[placeholder]:before {
        transition-duration: .2s;
        transform: translate(2px, -1.1em);
        font-size: 14px;
    }


    .input-box input+label[placeholder] {
        display: block;
        pointer-events: none;
        line-height: 30px;
        margin-top: calc(-30px);
        margin-bottom: 0;
    }

    .input-box input+label[placeholder]:before {
        content: attr(placeholder);
        display: inline-block;
        padding: 0;
        color: rgba(255, 255, 255, 0.3);
        white-space: nowrap;
        transition: 0.3s ease-in-out;
        font-size: 20px;
    }

    .input-box .phone-box {
        position: relative;
        padding-right: 17px;
        margin-right: 17px;
    }

    .input-box .phone-box::before {
        content: '';
        position: absolute;
        right: 0;
        top: -30px;
        height: 270%;
        width: 2px;
        border-right: 2px solid rgba(255, 255, 255, 0.2);
    }

    .input-box .usage-box {
        position: relative;
        padding-left: 17px;
        margin-left: 17px;
    }

    .input-box .usage-box::before {
        content: '';
        position: absolute;
        left: 0;
        top: -32px;
        height: 313%;
        width: 2px;
        border-left: 2px solid rgba(255, 255, 255, 0.2);
    }

    .input-box textarea {
        width: 100%;
        border: none;
        background: transparent;
        resize: none;
        color: #FFF;
        font-size: 20px;
    }

    .input-box textarea:focus {
        outline: none;
        border: none;
    }

    .contact-box button {
        min-width: 250px;
        max-width: 250px;
        width: 100%;
        margin: 40px auto;
        display: block;
    }
</style>
@endsection
@section('content')
<div class="content-panel">
    <div class="top-panel">
        <div class="left-side">
            <button class="head-nav">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px">
                    <path d="M0 0h24v24H0V0z" fill="none" />
                    <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z" />
                </svg>
            </button>
            <h3>Contact Us</h3>
        </div>
        <div class="right-side">
            @include('user.common.profileView')
        </div>
    </div>
    <div class="content-view-box">
        <div class="contact-box p-5">
            @include('common.flash')
            <form class="form user-contact-us-form" method="post" action="{{route('createScheduleUser')}}">
                <input type="hidden" name="userId" value="{{ $user->id }}">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="input-box">
                            <svg width="35" height="35" viewBox="0 0 35 35" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M17.4963 22.1296C11.2065 22.1296 5.83398 23.1212 5.83398 27.0879C5.83398 31.056 11.1729 32.0827 17.4963 32.0827C23.7861 32.0827 29.1586 31.0925 29.1586 27.1244C29.1586 23.1562 23.8211 22.1296 17.4963 22.1296Z"
                                    fill="white" />
                                <path opacity="0.4"
                                    d="M17.4968 18.3512C21.7814 18.3512 25.2143 14.9168 25.2143 10.6337C25.2143 6.35057 21.7814 2.9162 17.4968 2.9162C13.2137 2.9162 9.7793 6.35057 9.7793 10.6337C9.7793 14.9168 13.2137 18.3512 17.4968 18.3512Z"
                                    fill="white" />
                            </svg>
                            <div>
                                <input type="text" required="" name="yourName" id="yourName" placeholder='Your Name*'
                                    value="{{ $user->userName }}" />
                                <label placeholder='Your Name*'></label>
                            </div>
                        </div>
                        <label id="yourName-error" style="display:none" class="error" for="yourName"></label>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-box">
                            <svg width="35" height="35" viewBox="0 0 35 35" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_1331_1101)">
                                    <path d="M7.84375 9.81403H13.1904V12.0589H7.84375V9.81403Z" fill="white"
                                        fill-opacity="0.4" />
                                    <path d="M7.84375 14.9187H13.1904V17.1636H7.84375V14.9187Z" fill="white"
                                        fill-opacity="0.4" />
                                    <path d="M7.84375 20.0233H13.1904V22.2682H7.84375V20.0233Z" fill="white"
                                        fill-opacity="0.4" />
                                    <path d="M7.84375 25.1281H13.1904V27.3729H7.84375V25.1281Z" fill="white"
                                        fill-opacity="0.4" />
                                    <path
                                        d="M32.6218 30.362V10.882C32.6218 10.2689 32.1101 9.76039 31.4987 9.75949L17.5331 9.77579C16.914 9.77654 16.4126 10.2788 16.4126 10.8982V30.3619H4.6218V8.15076L16.4126 4.97885V7.52719H18.6562V3.51475C18.6562 2.78858 17.9449 2.24204 17.2431 2.4308L3.20871 6.20624C2.71878 6.33809 2.37821 6.78254 2.37821 7.29019V30.362H0V32.6069H35V30.362H32.6218ZM27.1561 25.2029V27.2981H21.8095V25.2029H27.1561ZM21.8095 22.1934V20.0982H27.1561V22.1934H21.8095ZM27.1561 17.0887H21.8095V14.9935H27.1561V17.0887Z"
                                        fill="white" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_1331_1101">
                                        <rect width="35" height="35" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                            <div>
                                <input type="text" required="" name="companyName" id="companyName"
                                    value="{{ $user->companyName }}" placeholder='Company Name*' />
                                <label placeholder='Company Name*'></label>
                            </div>
                        </div>
                        <label id="companyName-error" style="display:none" class="error" for="companyName"></label>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-box">
                            <svg width="35" height="35" viewBox="0 0 35 35" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.4"
                                    d="M32.0827 23.2461C32.0827 27.3148 28.816 30.6107 24.7473 30.6253H24.7327H10.2806C6.22643 30.6253 2.91602 27.344 2.91602 23.2753V23.2607C2.91602 23.2607 2.92477 16.8061 2.93643 13.5598C2.93789 12.9503 3.63789 12.609 4.11477 12.9882C7.57977 15.7371 13.7762 20.7494 13.8535 20.8151C14.8889 21.6448 16.2014 22.113 17.5431 22.113C18.8848 22.113 20.1973 21.6448 21.2327 20.799C21.31 20.748 27.3679 15.8859 30.8854 13.0917C31.3637 12.7111 32.0666 13.0523 32.0681 13.6605C32.0827 16.8819 32.0827 23.2461 32.0827 23.2461Z"
                                    fill="white" />
                                <path
                                    d="M31.3193 8.27397C30.0564 5.89397 27.5714 4.37439 24.8355 4.37439H10.2814C7.54553 4.37439 5.06053 5.89397 3.79762 8.27397C3.5147 8.80626 3.64887 9.46981 4.11991 9.84606L14.948 18.5071C15.7064 19.1196 16.6251 19.4244 17.5439 19.4244C17.5497 19.4244 17.5541 19.4244 17.5584 19.4244C17.5628 19.4244 17.5687 19.4244 17.573 19.4244C18.4918 19.4244 19.4105 19.1196 20.1689 18.5071L30.997 9.84606C31.468 9.46981 31.6022 8.80626 31.3193 8.27397Z"
                                    fill="white" />
                            </svg>
                            <div>
                                <input type="email" required="" name="email" id="email" placeholder='Email ID*'
                                    value="{{ $user->email }}" />
                                <label placeholder='Email ID*'></label>
                            </div>
                        </div>
                        <label id="email-error" style="display:none" class="error" for="email"></label>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-box">
                            <div class="phone-box">
                                <svg width="35" height="35" viewBox="0 0 35 35" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g opacity="0.4">
                                        <path
                                            d="M21.0263 8.00616C20.3321 7.87792 19.6945 8.32095 19.5623 8.99861C19.4302 9.67627 19.8746 10.3379 20.5499 10.4705C22.5832 10.8669 24.1532 12.4408 24.5512 14.4811C24.6645 15.0684 25.1815 15.4969 25.777 15.4969C25.8568 15.4969 25.9367 15.4896 26.0181 15.475C26.6934 15.3395 27.1378 14.6793 27.0057 14.0002C26.4116 10.9529 24.0661 8.5993 21.0263 8.00616Z"
                                            fill="white" />
                                        <path
                                            d="M20.9355 2.92825C20.6101 2.88162 20.2833 2.9778 20.0234 3.18474C19.7561 3.3946 19.5891 3.69772 19.5528 4.03728C19.4758 4.72368 19.9711 5.34451 20.6566 5.42175C25.384 5.9493 29.0585 9.63198 29.59 14.3741C29.6612 15.0095 30.1942 15.489 30.8304 15.489C30.8783 15.489 30.9248 15.4861 30.9727 15.4803C31.3053 15.4438 31.6016 15.2791 31.8107 15.0168C32.0184 14.7545 32.1128 14.4281 32.075 14.0943C31.4128 8.17756 26.8335 3.58551 20.9355 2.92825Z"
                                            fill="white" />
                                    </g>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M16.0873 18.9181C21.9047 24.7339 23.2244 18.0056 26.9284 21.707C30.4993 25.2769 32.5517 25.9922 28.0274 30.5152C27.4607 30.9707 23.86 36.45 11.2061 23.7995C-1.44947 11.1475 4.02666 7.54315 4.48222 6.97659C9.01749 2.44103 9.7204 4.50535 13.2913 8.07527C16.9953 11.7782 10.2699 13.1023 16.0873 18.9181Z"
                                        fill="white" />
                                </svg>
                                <select id="countryCode" name="countryCode">
                                    <option value="+91" selected> +91 </option>
                                    @foreach ($countryCodes as $key => $countryCode)
                                    <option value="{{ $countryCode['code'] }}"> {{ $countryCode['code'] ?? '' }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <input type="text" required="" value="{{ $user->mobileNumber ?? "" }}"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                    name="contactNumber" id="contactNumber" placeholder='Phone No.*' />
                                <label placeholder='Phone No.*'></label>
                            </div>
                        </div>
                        <label id="contactNumber-error" style="display:none" class="error" for="contactNumber"></label>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-box">
                            <svg width="35" height="35" viewBox="0 0 35 35" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M17.4268 21.204C12.3955 21.204 8.15039 22.0262 8.15039 25.1991C8.15039 28.3734 12.423 29.1666 17.4268 29.1666C22.458 29.1666 26.7031 28.3445 26.7031 25.1716C26.7031 21.9973 22.4306 21.204 17.4268 21.204Z"
                                    fill="white" />
                                <path opacity="0.4"
                                    d="M17.4257 18.1811C20.8325 18.1811 23.5642 15.4336 23.5642 12.0072C23.5642 8.57945 20.8325 5.83331 17.4257 5.83331C14.0188 5.83331 11.2871 8.57945 11.2871 12.0072C11.2871 15.4336 14.0188 18.1811 17.4257 18.1811Z"
                                    fill="white" />
                                <path opacity="0.4"
                                    d="M30.7537 13.4447C31.6351 9.97757 29.0509 6.86371 25.7603 6.86371C25.4025 6.86371 25.0604 6.90311 24.7261 6.97009C24.6817 6.98059 24.6321 7.00292 24.606 7.04232C24.5759 7.09222 24.5981 7.1592 24.6308 7.20254C25.6193 8.59728 26.1873 10.2954 26.1873 12.1183C26.1873 13.865 25.6663 15.4935 24.7522 16.8449C24.6582 16.9841 24.7418 17.1719 24.9076 17.2008C25.1374 17.2415 25.3725 17.2625 25.6127 17.2691C28.0089 17.3321 30.1595 15.7811 30.7537 13.4447Z"
                                    fill="white" />
                                <path
                                    d="M33.2642 21.608C32.8255 20.6677 31.7665 20.0229 30.1564 19.7064C29.3964 19.5199 27.3398 19.2572 25.4268 19.2927C25.3981 19.2966 25.3824 19.3163 25.3798 19.3294C25.3759 19.3478 25.3837 19.3794 25.4216 19.3991C26.3056 19.839 29.7229 21.7525 29.2933 25.7883C29.275 25.963 29.4147 26.114 29.5884 26.0877C30.4293 25.9669 32.593 25.4994 33.2642 24.0429C33.6351 23.2733 33.6351 22.379 33.2642 21.608Z"
                                    fill="white" />
                                <path opacity="0.4"
                                    d="M10.2752 6.97051C9.94223 6.90222 9.59881 6.86414 9.24102 6.86414C5.95041 6.86414 3.36624 9.978 4.24896 13.4451C4.84179 15.7815 6.99244 17.3325 9.38857 17.2695C9.62884 17.2629 9.86519 17.2406 10.0937 17.2012C10.2595 17.1723 10.3431 16.9845 10.2491 16.8453C9.33504 15.4926 8.81402 13.8654 8.81402 12.1187C8.81402 10.2945 9.38335 8.59639 10.3718 7.20297C10.4032 7.15963 10.4267 7.09265 10.3953 7.04275C10.3692 7.00203 10.3209 6.98102 10.2752 6.97051Z"
                                    fill="white" />
                                <path
                                    d="M4.84459 19.706C3.23454 20.0225 2.17685 20.6673 1.7381 21.6076C1.36595 22.3785 1.36595 23.2729 1.7381 24.0438C2.40928 25.499 4.57298 25.9678 5.41391 26.0873C5.58758 26.1136 5.726 25.9639 5.70772 25.7879C5.27811 21.7534 8.69538 19.8399 9.58071 19.4C9.61727 19.3789 9.6251 19.3487 9.62119 19.329C9.61858 19.3159 9.60421 19.2962 9.57548 19.2936C7.66119 19.2568 5.60587 19.5195 4.84459 19.706Z"
                                    fill="white" />
                            </svg>
                            <div>
                                <input type="number" name="employeeStrength" id="employeeStrength"
                                    value="{{ $user->employeeStrength }}" placeholder='Employee Strength' />
                                <label placeholder='Employee Strength'></label>
                            </div>
                        </div>
                        <label id="employeeStrength-error" style="display:none" class="error"
                            for="employeeStrength"></label>
                    </div>

                    <div class="col-lg-6">
                        <div class="input-box">
                            <svg width="35" height="35" viewBox="0 0 35 35" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M14.8054 8.10183C14.8797 8.25301 14.9288 8.41491 14.9507 8.58134L15.3568 14.6187L15.5584 17.6533C15.5604 17.9653 15.6094 18.2754 15.7037 18.5734C15.9471 19.1517 16.5327 19.5192 17.1698 19.4936L26.8784 18.8585C27.2988 18.8516 27.7048 19.0088 28.007 19.2956C28.2588 19.5346 28.4214 19.8473 28.4727 20.1836L28.4899 20.3878C28.0881 25.9509 24.0023 30.591 18.4507 31.7888C12.8991 32.9865 7.20623 30.4563 4.46288 25.5717C3.672 24.1527 3.17801 22.5929 3.00991 20.9839C2.93968 20.5077 2.90876 20.0266 2.91744 19.5454C2.90877 13.5811 7.15608 8.42475 13.1015 7.18168C13.8171 7.07026 14.5186 7.44907 14.8054 8.10183Z"
                                    fill="white" />
                                <path opacity="0.4"
                                    d="M18.7675 2.91788C25.4174 3.08706 31.0063 7.86888 32.0821 14.3096L32.0718 14.3571L32.0425 14.4263L32.0466 14.616C32.0313 14.8673 31.9343 15.1091 31.7671 15.3045C31.5929 15.508 31.3549 15.6465 31.0928 15.7003L30.9329 15.7222L19.7318 16.448C19.3592 16.4847 18.9882 16.3646 18.7112 16.1175C18.4803 15.9115 18.3326 15.6335 18.2909 15.3339L17.5391 4.14907C17.526 4.11125 17.526 4.07025 17.5391 4.03243C17.5494 3.72413 17.6851 3.4327 17.9159 3.22327C18.1468 3.01384 18.4535 2.90385 18.7675 2.91788Z"
                                    fill="white" />
                            </svg>
                            <div>
                                <input type="number" name="usageConsumption" id="usageConsumption"
                                    placeholder='Approx. usage' />
                                <label placeholder='Approx. usage'></label>
                            </div>
                            <div class="usage-box">
                                <select id="usageConsumptionFormat" name="usageConsumptionFormat">
                                    <option value="MB" selected> MB </option>
                                    @foreach ($usageConsumptionFormats as $format)
                                    <option value="{{ $format }}"> {{ $format }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <label id="usageConsumption-error" style="display:none" class="error"
                            for="usageConsumption"></label>
                    </div>

                    <div class="col-lg-12">
                        <div class="input-box">
                            <textarea name="description" id="description" minlength="3" maxlength="500" cols="30"
                                rows="2" placeholder="Enter your message here"></textarea>
                        </div>
                        <label id="description-error" style="display:none" class="error" for="description">Please enter
                            description</label>
                    </div>
                </div>
                <div class="d-flex text-center">
                    <button type="button" class="btn cancel-btn">
                        <a href="{{ route('dashboardPage') }}"> Cancel</a></button>
                    <button type="submit" class="btn primary-btn" data-bs-toggle="modal"
                        data-bs-target="#success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ url('admin-assets/js/jquery.validate.min.js') }}"></script>
<script>
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
        $(".user-contact-us-form").validate({
            rules: {
                yourName: {
                    required: true,
                    maxlength:100
                },
                companyName: {
                    required: true,
                    maxlength:100
                },
                employeeStrength: {
                    required: true,
                    maxlength:10
                },
                usageConsumption: {
                    required: true,
                    maxlength:50
                },
                usageConsumptionFormat: {
                    required: true,
                    maxlength:5
                },
                email: {
                    required: true,
                    email: email,
                    regex: emailpattern,
                    maxlength:50
                },
                countryCode: {
                    required:true,
                    maxlength:3,
                },
                contactNumber: {
                    required: true,
                    maxlength:16,
                    minlength:6,
                },
                description: {
                    required: true,
                },
            },
            messages: {
                yourName: {
                    required: "Please enter your name",
                },
                companyName: {
                    required: "Please enter company name",
                },
                employeeStrength: {
                    required: "Please enter employee strength",
                },
                usageConsumption: {
                    required: "Please enter usage consumption",
                },
                usageConsumptionFormat: {
                    required: "Please enter usage consumption format",
                },
                email: {
                    required: "Please enter email",
                },
                countryCode: {
                    required: "Please enter contry code",
                },
                contactNumber: {
                    required: "Please enter contact number",
                },
                description: {
                    required: "Please enter description",
                },
            },
        });
</script>
@endsection
