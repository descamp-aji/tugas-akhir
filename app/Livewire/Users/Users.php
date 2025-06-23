<?php

namespace App\Livewire\Users;

use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\User;

class Users extends Component
{
    use WithPagination;
    #[Title('User Control')]
    protected $paginationTheme = 'bootstrap';   
    
    public $selectedUserId;
    public $userId;
    public $nip;
    public $name;
    public $email;
    public $role;
    public $password='';
    public $password_confirmation='';
    public $showPassword=false;
    public $search='';
    public $perPage=5;

    protected function rules()
    {
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

    public function edit($user)
    {
        $this->userId = $user['id'];
        $this->name = $user['name'];
        $this->nip = $user['nip'];
        $this->email = $user['email'];
        $this->role = $user['role'];
        
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
            $updateFields['updated_at'] = now();
            $user->update($updateFields);
            session()->flash('success', 'Data user berhasil diubah!');
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
        }
        return redirect()->route('control')->with('danger', 'Pengguna berhasil dihapus');
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.users.users', [
            'users' => User::search($this->search)->orderBy('name', 'asc')->paginate($this->perPage)
        ]);
    }
}
