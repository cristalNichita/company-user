@extends('user.layouts.front')
@section('title', 'Passwords')

@section('content')
    <div class="wrapper flex grow flex-col">
        <main class="grow content pt-5" id="content" role="content">
            <!-- begin: container -->
            <div class="container-fixed" id="content_container">
            </div>
            <!-- begin: container -->
            <div class="container-fixed">
                <div class="flex flex-nowrap items-center lg:items-end justify-between dark:border-b-coal-100 gap-6 mb-5 lg:mb-10">
                    <div class="grid">
                        <div class="scrollable-x-auto">
                            <div class="menu gap-3" data-menu="true">
                                <div class="menu-item border-b-2 border-b-transparent menu-item-active:border-b-primary menu-item-here:border-b-primary" data-menu-item-placement="bottom-start" data-menu-item-toggle="dropdown" data-menu-item-trigger="click">
                                    <div class="menu-link gap-1.5 pb-2 lg:pb-4 px-2" tabindex="0">
                                        <div class="text-2xl text-gray-900">
                                            <div class="font-medium">Passwords Management</div>
                                            <div class="text-gray-600 text-lg">Central Hub for Passwords Management</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center center lg:pb-7 gap-2.5">
                        <button class="btn btn-sm btn-light" id="share_button">
                            Share
                        </button>
                        <button class="btn btn-sm btn-primary" id="create_new_password_btn">
                            Create New
                        </button>
                    </div>
                </div>
            </div>
            <!-- end: container -->
            <!-- begin: container -->
            <div class="container-fixed">
                <!-- begin: projects -->
                <div class="flex flex-col items-stretch gap-5 lg:gap-7.5">
                    <!-- begin: toolbar -->
                    <div class="flex flex-wrap items-center gap-5 justify-between">
                        <div class="flex gap-7">
                            <div class="input font-normal">
                                <i class="ki-outline ki-magnifier">
                                </i>
                                <input placeholder="Search Passwords" type="text" value="" autocomplete="new-password" id="password-component-search"/>
                            </div>
                            <label class="switch">
                                <span class="switch-label">
                                    Shared
                                </span>
                                <input type="checkbox" name="shared">
                            </label>
                        </div>
                        <div class="btn-tabs" data-tabs="true">
                            <a class="btn btn-icon active" data-tab-toggle="#projects_cards" href="#">
                                <i class="ki-filled ki-category">
                                </i>
                            </a>
                            <a class="btn btn-icon" data-tab-toggle="#projects_list" href="#">
                                <i class="ki-filled ki-row-horizontal">
                                </i>
                            </a>
                        </div>
                    </div>
                    <!-- end: toolbar -->
                    <!-- begin: cards -->
                    <div id="projects_cards">
                        <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-5 lg:gap-7.5" id="search-component-pass-results-card">
                            @include('user.password.password-component', ['passwords' => $passwords])
                        </div>
                    </div>
                    <div id="projects_list" class="hidden">
                        <div class="flex flex-col gap-5 lg:gap-7.5" id="search-component-pass-results-list">
                            @include('user.password.password-component-list', ['passwords' => $passwords])
                        </div>
                    </div>
                    <!-- end: list -->
                </div>
                <!-- end: projects -->
            </div>
            <!-- end: container -->
        </main>
    </div>>

{{--Create Modal--}}
    <div class="modal fade drawer-backdrop" tabindex="-1" role="dialog" aria-labelledby="createPasswordModalLabel" aria-hidden="true" id="create_password_modal">
        <div class="modal-content max-w-[700px] top-5">
            <div class="modal-header p-3">
                <h3 class="modal-title text-1.5xl px-5 pt-3" id="createPasswordModalLabel">Create New Password</h3>
                <label class="text-gray-600 font-normal text-sm px-5">
                    Fill in all required fields to create a new password.
                </label>
            </div>
            <form action="{{ route('passwords.store') }}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                <div class="modal-body grid gap-5 px-3 py-5">
                    <div class="card mx-5 pb-2.5">
                        <div class="flex flex-col gap-2.5">
                            <div class="card-header">
                                <h3 class="card-title">Basic Settings</h3>
                            </div>
                            <div class="card-body grid gap-5">
                                <div class="w-full">
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="form-label flex items-center gap-1 max-w-56">Name <span class="text-danger">*</span></label>
                                        <input type="text" class="input" name="name" placeholder="FlashX">
                                    </div>
                                </div>
                                <div class="w-full">
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="form-label flex items-center gap-1 max-w-56">Account Name <span class="text-danger">*</span></label>
                                        <input type="text" class="input" name="account_name" placeholder="Account Name">
                                    </div>
                                </div>
                                <div class="w-full">
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="form-label flex items-center gap-1 max-w-56">Password <span class="text-danger">*</span></label>
                                        <div class="input w-full" data-toggle-password="true">
                                            <input name="password" placeholder="Password" type="password"/>
                                            <div class="btn btn-icon" data-toggle-password-trigger="true">
                                                <i class="ki-outline ki-eye toggle-password-active:hidden">
                                                </i>
                                                <i class="ki-outline ki-eye-slash hidden toggle-password-active:block">
                                                </i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full">
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="form-label flex items-center gap-1 max-w-56">URI</label>
                                        <input type="text" class="input" name="url" placeholder="https://flashx.com">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mx-5 pb-2.5">
                        <div class="flex flex-col gap-2.5">
                            <div class="card-header">
                                <h3 class="card-title">Advanced Settings</h3>
                            </div>
                            <div class="card-body grid gap-5">
                                <div class="w-full">
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="switch justify-between w-full">
                                            <div class="flex">
                                                <img src="{{ asset('assets/img/password-reprompt.png') }}" alt="">
                                                <div class="ml-2">
                                                    <div class="font-semibold text-gray-900 text-md">Master Password Re-prompt</div>
                                                    <div class="text-gray-600 text-sm">Require master password re-prompt to view the password.</div>
                                                </div>
                                            </div>
                                            <input type="checkbox" name="master_password_required">
                                        </label>
                                    </div>
                                </div>
                                <div class="w-full">
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="switch justify-between w-full">
                                            <div class="flex">
                                                <img src="{{ asset('assets/img/mfa-reprompt.png') }}" alt="">
                                                <div class="ml-2">
                                                    <div class="font-semibold text-gray-900 text-md">MFA Re-prompt</div>
                                                    <div class="text-gray-600 text-sm">Require MFA re-prompt to view the specific password.</div>
                                                </div>
                                            </div>
                                            <input type="checkbox" name="mfa_required" @if (!$gId && !$user->two_factor_email && !$user->two_factor_phone) disabled @endif>
                                        </label>
                                    </div>
                                    @if (!$gId && !$user->two_factor_email && !$user->two_factor_phone)
                                        <div class="text-2sm badge badge-warning badge-outline w-full">Please, connect two factor authentication to use "MFA Re-prompt.</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex px-5 gap-4 justify-end">
                        <button type="button" class="btn btn-light text-center close-modal">Cancel</button>
                        <button class="btn btn-primary">
                            Create Password
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

{{--Edit Modal--}}
    <div class="modal fade drawer-backdrop" tabindex="-1" role="dialog" aria-labelledby="editPasswordModalLabel" aria-hidden="true" id="edit_password_modal">
        <div class="modal-content max-w-[700px] top-5">
            <div class="modal-header p-3">
                <h3 class="modal-title text-1.5xl px-5 pt-3" id="createPasswordModalLabel">Edit Password</h3>
                <label class="text-gray-600 font-normal text-sm px-5">
                    Fill in all required fields to edit a password.
                </label>
            </div>
            <form method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                <div class="modal-body grid gap-5 px-3 py-5">
                    <div class="card mx-5 pb-2.5">
                        <div class="flex flex-col gap-2.5">
                            <div class="card-header">
                                <h3 class="card-title">Basic Settings</h3>
                            </div>
                            <div class="card-body grid gap-5">
                                <div class="w-full">
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="form-label flex items-center gap-1 max-w-56">Name <span class="text-danger">*</span></label>
                                        <input type="text" class="input" name="name" placeholder="FlashX">
                                    </div>
                                </div>
                                <div class="w-full">
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="form-label flex items-center gap-1 max-w-56">Account Name <span class="text-danger">*</span></label>
                                        <input type="text" class="input" name="account_name" placeholder="Account Name">
                                    </div>
                                </div>
                                <div class="w-full">
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="form-label flex items-center gap-1 max-w-56">Password <span class="text-danger">*</span></label>
                                        <div class="input w-full text-gray-700" data-toggle-password="true">
                                            <input name="password" placeholder="Password" type="password"/>
                                            <div class="btn btn-icon" data-toggle-password-trigger="true">
                                                <i class="ki-outline ki-eye toggle-password-active:hidden">
                                                </i>
                                                <i class="ki-outline ki-eye-slash hidden toggle-password-active:block">
                                                </i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full">
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="form-label flex items-center gap-1 max-w-56">URI</label>
                                        <input type="text" class="input" name="url" placeholder="https://flashx.com">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mx-5 pb-2.5">
                        <div class="flex flex-col gap-2.5">
                            <div class="card-header">
                                <h3 class="card-title">Advanced Settings</h3>
                            </div>
                            <div class="card-body grid gap-5">
                                <div class="w-full">
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="switch justify-between w-full">
                                            <div class="flex">
                                                <img src="{{ asset('assets/img/password-reprompt.png') }}" alt="">
                                                <div class="ml-2">
                                                    <div class="font-semibold text-gray-900 text-md">Master Password Re-prompt</div>
                                                    <div class="text-gray-600 text-sm">Require master password re-prompt to view the password.</div>
                                                </div>
                                            </div>
                                            <input type="checkbox" name="master_password_required">
                                        </label>
                                    </div>
                                </div>
                                <div class="w-full">
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="switch justify-between w-full">
                                            <div class="flex">
                                                <img src="{{ asset('assets/img/mfa-reprompt.png') }}" alt="">
                                                <div class="ml-2">
                                                    <div class="font-semibold text-gray-900 text-md">MFA Re-prompt</div>
                                                    <div class="text-gray-600 text-sm">Require MFA re-prompt to view the password.</div>
                                                </div>
                                            </div>
                                            <input type="checkbox" name="mfa_required" @if (!$gId && !$user->two_factor_email && !$user->two_factor_phone) disabled @endif>
                                        </label>
                                    </div>
                                    @if (!$gId && !$user->two_factor_email && !$user->two_factor_phone)
                                        <div class="text-2sm badge badge-warning badge-outline w-full">Please, connect two factor authentication to use "MFA Re-prompt.</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex px-5 gap-4 justify-end">
                        <button type="button" class="btn btn-light text-center close-modal">Cancel</button>
                        <button class="btn btn-primary">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{--Share Password Modal--}}
    <div class="modal fade drawer-backdrop" tabindex="-1" role="dialog" aria-labelledby="shareModalLabel" aria-hidden="true" id="share_password_modal">
        <div class="modal-content max-w-[500px] top-5 lg:top-[15%]">
            <div class="modal-header p-5">
                <h3 class="modal-title text-1.5xl px-3" id="shareModalLabel">Share Password</h3>
                <label class="text-gray-600 text-2sm px-3">
                    Choose the password and user you want to share.
                </label>
            </div>
            <hr>
            <div class="modal-body grid gap-0 px-0 py-2.5">
                <div class="flex flex-col gap-0">
                    <div class="card-header-without-outline">
                        <h3 class="card-title">Application Name</h3>
                    </div>
                    <div class="card-body-second grid gap-1.5">
                        <div class="w-full">
                            <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                <input type="text" class="input" name="password_app" id="password_search" placeholder="e.g. Confluence">
                            </div>
                        </div>
                        <div id="search-pass-results"></div>
                    </div>
                </div>
                <div class="flex flex-col gap-0">
                    <div class="card-header-without-outline">
                        <h3 class="card-title">Share with</h3>
                    </div>
                    <div class="card-body-second grid gap-1.5">
                        <div class="w-full">
                            <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                <input type="text" class="input" placeholder="Joe Doe">
                            </div>
                        </div>
                        <div id="search-pass-results"></div>
                    </div>
                </div>
                <div class="flex px-5 gap-4 justify-end pt-3.5 pb-1.5">
                    <button class="btn btn-light text-center close-modal">Cancel</button>
                    <button class="btn btn-primary confirm-password">
                        Share
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>

        $('#create_new_password_btn').click(function() {
            $('#create_password_modal').show();
        });

        $(document).ready(function() {
            passLevel();

            $('#share_button').click(function() {
                $('#share_password_modal').show();
            });

            let timeout = null;
            $('#password_search').on('input', function() {
                clearTimeout(timeout);
                let query = $(this).val();

                timeout = setTimeout(function() {

                    $.ajax({
                        url: '{{ route('searchPasswords') }}',
                        method: 'POST',
                        data: {
                            query: query,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            $('#search-pass-results').html(response);
                        },
                        error: function(e) {
                            console.log(e);
                        }
                    })
                }, 2000);
            });

            let passComponentTimeout = null;
            $('#password-component-search').on('input', function() {
                clearTimeout(passComponentTimeout);
                let query = $(this).val();

                passComponentTimeout = setTimeout(function() {
                    $.ajax({
                        url: '{{ route('searchPassComponentCard') }}',
                        method: 'POST',
                        data: {
                            query: query,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            $('#search-component-pass-results-card').html(response);
                            passLevel();
                        },
                    });
                    $.ajax({
                        url: '{{ route('searchPassComponentList') }}',
                        method: 'POST',
                        data: {
                            query: query,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            $('#search-component-pass-results-list').html(response);
                            passLevel();
                        },
                    })
                });
            });

            function passLevel() {
                $('.progress-bar').each(function() {
                    let password = $(this).closest('.progress-status').attr('data-password');
                    let length = password.length;
                    let hasUpper = /[A-Z]/.test(password);
                    let hasLower = /[a-z]/.test(password);
                    let hasNumber = /[0-9]/.test(password);
                    let hasSpecial = /[!@#$%^&*]/.test(password);
                    let isSequential = /(.)\1{2,}/.test(password); // Проверка на повторяющиеся символы

                    let score = 0;

                    if (length >= 8) score++;
                    if (hasUpper) score++;
                    if (hasLower) score++;
                    if (hasNumber) score++;
                    if (hasSpecial) score++;
                    if (!isSequential) score++;

                    let width = (score / 6) * 100;

                    $(this).css('width', width + '%');

                    if (score <= 2) {
                        $(this).css('background-color', '#F8285A');
                        $(this).closest('.progress-status').find('.progress-text').css('color', '#F8285A');
                        $(this).closest('.progress-status').find('.progress-text').text('Low');
                    } else if (score > 2 && score <= 4) {
                        $(this).css('background-color', '#F6B100');
                        $(this).closest('.progress-status').find('.progress-text').css('color', '#F6B100');
                        $(this).closest('.progress-status').find('.progress-text').text('Medium');
                    } else {
                        $(this).css('background-color', '#17C653');
                        $(this).closest('.progress-status').find('.progress-text').css('color', '#17C653');
                        $(this).closest('.progress-status').find('.progress-text').text('Strong');
                    }
                });
            }
        });
    </script>
@endsection
