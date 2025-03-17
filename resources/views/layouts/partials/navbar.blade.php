<nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all ease-in shadow-none duration-250 rounded-2xl lg:flex-nowrap lg:justify-start" navbar-main="" navbar-scroll="false">
    <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
        <nav>
            <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                <li class="text-sm leading-normal">
                    <a class="text-white opacity-50" href="javascript:;">Pages</a>
                </li>
                <li class="text-sm pl-2 capitalize leading-normal text-white before:float-left before:pr-2 before:text-white before:content-['/']" aria-current="page">Dashboard</li>
            </ol>
            <h6 class="mb-0 font-bold text-white capitalize">Dashboard</h6>
        </nav>

        <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
            <div class="flex items-center md:ml-auto md:pr-4">
                <div class="relative flex flex-wrap items-stretch w-full transition-all rounded-lg ease">
                    <span class="text-sm ease leading-5.6 absolute z-50 -ml-px flex h-full items-center whitespace-nowrap rounded-lg rounded-tr-none rounded-br-none border border-r-0 border-transparent bg-transparent py-2 px-2.5 text-center font-normal text-slate-500 transition-all">
                        <i class="fas fa-search"></i>
                    </span>
                    <input type="text" class="pl-9 text-sm focus:shadow-primary-outline ease w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="Type here...">
                </div>
            </div>
            <ul class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">
                <!-- User Profile Dropdown -->
                <li class="flex items-center relative" x-data="{ isOpen: false }">
                    <button 
                        @click="isOpen = !isOpen"
                        @keydown.escape="isOpen = false"
                        @click.away="isOpen = false"
                        class="flex items-center gap-2 px-3 py-2 text-sm font-semibold text-white transition-all ease-nav-brand rounded-lg hover:bg-white/10"
                    >
                        <i class="fa fa-user"></i>
                        <span class="hidden sm:inline">{{ session('username') }}</span>
                        <svg class="w-4 h-4 transition-transform duration-200" :class="{'rotate-180': isOpen}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    <!-- Dropdown Menu -->
                    <div 
                        x-show="isOpen"
                        x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                        class="absolute right-0 top-full mt-2 w-48 rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none z-50"
                    >
                        <div class="py-1">
                            <div class="px-4 py-2 border-b border-gray-100">
                                <p class="text-sm text-gray-700 font-medium">{{ session('username') }}</p>
                                <p class="text-xs text-gray-500">{{ session('user_email') }}</p>
                            </div>
                            <a href="/profile" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                <i class="fa fa-user-edit text-gray-400"></i>
                                Edit Profile
                            </a>
                            <form method="POST" action="/logout">
                                @csrf
                                <button type="submit" class="flex w-full items-center gap-2 px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                    <i class="fa fa-sign-out-alt text-red-400"></i>
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </li>

                {{-- <li class="flex items-center pl-4 xl:hidden">
                    <a href="javascript:;" class="block p-0 text-sm text-white transition-all ease-nav-brand" sidenav-trigger="">
                        <div class="w-4.5 overflow-hidden">
                            <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                            <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                            <i class="ease relative block h-0.5 rounded-sm bg-white transition-all"></i>
                        </div>
                    </a>
                </li> --}}
                
                {{--<li class="flex items-center px-4">
                    <a href="javascript:;" class="p-0 text-sm text-white transition-all ease-nav-brand">
                        <i fixed-plugin-button-nav="" class="cursor-pointer fa fa-cog"></i>
                    </a>
                </li> --}}
                
                {{-- <li class="relative flex items-center pr-2">
                    <p class="hidden transform-dropdown-show"></p>
                    <a href="javascript:;" class="block p-0 text-sm text-white transition-all ease-nav-brand" dropdown-trigger="" aria-expanded="false">
                        <i class="cursor-pointer fa fa-bell"></i>
                    </a>
                    <ul dropdown-menu="" class="text-sm transform-dropdown before:font-awesome before:leading-default before:duration-350 before:ease lg:shadow-3xl duration-250 min-w-44 before:sm:right-8 before:text-5.5 pointer-events-none absolute right-0 top-0 z-50 origin-top list-none rounded-lg border-0 border-solid border-transparent bg-white bg-clip-padding px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-2 before:left-auto before:top-0 before:z-50 before:inline-block before:font-normal before:text-white before:antialiased before:transition-all before:content-['\f0d8'] sm:-mr-6 lg:absolute lg:right-0 lg:left-auto lg:mt-2 lg:block lg:cursor-pointer">
                        <!-- Notification items -->
                    </ul>
                </li> --}}
            </ul>
        </div>
    </div>
</nav> 