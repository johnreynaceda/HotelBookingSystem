<div>
    <nav :class="{ 'flex': open, 'hidden': !open }"
        class="flex-col items-center flex-grow hidden md:pb-0 md:flex md:justify-end md:flex-row">


        <div
            class="{{ request()->routeIs('welcome') ? 'text-main font-medium' : 'text-gray-500' }} px-2 py-2 text-sm  lg:px-6 md:px-3 hover:text-main lg:ml-auto">
            <a class="px-2 py-2 text-sm text-gray-500 lg:px-6 md:px-3 hover:text-main" href="{{ route('welcome') }}">
                Home
            </a>
            <a class="{{ request()->routeIs('reservation') ? 'text-main font-medium' : 'text-gray-500' }} px-2 py-2 text-sm  lg:px-6 md:px-3 hover:text-main lg:ml-auto"
                href="{{ route('reservation') }}">
                Reservation
            </a>

            <a class="{{ request()->routeIs('faq') ? 'text-main font-medium' : 'text-gray-500' }} px-2 py-2 text-sm  lg:px-6 md:px-3 hover:text-main lg:ml-auto"
                href="{{ route('faq') }}">
                FAQ
            </a>

            <a class="{{ request()->routeIs('comment') ? 'text-main font-medium' : 'text-gray-500' }} px-2 py-2 text-sm  lg:px-6 md:px-3 hover:text-main lg:ml-auto"
                href="{{ route('comment') }}">
                Comments
            </a>

            <a class="px-2 py-2 text-sm text-gray-500 lg:px-6 md:px-3 hover:text-main" href="#">
                Others
            </a>

            <a href="{{ route('login') }}"
                class="inline-flex items-center justify-center px-4 py-2 text-sm font-semibold text-white bg-main rounded-full group focus:outline-none focus-visible:outline-2 focus-visible:outline-offset-2 hover:bg-main active:bg-main active:text-white focus-visible:outline-black">
                Sign In
            </a>
        </div>
    </nav>
</div>
