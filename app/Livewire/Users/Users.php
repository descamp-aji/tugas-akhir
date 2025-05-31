<?php

namespace App\Livewire\Users;

use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\User;
use Livewire\Attributes\Validate;

class Users extends Component
{
    #[Title('User Control')]

    public $selectedUserId;
    public $userId;
    public $nip;
    public $name;
    public $email;
    public $role;
    public $password='';
    public $password_confirmation='';
    public $showPassword=false;

    protected function rules(){
        return [
            'nip' => 'required|string|size:9|unique:users,nip,' . $this->userId,
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->userId,
            'role' => 'required',
            'password' => 'min:8|confirmed'
        ];
    }

    public function selectedUser($id)
    {
        $this->selectedUserId = $id;
    }

    public function toggleShow()
    {
        $this->showPassword = !$this->showPassword;
    }

    public function edit($id)
    {
        $selected_user = User::findOrFail($id);
        $this->userId = $selected_user->id;
        $this->name = $selected_user->name;
        $this->nip = $selected_user->nip;
        $this->email = $selected_user->email;
        $this->role = $selected_user->role;
        
    }

    public function update(){
        $this->validate();
        $user = User::findOrFail($this->userId);
        $updateFields = [];
        if ($this->name !== $user->name) {
            $updateFields['name'] = $this->name;
        }

        if ($this->nip !== $user->nip) {
            $updateFields['nip'] = $this->nip;
        }

        if ($this->email !== $user->email) {
            $updateFields['email'] = $this->email;
        }

        if ($this->role !== $user->role) {
            $updateFields['role'] = $this->role;
        }

        if (!empty($this->password)) {
            $updateFields['password'] = bcrypt($this->password);
        }
        
        if (count($updateFields) > 0) {
            $user->update($updateFields);
            session()->flash('success', 'Data user berhasil diupdate!');
        } else {
            session()->flash('warning', 'Tidak ada perubahan data.');
        }

        return redirect()->route('control');
    }

    public function delete()
    {
        if ($this->selectedUserId) {
            $user = User::find($this->selectedUserId);
            if ($user) {
                $user->delete();
            }
            $this->selectedUserId = null;
            // $this->dispatchBrowserEvent('closeDeleteModal');
        }
        return redirect()->route('control')->with('danger', 'Pengguna berhasil dihapus');
    }

    public function render()
    {
        $users = User::orderBy('name', 'asc')->get();
        $view_data = [
            'users' => $users
        ];
        return view('livewire.users.users', $view_data);
    }
}
