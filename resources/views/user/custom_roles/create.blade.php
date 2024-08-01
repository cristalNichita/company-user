@extends('user.layouts.front')
@section('title')
{{ !empty($roleDetail) ? 'Edit Role' : 'Create Role' }}
@endsection
@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link href="https://unpkg.com/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
<style>
    .select2-container {
        width: 100% !important;
    }

    .select2-results__group {
        cursor: pointer !important;
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
            <h3>{{ empty($roleDetail) ? 'Create' : 'Edit' }} Custom Account Roles</h3>
        </div>
        <div class="right-side">
            @include('user.common.profileView')
        </div>
    </div>
    <div class="content-view-box">
        <div class="upload-box">
            <p>{{ empty($roleDetail) ? 'Create' : 'Edit' }} custom account roles with a custom set of permissions that
                can be assigned to users to
                allow fine-grained control over their actions in the FlashX DSM account.</p>
        </div>

        @if (empty($roleDetail))
        <form class="form" name="roleForm" id="roleForm" action="{{ route('custom-roles.store') }}" method="post">
            @else
            <form class="form" name="roleForm" id="roleForm"
                action="{{ route('custom-roles.update', ['custom_role' => $roleDetail->id]) }}" method="post">
                @method('PUT')
                @endif
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $roleDetail->id ?? '' }}">
                <div class="create-custom-role-box-top">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="input-grp">
                                <label>Custom Role Name</label>
                                <span>Enter Suitable title for the role that can help you to identify easily.</span>
                                <input type="text" name="roleName" id="roleName" placeholder="Enter custom role name"
                                    value="{{ $roleDetail->roleName ?? '' }}" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-grp">
                                <label>Role Description (Optional)</label>
                                <span>Enter description for the particular role that can help you to identify
                                    easily.</span>
                                <input type="text" name="roleDescription" id="roleDescription"
                                    placeholder="Enter role description"
                                    value="{{ $roleDetail->roleDescription ?? '' }}" />
                            </div>
                        </div>
                    </div>
                </div>


                <div class="create-custom-role-box-bottom">
                    <div class="create-custom-role-box-bottom-head">
                        <h4>Role Management</h4>
                    </div>
                    <div class="create-custom-role-box-bottom-head-main">
                        <div class="role-options">
                            @php
                            if (!empty($roleDetail)) {
                            $dataArray = $roleDetail->hsmStorage;
                            // Extract 'id' values into an array
                            $idArray = collect($dataArray)
                            ->pluck('id')
                            ->toArray();
                            }
                            @endphp
                            @foreach ($hsmList as $key => $list)
                            <div class="role-options-single">
                                <input type="checkbox" id="option_{{ $key }}" name="checkboxName[{{ $list->hsmId }}]"
                                    onclick="toggleDivVisibility({{ $key }})" {{ !empty($roleDetail) &&
                                    in_array($list->hsmId, $idArray) ? 'checked' : '' }} />
                                <label for="option_{{ $key }}">{{ $list->name }}</label>
                            </div>
                            @endforeach

                        </div>


                        @foreach ($hsmList as $keys => $listData)
                        <div id="myDiv_{{ $keys }}"
                            style=" display:{{ !empty($roleDetail) && in_array($listData->hsmId, $idArray) ? 'block' : 'none' }}">
                            <div class="role-options-stripe">
                                <h5>{{ $listData->name }}</h5>
                                <div>
                                    <label>MAC Id</label>
                                    <span>{{ $listData->macId }}</span>
                                </div>
                                <div>
                                    <label>HSM Location</label>
                                    <span>{{ $listData->location }}</span>
                                </div>
                                <div>
                                    <label>Available Storage</label>
                                    <span>{{ $listData ?
                                        App\Helpers\CommonHelper::formatSizeUnits($listData->availableSpace) : 0
                                        }}</span>
                                </div>
                                <div class="storage-box">

                                    @php
                                    if (!empty($roleDetail)) {
                                    $dataArr = $roleDetail->hsmStorage;
                                    // Extract 'id' values into an array
                                    $storeArray = collect($dataArr)
                                    ->where('id', $listData->hsmId)
                                    ->first();
                                    $storageCount = $storeArray ?
                                    App\Helpers\CommonHelper::formatSizeUnits($storeArray['storage']) : 0;
                                    $storageData = $storageCount ? (int) explode(' ', $storageCount)[0] : '';
                                    $format = $storageCount ? explode(' ', $storageCount)[1] : '';
                                    }

                                    @endphp

                                    <input type="text" name="hsmStorage[{{ $keys }}][storage]"
                                        value="{{ !empty($roleDetail) ? $storageData : '' }}"
                                        placeholder="Enter Storage"
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                        class="{{ !empty($roleDetail) ? 'cursor-not-allowed' : ''  }}"
                                        @if($listData->availableSpace
                                    <= 0) readonly @endif @if(!empty($roleDetail)) readonly @endif />
                                    <input type="hidden" name="hsmStorage[{{ $keys }}][id]"
                                        value="{{ $listData->hsmId }}" />
                                    <input type="hidden" name="availableSpace[{{ $keys }}]"
                                        value="{{ $listData->availableSpace }}" />

                                    @if(!empty($roleDetail))
                                    <select name="hsmStorage[{{ $keys }}][format]" class="cursor-not-allowed">
                                        <option value="{{ $format }}" {{ $format ? 'selected' : '' }}>
                                            {{ $format }}</option>
                                    </select>
                                    @else
                                    <select name="hsmStorage[{{ $keys }}][format]">
                                        @foreach (config('constant.usageConsumptionFormats') as $st)
                                        <option value="{{ $st }}" {{ !empty($roleDetail) && $st==$format ? 'selected'
                                            : '' }}>
                                            {{ $st }}</option>
                                        @endforeach
                                    </select>
                                    @endif
                                </div>
                                <label id="assignStorage-error" style="display: none;" class="error"
                                    for="assignStorage">Please enter storage</label>
                            </div>
                        </div>
                        @endforeach

                        <div class="role-options-permission">
                            <div class="role-options-permission-single">
                                <div class="input-grp">
                                    <div class="form-group">
                                        <label class="form-check-label" for="numberPassword">Number of Password
                                        </label>
                                    </div>
                                    <input type="text" name="numberPassword" id="numberPassword"
                                        value="{{ $roleDetail->numberPassword ?? '' }}" minlength="1" maxlength="4"
                                        placeholder="Enter number of password"
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                </div>
                            </div>
                            <div class="role-options-permission-single">
                                <div class="input-grp">
                                    <div class="form-group">
                                        <label class="form-check-label" for="application">Number of Application
                                        </label>
                                    </div>
                                    <input type="text" name="numberApplication" id="numberApplication"
                                        value="{{ $roleDetail->numberApplication ?? '' }}" minlength="1" maxlength="4"
                                        placeholder="Enter number of application"
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                </div>
                            </div>
                            <div class="role-options-permission-single">
                                <div class="form-group">
                                    <label class="form-check-label">Allow Authentication</label>
                                    <div class="selectGroup">
                                        <select id="authentication" name="authentication[]" style="width: 100%"
                                            class="form-control input w-200 mt-2 mb-2" multiple required>
                                            <option value="All">Select All</option>
                                            @foreach (config('constant.authenticationList') as $auth)
                                            <option value="{{ $auth }}" {{ !empty($roleDetail) && in_array($auth,
                                                $roleDetail->authentication) ? 'selected' : '' }}>
                                                {{ $auth }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <label id="authentication-error" class="error" style="display: none;"
                                        for="authentication">Please select authentication</label>
                                </div>
                            </div>
                            <div class="role-options-permission-single">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label class="form-check-label" for="device">Type of Device</label>
                                    </div>

                                    <div class="selectGroup">
                                        <select id="deviceType" name="device[]" style="width: 100%"
                                            class="form-control input w-200 mt-2 mb-2" multiple required>
                                            @foreach (config('constant.deviceList') as $dev)
                                            <option value="{{ $dev }}" {{ !empty($roleDetail) && in_array($dev,
                                                $roleDetail->device) ? 'selected' : '' }}>
                                                {{ $dev }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <label id="deviceType-error" class="error" style="display: none;"
                                        for="deviceType">Please select device type</label>
                                </div>
                            </div>
                            <div class="role-options-permission-single">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label class="form-check-label" for="browser">Type of Browser</label>
                                    </div>
                                    <div class="selectGroup">
                                        <select id="browserType" name="browser[]" style="width: 100%"
                                            class="form-control input w-200 mt-2 mb-2" multiple>
                                            @foreach (config('constant.browserList') as $brow)
                                            <option value="{{ $brow }}" {{ !empty($roleDetail) && is_array($roleDetail->
                                                browser) && in_array($brow,
                                                $roleDetail->browser) ? 'selected' : '' }}>
                                                {{ $brow }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="role-options-permission-single">
                                <div class="input-grp">
                                    <div class="form-group">
                                        <label class="form-check-label" for="url">Restrict Application Name</label>
                                    </div>
                                    <input type="text" name="application" id="application"
                                        value="{{ $roleDetail->application ?? '' }}"
                                        placeholder="Enter application name. (eg:Facebook)" />
                                </div>
                            </div>
                        </div>

                        <div class="box-action">
                            <button type="button" class="btn cancel-btn">
                                <a href="{{ route('custom-roles.index') }}"> Cancel</a></button>
                            <button type="submit" class="btn primary-btn" id="custom-submit" data-bs-toggle="modal"
                                data-bs-target="#success">Save</button>
                        </div>

                    </div>
                </div>


            </form>
    </div>
</div>
@endsection

@section('js')
<script src="{{ url('admin-assets/js/jquery.validate.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://unpkg.com/@yaireo/tagify"></script>
<script src="https://unpkg.com/@yaireo/tagify@3.1.0/dist/tagify.polyfills.min.js"></script>
<script>
    // The DOM element you wish to replace with Tagify
        var input = document.querySelector('input[name=application]');
        // initialize Tagify on the above input node reference
        new Tagify(input)
</script>
<script>
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        function toggleDivVisibility(val) {
            // alert(val);
            var checkBox = document.getElementById("option_" + val);
            var myDiv = document.getElementById("myDiv_" + val);

            // If the checkbox is checked, show the div; otherwise, hide it
            myDiv.style.display = myDiv.style.display === 'none' ? 'block' : 'none';
        }

        $(document).ready(function() {
            $('#authentication').select2({
                placeholder: "Select Authentication",
                allowClear: true,
                closeOnSelect: false,
            }).on('select2:select', function(e) {
                var selectedOptions = $(this).val();
                if (selectedOptions && selectedOptions.includes("All")) {
                    // If "Select All" is selected, select all other options
                    selectedOptions = $(this).find('option:not([value="All"])').map(function() {
                        return $(this).val();
                    }).get();
                    $(this).val(selectedOptions).trigger('change');
                }
            }).on('select2:unselect', function(e) {
                var unselectedOption = e.params.data.id;
                if (unselectedOption === "All") {
                    // If "Select All" is unselected, unselect all other options
                    $(this).find('option:not([value="All"])').prop('selected', false).end();
                }
            });

            $("#deviceType").select2({
                placeholder: "Select Device",
                allowClear: false
            });
            $("#browserType").select2({
                placeholder: "Select Browser",
                allowClear: false
            });
            $(".form").validate({
                ignore: [],
                rules: {
                    roleName: {
                        required: true,
                        maxlength: 50
                    },
                    numberPassword: {
                        required: true,
                    },
                    numberApplication: {
                        required: true,
                    },
                    'authentication': {
                        required: true,
                    },
                    'assignStorage': {
                        required: true,
                    }
                },
                messages: {
                    roleName: {
                        required: "Please enter role name",
                        maxlength: "Please enter less then {0} characters",
                    },
                    numberPassword: {
                        required: "Please enter number of password",
                    },
                    numberApplication: {
                        required: "Please enter number of application",
                    },
                    'authentication': {
                        required: "Please select authentication",
                    },
                    'assignStorage': {
                        required: "Please enter storage",
                    }
                },
                submitHandler: function(form) {
                    $('.loader').show();
                    save(form);
                }
            });
        });
</script>
@endsection
