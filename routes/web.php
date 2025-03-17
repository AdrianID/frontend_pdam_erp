<?php

use App\Livewire\Auth\Login;
use App\Livewire\CustomerDetail;
use Illuminate\Support\Facades\Route;
use App\Livewire\Dashboard;
use App\Livewire\DataGrid;

Route::get('/login', Login::class)->name('login');
Route::get('/pelanggan/{id}', CustomerDetail::class)->name('customer.detail');

Route::get('/dashboard', Dashboard::class)->name('dashboard');

Route::get('/data-grid', DataGrid::class)->name('customers');

// Customer management routes
Route::get('/customers/create/new', App\Livewire\CustomerForm::class)->name('customer.create');

// Edit customer
Route::get('/customers/{id}/edit', App\Livewire\CustomerForm::class)->name('customer.edit');
Route::middleware(['auth'])->group(function () {
    // List customers
    // Route::get('/customers', App\Http\Livewire\CustomerList::class)->name('customers');
    
    // View customer detail
    // Route::get('/customers/{id}', App\Http\Livewire\CustomerDetail::class)->name('customer.detail');
    
    // Create new customer
});
