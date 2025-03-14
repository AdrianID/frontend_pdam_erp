<nav class="fixed left-0 top-0 h-screen w-64 bg-white shadow-md z-50">
    <div class="flex flex-col h-full p-4">
        <!-- Toggler -->
        <button class="md:hidden p-2 focus:outline-none" type="button" onclick="toggleSidebar()">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>

        <!-- Brand -->
        <a class="mb-5 flex items-center pt-0" href="{{ route('home') }}">
            <img src="{{ asset('argon') }}/img/brand/blue.png" class="h-8 w-auto" alt="Brand Logo">
        </a>

        <!-- User (Mobile) -->
        <ul class="flex items-center md:hidden mt-4">
            <li class="relative">
                <a class="flex items-center" href="#" role="button" onclick="toggleDropdown(event)">
                    <div class="flex items-center">
                        <span class="inline-block h-8 w-8 rounded-full overflow-hidden">
                            <img class="h-full w-full" src="{{ asset('argon') }}/img/theme/team-1-800x800.jpg" alt="User Avatar">
                        </span>
                    </div>
                </a>
                <div class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-2">
                    <div class="px-4 py-2">
                        <h6 class="text-sm font-medium text-gray-900">{{ __('Welcome!') }}</h6>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                        <i class="ni ni-single-02 mr-2"></i>
                        <span>{{ __('My profile') }}</span>
                    </a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                        <i class="ni ni-settings-gear-65 mr-2"></i>
                        <span>{{ __('Settings') }}</span>
                    </a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                        <i class="ni ni-calendar-grid-58 mr-2"></i>
                        <span>{{ __('Activity') }}</span>
                    </a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                        <i class="ni ni-support-16 mr-2"></i>
                        <span>{{ __('Support') }}</span>
                    </a>
                    <div class="border-t border-gray-200"></div>
                    <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run mr-2"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                </div>
            </li>
        </ul>

        <!-- Collapse -->
        <div class="flex-1 flex flex-col overflow-y-auto">
            <!-- Collapse header -->
            <div class="md:hidden py-4">
                <div class="flex justify-between items-center">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('argon') }}/img/brand/blue.png" class="h-8 w-auto" alt="Brand Logo">
                    </a>
                    <button class="p-2 focus:outline-none" onclick="toggleSidebar()">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Form -->
            <form class="mt-4 mb-3 md:hidden">
                <div class="relative">
                    <input type="search" class="w-full pl-10 pr-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:border-blue-500" placeholder="{{ __('Search') }}" aria-label="Search">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                </div>
            </form>

            <!-- Navigation -->
            <ul class="flex-1 flex flex-col space-y-2 ">
                <li class="nav-item">
                    <a class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded-md" href="{{ route('home') }}">
                        <i class="fas fa-tv text-blue-500 mr-2"></i>
                        <span>{{ __('Dashboard') }}</span>
                    </a>
                </li>
                <li class="nav-item group">
                    <a class="flex items-center justify-between p-2 text-gray-700 hover:bg-gray-100 rounded-md cursor-pointer">
                        <div class="flex items-center">
                            {{-- <i class="fab fa-laravel text-red-500 mr-2"></i> --}}
                            <i class="fas fa-user text-blue-500 mr-2"></i>
                            <span class="text-gray-700">{{ __('Laravel Examples') }}</span>
                        </div>
                        <i class="fas fa-chevron-down transition-transform duration-300 group-hover:rotate-180"></i>
                    </a>
                    <div class="max-h-0 overflow-hidden transition-all duration-300 group-hover:max-h-40 group-hover:opacity-100 pl-4">
                        <ul class="space-y-1">
                            <li>
                                <a class="block p-2 text-gray-700 hover:bg-gray-100 rounded-md" href="{{ route('user-table') }}">
                                    User profile
                                </a>
                            </li>
                            <li>
                                <a class="block p-2 text-gray-700 hover:bg-gray-100 rounded-md" href="{{ route('user.index') }}">
                                    User Management
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded-md" href="{{ route('icons') }}">
                        <i class="fas fa-globe-americas text-blue-500 mr-2"></i>
                        <span>{{ __('Icons') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded-md" href="{{ route('map') }}">
                        <i class="fab fa-asymmetrik text-blue-500 mr-2"></i>
                        <span>{{ __('Maps') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded-md" href="{{ route('table') }}">
                        <i class="ni ni-bullet-list-67 text-gray-500 mr-2"></i>
                        <span>{{ __('Tables') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded-md" href="#">
                        <i class="ni ni-circle-08 text-pink-500 mr-2"></i>
                        <span>{{ __('Register') }}</span>
                    </a>
                </li>
                {{-- <li class="nav-item mt-auto">
                    <a class="flex items-center p-2 bg-red-500 text-white rounded-md" href="https://www.creative-tim.com/product/argon-dashboard-pro-laravel" target="_blank">
                        <i class="ni ni-cloud-download-95 mr-2"></i>
                        <span>Upgrade to PRO</span>
                    </a>
                </li> --}}
            </ul>

            <!-- Divider -->
            <hr class="my-4 border-gray-200">

            <!-- Heading -->
            <h6 class="text-xs font-semibold text-gray-500 uppercase">Documentation</h6>

            <!-- Navigation -->
            <ul class="mt-2 space-y-1">
                <li>
                    <a class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded-md" href="https://argon-dashboard-laravel.creative-tim.com/docs/getting-started/overview.html">
                        <i class="ni ni-spaceship text-blue-500 mr-2"></i>
                        <span>Getting started</span>
                    </a>
                </li>
                <li>
                    <a class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded-md" href="https://argon-dashboard-laravel.creative-tim.com/docs/foundation/colors.html">
                        <i class="ni ni-palette text-blue-500 mr-2"></i>
                        <span>Foundation</span>
                    </a>
                </li>
                <li>
                    <a class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded-md" href="https://argon-dashboard-laravel.creative-tim.com/docs/components/alerts.html">
                        <i class="ni ni-ui-04 text-blue-500 mr-2"></i>
                        <span>Components</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
    function toggleSidebar() {
        const sidebar = document.querySelector('nav');
        sidebar.classList.toggle('hidden');
    }

    function toggleDropdown(event) {
        event.preventDefault();
        const dropdown = event.currentTarget.nextElementSibling;
        dropdown.classList.toggle('hidden');
    }

    function toggleCollapse(event, element) {
        event.preventDefault();
        let collapseDiv = element.nextElementSibling;
        let arrowIcon = element.querySelector("#arrow-icon");
        
        if (collapseDiv.classList.contains("max-h-0")) {
            collapseDiv.classList.remove("max-h-0", "opacity-0");
            collapseDiv.classList.add("max-h-40", "opacity-100"); // Adjust height based on content
            arrowIcon.classList.add("rotate-180");
        } else {
            collapseDiv.classList.add("max-h-0", "opacity-0");
            collapseDiv.classList.remove("max-h-40", "opacity-100");
            arrowIcon.classList.remove("rotate-180");
        }
    }
</script>