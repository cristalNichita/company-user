@extends('user.layouts.front')
@section('title', 'Custom Roles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
@section('css')
<style>
    .dataTables_wrapper.no-footer .dataTables_scrollBody {
        min-height: 120px;
    }

    td {
        white-space: normal !important;
    }

    .badge {
        margin-bottom: 5px;
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
            <h3 class="fontColor">Custom Roles</h3>
        </div>
        <div class="right-side">
            @include('user.common.profileView')
        </div>
    </div>
    <div class="content-view-box">
        <div class="table-view search-bar-full">
            @if(App\Helpers\CommonHelper::getUserCustomMultipleRoles('create','custom-roles') || (Auth::user()->role ==
            'business'))
            <div class="upload-box">
                <p>Create custom account roles with a custom set of permissions that can be assigned to users to
                    allow fine-grained control over their actions in the FlashX DSM account.</p>
                <div class="d-flex align-items-center update-status">
                    <a class="upload small-btn col-md-3 text-right w-auto fw-bolder"
                        href="{{ route('custom-roles.create') }}">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M1.18112 7.18075L1.18075 7.18112C0.960017 7.40262 0.85 7.67898 0.85 8C0.85 8.32103 0.960028 8.59716 1.18093 8.81807C1.4024 9.03953 1.67881 9.15 2 9.15H6.85V14C6.85 14.3211 6.96039 14.5972 7.18186 14.818C7.40271 15.0396 7.67886 15.15 8 15.15C8.32119 15.15 8.5976 15.0395 8.81907 14.8181C9.03997 14.5972 9.15 14.321 9.15 14V9.15H14C14.3211 9.15 14.5972 9.03961 14.818 8.81814C15.0396 8.59729 15.15 8.32114 15.15 8C15.15 7.67881 15.0395 7.4024 14.8181 7.18093C14.5972 6.96003 14.321 6.85 14 6.85H9.15V2C9.15 1.67898 9.03998 1.40262 8.81925 1.18112L8.81888 1.18075C8.59738 0.960017 8.32102 0.85 8 0.85C7.67897 0.85 7.40284 0.960028 7.18193 1.18093C6.96047 1.4024 6.85 1.67881 6.85 2V6.85H2C1.67898 6.85 1.40262 6.96002 1.18112 7.18075Z"
                                fill="black" stroke="black" stroke-width="0.3" />
                        </svg>
                        Add Role
                    </a>
                </div>
            </div>
            @endif
            <table id="custom-datatable"
                class="display nowrap table table-hover table-striped table-bordered last-cl-fxied" cellspacing="0"
                width="100%">
                <thead>
                    <tr>
                        <th width="7%">No.</th>
                        <th>Created At</th>
                        <th width="20%">Role Name</th>
                        <th width="30%">Descriptions</th>
                        <th width="45%">Permissions</th>
                        @if (App\Helpers\CommonHelper::getUserCustomMultipleRoles('roleDelete','custom-roles') ||
                        App\Helpers\CommonHelper::getUserCustomMultipleRoles('edit','custom-roles') ||
                        (Auth::user()->role == 'business'))
                        <th width="5px">Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>



{{-- delete modal --}}
<div class="modal fade dark-popup" id="roleDelete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-hidden="true" aria-labelledby="roleDeleteLabel">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('roleDelete') }}" method="POST">
                @csrf
                <input type="hidden" id="delete-user-id" name="id">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="roleDeleteLabel">Delete</h5>
                </div>
                <div class="modal-body">
                    <h6>Are you sure you want to delete this Role?</h6>
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

<!-- Succesful popup -->
<div class="modal fade" id="successful" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-hidden="true" aria-labelledby="successfulLabel">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successfulLabel">Successful!</h5>
            </div>
            <div class="modal-body">
                <h4>New Role has been created successfully. You can check it under the the list of Roles.</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn upload small-btn" data-bs-dismiss="modal" aria-label="Close"
                    onclick="deleteSuccessful()">OK</button>
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
                    searchPlaceholder: "Search with role name here"
                },
                "ajax": {
                    "url": "{{ url(route('custom-roles.search')) }}",
                    "type": "POST",
                    "headers": {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    "async": false,
                    "data": function(d) {
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
                        data: 'roleName',
                        name: 'roleName'
                    },
                    {
                        data: 'roleDescription',
                        name: 'roleDescription'
                    },
                    {
                        data: 'permissionData',
                        name: 'permissionData',
                        orderable: false,
                    },

                    @if (App\Helpers\CommonHelper::getUserCustomMultipleRoles('roleDelete','custom-roles') || App\Helpers\CommonHelper::getUserCustomMultipleRoles('edit','custom-roles') || (Auth::user()->role == 'business'))
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false
                    },
                    @endif
                ],
                "aaSorting": [
                    [2, 'desc']
                ],
                "pageLength": 10
            });

        });

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



        $('#custom-datatable').on('click', '.role-delete', function() {
            $('#delete-user-id').val($(this).attr("data-id"));
            $('#roleDelete').modal('show');
        });


        $(document).ready(function() {
            if(localStorage.getItem('custom-role-emp-data')){
                setTimeout(function() {
                    window.location.href = "{{ route('memberPage') }}";
                }, 1500);
            }
        });

</script>

@endsection
