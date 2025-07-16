<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use App\Models\Seksi;


#[Layout('layouts.guest')]

class Registration extends Component
{
    #[Title('User Registration')]

    public $nip;
    public $name;
    public $email;
    public $role;
    public $phone;
    public $seksi_id;
    public $password='';
    public $password_confirmation='';
    public $showPassword=false;

    public function toggleShow()
    {
        $this->showPassword = !$this->showPassword;
    }

    public function save(){
        $validated = $this->validate([
            'nip' => 'required|string|size:9|unique:users',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'role' => 'required',
            'phone' => 'required|unique:users',
            'seksi_id' => 'required',
            'password' => 'required|min:8|confirmed'
        ]);

        $validated['password'] = bcrypt($validated['password']);
        $validated['name'] = ucwords(strtolower($validated['name']));
        $validated['email'] = strtolower($validated['email']);

        User::create($validated);

        $this->nip=null;
        $this->name=null;
        $this->email=null;
        $this->role=null;
        $this->phone=null;
        $this->seksi_id=null;
        $this->password=null;
        $this->password_confirmation=null;

        session()->flash('success', 'Pengguna Berkas berhasil didaftarkan!');;
    }

    public function render()
    {
        return view('livewire.users.registration', [
            'seksi' => Seksi::all()
        ]);
    }
}
