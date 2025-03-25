<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;
use App\Models\Pelanggan;

class CustomerVerifier extends Component
{
    use WithPagination;
    
    public $search = '';
    
    public $customers = [];
    public $isLoading = false;
    public $currentPage = 1;
    public $lastPage = 1;
    public $total = 0;
    public $perPage = 10;
    public $pelanggan = [];
    
    public function mount()
    {
        $this->render();
    }

    public function updatedSearch()
    {
        $this->resetPage();
        $this->render();
    }

    public function previousPage()
    {
        if ($this->currentPage > 1) {
            $this->currentPage--;
            $this->render();
        }
    }

    public function nextPage()
    {
        if ($this->currentPage < $this->lastPage) {
            $this->currentPage++;
            $this->render();
        }
    }

    public function gotoPage($page)
    {
        if ($page >= 1 && $page <= $this->lastPage) {
            $this->currentPage = $page;
            $this->render();
        }
    }

    public function deleteCustomer($id)
    {
        Pelanggan::find($id)->delete();
    }

    public function approveCustomer($id)
    {
        $customer = Pelanggan::find($id);
        if ($customer) {
            $customer->status = 'approved';
            $customer->save();
        }
    }

    #[Layout('layouts.app')]
    public function render()
    {
        $this->isLoading = true;
        $this->pelanggan = Pelanggan::all();
        $this->isLoading = false;

        return view('livewire.customer-verifier', ['pelanggan' => $this->pelanggan]);
    }
} 