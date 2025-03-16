<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\ApiService;
use Illuminate\Support\Facades\Cache;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.dashboard')->layout('layouts.app');
    }
} 