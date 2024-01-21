@vite('resources/js/header.js')

{{-- Start menu for mobile --}}
<div class="fixed z-30 w-screen h-screen hidden transition-transform animate-menu-mobile" id="menu_mobile">
    <button id="btn_close_menu" class="z-10 material-symbols-outlined scale-150 absolute top-10 right-10">close</button>
    <div class="flex flex-col justify-center items-center h-full">
        <a class="tz-menu-item" href="{{ route('pages.bts-sio') }}">BTS SIO</a>
        <a class="tz-menu-item" href="{{ route('pages.certifications') }}">Certifications</a>
        <a class="tz-menu-item" href="{{ route('pages.tw') }}">Veille technologique</a>
        <a class="tz-menu-item" href="{{ route('pages.reports') }}">Comptes-rendus</a>
        <a class="tz-menu-item" href="{{ route('pages.blogs') }}">Blogs</a>
        <a class="tz-menu-item" href="{{ route('pages.contact') }}">Contact</a>
    </div>
</div>
{{-- End menu for mobile --}}

<header id="header" class="tz-header">
    <a href="{{ route('pages.home') }}" data-turbolinks="false" class="font-bold text-xl">tamdaz</a>
    <div class="flex grow"></div>
    <label>
        <input type="checkbox" id="changeThemeHeader" class="slideon slideon-auto mx-4" />
    </label>
    <div class="hidden lg:block">
        <x-dropdown id="btssio" name="BTS SIO">
            <a href="{{ route('pages.bts-sio') }}" class="tz-dropdown-menu-item">Présentation</a>
            <a href="{{ route('pages.certifications') }}" class="tz-dropdown-menu-item">Certifications</a>
            <a href="{{ route('pages.tw') }}" class="tz-dropdown-menu-item">Veille technologique</a>
            <a href="{{ route('pages.reports') }}" class="tz-dropdown-menu-item">Comptes-rendus</a>
            <a class="block px-6 py-3 opacity-50">Note de synthèse</a>
        </x-dropdown>
        <a href="{{ route('pages.blogs') }}" class="p-8">Blogs</a>
        <x-button route="{{ route('pages.contact') }}" type="contained">Contact</x-button>
    </div>
    <button class="tz-menu-button" id="btn_open_menu">
        <i class="material-symbols-outlined p-2">menu</i>
    </button>
</header>
