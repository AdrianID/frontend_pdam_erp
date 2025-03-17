<?php

use App\Livewire\Auth\Login;
use App\Livewire\CustomerDetail;
use Illuminate\Support\Facades\Route;
use App\Livewire\Dashboard;
use App\Livewire\DataGrid;
use App\Http\Middleware\ApiAuth;
// Guest routes
Route::middleware('guest')->group(function () {
    Route::get('/login', Login::class)->name('login');
});

// Protected routes
Route::middleware(ApiAuth::class)->group(function () {
    Route::get('/', Dashboard::class)->name('dashboard');
    Route::get('/dashboard', Dashboard::class);
    Route::get('/pelanggan', DataGrid::class)->name('pelanggan.index');
    Route::get('/pelanggan/{id}', CustomerDetail::class)->name('pelanggan.detail');
    Route::get('/pelanggan/create/new', App\Livewire\CustomerForm::class)->name('pelanggan.create');
    Route::get('/pelanggan/{id}/edit', App\Livewire\CustomerForm::class)->name('pelanggan.edit');
    
    // Profile & Logout routes
    Route::get('/profile', App\Livewire\Profile::class)->name('profile');
    Route::post('/logout', function () {
        session()->forget(['token', 'user_role', 'username', 'user_email']);
        return redirect('/login');
    })->name('logout');
});
