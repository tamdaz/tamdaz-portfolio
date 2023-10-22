@switch($type)
    @case('contained')
        <button
            @if($route != null) onclick="window.location.href = '{{ $route }}'" @endif
            @if($type_form != null) type="{{ $type_form }}'" @endif
            class="bg-green-500 hover:bg-green-600 active:bg-green-700 text-white py-2 px-8 rounded-full {{ $class }}">
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
            class="border hover:bg-green-50 active:bg-green-100 py-2 px-8 rounded-full {{ $class }}">
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
            class="border-green-500 hover:bg-green-100 active:bg-green-200 py-2 px-8 rounded-full {{ $class }}">
            <span class="flex flex-row justify-center">
                @if ($hasIcon)
                <i class="material-symbols-outlined pr-2">info</i>
                @endif
                <span>{{ $slot }}</span>
            </span>
        </button>
        @break
@endswitch