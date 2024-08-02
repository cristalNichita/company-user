@extends('user.layouts.front')
@section('title', 'Settings-View')

@section('content')
    <div class="wrapper flex grow flex-col">
        <main class="grow content pt-5" id="content" role="content">
            <div class="container-fixed" id="content_container">
            </div>
            <!-- begin: container -->
            <div class="container-fixed">
                <div class="flex flex-nowrap items-center lg:items-end justify-between dark:border-b-coal-100 gap-6">
                    <div class="grid">
                        <div class="scrollable-x-auto">
                            <div class="menu gap-3" data-menu="true">
                                <div class="menu-item border-b-2 border-b-transparent menu-item-active:border-b-primary menu-item-here:border-b-primary" data-menu-item-placement="bottom-start" data-menu-item-toggle="dropdown" data-menu-item-trigger="click">
                                    <div class="menu-link gap-1.5 pb-2 lg:pb-4 px-2" tabindex="0">
                                        <div class="text-2xl text-gray-900">
                                            <div class="font-medium">Settings</div>
                                            <div class="text-gray-600 text-lg">Central Hub for Personal Customization</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end: container -->
            <div class="container-fixed">
                <div class="flex grow gap-5 lg:gap-7.5">
                    <div class="flex flex-col items-stretch grow gap-5 lg:gap-7.5">
                        <div class="card min-w-full">
                            <div class="card-header">
                                <div class="flex-col gap-1.5">
                                    <h3 class="card-title">
                                        Personal Information
                                    </h3>
                                    <div class="text-gray-600 text-sm">Central Hub for Personal Customization</div>
                                </div>
                                <div class="flex items-center gap-2">
                                    <a class="btn btn-primary font-normal" href="{{ route('settingForm') }}">
                                        Edit
                                    </a>
                                </div>
                            </div>
                            <div class="card-table scrollable-x-auto pb-3">
                                <table class="table align-middle text-sm text-gray-500" id="general_info_table">
                                    <tr>
                                        <td class="min-w-56">
                                            Name
                                        </td>
                                        <td class="min-w-48 w-full text-gray-700">
                                            {{ $user->fullname }}
                                        </td>
                                        <td class="min-w-16 text-center">
                                            <a class="btn btn-sm btn-icon btn-clear btn-primary" href="#">
                                                <i class="ki-outline ki-notepad-edit">
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Email
                                        </td>
                                        <td class="text-gray-700">
                                            yaroslav.lanovyi@nikcode.net
                                        </td>
                                        <td class="text-center">
                                            <a class="btn btn-sm btn-icon btn-clear btn-primary" href="#">
                                                <i class="ki-outline ki-notepad-edit">
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Password
                                        </td>
                                        <td class="text-gray-700">
                                            Password was last changed on 01.08.24
                                        </td>
                                        <td class="text-center">
                                            <a class="btn btn-sm btn-icon btn-clear btn-primary" href="#">
                                                <i class="ki-outline ki-notepad-edit">
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <div class="flex-col gap-1.5">
                                    <h3 class="card-title">
                                        Vault timeout Action
                                    </h3>
                                    <div class="text-gray-600 text-sm">Action when will be executed when your vault will take the vault timeout action.</div>
                                </div>
                                <div class="flex items-center gap-2">
                                    <button type="button" class="btn btn-primary choose-mfa-btn font-normal">
                                        Edit
                                    </button>
                                </div>
                            </div>
                            <form action="" method="POST">
                                <div class="card-body lg:py-7.5 lg:gap-7.5 gap-5">
                                    <div class="flex flex-col gap-5">
                                        <div class="text-sm text-gray-600">
                                            <b>Vault Timeout</b>
                                            <div class="text-gray-500 pb-2.5">Time after which your vault will take the vault timeout action.</div>
                                            <div class="max-w-72">
                                                <input class="input" disabled="disabled" name="email" placeholder="Enter Length" type="text" value="15 minutes"/>
                                            </div>
                                        </div>
                                        <div class="text-sm text-gray-600 mt-7">
                                            <b>Vault Timeout Action</b>
                                            <div class="text-gray-500">Action when wil be executed when your vault will take the vault timeout action.</div>
                                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 lg:gap-7.5 mt-2.5 max-w-[60%]">
                                                <label class="card p-5 lg:p-7.5 lg:pt-7 cursor-pointer has-[:checked]:border-primary has-[:checked]:bg-op-primary has-[:checked]:text-primary">
                                                    <div class="flex flex-col gap-4">
                                                        <div class="flex items-center justify-between gap-2">
                                                            <i class="ki-filled ki-cloud-change text-2xl link">
                                                            </i>
                                                        </div>
                                                        <div class="flex flex-col gap-3">
                                                            <span class="text-base font-semibold leading-none text-gray-900">
                                                                Log Out
                                                            </span>
                                                            <span class="text-2sm font-medium text-gray-600 leading-5">
                                                                Re-authentication is required to access your vault again.
                                                            </span>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card border-dashed border-danger border-2 mb-10">
                            <div class="card-header" id="delete_account">
                                <h3 class="card-title">
                                    Danger Zone
                                </h3>
                            </div>
                            <div class="card-body lg:py-7.5 lg:gap-7.5 gap-5">
                                <div class="flex flex-col gap-5">
                                    <div class="text-2sm font-medium text-gray-700">
                                        Careful, These actions are not reversible!
                                    </div>
                                </div>
                                <div class="flex justify-start gap-2.5 pt-7">
                                    <form action="{{ route('logout') }}" method="GET">
                                        @csrf
                                        <button type="button" class="btn btn-danger save-changes">
                                            Deauthorize session
                                        </button>
                                    </form>
                                    <form action="{{ route('purgeVault') }}" method="POST">
                                        @csrf
                                        <button type="button" class="btn btn-danger save-changes">
                                            Purge Vault
                                        </button>
                                    </form>
                                    <form action="{{ route('deleteAccount') }}" method="POST">
                                        @csrf
                                        <button type="button" class="btn btn-danger save-changes">
                                            Delete Account
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection

@section('js')
    <script>
        $('form').on('keydown', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault();
                return false;
            }
        });
    </script>
@endsection
