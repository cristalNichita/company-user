@extends('user.layouts.front')
@section('title', 'Activity Logs')

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
                                            <div>Recent Activity</div>
                                            <div class="text-gray-600 text-1.5xl">Discover your recent activity on the platform</div>
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
                    <div class="card grow" id="activity_2024">
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
                                        <i class="ki-filled ki-people text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="flex flex-col">
                                            <div class="text-sm font-medium text-gray-800">
                                                Posted a new article
                                                <a class="text-sm font-medium link" href="html/demo1/public-profile/profiles/blogger.html">
                                                    Top 10 Tech Trends
                                                </a>
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
                                        <i class="ki-filled ki-entrance-left text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="flex flex-col">
                                            <div class="text-sm font-medium text-gray-800">
                                                I had the privilege of interviewing an industry expert for an
                                                <a class="text-sm font-medium link" href="html/demo1/public-profile/profiles/blogger.html">
                                                    upcoming blog post
                                                </a>
                                            </div>
                                            <span class="text-xs font-medium text-gray-500">
                                                2 days ago, 4:07 PM
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start relative">
                                    <div class="w-9 left-0 top-9 absolute bottom-0 translate-x-1/2 border-l border-l-gray-300"></div>
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-code text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="flex flex-col pb-2.5">
                                            <span class="text-sm font-medium text-gray-700">
                                                Jenny attended a Nature Photography Immersion workshop
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
                                        <i class="ki-filled ki-share text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="flex flex-col">
                                            <div class="text-sm font-medium text-gray-800">
                                                I couldn't resist sharing a sneak peek of our
                                                <a class="text-sm font-medium link" href="html/demo1/public-profile/profiles/blogger.html">
                                                    upcoming content
                                                </a>
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
                                        <i class="ki-filled ki-calendar-tick text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="flex flex-col pb-2.5">
                                            <span class="text-sm font-medium text-gray-700">
                                                Jenny attended a webinar on new product features.
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
                                        <i class="ki-filled ki-coffee text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="flex flex-col">
                                            <div class="text-sm font-medium text-gray-800">
                                                Reaching the milestone of
                                                <a class="text-sm font-medium link" href="html/demo1/public-profile/profiles/feeds.html">
                                                    10,000 followers
                                                </a>
                                                on the blog was a dream come true
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
                                        <i class="ki-filled ki-rocket text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="flex flex-col">
                                            <div class="text-sm font-medium text-gray-800">
                                                Completed phase one of client project ahead of schedule.
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
                                        <i class="ki-filled ki-directbox-default text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="flex flex-col pb-2.5">
                                            <span class="text-sm font-medium text-gray-800">
                                                Attending the virtual blogging conference was an enriching experience
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
                                        <i class="ki-filled ki-design-1 text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="flex flex-col">
                                            <div class="text-sm font-medium text-gray-800">
                                                Onboarded a talented designer to our creative team, adding valuable expertise to upcoming projects.
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
                                        <i class="ki-filled ki-code text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="grow">
                                            <div class="flex flex-col pb-2.5">
                                                <div class="text-sm font-medium text-gray-700">
                                                    A new team
                                                    <a class="text-sm font-semibold text-gray-900 hover:text-primary-active" href="#">
                                                        Market Mavericks
                                                    </a>
                                                    joined community
                                                </div>
                                                <span class="text-xs font-medium text-gray-500">
                                                    1 month ago, 11:45 AM
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start relative">
                                    <div class="w-9 left-0 top-9 absolute bottom-0 translate-x-1/2 border-l border-l-gray-300"></div>
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-like-shapes text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="flex flex-col">
                                            <div class="text-sm font-medium text-gray-800">
                                                Hosted a virtual
                                                <a class="text-sm font-medium link" href="html/demo1/public-profile/profiles/creator.html">
                                                    team-building event
                                                </a>
                                                , fostering collaboration and strengthening bonds among team members.
                                            </div>
                                            <span class="text-xs font-medium text-gray-500">
                                                1 month ago, 13:56 PM
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start relative">
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-cup text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 text-md grow">
                                        <div class="flex flex-col">
                                            <div class="text-sm font-medium text-gray-800">
                                                We recently
                                                <a class="text-sm font-medium link" href="html/demo1/public-profile/profiles/nft.html">
                                                    celebrated
                                                </a>
                                                the blog's 1-year anniversary
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
                    <div class="card grow hidden" id="activity_2023">
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
                                        <i class="ki-filled ki-people text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="flex flex-col">
                                            <div class="text-sm font-medium text-gray-800">
                                                Posted a new article
                                                <a class="text-sm font-medium link" href="html/demo1/public-profile/profiles/blogger.html">
                                                    Top 10 Tech Trends
                                                </a>
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
                                        <i class="ki-filled ki-share text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="flex flex-col">
                                            <div class="text-sm font-medium text-gray-800">
                                                I couldn't resist sharing a sneak peek of our
                                                <a class="text-sm font-medium link" href="html/demo1/public-profile/profiles/blogger.html">
                                                    upcoming content
                                                </a>
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
                                        <i class="ki-filled ki-coffee text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="flex flex-col">
                                            <div class="text-sm font-medium text-gray-800">
                                                Reaching the milestone of
                                                <a class="text-sm font-medium link" href="html/demo1/public-profile/profiles/feeds.html">
                                                    10,000 followers
                                                </a>
                                                on the blog was a dream come true
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
                                        <i class="ki-filled ki-design-1 text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="flex flex-col">
                                            <div class="text-sm font-medium text-gray-800">
                                                Onboarded a talented designer to our creative team, adding valuable expertise to upcoming projects.
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
                                        <i class="ki-filled ki-like-shapes text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 mb-7 text-md grow">
                                        <div class="flex flex-col">
                                            <div class="text-sm font-medium text-gray-800">
                                                Hosted a virtual
                                                <a class="text-sm font-medium link" href="html/demo1/public-profile/profiles/creator.html">
                                                    team-building event
                                                </a>
                                                , fostering collaboration and strengthening bonds among team members.
                                            </div>
                                            <span class="text-xs font-medium text-gray-500">
                                                1 month ago, 13:56 PM
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start relative">
                                    <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                        <i class="ki-filled ki-cup text-base">
                                        </i>
                                    </div>
                                    <div class="pl-2.5 text-md grow">
                                        <div class="flex flex-col">
                                            <div class="text-sm font-medium text-gray-800">
                                                We recently
                                                <a class="text-sm font-medium link" href="html/demo1/public-profile/profiles/nft.html">
                                                    celebrated
                                                </a>
                                                the blog's 1-year anniversary
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
                        <a class="btn btn-sm text-gray-600 hover:text-primary tab-active:bg-primary-light tab-active:text-primary active" data-tab-toggle="#activity_2024" href="#">
                            2024
                        </a>
                        <a class="btn btn-sm text-gray-600 hover:text-primary tab-active:bg-primary-light tab-active:text-primary" data-tab-toggle="#activity_2023" href="#">
                            2023
                        </a>
                    </div>
                </div>
                <!-- end: activity -->
            </div>
            <!-- end: container -->
        </main>
    </div>
@endsection
