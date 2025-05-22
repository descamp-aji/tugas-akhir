<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;


class Peminjaman extends Component
{
    #[Title('Peminjaman')]
    
    public function render()
    {
        return view('livewire.peminjaman');
    }
}
