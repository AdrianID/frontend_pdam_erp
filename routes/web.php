<?php

use App\Http\Controllers\HomeController;
use App\Livewire\Auth\Login;
use App\Livewire\DashboardAdmin\Dashboard;
use App\Livewire\DashboardAdmin\UserTable;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/table_user', [HomeController::class, 'user'])->name('table_user');
Route::get('/register', [HomeController::class, 'index'])->name('register');
Route::get('/profile/edit', function () {
    // Logic for editing profile
})->name('profile.edit');
Route::post('/logout', function () {
    // Logic for logging out
})->name('logout');
Route::get('/user', function () {
    // Logic for displaying user index
})->name('user.index');
Route::get('/icons', function () {
   
})->name('icons');
Route::get('/map', function () {
    // Logic for displaying the route map
})->name('map');
Route::get('/table', function () {
    // Logic for displaying table
})->name('table');


Route::get('/login', Login::class)->name('login');
Route::get('/dashboard', Dashboard::class)->name('dashboard');
Route::get('/user_table', UserTable::class)->name('user-table');
