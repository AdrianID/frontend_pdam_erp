<?php

namespace App\Livewire\Gudang;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Barang;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Event;

class TambahBarang extends Component
{
    public $nomor, $kode_barang, $nama_barang, $deskripsi, $kategori, $satuan, $stok_minimal, $stok_tersedia, $harga_satuan;
    
    public $showSuccessNotification = false;
    public $showErrorNotification = false;
    public $errorMessage = '';
    public $isSubmitting = false;

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.gudang.tambah-barang');
    }

    public function save()
    {
        $this->isSubmitting = true;
        $this->showSuccessNotification = false;
        $this->showErrorNotification = false;
        
        try {
            $validated = $this->validate([
                'kode_barang' => ['required', Rule::unique('barang', 'kode_barang')],
                'nama_barang' => 'required|string|max:255',
                'deskripsi' => 'nullable|string',
                'kategori' => 'required|string|max:255',
                'satuan' => 'required|string|max:255',
                'stok_minimal' => 'required|integer|min:0',
                'stok_tersedia' => 'required|integer|min:0',
                'harga_satuan' => [
                    'required',
                    'numeric',
                    'min:0',
                    'max:9999999999.99', // Batas untuk NUMERIC(12,2)
                    function ($attribute, $value, $fail) {
                        if ($value > 9999999999.99) {
                            $fail('Harga satuan tidak boleh melebihi 9.999.999.999,99');
                        }
                    }
                ],
            ]);

            Barang::create($validated);

            $this->resetForm();
            $this->showSuccessNotification = true;
            $this->dispatch('barang-saved');
            
        } catch (\Exception $e) {
            $this->showErrorNotification = true;
            $this->errorMessage = 'Gagal menyimpan data: ' . $e->getMessage();
        } finally {
            $this->isSubmitting = false;
        }
    }

    public function resetForm()
    {
        $this->reset([
            'nomor',
            'kode_barang',
            'nama_barang',
            'deskripsi',
            'kategori',
            'satuan',
            'stok_minimal',
            'stok_tersedia',
            'harga_satuan'
        ]);
        
        $this->resetErrorBag();
        $this->resetValidation();
    }
}