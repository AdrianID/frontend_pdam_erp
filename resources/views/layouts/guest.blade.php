<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'PDAM Giri Tirta') }}</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    
    <!-- Styles -->
    @vite(['resources/css/app.css'])
    
    <!-- Scripts -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    
    @livewireStyles
</head>
<body class="antialiased">
    <main>
        {{ $slot }}
    </main>

    @livewireScripts
    @vite(['resources/js/app.js'])
</body>
</html> 