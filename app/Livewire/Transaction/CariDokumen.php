<?php

namespace App\Livewire\Transaction;

use Livewire\Component;
use Livewire\Attributes\Title;


class CariDokumen extends Component
{
    #[Title('Peminjaman')]
    
    public function render()
    {
        return view('livewire.transaction.cari-dokumen');
    }
}
