<?php

namespace App\Livewire\Tagihan;

use Livewire\Attributes\Layout;
use Livewire\Component;

class MenuBuatTagihan extends Component
{
    public $jenis_tagihan;
    public $nomor_pelanggan;
    public $nama;
    public $alamat;
    public $jenis_pelanggan;
    public $nomor_telp;
    public $spesifikasi_meter;
    public $biaya;
    public $ppn;
    public $total_tagihan;
    public $durasi_tagihan;

    public $pelangganList = [
        [
            'id' => 1,
            'nomor_pelanggan' => 'PLG001',
            'nama' => 'John Doe',
            'alamat' => 'Jl. Contoh No. 123',
            'jenis_pelanggan' => 'Rumah Tangga',
            'nomor_telp' => '081234567890',
            'spesifikasi_meter' => '1/2"',
            'biaya' => 1741300,
        ],
        [
            'id' => 2,
            'nomor_pelanggan' => 'PLG002',
            'nama' => 'Jane Doe',
            'alamat' => 'Jl. Contoh No. 456',
            'jenis_pelanggan' => 'Niaga Kecil',
            'nomor_telp' => '081234567891',
            'spesifikasi_meter' => '3/4"',
            'biaya' => 2816000,
        ],
    ];

    public function loadPelangganData()
    {
        $pelanggan = collect($this->pelangganList)->firstWhere('id', $this->nomor_pelanggan);
        if ($pelanggan) {
            $this->nama = $pelanggan['nama'];
            $this->alamat = $pelanggan['alamat'];
            $this->jenis_pelanggan = $pelanggan['jenis_pelanggan'];
            $this->nomor_telp = $pelanggan['nomor_telp'];
            $this->spesifikasi_meter = $pelanggan['spesifikasi_meter'];
            $this->biaya = $pelanggan['biaya'];
            $this->hitungPPN();
            $this->hitungTotalTagihan();
            $this->hitungDurasiTagihan();
        } else {
            $this->reset(['nama', 'alamat', 'jenis_pelanggan', 'nomor_telp', 'spesifikasi_meter', 'biaya', 'ppn', 'total_tagihan', 'durasi_tagihan']);
        }
    }

    public function hitungPPN()
    {
        $this->ppn = $this->biaya * 0.11;
    }

    public function hitungTotalTagihan()
    {
        $this->total_tagihan = $this->biaya + $this->ppn;
    }

    public function hitungDurasiTagihan()
    {
        switch ($this->jenis_tagihan) {
            case 'sambungan_baru':
                $this->durasi_tagihan = '30 Hari';
                break;
            case 'penggunaan_air':
                $this->durasi_tagihan = '1 Bulan';
                break;
            case 'pemeliharaan':
                $this->durasi_tagihan = '14 Hari';
                break;
            default:
                $this->durasi_tagihan = '';
                break;
        }
    }

    public function resetForm()
    {
        $this->reset([
            'jenis_tagihan', 'nomor_pelanggan', 'nama', 'alamat', 'jenis_pelanggan', 
            'nomor_telp', 'spesifikasi_meter', 'biaya', 'ppn', 'total_tagihan', 'durasi_tagihan'
        ]);
    }

    public function save()
    {
        // Logika untuk mencetak tagihan
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.tagihan.menu-buat-tagihan');
    }
}