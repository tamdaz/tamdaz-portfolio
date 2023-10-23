<div>
    <div class="flex flex-cols gap-2 my-4">
        <input
            placeholder="Rechercher du contenu"
            wire:model="search" type="search"
            class="flex-grow outline-none px-4 py-2" />
        @if(count($categories) !== 0)
            <select class="flex-grow px-4" wire:model="category">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        @endif
        <button wire:click="toggleButtonDate" class="px-12 border dark:border-neutral-800 bg-white active:bg-neutral-100 dark:bg-neutral-900 active:dark:bg-neutral-800">
            {{ $dateOrder === "DESC" ? "Les plus récents" : "Les plus anciens" }}
        </button>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @forelse ($items as $item)
            <x-card
                type="media"
                :title="$item->title"
                :src="$item->$thumbName"
                :category="$item->category->name ?? ''"
                :description="$item->description"
                route="{{ route($routePrefix . '.show', ['id' => $item['id']]) }}" />
        @empty
            @if(!empty($query))
                <span class="text-center col-span-2">Recherche non trouvée</span>
            @endif
            @if(!empty($search))
                <span class="text-center col-span-2">Recherche non trouvée</span>
            @endif
        @endforelse
    </div>
    <div class="py-6">
        {{ $items->links() }}
    </div>
</div>
