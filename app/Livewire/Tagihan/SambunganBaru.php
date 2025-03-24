<?php

namespace App\Livewire\Tagihan;

use Livewire\Component;
use Livewire\Attributes\Layout;

class SambunganBaru extends Component
{
    public $no_pendaftaran;
    public $nama;
    public $alamat;
    public $jenis_pelanggan;
    public $spesifikasi_meter;
    public $jumlah_biaya_pasang;

    public $pelangganList;
    public $diameterOptions = ['1/2"', '3/4"', '1"', '2"', '3"', '4"'];

    public function mount()
    {
        // Simulated data for pelangganList
        $this->pelangganList = [
            ['id' => 1, 'nama' => 'John Doe', 'alamat' => '123 Elm St', 'jenis_pelanggan' => 'Residential', 'status' => 'verified'],
            ['id' => 2, 'nama' => 'Jane Smith', 'alamat' => '456 Oak St', 'jenis_pelanggan' => 'Commercial', 'status' => 'verified'],
            // Add more simulated data as needed
        ];
    }

    public function loadPelangganData()
    {
        $pelanggan = collect($this->pelangganList)->firstWhere('id', $this->no_pendaftaran);
        if ($pelanggan) {
            $this->nama = $pelanggan['nama'];
            $this->alamat = $pelanggan['alamat'];
            $this->jenis_pelanggan = $pelanggan['jenis_pelanggan'];
        } else {
            $this->reset(['nama', 'alamat', 'jenis_pelanggan']);
        }
    }

    public function hitungBiayaPasang()
    {
        $biaya = [
            '1/2"' => 1741300,
            '3/4"' => 2816000,
            '1"' => 5595700,
            '2"' => 22816200,
            '3"' => 28045600,
            '4"' => 35504700,
        ];

        $this->jumlah_biaya_pasang = $biaya[$this->spesifikasi_meter] ?? 0;
    }

    public function resetForm()
    {
        $this->reset(['no_pendaftaran', 'nama', 'alamat', 'jenis_pelanggan', 'spesifikasi_meter', 'jumlah_biaya_pasang']);
    }

    public function save()
    {
        // Logika untuk menyimpan data
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.tagihan.sambungan-baru');
    }
}