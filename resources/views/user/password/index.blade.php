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
                                <input placeholder="Search Passwords" type="text" value="" autocomplete="new-password"/>
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
                        <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-5 lg:gap-7.5">
                            @foreach($passwords as $password)
                                <div class="card p-7.5">
                                    <div class="flex items-center justify-between mb-3 lg:mb-6">
                                        <div class="flex items-center justify-center size-[50px] rounded-lg bg-gray-100">
                                            <img alt="" src="{{ $password->favicon_url }}"/>
                                        </div>
                                        <div class="flex">
                                            <span class="badge badge-primary badge-outline">Private</span>
                                            <div class="menu" data-menu="true">
                                                <div
                                                    class="menu-item" data-menu-item-offset="0, 10px"
                                                    data-menu-item-placement="bottom-end" data-menu-item-toggle="dropdown"
                                                    data-menu-item-trigger="click|lg:click"
                                                >
                                                    <button class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                        <i class="ki-filled ki-dots-vertical">
                                                        </i>
                                                    </button>
                                                    <div class="menu-dropdown menu-default w-full max-w-[200px]" data-menu-dismiss="true">
                                                        <div class="menu-item">
                                                            <a class="menu-link" href="{{ $password->url }}" target="_blank">
                                                                <span class="menu-icon">
                                                                    <i class="ki-outline ki-exit-right-corner text-gray-600"></i>
                                                                </span>
                                                                <span class="menu-title">
                                                                    Launch
                                                                </span>
                                                            </a>
                                                        </div>
                                                        <div class="menu-item">
                                                            <button type="button" class="menu-link">
                                                                <span class="menu-icon">
                                                                    <i class="ki-outline ki-copy">
                                                                    </i>
                                                                </span>
                                                                <span class="menu-title">
                                                                    Copy Email
                                                                </span>
                                                            </button>
                                                        </div>
                                                        <div class="menu-item">
                                                            <button class="menu-link" type="button">
                                                                <span class="menu-icon">
                                                                    <i class="ki-outline ki-copy">
                                                                    </i>
                                                                </span>
                                                                <span class="menu-title">
                                                                    Copy Password
                                                                </span>
                                                            </button>
                                                        </div>
                                                        <div class="menu-item">
                                                            <button class="menu-link" data-modal-toggle="#report_user_modal">
                                                                <span class="menu-icon">
                                                                    <i class="ki-outline ki-exit-up">
                                                                    </i>
                                                                </span>
                                                                <span class="menu-title">
                                                                    Share Password
                                                                </span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('deletePassKey') }}" method="POST">
                                                            @csrf
                                                            <div class="menu-item">
                                                                <input type="hidden" name="id" value="{{ $password->id }}">
                                                                <button type="button" class="menu-link save-changes" data-modal-toggle="#report_user_modal">
                                                                    <span class="menu-icon">
                                                                        <i class="ki-outline ki-trash" style="color: #F8285A">
                                                                        </i>
                                                                    </span>
                                                                    <span class="menu-title">
                                                                        Delete
                                                                    </span>
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-col mb-3 lg:mb-6">
                                        <button
                                            class="text-left text-lg font-semibold text-gray-900 hover:text-primary-active mb-px open-edit-modal"
                                            data-id="{{ $password->id }}"
                                            data-password="{{ $password->master_password_required }}"
                                            data-mfa="{{ $password->mfa_required }}"
                                        >{{ $password->name }}
                                        </button>
                                        <span class="text-sm font-medium text-gray-600">{{ $password->account_name }}</span>
                                    </div>
                                    <div class="flex items-center gap-5 mb-3.5 lg:mb-7">
                                        <span class="text-sm font-medium text-gray-500">
                                            Created:
                                            <span class="text-sm font-semibold text-gray-700">{{ date('M d', strtotime($password->created_at)) }}</span>
                                        </span>
                                        <span class="text-sm font-medium text-gray-500">
                                            Used:
                                            <span class="text-sm font-semibold text-gray-700">Dec 21</span>
                                        </span>
                                    </div>
                                    <div class="progress-status" data-length="{{ strlen($password->password) }}">
                                        <div class="progress h-1.5">
                                            <div class="progress-bar">
                                            </div>
                                        </div>
                                        <div class="text-right text-warning progress-text text-sm">Medium</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- end: cards -->
                    <!-- begin: list -->
                    <div class="hidden" id="projects_list">
                        <div class="flex flex-col gap-5 lg:gap-7.5">
                            @foreach($passwords as $password)
                                <div class="card p-7">
                                    <div class="flex items-center flex-wrap justify-between gap-5">
                                        <div class="flex items-center gap-3.5">
                                            <div class="flex items-center justify-center size-14 shrink-0 rounded-lg bg-gray-100">
                                                <img alt="" class="" src="{{ $password->favicon_url }}"/>
                                            </div>
                                            <div class="flex flex-col">
                                                <button
                                                    class="text-lg text-left font-semibold text-gray-900 hover:text-primary-active mb-px open-edit-modal"
                                                    data-id="{{ $password->id }}"
                                                    data-password="{{ $password->master_password_required }}"
                                                    data-mfa="{{ $password->mfa_required }}"
                                                >
                                                    {{ $password->name }}
                                                </button>
                                                <span class="text-sm font-medium text-gray-600">
                                                    {{ $password->account_name }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex items-center flex-wrap gap-5 lg:gap-14">
                                            <div class="flex items-center flex-wrap gap-5 lg:gap-14">
                                                <span class="badge badge-primary badge-outline">
                                                    Private
                                                </span>
                                                <div class="progress-status" data-length="{{ strlen($password->password) }}">
                                                    <div class="progress h-1.5 w-36">
                                                        <div class="progress-bar">
                                                        </div>
                                                    </div>
                                                    <div class="text-right progress-text text-sm">Medium</div>
                                                </div>
                                                <div>
                                                    <div class="text-gray-600 font-medium text-sm">Created:</div>
                                                    <div class="text-sm font-semibold text-gray-700">{{ date('M d', strtotime($password->created_at)) }}</div>
                                                </div>
                                                <div>
                                                    <a target="_blank" href="{{ $password->url }}">
                                                        <i class="ki-outline ki-exit-right-corner text-2xl text-gray-700"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="flex items-center gap-2 lg:gap-20">
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px" data-menu-item-placement="bottom-end" data-menu-item-toggle="dropdown" data-menu-item-trigger="click|lg:click">
                                                        <button class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical text-xl">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[200px]" data-menu-dismiss="true">
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                                                                    <span class="menu-icon">
                                                                        <i class="ki-outline ki-copy">
                                                                        </i>
                                                                    </span>
                                                                        <span class="menu-title">
                                                                        Copy Email
                                                                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                                                                    <span class="menu-icon">
                                                                        <i class="ki-outline ki-copy">
                                                                        </i>
                                                                    </span>
                                                                        <span class="menu-title">
                                                                        Copy Password
                                                                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" data-modal-toggle="#share_password_modal" href="#">
                                                                    <span class="menu-icon">
                                                                        <i class="ki-outline ki-exit-up">
                                                                        </i>
                                                                    </span>
                                                                        <span class="menu-title">
                                                                        Share Password
                                                                    </span>
                                                                </a>
                                                            </div>
                                                            <form action="{{ route('deletePassKey') }}" method="POST">
                                                                <div class="menu-item">
                                                                    <button class="menu-link save-changes">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-outline ki-trash" style="color: #F8285A">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Delete
                                                                        </span>
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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
                                            <input type="checkbox" name="mfa_required">
                                        </label>
                                    </div>
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
                                            <input type="checkbox" name="mfa_required">
                                        </label>
                                    </div>
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
            $('.progress-bar').each(function() {
                let width = $(this).closest('.progress-status').attr('data-length');

                if (width < 6) {
                    $(this).css('background-color', '#F8285A');
                    $(this).css('width', '20%');
                    $(this).closest('.progress-status').find('.progress-text').css('color', '#F8285A');
                    $(this).closest('.progress-status').find('.progress-text').text('Low');
                } else if (width >= 6 && width < 10) {
                    $(this).css('background-color', '#F6B100');
                    $(this).css('width', '50%');
                    $(this).closest('.progress-status').find('.progress-text').css('color', '#F6B100');
                    $(this).closest('.progress-status').find('.progress-text').text('Medium');
                } else {
                    $(this).css('background-color', '#17C653');
                    $(this).css('width', '100%');
                    $(this).closest('.progress-status').find('.progress-text').css('color', '#17C653');
                    $(this).closest('.progress-status').find('.progress-text').text('Strong');
                }
            })

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
        });
    </script>
@endsection
