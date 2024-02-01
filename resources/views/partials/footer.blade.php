<footer class="bg-neutral-50 dark:bg-neutral-950 border-t dark:border-neutral-800 py-6">
    <div class="items-center justify-end dark:divide-neutral-700 px-16 lg:w-[1100px] m-auto">
        <div class="flex flex-row items-center">
            <span>&copy; Tamda Zohir - {{ date("Y") }}</span>
            <div class="flex-grow"></div>
            <label>
                <input type="checkbox" id="changeThemeFooter" class="slideon slideon-auto">
            </label>
            <div class="flex flex-col md:flex-row items-center">
                <div class="flex flex-cols gap-4 pl-4">
                    <a href="https://github.com/tamdaz">
                        <img class="dark:invert" width="30px" src="/img/social_networks/github.svg" alt="github" />
                    </a>
                </div>
            </div>
        </div>
        <nav class="flex flex-col md:flex-row justify-center items-center md:space-x-4 space-y-2 md:space-y-0 mt-6">
            <a class="opacity-50">API</a>
            <a class="hover:underline" href="{{ route('pages.contact') }}">Contact</a>
            <a class="hover:underline" href="{{ route('pages.sitemap') }}">Plan du site</a>
        </nav>
    </div>
</footer>
