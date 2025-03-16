<?php

use App\Livewire\Auth\Login;
use Illuminate\Support\Facades\Route;
use App\Livewire\Dashboard;

Route::get('/login', Login::class)->name('login');

Route::get('/dashboard', Dashboard::class)->name('dashboard');
// Route::middleware(['auth'])->group(function () {
// });
