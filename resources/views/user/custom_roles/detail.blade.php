@extends('user.layouts.front')
@section('title', 'Group Details')

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
            <h3 class="fontColor">Custom Role Details</h3>
        </div>
        <div class="right-side">
            @include('user.common.profileView')
        </div>
    </div>
    <div class="content-view-box">
        <div class="file-status">
            <div class="intro-y d-flex align-items-center justify-content-between h-10">
                <h2 class="text-lg font-medium truncate me-4 mb-0">
                </h2>
                <div class="d-flex align-items-center justify-content-center">
                    <a href="{{ URL::previous() }}" class="btn small-btn"> Back </a>
                </div>

            </div>
            <div class="intro-y align-items-center mt-2">
                <div class="gap-6">

                    <div class="col-span-12 lg:col-span-8  ">

                        <div class="tab-content" id="nav-tabContent">

                            <div class="tab-pane fade show active" id="personal-info" role="tabpanel"
                                aria-labelledby="personal-info-tab">
                                <div class="grid grid-cols-12 gap-6">
                                    <!-- BEGIN: personal Info -->
                                    <div class="intro-y box col-span-12 lg:col-span-12">
                                        <div class="border-t border-gray-200">
                                            <div
                                                class="d-flex align-items-strat flex-column justify-content-center text-gray-600">

                                                <div class="sm:whitespace-normal align-items-center mt-3 row">

                                                    <div class="col-md-6">
                                                        <div class="cl-box-item">
                                                            <label class="font-medium ">Role Name :</label>
                                                            <span class="mr-2 ml-2">{{ $roleDetails->roleName ?? 'N/A'
                                                                }}</span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="cl-box-item">
                                                            <label class="font-medium ">Status :</label>
                                                            <span class=" mr-2 ml-2">{{ $roleDetails->isActive ?? 'N/A'
                                                                }}</span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="cl-box-item">
                                                            <label class="font-medium ">Role Description :</label>
                                                            <span class=" mr-2 ml-2">{{ $roleDetails->description ??
                                                                'N/A' }}</span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="cl-box-item">
                                                            <label class="font-medium ">Role Permission :</label>
                                                            <span class=" mr-2 ml-2">{{ $roleDetails->permission ??
                                                                'N/A' }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- END: Basic Info -->
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>


    </div>
</div>

@endsection

@section('js')

@endsection
