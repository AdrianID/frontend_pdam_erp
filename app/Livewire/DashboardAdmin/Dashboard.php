<?php

namespace App\Livewire\DashboardAdmin;

use Livewire\Component;

class Dashboard extends Component
{
    // You can add properties for your dashboard data here
    public $salesData = [];
    public $ordersData = [];
    public $pageVisits = [];
    public $socialTraffic = [];
    
    public function mount()
    {
        // Initialize with sample data (replace with real data from your database)
        $this->salesData = [
            'labels' => ['May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            'values' => [25, 20, 30, 22, 17, 29, 32, 27]
        ];
        
        $this->ordersData = [
            'labels' => ['May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            'values' => [15, 25, 20, 30, 22, 17, 29, 32]
        ];
        
        $this->pageVisits = [
            ['page' => '/argon/', 'visitors' => '4,569', 'users' => '340', 'bounce' => '46.53%', 'status' => 'green'],
            ['page' => '/argon/index.html', 'visitors' => '3,985', 'users' => '319', 'bounce' => '46.53%', 'status' => 'yellow']
        ];
        
        $this->socialTraffic = [
            ['referral' => 'Facebook', 'visitors' => '1,480', 'percentage' => '60%', 'status' => 'red'],
            ['referral' => 'Google', 'visitors' => '4,807', 'percentage' => '80%', 'status' => 'blue']
        ];
    }

    public function render()
    {
        return view('livewire.dashboard-admin.dashboard')
            ->extends('layouts.app')
            ->section('content');
    }
}
