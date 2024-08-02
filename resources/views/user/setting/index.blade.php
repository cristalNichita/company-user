@extends('user.layouts.front')
@section('title', 'Settings')

@section('content')
    <div class="wrapper flex grow flex-col">
        <main class="grow content pt-5" id="content" role="content">
            <div class="container-fixed" id="content_container">
            </div>

            <div class="container-fixed">
                <div class="flex grow gap-5 lg:gap-7.5">
                    <div class="hidden lg:block w-[230px] shrink-0">
                        <div
                            class="w-[230px]" data-sticky="true" data-sticky-animation="true"
                            data-sticky-class="fixed top-[calc(var(--tw-header-height)+1.875rem)] z-10 left-auto"
                            data-sticky-name="scrollspy" data-sticky-offset="200"
                        >
                            <div
                                class="flex flex-col grow relative before:absolute before:left-[11px] before:top-0 before:bottom-0 before:border-l before:border-gray-200"
                                data-scrollspy="true" data-scrollspy-offset="80px|lg:110px"
                                data-scrollspy-target="body"
                            >
                                <a
                                    class="flex items-center rounded-lg pl-2.5 pr-2.5 py-2.5 gap-1.5 active border border-transparent text-2sm font-medium text-gray-700 hover:text-primary scrollspy-active:bg-secondary-active scrollspy-active:text-primary dark:hover:bg-coal-300 dark:hover:border-gray-100 hover:rounded-lg dark:scrollspy-active:bg-coal-300 dark:scrollspy-active:border-gray-100"
                                    data-scrollspy-anchor="true" href="#change_name"
                                >
                                    <span class="flex w-1.5 relative before:absolute before:top-0 before:left-px before:size-1.5 before:rounded-full before:-translate-x-2/4 before:-translate-y-2/4 scrollspy-active:before:bg-primary">
                                    </span>
                                    Change Name
                                </a>
                                <a class="flex items-center rounded-lg pl-2.5 pr-2.5 py-2.5 gap-1.5 border border-transparent text-2sm font-medium text-gray-700 hover:text-primary scrollspy-active:bg-secondary-active scrollspy-active:text-primary dark:hover:bg-coal-300 dark:hover:border-gray-100 hover:rounded-lg dark:scrollspy-active:bg-coal-300 dark:scrollspy-active:border-gray-100"
                                    data-scrollspy-anchor="true" href="#auth_email"
                                >
                                    <span class="flex w-1.5 relative before:absolute before:top-0 before:left-px before:size-1.5 before:rounded-full before:-translate-x-2/4 before:-translate-y-2/4 scrollspy-active:before:bg-primary">
                                    </span>
                                    Email
                                </a>
                                <a
                                    class="flex items-center rounded-lg pl-2.5 pr-2.5 py-2.5 gap-1.5 border border-transparent text-2sm font-medium text-gray-700 hover:text-primary scrollspy-active:bg-secondary-active scrollspy-active:text-primary dark:hover:bg-coal-300 dark:hover:border-gray-100 hover:rounded-lg dark:scrollspy-active:bg-coal-300 dark:scrollspy-active:border-gray-100"
                                    data-scrollspy-anchor="true" href="#auth_password"
                                >
                                    <span class="flex w-1.5 relative before:absolute before:top-0 before:left-px before:size-1.5 before:rounded-full before:-translate-x-2/4 before:-translate-y-2/4 scrollspy-active:before:bg-primary">
                                    </span>
                                    Change Master Password
                                </a>
                                <a
                                    class="flex items-center rounded-lg pl-2.5 pr-2.5 py-2.5 gap-1.5 border border-transparent text-2sm font-medium text-gray-700 hover:text-primary scrollspy-active:bg-secondary-active scrollspy-active:text-primary dark:hover:bg-coal-300 dark:hover:border-gray-100 hover:rounded-lg dark:scrollspy-active:bg-coal-300 dark:scrollspy-active:border-gray-100"
                                    data-scrollspy-anchor="true" href="#vault_settings"
                                >
                                    <span class="flex w-1.5 relative before:absolute before:top-0 before:left-px before:size-1.5 before:rounded-full before:-translate-x-2/4 before:-translate-y-2/4 scrollspy-active:before:bg-primary">
                                    </span>
                                    Vault Settings
                                </a>
                                <a
                                    class="flex items-center rounded-lg pl-2.5 pr-2.5 py-2.5 gap-1.5 border border-transparent text-2sm font-medium text-gray-700 hover:text-primary scrollspy-active:bg-secondary-active scrollspy-active:text-primary dark:hover:bg-coal-300 dark:hover:border-gray-100 hover:rounded-lg dark:scrollspy-active:bg-coal-300 dark:scrollspy-active:border-gray-100"
                                    data-scrollspy-anchor="true" href="#delete_account"
                                >
                                    <span class="flex w-1.5 relative before:absolute before:top-0 before:left-px before:size-1.5 before:rounded-full before:-translate-x-2/4 before:-translate-y-2/4 scrollspy-active:before:bg-primary">
                                    </span>
                                    Danger Zone
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col items-stretch grow gap-5 lg:gap-7.5">
                        <div class="card pb-2.5">
                            <div class="card-header" id="change_name">
                                <h3 class="card-title">
                                    Change Name
                                </h3>
                            </div>
                            <form action="{{ route('updateFullname') }}" method="POST">
                                @csrf
                                <div class="card-body-third grid gap-5">
                                    <div class="w-full">
                                        <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                            <label class="form-label flex items-center gap-1 max-w-56">
                                                Name
                                            </label>
                                            <input class="input" type="text" name="fullname" value="{{ $user->fullname }}" required/>
                                        </div>
                                    </div>
                                    <div class="flex justify-end pt-2.5">
                                        <button type="button" class="btn btn-primary save-changes">
                                            Save Changes
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card pb-2.5">
                            <div class="card-header" id="auth_email">
                                <h3 class="card-title">
                                    Change Email
                                </h3>
                            </div>
                            <form action="{{ route('updateEmailAddress') }}" method="POST">
                                @csrf
                                <div class="card-body-third grid gap-5 pt-7.5">
                                    <div class="w-full">
                                        <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                            <label class="form-label flex items-center gap-1 max-w-56">
                                                Email
                                            </label>
                                            <div class="flex flex-col tems-start grow gap-7.5 w-full">
                                                <input name="email" class="input" type="text" value="{{ $user->email }}"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex justify-end">
                                        <button type="button" class="btn btn-primary save-changes">
                                            Save Changes
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card">
                            <div class="card-header" id="auth_password">
                                <h3 class="card-title">
                                    Change Master Password
                                </h3>
                            </div>
                            <form action="{{ route('changePassword') }}" method="POST">
                                <div class="card-body grid gap-3.5">
                                    @csrf
                                    <div class="badge border-dashed badge-outline badge-warning justify-start border-2 max-w-[700px] py-3.5 ">
                                        <i class="ki-duotone ki-information-3 text-3xl">
                                        </i>
                                        <div class="ml-5">
                                            <div class="modal-title text-gray-800 ">Warning</div>
                                            <span class="font-normal text-gray-600">Proceeding will log you out of your current session, requiring you to log back in. Active sessions on other devices may continue to remain active for up to one hour.</span>
                                        </div>
                                    </div>
                                    <div class="w-full">
                                        <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                            <label class="form-label max-w-56">
                                                Current Master Password
                                            </label>
                                            <div class="input max-w-72 font-normal" data-toggle-password="true">
                                                <input placeholder="**********" type="password" name="password"/>
                                                <div class="btn btn-icon" data-toggle-password-trigger="true">
                                                    <i class="ki-outline ki-eye toggle-password-active:hidden">
                                                    </i>
                                                    <i class="ki-outline ki-eye-slash hidden toggle-password-active:block">
                                                    </i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full">
                                        <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                            <label class="form-label max-w-56">
                                                New Master Password
                                            </label>
                                            <div class="input max-w-72 font-normal" data-toggle-password="true">
                                                <input placeholder="**********" type="password" name="new_password"/>
                                                <div class="btn btn-icon" data-toggle-password-trigger="true">
                                                    <i class="ki-outline ki-eye toggle-password-active:hidden">
                                                    </i>
                                                    <i class="ki-outline ki-eye-slash hidden toggle-password-active:block">
                                                    </i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full">
                                        <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                            <label class="form-label max-w-56">
                                                Confirm New Master Password
                                            </label>
                                            <div class="input max-w-72" data-toggle-password="true">
                                                <input placeholder="**********" type="password" name="confirm_password"/>
                                                <div class="btn btn-icon" data-toggle-password-trigger="true">
                                                    <i class="ki-outline ki-eye toggle-password-active:hidden">
                                                    </i>
                                                    <i class="ki-outline ki-eye-slash hidden toggle-password-active:block">
                                                    </i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full">
                                        <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                            <label class="form-label max-w-56">
                                                Master Password Hint
                                            </label>
                                            <div class="min-w-72">
                                                <input class="input" placeholder="TestHint123" type="text" name="password_hint" value="{{ $user->password_hint }}"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex justify-start pt-2.5">
                                        <button type="button" class="btn btn-primary save-changes">
                                            Change Master Password
                                        </button>
                                    </div>
                                    <hr>
                                    <div class="text-gray-500 text-sm">
                                        <b>Important:</b> Master passwords should be 12 character minimum.
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card">
                            <div class="card-header" id="vault_settings">
                                <h3 class="card-title">
                                    Vault Settings
                                </h3>
                            </div>
                            <form action="" method="POST">
                                <div class="card-body lg:py-7.5 lg:gap-7.5 gap-5">
                                    <div class="flex flex-col gap-5">
                                        <div class="text-sm text-gray-600">
                                            <b>Vault Timeout</b>
                                            <div class="text-gray-500">Time after which your vault will take the vault timeout action.</div>
                                            <select name="" class="input max-w-72 cursor-pointer mt-4">
                                                <option value="">5 minutes</option>
                                                <option value="">10 minutes</option>
                                                <option value="">15 minutes</option>
                                                <option value="">30 minutes</option>
                                                <option value="">45 minutes</option>
                                            </select>
                                        </div>

                                        <div class="text-sm text-gray-600 mt-7">
                                            <b>Vault Timeout Action</b>
                                            <div class="text-gray-500">Action when wil be executed when your vault will take the vault timeout action.</div>
                                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-3.5 lg:gap-7.5 mt-2.5 max-w-[600px]">
                                                <label class="max-h-36 flex cursor-pointer items-center bg-center border border-gray-300 rounded-xl border-dashed has-[:checked]:border-primary has-[:checked]:bg-op-primary has-[:checked]:text-primary">
                                                    <div class="flex rounded-xl py-5 px-5">
                                                        <input class="radio" name="sso_option" type="radio" value="1">
                                                        <div class="ml-2.5">
                                                            <div class="text-md text-gray-800 radio-title">Lock</div>
                                                            <div class="text-sm text-gray-500 text-gray-600">Master password is required to access your vault again.</div>
                                                        </div>
                                                    </div>
                                                </label>
                                                <label class="max-h-36 flex cursor-pointer items-center bg-center border border-gray-300 rounded-xl border-dashed has-[:checked]:border-primary has-[:checked]:bg-op-primary has-[:checked]:text-primary">
                                                    <div class="flex rounded-xl py-5 px-5">
                                                        <input class="radio" name="sso_option" type="radio" value="1">
                                                        <div class="ml-2.5">
                                                            <div class="text-md text-gray-800 radio-title">Log out</div>
                                                            <span class="text-sm text-gray-500 text-gray-600">Re-authentication is required to access your vault again.</span>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex justify-end pt-2.5">
                                        <button type="button" class="btn btn-primary save-changes">
                                            Save Changes
                                        </button>
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

        changeBreadcrumbs('General', 'Settings');
    </script>
@endsection
