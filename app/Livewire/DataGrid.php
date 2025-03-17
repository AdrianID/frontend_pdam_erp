<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Url;

class DataGrid extends Component
{
    use WithPagination;
    
    #[Url(history: true)]
    public $search = '';
    
    public $customers = [];
    public $isLoading = false;
    public $currentPage = 1;
    public $lastPage = 1;
    public $total = 0;
    public $perPage = 10;
    
    public function mount()
    {
        $this->fetchCustomers();
    }

    public function updatedSearch()
    {
        $this->resetPage();
        $this->fetchCustomers();
    }

    public function fetchCustomers()
    {
        try {
            $this->isLoading = true;
            
            $url = 'http://45.80.181.85:8001/pelanggan';
            if (!empty(trim($this->search))) {
                $url = "http://45.80.181.85:8001/pelanggan/search?q=" . urlencode($this->search);
            }

            // Add pagination parameters
            $url .= (parse_url($url, PHP_URL_QUERY) ? '&' : '?') . "page={$this->currentPage}&per_page={$this->perPage}";

            $response = Http::withToken(session('token'))
                ->get($url);

            if ($response->successful()) {
                $data = $response->json();
                $this->customers = $data['data'];
                $this->currentPage = $data['current_page'] ?? 1;
                $this->lastPage = $data['last_page'] ?? 1;
                $this->total = $data['total'] ?? count($this->customers);
            }
        } catch (\Exception $e) {
            $this->customers = [];
        } finally {
            $this->isLoading = false;
        }
    }

    public function previousPage()
    {
        if ($this->currentPage > 1) {
            $this->currentPage--;
            $this->fetchCustomers();
        }
    }

    public function nextPage()
    {
        if ($this->currentPage < $this->lastPage) {
            $this->currentPage++;
            $this->fetchCustomers();
        }
    }

    public function gotoPage($page)
    {
        if ($page >= 1 && $page <= $this->lastPage) {
            $this->currentPage = $page;
            $this->fetchCustomers();
        }
    }

    public function deleteCustomer($id)
    {
        // $response = Http::withToken('eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyX2lkIjoxLCJlbWFpbCI6ImVsaTc4QGV4YW1wbGUuY29tIiwicm9sZSI6InBlbGFuZ2dhbiIsImV4cCI6MTc0MjIyNjY0MX0.oONux4OU8r6CCbD4ESUSSfLIqb-QKZxBx-hHcGFA4JA')
        //     ->delete("http://45.80.181.85:8001/pelanggan/{$id}");
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.data-grid');
    }
} 