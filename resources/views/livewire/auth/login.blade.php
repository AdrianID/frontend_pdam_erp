<div class="min-h-screen bg-[#F8FAFC] flex items-center justify-center p-6 relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 opacity-20 bg-grid-slate-100"></div>
        <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-[#F8FAFC]"></div>
    </div>

    <!-- Login Container -->
    <div class="relative bg-white w-full max-w-lg rounded-2xl shadow-[0_20px_50px_rgba(8,_112,_184,_0.1)] p-8">
        <!-- Top Design Element -->
        <div class="absolute top-0 inset-x-0 h-1 bg-gradient-to-r from-blue-600 to-blue-400 rounded-t-2xl"></div>

        <!-- Logo Section -->
        <div class="flex flex-col items-center space-y-3 mb-8">
            <div class="w-28 h-28 bg-white rounded-full shadow-md flex items-center justify-center p-4">
                <img src="{{ asset('assets/logopdam.png') }}" alt="PDAM Giri Tirta Gresik" class="w-20 h-20 object-contain">
            </div>
            <div class="text-center">
                <h1 class="text-2xl font-bold text-gray-900">PDAM Giri Tirta</h1>
                <p class="text-sm text-gray-600">Sistem Manajemen ERP</p>
            </div>
        </div>

        <!-- Login Form -->
        <form wire:submit="login" class="space-y-6">
            <!-- Email Field -->
            <div class="space-y-2">
                <label for="email" class="text-sm font-medium text-gray-700 flex items-center gap-2">
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    <span>Email</span>
                </label>
                <input 
                    type="email" 
                    wire:model="email" 
                    id="email"
                    class="w-full px-4 py-2.5 rounded-lg border border-gray-300 bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out"
                    placeholder="nama@pdam.com"
                >
                @error('email') 
                    <p class="text-sm text-red-500 flex items-center gap-1">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                        </svg>
                        <span>{{ $message }}</span>
                    </p>
                @enderror
            </div>

            <!-- Password Field -->
            <div class="space-y-2">
                <label for="password" class="text-sm font-medium text-gray-700 flex items-center gap-2">
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                    <span>Password</span>
                </label>
                <input 
                    type="password" 
                    wire:model="password" 
                    id="password"
                    class="w-full px-4 py-2.5 rounded-lg border border-gray-300 bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out"
                    placeholder="••••••••"
                >
                @error('password') 
                    <p class="text-sm text-red-500 flex items-center gap-1">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                        </svg>
                        <span>{{ $message }}</span>
                    </p>
                @enderror
            </div>

            <!-- Remember Me & Forgot Password -->
            <div class="flex items-center justify-between">
                <label class="flex items-center gap-2">
                    <input 
                        type="checkbox" 
                        id="remember_me"
                        class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                    >
                    <span class="text-sm text-gray-600">Ingat saya</span>
                </label>

                <a href="#" class="text-sm font-medium text-blue-600 hover:text-blue-700">
                    Lupa password?
                </a>
            </div>

            <!-- Submit Button -->
            <button 
                type="submit"
                class="w-full flex items-center justify-center px-4 py-2.5 bg-blue-500 text-white rounded-lg font-medium shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-150"
                wire:loading.class="opacity-75"
                wire:loading.attr="disabled"
            >
                <span wire:loading.remove>Masuk</span>
                <span wire:loading class="flex items-center gap-2">
                    <svg class="animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span>Memproses...</span>
                </span>
            </button>
        </form>

        <!-- Footer -->
        <div class="mt-8 text-center">
            <p class="text-sm text-gray-600">
                © {{ date('Y') }} PDAM Giri Tirta Gresik
                <span class="block text-xs mt-1 text-gray-500">Sistem Pengelolaan Air Minum</span>
            </p>
        </div>
    </div>
</div>

@push('styles')
<style>
    .bg-grid-slate-100 {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32' width='32' height='32' fill='none' stroke='rgb(148 163 184 / 0.1)'%3E%3Cpath d='M0 .5H31.5V32'/%3E%3C/svg%3E");
    }
</style>
@endpush