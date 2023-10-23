<div class="w-full divide-y dark:divide-neutral-800 border dark:border-neutral-800 overflow-hidden rounded-lg my-6">
    @forelse ($lists as $list)
        <div class="flex flex-cols overflow-hidden py-3 rounded-lg">
            <div class="flex justify-center items-center px-12">
                {{ $list['id'] }}
            </div>
            <div class="flex-grow flex flex-col justify-center col-span-6">
                <span class="block font-bold text-xl">{{ $list[$primaryName] }}</span>
                @if($secondaryName !== "")
                    <span class="block">{{ $list[$secondaryName] }}</span>
                @endif
            </div>
            @if($showStatus === true)
                <div class="flex flex-col justify-center">
                    @if($list['is_published'])
                        <span class="bg-green-500 text-white p-2 mx-14 rounded-md">Publié</span>
                    @else
                        <span class="bg-red-500 text-white p-2 mx-14 rounded-md">Non publié</span>
                    @endif
                </div>
            @endif
            <div class="flex justify-center items-center mr-10">
                @if($list['is_published'] === true)
                    <a
                        href="{{ route("pages." . $type . "s") }}/{{ $list['id'] }}"
                        class="hover:underline hover:cursor-pointer py-2 px-4 mx-1">
                        Aperçu
                    </a>
                @endif

                @if($type === "categorie") {{-- categorie (category) => categories --}}
                    <a
                        href="{{ route("admin.categories.edit", ["category" => $list['id']]) }}"
                        class="hover:underline hover:cursor-pointer py-2 px-4 mx-1">
                        Modifier
                    </a>
                    <form action="{{ route("admin.categories.destroy", ["category" => $list['id']]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button
                            type="submit"
                            class="hover:underline hover:cursor-pointer py-2 px-4 mx-1 text-red-500">
                            Supprimer
                        </button>
                    </form>
                @else
                    <a
                        href="{{ route("admin." . $type . "s.edit", [$type => $list['id']]) }}"
                        class="hover:underline hover:cursor-pointer py-2 px-4 mx-1">
                        Modifier
                    </a>
                    <form action="{{ route("admin." . $type . "s.destroy", [$type => $list['id']]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button
                            type="submit"
                            class="hover:underline hover:cursor-pointer py-2 px-4 mx-1 text-red-500">
                            Supprimer
                        </button>
                    </form>
                @endif
            </div>
        </div>
    @empty
        <span class="block px-4 py-2">Pour l'instant, rien n'a été créé(e)</span>
    @endforelse
</div>