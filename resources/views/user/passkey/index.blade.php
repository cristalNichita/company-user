@extends('user.layouts.front')
@section('title', 'MFA')

@section('content')
    <div class="wrapper flex grow flex-col">
        <main class="grow content pt-5" id="content" role="content">
            <!-- begin: container -->
            <div class="container-fixed">
                <div class="flex flex-nowrap items-center lg:items-end justify-between dark:border-b-coal-100 gap-6 mb-1.5 lg:mb-3">
                    <div class="grid">
                        <div class="scrollable-x-auto">
                            <div class="menu gap-3" data-menu="true">
                                <div class="menu-item border-b-2 border-b-transparent menu-item-active:border-b-primary menu-item-here:border-b-primary" data-menu-item-placement="bottom-start" data-menu-item-toggle="dropdown" data-menu-item-trigger="click">
                                    <div class="menu-link gap-1.5 pb-2 lg:pb-4 px-2" tabindex="0">
                                        <div class="text-2xl text-gray-900">
                                            <div class="font-medium">MFA Settings</div>
                                            <div class="text-gray-600 text-lg">Enhance Workflows with Advanced MFA.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- begin: container -->
            <div class="container-fixed">
                <div class="flex grow gap-5 lg:gap-7.5">
                    <div class="flex flex-col items-stretch grow gap-5 lg:gap-7.5">
                        <div class="card">
                            <div class="card-header" id="auth_two_factor">
                                <h3 class="card-title">
                                    Two-Factor authentication(2FA)
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="grid gap-5 mb-7">
                                    <div class="flex items-center justify-between flex-wrap border border-gray-200 rounded-xl gap-2 px-3.5 py-2.5">
                                        <div class="flex items-center flex-wrap gap-3.5">
                                            <div class="flex items-center">
                                                <div class="relative size-[50px] shrink-0">
                                                    <svg class="w-full h-full stroke-gray-300 fill-gray-100" fill="none" height="48" viewbox="0 0 44 48" width="44" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M16 2.4641C19.7128 0.320509 24.2872 0.320508 28 2.4641L37.6506 8.0359C41.3634 10.1795 43.6506 14.141 43.6506 18.4282V29.5718C43.6506 33.859 41.3634 37.8205 37.6506 39.9641L28 45.5359C24.2872 47.6795 19.7128 47.6795 16 45.5359L6.34937 39.9641C2.63655 37.8205 0.349365 33.859 0.349365 29.5718V18.4282C0.349365 14.141 2.63655 10.1795 6.34937 8.0359L16 2.4641Z" fill=""></path>
                                                        <path d="M16.25 2.89711C19.8081 0.842838 24.1919 0.842837 27.75 2.89711L37.4006 8.46891C40.9587 10.5232 43.1506 14.3196 43.1506 18.4282V29.5718C43.1506 33.6804 40.9587 37.4768 37.4006 39.5311L27.75 45.1029C24.1919 47.1572 19.8081 47.1572 16.25 45.1029L6.59937 39.5311C3.04125 37.4768 0.849365 33.6803 0.849365 29.5718V18.4282C0.849365 14.3196 3.04125 10.5232 6.59937 8.46891L16.25 2.89711Z" stroke=""></path>
                                                    </svg>
                                                    <div class="absolute leading-none left-2/4 top-2/4 -translate-y-2/4 -translate-x-2/4">
                                                        <i class="ki-filled ki-message-text-2 text-xl text-gray-500">
                                                        </i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex flex-col gap-px">
                                                <a class="text-sm font-semibold text-gray-800 hover:text-primary-active"href="#">Text Message (SMS)</a>
                                                <span class="text-2sm font-medium text-gray-600">Instant codes for secure account verification.</span>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-2 lg:gap-6">
                                            <form action="">
                                                <label class="switch switch-sm open-2fa-modal" data-type="otp_mobile">
                                                    <input type="checkbox" />
                                                </label>
                                            </form>
                                        </div>
                                    </div>
                                    <div
                                        class="flex items-center justify-between flex-wrap border border-gray-200 rounded-xl gap-2 px-3.5 py-2.5">
                                        <div class="flex items-center flex-wrap gap-3.5">
                                            <div class="flex items-center">
                                                <div class="relative size-[50px] shrink-0">
                                                    <svg class="w-full h-full stroke-gray-300 fill-gray-100" fill="none" height="48" viewbox="0 0 44 48" width="44" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M16 2.4641C19.7128 0.320509 24.2872 0.320508 28 2.4641L37.6506 8.0359C41.3634 10.1795 43.6506 14.141 43.6506 18.4282V29.5718C43.6506 33.859 41.3634 37.8205 37.6506 39.9641L28 45.5359C24.2872 47.6795 19.7128 47.6795 16 45.5359L6.34937 39.9641C2.63655 37.8205 0.349365 33.859 0.349365 29.5718V18.4282C0.349365 14.141 2.63655 10.1795 6.34937 8.0359L16 2.4641Z" fill=""></path>
                                                        <path d="M16.25 2.89711C19.8081 0.842838 24.1919 0.842837 27.75 2.89711L37.4006 8.46891C40.9587 10.5232 43.1506 14.3196 43.1506 18.4282V29.5718C43.1506 33.6804 40.9587 37.4768 37.4006 39.5311L27.75 45.1029C24.1919 47.1572 19.8081 47.1572 16.25 45.1029L6.59937 39.5311C3.04125 37.4768 0.849365 33.6803 0.849365 29.5718V18.4282C0.849365 14.3196 3.04125 10.5232 6.59937 8.46891L16.25 2.89711Z" stroke=""></path>
                                                    </svg>
                                                    <div class="absolute leading-none left-2/4 top-2/4 -translate-y-2/4 -translate-x-2/4">
                                                        <i class="ki-filled ki-shield-tick text-xl text-gray-500">
                                                        </i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex flex-col gap-px">
                                                <a class="text-sm font-semibold text-gray-800 hover:text-primary-active" href="#">Authenticator App (TOTP)</a>
                                                <span class="text-2sm font-medium text-gray-600">Elevate protection with an authenticator app for two-factor authentication.</span>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-2 lg:gap-6">
                                            <label class="switch switch-sm open-2fa-modal" data-type="otp_app">
                                                <input @if ($gId) checked @endif type="checkbox" id="otp_app_switch" value="{{ $gId ? 1 : 0 }}" />
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end: container -->
        </main>
    </div>

    <div class="modal fade drawer-backdrop" tabindex="-1" role="dialog" aria-labelledby="authAppModalLabel" aria-hidden="true" id="auth_app_modal">
        <div class="modal-content max-w-[700px] top-5 lg:top-[15%]">
            <div class="modal-header p-3">
                <h3 class="modal-title text-1.5xl p-2" id="authAppModalLabel">Authentication App Confirmation</h3>
            </div>
            <hr>
            <form action="{{ route('2fa') }}" method="POST">
                @csrf
                <div class="modal-body grid gap-5 px-0 py-5">
                    <div class="flex flex-col px-5 gap-2.5">
                        <div class="flex flex-center gap-1">
                            <label class="text-gray-600 font-semibold text-2sm">
                                Scan the QR Code and then enter the provided one-time code below.
                            </label>
                        </div>
                        <div class="flex justify-center">
                            {!! $QR_Image !!}
                        </div>
                        <label class="input">
                            <input name="one_time_password" type="text" placeholder="123-456"/>
                        </label>
                    </div>
                    <div class="flex px-5 gap-4 justify-end">
                        <button class="btn btn-light text-center close-modal close-modal-auth" data-type="otp_app" type="button">Cancel</button>
                        <button class="btn btn-primary">
                            Confirm
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade drawer-backdrop" tabindex="-1" role="dialog" aria-labelledby="authMobileModalLabel" aria-hidden="true" id="auth_mobile_modal">
        <div class="modal-content max-w-[700px] top-5 lg:top-[15%]">
            <div class="modal-header p-3">
                <h3 class="modal-title text-1.5xl p-2" id="authMobileModalLabel">Authentication App Confirmation</h3>
            </div>
            <hr>
            <form action="{{ route('2fa') }}" method="POST">
                @csrf
                <div class="modal-body grid gap-5 px-0 py-5">
                    <div class="flex flex-col px-5 gap-2.5">
                        <div class="flex flex-center gap-1">
                            <label class="text-gray-600 font-semibold text-2sm">
                                Scan the QR Code and then enter the provided one-time code below.
                            </label>
                        </div>
                        <div class="flex justify-center">
                            {!! $QR_Image !!}
                        </div>
                        <label class="input">
                            <input name="one_time_password" type="text" placeholder="123-456"/>
                        </label>
                    </div>
                    <div class="flex px-5 gap-4 justify-end">
                        <button class="btn btn-light text-center close-modal close-modal-auth" data-type="otp_app" type="button">Cancel</button>
                        <button class="btn btn-primary">
                            Confirm
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script>
        changeBreadcrumbs('General', 'MFA');
    </script>
@endsection
