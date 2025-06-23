<?php

namespace App\Livewire\Users;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Attributes\Title;

use function Laravel\Prompts\password;

#[Layout('layouts.guest')]

class Login extends Component
{
    #[Title('User Login')]

    public string $nip="";
    public string $password="";
    public $showPassword=false;

    public function toggleShow()
    {
        $this->showPassword = !$this->showPassword;
    }

    public function login()
    {
        if(Auth::attempt($this->only('nip', 'password'))){
            return redirect()->route('home');
        }
        throw ValidationException::withMessages([
            'error' => 'Nip atau Password salah'
        ]);
    }

    public function render()
    {
        return view('livewire.users.login');
    }
}
