@extends('user.layouts.front')
@section('title', 'Support Ticket')

@section('css')
<link rel="stylesheet" href="{{ url('assets/user/css/access-keys.css') }}">
<style>
    .iti {
        color: #000;
        width: 100%;
    }

    .iti--separate-dial-code .iti__selected-dial-code {
        color: white;
    }

    textarea {
        width: 100%;
        height: 166px;
    }

    .badge {
        border-radius: 6px;
        padding: 8px 8px !important;
        font-size: 12px;
        font-weight: 400;
        line-height: normal;
    }

    .bg-pending {
        background: rgba(255, 182, 117, 0.20);
        color: #FFB675;
    }

    .bg-progress {
        background: rgba(111, 198, 252, 0.20);
        color: #6FC6FC;
    }

    .bg-completed {
        background: rgba(161, 255, 0, 0.20);
        color: #A1FF00;
    }

    .bg-pending svg path {
        fill: #FFB675;
    }

    .bg-progress svg path {
        fill: #6FC6FC;
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
            <h3>Support Ticket</h3>
        </div>
        <div class="right-side">
            @include('user.common.profileView')
        </div>
    </div>
    <div class="content-view-box">
        <div class="table-view search-bar-full">
            <div class="row align-items-center justify-content-between mb-5">
                <div class="col-md-9">
                </div>
                <div class="col-md-3 text-right">
                    <button class="upload small-btn fw-bolder" data-bs-toggle="modal" onclick="openAddMemberPopup()"
                        role="button">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M1.18112 7.18075L1.18075 7.18112C0.960017 7.40262 0.85 7.67898 0.85 8C0.85 8.32103 0.960028 8.59716 1.18093 8.81807C1.4024 9.03953 1.67881 9.15 2 9.15H6.85V14C6.85 14.3211 6.96039 14.5972 7.18186 14.818C7.40271 15.0396 7.67886 15.15 8 15.15C8.32119 15.15 8.5976 15.0395 8.81907 14.8181C9.03997 14.5972 9.15 14.321 9.15 14V9.15H14C14.3211 9.15 14.5972 9.03961 14.818 8.81814C15.0396 8.59729 15.15 8.32114 15.15 8C15.15 7.67881 15.0395 7.4024 14.8181 7.18093C14.5972 6.96003 14.321 6.85 14 6.85H9.15V2C9.15 1.67898 9.03998 1.40262 8.81925 1.18112L8.81888 1.18075C8.59738 0.960017 8.32102 0.85 8 0.85C7.67897 0.85 7.40284 0.960028 7.18193 1.18093C6.96047 1.4024 6.85 1.67881 6.85 2V6.85H2C1.67898 6.85 1.40262 6.96002 1.18112 7.18075Z"
                                fill="black" stroke="black" stroke-width="0.3" />
                        </svg>
                        Create Ticket
                    </button>
                </div>
            </div>

            <table id="custom-datatable" class="display nowrap table table-hover table-striped table-bordered"
                cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Sr No.</th>
                        <th>Ticket ID</th>
                        <th>User Name</th>
                        <th>Contact Number</th>
                        <th>Descriptions</th>
                        <th width="11%">Status</th>
                        <th>Created Date</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

    <!-- upload Modal -->
    <div class="modal fade upload-modal-box dark-popup" id="createTicket" tabindex="-1"
        aria-labelledby="createTicketLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content top-border">
                <div class="modal-header">

                    <h5 class="modal-title d-block text-center" id="createTicketLabel">Generate New Ticket</h5>
                    <p class="small-text d-block text-center">Provide below information so that Technical Personal will
                        reach out you.</p>
                </div>
                <div class="modal-body">
                    <form class="add-ticket" id="add-ticket" action="{{ route('support-tickets.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="input-area">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-parent">
                                        <label>Your Name</label>
                                        <input type="text" name="yourName" id="yourName" placeholder="Type here">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-parent">
                                        <label>Mobile Number</label>
                                        <div class="password-field">
                                            <input type="text" name="contactNumber"
                                                value="{{ $user->contactNumber ?? '' }}" id="contactNumber"
                                                oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                                placeholder="Enter your mobile number">
                                        </div>
                                        <label id="password-error" class="error" for="password"
                                            style="display: none;">Please enter password</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-parent">
                                        <label>Email Address</label>
                                        <input type="email" name="email" id="email" placeholder="Type here">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-parent">
                                        <label>Description</label>
                                        <textarea name="description" id="description"
                                            placeholder="Type here"></textarea>
                                    </div>
                                </div>
                                <div class="box-action">
                                    <button type="button" class="btn cancel-btn" data-bs-dismiss="modal">CANCEL</button>
                                    <button type="submit" class="btn primary-btn" id="upload-file">CONFIRM</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endsection

    @section('js')
    <script src="{{ url('admin-assets/js/jquery.validate.min.js') }}"></script>
    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            var table;
            $(function() {
                table = $('#custom-datatable').DataTable({
                    processing: true,
                    serverSide: true,
                    scrollX: true,
                    lengthMenu: [10, 25, 50, 100, 200],
                    "ajax": {
                        "url": "{{ url(route('support-tickets.search')) }}",
                        "type": "POST",
                        "headers": {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        "async": false,
                        "data": function(d) {}
                    },
                    columns: [{
                            data: 'srNo',
                            name: 'srNo'
                        },
                        {
                            data: 'ticketId',
                            name: 'ticketId'
                        },
                        {
                            data: 'yourName',
                            name: 'yourName'
                        },
                        {
                            data: 'contactNumber',
                            name: 'contactNumber'
                        },
                        {
                            data: 'description',
                            name: 'description'
                        },
                        {
                            data: 'status',
                            name: 'status'
                        },
                        {
                            data: 'createdAt',
                            name: 'createdAt',
                        },
                    ],
                    "aaSorting": [
                        [6, 'desc']
                    ],
                    "pageLength": 10
                });

            });

            $.validator.addMethod("urlRegex", function(value, element) {
                return this.optional(element) || /^(https?|ftp):\/\/[^\s/$.?#].[^\s]*$/.test(value);
            }, "Please enter a valid URL.");

            const phoneInputField = document.querySelector("#contactNumber");
            const phoneInput = window.intlTelInput(phoneInputField, {
                separateDialCode: true,
                autoFormat: false,
                nationalMode: false,
                utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
            });

            const form = document.querySelector(".add-ticket");
            form.addEventListener("submit", function(event) {
                const phoneNumber = phoneInput.getNumber();
                const hiddenInput = document.createElement("input");
                hiddenInput.type = "hidden";
                hiddenInput.name = "contactNumber";
                hiddenInput.value = phoneNumber;
                form.appendChild(hiddenInput);
            });

            // Add Password Form Validation
            $("#add-ticket").validate({
                rules: {
                    yourName: {
                        required: true,
                    },
                    contactNumber: {
                        required: true,
                    },
                    email: {
                        required: true,
                    },
                    description: {
                        required: true,
                    }
                },
                messages: {
                    yourName: {
                        required: "Please enter your name",
                    },
                    contactNumber: {
                        required: "Please enter contact number",
                    },
                    email: {
                        required: "Please enter email",
                    },
                    description: {
                        required: "Please enter description",
                    }
                },
                submitHandler: function(form) {
                    $('.loader').show();
                    form.submit();
                    return false;
                }
            });

            function openAddMemberPopup() {
                $('#createTicket').modal('show');
            }

            window.onload = function() {
                // After the main window has loaded, set a timer to open the popup
                if (localStorage.getItem('createTicket')) {
                    openAddMemberPopup();
                    localStorage.setItem('createTicket', '');
                }
            };
    </script>
    @endsection
