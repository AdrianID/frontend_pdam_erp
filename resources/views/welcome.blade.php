@extends('layouts.app', ['class' => 'bg-gray-100'])

@section('content')
<div>
    <div class="bg-gradient-to-r from-blue-500 to-blue-700 py-16">
        <div class="container mx-auto px-4">
            <div class="flex justify-center text-center">
                <div class="w-full max-w-md">
                    <h1 class="text-white text-3xl font-bold">{{ __('Welcome to Argon Dashboard FREE Laravel Live Preview.') }}</h1>
                </div>
            </div>
        </div>
        <div class="relative w-full h-16 mt-8">
            <svg class="absolute bottom-0 w-full h-full" viewBox="0 0 2560 100" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-gray-100" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </div>
    
    <div class="container mx-auto mt-[-40px] pb-10"></div>
</div>
@endsection