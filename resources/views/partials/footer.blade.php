<footer class="bg-neutral-50 dark:bg-neutral-950 border-t dark:border-neutral-800 mt-10 py-8 select-none">
    <div class="flex flex-cols items-center justify-end dark:divide-neutral-700 w-[1050px] m-auto">
        <span>Tamdaz - {{ date("Y") }}</span>
        <div class="flex-grow"></div>
        <div class="flex flex-cols gap-4 pl-4 py-2 border-r pr-4">
            <a class="hover:underline" href="{{ route('pages.contact') }}">Contact</a>
            <a class="hover:underline" href="{{ route('pages.sitemap') }}">Plan du site</a>
        </div>
        <div class="flex flex-cols gap-4 pl-4">
            <a href="https://github.com/tamdaz">
                <img class="dark:invert" width="30px" src="/img/social_networks/github.svg" alt="github" />
            </a>
            <a href="https://linkedin.com">
                <img width="30px" src="/img/social_networks/linkedin.svg" alt="linkedin" />
            </a>
            <a href="https://youtube.com/@nexovitality">
                <img width="30px" src="/img/social_networks/youtube.svg" alt="youtube" />
            </a>
        </div>
    </div>
</footer>
