<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class CustomerDetail extends Component
{
    public $customer;
    public $customerId;
    public $error = null;
    public $activeTab = 'profile';
    public function mount($id)
    {
        $this->customerId = $id;
        $this->fetchCustomerData();
    }

    public function fetchCustomerData()
    {
        try {
            $response = Http::withToken('eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyX2lkIjoxLCJlbWFpbCI6ImVsaTc4QGV4YW1wbGUuY29tIiwicm9sZSI6InBlbGFuZ2dhbiIsImV4cCI6MTc0MjI3OTYyMn0.rKLU56AffQeFX1ktXh6grRq8fXx8Xuds5KD68WI28r4')
                ->get("http://45.80.181.85:8001/pelanggan/{$this->customerId}");
            
            if ($response->successful()) {
                $data = $response->json();
                
                if ($data['status'] === true) {
                    $this->customer = $data['data'];
                } else {
                    $this->error = 'Gagal mengambil data pelanggan';
                }
            } else {
                $this->error = 'Terjadi kesalahan saat mengambil data';
            }
        } catch (\Exception $e) {
            $this->error = 'Terjadi kesalahan: ' . $e->getMessage();
        }
    }
    public function setActiveTab($tab)
    {
        $this->activeTab = $tab;
    }

    public function render()
    {
        return view('livewire.customer-detail')
            ->layout('layouts.app');
    }
} 