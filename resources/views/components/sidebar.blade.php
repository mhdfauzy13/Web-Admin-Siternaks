<body class="bg-gray-50 dark:bg-slate-900">
    <!-- Sidebar -->
    <div id="application-sidebar-dark"
        class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full transition-all duration-300 transform hidden fixed top-0 start-0 bottom-0 z-[60] w-64 bg-green-800 border-e border-gray-800 pt-7 pb-10 overflow-y-auto lg:block lg:translate-x-0 lg:end-auto lg:bottom-0 [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-slate-700 dark:[&::-webkit-scrollbar-thumb]:bg-slate-500">
        <div class="flex ">
            <div class="w-[100px] ml-2">
                <img src="../assets/image/logositernaks.png" alt="">
            </div>
            <div class="mt-7 ml-6">
                <a class=" text-lg font-bold text-white">SITERNAKS</a>
            </div>
        </div>

        <nav class="hs-accordion-group p-6 w-full flex flex-col flex-wrap" data-hs-accordion-always-open>
            <ul class="space-y-1.5">
                <li>
                    <a class="flex items-center gap-x-3 py-2 px-2.5 bg-gray-700 text-sm text-white rounded-lg focus:outline-none focus:ring-1 focus:ring-gray-600"
                        href="{{ route('dashboardsuperadmin.index') }}">
                        <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                            <polyline points="9 22 9 12 15 12 15 22" />
                        </svg>
                        Dashboard
                    </a>
                </li>

                <li class="hs-accordion" id="users-accordion">
                    <button type="button"
                        class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 hs-accordion-active:text-white hs-accordion-active:hover:bg-transparent text-sm text-gray-400 rounded-lg hover:bg-gray-800 hover:text-white focus:outline-none focus:ring-1 focus:ring-gray-600">
                        <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                            <circle cx="9" cy="7" r="4" />
                            <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                            <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                        </svg>
                        Pengguna

                        <svg class="hs-accordion-active:block ms-auto hidden w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m18 15-6-6-6 6" />
                        </svg>

                        <svg class="hs-accordion-active:hidden ms-auto block w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m6 9 6 6 6-6" />
                        </svg>
                    </button>

                    <div id="users-accordion-child"
                        class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden">
                        <ul class="hs-accordion-group ps-3 pt-2" data-hs-accordion-always-open>
                            <li class="hs-accordion" id="users-accordion-sub-1">
                                <a class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 hs-accordion-active:text-white hs-accordion-active:hover:bg-transparent text-sm text-gray-400 rounded-lg hover:bg-gray-800 hover:text-white focus:outline-none focus:ring-1 focus:ring-gray-600"
                                    href={{ route('datapeternak.index') }}
                                    >
                                    Data Peternak
                                    <svg class="hs-accordion-active:block ms-auto hidden w-4 h-4"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="m18 15-6-6-6 6" />
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <div>
                    <a class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 hs-accordion-active:text-white hs-accordion-active:hover:bg-transparent text-sm text-gray-400 rounded-lg hover:bg-gray-800 hover:text-white focus:outline-none focus:ring-1 focus:ring-gray-600 "
                        >
                        <div>
                            <img src="../assets/icon/cow.png" alt="" style="filter: invert(100%);">
                        </div>
                        Hewan 
                    </a>
                </div>



                <div>
                    <a
                        class="w-full flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-400 rounded-lg hover:bg-gray-800 hover:text-white-300 focus:outline-none focus:ring-1 focus:ring-gray-600"
                        href="{{ route('informasi.index') }}">
                        <div>
                            <img src="../assets/icon/info.png" alt="" style="filter: invert(100%);">
                        </div>

                        Informasi
                    </a>
                </div>

                <div>
                    <a
                        class="w-full flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-400 rounded-lg hover:bg-gray-800 hover:text-white-300 focus:outline-none focus:ring-1 focus:ring-gray-600"
                        href="{{ route('modelhewan.index') }}">
                        <div>
                            <img src="../assets/icon/model.png" alt="" style="filter: invert(100%);">
                        </div>

                        Model
                    </a>
                </div>

                <form
                    class="flex items-center gap-x-3.5 py-2 px-2.5 mt-10 text-sm rounded-md transition duration-300 hover:bg-gray-800 dark:hover:bg-gray-900"
                    method="POST" action="{{ route('logout') }}">
                    @csrf
                    <div href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();"
                        class="flex items-center mt-6">
                        <img src="../assets/icon/Logout.png" alt="" class="filter invert">
                        <div class="text-sm text-white ml-3">{{ __('Log Out') }}</div>
                    </div>
                </form>
            </ul>
        </nav>
    </div>
    <!-- End Sidebar -->
</body>
