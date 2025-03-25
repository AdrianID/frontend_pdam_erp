
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    
    <!-- ApexCharts -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    
    <!-- Styles -->
    @vite(['resources/css/app.css'])
    <!-- Scripts -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    
    @livewireStyles



    <div class="absolute w-full bg-blue-500 min-h-75"></div>
    
    @include('layouts.partials.sidenav')

    <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
        @include('layouts.partials.navbar')
        
        {{ $slot }}
        
        @include('layouts.partials.footer')
    </main>


    @livewireScripts
    @stack('scripts')
    @vite(['resources/js/app.js'])
    <script>
        document.addEventListener('DOMContentLoaded', function() {
    // Toggle submenu
    document.querySelectorAll('a').forEach(item => {
        if (item.nextElementSibling && item.nextElementSibling.tagName === 'UL') {
            item.addEventListener('click', (e) => {
                e.preventDefault();
                const submenu = item.nextElementSibling;
                submenu.classList.toggle('hidden');
                item.querySelector('.fa-chevron-down').classList.toggle('rotate-180');
            });
        }
    });
});
    </script>
   
