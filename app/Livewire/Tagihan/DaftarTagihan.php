<?php

namespace App\Livewire\Tagihan;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;
use App\Models\Pelanggan;

class DaftarTagihan extends Component
{
    use WithPagination;
    
    public $search = '';
    public $isLoading = false;
    public $perPage = 10;
    public $successMessage = '';
    public $errorMessage = '';
    public $showConfirmationModal = false;
    public $selectedPelangganId;
    public $selectedPelangganName;

    #[Layout('layouts.app')]
    public function render()
    {
        $this->isLoading = true;
        
        $pelanggan = Pelanggan::with(['kecamatan', 'desa'])
            ->whereIn('status', ['billing', 'paid'])
            ->when($this->search, function($query) {
                $query->where(function($q) {
                    $q->where('nama_pelanggan', 'like', '%'.$this->search.'%')
                      ->orWhere('nomor_pelanggan', 'like', '%'.$this->search.'%')
                      ->orWhere('nomor_meteran', 'like', '%'.$this->search.'%')
                      ->orWhere('nomor_telp', 'like', '%'.$this->search.'%');
                });
            })
            ->orderBy('status') // billing first
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);
            
        $this->isLoading = false;

        return view('livewire.tagihan.daftar-tagihan', [
            'pelanggan' => $pelanggan
        ]);
    }

    public function confirmPayment($id)
    {
        $pelanggan = Pelanggan::find($id);
        
        if (!$pelanggan) {
            $this->errorMessage = 'Pelanggan tidak ditemukan!';
            return;
        }
        
        $this->selectedPelangganId = $id;
        $this->selectedPelangganName = $pelanggan->nama_pelanggan;
        $this->showConfirmationModal = true;
    }

    public function markAsPaid()
    {
        $pelanggan = Pelanggan::find($this->selectedPelangganId);
        
        if ($pelanggan) {
            $pelanggan->update([
                'status' => 'paid',
                'paid_at' => now()
            ]);
            
            $this->successMessage = 'Status pelanggan '.$pelanggan->nama_pelanggan.' berhasil diubah menjadi Lunas!';
            $this->closeModal();
        }
    }

    public function cancelApproval($id)
    {
        $pelanggan = Pelanggan::find($id);
        
        if ($pelanggan) {
            $pelanggan->update([
                'status' => 'billing',
                'paid_at' => null
            ]);
            
            $this->successMessage = 'Status pelanggan '.$pelanggan->nama_pelanggan.' dikembalikan ke Billing!';
        }
    }

    public function closeModal()
    {
        $this->reset(['showConfirmationModal', 'selectedPelangganId', 'selectedPelangganName']);
    }

    public function resetFilters()
    {
        $this->reset(['search']);
        $this->resetPage();
    }
}