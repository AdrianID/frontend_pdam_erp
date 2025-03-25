<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;
use App\Models\Pelanggan;
use App\Models\Barang;
use Illuminate\Support\Facades\DB;

class CustomerVerifier extends Component
{
    use WithPagination;
    
    public $search = '';
    public $isLoading = false;
    public $perPage = 10;
    public $successMessage = '';
    public $errorMessage = '';
    public $filterStatus = '';

    #[Layout('layouts.app')]
    public function render()
    {
        $this->isLoading = true;
        
        $pelanggan = Pelanggan::with(['kecamatan', 'desa', 'kategori'])
            ->when($this->search, function($query) {
                $query->where('nama_pelanggan', 'like', '%'.$this->search.'%')
                      ->orWhere('nomor_pelanggan', 'like', '%'.$this->search.'%')
                      ->orWhere('nomor_meteran', 'like', '%'.$this->search.'%')
                      ->orWhere('nomor_telp', 'like', '%'.$this->search.'%');
            })
            ->when($this->filterStatus, function($query) {
                $query->where('status', $this->filterStatus);
            })
            ->orderBy('created_at', 'desc')
            ->orderByRaw("CASE WHEN status = 'pending' THEN 0 ELSE 1 END, created_at DESC")
            ->whereIn('status', ['pending', 'verified'])
            ->paginate($this->perPage);
            
        $this->isLoading = false;

        return view('livewire.customer-verifier', [
            'pelanggan' => $pelanggan,
            'stokMeteran' => $this->getTotalStokMeteran(),
            'statusOptions' => ['pending', 'verified',]
        ]);
    }

    public function approveCustomer($id)
    {
        $this->resetMessages();
        
        // Cek stok meteran tersedia
        $totalStokMeteran = $this->getTotalStokMeteran();
        
        if ($totalStokMeteran < 1) {
            $this->errorMessage = 'Verifikasi gagal! Stok meteran tidak tersedia.';
            return;
        }
        
        // Verifikasi pelanggan
        $pelanggan = Pelanggan::find($id);
        
        if (!$pelanggan) {
            $this->errorMessage = 'Pelanggan tidak ditemukan!';
            return;
        }
        
        if ($pelanggan->status != 'pending') {
            $this->errorMessage = 'Pelanggan sudah terverifikasi sebelumnya!';
            return;
        }
        
        // Kurangi stok meteran (ambil barang meteran pertama yang tersedia)
        $barangMeteran = Barang::where('kategori', 'meteran')
            ->where('stok_tersedia', '>', 0)
            ->orderBy('stok_tersedia', 'desc')
            ->first();
            
        if (!$barangMeteran) {
            $this->errorMessage = 'Tidak ada stok meteran yang tersedia!';
            return;
        }
        
        DB::transaction(function () use ($pelanggan, $barangMeteran) {
            // Update stok barang
            $barangMeteran->decrement('stok_tersedia');
            
            // Update status pelanggan
            $pelanggan->update([
                'status' => 'billing',
                'verified_at' => now(),
                'meteran_id' => $barangMeteran->id // Simpan ID meteran yang digunakan
            ]);
        });
        
        $this->successMessage = 'Pelanggan '.$pelanggan->nama_pelanggan.' berhasil diverifikasi! Stok meteran berkurang 1.';
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