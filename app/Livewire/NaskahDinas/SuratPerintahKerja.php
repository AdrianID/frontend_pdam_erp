<?php

namespace App\Livewire\NaskahDinas;

use Livewire\Component;
use Carbon\Carbon;
use Livewire\Attributes\Layout;

class SuratPerintahKerja extends Component
{
    public $nomor_surat;
    public $tanggal_surat;
    public $kepada;
    public $alamat_vendor;
    public $perihal;
    public $nomor_permohonan;
    public $nama_pemohon;
    public $alamat_pemohon;
    public $nomor_telp_pemohon;
    public $titik_koordinat;
    public $waktu_kerja;
    public $masa_kerja;
    public $keterangan;

    // public $vendorList;
    // public $pelangganList;

    public $vendorList = [
        ['id' => 1, 'name' => 'Vendor A', 'alamat' => 'Alamat A'],
        ['id' => 2, 'name' => 'Vendor B', 'alamat' => 'Alamat B']
    ];

    public $pelangganList = [
        ['id' => 1, 'nama' => 'Pelanggan A', 'alamat' => 'Alamat A', 'nomor_telp' => '08123456789', 'titik_koordinat' => '123.456, 78.910'],
        ['id' => 2, 'nama' => 'Pelanggan B', 'alamat' => 'Alamat B', 'nomor_telp' => '0987654321', 'titik_koordinat' => '456.789, 12.345']
    ];

    public function loadVendorData()
    {
        // Mencari vendor berdasarkan 'kepada' dari data statis
        $vendor = collect($this->vendorList)->firstWhere('id', $this->kepada);
        if ($vendor) {
            $this->alamat_vendor = $vendor['alamat'];
        } else {
            $this->reset(['alamat_vendor']);
        }
    }

    public function loadPelangganData()
    {
        // Mencari pelanggan berdasarkan 'nomor_permohonan' dari data statis
        $pelanggan = collect($this->pelangganList)->firstWhere('id', $this->nomor_permohonan);
        if ($pelanggan) {
            $this->nama_pemohon = $pelanggan['nama'];
            $this->alamat_pemohon = $pelanggan['alamat'];
            $this->nomor_telp_pemohon = $pelanggan['nomor_telp'];
            $this->titik_koordinat = $pelanggan['titik_koordinat'];
        } else {
            $this->reset(['nama_pemohon', 'alamat_pemohon', 'nomor_telp_pemohon', 'titik_koordinat']);
        }
    }

    public function updatedWaktuKerja()
    {
        $this->hitungMasaKerja();
    }

    public function updatedTanggalSurat()
    {
        $this->hitungMasaKerja();
    }

    public function hitungMasaKerja()
    {
        if ($this->tanggal_surat && $this->waktu_kerja) {
            $tanggalSurat = Carbon::parse($this->tanggal_surat);
            $this->masa_kerja = $tanggalSurat->addDays($this->waktu_kerja)->format('Y-m-d');
        } else {
            $this->masa_kerja = null;
        }
    }

    public function resetForm()
    {
        $this->reset([
            'nomor_surat', 'tanggal_surat', 'kepada', 'alamat_vendor', 'perihal', 
            'nomor_permohonan', 'nama_pemohon', 'alamat_pemohon', 'nomor_telp_pemohon', 
            'titik_koordinat', 'waktu_kerja', 'masa_kerja', 'keterangan'
        ]);
    }

    public function save()
    {
        // Logika untuk menyimpan dan mengirim draft SPK
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.naskah-dinas.surat-perintah-kerja');
    }
}