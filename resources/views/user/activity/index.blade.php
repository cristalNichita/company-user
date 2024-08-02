@extends('user.layouts.front')
@section('title', 'Activity Logs')

@section('content')
    <div class="wrapper flex grow flex-col">
        <main class="grow content pt-5" id="content" role="content">
            <div class="container-fixed">
                <div class="flex flex-nowrap items-center lg:items-end justify-between dark:border-b-coal-100 gap-6 mb-1.5 lg:mb-3">
                    <div class="grid">
                        <div class="scrollable-x-auto">
                            <div class="menu gap-3" data-menu="true">
                                <div class="menu-item border-b-2 border-b-transparent menu-item-active:border-b-primary menu-item-here:border-b-primary" data-menu-item-placement="bottom-start" data-menu-item-toggle="dropdown" data-menu-item-trigger="click">
                                    <div class="menu-link gap-1.5 pb-2 lg:pb-4 px-2" tabindex="0">
                                        <div class="text-2xl text-gray-900">
                                            <div class="font-medium">Recent Activity</div>
                                            <div class="text-gray-600 text-lg">Discover your recent activity on the platform.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- begin: container -->
            <div class="container-fixed">
                <!-- begin: activity -->
                <div class="flex gap-5 lg:gap-7.5">
                    <div class="card grow" id="activity_2024_Jan">
                        <div class="card-header">
                            <h3 class="card-title">
                                Logs
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="flex flex-col">
                                <div class="flex items-start relative">
                                    <div class="w-9 left-0 top-9 absolute bottom-0 translate-x-1/2 border-l border-l-gray-300"></div>
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-lock-2 text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="flex flex-col">
                                            <div class="text-sm font-medium text-gray-800">
                                                Changed password for Figma account.
                                            </div>
                                            <span class="text-xs font-medium text-gray-500">
                                                Today, 9:00 AM
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start relative">
                                    <div class="w-9 left-0 top-9 absolute bottom-0 translate-x-1/2 border-l border-l-gray-300"></div>
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-shield-tick text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="flex flex-col">
                                            <div class="text-sm font-medium text-gray-800">
                                                Enabled two-factor authentication for Figma's account.
                                            </div>
                                            <span class="text-xs font-medium text-gray-500">
                                                2 days ago, 15:45 AM
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start relative">
                                    <div class="w-9 left-0 top-9 absolute bottom-0 translate-x-1/2 border-l border-l-gray-300"></div>
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-trash-square text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="flex flex-col pb-2.5">
                                            <span class="text-sm font-medium text-gray-700">
                                                Deleted Figma password.
                                            </span>
                                            <span class="text-xs font-medium text-gray-500">
                                                3 days ago, 11:45 AM
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start relative">
                                    <div class="w-9 left-0 top-9 absolute bottom-0 translate-x-1/2 border-l border-l-gray-300"></div>
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-shield-cross text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="flex flex-col">
                                            <div class="text-sm font-medium text-gray-800">
                                                Disabled two-factor authentication for Figma account.
                                            </div>
                                            <span class="text-xs font-medium text-gray-500">
                                                5 days ago, 4:07 PM
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start relative">
                                    <div class="w-9 left-0 top-9 absolute bottom-0 translate-x-1/2 border-l border-l-gray-300"></div>
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-lock-2 text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="flex flex-col pb-2.5">
                                            <span class="text-sm font-medium text-gray-700">
                                                Changed password for MS Teams account.
                                            </span>
                                            <span class="text-xs font-medium text-gray-500">
                                                5 days ago, 4:07 PM
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start relative">
                                    <div class="w-9 left-0 top-9 absolute bottom-0 translate-x-1/2 border-l border-l-gray-300"></div>
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-eye text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="flex flex-col">
                                            <div class="text-sm font-medium text-gray-800">
                                                Shared Teams password with Alexander Marinuk.
                                            </div>
                                            <span class="text-xs font-medium text-gray-500">
                                                5 days ago, 4:07 PM
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start relative">
                                    <div class="w-9 left-0 top-9 absolute bottom-0 translate-x-1/2 border-l border-l-gray-300"></div>
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-trash-square text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="flex flex-col">
                                            <div class="text-sm font-medium text-gray-800">
                                                Deleted Gitlab account.
                                            </div>
                                            <span class="text-xs font-medium text-gray-500">
                                                6 days ago, 10:45 AM
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start relative">
                                    <div class="w-9 left-0 top-9 absolute bottom-0 translate-x-1/2 border-l border-l-gray-300"></div>
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-shield-tick text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="flex flex-col pb-2.5">
                                            <span class="text-sm font-medium text-gray-800">
                                                Enabled two-factor authentication for MS Teams account.
                                            </span>
                                            <span class="text-xs font-medium text-gray-500">
                                                2 days ago, 4:07 PM
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start relative">
                                    <div class="w-9 left-0 top-9 absolute bottom-0 translate-x-1/2 border-l border-l-gray-300"></div>
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-lock-2 text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="flex flex-col">
                                            <div class="text-sm font-medium text-gray-800">
                                                Changed password for Gitlab account.
                                            </div>
                                            <span class="text-xs font-medium text-gray-500">
                                                2 weeks ago, 10:45 AM
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start relative">
                                    <div class="w-9 left-0 top-9 absolute bottom-0 translate-x-1/2 border-l border-l-gray-300"></div>
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-shield-cross text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="grow">
                                            <div class="flex flex-col pb-2.5">
                                                <div class="text-sm font-medium text-gray-700">
                                                    Disabled two-factor authentication for Teams account.
                                                </div>
                                                <span class="text-xs font-medium text-gray-500">
                                                    1 month ago, 11:45 AM
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start relative">
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-trash-square text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 text-md grow">
                                        <div class="flex flex-col">
                                            <div class="text-sm font-medium text-gray-800">
                                                Deleted Binance password.
                                            </div>
                                            <span class="text-xs font-medium text-gray-500">
                                                3 months ago, 4:07 PM
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card grow hidden" id="activity_2024_Feb">
                        <div class="card-header">
                            <h3 class="card-title">
                                Logs
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="flex flex-col">
                                <div class="flex items-start relative">
                                    <div class="w-9 left-0 top-9 absolute bottom-0 translate-x-1/2 border-l border-l-gray-300"></div>
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-eye text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="flex flex-col">
                                            <div class="text-sm font-medium text-gray-800">
                                                Shared Teams password with Alexander Marinuk.
                                            </div>
                                            <span class="text-xs font-medium text-gray-500">
                                                5 days ago, 4:07 PM
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start relative">
                                    <div class="w-9 left-0 top-9 absolute bottom-0 translate-x-1/2 border-l border-l-gray-300"></div>
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-trash-square text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="flex flex-col">
                                            <div class="text-sm font-medium text-gray-800">
                                                Deleted Gitlab account.
                                            </div>
                                            <span class="text-xs font-medium text-gray-500">
                                                6 days ago, 10:45 AM
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start relative">
                                    <div class="w-9 left-0 top-9 absolute bottom-0 translate-x-1/2 border-l border-l-gray-300"></div>
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-shield-tick text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="flex flex-col pb-2.5">
                                            <span class="text-sm font-medium text-gray-800">
                                                Enabled two-factor authentication for MS Teams account.
                                            </span>
                                            <span class="text-xs font-medium text-gray-500">
                                                2 days ago, 4:07 PM
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start relative">
                                    <div class="w-9 left-0 top-9 absolute bottom-0 translate-x-1/2 border-l border-l-gray-300"></div>
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-lock-2 text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="flex flex-col">
                                            <div class="text-sm font-medium text-gray-800">
                                                Changed password for Gitlab account.
                                            </div>
                                            <span class="text-xs font-medium text-gray-500">
                                                2 weeks ago, 10:45 AM
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start relative">
                                    <div class="w-9 left-0 top-9 absolute bottom-0 translate-x-1/2 border-l border-l-gray-300"></div>
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-shield-cross text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="grow">
                                            <div class="flex flex-col pb-2.5">
                                                <div class="text-sm font-medium text-gray-700">
                                                    Disabled two-factor authentication for Teams account.
                                                </div>
                                                <span class="text-xs font-medium text-gray-500">
                                                    1 month ago, 11:45 AM
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start relative">
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-trash-square text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 text-md grow">
                                        <div class="flex flex-col">
                                            <div class="text-sm font-medium text-gray-800">
                                                Deleted Binance password.
                                            </div>
                                            <span class="text-xs font-medium text-gray-500">
                                                3 months ago, 4:07 PM
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card grow hidden" id="activity_2024_Mar">
                        <div class="card-header">
                            <h3 class="card-title">
                                Logs
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="flex flex-col">
                                <div class="flex items-start relative">
                                    <div class="w-9 left-0 top-9 absolute bottom-0 translate-x-1/2 border-l border-l-gray-300"></div>
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-lock-2 text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="flex flex-col">
                                            <div class="text-sm font-medium text-gray-800">
                                                Changed password for Figma account.
                                            </div>
                                            <span class="text-xs font-medium text-gray-500">
                                                Today, 9:00 AM
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start relative">
                                    <div class="w-9 left-0 top-9 absolute bottom-0 translate-x-1/2 border-l border-l-gray-300"></div>
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-shield-tick text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="flex flex-col">
                                            <div class="text-sm font-medium text-gray-800">
                                                Enabled two-factor authentication for Figma's account.
                                            </div>
                                            <span class="text-xs font-medium text-gray-500">
                                                2 days ago, 15:45 AM
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start relative">
                                    <div class="w-9 left-0 top-9 absolute bottom-0 translate-x-1/2 border-l border-l-gray-300"></div>
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-trash-square text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="flex flex-col pb-2.5">
                                            <span class="text-sm font-medium text-gray-700">
                                                Deleted Figma password.
                                            </span>
                                            <span class="text-xs font-medium text-gray-500">
                                                3 days ago, 11:45 AM
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start relative">
                                    <div class="w-9 left-0 top-9 absolute bottom-0 translate-x-1/2 border-l border-l-gray-300"></div>
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-shield-cross text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="flex flex-col">
                                            <div class="text-sm font-medium text-gray-800">
                                                Disabled two-factor authentication for Figma account.
                                            </div>
                                            <span class="text-xs font-medium text-gray-500">
                                                5 days ago, 4:07 PM
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start relative">
                                    <div class="w-9 left-0 top-9 absolute bottom-0 translate-x-1/2 border-l border-l-gray-300"></div>
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-shield-cross text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="grow">
                                            <div class="flex flex-col pb-2.5">
                                                <div class="text-sm font-medium text-gray-700">
                                                    Disabled two-factor authentication for Teams account.
                                                </div>
                                                <span class="text-xs font-medium text-gray-500">
                                                    1 month ago, 11:45 AM
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start relative">
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-trash-square text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 text-md grow">
                                        <div class="flex flex-col">
                                            <div class="text-sm font-medium text-gray-800">
                                                Deleted Binance password.
                                            </div>
                                            <span class="text-xs font-medium text-gray-500">
                                                3 months ago, 4:07 PM
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card grow hidden" id="activity_2024_Apr">
                        <div class="card-header">
                            <h3 class="card-title">
                                Logs
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="flex flex-col">
                                <div class="flex items-start relative">
                                    <div class="w-9 left-0 top-9 absolute bottom-0 translate-x-1/2 border-l border-l-gray-300"></div>
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-lock-2 text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="flex flex-col">
                                            <div class="text-sm font-medium text-gray-800">
                                                Changed password for Figma account.
                                            </div>
                                            <span class="text-xs font-medium text-gray-500">
                                                Today, 9:00 AM
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start relative">
                                    <div class="w-9 left-0 top-9 absolute bottom-0 translate-x-1/2 border-l border-l-gray-300"></div>
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-shield-tick text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="flex flex-col">
                                            <div class="text-sm font-medium text-gray-800">
                                                Enabled two-factor authentication for Figma's account.
                                            </div>
                                            <span class="text-xs font-medium text-gray-500">
                                                2 days ago, 15:45 AM
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start relative">
                                    <div class="w-9 left-0 top-9 absolute bottom-0 translate-x-1/2 border-l border-l-gray-300"></div>
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-trash-square text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="flex flex-col pb-2.5">
                                            <span class="text-sm font-medium text-gray-700">
                                                Deleted Figma password.
                                            </span>
                                            <span class="text-xs font-medium text-gray-500">
                                                3 days ago, 11:45 AM
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start relative">
                                    <div class="w-9 left-0 top-9 absolute bottom-0 translate-x-1/2 border-l border-l-gray-300"></div>
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-shield-cross text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="flex flex-col">
                                            <div class="text-sm font-medium text-gray-800">
                                                Disabled two-factor authentication for Figma account.
                                            </div>
                                            <span class="text-xs font-medium text-gray-500">
                                                5 days ago, 4:07 PM
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start relative">
                                    <div class="w-9 left-0 top-9 absolute bottom-0 translate-x-1/2 border-l border-l-gray-300"></div>
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-lock-2 text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="flex flex-col pb-2.5">
                                            <span class="text-sm font-medium text-gray-700">
                                                Changed password for MS Teams account.
                                            </span>
                                            <span class="text-xs font-medium text-gray-500">
                                                5 days ago, 4:07 PM
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start relative">
                                    <div class="w-9 left-0 top-9 absolute bottom-0 translate-x-1/2 border-l border-l-gray-300"></div>
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-shield-cross text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="grow">
                                            <div class="flex flex-col pb-2.5">
                                                <div class="text-sm font-medium text-gray-700">
                                                    Disabled two-factor authentication for Teams account.
                                                </div>
                                                <span class="text-xs font-medium text-gray-500">
                                                    1 month ago, 11:45 AM
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start relative">
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-trash-square text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 text-md grow">
                                        <div class="flex flex-col">
                                            <div class="text-sm font-medium text-gray-800">
                                                Deleted Binance password.
                                            </div>
                                            <span class="text-xs font-medium text-gray-500">
                                                3 months ago, 4:07 PM
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card grow hidden" id="activity_2024_May">
                        <div class="card-header">
                            <h3 class="card-title">
                                Logs
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="flex flex-col">
                                <div class="flex items-start relative">
                                    <div class="w-9 left-0 top-9 absolute bottom-0 translate-x-1/2 border-l border-l-gray-300"></div>
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-lock-2 text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="flex flex-col pb-2.5">
                                            <span class="text-sm font-medium text-gray-700">
                                                Changed password for MS Teams account.
                                            </span>
                                            <span class="text-xs font-medium text-gray-500">
                                                5 days ago, 4:07 PM
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start relative">
                                    <div class="w-9 left-0 top-9 absolute bottom-0 translate-x-1/2 border-l border-l-gray-300"></div>
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-eye text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="flex flex-col">
                                            <div class="text-sm font-medium text-gray-800">
                                                Shared Teams password with Alexander Marinuk.
                                            </div>
                                            <span class="text-xs font-medium text-gray-500">
                                                5 days ago, 4:07 PM
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start relative">
                                    <div class="w-9 left-0 top-9 absolute bottom-0 translate-x-1/2 border-l border-l-gray-300"></div>
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-trash-square text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="flex flex-col">
                                            <div class="text-sm font-medium text-gray-800">
                                                Deleted Gitlab account.
                                            </div>
                                            <span class="text-xs font-medium text-gray-500">
                                                6 days ago, 10:45 AM
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start relative">
                                    <div class="w-9 left-0 top-9 absolute bottom-0 translate-x-1/2 border-l border-l-gray-300"></div>
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-shield-tick text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="flex flex-col pb-2.5">
                                            <span class="text-sm font-medium text-gray-800">
                                                Enabled two-factor authentication for MS Teams account.
                                            </span>
                                            <span class="text-xs font-medium text-gray-500">
                                                2 days ago, 4:07 PM
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start relative">
                                    <div class="w-9 left-0 top-9 absolute bottom-0 translate-x-1/2 border-l border-l-gray-300"></div>
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-lock-2 text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="flex flex-col">
                                            <div class="text-sm font-medium text-gray-800">
                                                Changed password for Gitlab account.
                                            </div>
                                            <span class="text-xs font-medium text-gray-500">
                                                2 weeks ago, 10:45 AM
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start relative">
                                    <div class="w-9 left-0 top-9 absolute bottom-0 translate-x-1/2 border-l border-l-gray-300"></div>
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-shield-cross text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="grow">
                                            <div class="flex flex-col pb-2.5">
                                                <div class="text-sm font-medium text-gray-700">
                                                    Disabled two-factor authentication for Teams account.
                                                </div>
                                                <span class="text-xs font-medium text-gray-500">
                                                    1 month ago, 11:45 AM
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start relative">
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-trash-square text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 text-md grow">
                                        <div class="flex flex-col">
                                            <div class="text-sm font-medium text-gray-800">
                                                Deleted Binance password.
                                            </div>
                                            <span class="text-xs font-medium text-gray-500">
                                                3 months ago, 4:07 PM
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card grow hidden" id="activity_2024_June">
                        <div class="card-header">
                            <h3 class="card-title">
                                Logs
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="flex flex-col">
                                <div class="flex items-start relative">
                                    <div class="w-9 left-0 top-9 absolute bottom-0 translate-x-1/2 border-l border-l-gray-300"></div>
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-lock-2 text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="flex flex-col">
                                            <div class="text-sm font-medium text-gray-800">
                                                Changed password for Figma account.
                                            </div>
                                            <span class="text-xs font-medium text-gray-500">
                                                Today, 9:00 AM
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start relative">
                                    <div class="w-9 left-0 top-9 absolute bottom-0 translate-x-1/2 border-l border-l-gray-300"></div>
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-shield-tick text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="flex flex-col">
                                            <div class="text-sm font-medium text-gray-800">
                                                Enabled two-factor authentication for Figma's account.
                                            </div>
                                            <span class="text-xs font-medium text-gray-500">
                                                2 days ago, 15:45 AM
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start relative">
                                    <div class="w-9 left-0 top-9 absolute bottom-0 translate-x-1/2 border-l border-l-gray-300"></div>
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-trash-square text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="flex flex-col pb-2.5">
                                            <span class="text-sm font-medium text-gray-700">
                                                Deleted Figma password.
                                            </span>
                                            <span class="text-xs font-medium text-gray-500">
                                                3 days ago, 11:45 AM
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start relative">
                                    <div class="w-9 left-0 top-9 absolute bottom-0 translate-x-1/2 border-l border-l-gray-300"></div>
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-shield-cross text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="flex flex-col">
                                            <div class="text-sm font-medium text-gray-800">
                                                Disabled two-factor authentication for Figma account.
                                            </div>
                                            <span class="text-xs font-medium text-gray-500">
                                                5 days ago, 4:07 PM
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start relative">
                                    <div class="w-9 left-0 top-9 absolute bottom-0 translate-x-1/2 border-l border-l-gray-300"></div>
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-lock-2 text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="flex flex-col pb-2.5">
                                            <span class="text-sm font-medium text-gray-700">
                                                Changed password for MS Teams account.
                                            </span>
                                            <span class="text-xs font-medium text-gray-500">
                                                5 days ago, 4:07 PM
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start relative">
                                    <div class="w-9 left-0 top-9 absolute bottom-0 translate-x-1/2 border-l border-l-gray-300"></div>
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-eye text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="flex flex-col">
                                            <div class="text-sm font-medium text-gray-800">
                                                Shared Teams password with Alexander Marinuk.
                                            </div>
                                            <span class="text-xs font-medium text-gray-500">
                                                5 days ago, 4:07 PM
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start relative">
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-trash-square text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 text-md grow">
                                        <div class="flex flex-col">
                                            <div class="text-sm font-medium text-gray-800">
                                                Deleted Binance password.
                                            </div>
                                            <span class="text-xs font-medium text-gray-500">
                                                3 months ago, 4:07 PM
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card grow hidden" id="activity_2024_July">
                        <div class="card-header">
                            <h3 class="card-title">
                                Logs
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="flex flex-col">
                                <div class="flex items-start relative">
                                    <div class="w-9 left-0 top-9 absolute bottom-0 translate-x-1/2 border-l border-l-gray-300"></div>
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-lock-2 text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="flex flex-col">
                                            <div class="text-sm font-medium text-gray-800">
                                                Changed password for Figma account.
                                            </div>
                                            <span class="text-xs font-medium text-gray-500">
                                                Today, 9:00 AM
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start relative">
                                    <div class="w-9 left-0 top-9 absolute bottom-0 translate-x-1/2 border-l border-l-gray-300"></div>
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-eye text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="flex flex-col">
                                            <div class="text-sm font-medium text-gray-800">
                                                Shared Teams password with Alexander Marinuk.
                                            </div>
                                            <span class="text-xs font-medium text-gray-500">
                                                5 days ago, 4:07 PM
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start relative">
                                    <div class="w-9 left-0 top-9 absolute bottom-0 translate-x-1/2 border-l border-l-gray-300"></div>
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-trash-square text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="flex flex-col">
                                            <div class="text-sm font-medium text-gray-800">
                                                Deleted Gitlab account.
                                            </div>
                                            <span class="text-xs font-medium text-gray-500">
                                                6 days ago, 10:45 AM
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start relative">
                                    <div class="w-9 left-0 top-9 absolute bottom-0 translate-x-1/2 border-l border-l-gray-300"></div>
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-shield-tick text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="flex flex-col pb-2.5">
                                            <span class="text-sm font-medium text-gray-800">
                                                Enabled two-factor authentication for MS Teams account.
                                            </span>
                                            <span class="text-xs font-medium text-gray-500">
                                                2 days ago, 4:07 PM
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start relative">
                                    <div class="w-9 left-0 top-9 absolute bottom-0 translate-x-1/2 border-l border-l-gray-300"></div>
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-lock-2 text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="flex flex-col">
                                            <div class="text-sm font-medium text-gray-800">
                                                Changed password for Gitlab account.
                                            </div>
                                            <span class="text-xs font-medium text-gray-500">
                                                2 weeks ago, 10:45 AM
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start relative">
                                    <div class="w-9 left-0 top-9 absolute bottom-0 translate-x-1/2 border-l border-l-gray-300"></div>
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-shield-cross text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="grow">
                                            <div class="flex flex-col pb-2.5">
                                                <div class="text-sm font-medium text-gray-700">
                                                    Disabled two-factor authentication for Teams account.
                                                </div>
                                                <span class="text-xs font-medium text-gray-500">
                                                    1 month ago, 11:45 AM
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start relative">
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-trash-square text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 text-md grow">
                                        <div class="flex flex-col">
                                            <div class="text-sm font-medium text-gray-800">
                                                Deleted Binance password.
                                            </div>
                                            <span class="text-xs font-medium text-gray-500">
                                                3 months ago, 4:07 PM
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card grow hidden" id="activity_2024_Aug">
                        <div class="card-header">
                            <h3 class="card-title">
                                Logs
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="flex flex-col">
                                <div class="flex items-start relative">
                                    <div class="w-9 left-0 top-9 absolute bottom-0 translate-x-1/2 border-l border-l-gray-300"></div>
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-lock-2 text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="flex flex-col">
                                            <div class="text-sm font-medium text-gray-800">
                                                Changed password for Figma account.
                                            </div>
                                            <span class="text-xs font-medium text-gray-500">
                                                Today, 9:00 AM
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start relative">
                                    <div class="w-9 left-0 top-9 absolute bottom-0 translate-x-1/2 border-l border-l-gray-300"></div>
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-shield-tick text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="flex flex-col">
                                            <div class="text-sm font-medium text-gray-800">
                                                Enabled two-factor authentication for Figma's account.
                                            </div>
                                            <span class="text-xs font-medium text-gray-500">
                                                2 days ago, 15:45 AM
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start relative">
                                    <div class="w-9 left-0 top-9 absolute bottom-0 translate-x-1/2 border-l border-l-gray-300"></div>
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-trash-square text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="flex flex-col pb-2.5">
                                            <span class="text-sm font-medium text-gray-700">
                                                Deleted Figma password.
                                            </span>
                                            <span class="text-xs font-medium text-gray-500">
                                                3 days ago, 11:45 AM
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start relative">
                                    <div class="w-9 left-0 top-9 absolute bottom-0 translate-x-1/2 border-l border-l-gray-300"></div>
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-shield-cross text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="flex flex-col">
                                            <div class="text-sm font-medium text-gray-800">
                                                Disabled two-factor authentication for Figma account.
                                            </div>
                                            <span class="text-xs font-medium text-gray-500">
                                                5 days ago, 4:07 PM
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start relative">
                                    <div class="w-9 left-0 top-9 absolute bottom-0 translate-x-1/2 border-l border-l-gray-300"></div>
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-lock-2 text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="flex flex-col pb-2.5">
                                            <span class="text-sm font-medium text-gray-700">
                                                Changed password for MS Teams account.
                                            </span>
                                            <span class="text-xs font-medium text-gray-500">
                                                5 days ago, 4:07 PM
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start relative">
                                    <div class="w-9 left-0 top-9 absolute bottom-0 translate-x-1/2 border-l border-l-gray-300"></div>
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-eye text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="flex flex-col">
                                            <div class="text-sm font-medium text-gray-800">
                                                Shared Teams password with Alexander Marinuk.
                                            </div>
                                            <span class="text-xs font-medium text-gray-500">
                                                5 days ago, 4:07 PM
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start relative">
                                    <div class="w-9 left-0 top-9 absolute bottom-0 translate-x-1/2 border-l border-l-gray-300"></div>
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-trash-square text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="flex flex-col">
                                            <div class="text-sm font-medium text-gray-800">
                                                Deleted Gitlab account.
                                            </div>
                                            <span class="text-xs font-medium text-gray-500">
                                                6 days ago, 10:45 AM
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start relative">
                                    <div class="w-9 left-0 top-9 absolute bottom-0 translate-x-1/2 border-l border-l-gray-300"></div>
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-shield-tick text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="flex flex-col pb-2.5">
                                            <span class="text-sm font-medium text-gray-800">
                                                Enabled two-factor authentication for MS Teams account.
                                            </span>
                                            <span class="text-xs font-medium text-gray-500">
                                                2 days ago, 4:07 PM
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start relative">
                                    <div class="w-9 left-0 top-9 absolute bottom-0 translate-x-1/2 border-l border-l-gray-300"></div>
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-lock-2 text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="flex flex-col">
                                            <div class="text-sm font-medium text-gray-800">
                                                Changed password for Gitlab account.
                                            </div>
                                            <span class="text-xs font-medium text-gray-500">
                                                2 weeks ago, 10:45 AM
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start relative">
                                    <div class="w-9 left-0 top-9 absolute bottom-0 translate-x-1/2 border-l border-l-gray-300"></div>
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-shield-cross text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="grow">
                                            <div class="flex flex-col pb-2.5">
                                                <div class="text-sm font-medium text-gray-700">
                                                    Disabled two-factor authentication for Teams account.
                                                </div>
                                                <span class="text-xs font-medium text-gray-500">
                                                    1 month ago, 11:45 AM
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start relative">
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-trash-square text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 text-md grow">
                                        <div class="flex flex-col">
                                            <div class="text-sm font-medium text-gray-800">
                                                Deleted Binance password.
                                            </div>
                                            <span class="text-xs font-medium text-gray-500">
                                                3 months ago, 4:07 PM
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col gap-2.5" data-tabs="true">
                        <a class="btn btn-sm text-gray-600 hover:text-primary tab-active:bg-primary-light tab-active:text-primary active" data-tab-toggle="#activity_2024_Jan" href="#">
                            January 2024
                        </a>
                        <a class="btn btn-sm text-gray-600 hover:text-primary tab-active:bg-primary-light tab-active:text-primary" data-tab-toggle="#activity_2024_Feb" href="#">
                            February 2024
                        </a>
                        <a class="btn btn-sm text-gray-600 hover:text-primary tab-active:bg-primary-light tab-active:text-primary" data-tab-toggle="#activity_2024_Mar" href="#">
                            March 2024
                        </a>
                        <a class="btn btn-sm text-gray-600 hover:text-primary tab-active:bg-primary-light tab-active:text-primary" data-tab-toggle="#activity_2024_Apr" href="#">
                            April 2024
                        </a>
                        <a class="btn btn-sm text-gray-600 hover:text-primary tab-active:bg-primary-light tab-active:text-primary" data-tab-toggle="#activity_2024_May" href="#">
                            May 2024
                        </a>
                        <a class="btn btn-sm text-gray-600 hover:text-primary tab-active:bg-primary-light tab-active:text-primary" data-tab-toggle="#activity_2024_June" href="#">
                            June 2024
                        </a>
                        <a class="btn btn-sm text-gray-600 hover:text-primary tab-active:bg-primary-light tab-active:text-primary" data-tab-toggle="#activity_2024_July" href="#">
                            July 2024
                        </a>
                        <a class="btn btn-sm text-gray-600 hover:text-primary tab-active:bg-primary-light tab-active:text-primary" data-tab-toggle="#activity_2024_Aug" href="#">
                            August 2024
                        </a>
                    </div>
                </div>
                <!-- end: activity -->
            </div>
            <!-- end: container -->
        </main>
    </div>
@endsection

@section('js')
    <script>
        changeBreadcrumbs('General', 'Activity');
    </script>
@endsection
