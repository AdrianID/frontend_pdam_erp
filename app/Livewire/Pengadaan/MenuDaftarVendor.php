<?php

namespace App\Livewire\Pengadaan;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class MenuDaftarVendor extends Component
{
    use WithFileUploads;

    public $jenis_vendor;
    public $nama_vendor;
    public $alamat;
    public $nomor_telp;
    public $nomor_surat_perjanjian;
    public $tanggal_surat_perjanjian;
    public $file_surat_perjanjian;
    public $status;
    public $rating = 5;
    public $keterangan;

    public function mount()
    {
        // Data dummy untuk keperluan pengembangan
        $this->jenis_vendor = 'jasa_pemasangan';
        $this->nama_vendor = 'Vendor Contoh';
        $this->alamat = 'Jl. Contoh No. 123';
        $this->nomor_telp = '081234567890';
        $this->nomor_surat_perjanjian = 'SP/123/2023';
        $this->tanggal_surat_perjanjian = '2023-10-01';
        $this->status = 'aktif';
        $this->keterangan = 'Vendor terpercaya dengan pengalaman lebih dari 10 tahun.';
    }

    public function resetForm()
    {
        $this->reset([
            'jenis_vendor', 'nama_vendor', 'alamat', 'nomor_telp', 
            'nomor_surat_perjanjian', 'tanggal_surat_perjanjian', 
            'file_surat_perjanjian', 'status', 'rating', 'keterangan'
        ]);
    }

    public function save()
    {
        // Logika untuk menyimpan data
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.pengadaan.menu-daftar-vendor');
    }
}