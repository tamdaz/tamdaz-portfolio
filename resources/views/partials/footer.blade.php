<footer class="bg-neutral-50 dark:bg-neutral-950 border-t dark:border-neutral-800 mt-10 py-8 select-none">
    <div class="flex flex-col md:flex-row items-center justify-end dark:divide-neutral-700 px-16 lg:w-[1100px] m-auto">
        <span>Tamda Zohir - {{ date("Y") }}</span>
        <div class="flex-grow"></div>
        <div class="flex flex-col md:flex-row items-center">
            <div class="flex flex-cols gap-4 pl-4 py-2 md:border-r dark:border-r-neutral-800 pr-4">
                <label>
                    Changer de thème :
                    <input type="checkbox" id="changeThemeFooter" class="slideon slideon-auto">
                </label>
                <a class="hover:underline" href="{{ route('pages.contact') }}">Contact</a>
                <a class="hover:underline" href="{{ route('pages.sitemap') }}">Plan du site</a>
            </div>
            <div class="flex flex-cols gap-4 pl-4">
                <a href="https://github.com/tamdaz">
                    <img class="dark:invert" width="30px" src="/img/social_networks/github.svg" alt="github" />
                </a>
            </div>
        </div>
    </div>
</footer>

@vite('resources/js/theme.js')

<script>
    let changeThemeHeader = document.getElementById('changeThemeHeader');
    let changeThemeFooter = document.getElementById('changeThemeFooter');

    if (!localStorage.getItem('theme')) {
        localStorage.setItem('theme', 'light')
    } else {
        if (localStorage.getItem('theme') === "dark") {
            changeThemeHeader.checked = true;
            changeThemeFooter.checked = true;
            document.documentElement.classList.add("dark")
        } else {
            changeThemeHeader.checked = false;
            changeThemeFooter.checked = false;
        }
    }
</script>