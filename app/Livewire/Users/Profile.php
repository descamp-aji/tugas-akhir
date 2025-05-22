<?php

namespace App\Livewire\Users;

use Livewire\Attributes\Title;
use Livewire\Component;


class Profile extends Component
{    

    
    #[Title('User Profile')]
    public function render()
    {
        return view('livewire.users.profile');
    }
}
