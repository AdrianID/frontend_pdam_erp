<?php

namespace App\Livewire\Tagihan;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;
use App\Models\Pelanggan;
use App\Models\Tagihan;
use App\Models\Kategori;
use Carbon\Carbon;

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
    public $selectedPelangganDetails;
    public $total_tagihan;
    public $catatan;
    public $tanggal_jatuh_tempo;
    public $statusFilter = 'all'; // 'all', 'billing', 'paid'

    protected $rules = [
        'total_tagihan' => 'required|numeric|min:0',
        'tanggal_jatuh_tempo' => 'required|date',
        'catatan' => 'nullable|string|max:255',
    ];

    public function mount()
    {
        $this->tanggal_jatuh_tempo = Carbon::now()->addDays(30)->format('Y-m-d');
    }

    #[Layout('layouts.app')]
    public function render()
    {
        $this->isLoading = true;
        
        $pelanggan = Pelanggan::with(['kecamatan', 'desa', 'kategori'])
            ->whereIn('status', ['billing', 'paid'])
            ->when($this->search, function($query) {
                $query->where(function($q) {
                    $q->where('nama_pelanggan', 'like', '%'.$this->search.'%')
                      ->orWhere('nomor_pelanggan', 'like', '%'.$this->search.'%')
                      ->orWhere('nomor_meteran', 'like', '%'.$this->search.'%')
                      ->orWhere('nomor_telp', 'like', '%'.$this->search.'%');
                });
            })
            // ->orderBy('status') // billing first
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);
            
        $this->isLoading = false;

        return view('livewire.tagihan.daftar-tagihan', [
            'pelanggan' => $pelanggan
        ]);
    }

    public function confirmPayment($id)
    {
        $pelanggan = Pelanggan::with(['kecamatan', 'desa', 'kategori'])->find($id);
        
        if (!$pelanggan) {
            $this->errorMessage = 'Pelanggan tidak ditemukan!';
            return;
        }
        
        $this->selectedPelangganId = $id;
        $this->selectedPelangganName = $pelanggan->nama_pelanggan;
        $this->selectedPelangganDetails = $pelanggan;
        
        // Set default total tagihan from kategori biaya_pasang
        if ($pelanggan->kategori) {
            $this->total_tagihan = $pelanggan->kategori->biaya_pasang;
        }
        
        $this->showConfirmationModal = true;
    }

 // app/Livewire/Tagihan/DaftarTagihan.php
public function markAsPaid()
{
    // $this->validate([
    //     'total_tagihan' => 'required|numeric|min:0',
    //     'tanggal_jatuh_tempo' => 'required|date',
    //     'catatan' => 'nullable|string|max:255'
    // ]);

    // Format angka (handle comma sebagai decimal separator)
    $totalTagihan = str_replace(',', '.', str_replace('.', '', $this->total_tagihan));
    $totalTagihan = (float) number_format((float) $totalTagihan, 2, '.', '');

    $pelanggan = Pelanggan::with('kategori')->find($this->selectedPelangganId);
    // $totalTagihan = round((float) $this->total_tagihan, 2);
    // dd($totalTagihan);
    
    if ($pelanggan) {
        Tagihan::create([
            'pelanggan_id' => $this->selectedPelangganId,
            'kategori_id' => $pelanggan->kategori_id,
            'nomor_tagihan' => 'INV-'.time(),
            'total_tagihan' => $totalTagihan, // Nilai sudah diformat
            'status' => 'paid',
            'tanggal_tagihan' => now(),
            'tanggal_jatuh_tempo' => $this->tanggal_jatuh_tempo,
            'catatan' => $this->catatan
        ]);

        $pelanggan->update([
            'status' => 'paid',
            'paid_at' => now()
        ]);

        $this->successMessage = 'Pembayaran berhasil dicatat!';
        $this->resetModal();
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
        $this->resetModal();
    }

    private function resetModal()
    {
        $this->reset([
            'showConfirmationModal', 
            'selectedPelangganId', 
            'selectedPelangganName',
            'selectedPelangganDetails',
            'total_tagihan',
            'catatan',
            'tanggal_jatuh_tempo'
        ]);
        $this->tanggal_jatuh_tempo = Carbon::now()->addDays(30)->format('Y-m-d');
        $this->resetErrorBag();
    }


    public function applyFilter($status)
    {
        $this->statusFilter = $status;
        $this->resetPage();
    }

    public function resetFilters()
    {
        $this->reset(['search', 'statusFilter']);
        $this->resetPage();
    }
}