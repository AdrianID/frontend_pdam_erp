<?php

namespace App\Livewire\NaskahDinas;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Pelanggan;
use App\Models\Barang;
use App\Models\SuratPerintahKerja;

class DaftarSPK extends Component
{
    public $successMessage;
    public $errorMessage;

    #[Layout('layouts.app')]
    public function render()
    {
        $suratPerintahKerja = SuratPerintahKerja::query()
            ->select('id', 'nomor_surat', 'tanggal_surat', 'nama_pemohon', 'alamat_pemohon', 'status')
            ->whereIn('status', ['draft', 'dikirim']) 
            ->orderBy('id', 'desc')
            ->get();

        return view('livewire.naskah-dinas.daftar-spk', [
            'suratPerintahKerja' => $suratPerintahKerja
        ]);
    }

    public function approveCustomer($id)
    {
        $this->resetMessages();
        
        // Attempt to find the Surat Perintah Kerja by ID
        $spk = SuratPerintahKerja::find($id);
        
        if (!$spk) {
            $this->errorMessage = 'Surat Perintah Kerja tidak ditemukan!';
            return;
        }
        
        if ($spk->status != 'draft') {
            $this->errorMessage = 'Surat Perintah Kerja sudah terverifikasi sebelumnya!';
            return;
        }
        
        // Update the status of the Surat Perintah Kerja to 'verified'
        $spk->update([
            'status' => 'dikirim',
            'verified_at' => now()
        ]);
        
        $this->successMessage = 'Surat Perintah Kerja berhasil diverifikasi!';
    }

    public function rejectCustomer($id)
    {
        $pelanggan = Pelanggan::find($id);
        
        if ($pelanggan) {
            $pelanggan->update([
                'status' => 'rejected',
                'rejected_at' => now()
            ]);
            $this->successMessage = 'Pelanggan '.$pelanggan->nama_pelanggan.' ditolak.';
        }
    }

    public function deleteCustomer($id)
    {
        $pelanggan = Pelanggan::find($id);
        if ($pelanggan) {
            $pelanggan->delete();
            $this->successMessage = 'Pelanggan '.$pelanggan->nama_pelanggan.' berhasil dihapus!';
        }
    }

    private function getTotalStokMeteran()
    {
        return Barang::where('kategori', 'meteran')->sum('stok_tersedia');
    }

    private function resetMessages()
    {
        $this->reset(['successMessage', 'errorMessage']);
    }

    public function resetFilters()
    {
        $this->reset(['search', 'filterStatus']);
        $this->resetPage();
    }
}
