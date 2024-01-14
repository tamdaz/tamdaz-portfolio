<button
    @if($route != null) onclick="window.location.href = '{{ $route }}'" @endif
    @if($type_form != null) type="{{ $type_form }}'" @endif
    class="tz-button-{{ $type }}">
    <span class="flex flex-row justify-center">
        @if ($hasIcon)
            <i class="material-symbols-outlined pr-2">info</i>
        @endif
        <span>{{ $slot }}</span>
    </span>
</button>