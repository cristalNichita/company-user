@extends('user.layouts.front')
@section('title', 'MFA')

@section('css')
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

    /* Passkey Loader Css */
    .loading {
        z-index: 9999;
        position: absolute;
        top: 0;
        left: -5px;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.8);
    }

    .loading-content {
        position: absolute;
        width: 80px;
        height: 80px;
        top: 40%;
        left: 50%;
    }
</style>
@endsection
@section('content')
<section id="loading">
    <div id="loading-content">
        <img src="{{ url('images/Loader2.gif') }}" alt="Loading">
    </div>
</section>
<div class="content-panel">
    <div class="top-panel">
        <div class="left-side">
            <button class="head-nav">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px">
                    <path d="M0 0h24v24H0V0z" fill="none" />
                    <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z" />
                </svg>
            </button>
            <h3>MFA</h3>
        </div>
        <div class="right-side">
            @include('user.common.profileView')
        </div>
    </div>
    <div class="content-view-box installed-passkey-box">
        <div class="inner-box">
            <div class="full-box">
                <div class="box-small-title">Installed MFA</div>
                <div class="box-sub-title">Lorem ipsum dolor sit amet consectetur. Dolor ornare maecenas arcu nunc vitae
                    pretium ac amet nec. Potenti viverra elit lectus. Lorem ipsum dolor sit amet consectetur. Dolor
                    ornare maecenas arcu nunc vitae pretium ac amet nec. Potenti viverra elit lectus.</div>
            </div>
            <div class="left-box gen-box">
                <div class="img-box">
                    <img src="{{url('assets/img/fingerprint-icon.svg')}}" />
                    <svg xmlns="http://www.w3.org/2000/svg" width="55" height="55" viewBox="0 0 55 55" fill="none">
                        <circle cx="27.5" cy="27.5" r="27.5" fill="#00C54F" />
                        <path d="M17 29.2857L23.069 35L39 20" stroke="white" stroke-width="4" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </div>
                <div class="inline-btn-box">
                    <a href="javascript:void(0);"><svg width="29" height="32" viewBox="0 0 29 32" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14.335 5.36889C14.98 9.54246 18.34 12.7331 22.51 13.1565M1 31H28M16.39 3.17613L4.07496 16.3168C3.60996 16.8159 3.15996 17.7988 3.06996 18.4792L2.51496 23.3786C2.31996 25.1479 3.57996 26.3576 5.31996 26.0552L10.15 25.2235C10.825 25.1025 11.77 24.6035 12.235 24.0894L24.55 10.9487C26.68 8.68041 27.64 6.09461 24.325 2.93419C21.025 -0.195995 18.52 0.907885 16.39 3.17613Z"
                                stroke="#A1FF00" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg></a>
                    <a href="javascript:void(0);" class="modal-passkey-delete" data-id='{{ $user->id }}'><svg width="29"
                            height="32" viewBox="0 0 29 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M28 6.96997C23.005 6.47497 17.98 6.21997 12.97 6.21997C10 6.21997 7.03 6.36997 4.06 6.66997L1 6.96997M9.25 5.455L9.58 3.49C9.82 2.065 10 1 12.535 1H16.465C19 1 19.195 2.125 19.42 3.505L19.75 5.455M24.775 11.7098L23.8 26.8148C23.635 29.1698 23.5 30.9998 19.315 30.9998H9.68504C5.50004 30.9998 5.36504 29.1698 5.20004 26.8148L4.22504 11.7098M11.995 22.75H16.99M10.75 16.75H18.25"
                                stroke="#FA4D4D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg></a>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur. Dolor ornare maecenas arcu nunc vitae pretium ac amet nec.
                    Potenti viverra elit lectus.</p>
                <div class="button-box">
                    <a href="javascript:void(0);" class="normal-btn">Learn More</a>
                </div>
            </div>
        </div>
        <div class="text-center bg-dark p-3">
            <span>You have installed MFA already!</span>
        </div>
    </div>

    {{-- delete modal --}}
    <div class="modal fade dark-popup" id="passKeyDelete" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-hidden="true" aria-labelledby="passKeyDeleteLabel">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('passkey.destroy', ['passkey'=> $user->id]) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <input type="hidden" id="delete-pass-id" name="id">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="passKeyDeleteLabel">Delete</h5>
                    </div>
                    <div class="modal-body">
                        <h5 class="text-center">Are you sure you want to delete this MFA?</h5>
                        <div class="button-parent text-center mt-4">
                            <button type="button" class="btn upload-bordered small-btn" data-bs-dismiss="modal"
                                aria-label="Close">Cancel</button>
                            <button type="submit" id="submit" class="btn upload small-btn" onclick="#">Delete</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @endsection

    @section('js')
    <script>
        function showLoading() {
            document.querySelector('#loading').classList.add('loading');
            document.querySelector('#loading-content').classList.add('loading-content');
        }

        function hideLoading() {
            document.querySelector('#loading').classList.remove('loading');
            document.querySelector('#loading-content').classList.remove('loading-content');
        }

        //Box drop-down delete
        $('.modal-passkey-delete').on('click', function() {
            var id = $(this).attr("data-id");
            var validText = 'Delete-Modal';
            showLoading();
            validate.a(id, validText);
        });

        var validate = {
                a: (id, validText) => {
                    // Replace 'yourID' with the actual ID you want to pass
                    var yourId = id;
                    var validText = validText;

                    // Store the 'yourId' in localStorage
                    localStorage.setItem('yourId', yourId);
                    localStorage.setItem('validText', validText);

                    helper.ajax(APP_URL + "webauthnvalid", {
                        phase: "a",
                        id: yourId
                    }, async (res) => {
                        try {
                            res = JSON.parse(res);
                            helper.bta(res);

                            // Pass 'yourId' to the b function
                            validate.b(await navigator.credentials.get(res, { userVerification: 'required' }));
                        } catch (e) {
                            hideLoading();
                            console.error(e);
                            if (e instanceof DOMException) {
                                // Show a Toastr error message for the specific DOMException
                                toastr.error(e.message);
                            } else {
                                // Handle other types of errors or rethrow if needed
                                toastr.error(res);
                                // throw e;
                            }
                        }
                    });
                },

                b: (cred) => {
                    // Retrieve 'yourId' from localStorage

                    helper.ajax(APP_URL + "webauthnvalid", {
                        phase: "b",
                        id: cred.rawId ? helper.atb(cred.rawId) : null,
                        client: cred.response.clientDataJSON ? helper.atb(cred.response.clientDataJSON) : null,
                        auth: cred.response.authenticatorData ? helper.atb(cred.response.authenticatorData) : null,
                        sig: cred.response.signature ? helper.atb(cred.response.signature) : null,
                        user: cred.response.userHandle ? helper.atb(cred.response.userHandle) : null
                    }, res => {
                        hideLoading();
                        toastr.success(res)

                        var validText = localStorage.getItem('validText');
                        var yourId = localStorage.getItem('yourId');

                        if (validText == 'Delete-Modal') {
                            $('#delete-pass-id').val(yourId)
                            $('#passKeyDelete').modal('show');
                            localStorage.removeItem('Delete-Modal');
                        }

                    })
                }
            };
    </script>
    @endsection
