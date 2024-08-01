@extends('user.layouts.front')
@section('title', 'Browser Extension')

@section('css')
<link rel="stylesheet" href="{{ url('assets/user/css/access-keys.css') }}">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<style>
    .download-btn {
        color: #A1FF00;
        font-size: 14px;
        font-weight: 600;
        padding: 8px 15px;
        border-radius: 10px;
        background-color: transparent;
        border: 1px solid #A1FF00;
        display: block;
        max-width: 230px;
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
            <h3>Browser Extension</h3>
        </div>
        <div class="right-side">
            @include('user.common.profileView')
        </div>
    </div>
    <div class="content-view-box browser-extension">

        <h5>Devices available to Install</h5>
        <h4>{{ $installedExtensions }} Installed, You can add {{ ($totalNoOfDevice - $totalAddedExtension) }} more
            devices!</h4>

        <div class="browser-extension-box">
            @foreach ($extensions as $extension)
            <div class="extension-box-single">
                <div class="extension-box-single-top">
                    <div class="extension-box-single-top-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="59" height="51" viewBox="0 0 59 51" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.41964 0.953125C3.59803 0.953125 0.5 4.06225 0.5 7.89754V35.6752C0.5 39.5105 3.59803 42.6196 7.41964 42.6196H24.5554L21.7875 48.1752H15.7232C14.9589 48.1752 14.3393 48.7971 14.3393 49.564C14.3393 50.331 14.9589 50.9529 15.7232 50.9529H22.6129C22.6322 50.9532 22.6514 50.9532 22.6707 50.9529H36.4545C36.4736 50.9532 36.4927 50.9532 36.512 50.9529H43.4018C44.166 50.9529 44.7857 50.331 44.7857 49.564C44.7857 48.7971 44.166 48.1752 43.4018 48.1752H37.3374L34.5696 42.6196H51.7054C55.5269 42.6196 58.625 39.5105 58.625 35.6752V7.89754C58.625 4.06225 55.5269 0.953125 51.7054 0.953125H7.41964ZM34.2429 48.1752L31.4751 42.6196H27.6499L24.8821 48.1752H34.2429ZM32.3002 39.8419C32.3196 39.8416 32.3389 39.8416 32.3583 39.8419H51.7054C53.9982 39.8419 55.8571 37.9763 55.8571 35.6752V7.89754C55.8571 5.59636 53.9982 3.73089 51.7054 3.73089H7.41964C5.12667 3.73089 3.26786 5.59636 3.26786 7.89754V35.6752C3.26786 37.9763 5.12667 39.8419 7.41964 39.8419H26.7667C26.7861 39.8416 26.8054 39.8416 26.8245 39.8419H32.3002Z"
                                fill="white" />
                        </svg>
                    </div>
                    <div class="extension-box-single-top-head">
                        <div class="d-flex">
                            <h5>System name</h5>&nbsp;<span
                                style="color:{{ $extension->isActive == 1 ? '#A1FF00' : '#FF9228' }};font-size: 13px;">
                                {{ $extension->isActive == 1 ? "(Active)" : "(Inactive)" }}</span>
                        </div>
                        <h4>{{ $extension->systemName }}</h4>
                    </div>
                    <div class="menu-btn">
                        <div class="dropdown dropstart">
                            <button type="button" class="dropdown-toggle show" data-bs-toggle="dropdown"
                                aria-expanded="true">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="31" viewBox="0 0 30 31"
                                    fill="none">
                                    <path
                                        d="M15 10.3281C16.0355 10.3281 16.875 9.48866 16.875 8.45312C16.875 7.41759 16.0355 6.57812 15 6.57812C13.9645 6.57812 13.125 7.41759 13.125 8.45312C13.125 9.48866 13.9645 10.3281 15 10.3281Z"
                                        fill="#A1FF00" />
                                    <path
                                        d="M15 17.8281C16.0355 17.8281 16.875 16.9887 16.875 15.9531C16.875 14.9176 16.0355 14.0781 15 14.0781C13.9645 14.0781 13.125 14.9176 13.125 15.9531C13.125 16.9887 13.9645 17.8281 15 17.8281Z"
                                        fill="#A1FF00" />
                                    <path
                                        d="M15 25.3281C16.0355 25.3281 16.875 24.4887 16.875 23.4531C16.875 22.4176 16.0355 21.5781 15 21.5781C13.9645 21.5781 13.125 22.4176 13.125 23.4531C13.125 24.4887 13.9645 25.3281 15 25.3281Z"
                                        fill="#A1FF00" />
                                </svg>
                            </button>
                            <ul class="dropdown-menu">
                                <li class="dropdown-item">
                                    <a onclick="deleteExtension('{{$extension->id}}')">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                            viewBox="0 0 25 25" fill="none">
                                            <path
                                                d="M6.875 19.0469C6.875 20.1469 7.775 21.0469 8.875 21.0469H16.875C17.975 21.0469 18.875 20.1469 18.875 19.0469V7.04688H6.875V19.0469ZM10.045 12.6369C9.85802 12.4499 9.75298 12.1963 9.75298 11.9319C9.75298 11.6674 9.85802 11.4139 10.045 11.2269C10.232 11.0399 10.4856 10.9349 10.75 10.9349C11.0144 10.9349 11.268 11.0399 11.455 11.2269L12.875 12.6369L14.285 11.2269C14.472 11.0399 14.7256 10.9349 14.99 10.9349C15.2544 10.9349 15.508 11.0399 15.695 11.2269C15.882 11.4139 15.987 11.6674 15.987 11.9319C15.987 12.1963 15.882 12.4499 15.695 12.6369L14.285 14.0469L15.695 15.4569C15.7876 15.5495 15.861 15.6594 15.9111 15.7803C15.9612 15.9013 15.987 16.0309 15.987 16.1619C15.987 16.2928 15.9612 16.4225 15.9111 16.5434C15.861 16.6644 15.7876 16.7743 15.695 16.8669C15.6024 16.9595 15.4925 17.0329 15.3715 17.083C15.2506 17.1331 15.1209 17.1589 14.99 17.1589C14.8591 17.1589 14.7294 17.1331 14.6085 17.083C14.4875 17.0329 14.3776 16.9595 14.285 16.8669L12.875 15.4569L11.465 16.8669C11.3724 16.9595 11.2625 17.0329 11.1415 17.083C11.0206 17.1331 10.8909 17.1589 10.76 17.1589C10.6291 17.1589 10.4994 17.1331 10.3785 17.083C10.2575 17.0329 10.1476 16.9595 10.055 16.8669C9.96242 16.7743 9.88898 16.6644 9.83887 16.5434C9.78877 16.4225 9.76298 16.2928 9.76298 16.1619C9.76298 16.0309 9.78877 15.9013 9.83887 15.7803C9.88898 15.6594 9.96242 15.5495 10.055 15.4569L11.465 14.0469L10.045 12.6369ZM18.875 4.04688H16.375L15.665 3.33687C15.485 3.15687 15.225 3.04688 14.965 3.04688H10.785C10.525 3.04688 10.265 3.15687 10.085 3.33687L9.375 4.04688H6.875C6.325 4.04688 5.875 4.49688 5.875 5.04688C5.875 5.59687 6.325 6.04688 6.875 6.04688H18.875C19.425 6.04688 19.875 5.59687 19.875 5.04688C19.875 4.49688 19.425 4.04688 18.875 4.04688Z"
                                                fill="white" />
                                        </svg>
                                        <span>Remove</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="extension-box-single-main">
                    <div class="extension-box-single-detail">
                        <label>Brand Name</label>
                        <span>{{ $extension->brandName ?? "-" }}</span>
                    </div>
                    <div class="extension-box-single-detail">
                        <label>Model Number</label>
                        <span>{{ $extension->modelNumber ?? "-" }}</span>
                    </div>
                    <div class="extension-box-single-detail">
                        <label>Browser Type</label>
                        <span>{{ $extension->browserType ?? "-" }}</span>
                    </div>
                    @if($extension->isActive == 1)
                    <div class="extension-box-single-detail">
                        <label>IP Address</label>
                        <span>{{ $extension->ipAddress ?? "-" }}</span>
                    </div>
                    @else
                    <div class="extension-box-single-detail text-center">
                        <a href="javascript:void(0);" class="download-btn"
                            onclick="downloadExtension('{{$extension->id}}')">Download</a>
                    </div>
                    @endif

                </div>
            </div>
            @endforeach


            <div class="extension-box-single add-device">
                <svg xmlns="http://www.w3.org/2000/svg" width="108" height="81" viewBox="0 0 108 81" fill="none">
                    <g opacity="0.5">
                        <path
                            d="M12.2607 71.7578H7.04333C6.58208 71.7578 6.13973 71.941 5.81358 72.2672C5.48743 72.5933 5.3042 73.0357 5.3042 73.4969C5.3042 73.9582 5.48743 74.4005 5.81358 74.7267C6.13973 75.0528 6.58208 75.2361 7.04333 75.2361H12.2607C12.722 75.2361 13.1643 75.0528 13.4905 74.7267C13.8166 74.4005 13.9999 73.9582 13.9999 73.4969C13.9999 73.0357 13.8166 72.5933 13.4905 72.2672C13.1643 71.941 12.722 71.7578 12.2607 71.7578Z"
                            fill="#B2B6BB" />
                        <path
                            d="M19.2173 71.7578H17.4781C17.0169 71.7578 16.5745 71.941 16.2484 72.2672C15.9222 72.5933 15.739 73.0357 15.739 73.4969C15.739 73.9582 15.9222 74.4005 16.2484 74.7267C16.5745 75.0528 17.0169 75.2361 17.4781 75.2361H19.2173C19.6785 75.2361 20.1209 75.0528 20.447 74.7267C20.7732 74.4005 20.9564 73.9582 20.9564 73.4969C20.9564 73.0357 20.7732 72.5933 20.447 72.2672C20.1209 71.941 19.6785 71.7578 19.2173 71.7578Z"
                            fill="#B2B6BB" />
                        <path
                            d="M100.956 21.3227H97.4782V7.40965C97.4758 5.5654 96.7421 3.79739 95.438 2.49331C94.134 1.18923 92.3659 0.455541 90.5217 0.453125H17.4782C15.6339 0.455196 13.8657 1.18878 12.5615 2.49293C11.2574 3.79708 10.5238 5.5653 10.5217 7.40965V38.714H7.04344C5.19909 38.7161 3.43087 39.4496 2.12672 40.7538C0.822568 42.058 0.0889855 43.8262 0.0869141 45.6705V73.4966C0.0889855 75.341 0.822568 77.1092 2.12672 78.4133C3.43087 79.7175 5.19909 80.451 7.04344 80.4531H24.4347C26.279 80.4507 28.047 79.717 29.3511 78.4129C30.6552 77.1089 31.3888 75.3408 31.3913 73.4966V68.2792H46.5543L45.6847 71.7575H40.0869C39.6257 71.7575 39.1833 71.9407 38.8572 72.2668C38.531 72.593 38.3478 73.0354 38.3478 73.4966V78.714C38.3478 79.1752 38.531 79.6176 38.8572 79.9437C39.1833 80.2699 39.6257 80.4531 40.0869 80.4531H100.956C102.801 80.4507 104.569 79.717 105.873 78.4129C107.177 77.1089 107.911 75.3408 107.913 73.4966V28.2792C107.911 26.435 107.177 24.667 105.873 23.3629C104.569 22.0588 102.801 21.3251 100.956 21.3227ZM27.913 73.4966C27.9118 74.4187 27.5449 75.3027 26.8929 75.9548C26.2409 76.6068 25.3569 76.9737 24.4347 76.9749H7.04344C6.12131 76.9737 5.23731 76.6068 4.58527 75.9548C3.93323 75.3027 3.56638 74.4187 3.56518 73.4966V45.6705C3.56638 44.7484 3.93323 43.8644 4.58527 43.2123C5.23731 42.5603 6.12131 42.1935 7.04344 42.1923H9.26735L10.6108 46.2205C10.7263 46.5668 10.9477 46.868 11.2439 47.0814C11.54 47.2948 11.8958 47.4097 12.2608 47.4096H19.2174C19.5824 47.4097 19.9382 47.2948 20.2343 47.0814C20.5304 46.868 20.7519 46.5668 20.8673 46.2205L22.2108 42.1923H24.4347C25.3569 42.1935 26.2409 42.5603 26.8929 43.2123C27.5449 43.8644 27.9118 44.7484 27.913 45.6705V73.4966ZM12.9347 42.1923H18.5434L17.963 43.9314H13.5152L12.9347 42.1923ZM31.3913 64.8009V59.5836H62.6956V64.8009H31.3913ZM62.6956 68.2792V71.7575H62.3152L61.4456 68.2792H62.6956ZM58.7282 71.7575H49.2717L50.1413 68.2792H57.8587L58.7282 71.7575ZM41.826 76.9749V75.2357H62.9152C63.0744 75.8453 63.3157 76.4303 63.6326 76.9749H41.826ZM62.6956 28.2792V56.1053H31.3913V45.6705C31.3888 43.8263 30.6552 42.0583 29.3511 40.7542C28.047 39.4501 26.279 38.7164 24.4347 38.714H14V7.40965C14.0012 6.48753 14.368 5.60352 15.0201 4.95148C15.6721 4.29944 16.5561 3.93259 17.4782 3.93139H90.5217C91.4438 3.93259 92.3278 4.29944 92.9799 4.95148C93.6319 5.60352 93.9988 6.48753 94 7.40965V21.3227H69.6521C67.8079 21.3251 66.0399 22.0588 64.7358 23.3629C63.4317 24.667 62.698 26.435 62.6956 28.2792ZM104.435 73.4966C104.434 74.4187 104.067 75.3027 103.415 75.9548C102.763 76.6068 101.879 76.9737 100.956 76.9749H69.6521C68.73 76.9737 67.846 76.6068 67.194 75.9548C66.5419 75.3027 66.1751 74.4187 66.1739 73.4966V28.2792C66.1751 27.3571 66.5419 26.4731 67.194 25.821C67.846 25.169 68.73 24.8022 69.6521 24.801H100.956C101.879 24.8022 102.763 25.169 103.415 25.821C104.067 26.4731 104.434 27.3571 104.435 28.2792V73.4966Z"
                            fill="#B2B6BB" />
                        <path
                            d="M100.957 26.541H69.6522C69.191 26.541 68.7486 26.7242 68.4225 27.0504C68.0963 27.3765 67.9131 27.8189 67.9131 28.2801V68.2801C67.9131 68.7414 68.0963 69.1837 68.4225 69.5099C68.7486 69.836 69.191 70.0193 69.6522 70.0193H100.957C101.418 70.0193 101.86 69.836 102.186 69.5099C102.512 69.1837 102.696 68.7414 102.696 68.2801V28.2801C102.696 27.8189 102.512 27.3765 102.186 27.0504C101.86 26.7242 101.418 26.541 100.957 26.541ZM99.2174 66.541H71.3913V30.0193H99.2174V66.541Z"
                            fill="#B2B6BB" />
                        <path
                            d="M83.5653 75.2361C84.5258 75.2361 85.3044 74.4574 85.3044 73.4969C85.3044 72.5364 84.5258 71.7578 83.5653 71.7578C82.6048 71.7578 81.8262 72.5364 81.8262 73.4969C81.8262 74.4574 82.6048 75.2361 83.5653 75.2361Z"
                            fill="#B2B6BB" />
                    </g>
                </svg>
                @if($totalNoOfDevice == $totalAddedExtension)
                <button type="button" class="md-btn cursor-not-allowed" style="background-color: rgb(153, 153, 153);"
                    disabled>
                    Add Device
                </button>
                @else
                <button type="button" data-bs-toggle="modal" onclick="openUploadFilePopup()"
                    data-bs-target="#browserModal" class="md-btn">
                    Add Device
                </button>
                @endif
            </div>
        </div>
        <div class="upload-box">

        </div>
    </div>

    <!-- upload Modal -->
    <div class="modal fade upload-modal-box dark-popup" id="browserModal" tabindex="-1"
        aria-labelledby="browserModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content top-border">
                <div class="modal-header">

                    <h5 class="modal-title d-block text-center" id="browserModalLabel">Download Extension</h5>
                    <p class="small-text d-block text-center">Download browser extension to Import/Export passwords
                        effortlessly.</p>
                </div>
                <div class="modal-body">
                    <form class="add-extension" action="{{ route('browser-extensions.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="input-area">
                            <div class="input-parent">
                                <label>Device Name</label>
                                <input type="text" name="systemName" id="systemName" placeholder="Enter device name">
                            </div>

                            <div class="input-parent">
                                <label>Add Brand</label>
                                <input type="text" name="brandName" id="brandName" placeholder="Enter brand name">
                                <label id="brandName-error" style="display: none;" class="error text-danger"
                                    for="brandName">Please enter brand</label>
                            </div>

                            <div class="input-parent">
                                <label>Add Model Number</label>
                                <input type="text" name="modelNumber" id="modelNumber" placeholder="Enter model number">
                                <label id="modelNumber-error" style="display: none;" class="error text-danger"
                                    for="modelNumber">Please
                                    enter model number</label>
                            </div>

                            <div class="input-parent">
                                <label>Select Browser</label>
                                <select name="browserType" class="form-control">
                                    <option value="" selected disabled>Select browser</option>
                                    <option value="Chrome"> Chrome</option>
                                    <option value="Safari"> Safari</option>
                                    <option value="Opera"> Opera</option>
                                    <option value="Firefox"> Firefox</option>
                                </select>
                                <label id="browserType-error" style="display: none;" class="error text-danger"
                                    for="browserType">Please
                                    enter browser</label>
                            </div>


                            <div class="box-action">
                                <button type="button" class="btn cancel-btn" data-bs-dismiss="modal">CANCEL</button>
                                <button type="submit" class="btn primary-btn" id="upload-file">ADD</button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            function openUploadFilePopup() {
                $('#browserModal').modal('show');
            }

            $("#browser").select2({
                placeholder: "Select browser",
                allowClear: false
            });

            // Add Entension Form Validation
            $(document).ready(function() {
                $(".add-extension").validate({
                    rules: {
                        systemName: {
                            required: true,
                        },
                        brandName: {
                            required: true,
                        },
                        modelNumber: {
                            required: true,
                        },
                        browserType: {
                            required: true,
                        }
                    },
                    messages: {
                        systemName: {
                            required: "Enter device name",
                        },
                        brandName: {
                            required: "Please enter brand",
                        },
                        modelNumber: {
                            required: "Please enter model number",
                        },
                        browserType: {
                            required: "Please enter browser",
                        }
                    },
                    submitHandler: function(form) {
                        $('.loader').show();
                        form.submit();
                    }
                });
            });

            // Delete extension
            function deleteExtension(extensionId) {
                $('.loader').show();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var deleteRoute = "{{ route('browser-extensions.destroy', ['browser_extension' => ':extensionId']) }}";
                var url = deleteRoute.replace(':extensionId', extensionId);

                $.ajax({
                    url: url,
                    type: 'DELETE',
                    data: {},
                    dataType: 'JSON',
                    success: function(result) {
                        $('.loader').hide();
                        if (result.status == 1) {
                            toastr.success(result.message);
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                            return true;
                        }
                        toastr.error(result.message);
                    }
                });
            }

            // Download extension
            function downloadExtension(extensionId) {
                $('.loader').show();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var downloadRoute = "{{ route('download-extension', ['id' => ':extensionId']) }}";
                var downloadUrl = downloadRoute.replace(':extensionId', extensionId);

                $.ajax({
                    url: downloadUrl,
                    type: 'GET',
                    data: {},
                    success: function() {
                        $('.loader').hide();
                        window.location.href = downloadUrl;
                        toastr.success('Browser Extension has been downloaded successfully.');
                    },
                    error: function (xhr, status, error) {
                        $('.loader').hide();
                        toastr.error('Error downloading the extension. Check the console for details.');
                    }
                });
            }
    </script>
    @endsection
