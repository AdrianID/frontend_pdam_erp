<?php

namespace App\Livewire\Pelanggan;

use Livewire\Attributes\Layout;
use Livewire\Component;

class InputMasterSpks extends Component
{
    public $kecamatan;
    public $desa;
    public $kecamatan_input;
    public $desa_input;
    public $alamat;
    public $jenis_pelanggan;
    public $no_spks;
    public $no_sr;
    public $nama_spks;
    public $kuota;
    public $biaya;
    public $keterangan;

    public $kecamatanList = [
        ['id' => 1, 'nama' => 'Kecamatan A'],
        ['id' => 2, 'nama' => 'Kecamatan B'],
        ['id' => 3, 'nama' => 'Kecamatan C'],
    ];

    public $desaList = [
        ['id' => 1, 'nama' => 'Desa X', 'kecamatan_id' => 1],
        ['id' => 2, 'nama' => 'Desa Y', 'kecamatan_id' => 1],
        ['id' => 3, 'nama' => 'Desa Z', 'kecamatan_id' => 2],
    ];

    public $alamatList = [
        ['id' => 1, 'nama' => 'Alamat 1 - Zona A - Unit 1'],
        ['id' => 2, 'nama' => 'Alamat 2 - Zona B - Unit 2'],
        ['id' => 3, 'nama' => 'Alamat 3 - Zona C - Unit 3'],
    ];

    public function loadDesa()
    {
        $this->desaList = collect($this->desaList)->where('kecamatan_id', $this->kecamatan)->values();
        $kecamatan = collect($this->kecamatanList)->firstWhere('id', $this->kecamatan);
        $this->kecamatan_input = $kecamatan ? $kecamatan['nama'] : '';
    }

    public function updatedDesa()
    {
        $desa = collect($this->desaList)->firstWhere('id', $this->desa);
        $this->desa_input = $desa ? $desa['nama'] : '';
    }

    public function resetForm()
    {
        $this->reset([
            'kecamatan', 'desa', 'kecamatan_input', 'desa_input', 'alamat', 
            'jenis_pelanggan', 'no_spks', 'no_sr', 'nama_spks', 'kuota', 'biaya', 'keterangan'
        ]);
    }

    public function save()
    {
        // Logika untuk menyimpan data
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.pelanggan.input-master-spks');
    }
}