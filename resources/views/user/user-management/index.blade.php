@extends('user.layouts.front')
@section('title', 'Activity Log')

@section('content')
    <div class="wrapper flex grow flex-col">
        <main class="grow content pt-5" id="content" role="content">
            <!-- begin: container -->
            <div class="container-fixed">
                <div class="flex flex-nowrap items-center lg:items-end justify-between dark:border-b-coal-100 gap-6 mb-1.5 lg:mb-3">
                    <div class="grid">
                        <div class="scrollable-x-auto">
                            <div class="menu gap-3" data-menu="true">
                                <div class="menu-item border-b-2 border-b-transparent menu-item-active:border-b-primary menu-item-here:border-b-primary" data-menu-item-placement="bottom-start" data-menu-item-toggle="dropdown" data-menu-item-trigger="click">
                                    <div class="menu-link gap-1.5 pb-2 lg:pb-4 px-2" tabindex="0">
                                        <div class="text-2xl text-gray-900">
                                            <div class="font-medium">User Management</div>
                                            <div class="text-gray-600 text-lg">
                                                <div class="flex items-center flex-wrap gap-1.5 font-medium">
                                                    <span class="text-md text-gray-600">All Users:</span>
                                                    <span class="text-md text-gray-900 font-semibold me-2">39</span>
                                                    <span class="text-md text-gray-600">Passwords:</span>
                                                    <span class="text-md text-gray-900 font-semibold">123</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center lg:pb-4 gap-2.5">
                        <button class="btn btn-sm btn-primary" id="create_new_password_btn">
                            Export
                        </button>
                    </div>
                </div>
            </div>
            <div class="container-fixed">
                <div class="grid gap-5 lg:gap-7.5">
                    <div class="card card-grid min-w-full">
                        <div class="card-header flex-wrap gap-2">
                            <h3 class="card-title font-medium text-sm">
                                Showing 10 of 39 users
                            </h3>
                            <div class="flex flex-wrap gap-2 lg:gap-5">
                                <div class="flex">
                                    <label class="input input-sm">
                                        <i class="ki-filled ki-magnifier">
                                        </i>
                                        <input placeholder="Search users" type="text" value="">
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div data-datatable="true" data-datatable-page-size="10">
                                <div class="scrollable-x-auto">
                                    <table class="table table-auto table-border" data-datatable-table="true">
                                        <thead>
                                        <tr>
                                            <th class="w-[60px] text-center">
                                                <input class="checkbox checkbox-sm" data-datatable-check="true" type="checkbox"/>
                                            </th>
                                            <th class="min-w-[200px]">
                                                <span class="sort asc">
                                                    <span class="sort-label">Member</span>
                                                    <span class="sort-icon"></span>
                                                </span>
                                            </th>
                                            <th class="min-w-[165px]">
                                                <span class="sort">
                                                    <span class="sort-label">Role</span>
                                                    <span class="sort-icon"></span>
                                                </span>
                                            </th>
                                            <th class="min-w-12">
                                                <span class="sort">
                                                    <span class="sort-label">Status</span>
                                                    <span class="sort-icon"></span>
                                                </span>
                                            </th>
                                            <th class="min-w-[165px]">
                                                <span class="sort">
                                                    <span class="sort-label">MFA Enforcement</span>
                                                    <span class="sort-icon"></span>
                                                </span>
                                            </th>
                                            <th class="min-w-[225px]">
                                                <span class="sort">
                                                    <span class="sort-label">Allowed Browsers</span>
                                                    <span class="sort-icon"></span>
                                                </span>
                                            </th>
                                            <th class="min-w-[100px]">
                                                <span class="sort">
                                                    <span class="sort-label">Password Sharing</span>
                                                    <span class="sort-icon"></span>
                                                </span>
                                            </th>
                                            <th class="w-[60px]">
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="text-center">
                                                <input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="1"/>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-2.5">
                                                    <img alt="" class="rounded-full size-7 shrink-0" src="{{ asset('assets/img/user.jpg') }}"/>
                                                    <div>
                                                        <a class="text-sm font-semibold text-gray-900 hover:text-primary-active" href="#">Tyler Hero</a>
                                                        <div class="text-gray-600">tyler.hero@gmail.com</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                User
                                            </td>
                                            <td class="text-center">
                                               <span class="badge badge-success font-normal badge-outline rounded-[30px]">
                                                <span class="size-1.5 rounded-full bg-success me-1.5">
                                                </span>
                                                Active
                                               </span>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2 text-1.5xl">
                                                    <i class="ki-outline ki-fingerprint-scanning"></i>
                                                    <i class="ki-outline ki-phone"></i>
                                                    <i class="ki-outline ki-security-user"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2">
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/edge.png') }}"/>
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/chrome.png') }}"/>
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/mozilla.png') }}"/>
                                                </div>
                                            </td>
                                            <td>
                                                <label class="switch switch-sm">
                                                    <input checked="" type="checkbox" value="1"/>
                                                </label>
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px" data-menu-item-placement="bottom-end" data-menu-item-toggle="dropdown" data-menu-item-trigger="click|lg:click">
                                                        <button class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[200px]" data-menu-dismiss="true">
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                                                                    <span class="menu-icon">
                                                                     <i class="ki-outline ki-pencil">
                                                                     </i>
                                                                    </span>
                                                                    <span class="menu-title">
                                                                     Edit User
                                                                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                                                                    <span class="menu-icon">
                                                                     <i class="ki-outline ki-arrow-right-left">
                                                                     </i>
                                                                    </span>
                                                                    <span class="menu-title">
                                                                     Transfer Account
                                                                    </span>
                                                                </a>
                                                        </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                                                                    <span class="menu-icon">
                                                                     <i class="ki-outline ki-trash" style="color: #F8285A">
                                                                     </i>
                                                                    </span>
                                                                    <span class="menu-title">
                                                                    Delete User
                                                                    </span>
                                                                </a>
                                                            </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="2"/>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-2.5">
                                                    <img alt="" class="rounded-full size-7 shrink-0" src="{{ asset('assets/img/user.jpg') }}"/>
                                                    <div>
                                                        <a class="text-sm font-semibold text-gray-900 hover:text-primary-active" href="#">Jane Smith</a>
                                                        <div>jane.smith@gmail.com</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                User
                                            </td>
                                            <td class="text-center">
                                                <div class="rounded-[30px] badge badge-outline badge-success w-full font-semibold">
                                                    Active
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2 text-1.5xl">
                                                    <i class="ki-outline ki-fingerprint-scanning"></i>
                                                    <i class="ki-outline ki-security-user"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2">
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/edge.png') }}"/>
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/chrome.png') }}"/>
                                                </div>
                                            </td>
                                            <td>
                                                <label class="switch switch-sm">
                                                    <input checked="" type="checkbox" value="1"/>
                                                </label>
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px" data-menu-item-placement="bottom-end" data-menu-item-toggle="dropdown" data-menu-item-trigger="click|lg:click">
                                                        <button class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]" data-menu-dismiss="true">
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-search-list">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     View
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-file-up">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Export
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-pencil">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Edit
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-copy">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Make a copy
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-trash">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Remove
                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="2"/>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-2.5">
                                                    <img alt="" class="rounded-full size-7 shrink-0" src="{{ asset('assets/img/user.jpg') }}"/>
                                                    <div>
                                                        <a class="text-sm font-semibold text-gray-900 hover:text-primary-active" href="#">Emma Jhonson</a>
                                                        <div>emma.jhonson@gmail.com</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                Admin
                                            </td>
                                            <td class="text-center">
                                                <div class="rounded-[30px] badge badge-outline badge-success w-full font-semibold">
                                                    Active
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2 text-1.5xl">
                                                    <i class="ki-outline ki-security-user"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2">
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/edge.png') }}"/>
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/mozilla.png') }}"/>
                                                </div>
                                            </td>
                                            <td>
                                                <label class="switch switch-sm">
                                                    <input checked="" type="checkbox" value="1"/>
                                                </label>
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px" data-menu-item-placement="bottom-end" data-menu-item-toggle="dropdown" data-menu-item-trigger="click|lg:click">
                                                        <button class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]" data-menu-dismiss="true">
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-search-list">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     View
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-file-up">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Export
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-pencil">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Edit
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-copy">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Make a copy
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-trash">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Remove
                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="1"/>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-2.5">
                                                    <img alt="" class="rounded-full size-7 shrink-0" src="{{ asset('assets/img/user.jpg') }}"/>
                                                    <div>
                                                        <a class="text-sm font-semibold text-gray-900 hover:text-primary-active" href="#">Tyler Hero</a>
                                                        <div>tyler.hero@gmail.com</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                User
                                            </td>
                                            <td class="text-center">
                                                <div class="rounded-[30px] badge badge-outline badge-success w-full font-semibold">
                                                    Active
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2 text-1.5xl">
                                                    <i class="ki-outline ki-fingerprint-scanning"></i>
                                                    <i class="ki-outline ki-phone"></i>
                                                    <i class="ki-outline ki-security-user"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2">
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/edge.png') }}"/>
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/chrome.png') }}"/>
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/mozilla.png') }}"/>
                                                </div>
                                            </td>
                                            <td>
                                                <label class="switch switch-sm">
                                                    <input checked="" type="checkbox" value="1"/>
                                                </label>
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px" data-menu-item-placement="bottom-end" data-menu-item-toggle="dropdown" data-menu-item-trigger="click|lg:click">
                                                        <button class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]" data-menu-dismiss="true">
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-search-list">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     View
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-file-up">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Export
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-pencil">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Edit
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-copy">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Make a copy
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-trash">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Remove
                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="2"/>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-2.5">
                                                    <img alt="" class="rounded-full size-7 shrink-0" src="{{ asset('assets/img/user.jpg') }}"/>
                                                    <div>
                                                        <a class="text-sm font-semibold text-gray-900 hover:text-primary-active" href="#">Jane Smith</a>
                                                        <div>jane.smith@gmail.com</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                User
                                            </td>
                                            <td class="text-center">
                                                <div class="rounded-[30px] badge badge-outline badge-warning w-full font-semibold">
                                                    Invited
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2 text-1.5xl">
                                                    <i class="ki-outline ki-fingerprint-scanning"></i>
                                                    <i class="ki-outline ki-security-user"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2">
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/edge.png') }}"/>
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/chrome.png') }}"/>
                                                </div>
                                            </td>
                                            <td>
                                                <label class="switch switch-sm">
                                                    <input checked="" type="checkbox" value="1"/>
                                                </label>
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px" data-menu-item-placement="bottom-end" data-menu-item-toggle="dropdown" data-menu-item-trigger="click|lg:click">
                                                        <button class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]" data-menu-dismiss="true">
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-search-list">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     View
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-file-up">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Export
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-pencil">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Edit
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-copy">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Make a copy
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-trash">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Remove
                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="2"/>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-2.5">
                                                    <img alt="" class="rounded-full size-7 shrink-0" src="{{ asset('assets/img/user.jpg') }}"/>
                                                    <div>
                                                        <a class="text-sm font-semibold text-gray-900 hover:text-primary-active" href="#">Emma Jhonson</a>
                                                        <div>emma.jhonson@gmail.com</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                Admin
                                            </td>
                                            <td class="text-center">
                                                <div class="rounded-[30px] badge badge-outline badge-success w-full font-semibold">
                                                    Active
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2 text-1.5xl">
                                                    <i class="ki-outline ki-security-user"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2">
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/edge.png') }}"/>
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/mozilla.png') }}"/>
                                                </div>
                                            </td>
                                            <td>
                                                <label class="switch switch-sm">
                                                    <input checked="" type="checkbox" value="1"/>
                                                </label>
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px" data-menu-item-placement="bottom-end" data-menu-item-toggle="dropdown" data-menu-item-trigger="click|lg:click">
                                                        <button class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]" data-menu-dismiss="true">
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-search-list">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     View
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-file-up">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Export
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-pencil">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Edit
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-copy">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Make a copy
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-trash">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Remove
                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="1"/>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-2.5">
                                                    <img alt="" class="rounded-full size-7 shrink-0" src="{{ asset('assets/img/user.jpg') }}"/>
                                                    <div>
                                                        <a class="text-sm font-semibold text-gray-900 hover:text-primary-active" href="#">Tyler Hero</a>
                                                        <div>tyler.hero@gmail.com</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                User
                                            </td>
                                            <td class="text-center">
                                                <div class="rounded-[30px] badge badge-outline badge-success w-full font-semibold">
                                                    Active
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2 text-1.5xl">
                                                    <i class="ki-outline ki-fingerprint-scanning"></i>
                                                    <i class="ki-outline ki-phone"></i>
                                                    <i class="ki-outline ki-security-user"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2">
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/edge.png') }}"/>
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/chrome.png') }}"/>
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/mozilla.png') }}"/>
                                                </div>
                                            </td>
                                            <td>
                                                <label class="switch switch-sm">
                                                    <input checked="" type="checkbox" value="1"/>
                                                </label>
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px" data-menu-item-placement="bottom-end" data-menu-item-toggle="dropdown" data-menu-item-trigger="click|lg:click">
                                                        <button class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]" data-menu-dismiss="true">
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-search-list">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     View
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-file-up">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Export
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-pencil">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Edit
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-copy">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Make a copy
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-trash">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Remove
                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="2"/>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-2.5">
                                                    <img alt="" class="rounded-full size-7 shrink-0" src="{{ asset('assets/img/user.jpg') }}"/>
                                                    <div>
                                                        <a class="text-sm font-semibold text-gray-900 hover:text-primary-active" href="#">Jane Smith</a>
                                                        <div>jane.smith@gmail.com</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                User
                                            </td>
                                            <td class="text-center">
                                                <div class="rounded-[30px] badge badge-outline badge-warning w-full font-semibold">
                                                    Invited
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2 text-1.5xl">
                                                    <i class="ki-outline ki-fingerprint-scanning"></i>
                                                    <i class="ki-outline ki-security-user"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2">
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/edge.png') }}"/>
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/chrome.png') }}"/>
                                                </div>
                                            </td>
                                            <td>
                                                <label class="switch switch-sm">
                                                    <input checked="" type="checkbox" value="1"/>
                                                </label>
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px" data-menu-item-placement="bottom-end" data-menu-item-toggle="dropdown" data-menu-item-trigger="click|lg:click">
                                                        <button class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]" data-menu-dismiss="true">
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-search-list">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     View
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-file-up">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Export
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-pencil">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Edit
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-copy">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Make a copy
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-trash">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Remove
                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="2"/>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-2.5">
                                                    <img alt="" class="rounded-full size-7 shrink-0" src="{{ asset('assets/img/user.jpg') }}"/>
                                                    <div>
                                                        <a class="text-sm font-semibold text-gray-900 hover:text-primary-active" href="#">Emma Jhonson</a>
                                                        <div>emma.jhonson@gmail.com</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                Admin
                                            </td>
                                            <td class="text-center">
                                                <div class="rounded-[30px] badge badge-outline badge-success w-full font-semibold">
                                                    Active
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2 text-1.5xl">
                                                    <i class="ki-outline ki-security-user"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2">
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/edge.png') }}"/>
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/mozilla.png') }}"/>
                                                </div>
                                            </td>
                                            <td>
                                                <label class="switch switch-sm">
                                                    <input checked="" type="checkbox" value="1"/>
                                                </label>
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px" data-menu-item-placement="bottom-end" data-menu-item-toggle="dropdown" data-menu-item-trigger="click|lg:click">
                                                        <button class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]" data-menu-dismiss="true">
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-search-list">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     View
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-file-up">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Export
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-pencil">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Edit
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-copy">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Make a copy
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-trash">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Remove
                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="1"/>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-2.5">
                                                    <img alt="" class="rounded-full size-7 shrink-0" src="{{ asset('assets/img/user.jpg') }}"/>
                                                    <div>
                                                        <a class="text-sm font-semibold text-gray-900 hover:text-primary-active" href="#">Tyler Hero</a>
                                                        <div>tyler.hero@gmail.com</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                User
                                            </td>
                                            <td class="text-center">
                                                <div class="rounded-[30px] badge badge-outline badge-success w-full font-semibold">
                                                    Active
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2 text-1.5xl">
                                                    <i class="ki-outline ki-fingerprint-scanning"></i>
                                                    <i class="ki-outline ki-phone"></i>
                                                    <i class="ki-outline ki-security-user"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2">
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/edge.png') }}"/>
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/chrome.png') }}"/>
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/mozilla.png') }}"/>
                                                </div>
                                            </td>
                                            <td>
                                                <label class="switch switch-sm">
                                                    <input checked="" type="checkbox" value="1"/>
                                                </label>
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px" data-menu-item-placement="bottom-end" data-menu-item-toggle="dropdown" data-menu-item-trigger="click|lg:click">
                                                        <button class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]" data-menu-dismiss="true">
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-search-list">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     View
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-file-up">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Export
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-pencil">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Edit
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-copy">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Make a copy
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-trash">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Remove
                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="2"/>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-2.5">
                                                    <img alt="" class="rounded-full size-7 shrink-0" src="{{ asset('assets/img/user.jpg') }}"/>
                                                    <div>
                                                        <a class="text-sm font-semibold text-gray-900 hover:text-primary-active" href="#">Jane Smith</a>
                                                        <div>jane.smith@gmail.com</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                User
                                            </td>
                                            <td class="text-center">
                                                <div class="rounded-[30px] badge badge-outline badge-success w-full font-semibold">
                                                    Active
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2 text-1.5xl">
                                                    <i class="ki-outline ki-fingerprint-scanning"></i>
                                                    <i class="ki-outline ki-security-user"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2">
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/edge.png') }}"/>
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/chrome.png') }}"/>
                                                </div>
                                            </td>
                                            <td>
                                                <label class="switch switch-sm">
                                                    <input checked="" type="checkbox" value="1"/>
                                                </label>
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px" data-menu-item-placement="bottom-end" data-menu-item-toggle="dropdown" data-menu-item-trigger="click|lg:click">
                                                        <button class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]" data-menu-dismiss="true">
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-search-list">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     View
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-file-up">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Export
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-pencil">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Edit
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-copy">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Make a copy
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-trash">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Remove
                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="2"/>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-2.5">
                                                    <img alt="" class="rounded-full size-7 shrink-0" src="{{ asset('assets/img/user.jpg') }}"/>
                                                    <div>
                                                        <a class="text-sm font-semibold text-gray-900 hover:text-primary-active" href="#">Emma Jhonson</a>
                                                        <div>emma.jhonson@gmail.com</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                Admin
                                            </td>
                                            <td class="text-center">
                                                <div class="rounded-[30px] badge badge-outline badge-success w-full font-semibold">
                                                    Active
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2 text-1.5xl">
                                                    <i class="ki-outline ki-security-user"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2">
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/edge.png') }}"/>
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/mozilla.png') }}"/>
                                                </div>
                                            </td>
                                            <td>
                                                <label class="switch switch-sm">
                                                    <input checked="" type="checkbox" value="1"/>
                                                </label>
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px" data-menu-item-placement="bottom-end" data-menu-item-toggle="dropdown" data-menu-item-trigger="click|lg:click">
                                                        <button class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]" data-menu-dismiss="true">
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-search-list">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     View
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-file-up">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Export
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-pencil">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Edit
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-copy">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Make a copy
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-trash">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Remove
                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="1"/>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-2.5">
                                                    <img alt="" class="rounded-full size-7 shrink-0" src="{{ asset('assets/img/user.jpg') }}"/>
                                                    <div>
                                                        <a class="text-sm font-semibold text-gray-900 hover:text-primary-active" href="#">Tyler Hero</a>
                                                        <div>tyler.hero@gmail.com</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                User
                                            </td>
                                            <td class="text-center">
                                                <div class="rounded-[30px] badge badge-outline badge-success w-full font-semibold">
                                                    Active
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2 text-1.5xl">
                                                    <i class="ki-outline ki-fingerprint-scanning"></i>
                                                    <i class="ki-outline ki-phone"></i>
                                                    <i class="ki-outline ki-security-user"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2">
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/edge.png') }}"/>
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/chrome.png') }}"/>
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/mozilla.png') }}"/>
                                                </div>
                                            </td>
                                            <td>
                                                <label class="switch switch-sm">
                                                    <input checked="" type="checkbox" value="1"/>
                                                </label>
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px" data-menu-item-placement="bottom-end" data-menu-item-toggle="dropdown" data-menu-item-trigger="click|lg:click">
                                                        <button class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]" data-menu-dismiss="true">
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-search-list">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     View
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-file-up">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Export
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-pencil">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Edit
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-copy">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Make a copy
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-trash">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Remove
                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="2"/>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-2.5">
                                                    <img alt="" class="rounded-full size-7 shrink-0" src="{{ asset('assets/img/user.jpg') }}"/>
                                                    <div>
                                                        <a class="text-sm font-semibold text-gray-900 hover:text-primary-active" href="#">Jane Smith</a>
                                                        <div>jane.smith@gmail.com</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                User
                                            </td>
                                            <td class="text-center">
                                                <div class="rounded-[30px] badge badge-outline badge-success w-full font-semibold">
                                                    Active
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2 text-1.5xl">
                                                    <i class="ki-outline ki-fingerprint-scanning"></i>
                                                    <i class="ki-outline ki-security-user"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2">
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/edge.png') }}"/>
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/chrome.png') }}"/>
                                                </div>
                                            </td>
                                            <td>
                                                <label class="switch switch-sm">
                                                    <input checked="" type="checkbox" value="1"/>
                                                </label>
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px" data-menu-item-placement="bottom-end" data-menu-item-toggle="dropdown" data-menu-item-trigger="click|lg:click">
                                                        <button class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]" data-menu-dismiss="true">
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-search-list">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     View
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-file-up">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Export
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-pencil">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Edit
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-copy">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Make a copy
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-trash">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Remove
                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="2"/>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-2.5">
                                                    <img alt="" class="rounded-full size-7 shrink-0" src="{{ asset('assets/img/user.jpg') }}"/>
                                                    <div>
                                                        <a class="text-sm font-semibold text-gray-900 hover:text-primary-active" href="#">Emma Jhonson</a>
                                                        <div>emma.jhonson@gmail.com</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                Admin
                                            </td>
                                            <td class="text-center">
                                                <div class="rounded-[30px] badge badge-outline badge-success w-full font-semibold">
                                                    Active
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2 text-1.5xl">
                                                    <i class="ki-outline ki-security-user"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2">
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/edge.png') }}"/>
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/mozilla.png') }}"/>
                                                </div>
                                            </td>
                                            <td>
                                                <label class="switch switch-sm">
                                                    <input checked="" type="checkbox" value="1"/>
                                                </label>
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px" data-menu-item-placement="bottom-end" data-menu-item-toggle="dropdown" data-menu-item-trigger="click|lg:click">
                                                        <button class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]" data-menu-dismiss="true">
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-search-list">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     View
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-file-up">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Export
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-pencil">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Edit
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-copy">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Make a copy
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-trash">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Remove
                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="1"/>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-2.5">
                                                    <img alt="" class="rounded-full size-7 shrink-0" src="{{ asset('assets/img/user.jpg') }}"/>
                                                    <div>
                                                        <a class="text-sm font-semibold text-gray-900 hover:text-primary-active" href="#">Tyler Hero</a>
                                                        <div>tyler.hero@gmail.com</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                User
                                            </td>
                                            <td class="text-center">
                                                <div class="rounded-[30px] badge badge-outline badge-success w-full font-semibold">
                                                    Active
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2 text-1.5xl">
                                                    <i class="ki-outline ki-fingerprint-scanning"></i>
                                                    <i class="ki-outline ki-phone"></i>
                                                    <i class="ki-outline ki-security-user"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2">
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/edge.png') }}"/>
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/chrome.png') }}"/>
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/mozilla.png') }}"/>
                                                </div>
                                            </td>
                                            <td>
                                                <label class="switch switch-sm">
                                                    <input checked="" type="checkbox" value="1"/>
                                                </label>
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px" data-menu-item-placement="bottom-end" data-menu-item-toggle="dropdown" data-menu-item-trigger="click|lg:click">
                                                        <button class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]" data-menu-dismiss="true">
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-search-list">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     View
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-file-up">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Export
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-pencil">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Edit
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-copy">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Make a copy
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-trash">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Remove
                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="2"/>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-2.5">
                                                    <img alt="" class="rounded-full size-7 shrink-0" src="{{ asset('assets/img/user.jpg') }}"/>
                                                    <div>
                                                        <a class="text-sm font-semibold text-gray-900 hover:text-primary-active" href="#">Jane Smith</a>
                                                        <div>jane.smith@gmail.com</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                User
                                            </td>
                                            <td class="text-center">
                                                <div class="rounded-[30px] badge badge-outline badge-success w-full font-semibold">
                                                    Active
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2 text-1.5xl">
                                                    <i class="ki-outline ki-fingerprint-scanning"></i>
                                                    <i class="ki-outline ki-security-user"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2">
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/edge.png') }}"/>
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/chrome.png') }}"/>
                                                </div>
                                            </td>
                                            <td>
                                                <label class="switch switch-sm">
                                                    <input checked="" type="checkbox" value="1"/>
                                                </label>
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px" data-menu-item-placement="bottom-end" data-menu-item-toggle="dropdown" data-menu-item-trigger="click|lg:click">
                                                        <button class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]" data-menu-dismiss="true">
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-search-list">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     View
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-file-up">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Export
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-pencil">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Edit
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-copy">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Make a copy
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-trash">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Remove
                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="2"/>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-2.5">
                                                    <img alt="" class="rounded-full size-7 shrink-0" src="{{ asset('assets/img/user.jpg') }}"/>
                                                    <div>
                                                        <a class="text-sm font-semibold text-gray-900 hover:text-primary-active" href="#">Emma Jhonson</a>
                                                        <div>emma.jhonson@gmail.com</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                Admin
                                            </td>
                                            <td class="text-center">
                                                <div class="rounded-[30px] badge badge-outline badge-success w-full font-semibold">
                                                    Active
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2 text-1.5xl">
                                                    <i class="ki-outline ki-security-user"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2">
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/edge.png') }}"/>
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/mozilla.png') }}"/>
                                                </div>
                                            </td>
                                            <td>
                                                <label class="switch switch-sm">
                                                    <input checked="" type="checkbox" value="1"/>
                                                </label>
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px" data-menu-item-placement="bottom-end" data-menu-item-toggle="dropdown" data-menu-item-trigger="click|lg:click">
                                                        <button class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]" data-menu-dismiss="true">
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-search-list">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     View
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-file-up">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Export
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-pencil">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Edit
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-copy">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Make a copy
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-trash">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Remove
                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="1"/>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-2.5">
                                                    <img alt="" class="rounded-full size-7 shrink-0" src="{{ asset('assets/img/user.jpg') }}"/>
                                                    <div>
                                                        <a class="text-sm font-semibold text-gray-900 hover:text-primary-active" href="#">Tyler Hero</a>
                                                        <div>tyler.hero@gmail.com</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                User
                                            </td>
                                            <td class="text-center">
                                                <div class="rounded-[30px] badge badge-outline badge-success w-full font-semibold">
                                                    Active
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2 text-1.5xl">
                                                    <i class="ki-outline ki-fingerprint-scanning"></i>
                                                    <i class="ki-outline ki-phone"></i>
                                                    <i class="ki-outline ki-security-user"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2">
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/edge.png') }}"/>
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/chrome.png') }}"/>
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/mozilla.png') }}"/>
                                                </div>
                                            </td>
                                            <td>
                                                <label class="switch switch-sm">
                                                    <input checked="" type="checkbox" value="1"/>
                                                </label>
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px" data-menu-item-placement="bottom-end" data-menu-item-toggle="dropdown" data-menu-item-trigger="click|lg:click">
                                                        <button class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]" data-menu-dismiss="true">
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-search-list">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     View
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-file-up">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Export
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-pencil">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Edit
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-copy">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Make a copy
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-trash">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Remove
                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="2"/>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-2.5">
                                                    <img alt="" class="rounded-full size-7 shrink-0" src="{{ asset('assets/img/user.jpg') }}"/>
                                                    <div>
                                                        <a class="text-sm font-semibold text-gray-900 hover:text-primary-active" href="#">Jane Smith</a>
                                                        <div>jane.smith@gmail.com</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                User
                                            </td>
                                            <td class="text-center">
                                                <div class="rounded-[30px] badge badge-outline badge-success w-full font-semibold">
                                                    Active
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2 text-1.5xl">
                                                    <i class="ki-outline ki-fingerprint-scanning"></i>
                                                    <i class="ki-outline ki-security-user"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2">
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/edge.png') }}"/>
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/chrome.png') }}"/>
                                                </div>
                                            </td>
                                            <td>
                                                <label class="switch switch-sm">
                                                    <input checked="" type="checkbox" value="1"/>
                                                </label>
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px" data-menu-item-placement="bottom-end" data-menu-item-toggle="dropdown" data-menu-item-trigger="click|lg:click">
                                                        <button class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]" data-menu-dismiss="true">
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-search-list">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     View
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-file-up">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Export
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-pencil">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Edit
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-copy">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Make a copy
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-trash">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Remove
                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="2"/>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-2.5">
                                                    <img alt="" class="rounded-full size-7 shrink-0" src="{{ asset('assets/img/user.jpg') }}"/>
                                                    <div>
                                                        <a class="text-sm font-semibold text-gray-900 hover:text-primary-active" href="#">Emma Jhonson</a>
                                                        <div>emma.jhonson@gmail.com</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                Admin
                                            </td>
                                            <td class="text-center">
                                                <div class="rounded-[30px] badge badge-outline badge-success w-full font-semibold">
                                                    Active
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2 text-1.5xl">
                                                    <i class="ki-outline ki-security-user"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2">
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/edge.png') }}"/>
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/mozilla.png') }}"/>
                                                </div>
                                            </td>
                                            <td>
                                                <label class="switch switch-sm">
                                                    <input checked="" type="checkbox" value="1"/>
                                                </label>
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px" data-menu-item-placement="bottom-end" data-menu-item-toggle="dropdown" data-menu-item-trigger="click|lg:click">
                                                        <button class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]" data-menu-dismiss="true">
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-search-list">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     View
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-file-up">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Export
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-pencil">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Edit
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-copy">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Make a copy
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-trash">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Remove
                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="1"/>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-2.5">
                                                    <img alt="" class="rounded-full size-7 shrink-0" src="{{ asset('assets/img/user.jpg') }}"/>
                                                    <div>
                                                        <a class="text-sm font-semibold text-gray-900 hover:text-primary-active" href="#">Tyler Hero</a>
                                                        <div>tyler.hero@gmail.com</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                User
                                            </td>
                                            <td class="text-center">
                                                <div class="rounded-[30px] badge badge-outline badge-success w-full font-semibold">
                                                    Active
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2 text-1.5xl">
                                                    <i class="ki-outline ki-fingerprint-scanning"></i>
                                                    <i class="ki-outline ki-phone"></i>
                                                    <i class="ki-outline ki-security-user"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2">
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/edge.png') }}"/>
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/chrome.png') }}"/>
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/mozilla.png') }}"/>
                                                </div>
                                            </td>
                                            <td>
                                                <label class="switch switch-sm">
                                                    <input checked="" type="checkbox" value="1"/>
                                                </label>
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px" data-menu-item-placement="bottom-end" data-menu-item-toggle="dropdown" data-menu-item-trigger="click|lg:click">
                                                        <button class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]" data-menu-dismiss="true">
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-search-list">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     View
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-file-up">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Export
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-pencil">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Edit
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-copy">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Make a copy
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-trash">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Remove
                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="2"/>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-2.5">
                                                    <img alt="" class="rounded-full size-7 shrink-0" src="{{ asset('assets/img/user.jpg') }}"/>
                                                    <div>
                                                        <a class="text-sm font-semibold text-gray-900 hover:text-primary-active" href="#">Jane Smith</a>
                                                        <div>jane.smith@gmail.com</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                User
                                            </td>
                                            <td class="text-center">
                                                <div class="rounded-[30px] badge badge-outline badge-success w-full font-semibold">
                                                    Active
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2 text-1.5xl">
                                                    <i class="ki-outline ki-fingerprint-scanning"></i>
                                                    <i class="ki-outline ki-security-user"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2">
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/edge.png') }}"/>
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/chrome.png') }}"/>
                                                </div>
                                            </td>
                                            <td>
                                                <label class="switch switch-sm">
                                                    <input checked="" type="checkbox" value="1"/>
                                                </label>
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px" data-menu-item-placement="bottom-end" data-menu-item-toggle="dropdown" data-menu-item-trigger="click|lg:click">
                                                        <button class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]" data-menu-dismiss="true">
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-search-list">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     View
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-file-up">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Export
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-pencil">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Edit
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-copy">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Make a copy
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-trash">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Remove
                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="2"/>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-2.5">
                                                    <img alt="" class="rounded-full size-7 shrink-0" src="{{ asset('assets/img/user.jpg') }}"/>
                                                    <div>
                                                        <a class="text-sm font-semibold text-gray-900 hover:text-primary-active" href="#">Emma Jhonson</a>
                                                        <div>emma.jhonson@gmail.com</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                Admin
                                            </td>
                                            <td class="text-center">
                                                <div class="rounded-[30px] badge badge-outline badge-success w-full font-semibold">
                                                    Active
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2 text-1.5xl">
                                                    <i class="ki-outline ki-security-user"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2">
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/edge.png') }}"/>
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/mozilla.png') }}"/>
                                                </div>
                                            </td>
                                            <td>
                                                <label class="switch switch-sm">
                                                    <input checked="" type="checkbox" value="1"/>
                                                </label>
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px" data-menu-item-placement="bottom-end" data-menu-item-toggle="dropdown" data-menu-item-trigger="click|lg:click">
                                                        <button class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]" data-menu-dismiss="true">
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-search-list">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     View
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-file-up">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Export
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-pencil">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Edit
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-copy">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Make a copy
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-trash">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Remove
                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="1"/>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-2.5">
                                                    <img alt="" class="rounded-full size-7 shrink-0" src="{{ asset('assets/img/user.jpg') }}"/>
                                                    <div>
                                                        <a class="text-sm font-semibold text-gray-900 hover:text-primary-active" href="#">Tyler Hero</a>
                                                        <div>tyler.hero@gmail.com</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                User
                                            </td>
                                            <td class="text-center">
                                                <div class="rounded-[30px] badge badge-outline badge-success w-full font-semibold">
                                                    Active
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2 text-1.5xl">
                                                    <i class="ki-outline ki-fingerprint-scanning"></i>
                                                    <i class="ki-outline ki-phone"></i>
                                                    <i class="ki-outline ki-security-user"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2">
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/edge.png') }}"/>
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/chrome.png') }}"/>
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/mozilla.png') }}"/>
                                                </div>
                                            </td>
                                            <td>
                                                <label class="switch switch-sm">
                                                    <input checked="" type="checkbox" value="1"/>
                                                </label>
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px" data-menu-item-placement="bottom-end" data-menu-item-toggle="dropdown" data-menu-item-trigger="click|lg:click">
                                                        <button class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]" data-menu-dismiss="true">
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-search-list">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     View
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-file-up">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Export
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-pencil">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Edit
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-copy">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Make a copy
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-trash">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Remove
                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="2"/>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-2.5">
                                                    <img alt="" class="rounded-full size-7 shrink-0" src="{{ asset('assets/img/user.jpg') }}"/>
                                                    <div>
                                                        <a class="text-sm font-semibold text-gray-900 hover:text-primary-active" href="#">Jane Smith</a>
                                                        <div>jane.smith@gmail.com</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                User
                                            </td>
                                            <td class="text-center">
                                                <div class="rounded-[30px] badge badge-outline badge-success w-full font-semibold">
                                                    Active
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2 text-1.5xl">
                                                    <i class="ki-outline ki-fingerprint-scanning"></i>
                                                    <i class="ki-outline ki-security-user"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2">
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/edge.png') }}"/>
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/chrome.png') }}"/>
                                                </div>
                                            </td>
                                            <td>
                                                <label class="switch switch-sm">
                                                    <input checked="" type="checkbox" value="1"/>
                                                </label>
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px" data-menu-item-placement="bottom-end" data-menu-item-toggle="dropdown" data-menu-item-trigger="click|lg:click">
                                                        <button class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]" data-menu-dismiss="true">
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-search-list">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     View
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-file-up">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Export
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-pencil">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Edit
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-copy">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Make a copy
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-trash">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Remove
                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="2"/>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-2.5">
                                                    <img alt="" class="rounded-full size-7 shrink-0" src="{{ asset('assets/img/user.jpg') }}"/>
                                                    <div>
                                                        <a class="text-sm font-semibold text-gray-900 hover:text-primary-active" href="#">Emma Jhonson</a>
                                                        <div>emma.jhonson@gmail.com</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                Admin
                                            </td>
                                            <td class="text-center">
                                                <div class="rounded-[30px] badge badge-outline badge-success w-full font-semibold">
                                                    Active
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2 text-1.5xl">
                                                    <i class="ki-outline ki-security-user"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2">
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/edge.png') }}"/>
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/mozilla.png') }}"/>
                                                </div>
                                            </td>
                                            <td>
                                                <label class="switch switch-sm">
                                                    <input checked="" type="checkbox" value="1"/>
                                                </label>
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px" data-menu-item-placement="bottom-end" data-menu-item-toggle="dropdown" data-menu-item-trigger="click|lg:click">
                                                        <button class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]" data-menu-dismiss="true">
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-search-list">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     View
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-file-up">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Export
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-pencil">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Edit
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-copy">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Make a copy
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-trash">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Remove
                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="1"/>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-2.5">
                                                    <img alt="" class="rounded-full size-7 shrink-0" src="{{ asset('assets/img/user.jpg') }}"/>
                                                    <div>
                                                        <a class="text-sm font-semibold text-gray-900 hover:text-primary-active" href="#">Tyler Hero</a>
                                                        <div>tyler.hero@gmail.com</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                User
                                            </td>
                                            <td class="text-center">
                                                <div class="rounded-[30px] badge badge-outline badge-success w-full font-semibold">
                                                    Active
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2 text-1.5xl">
                                                    <i class="ki-outline ki-fingerprint-scanning"></i>
                                                    <i class="ki-outline ki-phone"></i>
                                                    <i class="ki-outline ki-security-user"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2">
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/edge.png') }}"/>
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/chrome.png') }}"/>
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/mozilla.png') }}"/>
                                                </div>
                                            </td>
                                            <td>
                                                <label class="switch switch-sm">
                                                    <input checked="" type="checkbox" value="1"/>
                                                </label>
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px" data-menu-item-placement="bottom-end" data-menu-item-toggle="dropdown" data-menu-item-trigger="click|lg:click">
                                                        <button class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]" data-menu-dismiss="true">
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-search-list">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     View
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-file-up">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Export
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-pencil">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Edit
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-copy">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Make a copy
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-trash">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Remove
                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="2"/>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-2.5">
                                                    <img alt="" class="rounded-full size-7 shrink-0" src="{{ asset('assets/img/user.jpg') }}"/>
                                                    <div>
                                                        <a class="text-sm font-semibold text-gray-900 hover:text-primary-active" href="#">Jane Smith</a>
                                                        <div>jane.smith@gmail.com</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                User
                                            </td>
                                            <td class="text-center">
                                                <div class="rounded-[30px] badge badge-outline badge-success w-full font-semibold">
                                                    Active
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2 text-1.5xl">
                                                    <i class="ki-outline ki-fingerprint-scanning"></i>
                                                    <i class="ki-outline ki-security-user"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2">
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/edge.png') }}"/>
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/chrome.png') }}"/>
                                                </div>
                                            </td>
                                            <td>
                                                <label class="switch switch-sm">
                                                    <input checked="" type="checkbox" value="1"/>
                                                </label>
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px" data-menu-item-placement="bottom-end" data-menu-item-toggle="dropdown" data-menu-item-trigger="click|lg:click">
                                                        <button class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]" data-menu-dismiss="true">
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-search-list">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     View
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-file-up">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Export
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-pencil">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Edit
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-copy">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Make a copy
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-trash">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Remove
                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="2"/>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-2.5">
                                                    <img alt="" class="rounded-full size-7 shrink-0" src="{{ asset('assets/img/user.jpg') }}"/>
                                                    <div>
                                                        <a class="text-sm font-semibold text-gray-900 hover:text-primary-active" href="#">Emma Jhonson</a>
                                                        <div>emma.jhonson@gmail.com</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                Admin
                                            </td>
                                            <td class="text-center">
                                                <div class="rounded-[30px] badge badge-outline badge-success w-full font-semibold">
                                                    Active
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2 text-1.5xl">
                                                    <i class="ki-outline ki-security-user"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2">
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/edge.png') }}"/>
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/mozilla.png') }}"/>
                                                </div>
                                            </td>
                                            <td>
                                                <label class="switch switch-sm">
                                                    <input checked="" type="checkbox" value="1"/>
                                                </label>
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px" data-menu-item-placement="bottom-end" data-menu-item-toggle="dropdown" data-menu-item-trigger="click|lg:click">
                                                        <button class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]" data-menu-dismiss="true">
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-search-list">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     View
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-file-up">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Export
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-pencil">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Edit
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-copy">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Make a copy
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-trash">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Remove
                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="1"/>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-2.5">
                                                    <img alt="" class="rounded-full size-7 shrink-0" src="{{ asset('assets/img/user.jpg') }}"/>
                                                    <div>
                                                        <a class="text-sm font-semibold text-gray-900 hover:text-primary-active" href="#">Tyler Hero</a>
                                                        <div>tyler.hero@gmail.com</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                User
                                            </td>
                                            <td class="text-center">
                                                <div class="rounded-[30px] badge badge-outline badge-success w-full font-semibold">
                                                    Active
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2 text-1.5xl">
                                                    <i class="ki-outline ki-fingerprint-scanning"></i>
                                                    <i class="ki-outline ki-phone"></i>
                                                    <i class="ki-outline ki-security-user"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2">
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/edge.png') }}"/>
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/chrome.png') }}"/>
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/mozilla.png') }}"/>
                                                </div>
                                            </td>
                                            <td>
                                                <label class="switch switch-sm">
                                                    <input checked="" type="checkbox" value="1"/>
                                                </label>
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px" data-menu-item-placement="bottom-end" data-menu-item-toggle="dropdown" data-menu-item-trigger="click|lg:click">
                                                        <button class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]" data-menu-dismiss="true">
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-search-list">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     View
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-file-up">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Export
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-pencil">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Edit
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-copy">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Make a copy
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-trash">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Remove
                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="2"/>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-2.5">
                                                    <img alt="" class="rounded-full size-7 shrink-0" src="{{ asset('assets/img/user.jpg') }}"/>
                                                    <div>
                                                        <a class="text-sm font-semibold text-gray-900 hover:text-primary-active" href="#">Jane Smith</a>
                                                        <div>jane.smith@gmail.com</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                User
                                            </td>
                                            <td class="text-center">
                                                <div class="rounded-[30px] badge badge-outline badge-success w-full font-semibold">
                                                    Active
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2 text-1.5xl">
                                                    <i class="ki-outline ki-fingerprint-scanning"></i>
                                                    <i class="ki-outline ki-security-user"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2">
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/edge.png') }}"/>
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/chrome.png') }}"/>
                                                </div>
                                            </td>
                                            <td>
                                                <label class="switch switch-sm">
                                                    <input checked="" type="checkbox" value="1"/>
                                                </label>
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px" data-menu-item-placement="bottom-end" data-menu-item-toggle="dropdown" data-menu-item-trigger="click|lg:click">
                                                        <button class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]" data-menu-dismiss="true">
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-search-list">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     View
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-file-up">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Export
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-pencil">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Edit
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-copy">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Make a copy
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-trash">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Remove
                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="2"/>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-2.5">
                                                    <img alt="" class="rounded-full size-7 shrink-0" src="{{ asset('assets/img/user.jpg') }}"/>
                                                    <div>
                                                        <a class="text-sm font-semibold text-gray-900 hover:text-primary-active" href="#">Emma Jhonson</a>
                                                        <div>emma.jhonson@gmail.com</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                Admin
                                            </td>
                                            <td class="text-center">
                                                <div class="rounded-[30px] badge badge-outline badge-success w-full font-semibold">
                                                    Active
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2 text-1.5xl">
                                                    <i class="ki-outline ki-security-user"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2">
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/edge.png') }}"/>
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/mozilla.png') }}"/>
                                                </div>
                                            </td>
                                            <td>
                                                <label class="switch switch-sm">
                                                    <input checked="" type="checkbox" value="1"/>
                                                </label>
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px" data-menu-item-placement="bottom-end" data-menu-item-toggle="dropdown" data-menu-item-trigger="click|lg:click">
                                                        <button class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]" data-menu-dismiss="true">
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-search-list">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     View
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-file-up">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Export
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-pencil">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Edit
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-copy">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Make a copy
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-trash">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Remove
                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="1"/>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-2.5">
                                                    <img alt="" class="rounded-full size-7 shrink-0" src="{{ asset('assets/img/user.jpg') }}"/>
                                                    <div>
                                                        <a class="text-sm font-semibold text-gray-900 hover:text-primary-active" href="#">Tyler Hero</a>
                                                        <div>tyler.hero@gmail.com</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                User
                                            </td>
                                            <td class="text-center">
                                                <div class="rounded-[30px] badge badge-outline badge-success w-full font-semibold">
                                                    Active
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2 text-1.5xl">
                                                    <i class="ki-outline ki-fingerprint-scanning"></i>
                                                    <i class="ki-outline ki-phone"></i>
                                                    <i class="ki-outline ki-security-user"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2">
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/edge.png') }}"/>
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/chrome.png') }}"/>
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/mozilla.png') }}"/>
                                                </div>
                                            </td>
                                            <td>
                                                <label class="switch switch-sm">
                                                    <input checked="" type="checkbox" value="1"/>
                                                </label>
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px" data-menu-item-placement="bottom-end" data-menu-item-toggle="dropdown" data-menu-item-trigger="click|lg:click">
                                                        <button class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]" data-menu-dismiss="true">
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-search-list">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     View
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-file-up">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Export
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-pencil">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Edit
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-copy">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Make a copy
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-trash">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Remove
                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="2"/>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-2.5">
                                                    <img alt="" class="rounded-full size-7 shrink-0" src="{{ asset('assets/img/user.jpg') }}"/>
                                                    <div>
                                                        <a class="text-sm font-semibold text-gray-900 hover:text-primary-active" href="#">Jane Smith</a>
                                                        <div>jane.smith@gmail.com</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                User
                                            </td>
                                            <td class="text-center">
                                                <div class="rounded-[30px] badge badge-outline badge-success w-full font-semibold">
                                                    Active
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2 text-1.5xl">
                                                    <i class="ki-outline ki-fingerprint-scanning"></i>
                                                    <i class="ki-outline ki-security-user"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2">
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/edge.png') }}"/>
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/chrome.png') }}"/>
                                                </div>
                                            </td>
                                            <td>
                                                <label class="switch switch-sm">
                                                    <input checked="" type="checkbox" value="1"/>
                                                </label>
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px" data-menu-item-placement="bottom-end" data-menu-item-toggle="dropdown" data-menu-item-trigger="click|lg:click">
                                                        <button class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]" data-menu-dismiss="true">
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-search-list">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     View
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-file-up">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Export
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-pencil">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Edit
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-copy">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Make a copy
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-trash">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Remove
                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="2"/>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-2.5">
                                                    <img alt="" class="rounded-full size-7 shrink-0" src="{{ asset('assets/img/user.jpg') }}"/>
                                                    <div>
                                                        <a class="text-sm font-semibold text-gray-900 hover:text-primary-active" href="#">Emma Jhonson</a>
                                                        <div>emma.jhonson@gmail.com</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                Admin
                                            </td>
                                            <td class="text-center">
                                                <div class="rounded-[30px] badge badge-outline badge-success w-full font-semibold">
                                                    Active
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2 text-1.5xl">
                                                    <i class="ki-outline ki-security-user"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2">
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/edge.png') }}"/>
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/mozilla.png') }}"/>
                                                </div>
                                            </td>
                                            <td>
                                                <label class="switch switch-sm">
                                                    <input checked="" type="checkbox" value="1"/>
                                                </label>
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px" data-menu-item-placement="bottom-end" data-menu-item-toggle="dropdown" data-menu-item-trigger="click|lg:click">
                                                        <button class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]" data-menu-dismiss="true">
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-search-list">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     View
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-file-up">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Export
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-pencil">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Edit
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-copy">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Make a copy
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-trash">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Remove
                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="1"/>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-2.5">
                                                    <img alt="" class="rounded-full size-7 shrink-0" src="{{ asset('assets/img/user.jpg') }}"/>
                                                    <div>
                                                        <a class="text-sm font-semibold text-gray-900 hover:text-primary-active" href="#">Tyler Hero</a>
                                                        <div>tyler.hero@gmail.com</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                User
                                            </td>
                                            <td class="text-center">
                                                <div class="rounded-[30px] badge badge-outline badge-success w-full font-semibold">
                                                    Active
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2 text-1.5xl">
                                                    <i class="ki-outline ki-fingerprint-scanning"></i>
                                                    <i class="ki-outline ki-phone"></i>
                                                    <i class="ki-outline ki-security-user"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2">
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/edge.png') }}"/>
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/chrome.png') }}"/>
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/mozilla.png') }}"/>
                                                </div>
                                            </td>
                                            <td>
                                                <label class="switch switch-sm">
                                                    <input checked="" type="checkbox" value="1"/>
                                                </label>
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px" data-menu-item-placement="bottom-end" data-menu-item-toggle="dropdown" data-menu-item-trigger="click|lg:click">
                                                        <button class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]" data-menu-dismiss="true">
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-search-list">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     View
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-file-up">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Export
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-pencil">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Edit
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-copy">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Make a copy
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-trash">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Remove
                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="2"/>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-2.5">
                                                    <img alt="" class="rounded-full size-7 shrink-0" src="{{ asset('assets/img/user.jpg') }}"/>
                                                    <div>
                                                        <a class="text-sm font-semibold text-gray-900 hover:text-primary-active" href="#">Jane Smith</a>
                                                        <div>jane.smith@gmail.com</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                User
                                            </td>
                                            <td class="text-center">
                                                <div class="rounded-[30px] badge badge-outline badge-success w-full font-semibold">
                                                    Active
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2 text-1.5xl">
                                                    <i class="ki-outline ki-fingerprint-scanning"></i>
                                                    <i class="ki-outline ki-security-user"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2">
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/edge.png') }}"/>
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/chrome.png') }}"/>
                                                </div>
                                            </td>
                                            <td>
                                                <label class="switch switch-sm">
                                                    <input checked="" type="checkbox" value="1"/>
                                                </label>
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px" data-menu-item-placement="bottom-end" data-menu-item-toggle="dropdown" data-menu-item-trigger="click|lg:click">
                                                        <button class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]" data-menu-dismiss="true">
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-search-list">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     View
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-file-up">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Export
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-pencil">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Edit
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-copy">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Make a copy
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-trash">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Remove
                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="2"/>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-2.5">
                                                    <img alt="" class="rounded-full size-7 shrink-0" src="{{ asset('assets/img/user.jpg') }}"/>
                                                    <div>
                                                        <a class="text-sm font-semibold text-gray-900 hover:text-primary-active" href="#">Emma Jhonson</a>
                                                        <div>emma.jhonson@gmail.com</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                Admin
                                            </td>
                                            <td class="text-center">
                                                <div class="rounded-[30px] badge badge-outline badge-success w-full font-semibold">
                                                    Active
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2 text-1.5xl">
                                                    <i class="ki-outline ki-security-user"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-wrap gap-2">
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/edge.png') }}"/>
                                                    <img alt="" class="size-[18px] shrinc-0" src="{{ asset('assets/img/mozilla.png') }}"/>
                                                </div>
                                            </td>
                                            <td>
                                                <label class="switch switch-sm">
                                                    <input checked="" type="checkbox" value="1"/>
                                                </label>
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px" data-menu-item-placement="bottom-end" data-menu-item-toggle="dropdown" data-menu-item-trigger="click|lg:click">
                                                        <button class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]" data-menu-dismiss="true">
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-search-list">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     View
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-file-up">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Export
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-pencil">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Edit
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-copy">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Make a copy
                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                    <span class="menu-icon">
                     <i class="ki-filled ki-trash">
                     </i>
                    </span>
                                                                    <span class="menu-title">
                     Remove
                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div
                                    class="card-footer justify-center md:justify-between flex-col md:flex-row gap-5 text-gray-600 text-2sm font-medium">
                                    <div class="flex items-center gap-2 order-2 md:order-1">
                                        Show
                                        <select class="select select-sm w-16" data-datatable-size="true" name="perpage">
                                        </select>
                                        per page
                                    </div>
                                    <div class="flex items-center gap-4 order-1 md:order-2">
            <span data-datatable-info="true">
            </span>
                                        <div class="pagination" data-datatable-pagination="true">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end: container -->
        </main>
    </div>
@endsection
