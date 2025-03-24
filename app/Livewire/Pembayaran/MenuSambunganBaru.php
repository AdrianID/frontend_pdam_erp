<?php

namespace App\Livewire\Pembayaran;

use Livewire\Attributes\Layout;
use Livewire\Component;

class MenuSambunganBaru extends Component
{
    public $nomor_pelanggan;
    public $nama;
    public $alamat;
    public $jenis;
    public $nomor_telp;
    public $nomor_tagihan;
    public $tanggal_tagihan;
    public $jumlah_tagihan;
    public $jumlah_pembayaran;
    public $disclaimer = false;

    public $pelangganList = [
        [
            'id' => 1,
            'nomor_pelanggan' => 'PLG001',
            'nama' => 'John Doe',
            'alamat' => 'Jl. Contoh No. 123',
            'jenis' => 'Rumah Tangga',
            'nomor_telp' => '081234567890',
            'nomor_tagihan' => 'TAG001',
            'tanggal_tagihan' => '2023-10-01',
            'jumlah_tagihan' => '1.741.300',
        ],
        [
            'id' => 2,
            'nomor_pelanggan' => 'PLG002',
            'nama' => 'Jane Doe',
            'alamat' => 'Jl. Contoh No. 456',
            'jenis' => 'Niaga Kecil',
            'nomor_telp' => '081234567891',
            'nomor_tagihan' => 'TAG002',
            'tanggal_tagihan' => '2023-10-02',
            'jumlah_tagihan' => '2.816.000',
        ],
    ];

    public function loadPelangganData()
    {
        $pelanggan = collect($this->pelangganList)->firstWhere('id', $this->nomor_pelanggan);
        if ($pelanggan) {
            $this->nama = $pelanggan['nama'];
            $this->alamat = $pelanggan['alamat'];
            $this->jenis = $pelanggan['jenis'];
            $this->nomor_telp = $pelanggan['nomor_telp'];
            $this->nomor_tagihan = $pelanggan['nomor_tagihan'];
            $this->tanggal_tagihan = $pelanggan['tanggal_tagihan'];
            $this->jumlah_tagihan = $pelanggan['jumlah_tagihan'];
        } else {
            $this->reset(['nama', 'alamat', 'jenis', 'nomor_telp', 'nomor_tagihan', 'tanggal_tagihan', 'jumlah_tagihan']);
        }
    }

    public function resetForm()
    {
        $this->reset([
            'nomor_pelanggan', 'nama', 'alamat', 'jenis', 'nomor_telp', 
            'nomor_tagihan', 'tanggal_tagihan', 'jumlah_tagihan', 
            'jumlah_pembayaran', 'disclaimer'
        ]);
    }

    public function save()
    {
        // Logika untuk menyimpan data
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.pembayaran.menu-sambungan-baru');
    }
}