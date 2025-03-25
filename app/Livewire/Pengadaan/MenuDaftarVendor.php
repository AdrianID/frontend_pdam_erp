<?php

namespace App\Livewire\Pengadaan;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Vendor;
use Livewire\Attributes\Layout;

class MenuDaftarVendor extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;
    public $sortField = 'nama_vendor';
    public $sortDirection = 'asc';

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortField = $field;
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.pengadaan.menu-daftar-vendor', [
            'vendors' => Vendor::when($this->search, function ($query) {
                    return $query->where('nama_vendor', 'like', '%'.$this->search.'%')
                                ->orWhere('nomor_telp', 'like', '%'.$this->search.'%')
                                ->orWhere('email', 'like', '%'.$this->search.'%');
                })
                ->orderBy($this->sortField, $this->sortDirection)
                ->paginate($this->perPage)
        ]);
    }
}