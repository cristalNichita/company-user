@extends('user.layouts.front')
@section('title', 'Payment Detail')


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
            <h3 class="fontColor">{{$user->firstName}} {{$user->lastName}}</h3>
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
                                    <label>Start Date: </label>
                                    <span> {{ date('d M Y',strtotime($user->startDateTime)) ?? " - "}}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="cl-box-item">
                                    <label>End Date:</label>
                                    <span style="word-wrap: break-word;">{{ date('d M Y',strtotime($user->endDateTime))
                                        ?? " - "}}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="cl-box-item">
                                    <label>Recurring Status: </label>
                                    <span style="word-wrap: break-word;">{{ ucfirst($user->recurringStatus) ?? " -
                                        "}}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="cl-box-item">
                                    <label>Card Type: </label>
                                    <span style="word-wrap: break-word;">{{ $user->userTransactions->paymentType ?? " -
                                        "}}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="cl-box-item">
                                    <label>Card Brand: </label>
                                    <span style="word-wrap: break-word;">{{ $user->userTransactions->cardBrand ?? " -
                                        "}}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="cl-box-item">
                                    <label>Card Last Four Digit: </label>
                                    <span style="word-wrap: break-word;">XXXX-XXXX-XXXX-{{
                                        $user->userTransactions->lastForDigit ?? " - "}}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div>
                                    <span class=" mr-2 ml-2"><a
                                            href="{{ $user->userTransactions->hostedInvoiceUrl ?? '' }}" target="_blank"
                                            class="btn primary-btn">View Receipt</a></span>
                                    <span class=" mr-2 ml-2"><a href="{{ $user->userTransactions->invoicePdf ?? '' }}"
                                            target="_blank" class="btn primary-btn">Download Receipt</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 right-panel-box">
                    <div class="grey-box">
                        <div class="d-flex align-items-center justify-content-between">
                            <h4>HSM Status</h4>
                            <form class="form reg-form" method="post" action="{{route('cancelRecurringRequest')}}">
                                @csrf
                                @if($user->recurringStatus == 'canceled')
                                <button type="submit" target="_blank" class="btn primary-btn" disabled>Stop Recurring
                                    @else
                                    <button type="submit" target="_blank" class="btn primary-btn">Stop Recurring
                                        @endif
                            </form>
                        </div>
                        <hr>
                        <div class="cl-box-item">
                            <label>Status : </label>
                            <span>Approved</span>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
