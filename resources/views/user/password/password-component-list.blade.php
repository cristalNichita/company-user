@foreach($passwords as $password)
    <div class="card p-7">
        <div class="flex items-center flex-wrap justify-between gap-5">
            <div class="flex items-center gap-3.5">
                <div class="flex items-center justify-center size-14 shrink-0 rounded-lg bg-gray-100">
                    <img alt="" class="" src="{{ $password->favicon_url }}"/>
                </div>
                <div class="flex flex-col">
                    <button
                        class="text-lg text-left font-semibold text-gray-900 hover:text-primary-active mb-px open-edit-modal"
                        data-id="{{ $password->id }}"
                        data-password="{{ $password->master_password_required }}"
                        data-mfa="{{ $password->mfa_required }}"
                    >
                        {{ $password->name }}
                    </button>
                    <span class="text-sm font-medium text-gray-600">
                                            {{ $password->account_name }}
                                        </span>
                </div>
            </div>
            <div class="flex items-center flex-wrap gap-5 lg:gap-14">
                <div class="flex items-center flex-wrap gap-5 lg:gap-14">
                                        <span class="badge badge-primary badge-outline">
                                            Private
                                        </span>
                    <div class="progress-status" data-password="{{ $password->password }}">
                        <div class="progress h-1.5 w-36">
                            <div class="progress-bar">
                            </div>
                        </div>
                        <div class="text-right progress-text text-sm">Medium</div>
                    </div>
                    <div>
                        <div class="text-gray-600 font-medium text-sm">Created:</div>
                        <div class="text-sm font-semibold text-gray-700">{{ date('M d', strtotime($password->created_at)) }}</div>
                    </div>
                    <div>
                        <a target="_blank" href="{{ $password->url }}">
                            <i class="ki-outline ki-exit-right-corner text-2xl text-gray-700"></i>
                        </a>
                    </div>
                </div>
                <div class="flex items-center gap-2 lg:gap-20">
                    <div class="menu" data-menu="true">
                        <div class="menu-item" data-menu-item-offset="0, 10px" data-menu-item-placement="bottom-end" data-menu-item-toggle="dropdown" data-menu-item-trigger="click|lg:click">
                            <button class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                <i class="ki-filled ki-dots-vertical text-xl">
                                </i>
                            </button>
                            <div class="menu-dropdown menu-default w-full max-w-[200px]" data-menu-dismiss="true">
                                <div class="menu-item">
                                    <button class="menu-link" onclick="copy('{{ $password->account_name }}')">
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
                                    <button class="menu-link" data-modal-toggle="#share_password_modal">
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
                                    <input type="hidden" name="id" value="{{ $password->id }}">
                                    <div class="menu-item">
                                        <button class="menu-link save-changes" type="button">
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
        </div>
    </div>
@endforeach
