<div>
    @if(App::hasDebugModeEnabled())
        <x-alert
            type="debug"
            primary="Débug"
            secondary="Recherche: {{ $search }}"
        />
    @endif
    <div class="my-4">
        <div class="mb-1">
            <label>
                <input
                    placeholder="Rechercher..."
                    wire:model="search" type="search"
                    name="search"
                    class="w-full outline-none px-4 py-2"/>
            </label>
        </div>
        <div class="flex gap-1">
            <label class="flex-grow">
                <select name="category" class="w-full" wire:model="category">
                    <option value="0">Tous les catégories</option>
                    @if(count($categories) !== 0)
                        @if (!empty($categories))
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        @endif
                    @endif
                </select>
            </label>
            <button wire:click="toggleButtonDate" class="px-12 border dark:border-neutral-800 bg-white active:bg-neutral-100 dark:bg-neutral-900 active:dark:bg-neutral-800">
                {{ $dateOrder === "DESC" ? "Les plus récents" : "Les plus anciens" }}
            </button>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @forelse ($items as $item)
            <x-card
                type="media"
                :title="$item->title"
                :src="optional($item->thumbnail)->url"
                :category="$item->category->name ?? ''"
                :description="$item->description"
                :url="route('pages.blogs.show', ['blog' => $item])" />
        @empty
            <span class="text-center col-span-2">Pas de résultats</span>
        @endforelse
    </div>
    <div class="mt-4">
        {{ $items->links() }}
    </div>
</div>
