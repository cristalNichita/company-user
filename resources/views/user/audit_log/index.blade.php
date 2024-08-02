@extends('user.layouts.front')
@section('title', 'Activity Log')

@section('content')
    <div class="wrapper flex grow flex-col">
        <main class="grow content pt-5" id="content" role="content">
            <div class="container-fixed" id="content_container">
            </div>

            <div class="container-fixed">
                <div class="flex flex-nowrap items-center lg:items-end justify-between dark:border-b-coal-100 gap-6 mb-5 lg:mb-10">
                    <div class="grid">
                        <div class="scrollable-x-auto">
                            <div class="menu gap-3" data-menu="true">
                                <div class="menu-item border-b-2 border-b-transparent menu-item-active:border-b-primary menu-item-here:border-b-primary" data-menu-item-placement="bottom-start" data-menu-item-toggle="dropdown" data-menu-item-trigger="click">
                                    <div class="menu-link gap-1.5 pb-2 lg:pb-4 px-2" tabindex="0">
                                        <div class="text-[1.875rem] text-gray-900 font-semibold">
                                            <div>Audit Logs</div>
                                            <div class="text-gray-600 text-1.5xl">Discover advanced audit logs of your company.</div>
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
                                Showing 10 of 49,053 users
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
                                                <input class="checkbox checkbox-sm" data-datatable-check="true"
                                                       type="checkbox"/>
                                            </th>
                                            <th class="min-w-[200px]">
                                                <span class="sort asc">
                                                    <span class="sort-label">Member</span>
                                                    <span class="sort-icon"></span>
                                                </span>
                                            </th>
                                            <th class="min-w-[250px]">
                                                <span class="sort">
                                                    <span class="sort-label">Browser</span>
                                                    <span class="sort-icon"></span>
                                                </span>
                                            </th>
                                            <th class="min-w-[190px]">
                                                <span class="sort">
                                                    <span class="sort-label">IP Address</span>
                                                    <span class="sort-icon"></span>
                                                </span>
                                            </th>
                                            <th class="min-w-[190px]">
                                                <span class="sort">
                                                    <span class="sort-label">Timestamp</span>
                                                    <span class="sort-icon"></span>
                                                </span>
                                            </th>
                                            <th class="min-w-[190px]">
                                                <span class="sort">
                                                    <span class="sort-label">Action Taken</span>
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
                                                    <a class="text-sm font-semibold text-gray-900 hover:text-primary-active"
                                                       href="#">
                                                        Tyler Hero
                                                    </a>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-1.5">
                                                    <i class="ki-filled ki-chrome">
                                                    </i>
                                                    Chrome on Mac OS X
                                                </div>
                                            </td>
                                            <td>
                                                234.0.155.191
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-1.5">
                                                    2024-01-04T23:59:59Z
                                                </div>
                                            </td>
                                            <td>
                                                Login Attempt Blocked
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px"
                                                         data-menu-item-placement="bottom-end"
                                                         data-menu-item-toggle="dropdown"
                                                         data-menu-item-trigger="click|lg:click">
                                                        <button
                                                            class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]"
                                                             data-menu-dismiss="true">
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                                                                    <span class="menu-icon">
                                                                        <i class="ki-filled ki-search-list"></i>
                                                                    </span>
                                                                    <span class="menu-title">View</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                                                                    <span class="menu-icon">
                                                                        <i class="ki-filled ki-file-up"></i>
                                                                    </span>
                                                                    <span class="menu-title">Export</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                                                                    <span class="menu-icon">
                                                                        <i class="ki-filled ki-pencil"></i>
                                                                    </span>
                                                                    <span class="menu-title">Edit</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                                                                    <span class="menu-icon">
                                                                        <i class="ki-filled ki-copy"></i>
                                                                    </span>
                                                                    <span class="menu-title">Make a copy</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                                                                    <span class="menu-icon">
                                                                    <i class="ki-filled ki-trash"></i>
                                                                    </span>
                                                                    <span class="menu-title">Remove</span>
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
                                                    <a class="text-sm font-semibold text-gray-900 hover:text-primary-active" href="#">Jane Smith</a>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-1.5">
                                                    <i class="ki-filled ki-chrome"></i>
                                                    Chrome on Windows 7
                                                </div>
                                            </td>
                                            <td>
                                                70.218.212.162
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-1.5">
                                                    2024-01-04T23:59:59Z
                                                </div>
                                            </td>
                                            <td>
                                                Created a new role
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px"
                                                         data-menu-item-placement="bottom-end"
                                                         data-menu-item-toggle="dropdown"
                                                         data-menu-item-trigger="click|lg:click">
                                                        <button
                                                            class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]"
                                                             data-menu-dismiss="true">
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                                                                    <span class="menu-icon">
                                                                        <i class="ki-filled ki-search-list"></i>
                                                                    </span>
                                                                    <span class="menu-title">View</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                                                                    <span class="menu-icon">
                                                                    <i class="ki-filled ki-file-up"></i>
                                                                    </span>
                                                                    <span class="menu-title">Export</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                                                                    <span class="menu-icon">
                                                                        <i class="ki-filled ki-pencil"></i>
                                                                    </span>
                                                                    <span class="menu-title">Edit</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                                                                    <span class="menu-icon">
                                                                        <i class="ki-filled ki-copy"></i>
                                                                    </span>
                                                                    <span class="menu-title">Make a copy</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                                                                    <span class="menu-icon">
                                                                        <i class="ki-filled ki-trash"></i>
                                                                    </span>
                                                                    <span class="menu-title">Remove</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="3"/>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-2.5">
                                                    <img alt="" class="rounded-full size-7 shrink-0" src="{{ asset('assets/img/user.jpg') }}"/>
                                                    <a class="text-sm font-semibold text-gray-900 hover:text-primary-active" href="#">Emma Johnson</a>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-1.5">
                                                    <i class="ki-filled ki-chrome"></i>
                                                    Chrome on Mac OS X
                                                </div>
                                            </td>
                                            <td>
                                                140.92.152.213
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-1.5">
                                                    2024-01-04T23:59:59Z
                                                </div>
                                            </td>
                                            <td>
                                                Deleted a member
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px"
                                                         data-menu-item-placement="bottom-end"
                                                         data-menu-item-toggle="dropdown"
                                                         data-menu-item-trigger="click|lg:click">
                                                        <button
                                                            class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]"
                                                             data-menu-dismiss="true">
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
                                                <input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="4"/>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-2.5">
                                                    <img alt="" class="rounded-full size-7 shrink-0" src="{{ asset('assets/img/user.jpg') }}"/>
                                                    <a class="text-sm font-semibold text-gray-900 hover:text-primary-active" href="#">Michael Brown</a>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-1.5">
                                                    <i class="ki-filled ki-chrome">
                                                    </i>
                                                    Chrome on Windows 10
                                                </div>
                                            </td>
                                            <td>
                                                214.219.147.46
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-1.5">
                                                    2024-01-04T23:59:59Z
                                                </div>
                                            </td>
                                            <td>
                                                Created a new password
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px"
                                                         data-menu-item-placement="bottom-end"
                                                         data-menu-item-toggle="dropdown"
                                                         data-menu-item-trigger="click|lg:click">
                                                        <button
                                                            class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]"
                                                             data-menu-dismiss="true">
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
                                                <input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="5"/>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-2.5">
                                                    <img alt="" class="rounded-full size-7 shrink-0" src="{{ asset('assets/img/user.jpg') }}"/>
                                                    <a class="text-sm font-semibold text-gray-900 hover:text-primary-active" href="#">Chloe Davis</a>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-1.5">
                                                    <i class="ki-filled ki-chrome">
                                                    </i>
                                                    Chrome on iOS 14
                                                </div>
                                            </td>
                                            <td>
                                                246.44.68.100
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-1.5">
                                                    2024-01-04T23:59:59Z
                                                </div>
                                            </td>
                                            <td>
                                                User Account Locked
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px"
                                                         data-menu-item-placement="bottom-end"
                                                         data-menu-item-toggle="dropdown"
                                                         data-menu-item-trigger="click|lg:click">
                                                        <button
                                                            class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]"
                                                             data-menu-dismiss="true">
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
                                                <input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="6"/>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-2.5">
                                                    <img alt="" class="rounded-full size-7 shrink-0" src="{{ asset('assets/img/user.jpg') }}"/>
                                                    <a class="text-sm font-semibold text-gray-900 hover:text-primary-active" href="#">William Wilson</a>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-1.5">
                                                    <i class="ki-filled ki-chrome">
                                                    </i>
                                                    Chrome on Windows 11
                                                </div>
                                            </td>
                                            <td>
                                                233.182.185.28
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-1.5">
                                                    2024-01-04T23:59:59Z
                                                </div>
                                            </td>
                                            <td>
                                                User Account Locked
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px"
                                                         data-menu-item-placement="bottom-end"
                                                         data-menu-item-toggle="dropdown"
                                                         data-menu-item-trigger="click|lg:click">
                                                        <button
                                                            class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]"
                                                             data-menu-dismiss="true">
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
                                                <input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="7"/>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-2.5">
                                                    <img alt="" class="rounded-full size-7 shrink-0" src="{{ asset('assets/img/user.jpg') }}"/>
                                                    <a class="text-sm font-semibold text-gray-900 hover:text-primary-active" href="#">Olivia Martin</a>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-1.5">
                                                    <i class="ki-filled ki-chrome">
                                                    </i>
                                                    Chrome on Android 16
                                                </div>
                                            </td>
                                            <td>
                                                76.216.214.248
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-1.5">
                                                    2024-01-04T23:59:59Z
                                                </div>
                                            </td>
                                            <td>
                                                User Account Locked
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px"
                                                         data-menu-item-placement="bottom-end"
                                                         data-menu-item-toggle="dropdown"
                                                         data-menu-item-trigger="click|lg:click">
                                                        <button
                                                            class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]"
                                                             data-menu-dismiss="true">
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
                                                <input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="8"/>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-2.5">
                                                    <img alt="" class="rounded-full size-7 shrink-0" src="{{ asset('assets/img/user.jpg') }}"/>
                                                    <a class="text-sm font-semibold text-gray-900 hover:text-primary-active" href="#">Ethan Garcia</a>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-1.5">
                                                    <i class="ki-filled ki-chrome"></i>
                                                    Safari on Mac OS X
                                                </div>
                                            </td>
                                            <td>
                                                102.150.137.255
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-1.5">
                                                    2024-01-04T23:59:59Z
                                                </div>
                                            </td>
                                            <td>
                                                User Account Locked
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px"
                                                         data-menu-item-placement="bottom-end"
                                                         data-menu-item-toggle="dropdown"
                                                         data-menu-item-trigger="click|lg:click">
                                                        <button
                                                            class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]"
                                                             data-menu-dismiss="true">
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
                                                    <a class="text-sm font-semibold text-gray-900 hover:text-primary-active"
                                                       href="#">
                                                        Tyler Hero
                                                    </a>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-1.5">
                                                    <i class="ki-filled ki-chrome">
                                                    </i>
                                                    Chrome on Mac OS X
                                                </div>
                                            </td>
                                            <td>
                                                234.0.155.191
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-1.5">
                                                    2024-01-04T23:59:59Z
                                                </div>
                                            </td>
                                            <td>
                                                Login Attempt Blocked
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px"
                                                         data-menu-item-placement="bottom-end"
                                                         data-menu-item-toggle="dropdown"
                                                         data-menu-item-trigger="click|lg:click">
                                                        <button
                                                            class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]"
                                                             data-menu-dismiss="true">
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                                                                    <span class="menu-icon">
                                                                        <i class="ki-filled ki-search-list"></i>
                                                                    </span>
                                                                    <span class="menu-title">View</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                                                                    <span class="menu-icon">
                                                                        <i class="ki-filled ki-file-up"></i>
                                                                    </span>
                                                                    <span class="menu-title">Export</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                                                                    <span class="menu-icon">
                                                                        <i class="ki-filled ki-pencil"></i>
                                                                    </span>
                                                                    <span class="menu-title">Edit</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                                                                    <span class="menu-icon">
                                                                        <i class="ki-filled ki-copy"></i>
                                                                    </span>
                                                                    <span class="menu-title">Make a copy</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                                                                    <span class="menu-icon">
                                                                    <i class="ki-filled ki-trash"></i>
                                                                    </span>
                                                                    <span class="menu-title">Remove</span>
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
                                                    <a class="text-sm font-semibold text-gray-900 hover:text-primary-active" href="#">Jane Smith</a>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-1.5">
                                                    <i class="ki-filled ki-chrome"></i>
                                                    Chrome on Windows 7
                                                </div>
                                            </td>
                                            <td>
                                                70.218.212.162
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-1.5">
                                                    2024-01-04T23:59:59Z
                                                </div>
                                            </td>
                                            <td>
                                                Created a new role
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px"
                                                         data-menu-item-placement="bottom-end"
                                                         data-menu-item-toggle="dropdown"
                                                         data-menu-item-trigger="click|lg:click">
                                                        <button
                                                            class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]"
                                                             data-menu-dismiss="true">
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                                                                    <span class="menu-icon">
                                                                        <i class="ki-filled ki-search-list"></i>
                                                                    </span>
                                                                    <span class="menu-title">View</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                                                                    <span class="menu-icon">
                                                                    <i class="ki-filled ki-file-up"></i>
                                                                    </span>
                                                                    <span class="menu-title">Export</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                                                                    <span class="menu-icon">
                                                                        <i class="ki-filled ki-pencil"></i>
                                                                    </span>
                                                                    <span class="menu-title">Edit</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                                                                    <span class="menu-icon">
                                                                        <i class="ki-filled ki-copy"></i>
                                                                    </span>
                                                                    <span class="menu-title">Make a copy</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                                                                    <span class="menu-icon">
                                                                        <i class="ki-filled ki-trash"></i>
                                                                    </span>
                                                                    <span class="menu-title">Remove</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="3"/>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-2.5">
                                                    <img alt="" class="rounded-full size-7 shrink-0" src="{{ asset('assets/img/user.jpg') }}"/>
                                                    <a class="text-sm font-semibold text-gray-900 hover:text-primary-active" href="#">Emma Johnson</a>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-1.5">
                                                    <i class="ki-filled ki-chrome"></i>
                                                    Chrome on Mac OS X
                                                </div>
                                            </td>
                                            <td>
                                                140.92.152.213
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-1.5">
                                                    2024-01-04T23:59:59Z
                                                </div>
                                            </td>
                                            <td>
                                                Deleted a member
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px"
                                                         data-menu-item-placement="bottom-end"
                                                         data-menu-item-toggle="dropdown"
                                                         data-menu-item-trigger="click|lg:click">
                                                        <button
                                                            class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]"
                                                             data-menu-dismiss="true">
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
                                                <input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="4"/>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-2.5">
                                                    <img alt="" class="rounded-full size-7 shrink-0" src="{{ asset('assets/img/user.jpg') }}"/>
                                                    <a class="text-sm font-semibold text-gray-900 hover:text-primary-active" href="#">Michael Brown</a>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-1.5">
                                                    <i class="ki-filled ki-chrome">
                                                    </i>
                                                    Chrome on Windows 10
                                                </div>
                                            </td>
                                            <td>
                                                214.219.147.46
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-1.5">
                                                    2024-01-04T23:59:59Z
                                                </div>
                                            </td>
                                            <td>
                                                Created a new password
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px"
                                                         data-menu-item-placement="bottom-end"
                                                         data-menu-item-toggle="dropdown"
                                                         data-menu-item-trigger="click|lg:click">
                                                        <button
                                                            class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]"
                                                             data-menu-dismiss="true">
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
                                                <input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="5"/>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-2.5">
                                                    <img alt="" class="rounded-full size-7 shrink-0" src="{{ asset('assets/img/user.jpg') }}"/>
                                                    <a class="text-sm font-semibold text-gray-900 hover:text-primary-active" href="#">Chloe Davis</a>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-1.5">
                                                    <i class="ki-filled ki-chrome">
                                                    </i>
                                                    Chrome on iOS 14
                                                </div>
                                            </td>
                                            <td>
                                                246.44.68.100
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-1.5">
                                                    2024-01-04T23:59:59Z
                                                </div>
                                            </td>
                                            <td>
                                                User Account Locked
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px"
                                                         data-menu-item-placement="bottom-end"
                                                         data-menu-item-toggle="dropdown"
                                                         data-menu-item-trigger="click|lg:click">
                                                        <button
                                                            class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]"
                                                             data-menu-dismiss="true">
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
                                                <input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="6"/>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-2.5">
                                                    <img alt="" class="rounded-full size-7 shrink-0" src="{{ asset('assets/img/user.jpg') }}"/>
                                                    <a class="text-sm font-semibold text-gray-900 hover:text-primary-active" href="#">William Wilson</a>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-1.5">
                                                    <i class="ki-filled ki-chrome">
                                                    </i>
                                                    Chrome on Windows 11
                                                </div>
                                            </td>
                                            <td>
                                                233.182.185.28
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-1.5">
                                                    2024-01-04T23:59:59Z
                                                </div>
                                            </td>
                                            <td>
                                                User Account Locked
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px"
                                                         data-menu-item-placement="bottom-end"
                                                         data-menu-item-toggle="dropdown"
                                                         data-menu-item-trigger="click|lg:click">
                                                        <button
                                                            class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]"
                                                             data-menu-dismiss="true">
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
                                                <input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="7"/>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-2.5">
                                                    <img alt="" class="rounded-full size-7 shrink-0" src="{{ asset('assets/img/user.jpg') }}"/>
                                                    <a class="text-sm font-semibold text-gray-900 hover:text-primary-active" href="#">Olivia Martin</a>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-1.5">
                                                    <i class="ki-filled ki-chrome">
                                                    </i>
                                                    Chrome on Android 16
                                                </div>
                                            </td>
                                            <td>
                                                76.216.214.248
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-1.5">
                                                    2024-01-04T23:59:59Z
                                                </div>
                                            </td>
                                            <td>
                                                User Account Locked
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px"
                                                         data-menu-item-placement="bottom-end"
                                                         data-menu-item-toggle="dropdown"
                                                         data-menu-item-trigger="click|lg:click">
                                                        <button
                                                            class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]"
                                                             data-menu-dismiss="true">
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
                                                <input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="8"/>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-2.5">
                                                    <img alt="" class="rounded-full size-7 shrink-0" src="{{ asset('assets/img/user.jpg') }}"/>
                                                    <a class="text-sm font-semibold text-gray-900 hover:text-primary-active" href="#">Ethan Garcia</a>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-1.5">
                                                    <i class="ki-filled ki-chrome"></i>
                                                    Safari on Mac OS X
                                                </div>
                                            </td>
                                            <td>
                                                102.150.137.255
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-1.5">
                                                    2024-01-04T23:59:59Z
                                                </div>
                                            </td>
                                            <td>
                                                User Account Locked
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px"
                                                         data-menu-item-placement="bottom-end"
                                                         data-menu-item-toggle="dropdown"
                                                         data-menu-item-trigger="click|lg:click">
                                                        <button
                                                            class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]"
                                                             data-menu-dismiss="true">
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
                                                <input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="9"/>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-2.5">
                                                    <img alt="" class="rounded-full size-7 shrink-0" src="{{ asset('assets/img/user.jpg') }}"/>
                                                    <a class="text-sm font-semibold text-gray-900 hover:text-primary-active" href="#">Ava Rodriguez</a>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-1.5">
                                                    <i class="ki-filled ki-chrome"></i>
                                                    Safari on Mac OS X
                                                </div>
                                            </td>
                                            <td>
                                                75.243.106.80
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-1.5">
                                                    2024-01-04T23:59:59Z
                                                </div>
                                            </td>
                                            <td>
                                                User Account Locked
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px"
                                                         data-menu-item-placement="bottom-end"
                                                         data-menu-item-toggle="dropdown"
                                                         data-menu-item-trigger="click|lg:click">
                                                        <button
                                                            class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]"
                                                             data-menu-dismiss="true">
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
                                                    <a class="text-sm font-semibold text-gray-900 hover:text-primary-active"
                                                       href="#">
                                                        Tyler Hero
                                                    </a>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-1.5">
                                                    <i class="ki-filled ki-chrome">
                                                    </i>
                                                    Chrome on Mac OS X
                                                </div>
                                            </td>
                                            <td>
                                                234.0.155.191
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-1.5">
                                                    2024-01-04T23:59:59Z
                                                </div>
                                            </td>
                                            <td>
                                                Login Attempt Blocked
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px"
                                                         data-menu-item-placement="bottom-end"
                                                         data-menu-item-toggle="dropdown"
                                                         data-menu-item-trigger="click|lg:click">
                                                        <button
                                                            class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]"
                                                             data-menu-dismiss="true">
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                                                                    <span class="menu-icon">
                                                                        <i class="ki-filled ki-search-list"></i>
                                                                    </span>
                                                                    <span class="menu-title">View</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                                                                    <span class="menu-icon">
                                                                        <i class="ki-filled ki-file-up"></i>
                                                                    </span>
                                                                    <span class="menu-title">Export</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                                                                    <span class="menu-icon">
                                                                        <i class="ki-filled ki-pencil"></i>
                                                                    </span>
                                                                    <span class="menu-title">Edit</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                                                                    <span class="menu-icon">
                                                                        <i class="ki-filled ki-copy"></i>
                                                                    </span>
                                                                    <span class="menu-title">Make a copy</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                                                                    <span class="menu-icon">
                                                                    <i class="ki-filled ki-trash"></i>
                                                                    </span>
                                                                    <span class="menu-title">Remove</span>
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
                                                    <a class="text-sm font-semibold text-gray-900 hover:text-primary-active" href="#">Jane Smith</a>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-1.5">
                                                    <i class="ki-filled ki-chrome"></i>
                                                    Chrome on Windows 7
                                                </div>
                                            </td>
                                            <td>
                                                70.218.212.162
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-1.5">
                                                    2024-01-04T23:59:59Z
                                                </div>
                                            </td>
                                            <td>
                                                Created a new role
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px"
                                                         data-menu-item-placement="bottom-end"
                                                         data-menu-item-toggle="dropdown"
                                                         data-menu-item-trigger="click|lg:click">
                                                        <button
                                                            class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]"
                                                             data-menu-dismiss="true">
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                                                                    <span class="menu-icon">
                                                                        <i class="ki-filled ki-search-list"></i>
                                                                    </span>
                                                                    <span class="menu-title">View</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                                                                    <span class="menu-icon">
                                                                    <i class="ki-filled ki-file-up"></i>
                                                                    </span>
                                                                    <span class="menu-title">Export</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                                                                    <span class="menu-icon">
                                                                        <i class="ki-filled ki-pencil"></i>
                                                                    </span>
                                                                    <span class="menu-title">Edit</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                                                                    <span class="menu-icon">
                                                                        <i class="ki-filled ki-copy"></i>
                                                                    </span>
                                                                    <span class="menu-title">Make a copy</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-separator">
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link" href="#">
                                                                    <span class="menu-icon">
                                                                        <i class="ki-filled ki-trash"></i>
                                                                    </span>
                                                                    <span class="menu-title">Remove</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="3"/>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-2.5">
                                                    <img alt="" class="rounded-full size-7 shrink-0" src="{{ asset('assets/img/user.jpg') }}"/>
                                                    <a class="text-sm font-semibold text-gray-900 hover:text-primary-active" href="#">Emma Johnson</a>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-1.5">
                                                    <i class="ki-filled ki-chrome"></i>
                                                    Chrome on Mac OS X
                                                </div>
                                            </td>
                                            <td>
                                                140.92.152.213
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-1.5">
                                                    2024-01-04T23:59:59Z
                                                </div>
                                            </td>
                                            <td>
                                                Deleted a member
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px"
                                                         data-menu-item-placement="bottom-end"
                                                         data-menu-item-toggle="dropdown"
                                                         data-menu-item-trigger="click|lg:click">
                                                        <button
                                                            class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]"
                                                             data-menu-dismiss="true">
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
                                                <input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="4"/>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-2.5">
                                                    <img alt="" class="rounded-full size-7 shrink-0" src="{{ asset('assets/img/user.jpg') }}"/>
                                                    <a class="text-sm font-semibold text-gray-900 hover:text-primary-active" href="#">Michael Brown</a>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-1.5">
                                                    <i class="ki-filled ki-chrome">
                                                    </i>
                                                    Chrome on Windows 10
                                                </div>
                                            </td>
                                            <td>
                                                214.219.147.46
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-1.5">
                                                    2024-01-04T23:59:59Z
                                                </div>
                                            </td>
                                            <td>
                                                Created a new password
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px"
                                                         data-menu-item-placement="bottom-end"
                                                         data-menu-item-toggle="dropdown"
                                                         data-menu-item-trigger="click|lg:click">
                                                        <button
                                                            class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]"
                                                             data-menu-dismiss="true">
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
                                                <input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="5"/>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-2.5">
                                                    <img alt="" class="rounded-full size-7 shrink-0" src="{{ asset('assets/img/user.jpg') }}"/>
                                                    <a class="text-sm font-semibold text-gray-900 hover:text-primary-active" href="#">Chloe Davis</a>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-1.5">
                                                    <i class="ki-filled ki-chrome">
                                                    </i>
                                                    Chrome on iOS 14
                                                </div>
                                            </td>
                                            <td>
                                                246.44.68.100
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-1.5">
                                                    2024-01-04T23:59:59Z
                                                </div>
                                            </td>
                                            <td>
                                                User Account Locked
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px"
                                                         data-menu-item-placement="bottom-end"
                                                         data-menu-item-toggle="dropdown"
                                                         data-menu-item-trigger="click|lg:click">
                                                        <button
                                                            class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]"
                                                             data-menu-dismiss="true">
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
                                                <input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="6"/>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-2.5">
                                                    <img alt="" class="rounded-full size-7 shrink-0" src="{{ asset('assets/img/user.jpg') }}"/>
                                                    <a class="text-sm font-semibold text-gray-900 hover:text-primary-active" href="#">William Wilson</a>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-1.5">
                                                    <i class="ki-filled ki-chrome">
                                                    </i>
                                                    Chrome on Windows 11
                                                </div>
                                            </td>
                                            <td>
                                                233.182.185.28
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-1.5">
                                                    2024-01-04T23:59:59Z
                                                </div>
                                            </td>
                                            <td>
                                                User Account Locked
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px"
                                                         data-menu-item-placement="bottom-end"
                                                         data-menu-item-toggle="dropdown"
                                                         data-menu-item-trigger="click|lg:click">
                                                        <button
                                                            class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]"
                                                             data-menu-dismiss="true">
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
                                                <input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="7"/>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-2.5">
                                                    <img alt="" class="rounded-full size-7 shrink-0" src="{{ asset('assets/img/user.jpg') }}"/>
                                                    <a class="text-sm font-semibold text-gray-900 hover:text-primary-active" href="#">Olivia Martin</a>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-1.5">
                                                    <i class="ki-filled ki-chrome">
                                                    </i>
                                                    Chrome on Android 16
                                                </div>
                                            </td>
                                            <td>
                                                76.216.214.248
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-1.5">
                                                    2024-01-04T23:59:59Z
                                                </div>
                                            </td>
                                            <td>
                                                User Account Locked
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px"
                                                         data-menu-item-placement="bottom-end"
                                                         data-menu-item-toggle="dropdown"
                                                         data-menu-item-trigger="click|lg:click">
                                                        <button
                                                            class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]"
                                                             data-menu-dismiss="true">
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
                                                <input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="8"/>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-2.5">
                                                    <img alt="" class="rounded-full size-7 shrink-0" src="{{ asset('assets/img/user.jpg') }}"/>
                                                    <a class="text-sm font-semibold text-gray-900 hover:text-primary-active" href="#">Ethan Garcia</a>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-1.5">
                                                    <i class="ki-filled ki-chrome"></i>
                                                    Safari on Mac OS X
                                                </div>
                                            </td>
                                            <td>
                                                102.150.137.255
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-1.5">
                                                    2024-01-04T23:59:59Z
                                                </div>
                                            </td>
                                            <td>
                                                User Account Locked
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px"
                                                         data-menu-item-placement="bottom-end"
                                                         data-menu-item-toggle="dropdown"
                                                         data-menu-item-trigger="click|lg:click">
                                                        <button
                                                            class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]"
                                                             data-menu-dismiss="true">
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
                                                <input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="9"/>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-2.5">
                                                    <img alt="" class="rounded-full size-7 shrink-0" src="{{ asset('assets/img/user.jpg') }}"/>
                                                    <a class="text-sm font-semibold text-gray-900 hover:text-primary-active" href="#">Ava Rodriguez</a>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-1.5">
                                                    <i class="ki-filled ki-chrome"></i>
                                                    Safari on Mac OS X
                                                </div>
                                            </td>
                                            <td>
                                                75.243.106.80
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-1.5">
                                                    2024-01-04T23:59:59Z
                                                </div>
                                            </td>
                                            <td>
                                                User Account Locked
                                            </td>
                                            <td>
                                                <div class="menu" data-menu="true">
                                                    <div class="menu-item" data-menu-item-offset="0, 10px"
                                                         data-menu-item-placement="bottom-end"
                                                         data-menu-item-toggle="dropdown"
                                                         data-menu-item-trigger="click|lg:click">
                                                        <button
                                                            class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                            <i class="ki-filled ki-dots-vertical">
                                                            </i>
                                                        </button>
                                                        <div class="menu-dropdown menu-default w-full max-w-[175px]"
                                                             data-menu-dismiss="true">
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

@section('js')
    <script>
        changeBreadcrumbs('Admin', 'Audit Logs');
    </script>
@endsection
