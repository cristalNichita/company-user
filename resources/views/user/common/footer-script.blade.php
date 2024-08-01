<div class="modal fade drawer-backdrop" tabindex="-1" role="dialog" aria-labelledby="passwordModalLabel" aria-hidden="true" id="check_master_password">
    <div class="modal-content max-w-[700px] top-5 lg:top-[15%]">
        <div class="modal-step step-1">
            <div class="modal-header p-3">
                <h3 class="modal-title text-1.5xl p-2" id="passwordModalLabel">Master Password confirmation</h3>
            </div>
            <hr>
            <div class="modal-body grid gap-5 px-0 py-5">
                <div class="flex flex-col px-5 gap-2.5">
                    <div class="flex flex-center">
                        <label class="text-gray-600  text-2sm">
                            This action is protected. To continue, please re-enter your master password to verify your identity.
                        </label>
                    </div>
                        <div class="input max-w-full font-normal" data-toggle-password="true">
                            <input id="password-confirm-modal-input" placeholder="Enter your master-password" type="password"/>
                            <div class="btn btn-icon" data-toggle-password-trigger="true">
                                <i class="ki-outline ki-eye toggle-password-active:hidden">
                                </i>
                                <i class="ki-outline ki-eye-slash hidden toggle-password-active:block">
                                </i>
                            </div>
                        </div>
                </div>
                <div class="flex px-5 gap-4 justify-end">
                    <button class="btn btn-light text-center close-modal">Cancel</button>
                    <button class="btn btn-primary confirm-password">
                        Ok
                    </button>
                </div>
            </div>
        </div>
        <div class="modal-step step-2 hidden">
            <div class="modal-header p-3">
                <h3 class="modal-title text-1.5xl p-2">MFA Confirmation</h3>
            </div>
            <hr>
            <div class="modal-body grid gap-5 px-0 py-5">
                <div class="flex flex-col px-5 gap-2.5">
                    <label class="text-gray-600 text-2sm">
                        To proceed, this action requires MFA verification. Please choose how you want to authenticate your identity.
                    </label>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-5 lg:gap-7.5 px-5">
                        <label class="card p-5 lg:p-7.5 lg:pt-7 cursor-pointer has-[:checked]:border-primary has-[:checked]:bg-op-primary has-[:checked]:text-primary">
                            <input type="radio" style="display: none" name="mfa_select" value="passkey">
                            <div class="flex flex-col gap-4">
                                <div class="flex items-center justify-between gap-2">
                                    <i class="ki-filled ki-fingerprint-scanning text-2xl link">
                                    </i>
                                </div>
                                <div class="flex flex-col gap-3">
                                    <span class="text-base font-semibold leading-none text-gray-900 hover:text-primary-active">
                                        Passkey
                                    </span>
                                    <span class="text-2sm font-medium text-gray-600 leading-5">
                                        Authenticate using your personal passkey for secure access.
                                    </span>
                                </div>
                            </div>
                        </label>
                        <label class="card p-5 lg:p-7.5 lg:pt-7 cursor-pointer has-[:checked]:border-primary has-[:checked]:bg-op-primary has-[:checked]:text-primary">
                            <input type="radio" style="display: none" name="mfa_select" value="sms_otp">
                            <div class="flex flex-col gap-4">
                                <div class="flex items-center justify-between gap-2">
                                    <i class="ki-filled ki-phone text-2xl link">
                                    </i>
                                </div>
                                <div class="flex flex-col gap-3">
                                    <span class="text-base font-semibold leading-none text-gray-900 hover:text-primary-active">
                                        Email/Mobile OTP
                                    </span>
                                    <span class="text-2sm font-medium text-gray-600 leading-5">
                                        A one-time password will be sent to your email or mobile.
                                    </span>
                                </div>
                            </div>
                        </label>
                    <label class="card p-5 lg:p-7.5 lg:pt-7 cursor-pointer has-[:checked]:border-primary has-[:checked]:bg-op-primary has-[:checked]:text-primary">
                        <input type="radio" style="display: none" name="mfa_select" value="mfa_app">
                        <div class="flex flex-col gap-4">
                            <div class="flex items-center justify-between gap-2">
                                <i class="ki-filled ki-security-user text-2xl link">
                                </i>
                            </div>
                            <div class="flex flex-col gap-3">
                                <span class="text-base font-semibold leading-none text-gray-900 hover:text-primary-active">
                                    Auth App
                                </span>
                                <span class="text-2sm font-medium text-gray-600 leading-5">
                                    Generate a code using your authentication app (e.g. Google Authenticator).
                                </span>
                            </div>
                        </div>
                    </label>
                </div>
                <div class="flex px-5 gap-4 justify-end">
                    <button class="btn btn-light text-center close-modal">Cancel</button>
                    <button type="button" class="btn btn-primary choose-mfa-btn">
                        Ok
                    </button>
                </div>
            </div>
        </div>
        <div class="modal-step step-3 auth-app hidden">
            <div class="modal-header p-3">
                <h3 class="modal-title text-1.5xl p-2">Authentication App</h3>
            </div>
            <hr>
            <div class="modal-body grid gap-5 px-0 py-5">
                <div class="flex flex-col px-5 gap-2.5">
                    <label class="text-gray-600 font-semibold text-2sm">
                        Please enter the six digit code generated from your authentication app.
                    </label>
                    <label class="input">
                        <input id="auth-app-input" type="text" placeholder="123456" name="auth_code"/>
                    </label>
                </div>
                <div class="flex px-5 gap-4 justify-end">
                    <button class="btn btn-light text-center close-modal">Cancel</button>
                    <button type="button" class="btn btn-primary confirm-auth-code">
                        Ok
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


<button class="side-nav"></button>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script type="text/javascript" src="{{ url('assets/js/jquery-3.2.1.min.js?v=1') }}"></script>
<script type="text/javascript" src="{{ url('assets/js/jquery.validate.min.js?v=1') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script type="text/javascript" src="{{ url('assets/js/form-validation.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.8/dist/clipboard.min.js"></script>
<script type="text/javascript" src="{{ url('assets/js/common.js') }}"></script>
<script src="https://cdn.anychart.com/releases/8.11.1/js/anychart-base.min.js?hcode=a0c21fc77e1449cc86299c5faa067dc4">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script src="https://cdn.anychart.com/releases/v8/js/anychart-circular-gauge.min.js"></script>
<script src="{{ url('js/all.min.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/js/web-authn-helper.js') }}"></script>

<script src="{{ asset('assets/js/core.bundle.js') }}"></script>
<script src="{{ asset('assets/js/apexcharts.min.js') }}"></script>

@yield('js')

<script>
    var APP_URL = "{{ env('APP_URL') }}";

    function copy(auth, text) {
        const $temp = $('<textarea>');
        $('body').append($temp);

        $temp.val(text).select();

        document.execCommand('copy');

        $temp.remove();
    }

    function showStep(step) {
        $('.modal-step').hide();
        $('.' + step).show();
    }

    $(document).ready(function() {
        let formSubmit;

        $('.save-changes').click(function() {
            formSubmit = $(this).closest('form');
            $('#check_master_password').attr('data-action', 'submit');
            $('#check_master_password').show();
            showStep('step-1');
        });

        $('.open-edit-modal').click(function() {
            $('#check_master_password').attr('data-action', 'edit');
            $('#check_master_password').attr('data-id', $(this).data('id'));
            $('#check_master_password').show();
            $('#check_master_password').attr('data-mfa', $(this).attr('data-mfa'));

            if ($(this).attr('data-password') == 1) {
                showStep('step-1');
            } else {
                if ($(this).attr('data-mfa') == 1) {
                    showStep('step-2');
                } else {
                    editPassword();
                }
            }
        })

        $('.open-2fa-modal').click(function() {
            $('#check_master_password').attr('data-action', 'two-factor');
            $('#check_master_password').attr('data-type', $(this).attr('data-type'));
            $('#check_master_password').show();
            showStep('step-1');
        });

        $('.mfa-method').change(function() {
            if($(this).val() === 'email' || $(this).val() === 'sms') {
                $('.delivery-method-container').show();
            } else {
                $('.delivery-method-container').hide();
            }
        });

        $('.confirm-password').click(function() {
            let password = $('#password-confirm-modal-input').val();

            if (password) {
                $.ajax({
                    url: '{{ route('checkUserPassword') }}',
                    type: 'POST',
                    data: {
                        password: password,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        if (response.success) {
                            let action = $('#check_master_password').attr('data-action');

                            if (action === 'submit') {
                                if (response.mfa_auth) {
                                    showStep('step-2');
                                } else {
                                    formSubmit.submit();
                                }
                            } else if (action === 'edit') {
                                let mfaRequired = $('#check_master_password').attr('data-mfa');
                                console.log(mfaRequired);
                                if (response.mfa_auth && mfaRequired == 1) {
                                    showStep('step-2');
                                } else {
                                    editPassword();
                                }
                            } else if (action === 'two-factor') {
                                if (response.mfa_auth) {
                                    showStep('step-2');
                                } else {
                                    create2FAModal();
                                }
                            }
                        } else {
                            console.log('error');
                        }
                    }
                })
            } else {
                alert('Please enter your password');
            }
        });

        $('.choose-mfa-btn').click(function() {
            let selectedMfa = $('input[name="mfa_select"]:checked').val();

            if (selectedMfa === 'mfa_app') {
                showStep('auth-app');
            } else {
                alert('Select');
            }
        });

        $('.confirm-auth-code').click(function() {
            let value = $('#auth-app-input').val();
            let action = $('#check_master_password').attr('data-action');

            if (value) {
                $.ajax({
                    url: '{{ route('verifyOtpApp') }}',
                    type: 'POST',
                    data: {
                        auth_code: value,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            if (action === 'submit') {
                                formSubmit.submit();
                            } else if (action === 'edit') {
                                editPassword();
                            } else if (action === 'two-factor') {
                                create2FAModal();
                            }
                        }
                    }
                })
            } else {
                alert('Please enter your code.')
            }
        });

        $('.close-modal').click(function() {
            let modal = $(this).closest('.modal');
            $(modal).hide();
        });

        function editPassword() {
            $.ajax({
                url: '{{ route('getOnePassword') }}',
                type: 'POST',
                data: {
                    id: $('#check_master_password').attr('data-id')
                },
                success: function(response) {
                    if (response.payload) {
                        $('#check_master_password').hide();

                        let editModal = $('#edit_password_modal');
                        $(editModal).show();
                        $(editModal).find('form').attr('action', '/passwords/' + response.payload.id);
                        $(editModal).find('input[name="name"]').val(response.payload.name);
                        $(editModal).find('input[name="account_name"]').val(response.payload.account_name);
                        $(editModal).find('input[name="password"]').val(response.payload.password);
                        $(editModal).find('input[name="url"]').val(response.payload.url);
                        if (response.payload.mfa_required === 1) {
                            $(editModal).find('input[name="mfa_required"]').prop('checked', true);
                        } else {

                            $(editModal).find('input[name="mfa_required"]').prop('checked', false);
                        }
                        if (response.payload.master_password_required === 1) {
                            $(editModal).find('input[name="master_password_required"]').prop('checked', true);
                        } else {
                            $(editModal).find('input[name="master_password_required"]').prop('checked', false);
                        }
                    }
                }
            })
        }
        function create2FAModal() {
            let type = $('#check_master_password').attr('data-type');

            if (type === 'otp_app') {
                if ($('#otp_app_switch').val() === '1') {
                    $.ajax({
                        url: '{{ route('deleteAuthentication') }}',
                        type: 'POST',
                        success: function(response) {
                            toastr.options = {
                                "closeButton": true,
                                // "progressBar": true,
                                preventDuplicates: true,
                                timeOut: 15000,
                                extendedTimeOut: 15000, //Set the timeout to 2 minutes (2 * 60,000 milliseconds)
                            }
                            toastr.success(response.message);
                            $('.modal').hide();
                        }
                    })
                } else {
                    $('#auth_app_modal').show();
                }
            } else {
                $('#auth_mobile_modal').show();
            }
            $('#check_master_password').hide();
        }
    });

    $(document).ready(function() {
        $(".head-nav").click(function() {
            $("body").addClass("panel-open");
        });
        $(".side-nav").click(function() {
            $("body").removeClass("panel-open");
        });
    });

    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });

    $(document).ready(function() {
        $('[data-toggle="popover"]').popover()
    });


    @if (Session::has('success'))
        toastr.options = {
            "closeButton": true,
            // "progressBar": true,
            preventDuplicates: true,
            timeOut: 15000,
            extendedTimeOut: 15000, //Set the timeout to 2 minutes (2 * 60,000 milliseconds)
        }
        toastr.success("{{ session('success') }}");
        {{ Session::forget('success') }}
    @endif

    @if (Session::has('error'))
        toastr.options = {
            "closeButton": true,
            // "progressBar": true,
            preventDuplicates: true,
            timeOut: 15000,
            extendedTimeOut: 15000,
        }
        toastr.error("{{ session('error') }}");
        {{ Session::forget('error') }}
    @endif

    @if (count($errors) > 0)
        toastr.options = {
            "closeButton": true,
            // "progressBar": true,
            preventDuplicates: true,
            timeOut: 15000,
            extendedTimeOut: 15000,
        }
        toastr.error("{{ $errors->first() }}");
    @endif

    @if (Session::has('info'))
        toastr.options = {
            "closeButton": true,
            // "progressBar": true,
            preventDuplicates: true,
            timeOut: 15000,
            extendedTimeOut: 15000,
        }
        toastr.info("{{ session('info') }}");
    @endif

    @if (Session::has('warning'))
        toastr.options = {
            "closeButton": true,
            // "progressBar": true,
            preventDuplicates: true,
            timeOut: 15000,
            extendedTimeOut: 15000,
        }
        toastr.warning("{{ session('warning') }}");
    @endif


    bytesToSize();

    function bytesToSize() {
        var bytes = "{{ Auth::user()->remainingStorage ?? 0 }}";
        if (bytes <= 0) {
            $('.leftStorage').html('0 Bytes');
            return;
        };
        var k = 1024;
        sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'],
            i = Math.floor(Math.log(bytes) / Math.log(k));

        bytes = parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];

        $('.leftStorage').html(bytes);
    }
</script>


{{-- Active Inactive Tabs --}}
<script>
    $(document).ready(function() {
        $('button[data-bs-toggle="tab"]').on('show.bs.tab', function(e) {
            targetId = $(this).attr('data-bs-target');
            localStorage.setItem('activeTab', targetId);
        });
        var activeTab = localStorage.getItem('activeTab');
        if (activeTab) {
            $($('[data-bs-target="' + activeTab + '"]')).tab("show");
        }
    });
    //Remove Active Tab
    $(document).ready(function() {
        $('.remove-active-class-tab').click(function(e) {
            localStorage.removeItem("activeTab");
        });
    });
</script>
