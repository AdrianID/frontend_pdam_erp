<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Http;

class DataGrid extends Component
{
    public $customers = [];

    public function mount()
    {
        $this->fetchCustomers();
    }

    public function fetchCustomers()
    {
        try {
            $response = Http::withToken('eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyX2lkIjoxLCJlbWFpbCI6ImVsaTc4QGV4YW1wbGUuY29tIiwicm9sZSI6InBlbGFuZ2dhbiIsImV4cCI6MTc0MjIyNjY0MX0.oONux4OU8r6CCbD4ESUSSfLIqb-QKZxBx-hHcGFA4JA')
                ->get('http://45.80.181.85:8001/pelanggan');
            if ($response->successful()) {
                $this->customers = $response->json()['data'];
            }
        } catch (\Exception $e) {
            // Handle error
            $this->customers = [];
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