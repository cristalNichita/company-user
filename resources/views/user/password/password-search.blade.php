@if(count($results) > 0)
    <div class="scrollable-y-auto border-r border-l border-b pb-3.5" data-scrollable="true" data-scrollable-max-height="auto" data-scrollable-offset="1000px" style="max-height: 323px;">
        <div class="flex flex-col px-5 gap-3">
            @foreach($results as $result)
                <div class="flex items-center flex-wrap gap-2 cursor-pointer hover:bg-primary-light">
                    <div class="flex items-center grow gap-2.5">
                        <img alt="" class="size-9 shrink-0" src="{{ $result->favicon_url }}">
                        <div class="flex flex-col">
                            <a class="text-sm font-semibold text-gray-900 hover:text-primary-active mb-px">
                                {{ $result->name }}
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif
