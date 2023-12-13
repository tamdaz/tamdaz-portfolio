<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
		<title>@yield('title')</title>
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="description" content="Tamda Zohir, étudiant de BTS SIO (Services Informatiques aux Organisations)."/>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,300,1,200" />

        @yield('head')
        @livewireStyles
		@vite('resources/css/app.css')

		<script>
            if (!localStorage.getItem('theme')) {
                localStorage.setItem('theme', 'dark')
            } else {
                if (localStorage.getItem('theme') === "dark") {
                    document.documentElement.classList.add("dark")
                }
            }
		</script>
	</head>
    <body class="w-full h-screen flex flex-col overflow-x-hidden dark:bg-neutral-900 dark:text-white">
        @yield('body')
        @livewireScripts

		<script>
            document.querySelector('#changeTheme').addEventListener('click', () => {
                if (localStorage.getItem('theme') === "dark") {
                    localStorage.setItem('theme', 'light')
                } else {
                    localStorage.setItem('theme', 'dark')
                }

                document.documentElement.classList.toggle("dark")
            })
		</script>
    </body>
</html>
