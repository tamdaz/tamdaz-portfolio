@vite('resources/js/header.js')

{{-- Start menu for mobile --}}
<div class="fixed z-30 w-screen h-screen backdrop-blur-lg hidden transition-all" id="menu_mobile">
    <button id="btn_close_menu" class="material-symbols-outlined scale-150 absolute top-10 right-10">close</button>
    <div class="flex flex-col justify-center items-center h-full">
        <a class="py-2 text-2xl hover:scale-90 transition-transform outline-none px-8" href="{{ route('pages.bts-sio') }}">BTS SIO</a>
        <a class="py-2 text-2xl hover:scale-90 transition-transform outline-none px-8" href="{{ route('pages.certifications') }}">Certifications</a>
        <a class="py-2 text-2xl hover:scale-90 transition-transform outline-none px-8" href="{{ route('pages.tw') }}">Veille technologique</a>
        <a class="py-2 text-2xl hover:scale-90 transition-transform outline-none px-8" href="{{ route('pages.blogs') }}">Blogs</a>
        <a class="py-2 text-2xl hover:scale-90 transition-transform outline-none px-8" href="{{ route('pages.contact') }}">Contact</a>
    </div>
</div>
{{-- End menu for mobile --}}

<header id="header" class="w-screen transition-all duration-200 px-12 py-2 md:py-5 flex flex-row items-center fixed z-20">
    <a href="{{ route('pages.home') }}" data-turbolinks="false" class="font-bold text-xl">tamdaz</a>
    <div class="flex grow"></div>
    <label>
        <input type="checkbox" id="changeThemeHeader" class="slideon slideon-auto mx-4" />
    </label>
    <div class="hidden lg:block">
        <a href="{{ route('pages.bts-sio') }}" class="px-8">BTS SIO</a>
        <a href="{{ route('pages.certifications') }}" class="px-8">Certifications</a>
        <a href="{{ route('pages.tw') }}" class="px-8">Veille technologique</a>
        <a href="{{ route('pages.blogs') }}" class="px-8">Blogs</a>
        <x-button route="{{ route('pages.contact') }}" type="contained">Contact</x-button>
    </div>
    <button class="lg:hidden border dark:border-neutral-800 dark:active:border-neutral-900 p-1" id="btn_open_menu">
        <i class="material-symbols-outlined p-2">menu</i>
    </button>
</header>
