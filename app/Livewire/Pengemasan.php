<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;


class Pengemasan extends Component
{
    #[Title('Pengemasan')]
    
    public function render()
    {
        return view('livewire.pengemasan');
    }
}
