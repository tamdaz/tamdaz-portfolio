<div class="border dark:border-neutral-800 rounded-lg overflow-hidden relative">
    <div
        class="absolute w-full h-full z-10 transition opacity-0 hover:opacity-100 p-4 bg-white dark:bg-neutral-900 flex flex-col justify-center items-center">
        <span class="block text-center font-bold text-3xl">{{ $title }}</span>
        <span class="block text-center">{{ $description }}</span>
    </div>
    <img class="hover:opacity-0 transition" src="{{ $src }}" width="100%" height="100%" alt="img_skill" />
</div>