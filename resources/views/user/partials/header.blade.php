<header>
    <nav id="main-navbar"
        class="fixed start-0 top-0 z-20 w-full border-0 border-gray-200 bg-blue-900 transition-colors duration-300 dark:border-gray-600 dark:bg-gray-900">
        <div class="mx-auto flex max-w-screen-lg flex-wrap items-center justify-between px-5 py-5">
            <a href="{{ route('user.home') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ asset('/assets/src/sukun.png') }}" class="h-11" alt="Sukun Logo">
                <!-- <span class="self-center whitespace-nowrap text-2xl font-semibold dark:text-white">Flowbite</span> -->
            </a>
            <div class="flex space-x-3 md:space-x-0 rtl:space-x-reverse">
                <button data-collapse-toggle="navbar-sticky" type="button"
                    class="inline-flex h-10 w-10 items-center justify-center rounded-lg p-2 text-sm text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600 md:hidden"
                    aria-controls="navbar-sticky" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
            <div class="hidden w-full items-center justify-between md:order-1 md:flex md:w-auto" id="navbar-sticky">
                <ul
                    class="bg-neutral-900 lg:bg-transparent md:bg-transparent mt-4 gap-x-5 flex flex-col rounded-lg border border-gray-100 bg-gray-50 p-4 font-medium dark:border-gray-700 dark:bg-gray-800 md:mt-0 md:flex-row md:space-x-10 md:border-0 md:bg-white-100 md:p-0 md:dark:bg-gray-900 rtl:space-x-reverse">
                    <li>
                        <a href="#"
                            class="block rounded px-3 py-2 hover:bg-gray-100 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:p-0 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:bg-transparent md:dark:hover:text-blue-500 font-normal"><span
                                class="text-slate-900 lg:text-white md:text-white">Home</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('lowongan.index') }}"
                            class="block rounded px-3 py-2 hover:bg-gray-100 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:p-0 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:bg-transparent md:dark:hover:text-blue-500 font-normal">
                            <span class="text-slate-900 lg:text-white md:text-white">Karir</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>