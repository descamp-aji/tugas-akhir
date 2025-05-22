<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('layouts.guest')]

class Registration extends Component
{
    #[Title('User Registration')]

    public $nip='';
    public $name='';
    public $email='';
    public $role='';
    public $password='';
    public $password_confirmation="";

    public function save(){
        $validated = $this->validate([
            'nip' => 'required|string|size:9|unique:users',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'role' => 'required',
            'password' => 'required|min:8|confirmed'
        ]);

        $validated['password'] = bcrypt($validated['password']);

        User::create($validated);

        return redirect('/')->with('success', 'Akun berhasil didaftarkan');
    }

    public function render()
    {
        return view('livewire.users.registration');
    }
}
