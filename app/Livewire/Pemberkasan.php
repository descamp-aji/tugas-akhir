<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;


class Pemberkasan extends Component
{
    #[Title('Pemberkasan')]
    
    public function render()
    {
        return view('livewire.pemberkasan');
    }
}
