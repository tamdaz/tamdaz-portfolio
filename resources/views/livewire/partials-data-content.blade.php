<div>
    <div class="grid grid-cols-4 gap-2 my-4">
        <input
            placeholder="Rechercher du contenu"
            wire:model.debounce.500ms="search" type="search"
            class="col-span-3 outline-none px-4 py-2 w-full" />
        <button wire:click="toggleButtonDate" class="border dark:border-neutral-800 dark:bg-neutral-900 active:dark:bg-neutral-800">
            {{ $dateOrder === "DESC" ? "Les plus récents" : "Les plus anciens" }}
        </button>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @forelse ($items as $item)
            <x-card
                type="media"
                title="{{ $item['title'] }}"
                description="{{ $item['description'] }}"
                src="{{ $item[$thumbName] }}"
                route="{{ route($routePrefix . '.show', ['id' => $item['id']]) }}" />
        @empty
            @if(!empty($query))
                <span class="text-center col-span-2">Recherche non trouvée</span>
            @endif
        @endforelse
    </div>
    <div class="py-6">
        {{ $items->links() }}
    </div>
</div>
