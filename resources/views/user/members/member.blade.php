@extends('user.layouts.front')
@section('title', 'Users')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
@section('css')
<link rel="stylesheet" href="{{ url('assets/user/css/access-keys.css') }}">
<style>
    .dataTables_scrollBody {
        min-height: 300px
    }
</style>
@endsection
@section('content')

<div class="content-panel themeColor">
    <div class="top-panel">
        <div class="left-side">
            <button class="head-nav">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px">
                    <path d="M0 0h24v24H0V0z" fill="none" />
                    <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z" />
                </svg>
            </button>
            <h3 class="fontColor">Users</h3>
        </div>
        <div class="right-side">
            @include('user.common.profileView')
        </div>
    </div>
    <div class="content-view-box">
        <div class="table-view search-bar-full">
            @if (App\Helpers\CommonHelper::getUserCustomMultipleRoles('addMember', 'members') || Auth::user()->role ==
            'business')
            <div class="upload-box">
                <p>Users lets you encrypt content in the client's browser before any data is transmitted or
                    stored in Google cloud-based storage. Google servers can't access your encryption keys
                    stored in
                    DSM.
                </p>
                <div class="d-flex align-items-center update-status">
                    <button class="upload small-btn fw-bolder" data-bs-toggle="modal" onclick="openAddMemberPopup()"
                        role="button"><svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M1.18112 7.18075L1.18075 7.18112C0.960017 7.40262 0.85 7.67898 0.85 8C0.85 8.32103 0.960028 8.59716 1.18093 8.81807C1.4024 9.03953 1.67881 9.15 2 9.15H6.85V14C6.85 14.3211 6.96039 14.5972 7.18186 14.818C7.40271 15.0396 7.67886 15.15 8 15.15C8.32119 15.15 8.5976 15.0395 8.81907 14.8181C9.03997 14.5972 9.15 14.321 9.15 14V9.15H14C14.3211 9.15 14.5972 9.03961 14.818 8.81814C15.0396 8.59729 15.15 8.32114 15.15 8C15.15 7.67881 15.0395 7.4024 14.8181 7.18093C14.5972 6.96003 14.321 6.85 14 6.85H9.15V2C9.15 1.67898 9.03998 1.40262 8.81925 1.18112L8.81888 1.18075C8.59738 0.960017 8.32102 0.85 8 0.85C7.67897 0.85 7.40284 0.960028 7.18193 1.18093C6.96047 1.4024 6.85 1.67881 6.85 2V6.85H2C1.67898 6.85 1.40262 6.96002 1.18112 7.18075Z"
                                fill="black" stroke="black" stroke-width="0.3" />
                        </svg> Add User</button>
                </div>
            </div>
            @endif
            <table id="custom-datatable"
                class="display nowrap table table-hover table-striped table-bordered last-cl-fxied" cellspacing="0"
                width="100%">
                <thead>
                    <tr>
                        <th width="7%">No.</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>IP Address</th>
                        @if (App\Helpers\CommonHelper::getUserCustomMultipleRoles('changeMemberStatus', 'members') ||
                        Auth::user()->role == 'business')
                        <th width="11%">Status</th>
                        @endif
                        <th>Passwords</th>
                        <th>Created Date</th>
                        <th>Browser</th>
                        <th>Last Login</th>
                        <th width="10px">Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- add modal --}}
<div class="modal fade dark-popup" id="userModel" aria-hidden="true" data-bs-backdrop="static"
    aria-labelledby="userModelLabel" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="userModelLabel">Add New User</h5>
                <p class="text-center"><small>Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint.
                        Velit officia.</small></p>
            </div>
            <div class="modal-body custom-design add-new-user">
                <form action="{{ route('addMember') }}" class="user-profile" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="id" name="id" value="{{ Auth::user()->id }}">
                    <input type="hidden" id="empId" name="empId" value="{{ Auth::user()->companyName }}">
                    <div class="input-grp">
                        <label>Email Address*</label>
                        <input type="email" name="email" id="email" placeholder="Enter invitee's email address here">
                    </div>

                    <div class="input-grp">
                        <label>Username*</label>
                        <input type="username" name="username" id="username"
                            placeholder="Enter Invitee's Last name here">
                    </div>

                    <div class="input-grp">
                        <div class="position-realtive btn-input">
                            <label>Employee ID</label>
                            <input type="text" name="employeeId" id="employeeId"
                                placeholder="Enter invitee's employee ID here">
                            <p onclick="generateEmpId()"
                                style="color:#A1FF00; margin-top: -47px; margin-right: 45px; float: right; cursor: pointer;">
                                Generate</p>
                            <i id="validation-icon-success" class="fas fa-check-circle"
                                style="color:#A1FF00; display: none; margin-top: -44px; margin-right: 15px;float: right;"></i>
                            <i id="validation-icon-error" class="fas fa-times-circle text-danger"
                                style="display: none; margin-top: -44px; margin-right: 15px;float: right;"></i>
                        </div>
                        <label id="employeeId-error" style="display: none;" class="error" for="employeeId">Please enter
                            employee ID</label>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-grp">
                                <label>First Name</label>
                                <input type="text" name="firstName" id="firstName"
                                    placeholder="Enter Invitee's First name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-grp">
                                <label>Last Name</label>
                                <input type="text" name="lastName" id="lastName"
                                    placeholder="Enter Invitee's Last name">
                            </div>
                        </div>
                    </div>
                    <div class="save-box justify-content-center">
                        <button onclick="window.location.reload();" data-bs-dismiss="modal" aria-label="Close"
                            class="submit-btn btn border-white-btn">CANCEL</button>
                        <button type="submit" class="submit-btn btn upload primary-btn ">INVITE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- edit modal --}}
<div class="modal fade upload-modal-box dark-popup" id="userEditModel" tabindex="-1"
    aria-labelledby="userEditModelLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content top-border">
            <div class="modal-header">

                <h5 class="modal-title d-block text-center" id="userEditModelLabel">Edit User</h5>
                <p class="small-text d-block text-center">Amet minim mollit non deserunt ullamco est sit aliqua dolor
                    do amet sint. Velit officia.</p>
            </div>
            <div class="modal-body">
                <form class="edit-user" action="{{ route('updateMember') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="edit-user-id" name="id" value="">
                    <div class="input-area">
                        <div class="input-parent">
                            <label>User Name</label>
                            <input type="text" name="userName" id="userName" value=""
                                placeholder="Please enter user name">
                        </div>

                        <div class="input-parent">
                            <label>Email Address</label>
                            <input type="text" name="email" id="edit-email" value="" placeholder="Please enter email">
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-grp">
                                    <label>First Name</label>
                                    <input type="text" name="firstName" id="first-name"
                                        placeholder="Enter Invitee's First name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-grp">
                                    <label>Last Name</label>
                                    <input type="text" name="lastName" id="last-name"
                                        placeholder="Enter Invitee's Last name">
                                </div>
                            </div>
                        </div>

                        <div class="input-parent editIsActive">
                            <label>Status</label>
                            <select class="form-control" name="isActive" id="isActive">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>

                        <div class="box-action">
                            <button type="button" class="btn cancel-btn" data-bs-dismiss="modal">CANCEL</button>
                            <button type="submit" class="btn primary-btn" id="upload-file">CONFIRM</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- delete key modal --}}
<div class="modal fade dark-popup" id="userDelete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-hidden="true" aria-labelledby="userDeleteLabel">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('userDelete') }}" method="POST">
                @csrf
                <input type="hidden" id="delete-user-id" name="id">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="userDeleteLabel">Delete</h5>
                </div>
                <div class="modal-body">
                    <h6>Are you sure you want to delete this User?</h6>

                    <div class="save-box justify-content-center ">
                        <button data-bs-dismiss="modal" aria-label="Close"
                            class="submit-btn btn border-white-btn">CANCEL</button>
                        <button type="submit" id="submit" class="submit-btn btn upload primary-btn "
                            onclick="#">Delete</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- status modal --}}
<div id="status-confirmation-modal" class="modal dark-popup overflow-y-auto show" tabindex="-1" aria-hidden="false"
    style="margin-top: 0px; margin-left: 0px; padding-left: 0px; z-index: 10000;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center">Are you sure?</h5>
            </div>
            <div class="modal-body text-center">
                <h6 id="statusTitle"></h6>
                <div class="save-box justify-content-center">
                    <button onclick="window.location.reload();" type="button" id="statusCancel" data-bs-dismiss="modal"
                        class="submit-btn btn border-white-btn">Cancel</button>
                    <button type="button" id="statusData" class="submit-btn btn upload primary-btn ">Change</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Succesful popup -->
<div class="modal fade" id="successful" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-hidden="true" aria-labelledby="successfulLabel">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successfulLabel">Successful!</h5>
            </div>
            <div class="modal-body">
                <h4>Invitation Sent successfully on Email and Phone. Ask Invitee to open the received link to Access.
                </h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn upload small-btn" data-bs-dismiss="modal" aria-label="Close"
                    onclick="deleteSuccessful()">OK</button>
            </div>
        </div>
    </div>
</div>


{{-- add role modal --}}
<div class="modal fade dark-popup" id="employeeRoleModel" aria-hidden="true" data-bs-backdrop="static"
    aria-labelledby="employeeRoleModelLabel" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content top-border">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="employeeRoleModelLabel">Assign Role Permission</h5>
            </div>
            <div class="modal-body custom-design add-new-user">
                <form action="{{ route('business.addUpdateRole') }}" class="admin-user-role" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="employee-id" name="id" value="">
                    <div class="input-form">
                        <div class="form-check pop-box-form mb-3 mt-4">
                            @foreach ($customRoles as $key => $role)
                            <div class="input-item-box">
                                <input type="radio" id="userRole_{{ $key }}" name="userRole" value="{{ $role->id }}" {{
                                    $key==0 ? 'checked' : '' }} />
                                <label for="userRole_{{ $key }}" class="form-check-label">{{ $role->roleName }}</label>
                                <span class="text-sm d-block">{{ $role->roleDescription }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="save-box justify-content-center ">
                        <button onclick="window.location.reload();" data-bs-dismiss="modal" aria-label="Close"
                            class="submit-btn btn border-white-btn">CANCEL</button>
                        <a class="submit-btn btn upload primary-btn me-3" onclick="createCustomRole()"><svg width="16"
                                height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M1.18112 7.18075L1.18075 7.18112C0.960017 7.40262 0.85 7.67898 0.85 8C0.85 8.32103 0.960028 8.59716 1.18093 8.81807C1.4024 9.03953 1.67881 9.15 2 9.15H6.85V14C6.85 14.3211 6.96039 14.5972 7.18186 14.818C7.40271 15.0396 7.67886 15.15 8 15.15C8.32119 15.15 8.5976 15.0395 8.81907 14.8181C9.03997 14.5972 9.15 14.321 9.15 14V9.15H14C14.3211 9.15 14.5972 9.03961 14.818 8.81814C15.0396 8.59729 15.15 8.32114 15.15 8C15.15 7.67881 15.0395 7.4024 14.8181 7.18093C14.5972 6.96003 14.321 6.85 14 6.85H9.15V2C9.15 1.67898 9.03998 1.40262 8.81925 1.18112L8.81888 1.18075C8.59738 0.960017 8.32102 0.85 8 0.85C7.67897 0.85 7.40284 0.960028 7.18193 1.18093C6.96047 1.4024 6.85 1.67881 6.85 2V6.85H2C1.67898 6.85 1.40262 6.96002 1.18112 7.18075Z"
                                    fill="black" stroke="black" stroke-width="0.3"></path>
                            </svg> Create Custom</a>
                        <button type="submit" class="submit-btn btn upload primary-btn ">ASSIGN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- edit role modal --}}
<div class="modal fade dark-popup" id="employeeEditRoleModel" aria-hidden="true" data-bs-backdrop="static"
    aria-labelledby="employeeEditRoleModelLabel" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content top-border">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="employeeEditRoleModelLabel">Assign Role Permission</h5>
            </div>
            <div class="modal-body custom-design">
                <form action="{{ route('business.addUpdateRole') }}" class="edit-user-role" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="edit-role-user-id" name="id" value="">
                    <div class="form-check pop-box-form mb-3 mt-4">
                        @foreach ($customRoles as $keys => $role)
                        <div class="input-item-box">
                            <input type="radio" id="editUser_{{ $role->id }}" name="userRole" value="{{ $role->id }}" />
                            <label for="editUser_{{ $role->id }}" class="form-check-label">{{ $role->roleName }}</label>
                            <span class="text-sm d-block">{{ $role->roleDescription }}</span>
                        </div>
                        @endforeach
                    </div>
                    <div class="box-action">
                        <button onclick="window.location.reload();" data-bs-dismiss="modal" aria-label="Close"
                            class="btn cancel-btn">CANCEL</button>
                        <button type="submit" class="btn primary-btn">SAVE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script>
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        var table;
        $(function() {
            table = $('#custom-datatable').DataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
                lengthMenu: [10, 25, 50, 100, 200],
                language: {
                    searchPlaceholder: "Search with user name here"
                },
                "ajax": {
                    "url": "{{ url(route('business.search')) }}",
                    "type": "POST",
                    "headers": {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    "async": false,
                    "data": function(d) {
                        d.isDeletedFilter = $('#isDeletedFilter').val();
                        d.isActiveFilter = $('#isActiveFilter').val();
                    }

                },
                columns: [{
                        data: 'sr_no',
                        name: 'sr_no',
                        orderable: false,
                        visible: false
                    },
                    {
                        data: 'userName',
                        name: 'userName'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'ipAddress',
                        name: 'ipAddress',
                        orderable: false,
                    },
                    @if (App\Helpers\CommonHelper::getUserCustomMultipleRoles('changeMemberStatus', 'members') ||
                            Auth::user()->role == 'business')
                        {
                            data: 'isActive',
                            name: 'isActive',
                            orderable: false
                        },
                    @endif {
                        data: "totalPasswords",
                        name: "totalPasswords"
                    },
                    {
                        data: "createdAt",
                        name: "createdAt"
                    },
                    {
                        data: "browser",
                        name: "browser",
                        orderable: false
                    },
                    {
                        data: "lastLogin",
                        name: "lastLogin"
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false
                    },
                ],
                "aaSorting": [
                    [6, 'desc']
                ],
                "pageLength": 10
            });

        });


        // OPEN MODAL FOR ADD EMPLOYEE ROLE
        function openRolePopup(id) {
            $('#employeeRoleModel').modal('show');
            $('#employee-id').val(id);
            $('#save').prop('disabled', true);
        }

        // OPEN MODAL FOR Edit EMPLOYEE ROLE
        function editRole(url) {
            $('.loader').show();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#name').removeClass('error');

            $.ajax({
                url: url,
                type: 'GET',
                success: function(result) {
                    console.log(result)
                    $('.loader').hide();
                    $('.isActiveShow').hide();
                    if (result.status == 1) {
                        $("#employeeEditRoleModel").modal('show');
                        $('#edit-role-user-id').val(result.result.userId);
                        $(`#editUser_${result.result.editRole[0].roleId}`).prop('checked', true);
                        return true;
                    }
                    toastr.error(result.message);
                },
                error: function(error) {
                    console.log(error);
                    $('.loader').hide();
                }
            });
        }


        // open add modal
        function openAddMemberPopup() {
            $('#userModel').modal('show');
            $('#save').prop('disabled', true);
        }

        $("#custom-datatable").on('change', '.btnChangeStatus', function() {
            $('#status-confirmation-modal').modal('show');
            var status = $(this).prop('checked') ? "activate" : "inactive";
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
            $.ajax({
                url: $(this).attr('data-status-link'),
                cache: false,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function(result) {
                    $('.loader').hide();
                    $("#status-confirmation-modal").modal('hide');

                    if (result.status == 1) {
                        toastr.success(result.message);
                        table.ajax.reload();
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

        $('#userModel').each(function() {
            // this.reset();
        });

        $('#custom-datatable').on('click', '.user-delete', function() {
            $('#delete-user-id').val($(this).attr("data-id"));
            $('#userDelete').modal('show');
        });

        // open and edit modal
        function edit(url) {
            $('.loader').show();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#name').removeClass('error');

            $.ajax({
                url: url,
                type: 'GET',
                success: function(result) {
                    if (result.status == 1) {
                        $('.loader').hide();

                        $("#userEditModel").modal('show');
                        $('#edit-user-id').val(result.result.userId);
                        $('#userName').val(result.result.editMember.userName);
                        $('#edit-email').val(result.result.editMember.email);
                        $('#first-name').val(result.result.editMember.firstName);
                        $('#last-name').val(result.result.editMember.lastName);
                        $('#mobile-number').val(result.result.editMember.mobileNumber);
                        if (result.result.editMember.isActive == 2) {
                            $('.editIsActive').hide();
                        } else {
                            $('.editIsActive').show();
                        }
                        $('#isActive').val(result.result.editMember.isActive);

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

        // Copy UUID User
        $('#custom-datatable').on('click', '.user-uuid', function() {
            /* Note: This code works only on HTTPS and local server*/
            // var copyText = $(this).attr("data-id");
            // navigator.clipboard.writeText(copyText);
            // toastr.success("Copied!");
            /*******************************************************/

            //Another Logic
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

        // GENERATE EMPLOYEE ID
        function generateEmpId() {
            var companyName = $('#empId').val();
            var prefix = companyName.substring(0, 3).toUpperCase();
            var suffix = Math.floor(Math.random() * (9999 - 1000 + 1)) + 1000;
            var employeeCode = (prefix + suffix).replace(/\s/g, '');
            $('#employeeId').val(employeeCode);
        }

        // add modal validation
        function createCustomRole() {
           var employeeId = $('#employee-id').val();
            localStorage.setItem("custom-role-emp-data", employeeId);
            window.location.href = "{{ route('custom-roles.create') }}";
        }

        window.onload = function() {
            // Call your function here
            var empId = localStorage.getItem("custom-role-emp-data");
            if (empId) {
                openRolePopup(empId)
                localStorage.removeItem("custom-role-emp-data")
            }
        };
</script>

@endsection
