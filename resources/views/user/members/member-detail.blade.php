@extends('user.layouts.front')
@section('title', 'Member Detail')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="{{ url('assets/user/css/user-details.css') }}">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css"
    rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style type="text/css">
    .bootstrap-tagsinput .tag {
        margin-right: 2px;
        color: white !important;
        background-color: #0d6efd;
        padding: 0.2rem;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
        padding: 0.5em 0em;
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
            <h3>User Details</h3>
        </div>
        <div class="right-side">
            @include('user.common.profileView')
        </div>
    </div>
    <div class="content-view-box access-keys-list">


        <div class="user-detail-top d-flex flex-column flex-xl-row align-items-xl-center">
            <p>Users lets you encrypt content in the client's browser before any data is transmitted or stored in Google
                cloud-based storage. Google servers can't access your encryption keys stored in DSM.
            </p>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="general-box">
                    <div class="general-box-main pb-0">
                        <div class="row">
                            <div class="col-xxl-3 col-md-4 col-sm-6 mb-4">
                                <div class="border-box">
                                    <div class="user-detail">
                                        <div class="small-label">User Name</div>
                                        <p class="user-name">{{ $userDetails->userName ?? '-' }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-4 col-sm-6 mb-4">
                                <div class="border-box">
                                    <div class="small-label">User Role</div>
                                    <p>{{ $userDesignation ? $userDesignation['getUserRole']['roleName'] : '-' }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-4 col-sm-6 mb-4 ">
                                <div class="border-box">
                                    <div class="small-label">Email Address</div>
                                    <p>{{ $userDetails->email ?? '-' }}</p>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-4 col-sm-6 mb-4">
                                <div class="border-box">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="small-label">Employee ID</div>
                                        <button class="general-color text-sm user-uuid" data-id={{
                                            $userDetails->employeeId }}>
                                            <svg width="14" height="17" viewBox="0 0 17 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6 16C5.45 16 4.97933 15.8043 4.588 15.413C4.196 15.021 4 14.55 4 14V2C4 1.45 4.196 0.979 4.588 0.587C4.97933 0.195667 5.45 0 6 0H15C15.55 0 16.021 0.195667 16.413 0.587C16.8043 0.979 17 1.45 17 2V14C17 14.55 16.8043 15.021 16.413 15.413C16.021 15.8043 15.55 16 15 16H6ZM2 20C1.45 20 0.979 19.8043 0.587 19.413C0.195667 19.021 0 18.55 0 18V5C0 4.71667 0.0960001 4.479 0.288 4.287C0.479333 4.09567 0.716667 4 1 4C1.28333 4 1.521 4.09567 1.713 4.287C1.90433 4.479 2 4.71667 2 5V18H12C12.2833 18 12.521 18.096 12.713 18.288C12.9043 18.4793 13 18.7167 13 19C13 19.2833 12.9043 19.5207 12.713 19.712C12.521 19.904 12.2833 20 12 20H2Z"
                                                    fill="#A1FF00" />
                                            </svg>
                                            <small>Copy</small>
                                        </button>
                                    </div>
                                    <p>{{ $userDetails->employeeId ?? '-' }}</p>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-4 col-sm-6 mb-4">
                                <div class="border-box">
                                    <div class="small-label">Created Date</div>
                                    <p>{{ $userDetails->userCreatedAtFormat ?? '-' }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-4 col-sm-6 mb-4">
                                <div class="border-box">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="small-label">UUID</div>
                                        <button class="general-color text-sm user-uuid" data-id={{ $userDetails->userId
                                            }}>
                                            <svg width="14" height="17" viewBox="0 0 17 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6 16C5.45 16 4.97933 15.8043 4.588 15.413C4.196 15.021 4 14.55 4 14V2C4 1.45 4.196 0.979 4.588 0.587C4.97933 0.195667 5.45 0 6 0H15C15.55 0 16.021 0.195667 16.413 0.587C16.8043 0.979 17 1.45 17 2V14C17 14.55 16.8043 15.021 16.413 15.413C16.021 15.8043 15.55 16 15 16H6ZM2 20C1.45 20 0.979 19.8043 0.587 19.413C0.195667 19.021 0 18.55 0 18V5C0 4.71667 0.0960001 4.479 0.288 4.287C0.479333 4.09567 0.716667 4 1 4C1.28333 4 1.521 4.09567 1.713 4.287C1.90433 4.479 2 4.71667 2 5V18H12C12.2833 18 12.521 18.096 12.713 18.288C12.9043 18.4793 13 18.7167 13 19C13 19.2833 12.9043 19.5207 12.713 19.712C12.521 19.904 12.2833 20 12 20H2Z"
                                                    fill="#A1FF00" />
                                            </svg>
                                            <small>Copy</small>
                                        </button>
                                    </div>

                                    <p>{{ $userDetails->userId ?? '-' }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-4 col-sm-6 mb-4">
                                <div class="border-box">
                                    <div class="small-label">IP Address</div>
                                    <p>{{ request()->ip() ?? '-' }}</p>
                                </div>
                            </div>

                            <div class="col-xxl-3 col-md-4 col-sm-6 mb-4">
                                <div class="border-box">
                                    <div class="small-label">Status</div>
                                    @if ($userDetails->userStatus == 2)
                                    <span class="text-warning">Invited</span>
                                    @else
                                    <div class="custom-switch d-flex align-items-center small-switch me-2 me-xxl-3">
                                        <input class="btnChangeStatus" name="isActive" type="checkbox" role="switch"
                                            id="switchCheckDefault"
                                            data-url="{{ route('business.status', ['business' => $userDetails->userId]) }}"
                                            {{ $userDetails->userStatus == 1 ? 'checked' : '' }}>
                                        <span for="switchCheckDefault" class="ms-2" id="changeStatusText">{{
                                            $userDetails->userStatus == 1 ? 'Active' : 'Inactive' }}</span>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-box-parent">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="security-tab" data-bs-toggle="tab" data-bs-target="#security"
                        type="button" role="tab" aria-controls="security" aria-selected="true">Role
                        Management</button>
                    <button class="nav-link" id="activity-tab" data-bs-toggle="tab" data-bs-target="#activity"
                        type="button" role="tab" aria-controls="activity" aria-selected="false">Activity
                        Log</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="security" role="tabpanel" aria-labelledby="security-tab">
                    <div class="general-box general-box-main">

                        @if($userHsm->count() == 0)
                        <div class="d-flex row "> <span class="text-center">No record found!</span> </div>
                        @endif

                        <div class="d-flex flex-wrap">
                            @foreach ($userHsm as $key => $hsm)
                            <div class="radio-role">
                                <input id="role{{ $key }}" type="radio" name="role"
                                    onclick="toggleDivVisibility({{ $key }})" {{ $key==0 ? 'checked' : '' }} />
                                <label for="role{{ $key }}">HSM {{ $key + 1 }}</label>
                            </div>
                            @endforeach
                        </div>

                        @foreach ($userHsm as $keys => $hsmData)
                        <div class="row" id="myDiv_{{ $keys }}"
                            style="{{ $keys == 0 ? 'display: flex;' : 'display: none;' }}">
                            <div class="col-xxl-3 col-sm-6 mt-4">
                                <div class="border-box">
                                    <div class="small-label">HSM Name</div>
                                    <p class="user-name">{{ $hsmData->hsmName }}</p>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-sm-6 mt-4">
                                <div class="border-box">
                                    <div class="small-label">HSM Located In</div>
                                    <p class="user-name">{{ $hsmData->hsmLocation }}</p>
                                </div>
                            </div>
                            <div class="col-xxl-6">
                                <div class="border-box mt-4">
                                    <div class="row align-items-center">
                                        <div class="container text-center pie-chart-box">
                                            <canvas id="donutChart{{ $keys }}" width="40" height="50"
                                                class="chartjs-render-monitor"></canvas>
                                        </div>
                                        <div class="col-6 col-sm-3 position-relative" style="padding-left: 20px">
                                            <label class="space used">Used Space</label>
                                            <span>{{ App\Helpers\CommonHelper::formatSizeUnits($hsmData->usedSpace) ?? 0
                                                }}</span>
                                        </div>
                                        <div class="col-6 col-sm-3 position-relative" style="padding-left: 20px">
                                            <label class="space available">Remaining Space</label>
                                            <span>{{ App\Helpers\CommonHelper::formatSizeUnits($hsmData->availableSpace)
                                                ?? 0 }}</span>
                                        </div>
                                        <div class="col-6 col-sm-3">
                                            <label class="">Total Space</label>
                                            <span>{{
                                                App\Helpers\CommonHelper::formatSizeUnits($hsmData->allocatedStorage) ??
                                                0 }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="role-tags" id="tags_{{ $keys }}"
                            style="{{ $keys == 0 ? 'display: flex;' : 'display: none;' }}">
                            @php
                            $authentication = is_array($userDesignation->getUserRole->authentication) ? implode(', ',
                            $userDesignation->getUserRole->authentication) : '';
                            $device = is_array($userDesignation->getUserRole->device) ? implode(', ',
                            $userDesignation->getUserRole->device) : '';
                            $browser = is_array($userDesignation->getUserRole->browser) ? implode(', ',
                            $userDesignation->getUserRole->browser) : '';
                            @endphp
                            @if ($userDesignation->getUserRole->numberPassword)
                            <p>{{ $userDesignation->getUserRole->numberPassword }} Passwords</p>
                            @endif
                            @if ($userDesignation->getUserRole->numberApplication)
                            <p>{{ $userDesignation->getUserRole->numberApplication }} Applications</p>
                            @endif
                            @if ($authentication)
                            <p>{{ $authentication }}</p>
                            @endif
                            @if ($device)
                            <p>{{ $device }}</p>
                            @endif
                            @if ($browser)
                            <p>{{ $browser }}</p>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade" id="activity" role="tabpanel" aria-labelledby="activity-tab">
                    <div class="activity-tab-content">
                        <div class="table-view search-bar-full table-view search-bar-full">
                            <table id="custom-datatable"
                                class="display nowrap table table-hover table-striped table-bordered last-cl-fxied"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th width="7%">No.</th>
                                        <th>Created At</th>
                                        <th>Actor</th>
                                        <th>Log Time</th>
                                        <th>IP Address</th>
                                        <th>URL</th>
                                        <th>Descriptions</th>
                                        <th>Access Mode</th>
                                        <th>Strength</th>
                                        <th>Browser</th>
                                        <th>HSM Device</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {{--  --}}

            </div>
        </div>
    </div>
</div>

{{-- User edit modal --}}
<div class="modal fade dark-popup" id="userEditModel" aria-hidden="true" data-bs-backdrop="static"
    aria-labelledby="userEditModelLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content black-bg">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="userEditModelLabel">Edit Role</h5>
                <p class="text-center"><small>Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint.
                        Velit officia.</small></p>
            </div>

            <div class="modal-body custom-design">
                <h5 class="modal-title" id="userEditModelLabel">Edit Permissions</h5>
                <form action="{{ route('updateMember') }}" class="edit-user" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="edit-user-id" name="id" value="">
                    <div class="form-check pop-box-form mb-3">
                        @foreach ($customRoles as $role)
                        <div class="input-item-box">
                            <input class="form-check-input" type="checkbox" name="userRole[]" value="{{ $role->id }}"
                                id="editUser_{{ $role->id }}">
                            <label class="form-check-label" for="editUser_{{ $role->id }}">{{ $role->roleName }}</label>
                        </div>
                        <label id="userRole[]-error" class="error" style="display: none;" for="userRole[]">Please
                            select at least one types of role.</label>
                        @endforeach
                    </div>
                    <div class="save-box justify-content-center">
                        <button onclick="window.location.reload();" data-bs-dismiss="modal" aria-label="Close"
                            class="submit-btn border-white-btn">CANCEL</button>
                        <button type="submit" class="submit-btn upload small-btn">SAVE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="status-confirmation-modal" class="modal dark-popup overflow-y-auto show" tabindex="-1" aria-hidden="false"
    style="margin-top: 0px; margin-left: 0px; padding-left: 0px; z-index: 10000;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center">Are you sure?</h5>
            </div>
            <div class="modal-body text-center">
                <h6 id="statusTitle"></h6>
                <div class="save-box justify-content-center ">
                    <button type="button" id="statusCancel" data-bs-dismiss="modal"
                        class="submit-btn btn border-white-btn backBtn">Cancel</button>
                    <button type="button" id="statusData" class="submit-btn btn upload primary-btn ">Change</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- cloud file and hsm Modal -->
<div class="modal fade view-detail-modal-box dark-popup" id="viewDetailsModal" tabindex="-1"
    aria-labelledby="viewDetailsModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg vertical-align-center">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title d-block text-center" id="uploadModalLabel">Google Cloud Key_01</h5>
                <p class="small-text d-block text-center">Amet minim mollit non deserunt ullamco est sit aliqua
                    dolor
                    do amet sint. Velit officia.</p>
            </div>
            <div class="modal-body">
                <input type="hidden" id="cloudId" name='cloudId'>
                <div class="popup-section-title">Object Overview</div>
                <div class="general-box general-box-main">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <div class="border-box">
                                <div class="small-label">User Name</div>
                                <p id="userName">-</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="border-box">
                                <div class="small-label">Digital Key</div>
                                <p id="securityKey" class="text-break">-</p>
                                <button type="button" class="dataKey">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="18" viewBox="0 0 15 18"
                                        fill="none">
                                        <path
                                            d="M5.5 13.9998C5.04167 13.9998 4.64944 13.8368 4.32333 13.5107C3.99667 13.184 3.83333 12.7915 3.83333 12.3332V2.33317C3.83333 1.87484 3.99667 1.48234 4.32333 1.15567C4.64944 0.829559 5.04167 0.666504 5.5 0.666504H13C13.4583 0.666504 13.8508 0.829559 14.1775 1.15567C14.5036 1.48234 14.6667 1.87484 14.6667 2.33317V12.3332C14.6667 12.7915 14.5036 13.184 14.1775 13.5107C13.8508 13.8368 13.4583 13.9998 13 13.9998H5.5ZM2.16667 17.3332C1.70833 17.3332 1.31583 17.1701 0.989167 16.844C0.663055 16.5173 0.5 16.1248 0.5 15.6665V4.83317C0.5 4.59706 0.58 4.399 0.74 4.239C0.899445 4.07956 1.09722 3.99984 1.33333 3.99984C1.56944 3.99984 1.7675 4.07956 1.9275 4.239C2.08694 4.399 2.16667 4.59706 2.16667 4.83317V15.6665H10.5C10.7361 15.6665 10.9342 15.7465 11.0942 15.9065C11.2536 16.0659 11.3333 16.2637 11.3333 16.4998C11.3333 16.7359 11.2536 16.9337 11.0942 17.0932C10.9342 17.2532 10.7361 17.3332 10.5 17.3332H2.16667Z"
                                            fill="#A1FF00" />
                                    </svg>
                                    <p class="small-text green-content">Copy Key</p>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="border-box">
                                <div class="small-label">Description</div>
                                <p class="small-text" id="fileDescription">-</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border-box">
                                <div class="small-label">Key Type</div>
                                <p class="small-text"><img src="{{ url('images/icon-google-cloud.png') }}" alt="">
                                    Google Could</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border-box">
                                <div class="small-label">Size</div>
                                <p class="small-text" id="fileSize">-</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border-box">
                                <div class="small-label">IP Address</div>
                                <p class="small-text" id="ipAddress">-</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border-box">
                                <div class="small-label">Uploaded Time</div>
                                <p class="small-text" id="createdTime">-</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="popup-section-title">HSM Status</div>
                <div class="general-box general-box-main">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="border-box">
                                <div class="small-label">HSM Name</div>
                                <p class="small-text" id="hsmName">-</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border-box">
                                <div class="small-label">HSM Located In</div>
                                <p class="small-text" id="location">-</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border-box">
                                <div class="small-label">Available Space</div>
                                <p class="small-text" id="availableStorage">-</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border-box">
                                <div class="small-label">Status</div>
                                <p class="small-text" id="HSMStatus">-</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="popup-section-title">Blockchain Status</div>
                <div class="general-box general-box-main">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="border-box">
                                <div class="small-label">Status</div>
                                <p class="small-text" id="blockChainStatus">-</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-action">
                    <button type="submit" class="btn denger-button modal-accessKey-delete">DELETE KEY</button>
                    <button type="submit" class="btn primary-btn backBtn" data-bs-dismiss="modal">BACK</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')
<script type="text/javascript" src="{{ url('assets/js/Chart.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    function toggleDivVisibility(val) {
            var myDiv = document.getElementById("myDiv_" + val);
            var tagsDiv = document.getElementById("tags_" + val);

            // Hide all divs
            for (var i = 0; i < {{ count($userHsm) }}; i++) {
                var currentDiv = document.getElementById("myDiv_" + i);
                var currentTagsDiv = document.getElementById("tags_" + i);

                if (i == val) {
                    // Show the selected div
                    currentDiv.style.display = 'flex';
                    currentTagsDiv.style.display = 'flex';
                } else {
                    // Hide other divs
                    currentDiv.style.display = 'none';
                    currentTagsDiv.style.display = 'none';
                }
            }
        }

        // Copy UUID User
        $('.user-uuid').on('click', function() {
            // Get the text you want to copy
            var text = $(this).attr("data-id");
            // Create a temporary textarea element
            var textarea = document.createElement("textarea");
            // Set the value of the textarea element to the text you want to copy
            textarea.value = text;
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
        });

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        // --------- Status ---------

        $(".custom-switch").on('click', '.btnChangeStatus', function() {
            $('#status-confirmation-modal').modal('show');
            var status = $(this).prop('checked') == true ? "activate" : "inactive";
            $('#statusTitle').text('Do you really want to ' + status + ' this record?');
            $('#statusData').attr('data-status-link', $(this).attr('data-url'));
        });

        $('#statusData').click(function() {
            $('.loader').show();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            console.log($(this).attr('data-status-link'));
            $.ajax({
                url: $(this).attr('data-status-link'),
                cache: false,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function(result) {
                    $('.loader').hide();
                    $("#status-confirmation-modal").modal('hide');

                    //Text Active Inactive
                    $("#changeStatusText").fadeOut(function() {
                        $("#changeStatusText").text(($("#changeStatusText").text() ==
                            'Inactive') ? 'Active' : 'Inactive').fadeIn();
                    })

                    if (result.status == 1) {
                        toastr.success(result.message);
                        $(".form-check-label").load(location.href + " .form-check-label");
                        return true;
                    }
                    toastr.error(result.message);
                },
                error: function(error) {
                    console.log(error);
                    $('.loader').hide();
                    $("#status-confirmation-modal").modal('hide');
                }
            });
        });

        // --------- End status ---------

        // ---------- open and edit modal ----------

        function edit() {
            $('.loader').show();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#name').removeClass('error');

            $.ajax({
                url: "{{ route('business.edit', ['business' => $userDetails->userId]) }}",
                type: 'GET',
                success: function(result) {

                    $('.loader').hide();
                    if (result.status == 1) {

                        $("#userEditModel").modal('show');
                        $('#edit-user-id').val(result.result.userId);
                        result.result.editMember.forEach(element => {
                            $(`#editUser_${element.roleId}`).prop('checked', true);
                        });
                        return true;
                    }
                    $.toast({
                        heading: 'Error',
                        text: result.message,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        loader: false,
                    });
                },
                error: function(error) {
                    console.log(error);
                    $('.loader').hide();
                    $("#userEditModel").modal('hide');
                }
            });
        }

        // ---------- end modal ----------

        // -------------- Activity log table --------------

        var table;
        $(function() {
            table = $('#custom-datatable').DataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
                lengthMenu: [10, 25, 50, 100, 200],
                language: {
                    searchPlaceholder: "Search with activity log here"
                },
                "ajax": {
                    "url": "{{ url(route('business.searchActivityLog')) }}",
                    "type": "POST",
                    "headers": {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    "async": false,
                    "data": function(d) {
                        d.userId = "{{ $userDetails->userId }}";
                    }

                },
                columns: [{
                        data: 'sr_no',
                        name: 'sr_no',
                        orderable: false,
                        visible: false
                    },
                    {
                        data: 'createdAt',
                        name: 'createdAt',
                        visible: false
                    },
                    {
                        data: 'email',
                        name: 'email',
                    },
                    {
                        data: 'createdAtFormat',
                        name: 'createdAtFormat',
                    },
                    {
                        data: 'ipAddress',
                        name: 'ipAddress',
                    },
                    {
                        data: 'url',
                        name: 'url',
                    },
                    {
                        data: "description",
                        name: "description"
                    },
                    {
                        data: "accessMode",
                        name: "accessMode"
                    },
                    {
                        data: "strength",
                        name: "strength"
                    },
                    {
                        data: "browser",
                        name: "browser"
                    },
                    {
                        data: "name",
                        name: "name"
                    },

                ],
                "aaSorting": [
                    [1, 'desc']
                ],
                "pageLength": 10
            });

        });

        // column adjust
        $('button[data-bs-toggle="tab"]').on('shown.bs.tab', function(e) {
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust();
        });

        // -------------- End activity log table --------------


        // cloud and hsm file modal data


        // reload page on modal's back button
        $('.backBtn').on('click', function() {
            window.location.reload();
        });

        // acces key delete from view card
        $('#accessKeyDiv').on('click', '.accessKey-delete', function() {
            $('#delete-cloud-id').val($(this).attr("data-id"));
            $('#cloudDelete').modal('show');
        });

        // acces key delete from modal
        $('#viewDetailsModal').on('click', '.modal-accessKey-delete', function() {
            $('#delete-cloud-id').val($('#cloudId').val());
            $('#cloudDelete').modal('show');
        });

        // input tags
        $(function() {
            $('input')
                .on('change', function(event) {
                    var $element = $(event.target);
                    var $container = $element.closest('.example');

                    if (!$element.data('tagsinput')) return;

                    var val = $element.val();
                    if (val === null) val = 'null';
                    var items = $element.tagsinput('items');

                    $('code', $('pre.val', $container)).html(
                        $.isArray(val) ?
                        JSON.stringify(val) :
                        '"' + val.replace('"', '\\"') + '"'
                    );
                    $('code', $('pre.items', $container)).html(
                        JSON.stringify($element.tagsinput('items'))
                    );
                })
                .trigger('change');
        });

        // select2
        $(document).ready(function() {
            $('.select2Multiple2').select2();
        });

        // search User Name
        $(document).ready(function() {
            $('#searchUserName').on('keyup', function() {
                var value = $(this).val().toLowerCase();
                console.log(value);
                $('div[data-role="userSearch"]').filter(function() {
                    $(this).toggle($(this).find('#searchUser').text().toLowerCase().indexOf(value) >
                        -1)
                });
            });
        });

        // Copy Access Key
        $('#viewDetailsModal').on('click', '.dataKey', function() {
            // Create a textarea element
            var textarea = document.createElement('textarea');
            textarea.value = $('#securityKey').html();

            // Append the textarea to the document body
            document.body.appendChild(textarea);

            // Select the text in the textarea
            textarea.select();

            // Use the Clipboard API to copy the selected text to the clipboard
            navigator.clipboard.writeText(textarea.value)
                .then(function() {
                    toastr.options = {
                        "closeButton": true
                    }
                    toastr.success("Copied!");
                })
                .catch(function(error) {
                    console.error('Error copying text to clipboard:', error);
                    toastr.error('Error copying text to clipboard:', error);
                });

            // Remove the textarea from the document body (optional)
            document.body.removeChild(textarea);
        });
</script>

<script>
    var canvas = document.getElementById('mychart');
        function convertToGB(size, unit) {
            var bytes = size;

            // Convert to bytes based on the unit
            switch (unit) {
                case 'B':
                    // No conversion needed for bytes
                    break;
                case 'KB':
                    bytes *= 1024; // 1 KB = 1024 bytes
                    break;
                case 'MB':
                    bytes *= 1048576; // 1 MB = 1,048,576 bytes
                    break;
                case 'GB':
                    bytes *= 1073741824; // 1 GB = 1,073,741,824 bytes
                    break;
            }

            var gb = bytes / 1073741824; // Convert bytes to GB
            return gb;
        }



        var userdDataConvertIntoBytes = convertToGB("{{ $doughnutChartUploadedKeys }}",
            "{{ $doughnutChartUploadedKeysRs }}");
        var availableDataConvertIntoBytes = convertToGB("{{ $doughnutChartOccupidedSpace }}",
            "{{ $doughnutChartOccupidedSpaceRs }}");

        var textInside = "{{ $passStorageInfo['avaliableSpace'] }}";
        new Chart(canvas, {
            type: "doughnut",
            data: {
                labels: ["Uploaded", "Occupied"],
                datasets: [{
                    data: [{{ explode(' ', $passStorageInfo['usedSpace'])[0] }},
                        {{ $passStorageInfo['avaliableSpaceBytes'] }}
                    ],
                    borderColor: ['#A1FF00', '#F5FFE3'], // Add custom color border
                    backgroundColor: ['#A1FF00',
                        '#F5FFE3'
                    ], // Add custom color background (Points and Fill)
                    borderWidth: 1 // Specify bar border width
                }]
            },
            options: {
                responsive: true,
                legend: false,
                cutoutPercentage: 65,
                plugins: {
                    legend: {
                        display: false
                    }
                }
            },
            plugins: [{
                id: 'text',
                beforeDraw: function(chart, a, b) {
                    var width = chart.width,
                        height = chart.height,
                        ctx = chart.ctx;

                    ctx.restore();
                    var fontSize = (height / 114).toFixed(2);
                    ctx.font = fontSize + "em sans-serif";
                    ctx.textBaseline = "middle";
                    ctx.fillStyle = "white";
                    var text = textInside,
                        textX = Math.round((width - ctx.measureText(text).width) / 2),
                        textY = height / 2;

                    ctx.fillText(text, textX, textY);
                    ctx.save();
                }
            }]
        });
</script>

<script>
    function createChart(canvas, textInside, usedSpace, availableSpace) {
            new Chart(canvas, {
                type: "doughnut",
                data: {
                    labels: ["Used Space", "Remaining Space"],
                    datasets: [{
                        data: [usedSpace, availableSpace],
                        borderColor: ['#A1FF00', '#F5FFE3'],
                        backgroundColor: ['#A1FF00', '#F5FFE3'],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    legend: false,
                    cutoutPercentage: 65,
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                },
                plugins: [{
                    id: 'text',
                    beforeDraw: function(chart, a, b) {
                        var width = chart.width,
                            height = chart.height,
                            ctx = chart.ctx;

                        ctx.restore();
                        var fontSize = (height / 114).toFixed(2);
                        ctx.font = fontSize + "em sans-serif";
                        ctx.textBaseline = "middle";
                        ctx.fillStyle = "white";
                        var currentText = textInside();
                        var textX = Math.round((width - ctx.measureText(currentText).width) / 2);
                        var textY = height / 2;

                        ctx.fillText(currentText, textX, textY);
                        ctx.save();
                    }
                }]
            });
        }

        @foreach ($userHsm as $keys => $hsmData)
            var canvas = document.getElementById('donutChart{{ $keys }}');

            // Dynamically set textInside based on the current $hsm record
            var textInside = function() {
                return "";
            };

            createChart(canvas, textInside, "{{ $hsmData->usedSpace }}", "{{ $hsmData->availableSpace }}");
        @endforeach
</script>
@endsection
