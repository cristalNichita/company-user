@extends('user.layouts.front')
@section('title', 'Passwords')

@section('css')
<link rel="stylesheet" href="{{ url('assets/user/css/access-keys.css') }}">
<style>
    div.top-border {
        font-size: 1.5em;
        /* padding: 20px; */
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
        padding: 8px 15px;
        color: #000;
        border: 2px solid #A1FF00;
    }

    .view-password-details-btn {
        font-size: 14px;
        /* background-color: hsla(82, 100%, 50%, 0.2); */
        border-radius: 4px;
        padding: 5px 15px;
        color: #A1FF00;
        border: 1px solid transparent;
    }

    .password-field a.btn-design {
        position: absolute;
        bottom: 158px;
        right: 72px;
        z-index: 99;
        color: #000;
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
        /* border: 16px solid #f3f3f3;
            border-top: 16px solid #a1ff00;
            border-radius: 50%; */
        width: 80px;
        height: 80px;
        top: 40%;
        left: 50%;
        /* animation: spin 2s linear infinite; */
    }

    .password-field {
        position: relative;
    }

    /* @keyframes spin {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
            } */

    #canvas-body canvas{
      position: absolute;
      left: 70px;
      top: 10px;
    }
    .capture-canvas{
      position: absolute;
      left: 10%;
      display: flex;
      flex-flow: column;
      width: 300px;
      height: 150px;
    }

    .capture-canvas button{
      position: absolute;
      top: -30px;
      left: 0;
      right: 0;
    }

    .hide-detail{
        font-size: 14px;
    }
</style>
@endsection
@section('content')
@php
// $userRole = App\Models\CustomRole::where('id','a8ed1276-8755-4c68-8325-6809a8789015')->first();
@endphp
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
            <h3>Passwords</h3>
        </div>
        <div class="right-side">
            @include('user.common.profileView')
        </div>
    </div>
    <div class="content-view-box access-keys-list">
        <div class="upload-box">
            <p>Access Passwords encryption (AKE) lets you encrypt content in the client's browser before any data is
                transmitted or stored in Google cloud-based storage. Google servers can't access your encryption
                Passwords stored in DSM.</p>

            {{-- @if (App\Helpers\CommonHelper::getUserCustomMultipleRoles('uploadCloudFile', 'cloud') ||
            Auth::user()->role == 'business') --}}
            {{-- <button type="button" data-bs-toggle="modal" @if (Auth::user()->role == 'business')
                onclick="openUploadFilePopup()" data-bs-target="#uploadModal" @endif onclick="synchronizedUserAccess()"
                class="small-btn"> --}}

                <button type="button" data-bs-toggle="modal" onclick="openUploadFilePopup()"
                    data-bs-target="#uploadModal" class="small-btn">
                    <svg width="21" height="16" viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M16.76 6.7998C16.88 6.43981 17 6.0798 17 5.5998C17 2.9598 14.84 0.799805 12.2 0.799805C10.4 0.799805 8.71995 1.8798 7.99995 3.4398C7.63995 3.3198 7.15995 3.1998 6.79995 3.1998C5.11995 3.1998 3.79995 4.5198 3.79995 6.1998C3.79995 6.43981 3.79995 6.6798 3.91995 6.7998C1.75995 7.1598 0.199951 8.8398 0.199951 10.9998C0.199951 13.2798 2.11995 15.1998 4.39995 15.1998H8.59995V11.5998H4.99995L10.4 6.1998L15.8 11.5998H12.2V15.1998H16.4C18.68 15.1998 20.6 13.2798 20.6 10.9998C20.6 8.8398 18.92 7.0398 16.76 6.7998Z"
                            fill="black" />
                    </svg>
                    Upload Password
                </button>
                {{-- @endif --}}
        </div>

        <div class="row">
            <div class="col-md-4 col-xxl-2">
                <div class="general-box device-box">
                    <div class="pt-2 px-2">
                        <select class="form-select" name="primaryHsmId" id="primaryHsmId">
                            @if ($allHsmDevice)
                            <option value="" disabled selected>Select Device</option>
                            @foreach ($allHsmDevice as $hsmDevice)
                            <option data-hsmId="{{ $hsmDevice->hsmId }}" value="{{ $hsmDevice->hsmId }}" {{
                                !empty($user) && $user->primaryHsmId == $hsmDevice->hsmId ? 'selected' : '' }}>
                                {{ $hsmDevice->name }}
                            </option>
                            @endforeach
                            @else
                            <option selected disabled>No Device Found</option>
                            @endif

                        </select>
                    </div>
                    <div class="general-box-main">
                        <img style="margin-block-end: auto;" src="{{ url('images/device.png') }}" />
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-xxl-4">
                <div class="general-box">
                    <div class="general-box-head">
                        <h4>Device Information</h4>
                    </div>
                    <div class="general-box-main">
                        <div class="row">
                            <div class="col-sm-4">
                                <label>HSM Name</label>
                                <span>{{ $passStorageInfo['hsmDetail']->name ?? '-' }}</span>
                            </div>
                            <div class="col-sm-4">
                                <label>HSM Located In</label>
                                <span>{{ $passStorageInfo['hsmDetail']->location ?? '-' }}</span>
                            </div>

                            <div class="col-sm-4">
                                <label>Status</label>
                                @if ($passStorageInfo['hsmDetail'])
                                <p
                                    class="{{ $passStorageInfo['hsmDetail']->hsmStatus == 'Deactive' ? 'red-content' : 'green-content' }}">
                                    {{ $passStorageInfo['hsmDetail']->hsmStatus }}
                                </p>
                                @else
                                <p class="red-content">-</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-6">
                <div class="general-box">
                    <div class="general-box-head">
                        <h4>Storage Information</h4>
                    </div>
                    <div class="general-box-main">
                        <div class="row align-items-center">
                            <div class="container text-center pie-chart-box">
                                <canvas id="donutChart" width="60" height="60"></canvas>
                            </div>
                            <div class="col-6 col-sm-3 user-space-box">
                                <label class="space used">Used Space</label>
                                <span>{{ $passStorageInfo['usedSpace'] ?? 0 }}</span>
                            </div>
                            <div class="col-6 col-sm-3 available-space-box">
                                <label class="space available">Available Space</label>
                                <span>{{ $passStorageInfo['avaliableSpace'] ?? 0 }}</span>
                            </div>
                            <div class="col-6 col-sm-3 uploaded-passwords-box">
                                <label class="space total-uploaded-password">Total Uploaded Passwords</label>
                                <span>{{ $passStorageInfo['totalUploadedPassword'] ?? 0 }} Uploaded</span>
                            </div>
                            <div class="col-6 col-sm-4 platforms-box">
                                <label class="space number-of-platforms">Number of Platforms</label>
                                <span>{{ $passStorageInfo['numberOfPlatforms'] ?? 0 }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="filled" id="accessKeyDiv">
                <div class="row g-4">
                    @forelse ($passStorageInfo['platformAccount'] as $account)
                    {{-- @dd($account) --}}
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="dark-box gen-bordered-password-box">
                            <div class="content-box">
                                <div class="dropdown float-end">
                                    <a class="" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <svg width="3" height="15" viewBox="0 0 3 15" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M3 1.5C3 2.32843 2.32843 3 1.5 3C0.671573 3 0 2.32843 0 1.5C0 0.671573 0.671573 0 1.5 0C2.32843 0 3 0.671573 3 1.5Z"
                                                fill="white" />
                                            <path
                                                d="M3 7.5C3 8.32843 2.32843 9 1.5 9C0.671573 9 0 8.32843 0 7.5C0 6.67157 0.671573 6 1.5 6C2.32843 6 3 6.67157 3 7.5Z"
                                                fill="white" />
                                            <path
                                                d="M3 13.5C3 14.3284 2.32843 15 1.5 15C0.671573 15 0 14.3284 0 13.5C0 12.6716 0.671573 12 1.5 12C2.32843 12 3 12.6716 3 13.5Z"
                                                fill="white" />
                                        </svg>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        {{-- <li><a class="dropdown-item" href="#">Edit</a></li> --}}
                                        <li><a class="dropdown-item modal-passkey-delete"
                                                data-id='{{ $account->id }}'>Delete</a></li>
                                    </ul>
                                </div>
                                <div class="general-box-head text-center">
                                    <img src="{{ $account->faviconUrl ?? url('assets/img/no_favicon.png') }}"
                                        height="50" width="50" @if (empty($account->faviconUrl)) title="No Favicon"
                                    @endif />
                                    <h4 class="mt-2">{{ $account->title }}</h4>
                                </div>
                                <div class="status-column">
                                    <label>Username</label>
                                    <div>{{ $account->accountId }}</div>
                                </div>
                                <div class="status-column">
                                    <label>Password</label>
                                    <div class="d-flex  justify-content-between">
                                        <div id="hide-passkey-password-{{ $account->id }}">
                                            <span>************</span>
                                        </div>
                                        <div id="show-passkey-password-{{ $account->id }}" style="display:none;">
                                            <span>{{ $account->password }}</span>
                                            {{-- <span>{{ base64_decode($account->password) }}</span> --}}
                                        </div>
                                        {{-- data-id='{{ base64_decode($account->password) }}' --}}
                                        <button class="passkey-password" type="button" title="Copy to Clipboard"
                                            data-id='{{ $account->password }}'
                                            onclick="activityLog('Copy Password',{{ $account }})">
                                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M12.25 9.55V11.8C12.25 14.8 11.05 16 8.05 16H5.2C2.2 16 1 14.8 1 11.8V8.95C1 5.95 2.2 4.75 5.2 4.75H7.45M12.25 9.55H9.84998C8.04998 9.55 7.44998 8.95 7.44998 7.15L7.45 4.75M12.25 9.55L7.45 4.75M8.19998 1H11.2M4.75 3.25C4.75 2.005 5.755 1 7 1H8.965M16 5.5V10.1425C16 11.305 15.055 12.25 13.8925 12.25M16 5.5H13.75C12.0625 5.5 11.5 4.9375 11.5 3.25V1L16 5.5Z"
                                                    stroke="white" stroke-width="1.15" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <button type="button" class="view-password-btn pass-key-password-click"
                                        data-id='{{ $account->id }}'
                                        onclick="activityLog('View Password',{{ $account }})">
                                        View Password
                                    </button>

                                    <a href="#" class="view-password-details-btn view-password-details"
                                        data-item="{{ $account }}" data-item-id="{{ $account->userId }}"><button
                                            type="button" data-bs-toggle="modal" data-id="{{ $account->userId }}"
                                            data-bs-target="#viewDetailModal" class="view-button"
                                            onclick="activityLog('Detail',{{ $account }})">View
                                            Detail</button></a>

                                    {{-- <button type="button" class="view-password-details-btn" data-bs-toggle="modal"
                                        onclick="viewDetailPopup()" data-bs-target="#viewDetailModal">
                                        View Details </button> --}}

                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p class="text-center">No Data Found</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <!-- VIEW DETAILS POPUP -->
    <div class="modal fade upload-modal-box dark-popup" id="viewDetailModal" tabindex="-1"
        aria-labelledby="viewDetailModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content top-border">
                <button type="button" class="close btn remove-btn text-white" style="float: right"
                    data-bs-dismiss="modal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" fill="none">
                        <path d="M17 2L2 17M17 17L2 2" stroke="white" stroke-width="3" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </button>
                <div class="modal-body">
                    <input type="hidden" id="passKeyId" name='passKeyId'>
                    <div class="content-box">
                        <div class="status-column">
                            <label>Title</label>
                            <div class="big-text" id="title">-</div>
                        </div>
                        <div class="row">
                            <div class="status-column col-md-6">
                                <label>Platform</label>
                                <div class="d-flex">
                                    <img src="" id="faviconUrl" height="24" width="24">&nbsp;
                                    <span class="small-text" id="platformName">-</span>
                                </div>
                            </div>
                            <div class="status-column col-md-6">
                                <label>IP Address</label>
                                <div class="small-text" id="ipAddress">-</div>
                            </div>
                            <div class="status-column col-md-6">
                                <label>Created Time</label>
                                <div class="small-text" id="createdAt">-</div>
                            </div>
                            <div class="status-column col-md-6">
                                <label>Password Size</label>
                                <div class="small-text" id="password-size">-</div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer justify-content-start">
                    <button type="submit" class="btn denger-button backBtn modal-passkey-delete"
                        data-bs-dismiss="modal">Delete Password</button>
                </div>
            </div>
        </div>
    </div>


    <!-- upload Modal -->
    <div class="modal fade upload-modal-box dark-popup" id="uploadModal" tabindex="-1"
        aria-labelledby="uploadModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content top-border">
                <div class="modal-header">

                    <h5 class="modal-title d-block text-center" id="uploadModalLabel">Add Password</h5>
                    <p class="small-text d-block text-center">Amet minim mollit non deserunt ullamco est sit aliqua
                        dolor do amet sint. Velit officia.</p>
                </div>
                <div class="modal-body">
                    <form class="add-password" id="add-password" action="{{ route('passwords.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="row input-area">

                            <div class="col-md-6">
                                <div class="input-parent ">
                                    <label>Password *</label>
                                    <div class="small-text">Enter the password you want to add to the device.</div>
                                    <div class="password-field">
                                        <input type="text" name="password" id="password"
                                            oninput="passwordIcon(this.value)">
                                        <span id="passwordIconId">
                                            <i class="far fa-circle" id="pass-icon" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                    <label id="password-error" class="error" for="password"
                                        style="display: none;">Please enter password</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-parent">
                                    <label>Confirm Password *</label>
                                    <div class="small-text">Enter the password you want to add to the device.</div>
                                    <div class="password-field">
                                        <input type="password" name="password_confirm" id="password_confirm"
                                            oninput="cPasswordIcon(this.value)">
                                        <span id="passwordIconId">
                                            <i class="far fa-circle" id="c-pass-icon" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                    <label id="password_confirm-error" class="error" style="display: none;"
                                        for="password_confirm">Please enter the same value again.</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-parent ">
                                    <label>Title *</label>
                                    <div class="small-text">Add Title that you can recognize it from the list.</div>
                                    <input type="text" name="title" id="title">
                                    <label id="title-error" style="display: none;" class="error text-danger"
                                        for="title">Please
                                        enter title</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-parent">
                                    <label>Email Address/Username/User ID *</label>
                                    <div class="small-text">You can add additional information if required.</div>
                                    <input type="text" name="accountId" id="accountId">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="input-parent">
                                    <label>Platform *</label>
                                    <div class="small-text">You can add additional information if required.</div>
                                    <input type="text" name="platform" id="platform">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="input-parent">
                                    <label>URL (website) *</label>
                                    <div class="small-text">Add website URL you are saving password.</div>
                                    <input type="text" name="accountUrl" id="accountUrl">
                                </div>
                            </div>

                            <div class="box-action">
                                <button type="button" class="btn cancel-btn" data-bs-dismiss="modal">CANCEL</button>
                                <button type="submit" class="btn primary-btn" id="upload-file">SAVE</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- delete modal --}}
    <div class="modal fade dark-popup" id="passKeyDelete" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-hidden="true" aria-labelledby="passKeyDeleteLabel">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('deletePassKey') }}" method="POST">
                    @csrf
                    <input type="hidden" id="delete-pass-id" name="id">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="passKeyDeleteLabel">Delete</h5>
                    </div>
                    <div class="modal-body">
                        <h5 class="text-center">Are you sure you want to delete this password?</h5>
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


    {{-- AuthForm --}}

    <div class="modal fade upload-modal-box dark-popup" id="auth" tabindex="-1" aria-labelledby="authLabel"
        aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content border-0">

                <div class="modal-body p-0 m-0">
                    <div class="content-view-box p-0">
                        <div class="passkey-box">
                            <h3 class="p-3 pb-0 modal-title d-block text-center" id="authLabel">Choose Authentication Process from MFA</h3>
                            <p class="p-3 mb-0 small-text d-block text-center">MFA stands for Multi-Factor
                                Authentication, a security process that requires users to provide
                                multiple forms of identification before gaining access to a system, application, or
                                service. The goal of MFA is to enhance security by adding an extra layer of protection beyond
                                traditional username and password credentials. This additional layer typically involves something
                                the user knows (like a password) combined with something the user has (such as a mobile device or a
                                security token) or something the user is (like a fingerprint or other biometric factor).</p>
                            <div class="inner-box">
                                {{-- <div class="gen-box">
                                    <div class="box-small-title">Fingerprint</div>
                                    <div class="img-box">
                                        <img src="{{url('assets/img/fingrprint.svg')}}" />
                                    </div>
                                    <div class="button-box">
                                        <a href="javascript:void(0);" class="filled-btn">Authenticate</a>
                                        <a href="javascript:void(0);" class="normal-btn">Learn More</a>
                                    </div>
                                </div> --}}
                                @if($user->faceIdImage)
                                <div class="gen-box">
                                    <div class="box-small-title">Face ID</div>
                                    <div class="img-box">
                                        <img src="{{url('assets/img/face.svg')}}" />
                                    </div>
                                    <div class="button-box">
                                        <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#face-id"
                                            class="filled-btn">Authenticate</a>
                                        <a href="javascript:void(0);" class="normal-btn">Learn More</a>
                                    </div>
                                </div>
                                @endif

                                @if($user->twoFactorEmail || $user->twoFactorMobileNumber)
                                <div class="gen-box">
                                    <div class="box-small-title">Mobile/Email OTP</div>
                                    <div class="img-box">
                                        <img src="{{url('assets/img/otp.svg')}}" />
                                    </div>
                                    <div class="button-box">
                                        <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#otp"
                                            class="filled-btn">Authenticate</a>
                                        <a href="javascript:void(0);" class="normal-btn">Learn More</a>
                                    </div>
                                </div>
                                @endif

                                @if($gId)
                                <div class="gen-box">
                                    <div class="box-small-title">Authentication App</div>
                                    <div class="img-box">
                                        <img src="{{url('assets/img/auth-key.svg')}}" />
                                    </div>
                                    <div class="button-box">
                                        <a href="javascript:void(0);" data-bs-toggle="modal"
                                            data-bs-target="#authenticate" class="filled-btn">Authenticate</a>
                                        <a href="javascript:void(0);" class="normal-btn">Learn More</a>
                                    </div>
                                </div>
                                @endif

                                @if(file_exists(storage_path('app/public/passkey/' . str_replace('-', '',
                                    $user->id).'/1.txt')))
                                <div class="gen-box">
                                    <div class="box-small-title">Passkey</div>
                                    <div class="img-box">
                                        <img src="{{url('assets/img/passkey.svg')}}" />
                                    </div>
                                    <div class="button-box">
                                        <a href="javascript:void(0);" id="passkey-validate"
                                            class="filled-btn">Authenticate</a>
                                        <a href="javascript:void(0);" class="normal-btn">Learn More</a>
                                    </div>
                                </div>

                                @endif

                            </div>
                            <a href="javascript:void(0);" id="passkey-validate" class="filled-btn d-none"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade upload-modal-box dark-popup" id="face-id" tabindex="-1" aria-labelledby="otpLabel"
        aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content top-border">
                <div class="modal-header">
                    <h5 class="modal-title d-block text-center" id="otpLabel">Face ID Verification</h5>
                    <p class="small-text d-block text-center">Protect your account by requiring an additional layer of
                        security. </p>
                </div>
                <div class="modal-body">
                    <form  id="face-id-form"  action="{{ route('validate.face') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="input-area">

                            <div class="row">
                                <div class="col-lg-6 ">
                                    <div id="canvas-body">
                                        <canvas id="canvas" width="200" height="140"></canvas>
                                        <video id="video" width="610" height="470" autoplay muted></video>
                                    </div>
                                </div>
                                <input type="hidden" name="image" id="image">
                        {{-- <button type="submit" id="capture"> Validate Face</button> --}}
                                {{-- <button  type="button" id="capture" class="btn primary-btn">Capture</button> --}}
                            </div>

                            <div class="box-action">
                                <button type="button" class="btn cancel-btn" data-bs-dismiss="modal">CANCEL</button>
                                {{-- <a class="btn primary-btn" id="otp-input-show">SUBMIT</a> --}}
                                <button type="button" class="btn primary-btn" id="capture" onclick="faceAuthentication()">Validate Face</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade upload-modal-box dark-popup" id="otp" tabindex="-1" aria-labelledby="otpLabel"
        aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content top-border">
                <div class="modal-header">
                    <h5 class="modal-title d-block text-center" id="otpLabel">Authenticate via OTP</h5>
                    <p class="small-text d-block text-center">Set up the Mobile or Email as your verification method.
                    </p>
                </div>
                <div class="modal-body">
                    <form class="auth-otp" id="auth-otp" action="{{ route('checkTwoFactorUserOptJson') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="input-area">
                            <div class="row">
                                <div class="col-6">
                                    <input type="hidden" name="twoFactorMobileNumber" id="twoFactorMobileNumber"
                                        value="{{ $user->twoFactorMobileNumber ?? "" }}" />
                                    <input type="hidden" name="twoFactorEmail" id="twoFactorEmail"
                                        value="{{ $user->twoFactorEmail ?? "" }}" />
                                    <div class="radio-box">
                                        <input type="radio" name="contactMethod" value="twoFactorMobileNumber"
                                            id="mobile" checked />
                                        <label for="mobile">Mobile OTP</label>
                                        <div class="hide-detail"><span>******</span>&nbsp;{{
                                            substr($user->twoFactorMobileNumber, -4) }}
                                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="19"
                                                viewBox="0 0 17 19" fill="none">
                                                <path
                                                    d="M8.40835 3.43193C8.76668 5.75513 10.6333 7.53121 12.95 7.7669M1 17.6994H16M9.54998 2.21134L2.70831 9.52607C2.44998 9.80385 2.19998 10.351 2.14998 10.7298L1.84164 13.457C1.73331 14.4418 2.43331 15.1152 3.39998 14.9469L6.08331 14.4839C6.45831 14.4166 6.98331 14.1388 7.24164 13.8526L14.0833 6.53789C15.2666 5.27528 15.8 3.8359 13.9583 2.07666C12.125 0.334253 10.7333 0.948724 9.54998 2.21134Z"
                                                    stroke="#A1FF00" stroke-width="1.5" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="radio-box">
                                        <input type="radio" name="contactMethod" value="twoFactorEmail" id="email"/>

                                        <label for="email">Email</label>
                                        <div class="hide-detail email"><span>******</span>&nbsp;{{
                                            substr($user->twoFactorEmail, -16) }}
                                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="19"
                                                viewBox="0 0 17 19" fill="none">
                                                <path
                                                    d="M8.40835 3.43193C8.76668 5.75513 10.6333 7.53121 12.95 7.7669M1 17.6994H16M9.54998 2.21134L2.70831 9.52607C2.44998 9.80385 2.19998 10.351 2.14998 10.7298L1.84164 13.457C1.73331 14.4418 2.43331 15.1152 3.39998 14.9469L6.08331 14.4839C6.45831 14.4166 6.98331 14.1388 7.24164 13.8526L14.0833 6.53789C15.2666 5.27528 15.8 3.8359 13.9583 2.07666C12.125 0.334253 10.7333 0.948724 9.54998 2.21134Z"
                                                    stroke="#A1FF00" stroke-width="1.5" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="otp-input">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <label>Enter OTP here</label>
                                            <div class="resent-otp-btn">
                                                <a id="getOTP" href="#">Get OTP</a>
                                            </div>
                                        </div>
                                        <div class="input-boxes" id="inputs">
                                            <input class="otp-single" type="text" name="otp[]" inputmode="numeric"
                                                maxlength="1" required>
                                            <input class="otp-single" type="text" name="otp[]" inputmode="numeric"
                                                maxlength="1" required>
                                            <input class="otp-single" type="text" name="otp[]" inputmode="numeric"
                                                maxlength="1" required>
                                            <input class="otp-single" type="text" name="otp[]" inputmode="numeric"
                                                maxlength="1" required>
                                            <input class="otp-single" type="text" name="otp[]" inputmode="numeric"
                                                maxlength="1" required>
                                            <input class="otp-single" type="text" name="otp[]" inputmode="numeric"
                                                maxlength="1" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="box-action">
                                <button type="button" class="btn cancel-btn" data-bs-dismiss="modal">CANCEL</button>
                                <button class="btn primary-btn" id="verify-otp" type="button">SUBMIT</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade upload-modal-box dark-popup" id="authenticate" tabindex="-1" aria-labelledby="otpLabel"
        aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content top-border">
                <div class="modal-header">
                    <h5 class="modal-title d-block text-center" id="otpLabel">Authenticate</h5>
                    <p class="small-text d-block text-center">Protect your account by requiring an additional layer of
                        security. </p>
                </div>
                <div class="modal-body">
                    <form class="authenticate-otp" id="authenticate-otp" action="{{ route('authVerify') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="input-area">
                            <div class="form-group">
                                <label for="key">
                                    Please enter the OTP generated on your Authenticator App.<br>
                                    <p class="small-text d-block">Ensure you submit the current one because it refreshes
                                        every 30 seconds.<br>Copy the below key to Register with Authentication App</p>
                                </label>

                                <label for="authOtp" class="col-md-4 control-label">One Time Password</label>

                                <div class="col-md-6">
                                    <input id="authOtp" type="number" class="form-control"
                                        name="authOtp" required autofocus>
                                </div>
                            </div>

                            <div class="box-action">
                                <button type="button" class="btn cancel-btn" data-bs-dismiss="modal">CANCEL</button>
                                <button type="button" class="btn primary-btn" id="auth-submit">SUBMIT</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    @endsection

    @section('js')
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script> --}}
    <script src="{{ url('admin-assets/js/jquery.validate.min.js') }}"></script>
    {{-- <script defer src="https://code.jquery.com/jquery-3.7.1.min.js"></script> --}}
    <script defer src="{{ asset('face-detection/face-api.min.js') }}"></script>
    <script defer src="{{ asset('face-detection/validate-script.js') }}"></script>
    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            $("#pass-icon").removeClass('text-success');
            $("#pass-icon").removeClass('text-warning');
            $("#pass-icon").addClass('text-danger');

            function passwordIcon(value) {

                $.ajax({
                    type: 'POST',
                    url: "{{ route('checkPasswordStrength') }}", // Replace with your server-side endpoint
                    data: {
                        value: value,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        // alert(response);
                        if (response == 'High') {
                            $("#pass-icon").removeClass('text-warning');
                            $("#pass-icon").removeClass('text-danger');
                            $("#pass-icon").addClass("text-success");
                        } else if (response == 'Medium') {
                            $("#pass-icon").removeClass('text-success');
                            $("#pass-icon").removeClass('text-danger');
                            $("#pass-icon").addClass("text-warning");
                        } else {
                            $("#pass-icon").removeClass('text-success');
                            $("#pass-icon").removeClass('text-warning');
                            $("#pass-icon").addClass("text-danger");
                        }
                    },
                    error: function(error) {
                        // Hide loader
                        $('#loader').hide();

                        // Handle error
                        console.error('Error:', error);
                    }
                });
            }

            $("#c-pass-icon").removeClass('text-success');
            $("#c-pass-icon").removeClass('text-warning');
            $("#c-pass-icon").addClass('text-danger');

            function cPasswordIcon(value) {
                $.ajax({
                    type: 'POST',
                    url: "{{ route('checkPasswordStrength') }}", // Replace with your server-side endpoint
                    data: {
                        value: value,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response == 'High') {
                            $("#c-pass-icon").removeClass('text-warning');
                            $("#c-pass-icon").removeClass('text-danger');
                            $("#c-pass-icon").addClass("text-success");
                        } else if (response == 'Medium') {
                            $("#c-pass-icon").removeClass('text-success');
                            $("#c-pass-icon").removeClass('text-danger');
                            $("#c-pass-icon").addClass("text-warning");
                        } else {
                            $("#c-pass-icon").removeClass('text-success');
                            $("#c-pass-icon").removeClass('text-warning');
                            $("#c-pass-icon").addClass("text-danger");
                        }
                    },
                    error: function(error) {
                        // Hide loader
                        $('#loader').hide();

                        // Handle error
                        console.error('Error:', error);
                    }
                });
            }

            function showLoading() {
                document.querySelector('#loading').classList.add('loading');
                document.querySelector('#loading-content').classList.add('loading-content');
            }

            function hideLoading() {
                document.querySelector('#loading').classList.remove('loading');
                document.querySelector('#loading-content').classList.remove('loading-content');
            }

            function openUploadFilePopup() {
                $('#uploadModal').modal('show');
            }

            function viewDetailPopup() {
                $('#viewDetailModal').modal('show');
                // activityLog('test')
            }

            $('.backBtn').on('click', function() {
                onClick = "window.location.reload();"
            });
    </script>

    <script>
        function getAddPasswordFormValue() {
            const getFormValue = document.getElementById("add-password");
            let accountUrlValue = getFormValue.elements["accountUrl"].value;
            let passwordValue = getFormValue.elements["password"].value;

            return {
                accountUrl :accountUrlValue,
                password :passwordValue
            }
        }

        function showPassword() {
                var passwordInput = document.getElementById("password");
                if (passwordInput.type === "password") {
                    passwordInput.type = "text";
                    $('#passwordIconId').find('i').removeClass("fa-eye-slash").addClass("fa-eye");
                } else {
                    passwordInput.type = "password";
                    $('#passwordIconId').find('i').removeClass("fa-eye").addClass("fa-eye-slash");
                }
            }

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
                            validate.b(await navigator.credentials.get(res, {
                                userVerification: 'required'
                            }));
                        } catch (e) {
                            hideLoading();
                            toastr.error(e.message);
                            console.error(e);
                        }
                    });
                },



                b: (cred) => {
                    // Retrieve 'yourId' from localStorage
                    // Access 'yourId' here and use it as needed
                    // console.log('Received ID in function b:', yourId);

                    helper.ajax(APP_URL + "webauthnvalid", {
                        phase: "b",
                        id: cred.rawId ? helper.atb(cred.rawId) : null,
                        client: cred.response.clientDataJSON ? helper.atb(cred.response.clientDataJSON) : null,
                        auth: cred.response.authenticatorData ? helper.atb(cred.response.authenticatorData) :
                            null,
                        sig: cred.response.signature ? helper.atb(cred.response.signature) : null,
                        user: cred.response.userHandle ? helper.atb(cred.response.userHandle) : null
                    }, res => {
                        hideLoading();
                        toastr.success(res)
                        var yourId = localStorage.getItem('yourId');
                        var validText = localStorage.getItem('validText');
                        if (validText == 'Show') {

                            var hideElement = $("#hide-passkey-password-" + yourId);
                            var showElement = $("#show-passkey-password-" + yourId);

                            // Toggle visibility
                            hideElement.toggle();
                            showElement.toggle();
                        }

                        if (validText == 'Delete') {
                            $('#passKeyDelete').modal('show');
                        }

                        if (validText == 'Copy') {
                            // Create a temporary textarea element
                            var textarea = document.createElement("textarea");
                            // Set the value of the textarea element to the text you want to copy
                            textarea.value = yourId;
                            // Append the temporary textarea element to the DOM
                            document.body.appendChild(textarea);
                            // Select the text in the textarea element
                            textarea.select();
                            // Copy the selected text to the clipboard
                            document.execCommand("copy");
                            toastr.options = {
                                "closeButton": true
                            }
                            toastr.success("Copied!");
                            // Remove the temporary textarea element from the DOM
                            document.body.removeChild(textarea);
                        }

                    })
                }
            };

            $(document).ready(function() {
                $(".pass-key-password-click").click(function() {

                    var id = $(this).data("id");

                    @if (file_exists(storage_path('app/public/passkey/' . str_replace('-', '', Auth::user()->id) . '/1.txt')))
                        showLoading();
                        var validText = 'Show';
                        validate.a(id, validText);
                    @else
                        var hideElement = $("#hide-passkey-password-" + id);
                        var showElement = $("#show-passkey-password-" + id);
                        // Toggle visibility
                        hideElement.toggle();
                        showElement.toggle();
                    @endif

                });
            });



            // Copy UUID User
            $('.passkey-password').on('click', function() {

                var text = $(this).attr("data-id");
                /*******************************************************/
                @if (file_exists(storage_path('app/public/passkey/' . str_replace('-', '', Auth::user()->id) . '/1.txt')))
                    showLoading();
                    var validText = 'Copy';
                    validate.a(text, validText);
                @else
                    /* Note: This code works only on HTTPS and local server*/
                    navigator.clipboard.writeText(text);
                    toastr.success("Copied!");
                @endif

            });

            $(document).ready(function() {

            $.validator.addMethod("urlRegex", function(value, element) {
                return this.optional(element) || /^(https?|ftp):\/\/[^\s/$.?#].[^\s]*$/.test(value);
            }, "Please enter a valid URL.");
            // Add Password Form Validation
            $(".add-password").validate({
                // ignore: [],
                rules: {
                    platform: {
                        required: true,
                        minlength: 3,
                        maxlength: 100
                    },
                    title: {
                        required: true,
                        minlength: 3,
                        maxlength: 100
                    },
                    accountUrl: {
                        required: true,
                        urlRegex: true
                    },
                    // faviconUrl: {
                    //     required: true,
                    //     urlRegex: true
                    // },
                    accountId: {
                        required: true,
                        minlength: 3,
                        maxlength: 100,
                        // remote: {
                        //     url: baseUrl + "/check/unique-account/platform_accounts/accountId/platform",
                        //     type: "post",
                        //     data: {
                        //         value: function () {
                        //             return $("#accountId").val();
                        //         },
                        //         id: function () {
                        //             return $("#platform").val();
                        //         },
                        //     },
                        // },
                    },
                    password: {
                        required: true,
                    },
                    password_confirm: {
                        required: true,
                        equalTo: "#password"
                    }
                },
                messages: {
                    platform: {
                        required: "Please enter platform",
                    },
                    title: {
                        required: "Please enter title",
                    },
                    accountUrl: {
                        required: "Please enter website url",
                    },
                    // faviconUrl: {
                    //     required: "Please enter platform favicon url",
                    // },
                    accountId: {
                        required: "Please enter account user id",
                        // remote: "This account user id has already available. Please make it different!",
                    },
                    password: {
                        required: "Please enter password",
                    },
                },
                submitHandler: function(form) {

                    @if (file_exists(storage_path('app/public/passkey/' . str_replace('-', '', $user->id).'/1.txt')) || $gId || $user->twoFactorEmail || $user->twoFactorMobileNumber || $user->faceIdImage )
                        var myModal = new bootstrap.Modal(document.getElementById('auth'));
                        myModal.show();
                    @else
                        activityLog('Form Submit',getAddPasswordFormValue());
                        form.submit();
                    @endif
                    // Prevent the default form submission
                    // return false;
                }
            });
        });
            // var myModal = new bootstrap.Modal(document.getElementById('auth'));
            //         myModal.show();
             // Call the asynchronous check.a() function
                    // console.log(check)
                    // @if (file_exists(storage_path('app/public/passkey/' . str_replace('-', '', Auth::user()->id) . '/1.txt')))
                    //     showLoading();
                    //     check.a()
                    //         .then(() => {
                    //             // Check the condition after check.a() completes
                    //             // Continue with form submission
                    //             form.submit();
                    //             // Handle the case when the condition is not met
                    //         }).catch(error => {
                    //             // Handle errors from check.a()
                    //             console.error('Error in check.a()', error);
                    //         });
                    // @else
                    //     form.submit();
                    // @endif

//--------------------------------------------------------------------------------------------
        function faceAuthentication(){
                // Prevent the default form submission behavior

                // Get the form element
                var faceIdForm = document.getElementById('face-id-form');
                // Check if the form is valid
                // if (faceIdForm.checkValidity()) {
                    // Submit the first form using AJAX for asynchronous submission
                    var formDataFace = new FormData(faceIdForm);
                    console.log($("#image").val());

                    fetch(faceIdForm.action, {
                        method: faceIdForm.method,
                        body: formDataFace
                    })
                    .then(response => {
                        if (!response.ok) {
                            // If the first form submission encounters an error, show an error message
                            toastr.error(response.message);
                            throw new Error('Form submission failed');
                        }
                        return response.json(); // Assuming the response is in JSON format
                    })
                    .then(data => {
                        // Handle the response data here
                        // console.log('asas',data);

                        // You can perform further actions based on the response
                        if (data.status == 1) {
                            // Success handling
                            toastr.success(data.message);
                            activityLog('Face Auth',getAddPasswordFormValue());
                            document.getElementById("add-password").submit();
                            // Wait for the AJAX request to complete before triggering the second form submission
                        } else {
                            // Failure handling
                            toastr.error(data.message);
                        }
                    })
                    .catch(error => {
                        toastr.error('No matching faces found.');
                        console.error('Error:', 'No matching faces found.');
                    });
                // } else {
                //     // If the form is not valid, show an error message
                //     toastr.error('No matching faces found.');
                // }
            }



// --------------------------------------------------------------------------------------------
            document.getElementById('verify-otp').addEventListener('click', function (event) {
                // Prevent the default form submission behavior
               event.preventDefault();

                // Get the form element
                var verifyOtpForm = document.getElementById('auth-otp');
                // Check if the form is valid
                if (verifyOtpForm.checkValidity()) {
                    // Submit the first form using AJAX for asynchronous submission
                    var formData = new FormData(verifyOtpForm);

                    fetch(verifyOtpForm.action, {
                        method: verifyOtpForm.method,
                        body: formData
                    })
                    .then(response => {
                        if (!response.ok) {
                            // If the first form submission encounters an error, show an error message
                            toastr.error(response.message);
                            throw new Error('Form submission failed');
                        }
                        return response.json(); // Assuming the response is in JSON format
                    })
                    .then(data => {
                        // Handle the response data here
                        // console.log('asas',data);

                        // You can perform further actions based on the response
                        if (data.status == 1) {

                            // Success handling
                            toastr.success(data.message);
                            activityLog('Mobile/Email OTP',getAddPasswordFormValue());
                            document.getElementById("add-password").submit();
                            // Wait for the AJAX request to complete before triggering the second form submission
                        } else {
                            // Failure handling
                            toastr.error(data.message);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
                } else {
                    // If the form is not valid, show an error message
                    toastr.error('OTP is required.');
                }
            });



            document.getElementById('auth-submit').addEventListener('click', function (event) {
                // Prevent the default form submission behavior
               event.preventDefault();

                // Get the form element
                var authOtpForm = document.getElementById('authenticate-otp');
                // Check if the form is valid
                if (authOtpForm.checkValidity()) {
                    // Submit the first form using AJAX for asynchronous submission
                    var formDataAuth = new FormData(authOtpForm);

                    fetch(authOtpForm.action, {
                        method: authOtpForm.method,
                        body: formDataAuth
                    })
                    .then(response => {
                        if (!response.ok) {
                            // If the first form submission encounters an error, show an error message
                            toastr.error(response.message);
                            throw new Error('Form submission failed');
                        }
                        return response.json(); // Assuming the response is in JSON format
                    })
                    .then(data => {
                        // Handle the response data here
                        // console.log('asas',data);

                        // You can perform further actions based on the response
                        if (data.status == 1) {
                            // Success handling
                            toastr.success(data.message);
                            activityLog('Authentication App', getAddPasswordFormValue());
                            document.getElementById("add-password").submit();
                            // Wait for the AJAX request to complete before triggering the second form submission
                        } else {
                            // Failure handling
                            toastr.error(data.message);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
                } else {
                    // If the form is not valid, show an error message
                    toastr.error('OTP is required.');
                }
            });



            document.getElementById('passkey-validate').addEventListener('click', function () {

                // @if (file_exists(storage_path('app/public/passkey/' . str_replace('-', '', Auth::user()->id) . '/1.txt')))
                        showLoading();
                        check.a()
                            .then(() => {
                                // Check the condition after check.a() completes
                                // Continue with form submission
                                activityLog('Passkey',getAddPasswordFormValue());
                                document.getElementById("add-password").submit();
                                // Handle the case when the condition is not met
                            }).catch(error => {
                                // Handle errors from check.a()
                                console.error('Error in check.a()', error);
                            });
                    // @else
                    //     form.submit();
                    // @endif

            });




            function getOTP()
            {
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
                            email : $('#twoFactorEmail').val(),
                            number : $('#twoFactorMobileNumber').val()
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


            var check = {
                a: async () => {
                    return new Promise((resolve, reject) => {
                        helper.ajax(APP_URL + "webauthnvalid", {
                            phase: "a",
                        }, async (res) => {
                            try {
                                res = JSON.parse(res);
                                helper.bta(res);
                                check.b(await navigator.credentials.get(res, {
                                    userVerification: 'required'
                                }));
                                resolve
                            (); // Resolve the promise when the asynchronous operation is complete
                            } catch (e) {
                                // toastr.error('cancelled verify passkey');
                                // console.error(e);
                                hideLoading();
                                if (e instanceof DOMException) {
                                    // Show a Toastr error message for the specific DOMException
                                    toastr.error(e.message);
                                } else {
                                    // Handle other types of errors or rethrow if needed
                                    toastr.error(res);
                                    // throw e;
                                }
                                reject(e); // Reject the promise in case of an error
                            }
                        });
                    });
                },

                b: (cred) => {
                    helper.ajax(APP_URL + "webauthnvalid", {
                        phase: "b",
                        id: cred.rawId ? helper.atb(cred.rawId) : null,
                        client: cred.response.clientDataJSON ? helper.atb(cred.response.clientDataJSON) : null,
                        auth: cred.response.authenticatorData ? helper.atb(cred.response.authenticatorData) :
                            null,
                        sig: cred.response.signature ? helper.atb(cred.response.signature) : null,
                        user: cred.response.userHandle ? helper.atb(cred.response.userHandle) : null
                    }, res => {
                        hideLoading();
                        toastr.success(res);
                        console.log('bfun');
                    });
                }
            };


            $(document).on('click', '.view-password-details', function() {
                var data = $(this).data('item');
                console.log(data)
                $('#passKeyId').val(data.id);
                $('#title').html(data.title);
                $('#platformName').html(data.platform);
                // $('#accountId').html(data.accountId);
                $('#accountUrl').html(data.accountUrl);
                if (data.faviconUrl) {

                    $('#faviconUrl').attr("src", data.faviconUrl);
                } else {
                    $('#faviconUrl').attr("src", "{{ url('assets/img/no_favicon.png') }}");
                }
                // $('#createdAt').html(moment(data.createdAt).format('D MMM, YYYY H:mm'));
                $('#createdAt').html(data.createdTime);

                $('#ipAddress').html(data.ipAddress);

                var size = new TextEncoder("utf-8").encode(atob(data.password)).length;
                $('#password-size').html(size + " bytes");

            });

            // Pass key delete from modal
            $('#viewDetailModal').on('click', '.modal-passkey-delete', function() {
                $('#delete-pass-id').val($('#passKeyId').val());
                $('#passKeyDelete').modal('show');
            });
            //Box drop-down delete
            $('.modal-passkey-delete').on('click', function() {
                $('#delete-pass-id').val($(this).attr("data-id"));
                // $('#passKeyDelete').modal('show');
                @if (file_exists(storage_path('app/public/passkey/' . str_replace('-', '', Auth::user()->id) . '/1.txt')))
                    showLoading();
                    var validText = 'Delete';
                    validate.a($(this).attr("data-id"), validText);
                @else
                    $('#passKeyDelete').modal('show');
                @endif

            });
    </script>
    {{-- @dd(explode(' ',$passStorageInfo['avaliableSpace'])[0]); --}}
    <script>
        var donutChartCtx = document.getElementById('donutChart').getContext('2d');
            var data = {
                labels: ["", "", "", ""],
                // labels:["Used Space", "Available Space", "Total Uploaded Passwords", "Number of Platforms"],
                datasets: [{
                    data: [{{ $passStorageInfo['usedSpaceBytes'] }},
                        {{ $passStorageInfo['avaliableSpaceBytes'] }},
                        {{ $passStorageInfo['totalUploadedPassword'] }},
                        {{ $passStorageInfo['numberOfPlatforms'] }}
                    ],
                    // data: [{x: 1, y: 30}, {x: 2, y: 40}, {x: 3, y: 30}, {x: 4, y: 20}],
                    backgroundColor: ["#A1FF00", "#F5FFE3", "#FFF500", "#00D1FF"],
                    borderWidth: 0, // Set the desired border width
                    barPercentage: 0.0, // Adjust this value for spacing
                    pointRadius: 0, // Adjust this value for spacing
                    pointStyle: 'circle',
                }],
            };
            var options = {
                maintainAspectRatio: false, // Set to false to allow custom width and height
                responsive: true, // Set to true to make the chart responsive
                cutoutPercentage: 65,
                // rotation: 1 * Math.PI, // Set the rotation angle (in radians)
                legend: {
                    display: false, // Hide the legend (labels)
                },
                title: {
                    display: false, // Remove the title label
                },
                plugins: {
                    tooltip: {
                        enabled: false, // Remove tooltips
                    },
                }
            };
            var myChart = new Chart(donutChartCtx, {
                type: 'doughnut',
                data: data,
                options: options,
            });
    </script>

    <script>
        function activityLog(type, detail) {
                // Assuming you have the user object available

                // Construct the data you want to send in the AJAX request
                var data = {
                    type: type,
                    details: detail
                };

                $.ajax({
                    type: 'POST', // You can change this to 'GET' or other HTTP methods based on your requirement
                    url: "{{ route('ajaxActivityRequest') }}", // Replace this with the actual URL where you handle the AJAX request
                    data: data,
                    success: function(response) {
                        // Handle the success response here
                        console.log(response);
                    },
                    error: function(error) {
                        // Handle the error here
                        console.error('Error:', error);
                    }
                });
            }
    </script>

    <script>
        $(document).ready(function() {
                $('#primaryHsmId').change(function() {
                    var primaryHsmId = $(this).val();

                    // Make an Ajax request
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('updatePrimaryHsmId') }}",
                        data: {
                            primaryHsmId: primaryHsmId,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            // Reload the page
                            location.reload();
                        },
                        error: function(response) {
                            // alert('Error: ' + response.responseJSON.error);
                        }
                    });
                });
            });


            window.onload = function() {
                // After the main window has loaded, set a timer to open the popup
                console.log(localStorage.getItem('popupOpened'))
                if (localStorage.getItem('popupOpened')) {
                    openUploadFilePopup();
                    localStorage.setItem('popupOpened', '');
                }
            };


            const inputs = document.getElementById("inputs");

        inputs.addEventListener("input", function (e) {
          const target = e.target;
          const val = target.value;

          if (isNaN(val)) {
            target.value = "";
            return;
          }

          if (val != "") {
            const next = target.nextElementSibling;
            if (next) {
              next.focus();
            }
          }
        });

        inputs.addEventListener("keyup", function (e) {
          const target = e.target;
          const key = e.key.toLowerCase();

          if (key == "backspace" || key == "delete") {
            target.value = "";
            const prev = target.previousElementSibling;
            if (prev) {
              prev.focus();
            }
            return;
          }
        });
    </script>
    @endsection
