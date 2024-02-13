<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @wireUiScripts
    @filamentStyles
    @vite('resources/css/app.css')
</head>

<body class="font-sans text-gray-900 antialiased relative">
    <img src="{{ asset('images/bg1.jpg') }}" class="fixed top-0 left-0 h-full w-full object-cover opacity-10"
        alt="">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div>
            <a href="/">
                <x-application-logo class="w-24 h-24 rounded-full fill-current text-gray-500" />
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white relative shadow-md overflow-hidden sm:rounded-lg">
            <h1 class="font-bold text-2xl text-center text-main">JIMROCK</h1>
            <h1 class="text-center font-semibold text-gray-500">DORMS & APARTMENTS</h1>

            {{ $slot }}
        </div>
    </div>
    @filamentScripts
    @vite('resources/js/app.js')
</body>

</html>
