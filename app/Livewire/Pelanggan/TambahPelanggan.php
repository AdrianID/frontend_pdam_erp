<?php

namespace App\Livewire\Pelanggan;

use Livewire\Attributes\Layout;
use Livewire\Component;

class TambahPelanggan extends Component
{
    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.pelanggan.tambah-pelanggan');
    }
}
