<div class="tz-alert-{{ $type }}">
    <i class="material-symbols-outlined pr-4 text-3xl">{{ $getIcon($type) }}</i>
    <div class="flex flex-col">
        <span class="block font-bold text-xl">{{ $primary }}</span>
        <span class="block">{{ $secondary }}</span>
    </div>
</div>