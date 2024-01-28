@switch($type)
    @case('normal')
        <div class="border dark:border-neutral-800 overflow-hidden rounded-lg mb-4">
            <div class="flex flex-col p-4">
                <span class="font-bold text-3xl mb-1">{{ $title }}</span>
                <span>{{ $description }}</span>
            </div>
        </div>
        @break
    @case('media')
        <div class="border dark:border-neutral-800 overflow-hidden rounded-lg relative">
            <div class="row-span-3 bg-cover bg-center aspect-video" style="background-image: url('{{ $src }}')"></div>
            <div class="flex flex-row px-6 py-4 relative">
                <div class="flex flex-col w-full">
                    <span class="font-bold text-xl mb-1">{{ htmlspecialchars_decode($title) }}</span>
                    <span>{{ Str::limit(htmlspecialchars_decode($description), 42) }}</span>
                    @if($category !== "")
                        <div class="pt-4 mb-2">
                            <span class="py-2 px-4 bg-green-700 text-white rounded-full">{{ $category }}</span>
                        </div>
                    @endif
                </div>
                <a href="{{ $url }}" class="pr-6 transition-all hover:translate-x-2 active:scale-75 flex items-center justify-center">
                    <i class="material-symbols-outlined scale-150">arrow_forward</i>
                </a>
            </div>
        </div>
        @break
@endswitch
