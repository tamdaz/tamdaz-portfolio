@switch($type)
    @case('contained')
        <button
            @if($route != null) onclick="window.location.href = '{{ $route }}'" @endif
            @if($type_form != null) type="{{ $type_form }}'" @endif
            class="bg-green-600 hover:bg-green-700 active:bg-green-800 text-white py-2 px-8 rounded-full {{ $class }}">
            <span class="flex flex-row justify-center">
                @if ($hasIcon)
                    <i class="material-symbols-outlined pr-2">info</i>
                @endif
                <span>{{ $slot }}</span>
            </span>
        </button>
        @break
    @case('outlined')
        <button
            @if($route != null) onclick="window.location.href = '{{ $route }}'" @endif
            @if($type_form != null) type="{{ $type_form }}'" @endif
            class="border dark:border-neutral-700 hover:bg-green-500/20 active:bg-green-600/30 py-2 px-8 rounded-full {{ $class }}">
            <span class="flex flex-row justify-center">
                @if ($hasIcon)
                    <i class="material-symbols-outlined pr-2">info</i>
                @endif
                <span>{{ $slot }}</span>
            </span>
        </button>
        @break
    @case('text')
        <button
            @if($route != null) onclick="window.location.href = '{{ $route }}'" @endif
            @if($type_form != null) type="{{ $type_form }}'" @endif
            class="hover:bg-green-500/20 active:bg-green-600/30 py-2 px-8 rounded-full {{ $class }}">
            <span class="flex flex-row justify-center">
                @if ($hasIcon)
                <i class="material-symbols-outlined pr-2">info</i>
                @endif
                <span>{{ $slot }}</span>
            </span>
        </button>
        @break
@endswitch