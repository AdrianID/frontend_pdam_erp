<?php

namespace App\Livewire\Gudang;

use Livewire\Attributes\Layout;
use Livewire\Component;

class MenuBarang extends Component
{
    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.gudang.menu-barang');
    }
}
