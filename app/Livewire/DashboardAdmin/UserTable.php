<?php

namespace App\Livewire\DashboardAdmin;

use App\Services\ApiService;
use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class UserTable extends Component
{
    public $showModal = false;
    public $modalType = 'add';
    public $modalTitle = 'Add User';
    public $users = [];

    public function mount()
    {
        $apiService = new ApiService();
        
        $response = $apiService->request('GET', 'pelanggan/');
        $this->users = $response['data'];
    }

    public function render()
    {
        return view('livewire.dashboard-admin.user-table', [
            'data' => $this->users,
        ])
        ->extends('layouts.app')
        ->section('content');
    }
}