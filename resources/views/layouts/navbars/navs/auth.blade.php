<!-- Top navbar -->
<nav class="bg-white shadow-md py-4" id="navbar-main">
    <div class="container mx-auto flex items-center justify-between px-6">
        <!-- Brand -->
        <a class="text-gray-800 text-xl font-bold uppercase" href="{{ route('home') }}">
            {{ __('Dashboard') }}
        </a>

        <!-- Search Form -->
        <form class="hidden md:flex w-1/3">
            <div class="relative w-full">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-search text-gray-400"></i>
                </div>
                <input 
                    class="pl-10 pr-4 py-2 w-full rounded-full border border-gray-300 text-gray-800 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                    placeholder="Search" 
                    type="text">
            </div>
        </form>

        <!-- User Dropdown -->
        <div class="relative">
            <button class="flex items-center focus:outline-none" id="user-menu" aria-haspopup="true">
                <div class="w-10 h-10 rounded-full overflow-hidden border-2 border-gray-300">
                    <img class="w-full h-full object-cover" alt="Profile" src="{{ asset('argon') }}/img/theme/team-4-800x800.jpg">
                </div>
                <span class="ml-2 text-gray-800 font-semibold hidden lg:inline-block">
                    {{ auth()->user()->name ?? 'Admin' }}
                </span>
            </button>

            <!-- Dropdown Menu -->
            <div class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 hidden" id="dropdown-menu">
                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                    <i class="ni ni-single-02 mr-2"></i> {{ __('My Profile') }}
                </a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                    <i class="ni ni-settings-gear-65 mr-2"></i> {{ __('Settings') }}
                </a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                    <i class="ni ni-calendar-grid-58 mr-2"></i> {{ __('Activity') }}
                </a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                    <i class="ni ni-support-16 mr-2"></i> {{ __('Support') }}
                </a>
                <div class="border-t border-gray-200"></div>
                <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="ni ni-user-run mr-2"></i> {{ __('Logout') }}
                </a>
            </div>
        </div>
    </div>
</nav>

<!-- Logout Form -->
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
    @csrf
</form>

<script>
    document.getElementById('user-menu').addEventListener('click', function() {
        document.getElementById('dropdown-menu').classList.toggle('hidden');
    });
</script>