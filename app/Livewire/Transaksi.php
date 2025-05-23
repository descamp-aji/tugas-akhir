<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;


class Transaksi extends Component
{
    #[Title('Peminjaman')]
    
    public function render()
    {
        return view('livewire.transaksi');
    }
}
