@extends('user.layouts.front')
@section('title', 'Dashbaord')
@section('css')
    <link rel="stylesheet" href="{{ url('assets/user/css/dashboard.css') }}">
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
                <h3 class="fontColor">Dashboard</h3>
            </div>
            <div class="right-side">
                {{-- <a href="{{route('logout')}}" class="upload small-btn">Logout</a> --}}
                @include('user.common.profileView')
            </div>
        </div>
        @php
            $user = Auth::user();
        @endphp
        <div class="content-view-box dashboard-view">
            <div class="upload-box">
                <p>Access Keys encryption (AKE) lets you encrypt content in the client's browser before any data is
                    transmitted or stored in Google cloud-based storage. Google servers can't access your encryption keys
                    stored in DSM.</p>
                <div class="d-flex align-items-center update-status">
                    <button class="small-btn upload-bordered" onClick="window.location.reload();">
                        <span>Last updated: {{ $dashboardData['lastUpdated'] }}</span>
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M17.0595 2.94155C16.0107 1.88463 14.7376 1.0765 13.3342 0.576845C11.9308 0.0771855 10.4329 -0.101244 8.95122 0.0547322C4.35903 0.517123 0.580172 4.24124 0.0671484 8.82765C-0.621054 14.8887 4.07124 20 9.98978 20C11.8793 20 13.7301 19.4645 15.3271 18.4558C16.9241 17.447 18.2017 16.0064 19.0115 14.3014C19.4119 13.4641 18.8113 12.5018 17.8853 12.5018C17.4224 12.5018 16.9844 12.7517 16.7842 13.1641C16.0577 14.725 14.8152 15.9884 13.2655 16.7418C11.7159 17.4951 9.95375 17.6925 8.27553 17.3006C5.49769 16.6883 3.25791 14.4263 2.66981 11.652C2.42259 10.5551 2.42546 9.41668 2.67818 8.32102C2.93091 7.22536 3.42703 6.20046 4.12986 5.32213C4.83269 4.44381 5.72423 3.73452 6.73855 3.24675C7.75287 2.75897 8.86401 2.50518 9.98978 2.50415C12.0669 2.50415 13.9188 3.36645 15.2702 4.72862L13.3807 6.61568C12.5924 7.40299 13.143 8.75267 14.2566 8.75267H18.7487C19.4369 8.75267 20 8.1903 20 7.50296V3.01653C20 1.90429 18.6486 1.34193 17.8603 2.12924L17.0595 2.94155Z"
                                fill="#A1FF00" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="dashboard-upper-box">
                <div class="left-box">
                    <div class="row g-3">
                        <div class="col-lg-3 col-md-6">
                            <a href="{{ route('passwords.index') }}">
                                <div class="gen-bordered-box filled general-box-main status-box-parent">
                                    <div class="status-of">
                                        <div class="icon-box">
                                            <svg width="30" height="31" viewBox="0 0 30 31" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M15.3027 10.979C15.3027 10.6554 15.0404 10.3931 14.7168 10.3931C14.3932 10.3931 14.1309 10.6554 14.1309 10.979C14.1309 11.3026 14.3932 11.5649 14.7168 11.5649C15.0404 11.5649 15.3027 11.3026 15.3027 10.979Z"
                                                    fill="white" />
                                                <path
                                                    d="M15.3027 1.80029C15.3027 1.47674 15.0404 1.21436 14.7168 1.21436C14.3932 1.21436 14.1309 1.47674 14.1309 1.80029C14.1309 2.12391 14.3932 2.38623 14.7168 2.38623C15.0404 2.38623 15.3027 2.12391 15.3027 1.80029Z"
                                                    fill="white" />
                                                <path d="M14.7061 7.91248V4.45557" stroke="white" stroke-width="1.5"
                                                    stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M17.2224 8.49941L18.3232 6.10943L21.3632 6.10943L23.1699 4.63428"
                                                    stroke="white" stroke-width="1.5" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M18.6759 9.95947H22.1748" stroke="white" stroke-width="1.5"
                                                    stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M19.2756 12.3599L21.6179 14.282H24.4223L26.292 15.8948"
                                                    stroke="white" stroke-width="1.5" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M18.6758 15.2954L21.3975 17.8793" stroke="white" stroke-width="1.5"
                                                    stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M10.1582 12.7345H5.92522L3.7825 10.7812" stroke="white"
                                                    stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M10.7783 9.95947H7.37555" stroke="white" stroke-width="1.5"
                                                    stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M10.9648 15.2954L8.68268 16.4939H5.64184L3.5201 18.0684"
                                                    stroke="white" stroke-width="1.5" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M12.291 8.32076L10.4949 6.18408H8.06857V3.53125" stroke="white"
                                                    stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M12.7892 18.1457V16.603C11.2352 15.8768 10.1583 14.3 10.1582 12.4713C10.1581 9.95765 12.1923 7.91847 14.706 7.91261C17.2286 7.90675 19.2754 9.94991 19.2754 12.4712C19.2754 14.2999 18.1985 15.8768 16.6444 16.603L16.6444 27.729L14.7168 29.7695L12.7892 27.729L12.7892 25.7372"
                                                    stroke="white" stroke-width="1.5" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M12.0131 20.6523H13.25" stroke="white" stroke-width="1.5"
                                                    stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M12.0131 23.1943H13.25" stroke="white" stroke-width="1.5"
                                                    stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                <path
                                                    d="M24.6953 9.95969C24.6953 9.26354 24.131 8.69922 23.4348 8.69922C22.7388 8.69922 22.1744 9.26354 22.1744 9.95969C22.1744 10.6558 22.7388 11.2201 23.4348 11.2201C24.131 11.2201 24.6953 10.6558 24.6953 9.95969Z"
                                                    stroke="#A1FF00" stroke-width="1.5" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path
                                                    d="M9.3291 2.26047C9.3291 1.56432 8.76479 1 8.06869 1C7.37254 1 6.80822 1.56432 6.80822 2.26047C6.80822 2.95656 7.37254 3.52088 8.06869 3.52088C8.76479 3.52088 9.3291 2.95656 9.3291 2.26047Z"
                                                    stroke="#A1FF00" stroke-width="1.5" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path
                                                    d="M4.12207 9.81906C4.12207 9.12297 3.55775 8.55859 2.8616 8.55859C2.16551 8.55859 1.60119 9.12297 1.60119 9.81906C1.60119 10.5152 2.16551 11.0795 2.8616 11.0795C3.55775 11.0795 4.12207 10.5152 4.12207 9.81906Z"
                                                    stroke="#A1FF00" stroke-width="1.5" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path
                                                    d="M23.4355 18.9147C23.4355 18.2186 22.8712 17.6543 22.1751 17.6543C21.479 17.6543 20.9147 18.2186 20.9147 18.9147C20.9147 19.6109 21.479 20.1752 22.1751 20.1752C22.8712 20.1752 23.4355 19.6109 23.4355 18.9147Z"
                                                    stroke="#A1FF00" stroke-width="1.5" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M3.52051 18.0684H0.99963L0.99963 20.5892H3.52051L3.52051 18.0684Z"
                                                    stroke="#A1FF00" stroke-width="1.5" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M28.8135 15.8945H26.2926V18.4154H28.8135V15.8945Z"
                                                    stroke="#A1FF00" stroke-width="1.5" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M25.6904 2.11328L23.1696 2.11328V4.63416H25.6904V2.11328Z"
                                                    stroke="#A1FF00" stroke-width="1.5" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        <div class="status-name">Passwords </div>
                                    </div>
                                    <div class="numbers">{{ $dashboardData['totalUploadedPassword'] ?? 0 }}</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="gen-bordered-box filled general-box-main status-box-parent">
                                <div class="status-of">
                                    <div class="icon-box">
                                        <svg width="30" height="29" viewBox="0 0 30 29" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M28.2422 8.20312C29.2114 8.20312 30 7.41457 30 6.44531V1.75781C30 0.788555 29.2114 0 28.2422 0H25.2148C24.8912 0 24.6289 0.262383 24.6289 0.585938C24.6289 0.909492 24.8912 1.17188 25.2148 1.17188H28.2422C28.5653 1.17188 28.8281 1.43473 28.8281 1.75781V6.44531C28.8281 6.7684 28.5653 7.03125 28.2422 7.03125H1.75781C1.43473 7.03125 1.17188 6.7684 1.17188 6.44531V1.75781C1.17188 1.43473 1.43473 1.17188 1.75781 1.17188H20.5273C20.8509 1.17188 21.1133 0.909492 21.1133 0.585938C21.1133 0.262383 20.8509 0 20.5273 0H1.75781C0.788555 0 0 0.788555 0 1.75781V6.44531C0 7.41457 0.788555 8.20312 1.75781 8.20312H2.34375V9.96094H1.75781C0.788555 9.96094 0 10.7495 0 11.7188V16.4062C0 17.3755 0.788555 18.1641 1.75781 18.1641H2.34375V19.9219H1.75781C0.788555 19.9219 0 20.7104 0 21.6797V26.3672C0 27.3364 0.788555 28.125 1.75781 28.125H28.2422C29.2114 28.125 30 27.3364 30 26.3672V21.6797C30 20.7104 29.2114 19.9219 28.2422 19.9219H27.6562V18.1641H28.2422C29.2114 18.1641 30 17.3755 30 16.4062V11.7188C30 10.7495 29.2114 9.96094 28.2422 9.96094H27.6562V8.20312H28.2422ZM28.8281 21.6797V26.3672C28.8281 26.6903 28.5653 26.9531 28.2422 26.9531H1.75781C1.43473 26.9531 1.17188 26.6903 1.17188 26.3672V21.6797C1.17188 21.3566 1.43473 21.0938 1.75781 21.0938H28.2422C28.5653 21.0938 28.8281 21.3566 28.8281 21.6797ZM26.4844 19.9219H3.51562V18.1641H26.4844V19.9219ZM28.8281 11.7188V16.4062C28.8281 16.7293 28.5653 16.9922 28.2422 16.9922H1.75781C1.43473 16.9922 1.17188 16.7293 1.17188 16.4062V11.7188C1.17188 11.3957 1.43473 11.1328 1.75781 11.1328H28.2422C28.5653 11.1328 28.8281 11.3957 28.8281 11.7188ZM26.4844 9.96094H3.51562V8.20312H26.4844V9.96094Z"
                                                fill="white" />
                                            <path
                                                d="M25.3125 12.3047C24.3432 12.3047 23.5547 13.0932 23.5547 14.0625C23.5547 15.0318 24.3432 15.8203 25.3125 15.8203C26.2818 15.8203 27.0703 15.0318 27.0703 14.0625C27.0703 13.0932 26.2818 12.3047 25.3125 12.3047ZM25.3125 14.6484C24.9894 14.6484 24.7266 14.3856 24.7266 14.0625C24.7266 13.7394 24.9894 13.4766 25.3125 13.4766C25.6356 13.4766 25.8984 13.7394 25.8984 14.0625C25.8984 14.3856 25.6356 14.6484 25.3125 14.6484Z"
                                                fill="#A1FF00" />
                                            <path
                                                d="M7.03125 12.3047H4.6875C3.71824 12.3047 2.92969 13.0932 2.92969 14.0625C2.92969 15.0318 3.71824 15.8203 4.6875 15.8203H7.03125C8.00051 15.8203 8.78906 15.0318 8.78906 14.0625C8.78906 13.0932 8.00051 12.3047 7.03125 12.3047ZM7.03125 14.6484H4.6875C4.36441 14.6484 4.10156 14.3856 4.10156 14.0625C4.10156 13.7394 4.36441 13.4766 4.6875 13.4766H7.03125C7.35434 13.4766 7.61719 13.7394 7.61719 14.0625C7.61719 14.3856 7.35434 14.6484 7.03125 14.6484Z"
                                                fill="#A1FF00" />
                                            <path
                                                d="M14.0625 12.3047H11.7188C10.7495 12.3047 9.96094 13.0932 9.96094 14.0625C9.96094 15.0318 10.7495 15.8203 11.7188 15.8203H14.0625C15.0318 15.8203 15.8203 15.0318 15.8203 14.0625C15.8203 13.0932 15.0318 12.3047 14.0625 12.3047ZM14.0625 14.6484H11.7188C11.3957 14.6484 11.1328 14.3856 11.1328 14.0625C11.1328 13.7394 11.3957 13.4766 11.7188 13.4766H14.0625C14.3856 13.4766 14.6484 13.7394 14.6484 14.0625C14.6484 14.3856 14.3856 14.6484 14.0625 14.6484Z"
                                                fill="#A1FF00" />
                                            <path
                                                d="M25.3125 5.85938C26.2818 5.85938 27.0703 5.07082 27.0703 4.10156C27.0703 3.1323 26.2818 2.34375 25.3125 2.34375C24.3432 2.34375 23.5547 3.1323 23.5547 4.10156C23.5547 5.07082 24.3432 5.85938 25.3125 5.85938ZM25.3125 3.51562C25.6356 3.51562 25.8984 3.77848 25.8984 4.10156C25.8984 4.42465 25.6356 4.6875 25.3125 4.6875C24.9894 4.6875 24.7266 4.42465 24.7266 4.10156C24.7266 3.77848 24.9894 3.51562 25.3125 3.51562Z"
                                                fill="#A1FF00" />
                                            <path
                                                d="M4.6875 2.34375C3.71824 2.34375 2.92969 3.1323 2.92969 4.10156C2.92969 5.07082 3.71824 5.85938 4.6875 5.85938H7.03125C8.00051 5.85938 8.78906 5.07082 8.78906 4.10156C8.78906 3.1323 8.00051 2.34375 7.03125 2.34375H4.6875ZM7.61719 4.10156C7.61719 4.42465 7.35434 4.6875 7.03125 4.6875H4.6875C4.36441 4.6875 4.10156 4.42465 4.10156 4.10156C4.10156 3.77848 4.36441 3.51562 4.6875 3.51562H7.03125C7.35434 3.51562 7.61719 3.77848 7.61719 4.10156Z"
                                                fill="#A1FF00" />
                                            <path
                                                d="M11.7188 2.34375C10.7495 2.34375 9.96094 3.1323 9.96094 4.10156C9.96094 5.07082 10.7495 5.85938 11.7188 5.85938H14.0625C15.0318 5.85938 15.8203 5.07082 15.8203 4.10156C15.8203 3.1323 15.0318 2.34375 14.0625 2.34375H11.7188ZM14.6484 4.10156C14.6484 4.42465 14.3856 4.6875 14.0625 4.6875H11.7188C11.3957 4.6875 11.1328 4.42465 11.1328 4.10156C11.1328 3.77848 11.3957 3.51562 11.7188 3.51562H14.0625C14.3856 3.51562 14.6484 3.77848 14.6484 4.10156Z"
                                                fill="#A1FF00" />
                                            <path
                                                d="M25.3125 22.2656C24.3432 22.2656 23.5547 23.0542 23.5547 24.0234C23.5547 24.9927 24.3432 25.7812 25.3125 25.7812C26.2818 25.7812 27.0703 24.9927 27.0703 24.0234C27.0703 23.0542 26.2818 22.2656 25.3125 22.2656ZM25.3125 24.6094C24.9894 24.6094 24.7266 24.3465 24.7266 24.0234C24.7266 23.7004 24.9894 23.4375 25.3125 23.4375C25.6356 23.4375 25.8984 23.7004 25.8984 24.0234C25.8984 24.3465 25.6356 24.6094 25.3125 24.6094Z"
                                                fill="#A1FF00" />
                                            <path
                                                d="M7.03125 22.2656H4.6875C3.71824 22.2656 2.92969 23.0542 2.92969 24.0234C2.92969 24.9927 3.71824 25.7812 4.6875 25.7812H7.03125C8.00051 25.7812 8.78906 24.9927 8.78906 24.0234C8.78906 23.0542 8.00051 22.2656 7.03125 22.2656ZM7.03125 24.6094H4.6875C4.36441 24.6094 4.10156 24.3465 4.10156 24.0234C4.10156 23.7004 4.36441 23.4375 4.6875 23.4375H7.03125C7.35434 23.4375 7.61719 23.7004 7.61719 24.0234C7.61719 24.3465 7.35434 24.6094 7.03125 24.6094Z"
                                                fill="#A1FF00" />
                                            <path
                                                d="M14.0625 22.2656H11.7188C10.7495 22.2656 9.96094 23.0542 9.96094 24.0234C9.96094 24.9927 10.7495 25.7812 11.7188 25.7812H14.0625C15.0318 25.7812 15.8203 24.9927 15.8203 24.0234C15.8203 23.0542 15.0318 22.2656 14.0625 22.2656ZM14.0625 24.6094H11.7188C11.3957 24.6094 11.1328 24.3465 11.1328 24.0234C11.1328 23.7004 11.3957 23.4375 11.7188 23.4375H14.0625C14.3856 23.4375 14.6484 23.7004 14.6484 24.0234C14.6484 24.3465 14.3856 24.6094 14.0625 24.6094Z"
                                                fill="#A1FF00" />
                                            <path
                                                d="M22.8711 1.17188C23.1947 1.17188 23.457 0.909542 23.457 0.585938C23.457 0.262333 23.1947 0 22.8711 0C22.5475 0 22.2852 0.262333 22.2852 0.585938C22.2852 0.909542 22.5475 1.17188 22.8711 1.17188Z"
                                                fill="white" />
                                        </svg>
                                    </div>
                                    <div class="status-name">Used Space</div>
                                </div>
                                <div class="numbers">{{ $dashboardData['usedSpace'] }}</div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <a href="{{ route('passwords.index') }}">
                                <div class="gen-bordered-box filled general-box-main status-box-parent">
                                    <div class="status-of">
                                        <div class="icon-box">
                                            <svg width="31" height="31" viewBox="0 0 31 31" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M12.001 2.875H25.6094C26.6449 2.875 27.4844 3.71447 27.4844 4.75V5.6875"
                                                    stroke="#A1FF00" stroke-width="2" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M23.1484 10.7266H7.67969V15.8828H23.1484V10.7266Z"
                                                    stroke="#A1FF00" stroke-width="2" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M23.1484 18.4609H14.0469" stroke="#A1FF00" stroke-width="2"
                                                    stroke-miterlimit="10" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M16.8203 28.4229C16.8203 27.6462 16.1907 27.0166 15.4141 27.0166C14.6374 27.0166 14.0078 27.6462 14.0078 28.4229C14.0078 29.1995 14.6374 29.8291 15.4141 29.8291C16.1907 29.8291 16.8203 29.1995 16.8203 28.4229Z"
                                                    stroke="white" stroke-width="2" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M15.4141 23.8518V27.0166" stroke="white" stroke-width="2"
                                                    stroke-miterlimit="10" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M16.8203 28.4229H24.7305" stroke="white" stroke-width="2"
                                                    stroke-miterlimit="10" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M14.0078 28.4229H6.09766" stroke="white" stroke-width="2"
                                                    stroke-miterlimit="10" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M18.9591 23.5H2.875C1.83947 23.5 1 22.6605 1 21.625V14.8867"
                                                    stroke="white" stroke-width="2" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path
                                                    d="M1 9.61328V2.875C1 1.83947 1.83947 1 2.875 1H9.22609C9.72408 1 10.2016 1.19805 10.5533 1.55055L14.6816 5.6875H27.9531C28.9887 5.6875 29.8281 6.52697 29.8281 7.5625V21.625C29.8281 22.6605 28.9887 23.5 27.9531 23.5H24.2325"
                                                    stroke="white" stroke-width="2" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        <div class="status-name">Platforms</div>
                                    </div>
                                    <div class="numbers">{{ $dashboardData['numberOfPlatforms'] }}</div>
                                </div>
                            </a>
                        </div>

                        @if (Auth::user()->role == 'business')
                            <div class="col-lg-3 col-md-6">
                                <a href="{{ route('memberPage') }}">
                                    <div class="gen-bordered-box filled general-box-main status-box-parent">
                                        <div class="status-of">
                                            <div class="icon-box">
                                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M24.8779 16.0001C24.8779 20.9035 20.9029 24.8784 15.9995 24.8784C11.0961 24.8784 7.12109 20.9035 7.12109 16.0001C7.12109 11.0966 11.0961 7.1217 15.9995 7.1217C20.9029 7.1217 24.8779 11.0966 24.8779 16.0001Z"
                                                        stroke="white" stroke-width="1.5" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        d="M17.0254 20.9717H20.9717V18.3678C20.9717 17.06 19.9117 16 18.6045 16H13.3955C12.0883 16 11.0283 17.06 11.0283 18.3678V20.9717H14.9746"
                                                        stroke="white" stroke-width="1.5" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M18.4863 19.7879V20.9717" stroke="white" stroke-width="1.5"
                                                        stroke-miterlimit="10" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M13.5137 19.7879V20.9717" stroke="white" stroke-width="1.5"
                                                        stroke-miterlimit="10" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M4.99023 16H7.12105" stroke="white" stroke-width="1.5"
                                                        stroke-miterlimit="10" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M27.0097 16H24.8789" stroke="white" stroke-width="1.5"
                                                        stroke-miterlimit="10" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M16 4.99076V7.12158" stroke="white" stroke-width="1.5"
                                                        stroke-miterlimit="10" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M16 27.0093V24.8785" stroke="white" stroke-width="1.5"
                                                        stroke-miterlimit="10" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M6.82617 6.8259L9.66727 9.66699" stroke="white"
                                                        stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M25.1741 6.8259L22.333 9.66699" stroke="white"
                                                        stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M25.1741 25.1743L22.333 22.3332" stroke="white"
                                                        stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M6.82617 25.1743L9.66727 22.3332" stroke="white"
                                                        stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path
                                                        d="M6.43203 3.14522C7.0625 3.57061 7.47676 4.29189 7.47676 5.10928C7.47676 6.41709 6.4168 7.47705 5.10898 7.47705C3.80117 7.47705 2.74121 6.41709 2.74121 5.10928C2.74121 4.02588 3.46895 3.1124 4.46211 2.83057"
                                                        stroke="#A1FF00" stroke-width="1.5" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        d="M17.7759 3.21504C17.7759 4.19572 16.981 4.99072 16.0002 4.99072C15.0196 4.99072 14.2246 4.19572 14.2246 3.21504C14.2246 2.23436 15.0196 1.43936 16.0002 1.43936C16.981 1.43936 17.7759 2.23436 17.7759 3.21504Z"
                                                        stroke="#A1FF00" stroke-width="1.5" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        d="M17.7759 28.7849C17.7759 29.7655 16.981 30.5605 16.0002 30.5605C15.0196 30.5605 14.2246 29.7655 14.2246 28.7849C14.2246 27.8042 15.0196 27.0092 16.0002 27.0092C16.981 27.0092 17.7759 27.8042 17.7759 28.7849Z"
                                                        stroke="#A1FF00" stroke-width="1.5" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        d="M30.5601 16.0002C30.5601 16.9809 29.7651 17.7759 28.7844 17.7759C27.8037 17.7759 27.0088 16.9809 27.0088 16.0002C27.0088 15.0195 27.8037 14.2245 28.7844 14.2245C29.7651 14.2245 30.5601 15.0195 30.5601 16.0002Z"
                                                        stroke="#A1FF00" stroke-width="1.5" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        d="M4.99076 16.0002C4.99076 16.9809 4.19582 17.7759 3.21508 17.7759C2.23445 17.7759 1.43945 16.9809 1.43945 16.0002C1.43945 15.0195 2.23445 14.2245 3.21508 14.2245C4.19582 14.2245 4.99076 15.0195 4.99076 16.0002Z"
                                                        stroke="#A1FF00" stroke-width="1.5" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        d="M18.9599 13.0405C18.9599 14.675 17.6349 16 16.0005 16C14.3661 16 13.041 14.675 13.041 13.0405C13.041 11.4061 14.3661 10.0811 16.0005 10.0811C17.6349 10.0811 18.9599 11.4061 18.9599 13.0405Z"
                                                        stroke="white" stroke-width="1.5" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        d="M29.2586 5.10896C29.2586 6.41654 28.1986 7.47656 26.891 7.47656C25.5834 7.47656 24.5234 6.41654 24.5234 5.10896C24.5234 3.80139 25.5834 2.74143 26.891 2.74143C28.1986 2.74143 29.2586 3.80139 29.2586 5.10896Z"
                                                        stroke="#A1FF00" stroke-width="1.5" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        d="M29.1377 26.1404C29.2162 26.376 29.259 26.6285 29.259 26.891C29.259 28.1988 28.199 29.2588 26.8912 29.2588C25.5834 29.2588 24.5234 28.1988 24.5234 26.891C24.5234 25.5832 25.5834 24.5232 26.8912 24.5232C27.1971 24.5232 27.4889 24.5813 27.7572 24.6867"
                                                        stroke="#A1FF00" stroke-width="1.5" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        d="M7.47635 26.8908C7.47635 28.1983 6.41639 29.2583 5.10881 29.2583C3.80123 29.2583 2.74121 28.1983 2.74121 26.8908C2.74121 25.5832 3.80123 24.5232 5.10881 24.5232C6.41639 24.5232 7.47635 25.5832 7.47635 26.8908Z"
                                                        stroke="#A1FF00" stroke-width="1.5" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                            <div class="status-name">Total Users</div>
                                        </div>
                                        <div class="numbers">{{ $dashboardData['totalUsers'] }}</div>
                                    </div>
                                </a>
                            </div>
                        @endif

                        <div class="col-lg-6">
                            <div class="gen-bordered-box general-box-main">
                                <div class="main-top-area">
                                    <div class="status-box-area">
                                        <div class="status-of">
                                            <div>
                                                <div class="status-name">Total Passwords</div>
                                                <div class="numbers">{{ $totalUploadedPassword }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="filter-buttons">
                                        <button onclick="updateChart('Weekly')">Weekly</button>
                                        <button onclick="updateChart('Monthly')" class="active">Monthly</button>
                                        <button onclick="updateChart('Yearly')">Yearly</button>
                                        {{-- <button>Weekly</button>
                                        <button class="active">Monthly</button>
                                        <button>Yearly</button> --}}
                                    </div>
                                </div>
                                {{-- <canvas id="data-traffic-chart" width="400" height="200"></canvas> --}}
                                <div class="canvas-con">
                                    {{-- <div class="canvas-con-inner col-md-12"> --}}
                                    <canvas id="usedExtensionChart" width="60" height="60"></canvas>
                                    <div id="innerContent"
                                        style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
                                        {{-- <h3>0</h3>
                                            <p>Used Extensions</p> --}}
                                    </div>
                                    {{-- </div> --}}
                                </div>
                                {{-- <div class="row graph-label">
                                    <div class="col-6">
                                        <div class="position-relative ps-3">
                                            <label class="space used">Used Password</label>
                                            <span>{{ $dashboardData['usedSpace'] ?? 0 }}</span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="position-relative ps-3">
                                            <label class="space available-black">Available Password</label>
                                            <span>{{ $dashboardData['avaliableSpace'] ?? 0 }}</span>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="gen-bordered-box general-box-main pie-box">
                                <div class="main-top-area">
                                    <div class="status-box-area">
                                        <div class="status-of">
                                            <div>
                                                <div class="status-name">User Browser</div>
                                                <div class="numbers">{{ $dashboardData['totalUploadedPassword'] }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="filter-buttons filter-btn-two">
                                        <button>Weekly</button>
                                        <button class="active">Monthly</button>
                                        <button>Yearly</button>
                                    </div>
                                </div>
                                {{-- <canvas id="data-traffic-chart" width="400" height="200"></canvas> --}}
                                <div class="canvas-con">
                                    <div class="canvas-con-inner col-md-12">
                                        <canvas id="userBrowserChart" width="60" height="60"></canvas>
                                        <div id="innerContent"
                                            style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
                                            <h3>100</h3>
                                            <p>User Browser</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row graph-label">
                                    <div class="col-6 col-sm-3">
                                        <div class="position-relative ps-3">
                                            <label class="space opera">Opera Mini</label>
                                            <span>30%</span>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-3">
                                        <div class="position-relative ps-3">
                                            <label class="space chrome">Google Chrome</label>
                                            <span>25%</span>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-3">
                                        <div class="position-relative ps-3">
                                            <label class="space windows">Windows</label>
                                            <span>25%</span>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-3">
                                        <div class="position-relative ps-3">
                                            <label class="space safari">Safari</label>
                                            <span>20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="right-box">
                    <div class="gen-bordered-box general-box-main">
                        <div class="row align-items-center">
                            <div class="col-xxl-12 col-md-6">
                                <div class="d-flex align-items-start device-info-box flex-column">
                                    <div class="box-title mb-3">Device Information</div>
                                    {{-- <select class="form-select w-auto" name="primaryHsmId" id="primaryHsmId">
                                        <option value="" disabled selected>Device</option>
                                        <option value="device">Device</option>
                                    </select> --}}
                                    <select class="form-select w-auto" name="primaryHsmId" id="primaryHsmId">
                                        @if ($allHsmDevice)
                                            <option value="" disabled selected>Select Device</option>
                                            @foreach ($allHsmDevice as $hsmDevice)
                                                <option data-hsmId="{{ $hsmDevice->hsmId }}"
                                                    value="{{ $hsmDevice->hsmId }}"
                                                    {{ !empty($user) && $user->primaryHsmId == $hsmDevice->hsmId ? 'selected' : '' }}>
                                                    {{ $hsmDevice->name }}
                                                </option>
                                            @endforeach
                                        @else
                                            <option selected disabled>No Device Found</option>
                                        @endif

                                    </select>
                                </div>
                                <div class="image-box">
                                    <img src="{{ asset('assets/user/images/device.png') }}" alt="">
                                </div>
                                <div class="row g-3">
                                    <div class="col-lg-12 col-md-6">
                                        <div class="border-box gen-bordered-box">
                                            <div class="small-label">HSM Name</div>
                                            <p>{{ $dashboardData['hsmDetail']->name ?? 'N/A' }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-6">
                                        <div class="border-box gen-bordered-box">
                                            <div class="small-label">HSM Location</div>
                                            <p>{{ $dashboardData['hsmDetail']->location ?? 'N/A' }}</p>
                                        </div>
                                    </div>
                                    <div class="col-xxl-6 col-md-6">
                                        <div class="border-box gen-bordered-box">
                                            <div class="small-label">MAC Id</div>
                                            <p>{{ $dashboardData['hsmDetail']->macId ?? 'N/A' }}</p>
                                        </div>
                                    </div>
                                    <div class="col-xxl-6 col-md-6">
                                        <div class="border-box gen-bordered-box">
                                            <div class="small-label">Temperature</div>
                                            <p>{{ $dashboardData['hsmDetail']->temperature ?? 0 }} °C</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-6">
                                        <div class="border-box gen-bordered-box">
                                            <div class="small-label">Last Access Date</div>
                                            <p>{{ $dashboardData['hsmDetail']->lastUseDateTime ?? 'N/A' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-12 col-md-6">
                                <div class="usage-graph-box text-center">
                                    <div class="row">
                                        <div class="col-6">

                                            {{-- <div id="doughnut-container"></div> --}}

                                            <div class="canvas-con">
                                                <div class="canvas-con-inner">
                                                    <canvas id="mychart" width="60" height="60"></canvas>
                                                </div>
                                            </div>

                                        </div>


                                        {{-- <img src="{{ asset('assets/user/images/temp-graph.png') }}" alt=""> --}}
                                        <div class="col-6">
                                            <div class="box-parent">
                                                <div class="space used small-label">Used Space</div>
                                                <p>{{ $dashboardData['usedSpace'] }}</p>
                                                {{-- <p>{{ $doughnutChartUsedSpace . ' ' . $doughnutChartUsedSpaceRs }}</p> --}}
                                            </div>
                                            <div class="box-parent">
                                                <label class="space available-black small-label">Available Space</label>
                                                <p>{{ $dashboardData['avaliableSpace'] }}</p>
                                                {{-- <p>{{ $doughnutChartAvailableSpace . ' ' . $doughnutChartAvailableSpaceRs }}
                                            </p> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="gen-bordered-box">
                <div class="gen-bordered-bottom general-box-main">
                    <div class="main-top-area m-0">
                        <h4>Platforms</h4>
                        <div class="btn-parent">
                            {{-- <button class="small-btn upload-bordered">
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.5934 7.59341L12.6992 7.69967C12.8889 7.51069 12.9834 7.27405 12.9834 7.00008C12.9834 6.72612 12.8889 6.48931 12.6994 6.29985C12.5104 6.11083 12.2738 6.01675 12 6.01675H7.98335V2.00008C7.98335 1.72628 7.88928 1.48954 7.70044 1.30003L7.70007 1.29966C7.51057 1.11082 7.27382 1.01675 7.00002 1.01675C6.72621 1.01675 6.48964 1.11083 6.30062 1.29985C6.11116 1.48931 6.01669 1.72612 6.01669 2.00008V6.01675H2.00002C1.72622 6.01675 1.48947 6.11082 1.29997 6.29966L1.2996 6.30003C1.11076 6.48954 1.01669 6.72628 1.01669 7.00008C1.01669 7.27389 1.11077 7.51046 1.29979 7.69948C1.48925 7.88895 1.72605 7.98342 2.00002 7.98342H6.01669V12.0001C6.01669 12.2739 6.11108 12.5105 6.30054 12.6994C6.4895 12.889 6.7261 12.9834 7.00002 12.9834C7.27399 12.9834 7.51079 12.8889 7.70025 12.6995C7.88927 12.5105 7.98335 12.2739 7.98335 12.0001V7.98342H12C12.274 7.98342 12.5106 7.88893 12.6996 7.6993L12.5934 7.59341ZM12.5934 7.59341C12.4339 7.75342 12.2361 7.83342 12 7.83342H7.98335V6.16675H12C12.2361 6.16675 12.4339 6.24647 12.5934 6.40591C12.7534 6.56591 12.8334 6.76397 12.8334 7.00008C12.8334 7.23619 12.7534 7.43397 12.5934 7.59341Z"
                                    fill="white" stroke="white" stroke-width="0.3" />
                            </svg>
                            <span>Add New</span>
                        </button> --}}
                            <a class="small-btn upload-bordered" href="{{ route('passwords.index') }}">View All</a>
                        </div>
                    </div>
                </div>
                <div class="general-box-main">
                    <div class="bordered-box-parent">
                        @forelse ($dashboardData['platformDetail']->take(7) as $platform)
                            <div class="bordered-item">
                                <div class="main-area-border gen-bordered-box filled">
                                    <div class="icon-box">
                                        <img src="{{ $platform->faviconUrl ?? url('assets/img/no_favicon.png') }}"
                                            @if (empty($platform->faviconUrl)) title="No Favicon" @endif />
                                    </div>
                                    <div class="numbers">
                                        <p class="mb-0">{{ $platform->platform }}</p>
                                    </div>
                                </div>
                            </div>
                        @empty
                        <div class="bordered-item">
                            <p class="mb-0">No Data Found!</p>
                        </div>
                        @endforelse

                    </div>
                </div>
            </div>
            @if (App\Helpers\CommonHelper::getUserCustomMultipleRoles('index', 'cloud') || Auth::user()->role == 'business')
                <div class="gen-bordered-box">
                    <div class="gen-bordered-bottom general-box-main">
                        <div class="main-top-area m-0">
                            <h4>Recent Activity</h4>
                            <div class="btn-parent">
                                <a href="{{ route('audit-logs.index') }}"><button class="small-btn upload-bordered">View
                                        All</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="general-box-main">
                        <div class="box-item">
                            <div class="table-responsive">
                                <table class="table text-white" id="cloud-file-table">
                                    <thead>
                                        {{-- <tr>
                                    <th scope="col">User Name</th>
                                    <th scope="col">Security Key</th>
                                    <th scope="col">Date and Time</th>
                                    <th scope="col">Key Size</th>
                                </tr> --}}
                                    </thead>
                                    <tbody id="table-body">
                                        @include('user.table.cloud', compact('dashboardData'))
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <div class="modal fade" id="privacyStatus" aria-hidden="true" aria-labelledby="privacyStatusLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="privacyStatusLabel">Privacy Status</h5>
                    <a href="{{ route('dashboardPage') }}" class="btn-close"></a>
                </div>
                <div class="modal-body">
                    <div id="status-private-key-section">
                        <div class="flex-box-copy-btn">
                            <h5 class="modal-title no-mag-tp no-mag-bt"><span id="status-private-key"></span></h5>
                            <div class="btn-box text-center">
                                <input type="hidden" id="status-input-private-key" name="privacyKey">
                                <input type="hidden" id="status-input-id">
                                <button type="button" id="status-copy-text" onclick="changeText()"
                                    data-clipboard-target="#status-private-key" class="upload btn md-btn">Copy
                                    Key</button>
                            </div>
                        </div>
                        <div class="ket-detail">
                            <p>Save as Private encryption Key</p>
                            <a id="status-download-text" download="" href="#" class="upload dark-link">Download
                                As File</a>
                        </div>
                        <hr>
                    </div>
                    <div class="upload-parent text-center">
                        <button type="submit" onclick="privateStatus()" id="upload-file" class="upload md-btn">Change
                            Status</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="publicStatus" aria-hidden="true" aria-labelledby="publicStatusLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="publicStatusLabel">Privacy Status</h5>
                    <a href="{{ route('dashboardPage') }}" class="btn-close"></a>
                </div>
                <div class="modal-body">
                    <div id="status-private-key-section">
                        <h5 class="modal-title text-center">Private encryption Key</h5>
                        <div class="text-center btn-box">
                            <input type="text" placeholder="Enter private encryption key" id="input-privacy-key"
                                name="privacyKey">
                            <input type="hidden" id="input-privacy-id">
                            <span id="privacy-error"></span>
                        </div>
                        <hr>
                    </div>
                    <div class="upload-parent text-center">
                        <button type="submit" onclick="publicStatus()" id="upload-file" class="upload md-btn">Change
                            Status</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteCloudFile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-hidden="true" aria-labelledby="deleteCloudFileLabel">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('deleteCloudFile') }}" method="POST">
                    @csrf
                    <input type="hidden" id="delete-id" name="id">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteCloudFileLabel">Move to Trash</h5>
                    </div>
                    <div class="modal-body">
                        <h3>Are you sure you want to move this file to Trash?</h3>
                        <p></p>
                        <p>This item can be recovered from the Trash</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn upload-bordered small-btn" data-bs-dismiss="modal"
                            aria-label="Close">Cancel</button>
                        <button type="submit" id="submit" class="btn upload small-btn"
                            onclick="#">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Licence Key Modal --}}
    {{-- <div class="modal fade" id="licenceModel" aria-hidden="true" data-bs-backdrop="static"
    aria-labelledby="licenceModelLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="licenceModelLabel">Verify Licence Key</h5>
                <button type="button" class="btn-close" onClick="window.location.href='{{ route('logout') }}';"
                    data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form role="form" action="{{ route('verifyLicenceKey') }}" class="application" method="post"
                    id='verifyLicenceKey' enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="userId" name="id">

                    <div class="input-grp">
                        <label>Licence Key *</label>
                        <input type="text" name="licenceKey" id="licenceKey">
                    </div>

                    <div class="save-box">
                        <button type="submit" class="submit-btn upload small-btn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> --}}
    {{-- End Licence Key Modal --}}
@endsection


@section('js')
    <script type="text/javascript" src="{{ url('assets/js/Chart.min.js') }}"></script>
    <script>
        jQuery(document).ready(function() {
            jQuery('.filter-buttons').each(function() {
                var parentgroup = jQuery(this);
                parentgroup.find('button').on('click', function() {
                    parentgroup.find('button').removeClass('active');
                    jQuery(this).addClass('active');
                });
            });
        });
    </script>
    <script>
        // $('document').ready(function() {

        //     var userRole = '{{ $user->role }}';
        //     var LicenceVerified = '{{ $user->isLicenceVerified ?? 0 }}';
        //     var userId = '{{ $user->id ?? 0 }}';

        //     if (LicenceVerified == 0 && userRole == 'business') {
        //         $("#userId").val(userId);
        //         $('#licenceModel').modal('show');
        //         $('#save').prop('disabled', true);
        //     } else {
        //         $('#licenceModel').modal('hide');
        //     }

        // });

        //======================================== DATA STORAGE CHART========================================
        // const ctx = document.getElementById('data-storage-chart').getContext('2d');
        // const myChart = new Chart(ctx, {
        //     type: 'line',
        //     data: {
        //         labels: "",
        //         datasets: [{
        //             label: 'Data Storage (MB)',
        //             data: "",
        //             fill: false,
        //             borderColor: '#A1FF00',
        //             tension: 0.1
        //         }]
        //     }
        // });

        // const data = {
        //     labels: [
        //         'Google Workspace',
        //         'Azure',
        //         'AWS',
        //         'IBM',
        //         'VM Ware'
        //     ],
        //     datasets: [{
        //         label: '',
        //         data: [300, 50, 100, 20, 10],
        //         backgroundColor: [
        //             'rgb(255, 99, 132)',
        //             'rgb(54, 162, 235)',
        //             'rgb(255, 205, 86)',
        //             'rgb(200, 99, 132)',
        //             'rgb(100, 99, 132)',
        //         ],
        //         hoverOffset: 4
        //     }]
        // };

        // const doughnut = document.getElementById('data-storage-doughnut').getContext('2d');
        // const myDoughnut = new Chart(doughnut, {
        //     type: 'doughnut',
        //     data: data,
        // });


        const data1 = {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                    label: 'Google Workspace',
                    data: [65, 59, 80, 81, 26, 55, 40],
                    fill: false,
                    borderColor: 'rgb(100, 192, 100)',
                },
                {
                    label: 'Azure',
                    data: [55, 51, 50, 89, 16, 45, 20],
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                },
                {
                    label: 'AWS',
                    data: [45, 41, 40, 39, 56, 35, 70],
                    fill: false,
                    borderColor: 'rgb(200, 192, 192)',
                },
                {
                    label: 'IBM',
                    data: [65, 71, 80, 69, 76, 85, 50],
                    fill: false,
                    borderColor: 'rgb(75, 100, 192)',
                },
                {
                    label: 'VM Ware',
                    data: [5, 21, 30, 49, 36, 45, 60],
                    fill: false,
                    borderColor: 'rgb(75, 0, 192)',
                }
            ]
        };
        // const traffic = document.getElementById('data-traffic-chart').getContext('2d');
        // const mytraffic = new Chart(traffic, {
        //     type: 'line',
        //     data: data1
        // });





        //======================================== DATA FILE CHART========================================

        // const dataFile = document.getElementById('data-file-chart').getContext('2d');

        // const dataFileChart = new Chart(dataFile, {
        //     type: 'line',
        //     data: {
        //         labels: "",
        //         datasets: [{
        //             label: 'Data Keys',
        //             data: "",
        //             fill: false,
        //             borderColor: '#A1FF00',
        //             tension: 0.1
        //         }]
        //     }
        // });



        bytesToSize();
        remainSpace();
        totalSize();

        function bytesToSize() {
            var bytes = "{{ Auth::user()->allocatedStorage }}";
            if (bytes <= 0) {
                $('#fileSize').html('0 Bytes');
                return;
            };
            var k = 1024;
            sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'],
                i = Math.floor(Math.log(bytes) / Math.log(k));

            bytes = parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];

            $('#fileSize').html(bytes);
        }

        function remainSpace() {
            var bytes = "{{ Auth::user()->remainingStorage }}";
            if (bytes <= 0) {
                $('#remainingStorage').html('0 Bytes');
                return;
            };
            var k = 1024;
            sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'],
                i = Math.floor(Math.log(bytes) / Math.log(k));

            bytes = parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];

            $('#remainingStorage').html(bytes);
        }

        function totalSize() {
            var bytes = "{{ $hsmDetails->usageConsumptionBytes ?? '' }}";
            if (bytes <= 0) {
                $('#totalSize').html('0 Bytes');
                return;
            };
            var k = 1024;
            sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'],
                i = Math.floor(Math.log(bytes) / Math.log(k));

            bytes = parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];

            $('#totalSize').html(bytes);
        }
    </script>


    {{-- <script>
    anychart.onDocumentReady(function() {
            // create data
            let totalStorage = "{{ $doughnutChartAvailableSpace }}{{ $doughnutChartAvailableSpaceRs }}";
            var data = [{
                    x: "Available",
                    value: {{ $doughnutChartAvailableSpace }},
                    sizeString: "{{ $doughnutChartAvailableSpaceRs }}"
                },
                {
                    x: "Used",
                    value: {{ $doughnutChartUsedSpace }},
                    sizeString: "{{ $doughnutChartUsedSpaceRs }}"
                },
            ];
            palette = ['#F5FFE3', '#A1FF00'];
            // create a pie chart and set the data
            var chart = anychart.pie(data);
            chart.palette(palette);

            // Set width bound
            chart.width('123px');

            // Set height bound
            chart.height('123px');
            /* set the inner radius
            (to turn the pie chart into a doughnut chart)*/
            chart.innerRadius("65%");
            chart.tooltip(true);
            chart.tooltip().format('{%value} {%sizeString}');
            // chart.tooltip().padding().left(30).right(3);
            chart.tooltip().background().fill("#00000");
            // set the position of labels
            chart.labels(false);
            // create standalone label and set label settings
            var label = anychart.standalones.label();
            label.enabled(true)
                .text(totalStorage + ' \nTotal')
                .width('100%')
                .height('100%')
                .adjustFontSize(true, true)
                .minFontSize(10)
                .maxFontSize(25)
                .fontColor('#ffff')
                .position('center')
                .anchor('center')
                .hAlign('center')
                .vAlign('middle');
            // set label to center content of chart
            chart.center().content(label);
            // var labels = chart.labels();
            // labels.position("inside");

            // configure the labels: font, overlap, offset
            // labels.fontColor("white");
            // chart.overlapMode(true);
            chart.insideLabelsOffset("-75%");

            // disable the legend
            chart.legend(false);
            chart.background().fill({
                keys: ["#33333300"],
                //   angle: 130,
            });
            // set the chart title
            // chart.title("Doughnut Chart: Inner Labels");

            // set the container id
            chart.container("doughnut-container");

            // initiate drawing the chart
            chart.draw();
        });
</script> --}}

    <script>
        var canvas = document.getElementById('mychart');

        var textInside = "{{ $dashboardData['avaliableSpace'] }}";

        new Chart(canvas, {
            type: "doughnut",
            data: {
                labels: ["", ""],
                datasets: [{
                    data: [{{$dashboardData['usedSpaceBytes'] }},
                        {{ $dashboardData['avaliableSpaceBytes'] }}
                    ], // Specify the data values array
                    borderColor: ['#A1FF00', '#203300'], // Add custom color border
                    backgroundColor: ['#A1FF00',
                        '#203300'
                    ], // Add custom color background (Points and Fill)
                    borderWidth: 1 // Specify bar border width
                }]
            },
            options: {
                responsive: true,
                legend: false,
                cutoutPercentage: 80,
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


    {{-- <script>
        var dashboardCanvas = document.getElementById('usedExtensionChart').getContext('2d');

        // var textInside = "{{ $dashboardData['avaliableSpace'] }}";

        // function getYearLabels() {
        //     var startYear = 2020; // Update this to the starting year of your data
        //     var currentYear = new Date().getFullYear();
        //     return Array.from({
        //         length: currentYear - startYear + 1
        //     }, (_, i) => (startYear + i).toString());
        // }

        // function getWeekNamesForExtension() {
        //     var weekNames = [];
        //     var formatter = new Intl.DateTimeFormat('en-US', {
        //         weekday: 'short'
        //     });

        //     for (let i = 0; i < 7; i++) {
        //         var date = new Date();
        //         date.setDate(date.getDate() - date.getDay() + i);
        //         weekNames.push(formatter.format(date));
        //     }

        //     return weekNames;
        // }

        // function getMonthNames() {
        //     var monthNames = Array.from({
        //         length: 12
        //     }, (_, i) => new Date(0, i).toLocaleString('en-US', {
        //         month: 'short'
        //     }));
        //     return monthNames;
        // }

        new Chart(dashboardCanvas, {
            type: "bar",
            data: {
                labels: [],
                datasets: [{
                    data: [10, 20], // Specify the data values array
                    borderColor: ['#A1FF00', '#203300'], // Add custom color border
                    backgroundColor: ['#A1FF00',
                        '#203300'
                    ], // Add custom color background (Points and Fill)
                    borderWidth: 20 // Specify bar border width
                }]
            },
            options: {
                responsive: true,
                cutoutPercentage: 98,
                legend: {
                    display: false,
                    position: 'bottom'
                }
            }

        });

        // updateChart('Monthly');

        // function updateChart(filter) {
        //     var labels = [];
        //     var usedCount = 0; // Update this value based on your data
        //     var availableCount = 0; // Update this value based on your data

        //     if (filter === 'Weekly') {
        //         labels = getWeekNamesForExtension();
        //     } else if (filter === 'Monthly') {
        //         labels = getMonthNames();
        //     } else if (filter === 'Yearly') {
        //         var startYear = 2020; // Update this to the starting year of your data
        //         var currentYear = new Date().getFullYear();
        //         labels = Array.from({
        //             length: currentYear - startYear + 1
        //         }, (_, i) => (startYear + i).toString());
        //     }


        //     $.ajax({
        //         url: "{{ route('getPasswordChart') }}", // Update this with the actual endpoint in your Laravel routes
        //         type: 'GET',
        //         data: {
        //             filter: filter
        //         },
        //         success: function(response) {
        //             // Update chart data with the response
        //             dashboardCanvas.data.labels = labels;
        //             dashboardCanvas.data.datasets[0].data = response.result; // Update this array with your data
        //             dashboardCanvas.update();
        //         },
        //         error: function(error) {
        //             // Handle the error if needed
        //             console.error(error);
        //         }
        //     });

        // }
    </script> --}}

    <script>
        var usedExtensionChart;
        var dashboardCanvas = document.getElementById('usedExtensionChart').getContext('2d');
        var defaultLabels = getMonthNames();

        var usedExtensionChart = new Chart(dashboardCanvas, {
            type: "bar",
            data: {
                labels: defaultLabels,
                datasets: [{
                    data: [], // Specify the data values array
                    borderColor: '#A1FF00',
                    backgroundColor: '#A1FF00',
                    borderWidth: 2,
                    pointBackgroundColor: '#A1FF00',
                    pointRadius: 5,
                    pointHoverRadius: 7,
                }]
            },
            options: {
                responsive: true,
                cutoutPercentage: 98,
                legend: {
                    display: false,
                    position: 'bottom'
                }
            }
        });
        updateChart('Monthly');

        function updateChart(filter) {

            var labels = [];
            var usedCount = 0; // Update this value based on your data
            var availableCount = 0; // Update this value based on your data
            if (filter === 'Weekly') {
                labels = getWeekNamesForExtension();
            } else if (filter === 'Monthly') {
                labels = getMonthNames();
            } else if (filter === 'Yearly') {
                var startYear = 2020; // Update this to the starting year of your data
                var currentYear = new Date().getFullYear();
                labels = Array.from({
                    length: currentYear - startYear + 1
                }, (_, i) => (startYear + i).toString());
            }

            //ajax call
            $.ajax({
                url: "{{ route('getPasswordChart') }}", // Update this with the actual endpoint in your Laravel routes
                type: 'GET',
                data: {
                    filter: filter
                },
                success: function(response) {
                    // Update chart data with the response
                    usedExtensionChart.data.labels = labels;
                    usedExtensionChart.data.datasets[0].data = response.result;  // Update this array with your data
                    usedExtensionChart.update();
                },
                error: function(error) {
                    // Handle the error if needed
                    console.error(error);
                }
            });
        }

        function getYearLabels() {
            var startYear = 2020; // Update this to the starting year of your data
            var currentYear = new Date().getFullYear();
            return Array.from({
                length: currentYear - startYear + 1
            }, (_, i) => (startYear + i).toString());
        }

        function getWeekNamesForExtension() {
            var weekNames = [];
            var formatter = new Intl.DateTimeFormat('en-US', {
                weekday: 'short'
            });

            for (let i = 0; i < 7; i++) {
                var date = new Date();
                date.setDate(date.getDate() - date.getDay() + i);
                weekNames.push(formatter.format(date));
            }

            return weekNames;
        }

        function getMonthNames() {
            var monthNames = Array.from({
                length: 12
            }, (_, i) => new Date(0, i).toLocaleString('en-US', {
                month: 'short'
            }));
            return monthNames;
        }
    </script>

    <script>
        var dashboardCanvas2 = document.getElementById('userBrowserChart').getContext('2d');

        var textInside = "{{ $dashboardData['avaliableSpace'] }}";

        new Chart(dashboardCanvas2, {
            type: "doughnut",
            data: {
                // labels: ["Used Password", "Available Password"],
                labels: ["", "", "", ""],
                datasets: [{
                    data: [30, 25, 35, 20], // Specify the data values array
                    borderColor: ['#FFAEC1', '#FFF2AE', '#AEFFB6', '#AEDEFF'], // Add custom color border
                    backgroundColor: ['#FFAEC1', '#FFF2AE', '#AEFFB6', '#203300',
                        '#AEDEFF'
                    ], // Add custom color background (Points and Fill)
                    borderWidth: 20 // Specify bar border width
                    //      borderWidth: 5, // Width of the inner border
                    // borderColor: 'white', // Color of the inner border
                }]
            },
            options: {
                responsive: true,
                // borderWidth: 5,        // Adjust this value to control the border thickness
                // borderRadius: 5,        // Adjust this value to control the border thickness
                // borderAlign: 'inner', // Place the border inside the cutout

                // legend: false,
                cutoutPercentage: 98,
                // plugins: {
                legend: {
                    display: false,
                    // position: 'bottom' // Position the legend at the bottom
                }
                // }
            },
            //   plugins: [{
            //                 id: 'text',
            //                 beforeDraw: function(chart, a, b) {
            //                 var width = chart.width,
            //                     height = chart.height,
            //                     ctx = chart.ctx;

            //                 ctx.restore();
            //                 var fontSize = (height / 114).toFixed(2);
            //                 ctx.font = fontSize + "em sans-serif";
            //                 ctx.textBaseline = "middle";
            //                 ctx.fillStyle = "white";
            //                 var text = textInside,
            //                     textX = Math.round((width - ctx.measureText(text).width) / 2),
            //                     textY = height / 2;

            //                 ctx.fillText(text, textX, textY);
            //                 ctx.save();
            //                 }
            //             }]
        });

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
                        // Handle success, e.g., show a success message
                        // alert(response.message);
                        // Reload the page
                        location.reload();
                    },
                    error: function(response) {
                        // Handle error, e.g., show an error message
                        // alert('Error: ' + response.responseJSON.error);
                    }
                });
            });
        });
    </script>
@endsection
