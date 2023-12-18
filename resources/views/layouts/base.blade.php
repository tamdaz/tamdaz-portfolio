<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
		<title>@yield('title')</title>
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="description" content="Portfolio de Tamda Zohir, étudiant de première année de BTS SIO (Services Informatiques aux Organisations) option SLAM (Solutions Logicielles et Applications Métiers)." />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,300,1,200" />

		<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/shaheenhyderk/slideon@1.0.2/slideon.css"/>
		<script src="https://cdn.jsdelivr.net/gh/shaheenhyderk/slideon@1.0.2/slideon.js"></script>

		<link rel="shortcut icon" href="/icon.jpg" type="image/jpg" />

        @yield('head')
        @livewireStyles

		@vite('resources/css/app.css')
	</head>
    <body class="w-full h-screen flex flex-col overflow-x-hidden dark:bg-neutral-900 dark:text-white">
		<noscript>Veuillez activer le JavaScript pour permettre de rendre ce site fonctionnel.</noscript>
		@yield('body')
        @livewireScripts
		@include('tools.ga')
    </body>
</html>
