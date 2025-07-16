<?php

namespace App\Livewire\Users;

use App\Models\Seksi;
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
    public $seksi_id;
    public $phone;
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
            'password' => 'min:8|confirmed',
            'seksi_id' => 'required',
            'phone' => 'required|unique:users,phone,' . $this->userId
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
        $this->phone = $user['phone'];
        $this->seksi_id = $user['seksi_id'];
    }

    public function update(){
        $this->validate();
        $user = User::findOrFail($this->userId);
        $updateFields = [];
        if ($this->name !== $user->name) {
            $updateFields['name'] = ucwords(strtolower($this->name));
        }

        if ($this->nip !== $user->nip) {
            $updateFields['nip'] = $this->nip;
        }

        if ($this->email !== $user->email) {
            $updateFields['email'] = strtolower($this->email);
        }

        if ($this->role !== $user->role) {
            $updateFields['role'] = $this->role;
        }

        if ($this->phone !== $user->phone) {
            $updateFields['phone'] = $this->phone;
        }

        if ($this->seksi_id !== $user->seksi_id) {
            $updateFields['seksi_id'] = $this->seksi_id;
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
            'users' => User::search($this->search)->orderBy('name', 'asc')->paginate($this->perPage),
            'seksi' => Seksi::all()
        ]);
    }
}
