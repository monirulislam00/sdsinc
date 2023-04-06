<nav class=" bg-gray-800 border-gray-700 lg:hidden fixed top-0 left-0 w-full " style="z-index: 5">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4 ">
        <a href="{{ route('/') }}" class="flex items-center">
            <img src="{{ asset('frontend/images/logo.png') }}" class="h-8 mr-3" alt="SDSincbd Logo" />
        </a>
        <button data-collapse-toggle="navbar-solid-bg" type="button"
            class="inline-flex items-center p-2 ml-3 text-sm  rounded-lg lg:bluedden hover:bg-gray-700 focus:outline-none focus:ring-2  text-white dhover:bg-gray-700 focus:ring-gray-600"
            aria-controls="navbar-solid-bg" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>
        <div class="hidden w-full lg:block lg:w-auto" id="navbar-solid-bg">
            <ul
                class="flex flex-col font-medium mt-4 rounded-lg bg-gray-50 lg:flex-row lg:space-x-8 lg:mt-0 lg:border-0 lg:bg-transparent dark:bg-gray-800 lg:dark:bg-transparent dark:border-gray-700 p-3">
                <li>
                    <a href="{{ url('/') }}"
                        class="block py-2 pl-3 pr-4  rounded lg:bg-transparent lg:text-primaryColor lg:p-0 lg:dark:text-blue-500 dark:bg-blue-600 lg:dark:bg-transparent hover:bg-primaryColor hover:text-white"
                        aria-current="page">Home</a>
                </li>
                <li>
                    <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                        class="flex items-center justify-between w-full py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-primaryColor hover:text-white md:hover:bg-transparent md:border-0 md:hover:text-primaryColor md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500  px-3 ">About
                        Us
                        <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg></button>
                    <!-- Dropdown menu -->
                    <div id="dropdownNavbar"
                        class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-auto dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="px-2 text-sm text-gray-700 " aria-labelledby="dropdownLargeButton">
                            <li>
                                <a href="{{ route('frontend.aboutsds') }}"
                                    class="block px-4 py-2 hover:bg-primaryColor hover:text-white dark:hover:bg-gray-600 dark:hover:text-white">About
                                    Of SDSInc.</a>
                            </li>

                        </ul>
                        <div class="py-1">
                            <a href="{{ route('frontend.team') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-primaryColor hover:text-white dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">Our
                                Team</a>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="{{ route('frontend.service') }}"
                        class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-primaryColor hover:text-white lg:hover:bg-transparent lg:border-0 lg:hover:text-primaryColor lg:p-0 ">Services</a>
                </li>
                <li>
                    <a href="{{ route('frontend.portfolio') }}"
                        class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-primaryColor hover:text-white lg:hover:bg-transparent lg:border-0 lg:hover:text-primaryColor lg:p-0 dark:text-white lg:dark:hover:text-blue-500 dark:hover:bg-primaryColor hover:text-white dark:hover:text-white lg:dark:hover:bg-transparent">Portfolio</a>
                </li>
                <li>
                    <a href="{{ route('frontend.blogs') }}"
                        class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-primaryColor hover:text-white lg:hover:bg-transparent lg:border-0 lg:hover:text-primaryColor lg:p-0 dark:text-white lg:dark:hover:text-blue-500 dark:hover:bg-primaryColor hover:text-white dark:hover:text-white lg:dark:hover:bg-transparent">Blog</a>
                </li>
                <li>
                    <a href="{{ route('frontend.affiliate') }}"
                        class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-primaryColor hover:text-white lg:hover:bg-transparent lg:border-0 lg:hover:text-primaryColor lg:p-0 dark:text-white lg:dark:hover:text-blue-500 dark:hover:bg-primaryColor hover:text-white dark:hover:text-white lg:dark:hover:bg-transparent">Affiliate</a>
                </li>
                <li>
                    <a href="{{ route('frontend.contact') }}"
                        class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-primaryColor hover:text-white lg:hover:bg-transparent lg:border-0 lg:hover:text-primaryColor lg:p-0 dark:text-white lg:dark:hover:text-blue-500 dark:hover:bg-primaryColor hover:text-white dark:hover:text-white lg:dark:hover:bg-transparent">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
