@extends('user.layouts.front')
@section('title', 'Access Key')


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
            <h3 class="fontColor">{{$fileDetails->name}}</h3>
        </div>
        <div class="right-side">
            @include('user.common.profileView')
        </div>
    </div>

    <div class="content-view-box">
        <div class="table-view">
            <div class="row cloud-details">
                <div class="col-lg-8">
                    <div class="grey-box">
                        <h4>Object Overview</h4>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="cl-box-item">
                                    <label>Hash Key : </label>
                                    <span> {{$fileDetails->hashKey ?? " - "}}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="cl-box-item">
                                    <label>Security Key :</label>
                                    <span class="text-break">{{$fileDetails->securityKey}}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="cl-box-item">
                                    <label>Created At :</label>
                                    <span>{{$fileDetails->updatedAt ?? "-"}}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="cl-box-item">
                                    <label>Size :</label>
                                    <span>{{$fileDetails->fileSizeFormat}}</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 right-panel-box">
                    <div class="grey-box">
                        <h4>HSM Status</h4>
                        <hr>
                        <div class="cl-box-item">
                            <label>Status : </label>
                            <span>{{$fileDetails->HSMStatus ? "Uploaded" : "Pending"}}</span>
                        </div>
                    </div>
                    <a class="general-button text-center d-none" target="_blank"
                        href="{{route('downloadFile',['id'=>$fileDetails->id])}}">Download</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
