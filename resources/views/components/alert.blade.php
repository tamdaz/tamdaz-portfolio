@switch($type)
    @case('info')
        <div class="w-full my-4 flex flex-row items-center p-4 bg-blue-100 dark:bg-blue-950 border border-blue-200 dark:border-blue-800 text-blue-800 dark:text-blue-100 rounded-lg">
            <i class="material-symbols-outlined pr-4 text-3xl">info</i>
            <div class="flex flex-col">
                <span class="block font-bold text-xl">{{ $primary }}</span>
                <span class="block">{{ $secondary }}</span>
            </div>
        </div>
    @break

    @case('success')
        <div class="w-full my-4 flex flex-row items-center p-4 bg-green-100 dark:bg-green-950 border border-green-200 dark:border-green-800 text-green-800 dark:text-green-100 rounded-lg">
            <i class="material-symbols-outlined pr-4 text-3xl">check</i>
            <div class="flex flex-col">
                <span class="block font-bold text-xl">{{ $primary }}</span>
                <span class="block">{{ $secondary }}</span>
            </div>
        </div>
    @break

    @case('warn')
        <div class="w-full my-4 flex flex-row items-center p-4 bg-yellow-100 dark:bg-yellow-950 border border-yellow-200 dark:border-yellow-800 text-yellow-800 dark:text-yellow-100 rounded-lg">
            <i class="material-symbols-outlined pr-4 text-3xl">warning</i>
            <div class="flex flex-col">
                <span class="block font-bold text-xl">{{ $primary }}</span>
                <span class="block">{{ $secondary }}</span>
            </div>
        </div>
    @break

    @case('error')
        <div class="w-full my-4 flex flex-row items-center p-4 bg-red-100 dark:bg-red-950 border border-red-200 dark:border-red-800 text-red-800 dark:text-red-100 rounded-lg">
            <i class="material-symbols-outlined pr-4 text-3xl">error</i>
            <div class="flex flex-col">
                <span class="block font-bold text-xl">{{ $primary }}</span>
                <span class="block">{{ $secondary }}</span>
            </div>
        </div>
    @break
    
    @case('debug')
        <div class="w-full my-4 flex flex-row items-center p-4 bg-neutral-100 dark:bg-black dark:text-white border border-neutral-200 dark:border-neutral-800 text-neutral-800 rounded-lg">
            <i class="material-symbols-outlined pr-4 text-3xl">construction</i>
            <div class="flex flex-col">
                <span class="block font-bold text-xl">{{ $primary }}</span>
                <span class="block">{{ $secondary }}</span>
            </div>
        </div>
    @break
@endswitch
