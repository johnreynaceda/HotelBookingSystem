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
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
                <nav :class="{ 'flex': open, 'hidden': !open }"
                    class="flex-col items-center flex-grow hidden md:pb-0 md:flex md:justify-end md:flex-row">


                    <div class="inline-flex items-center gap-2 list-none lg:ml-auto">
                        <a class="px-2 py-2 text-sm text-gray-500 lg:px-6 md:px-3 hover:text-main" href="#">
                            Home
                        </a>
                        <a class="px-2 py-2 text-sm text-gray-500 lg:px-6 md:px-3 hover:text-main lg:ml-auto"
                            href="#">
                            About
                        </a>

                        <a class="px-2 py-2 text-sm text-gray-500 lg:px-6 md:px-3 hover:text-main" href="#">
                            Blog
                        </a>


                        <a href="{{ route('login') }}"
                            class="inline-flex items-center justify-center px-4 py-2 text-sm font-semibold text-white bg-main rounded-full group focus:outline-none focus-visible:outline-2 focus-visible:outline-offset-2 hover:bg-main active:bg-main active:text-white focus-visible:outline-black">
                            Sign In
                        </a>
                    </div>
                </nav>
            </div>
        </div>
        <div
            class="mx-auto 2xl:mx-40 bg-gradient-to-br from-black via-main to-gray-100 rounded-3xl overflow-hidden shadow-xl  2xl:py-72 py-56 relative">
            <img src="{{ asset('images/bg1.jpg') }}"
                class="absolute object-cover top-0 left-0  w-full h-full opacity-30 " alt="">
            <div class="absolute text-white 2xl:top-20 2xl:left-10 left-5 bottom-5">
                <h1 class="2xl:text-5xl text-2xl font-riot">HAVEN OF COMFORT AND CONVENIENCE</h1>
                <p>
                    Your Home Away from Home
                </p>
            </div>
        </div>

    </div>
    <div class="2xl:mx-40 mb-20 2xl:mt-20 mt-10 mx-10 relative">
        <div>
            <header class="2xl:text-4xl text-2xl font-riot text-gray-700">About JIMROCK </header>
            <div class="w-20 h-1 bg-yellow-600 mt-2"></div>
        </div>
        <p class="mt-5 text-xl 2xl:px-10 2xl:leading-loose text-gray-600  text-justify indent-10">
            <span class="2xl:text-3xl text-2xl text-yellow-700 font-bold font-riot">Welcome</span> to JIMROCK
            Dorms & Apartments, where
            comfort meets
            convenience. Whether you're a student
            seeking a cozy dormitory or a traveler in need of a transient stay, our spaces, backed by the trusted Le
            Patisserie brand, offer a delightful blend of quality and warmth. Enjoy a unique accommodation experience
            tailored to your needs, always with a touch of Le Patisserie's renowned hospitality.
        </p>
        <p class="mt-5 text-xl 2xl:px-10  text-gray-600 2xl:leading-loose text-justify indent-10">
            At JIMROCK Dorm & Apartments, we redefine living spaces with a perfect fusion of comfort and
            style. Whether it's a short-term escape or a cozy dormitory, immerse yourself in the charm of Le
            Patisserie's accommodations, where every stay is a delightful experience.
        </p>
    </div>
    <div class="2xl:mx-40 mx-10 my-20 relative">
        <header class="text-4xl font-riot text-gray-700">Our Rooms</header>
        <div class="w-20 h-1 bg-yellow-600 mt-2"></div>
        <div class="mt-5 grid 2xl:grid-cols-5 grid-cols-1 gap-5">
            <div class=" rounded-xl bg-white bg-opacity-50 relative  overflow-hidden">
                <div class="absolute top-3 left-3 shadow-xl h-16 w-16 rounded-full bg-white">
                    <button class="grid place-content-center w-full h-full fill-gray-700 hover:fill-red-300 group">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            class="h-8 w-8 group-hover:fill-red-400">
                            <path
                                d="M16.5 3C19.5376 3 22 5.5 22 9C22 16 14.5 20 12 21.5C9.5 20 2 16 2 9C2 5.5 4.5 3 7.5 3C9.35997 3 11 4 12 5C13 4 14.64 3 16.5 3ZM12.9339 18.6038C13.8155 18.0485 14.61 17.4955 15.3549 16.9029C18.3337 14.533 20 11.9435 20 9C20 6.64076 18.463 5 16.5 5C15.4241 5 14.2593 5.56911 13.4142 6.41421L12 7.82843L10.5858 6.41421C9.74068 5.56911 8.5759 5 7.5 5C5.55906 5 4 6.6565 4 9C4 11.9435 5.66627 14.533 8.64514 16.9029C9.39 17.4955 10.1845 18.0485 11.0661 18.6038C11.3646 18.7919 11.6611 18.9729 12 19.1752C12.3389 18.9729 12.6354 18.7919 12.9339 18.6038Z">
                            </path>
                        </svg>
                    </button>
                </div>
                <img src="{{ asset('images/bg.jpg') }}" class="h-56 w-full rounded-b-xl shadow-xl" alt="">
                <div class="my-3 ">
                    <h1 class="font-semibold text-lg text-gray-700">Sample Room</h1>
                    <h1 class="font-medium text-yellow-600">&#8369;150/hr</h1>
                </div>
            </div>
            <div class=" rounded-xl bg-white bg-opacity-50 relative  overflow-hidden">
                <div class="absolute top-3 left-3 shadow-xl h-16 w-16 rounded-full bg-white">
                    <button class="grid place-content-center w-full h-full fill-gray-700 hover:fill-red-300 group">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            class="h-8 w-8 group-hover:fill-red-400">
                            <path
                                d="M16.5 3C19.5376 3 22 5.5 22 9C22 16 14.5 20 12 21.5C9.5 20 2 16 2 9C2 5.5 4.5 3 7.5 3C9.35997 3 11 4 12 5C13 4 14.64 3 16.5 3ZM12.9339 18.6038C13.8155 18.0485 14.61 17.4955 15.3549 16.9029C18.3337 14.533 20 11.9435 20 9C20 6.64076 18.463 5 16.5 5C15.4241 5 14.2593 5.56911 13.4142 6.41421L12 7.82843L10.5858 6.41421C9.74068 5.56911 8.5759 5 7.5 5C5.55906 5 4 6.6565 4 9C4 11.9435 5.66627 14.533 8.64514 16.9029C9.39 17.4955 10.1845 18.0485 11.0661 18.6038C11.3646 18.7919 11.6611 18.9729 12 19.1752C12.3389 18.9729 12.6354 18.7919 12.9339 18.6038Z">
                            </path>
                        </svg>
                    </button>
                </div>
                <img src="{{ asset('images/bg.jpg') }}" class="h-56 w-full rounded-b-xl shadow-xl" alt="">
                <div class="my-3 ">
                    <h1 class="font-semibold text-lg text-gray-700">Sample Room</h1>
                    <h1 class="font-medium text-yellow-600">&#8369;150/hr</h1>
                </div>
            </div>
            <div class=" rounded-xl bg-white bg-opacity-50 relative  overflow-hidden">
                <div class="absolute top-3 left-3 shadow-xl h-16 w-16 rounded-full bg-white">
                    <button class="grid place-content-center w-full h-full fill-gray-700 hover:fill-red-300 group">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            class="h-8 w-8 group-hover:fill-red-400">
                            <path
                                d="M16.5 3C19.5376 3 22 5.5 22 9C22 16 14.5 20 12 21.5C9.5 20 2 16 2 9C2 5.5 4.5 3 7.5 3C9.35997 3 11 4 12 5C13 4 14.64 3 16.5 3ZM12.9339 18.6038C13.8155 18.0485 14.61 17.4955 15.3549 16.9029C18.3337 14.533 20 11.9435 20 9C20 6.64076 18.463 5 16.5 5C15.4241 5 14.2593 5.56911 13.4142 6.41421L12 7.82843L10.5858 6.41421C9.74068 5.56911 8.5759 5 7.5 5C5.55906 5 4 6.6565 4 9C4 11.9435 5.66627 14.533 8.64514 16.9029C9.39 17.4955 10.1845 18.0485 11.0661 18.6038C11.3646 18.7919 11.6611 18.9729 12 19.1752C12.3389 18.9729 12.6354 18.7919 12.9339 18.6038Z">
                            </path>
                        </svg>
                    </button>
                </div>
                <img src="{{ asset('images/bg.jpg') }}" class="h-56 w-full rounded-b-xl shadow-xl" alt="">
                <div class="my-3 ">
                    <h1 class="font-semibold text-lg text-gray-700">Sample Room</h1>
                    <h1 class="font-medium text-yellow-600">&#8369;150/hr</h1>
                </div>
            </div>
            <div class=" rounded-xl bg-white bg-opacity-50 relative  overflow-hidden">
                <div class="absolute top-3 left-3 shadow-xl h-16 w-16 rounded-full bg-white">
                    <button class="grid place-content-center w-full h-full fill-gray-700 hover:fill-red-300 group">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            class="h-8 w-8 group-hover:fill-red-400">
                            <path
                                d="M16.5 3C19.5376 3 22 5.5 22 9C22 16 14.5 20 12 21.5C9.5 20 2 16 2 9C2 5.5 4.5 3 7.5 3C9.35997 3 11 4 12 5C13 4 14.64 3 16.5 3ZM12.9339 18.6038C13.8155 18.0485 14.61 17.4955 15.3549 16.9029C18.3337 14.533 20 11.9435 20 9C20 6.64076 18.463 5 16.5 5C15.4241 5 14.2593 5.56911 13.4142 6.41421L12 7.82843L10.5858 6.41421C9.74068 5.56911 8.5759 5 7.5 5C5.55906 5 4 6.6565 4 9C4 11.9435 5.66627 14.533 8.64514 16.9029C9.39 17.4955 10.1845 18.0485 11.0661 18.6038C11.3646 18.7919 11.6611 18.9729 12 19.1752C12.3389 18.9729 12.6354 18.7919 12.9339 18.6038Z">
                            </path>
                        </svg>
                    </button>
                </div>
                <img src="{{ asset('images/bg.jpg') }}" class="h-56 w-full rounded-b-xl shadow-xl" alt="">
                <div class="my-3 ">
                    <h1 class="font-semibold text-lg text-gray-700">Sample Room</h1>
                    <h1 class="font-medium text-yellow-600">&#8369;150/hr</h1>
                </div>
            </div>
            <div class=" rounded-xl bg-white bg-opacity-50 relative  overflow-hidden">
                <div class="absolute top-3 left-3 shadow-xl h-16 w-16 rounded-full bg-white">
                    <button class="grid place-content-center w-full h-full fill-gray-700 hover:fill-red-300 group">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            class="h-8 w-8 group-hover:fill-red-400">
                            <path
                                d="M16.5 3C19.5376 3 22 5.5 22 9C22 16 14.5 20 12 21.5C9.5 20 2 16 2 9C2 5.5 4.5 3 7.5 3C9.35997 3 11 4 12 5C13 4 14.64 3 16.5 3ZM12.9339 18.6038C13.8155 18.0485 14.61 17.4955 15.3549 16.9029C18.3337 14.533 20 11.9435 20 9C20 6.64076 18.463 5 16.5 5C15.4241 5 14.2593 5.56911 13.4142 6.41421L12 7.82843L10.5858 6.41421C9.74068 5.56911 8.5759 5 7.5 5C5.55906 5 4 6.6565 4 9C4 11.9435 5.66627 14.533 8.64514 16.9029C9.39 17.4955 10.1845 18.0485 11.0661 18.6038C11.3646 18.7919 11.6611 18.9729 12 19.1752C12.3389 18.9729 12.6354 18.7919 12.9339 18.6038Z">
                            </path>
                        </svg>
                    </button>
                </div>
                <img src="{{ asset('images/bg.jpg') }}" class="h-56 w-full rounded-b-xl shadow-xl" alt="">
                <div class="my-3 ">
                    <h1 class="font-semibold text-lg text-gray-700">Sample Room</h1>
                    <h1 class="font-medium text-yellow-600">&#8369;150/hr</h1>
                </div>
            </div>
            <div class=" rounded-xl bg-white bg-opacity-50 relative  overflow-hidden">
                <div class="absolute top-3 left-3 shadow-xl h-16 w-16 rounded-full bg-white">
                    <button class="grid place-content-center w-full h-full fill-gray-700 hover:fill-red-300 group">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            class="h-8 w-8 group-hover:fill-red-400">
                            <path
                                d="M16.5 3C19.5376 3 22 5.5 22 9C22 16 14.5 20 12 21.5C9.5 20 2 16 2 9C2 5.5 4.5 3 7.5 3C9.35997 3 11 4 12 5C13 4 14.64 3 16.5 3ZM12.9339 18.6038C13.8155 18.0485 14.61 17.4955 15.3549 16.9029C18.3337 14.533 20 11.9435 20 9C20 6.64076 18.463 5 16.5 5C15.4241 5 14.2593 5.56911 13.4142 6.41421L12 7.82843L10.5858 6.41421C9.74068 5.56911 8.5759 5 7.5 5C5.55906 5 4 6.6565 4 9C4 11.9435 5.66627 14.533 8.64514 16.9029C9.39 17.4955 10.1845 18.0485 11.0661 18.6038C11.3646 18.7919 11.6611 18.9729 12 19.1752C12.3389 18.9729 12.6354 18.7919 12.9339 18.6038Z">
                            </path>
                        </svg>
                    </button>
                </div>
                <img src="{{ asset('images/bg.jpg') }}" class="h-56 w-full rounded-b-xl shadow-xl" alt="">
                <div class="my-3 ">
                    <h1 class="font-semibold text-lg text-gray-700">Sample Room</h1>
                    <h1 class="font-medium text-yellow-600">&#8369;150/hr</h1>
                </div>
            </div>
            <div class=" rounded-xl bg-white bg-opacity-50 relative  overflow-hidden">
                <div class="absolute top-3 left-3 shadow-xl h-16 w-16 rounded-full bg-white">
                    <button class="grid place-content-center w-full h-full fill-gray-700 hover:fill-red-300 group">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            class="h-8 w-8 group-hover:fill-red-400">
                            <path
                                d="M16.5 3C19.5376 3 22 5.5 22 9C22 16 14.5 20 12 21.5C9.5 20 2 16 2 9C2 5.5 4.5 3 7.5 3C9.35997 3 11 4 12 5C13 4 14.64 3 16.5 3ZM12.9339 18.6038C13.8155 18.0485 14.61 17.4955 15.3549 16.9029C18.3337 14.533 20 11.9435 20 9C20 6.64076 18.463 5 16.5 5C15.4241 5 14.2593 5.56911 13.4142 6.41421L12 7.82843L10.5858 6.41421C9.74068 5.56911 8.5759 5 7.5 5C5.55906 5 4 6.6565 4 9C4 11.9435 5.66627 14.533 8.64514 16.9029C9.39 17.4955 10.1845 18.0485 11.0661 18.6038C11.3646 18.7919 11.6611 18.9729 12 19.1752C12.3389 18.9729 12.6354 18.7919 12.9339 18.6038Z">
                            </path>
                        </svg>
                    </button>
                </div>
                <img src="{{ asset('images/bg.jpg') }}" class="h-56 w-full rounded-b-xl shadow-xl" alt="">
                <div class="my-3 ">
                    <h1 class="font-semibold text-lg text-gray-700">Sample Room</h1>
                    <h1 class="font-medium text-yellow-600">&#8369;150/hr</h1>
                </div>
            </div>

        </div>
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
                    <nav class="flex gap-8 mt-11">
                        <a class="relative -my-2 -mx-3 rounded-lg px-3 py-2 text-sm text-gray-500 hover:text-blue-600 transition-colors delay-150 hover:delay-[0ms]"
                            href="#_"><span class="relative z-10">Alpine</span></a><a
                            class="relative -my-2 -mx-3 rounded-lg px-3 py-2 text-sm text-gray-500 hover:text-blue-600 transition-colors delay-150 hover:delay-[0ms]"
                            href="#_"><span class="relative z-10">Nextjs</span></a><a
                            class="relative -my-2 -mx-3 rounded-lg px-3 py-2 text-sm text-gray-500 hover:text-blue-600 transition-colors delay-150 hover:delay-[0ms]"
                            href="#_"><span class="relative z-10">Tailwind</span></a><a
                            class="relative -my-2 -mx-3 rounded-lg px-3 py-2 text-sm text-gray-500 hover:text-blue-600 transition-colors delay-150 hover:delay-[0ms]"
                            href="#_"><span class="relative z-10">FAQs</span></a>
                    </nav>
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


</body>

</html>
