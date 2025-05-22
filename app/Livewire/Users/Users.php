<?php

namespace App\Livewire\Users;

use Livewire\Attributes\Title;
use Livewire\Component;

class Users extends Component
{
    #[Title('User Control')]
    public function render()
    {
        return view('livewire.users.users');
    }
}
