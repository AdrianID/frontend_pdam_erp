<?php

namespace App\Livewire\Gudang;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Barang;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\DB;

class StokBarang extends Component
{
    use WithPagination;

    public $search = '';
    public $kategori = '';
    public $stokRendah = false;
    public $perPage = 10;
    public $showSummary = true; // Tambahkan toggle untuk summary

    protected $queryString = [
        'search' => ['except' => ''],
        'kategori' => ['except' => ''],
        'stokRendah' => ['except' => false],
        'perPage' => ['except' => 10]
    ];

    public function resetFilters()
    {
        $this->reset(['search', 'kategori', 'stokRendah']);
        $this->resetPage();
    }

    public function toggleSummary()
    {
        $this->showSummary = !$this->showSummary;
    }

    #[Layout('layouts.app')]
    public function render()
    {
        // Query untuk daftar barang
        $barangs = Barang::query()
            ->when($this->search, function($query) {
                $query->where('nama_barang', 'like', '%'.$this->search.'%')
                      ->orWhere('kode_barang', 'like', '%'.$this->search.'%');
            })
            ->when($this->kategori, function($query) {
                $query->where('kategori', $this->kategori);
            })
            ->when($this->stokRendah, function($query) {
                $query->whereColumn('stok_tersedia', '<=', 'stok_minimal');
            })
            ->orderBy('nama_barang')
            ->paginate($this->perPage);

        // Query untuk summary stok per kategori
        $stokSummary = Barang::select(
                'kategori',
                DB::raw('SUM(stok_tersedia) as total_stok'),
                DB::raw('SUM(stok_minimal) as total_stok_minimal'),
                DB::raw('COUNT(*) as jumlah_barang')
            )
            ->when($this->search, function($query) {
                $query->where('nama_barang', 'like', '%'.$this->search.'%')
                      ->orWhere('kode_barang', 'like', '%'.$this->search.'%');
            })
            ->when($this->kategori, function($query) {
                $query->where('kategori', $this->kategori);
            })
            ->groupBy('kategori')
            ->orderBy('kategori')
            ->get();

        $kategoriList = Barang::select('kategori')
            ->distinct()
            ->pluck('kategori');

        return view('livewire.gudang.stok-barang', [
            'barangs' => $barangs,
            'kategoriList' => $kategoriList,
            'stokSummary' => $stokSummary
        ]);
    }
}