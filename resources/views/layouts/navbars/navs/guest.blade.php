<nav class="bg-gray-900 py-4 shadow-md">
    <div class="container mx-auto flex items-center justify-between px-4">
        <a class="text-white font-bold text-lg" href="{{ route('home') }}">
            <img class="h-8" src="{{ asset('argon') }}/img/brand/white.png" />
        </a>
        <button class="text-white focus:outline-none md:hidden" type="button" data-toggle="collapse" data-target="#navbar-collapse-main">
            <span class="block w-6 h-0.5 bg-white mb-1"></span>
            <span class="block w-6 h-0.5 bg-white mb-1"></span>
            <span class="block w-6 h-0.5 bg-white"></span>
        </button>
        <div class="hidden md:flex items-center space-x-6" id="navbar-collapse-main">
            <ul class="flex space-x-6">
                <li>
                    <a class="text-white hover:text-gray-300 flex items-center" href="{{ route('home') }}">
                        <i class="ni ni-planet mr-2"></i>
                        <span>{{ __('Dashboard') }}</span>
                    </a>
                </li>
                <li>
                    <a class="text-white hover:text-gray-300 flex items-center" href="{{ route('register') }}">
                        <i class="ni ni-circle-08 mr-2"></i>
                        <span>{{ __('Register') }}</span>
                    </a>
                </li>
                <li>
                    <a class="text-white hover:text-gray-300 flex items-center" href="{{ route('login') }}">
                        <i class="ni ni-key-25 mr-2"></i>
                        <span>{{ __('Login') }}</span>
                    </a>
                </li>
                <li>
                    <a class="text-white hover:text-gray-300 flex items-center" href="{{ route('profile.edit') }}">
                        <i class="ni ni-single-02 mr-2"></i>
                        <span>{{ __('Profile') }}</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
