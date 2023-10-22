<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
		<title>@yield('title')</title>
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,300,1,200" />

        @yield('head')
        @livewireStyles
		@vite('resources/css/app.css')
	</head>
    <body class="w-full h-screen flex flex-col overflow-x-hidden dark:bg-neutral-900 dark:text-white">
        @yield('body')
        @livewireScripts
		<script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false" data-turbo-eval="false"></script>
    </body>
</html>
