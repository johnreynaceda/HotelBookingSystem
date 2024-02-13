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

    <!-- Scripts -->
    @wireUiScripts
    @filamentStyles
    @vite('resources/css/app.css')
</head>

<body class="font-sans antialiased relative">
    <img src="{{ asset('images/bg1.jpg') }}" class="fixed top-0 left-0 h-full w-full object-cover opacity-5"
        alt="">
    <div class=" relative ">
        <div class="w-full  2xl:px-40">
            <div x-data="{ open: false }"
                class="relative flex flex-col w-full p-5 mx-auto  md:items-center md:justify-between md:flex-row ">
                <div class="flex flex-row items-center justify-between lg:justify-start">
                    <a class=" tracking-tight text-black uppercase focus:outline-none focus:ring " href="/">
                        <div class="flex space-x-2 items-center">
                            <img src="{{ asset('images/hotel_logo.jpg') }}" class="h-20 w-20 rounded-full"
                                alt="">
                            <div>
                                <h1 class="font-bold lg:text-xl text-yellow-600 text-lg">JIMROCK</h1>
                                <h1 class="lg:text-sm leading-3 text-gray-700 text-sm">DORMS & APARTMENTS</h1>
                            </div>
                        </div>
                    </a>
                    <button @click="open = !open"
                        class="inline-flex items-center justify-center p-2 text-gray-400 hover:text-black focus:outline-none focus:text-black md:hidden">
                        <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16">
                            </path>
                            <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <x-shared.navbar />
            </div>
        </div>

        <main class="2xl:mx-auto 2xl:max-w-7xl mx-5 2xl:my-10 my-5  relative">
            <header class="font-bold 2xl:text-3xl text-2xl uppercase text-main font-riot">Reservation</header>
            <div class="2xl:mt-10 mt-5">
                <livewire:reservation />
            </div>
        </main>
    </div>
    </div>
    <footer class="border-t bg-main">
        <div class="px-4  mx-auto max-w-7xl sm:px-6 lg:px-16">
            <div
                class="flex flex-col items-start justify-between pt-16 pb-6 gap-y-12 lg:flex-row lg:items-center lg:py-16">
                <div>
                    <div class="flex items-center text-black">
                        <div>
                            <p class=" leading-6 text-white font-riot text-2xl uppercase">
                                JIMROCK
                            </p>
                            <p class="mt-1 text-sm text-white">Dorms & Apartments</p>
                        </div>
                    </div>

                </div>
                <div
                    class="relative flex items-center self-stretch p-4 -mx-4 transition-colors group  sm:self-auto sm:rounded-2xl lg:mx-0 lg:self-auto lg:p-6">
                    <div class="relative flex items-center justify-center flex-none w-24 h-24 bg-black rounded-xl">
                        <img src="{{ asset('images/hotel_logo.jpg') }}" class="rounded-xl" alt="">
                    </div>
                    <div class="ml-8 lg:w-64">
                        <p class="text-base font-semibold text-white">
                            <a href="#_"><span class="absolute inset-0 sm:rounded-2xl"></span>Stay
                                updated</a>
                        </p>
                        <p class="mt-1 text-sm text-gray-300 hover:text-blue-600">
                            Follow us for social media for news and updates
                        </p>
                    </div>
                </div>
            </div>
            <div
                class="flex flex-col items-center pt-8 pb-12 border-t border-gray-200 md:flex-row-reverse md:justify-between md:pt-6">
                <div class="max-w-xl">
                    <form class="flex flex-col items-center justify-center max-w-sm mx-auto" action="">

                    </form>
                </div>
                <p class="mt-6 text-sm text-white md:mt-0">
                    © Copyright
                    <!-- -->2022
                    <!-- -->. All rights reserved.
                </p>
            </div>
        </div>
    </footer>

    @filamentScripts
    @vite('resources/js/app.js')
</body>

</html>
