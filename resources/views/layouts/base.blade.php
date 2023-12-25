<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
		<title>@yield('title')</title>
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,300,1,200" />

		<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/shaheenhyderk/slideon@master/slideon.css" />
		<script src="https://cdn.jsdelivr.net/gh/shaheenhyderk/slideon@master/slideon.js"></script>

		<link rel="shortcut icon" href="/icon.jpg" type="image/jpg" />

        @yield('head')

		@include('meta::manager')

		<script>
            if (localStorage.getItem('theme') === "dark") {
                document.documentElement.classList.add("dark")
            }
		</script>

		@vite('resources/js/theme.js')
		@vite('resources/css/app.css')
	</head>
    <body class="w-full h-screen flex flex-col overflow-x-hidden dark:bg-neutral-900 dark:text-white">
		<noscript>
			<div class="w-screen h-screen flex justify-center items-center px-8">
				<x-alert
					type="error"
					primary="JavaScript désactivé"
					secondary="S'il vous plait, veuillez activer le JavaScript dans votre navigateur pour rendre ce site fonctionnel." />
			</div>
		</noscript>
		@yield('body')
		<script>
            let slideon = new Slideon();
            slideon.load();

            if (localStorage.getItem('theme') === "light") {
                changeThemeHeader.checked = false;
                changeThemeFooter.checked = false;
            } else {
                changeThemeHeader.checked = true;
                changeThemeFooter.checked = true;
            }
		</script>
		@include('tools.ga')
    </body>
</html>
