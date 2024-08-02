@foreach($passwords as $password)
    <div class="card p-7.5">
        <div class="flex items-center justify-between mb-3 lg:mb-6">
            <div class="flex items-center justify-center size-[50px] rounded-lg bg-gray-100">
                <img alt="" src="{{ $password->favicon_url }}"/>
            </div>
            <div class="flex">
                <span class="badge badge-primary badge-outline">Private</span>
                <div class="menu" data-menu="true">
                    <div
                        class="menu-item" data-menu-item-offset="0, 10px"
                        data-menu-item-placement="bottom-end" data-menu-item-toggle="dropdown"
                        data-menu-item-trigger="click|lg:click"
                    >
                        <button class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                            <i class="ki-filled ki-dots-vertical">
                            </i>
                        </button>
                        <div class="menu-dropdown menu-default w-full max-w-[200px]" data-menu-dismiss="true">
                            <div class="menu-item">
                                <a class="menu-link" href="{{ $password->url }}" target="_blank">
                                                        <span class="menu-icon">
                                                            <i class="ki-outline ki-exit-right-corner text-gray-600"></i>
                                                        </span>
                                    <span class="menu-title">
                                                            Launch
                                                        </span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <button type="button" class="menu-link" onclick="copy('{{ $password->account_name }}')">
                                                        <span class="menu-icon">
                                                            <i class="ki-outline ki-copy">
                                                            </i>
                                                        </span>
                                    <span class="menu-title">
                                                            Copy Email
                                                        </span>
                                </button>
                            </div>
                            <div class="menu-item">
                                <button
                                    class="menu-link copy-password" type="button"
                                    data-id="{{ $password->id }}"
                                    data-password="{{ $password->master_password_required }}"
                                    data-mfa="{{ $password->mfa_required }}">
                                                        <span class="menu-icon">
                                                            <i class="ki-outline ki-copy">
                                                            </i>
                                                        </span>
                                    <span class="menu-title">
                                                            Copy Password
                                                        </span>
                                </button>
                            </div>
                            <div class="menu-item">
                                <button class="menu-link" data-modal-toggle="#report_user_modal">
                                                        <span class="menu-icon">
                                                            <i class="ki-outline ki-exit-up">
                                                            </i>
                                                        </span>
                                    <span class="menu-title">
                                                            Share Password
                                                        </span>
                                </button>
                            </div>
                            <form action="{{ route('deletePassKey') }}" method="POST">
                                @csrf
                                <div class="menu-item">
                                    <input type="hidden" name="id" value="{{ $password->id }}">
                                    <button type="button" class="menu-link save-changes">
                                                            <span class="menu-icon">
                                                                <i class="ki-outline ki-trash" style="color: #F8285A">
                                                                </i>
                                                            </span>
                                        <span class="menu-title">
                                                                Delete
                                                            </span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col mb-3 lg:mb-6">
            <button
                class="text-left text-lg font-semibold text-gray-900 hover:text-primary-active mb-px open-edit-modal"
                data-id="{{ $password->id }}"
                data-password="{{ $password->master_password_required }}"
                data-mfa="{{ $password->mfa_required }}"
            >{{ $password->name }}
            </button>
            <span class="text-sm font-medium text-gray-600">{{ $password->account_name }}</span>
        </div>
        <div class="flex items-center gap-5 mb-3.5 lg:mb-7">
                                <span class="text-sm font-medium text-gray-500">
                                    Created:
                                    <span class="text-sm font-semibold text-gray-700">{{ date('M d', strtotime($password->created_at)) }}</span>
                                </span>
            <span class="text-sm font-medium text-gray-500">
                                    Used:
                                    <span class="text-sm font-semibold text-gray-700">Dec 21</span>
                                </span>
        </div>
        <div class="progress-status" data-password="{{ $password->password }}">
            <div class="progress h-1.5">
                <div class="progress-bar">
                </div>
            </div>
            <div class="text-right text-warning progress-text text-sm">Medium</div>
        </div>
    </div>
@endforeach
