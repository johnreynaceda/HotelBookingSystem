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

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    @wireUiScripts
    @filamentStyles
    @vite('resources/css/app.css')
</head>

<body class="font-sans antialiased ">
    <x-dialog z-index="z-50" blur="md" align="center" />
    <div class="flex h-screen overflow-hidden bg-gray-200">
        <img src="{{ asset('images/hotel_logo.jpg') }}"
            class="fixed -bottom-20 -right-24 h-96  object-cover opacity-50 rounded-full" alt="">
        <img src="{{ asset('images/bg1.jpg') }}" class="fixed top-0 left-0 h-full w-full object-cover opacity-10"
            alt="">
        <div class="hidden md:flex md:flex-shrink-0">
            <div class="flex flex-col w-64">
                <div class="flex flex-col flex-grow pt-5 overflow-y-auto bg-white relative border-r">
                    <div class="flex flex-col flex-shrink-0 border-b pb-5 px-4">
                        <a class="text-lg font-semibold flex justify-center tracking-tighter text-black focus:outline-none focus:ring "
                            href="/">
                            <div class="text-center">

                                <h1 class="font-bold text-main">JIMROCK</h1>
                                <h1 class="text-sm font-medium text-gray-500">DORMS & APARTMENTS</h1>
                            </div>
                        </a>
                        <button class="hidden rounded-lg focus:outline-none focus:shadow-outline">
                            <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                                <path fill-rule="evenodd"
                                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                                    clip-rule="evenodd"></path>
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="flex flex-col flex-grow px-4 mt-5">
                        <div class="py-2 pb-5  flex flex-col items-center justify-center">
                            <img src="{{ asset('images/hotel_logo.jpg') }}" class="h-20" alt="">
                            <div>
                                <span class="text-sm font-medium text-gray-500">Administrator</span>
                            </div>
                        </div>
                        <nav class="flex-1 space-y-1 bg-white">

                            <ul>
                                <li>
                                    <a class="{{ request()->routeIs('admin.dashboard') ? 'bg-gray-100 text-main scale-95' : '' }} inline-flex items-center w-full px-4 py-2 mt-1 text-sm text-gray-500 transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-100 hover:scale-95 hover:text-main"
                                        href="#">
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            fill="currentColor" aria-hidden="true">
                                            <path
                                                d="M19.33 5.68L13.06 2.3c-.66-.36-1.46-.36-2.12 0L4.67 5.68c-.46.25-.74.73-.74 1.28 0 .54.28 1.03.74 1.28l6.27 3.38c.33.18.7.27 1.06.27.36 0 .73-.09 1.06-.27l6.27-3.38c.46-.25.74-.73.74-1.28s-.28-1.03-.74-1.28z">
                                            </path>
                                            <path
                                                d="M9.91 12.79L4.07 9.87c-.45-.22-.97-.2-1.39.06-.43.27-.68.72-.68 1.22v5.51c0 .95.53 1.81 1.38 2.24l5.83 2.92a1.442 1.442 0 001.39-.06c.43-.26.68-.72.68-1.22v-5.51c.01-.96-.52-1.82-1.37-2.24zM21.32 9.93c-.43-.26-.95-.29-1.39-.06l-5.83 2.92c-.85.43-1.38 1.28-1.38 2.24v5.51c0 .5.25.96.68 1.22a1.442 1.442 0 001.39.06l5.83-2.92c.85-.43 1.38-1.28 1.38-2.24v-5.51c0-.5-.25-.95-.68-1.22z"
                                                opacity=".4"></path>
                                        </svg>
                                        <span class="ml-4">
                                            Dashboard
                                        </span>
                                    </a>
                                </li>
                            </ul>
                            <p class="px-4 pt-4 text-xs font-semibold text-gray-400 uppercase">
                                Management
                            </p>
                            <ul>
                                <li>
                                    <a class="{{ request()->routeIs('admin.rooms') ? 'bg-gray-100 text-main scale-95' : '' }} inline-flex items-center w-full px-4 py-2 mt-1 text-sm text-gray-500 transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-100 hover:scale-95 hover:text-main"
                                        href="{{ route('admin.rooms') }}">
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            fill="currentColor" aria-hidden="true">
                                            <path
                                                d="M20.83 8.01l-6.55-5.24C13 1.75 11 1.74 9.73 2.76L3.18 8.01c-.94.75-1.51 2.25-1.31 3.43l1.26 7.54C3.42 20.67 4.99 22 6.7 22h10.6c1.69 0 3.29-1.36 3.58-3.03l1.26-7.54c.18-1.17-.39-2.67-1.31-3.42z"
                                                opacity=".4"></path>
                                            <path
                                                d="M12 18.75c-.41 0-.75-.34-.75-.75v-3c0-.41.34-.75.75-.75s.75.34.75.75v3c0 .41-.34.75-.75.75z">
                                            </path>
                                        </svg>
                                        <span class="ml-4">
                                            Rooms
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a class="inline-flex items-center w-full px-4 py-2 mt-1 text-sm text-gray-500 transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-100 hover:scale-95 hover:text-main"
                                        href="#">
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            fill="currentColor" aria-hidden="true">
                                            <path
                                                d="M7.37 22h9.25a4.87 4.87 0 004.87-4.87V8.37a4.87 4.87 0 00-4.87-4.87H7.37A4.87 4.87 0 002.5 8.37v8.75c0 2.7 2.18 4.88 4.87 4.88z"
                                                opacity=".4"></path>
                                            <path
                                                d="M8.29 6.29c-.42 0-.75-.34-.75-.75V2.75a.749.749 0 111.5 0v2.78c0 .42-.33.76-.75.76zM15.71 6.29c-.42 0-.75-.34-.75-.75V2.75a.749.749 0 111.5 0v2.78c0 .42-.33.76-.75.76zM14.78 13.71H7.36a.749.749 0 110-1.5h7.42a.749.749 0 110 1.5zM12 17.42H7.36a.749.749 0 110-1.5H12a.749.749 0 110 1.5z">
                                            </path>
                                        </svg>
                                        <span class="ml-4">
                                            Reservations
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a class="inline-flex items-center w-full px-4 py-2 mt-1 text-sm text-gray-500 transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-100 hover:scale-95 hover:text-main"
                                        href="#">
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            fill="currentColor" aria-hidden="true">
                                            <path
                                                d="M22 7.81v8.38c0 2.81-1.29 4.74-3.56 5.47-.66.23-1.42.34-2.25.34H7.81c-.83 0-1.59-.11-2.25-.34C3.29 20.93 2 19 2 16.19V7.81C2 4.17 4.17 2 7.81 2h8.38C19.83 2 22 4.17 22 7.81z"
                                                opacity=".4"></path>
                                            <path
                                                d="M18.44 21.66c-.66.23-1.42.34-2.25.34H7.81c-.83 0-1.59-.11-2.25-.34.35-2.64 3.11-4.69 6.44-4.69 3.33 0 6.09 2.05 6.44 4.69zM15.58 11.58c0 1.98-1.6 3.59-3.58 3.59s-3.58-1.61-3.58-3.59C8.42 9.6 10.02 8 12 8s3.58 1.6 3.58 3.58z">
                                            </path>
                                        </svg>
                                        <span class="ml-4">
                                            Users
                                        </span>
                                    </a>
                                </li>

                            </ul>

                            <p class="px-4 pt-10 text-xs font-semibold text-gray-400 uppercase">
                                Reports
                            </p>
                            <ul>
                                <li>
                                    <a class="inline-flex items-center w-full px-4 py-2 mt-1 text-sm text-gray-500 transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-100 hover:scale-95 hover:text-main"
                                        href="#">
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            fill="currentColor" aria-hidden="true">
                                            <path
                                                d="M21.66 10.44l-.98 4.18c-.84 3.61-2.5 5.07-5.62 4.77-.5-.04-1.04-.13-1.62-.27l-1.68-.4c-4.17-.99-5.46-3.05-4.48-7.23l.98-4.19c.2-.85.44-1.59.74-2.2 1.17-2.42 3.16-3.07 6.5-2.28l1.67.39c4.19.98 5.47 3.05 4.49 7.23z"
                                                opacity=".4"></path>
                                            <path
                                                d="M15.06 19.39c-.62.42-1.4.77-2.35 1.08l-1.58.52c-3.97 1.28-6.06.21-7.35-3.76L2.5 13.28c-1.28-3.97-.22-6.07 3.75-7.35l1.58-.52c.41-.13.8-.24 1.17-.31-.3.61-.54 1.35-.74 2.2l-.98 4.19c-.98 4.18.31 6.24 4.48 7.23l1.68.4c.58.14 1.12.23 1.62.27zM17.49 10.51c-.06 0-.12-.01-.19-.02l-4.85-1.23a.75.75 0 01.37-1.45l4.85 1.23a.748.748 0 01-.18 1.47z">
                                            </path>
                                            <path
                                                d="M14.56 13.89c-.06 0-.12-.01-.19-.02l-2.91-.74a.75.75 0 01.37-1.45l2.91.74c.4.1.64.51.54.91-.08.34-.38.56-.72.56z">
                                            </path>
                                        </svg>
                                        <span class="ml-4">
                                            Reports
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a class="inline-flex items-center w-full px-4 py-2 mt-1 text-sm text-gray-500 transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-100 hover:scale-95 hover:text-main"
                                        href="#">
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            fill="currentColor" aria-hidden="true">
                                            <path
                                                d="M21.66 10.44l-.98 4.18c-.84 3.61-2.5 5.07-5.62 4.77-.5-.04-1.04-.13-1.62-.27l-1.68-.4c-4.17-.99-5.46-3.05-4.48-7.23l.98-4.19c.2-.85.44-1.59.74-2.2 1.17-2.42 3.16-3.07 6.5-2.28l1.67.39c4.19.98 5.47 3.05 4.49 7.23z"
                                                opacity=".4"></path>
                                            <path
                                                d="M15.06 19.39c-.62.42-1.4.77-2.35 1.08l-1.58.52c-3.97 1.28-6.06.21-7.35-3.76L2.5 13.28c-1.28-3.97-.22-6.07 3.75-7.35l1.58-.52c.41-.13.8-.24 1.17-.31-.3.61-.54 1.35-.74 2.2l-.98 4.19c-.98 4.18.31 6.24 4.48 7.23l1.68.4c.58.14 1.12.23 1.62.27zM17.49 10.51c-.06 0-.12-.01-.19-.02l-4.85-1.23a.75.75 0 01.37-1.45l4.85 1.23a.748.748 0 01-.18 1.47z">
                                            </path>
                                            <path
                                                d="M14.56 13.89c-.06 0-.12-.01-.19-.02l-2.91-.74a.75.75 0 01.37-1.45l2.91.74c.4.1.64.51.54.91-.08.34-.38.56-.72.56z">
                                            </path>
                                        </svg>
                                        <span class="ml-4">
                                            Comments
                                        </span>
                                    </a>
                                </li>
                            </ul>
                            <p class="px-4 pt-10 text-xs font-semibold text-gray-400 uppercase">
                                Settings
                            </p>
                            <ul class="">
                                <li>
                                    <a class="inline-flex items-center w-full px-4 py-2 mt-1 text-sm text-gray-500 transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-100 hover:scale-95 hover:text-main"
                                        href="#">
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            fill="currentColor" aria-hidden="true">
                                            <path
                                                d="M2 12.88v-1.76c0-1.04.85-1.9 1.9-1.9 1.81 0 2.55-1.28 1.64-2.85-.52-.9-.21-2.07.7-2.59l1.73-.99c.79-.47 1.81-.19 2.28.6l.11.19c.9 1.57 2.38 1.57 3.29 0l.11-.19c.47-.79 1.49-1.07 2.28-.6l1.73.99c.91.52 1.22 1.69.7 2.59-.91 1.57-.17 2.85 1.64 2.85 1.04 0 1.9.85 1.9 1.9v1.76c0 1.04-.85 1.9-1.9 1.9-1.81 0-2.55 1.28-1.64 2.85.52.91.21 2.07-.7 2.59l-1.73.99c-.79.47-1.81.19-2.28-.6l-.11-.19c-.9-1.57-2.38-1.57-3.29 0l-.11.19c-.47.79-1.49 1.07-2.28.6l-1.73-.99a1.899 1.899 0 01-.7-2.59c.91-1.57.17-2.85-1.64-2.85-1.05 0-1.9-.86-1.9-1.9z"
                                                opacity=".4"></path>
                                            <path d="M12 15.25a3.25 3.25 0 100-6.5 3.25 3.25 0 000 6.5z"></path>
                                        </svg>
                                        <span class="ml-4">
                                            System Settings
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a class="inline-flex items-center w-full px-4 py-2 mt-1 text-sm text-gray-500 transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-100 hover:scale-95 hover:text-red-600"
                                            href="route('logout')"
                                            onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                <path
                                                    d="M9 7.2v9.59C9 20 11 22 14.2 22h2.59c3.2 0 5.2-2 5.2-5.2V7.2C22 4 20 2 16.8 2h-2.6C11 2 9 4 9 7.2z"
                                                    opacity=".4"></path>
                                                <path
                                                    d="M5.57 8.12l-3.35 3.35c-.29.29-.29.77 0 1.06l3.35 3.35c.29.29.77.29 1.06 0 .29-.29.29-.77 0-1.06l-2.07-2.07h10.69c.41 0 .75-.34.75-.75s-.34-.75-.75-.75H4.56l2.07-2.07c.15-.15.22-.34.22-.53s-.07-.39-.22-.53c-.29-.3-.76-.3-1.06 0z">
                                                </path>
                                            </svg>
                                            <span class="ml-4">
                                                Logout
                                            </span>
                                        </a>
                                    </form>
                                </li>
                            </ul>
                        </nav>
                    </div>

                </div>
            </div>
        </div>
        <div class="flex flex-col flex-1 w-0 overflow-hidden">
            <main class="relative flex-1 overflow-y-auto focus:outline-none">
                <div class="py-8">
                    <div class="px-4 mx-auto 2xl:max-w-7xl sm:px-6 md:px-8">
                        <div class="lg:flex lg:items-center lg:justify-between">
                            <div class="min-w-0 flex-1">
                                <h2
                                    class="text-2xl font-bold text-main leading-7 sm:truncate sm:text-2xl sm:tracking-tight">
                                    Good Day Administrator!</h2>
                                <div class="mt-1 flex flex-col sm:mt-0 sm:flex-row sm:flex-wrap sm:space-x-6">
                                    <div class="mt-2 flex space-x-1 items-center text-sm text-gray-500">
                                        <svg class="mr-1.6 h-6 w-5 flex-shrink-0 text-gray-500"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            fill="currentColor" aria-hidden="true">
                                            <path
                                                d="M10.07 2.82L3.14 8.37c-.78.62-1.28 1.93-1.11 2.91l1.33 7.96c.24 1.42 1.6 2.57 3.04 2.57h11.2c1.43 0 2.8-1.16 3.04-2.57l1.33-7.96c.16-.98-.34-2.29-1.11-2.91l-6.93-5.54c-1.07-.86-2.8-.86-3.86-.01z"
                                                opacity=".4"></path>
                                            <path d="M12 15.5a2.5 2.5 0 100-5 2.5 2.5 0 000 5z"></path>
                                        </svg>
                                        <span>
                                            @yield('title')
                                        </span>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="mt-10">
                            {{ $slot }}
                        </div>

                    </div>
                </div>
            </main>
        </div>
    </div>
    @filamentScripts
    @vite('resources/js/app.js')
</body>

</html>
