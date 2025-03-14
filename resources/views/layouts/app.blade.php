<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>ERP - PDAM</title>
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/nucleo-icons@1.0.0/css/nucleo-icons.min.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <style>
        .custom-bg {
        background: linear-gradient(to right, #cde7f5, #a1c4fd);
        height: 25vh; /* Hanya 1/4 tinggi layar */
    }
    body {
    position: relative;
    background: white; /* Warna utama tetap putih */
    }

    /* Background Biru Gradient di 1/4 Area */
    body::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 50vh; /* 1/4 dari tinggi layar */
        background: linear-gradient(to right, #cde7f5, #a1c4fd);
        z-index: -1; /* Supaya ada di belakang konten */
    }

    </style>
</head>
<body class="{{ $class ?? '' }} bg-gray-100 text-gray-900">
    {{-- @auth() --}}
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md min-h-screen fixed">
            @include('layouts.navbars.sidebar')
        </aside>
    {{-- @endauth --}}

    <!-- Main Content -->
    <div class=" flex-1 min-h-screen ml-64 overflow-y-auto">
        @include('layouts.navbars.navbar')
        <div class="container mx-auto p-6">
            @yield('content')
        </div>
        @include('layouts.footers.guest')
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    @livewireScripts
    @stack('scripts') <!-- Pastikan stack scripts ada di sini -->
</body>
</html>
