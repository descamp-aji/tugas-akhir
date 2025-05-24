<?php

namespace App\Livewire\Users;

use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\User;

class Users extends Component
{
    #[Title('User Control')]
    public function render()
    {
        $users = User::get();
        $view_data = [
            'users' => $users
        ];
        return view('livewire.users.users', $view_data);
    }
}
