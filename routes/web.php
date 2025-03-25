<?php

use App\Http\Controllers\HomeController;
use App\Livewire\Auth\Login;
use App\Livewire\CustomerDetail;
use Illuminate\Support\Facades\Route;
use App\Livewire\Dashboard;
use App\Livewire\DataGrid;
use App\Http\Middleware\ApiAuth;
use App\Livewire\CustomerVerifier;

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



    Route::get('/input-master-spks', App\Livewire\Pelanggan\InputMasterSpks::class)->name('pelanggan.input-master-spks');
    Route::get('/tambah-pelanggan', App\Livewire\Pelanggan\TambahPelanggan::class)->name('pelanggan.tambah');
    Route::get('/verif', CustomerVerifier::class)->name('verifikasi.index');

    Route::get('/gudang/menu-barang', App\Livewire\Gudang\TambahBarang::class)->name('gudang.tambah-barang');
    Route::get('/gudang/stok-barang', App\Livewire\Gudang\StokBarang::class)->name('gudang.stok-barang');

    Route::get('/tagihan/sambungan-baru', App\Livewire\Tagihan\SambunganBaru::class)->name('tagihan.sambungan-baru');
    Route::get('/tagihan/menu-buat-tagihan', App\Livewire\Tagihan\MenuBuatTagihan::class)->name('tagihan.menu-buat-tagihan');
    Route::get('/tagihan/daftar-tagihan', App\Livewire\Tagihan\DaftarTagihan::class)->name('tagihan.daftar-tagihan');

    Route::get('/naskah-dinas/tambah-surat-perintah-kerja', App\Livewire\NaskahDinas\TambahSuratPerintahKerja::class)->name('naskah-dinas.surat-perintah-kerja');
    
    Route::get('/pengadaan/menu-daftar-vendor', App\Livewire\Pengadaan\MenuDaftarVendor::class)->name('pengadaan.menu-daftar-vendor');
    Route::get('/pengadaan/tambah-vendor', App\Livewire\Pengadaan\TambahVendor::class)->name('pengadaan.tambah-vendor');
    Route::get('/pembayaran/menu-sambungan-baru', App\Livewire\Pembayaran\MenuSambunganBaru::class)->name('pembayaran.menu-sambungan-baru');

    Route::get('/test-db', function () {
        $penggunaan = \DB::table('pelanggan')->get();
        dd($penggunaan);
    });
   

    
    // Profile & Logout routes
    Route::get('/profile', App\Livewire\Profile::class)->name('profile');
    Route::post('/logout', function () {
        session()->forget(['token', 'user_role', 'username', 'user_email']);
        return redirect('/login');
    })->name('logout');
});