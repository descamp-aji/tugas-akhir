<div>
    <div class="content d-flex align-items-center">
        <div class="container">
            <div class="row mt-2">
                <div class="table-card">
                    @if (session('success'))
                        <x-flash-message type="success" :message="session('success')" />
                    @endif
                    @if (session('warning'))
                        <x-flash-message type="warning" :message="session('warning')" />
                    @endif
                    @if (session('danger'))
                        <x-flash-message type="danger" :message="session('danger')" />
                    @endif
                    <table id="userTable" class="table table-bordered table-hover">
                        <thead class="text-center table-secondary">
                            <tr>
                                <th class="th-users" scope="col">No</th>
                                <th class="th-users text-center" scope="col">NIP</th>
                                <th class="th-users" scope="col">Nama Pegawai</th>
                                <th class="th-users" scope="col">Email</th>
                                <th class="th-users text-center" scope="col">Role</th>
                                <th class="th-users text-center" scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $user)
                            <tr wire:key="user-{{ $user->id }}">
                                <td class="td-users">{{ $key + 1 }}</td>
                                <td class="td-users text-center">{{ $user->nip }}</td>
                                <td class="td-users">{{ $user->name }}</td>
                                <td class="td-users">{{ $user->email }}</td>
                                <td class="td-users text-center">
                                    {{ $user->role === 'admin' ? 'Administrator' : 'Regular User' }}
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col d-flex justify-content-around">
                                            <button 
                                                type="button" 
                                                class="btn btn-update" 
                                                data-bs-toggle="modal" 
                                                title="Ubah" 
                                                data-bs-target="#exampleModal"
                                                wire:click="edit({{ $user->id }})"
                                            >
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                            <button 
                                                type="button" 
                                                class="btn btn-primary" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#staticConfirm"
                                                title="Hapus"
                                                wire:click="selectedUser({{ $user->id }})"
                                            >
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- Modal Konfirmasi Hapus --}}
            <div wire:ignore.self class="modal fade" id="staticConfirm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus !</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah yakin ingin menghapus?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-primary" wire:click="delete" >Hapus</button>
                    </div>
                    </div>
                </div>
            </div>
            {{-- Modal Edit Pengguna --}}
            <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ubah Data Pengguna</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3">
                        @csrf
                        <div class="col-md-5">
                            <label for="nip" class="form-label">Nomor ID</label>
                            <input wire:model.defer ="nip" type="text" class="form-control" id="nip" name= "nip" placeholder="Masukan NIP 9 digit">
                            @error('nip')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-7">
                            <label for="name" class="form-label">Nama</label>
                            <input wire:model.defer ="name" type="text" class="form-control" id="name" name= "name" placeholder="Masukan nama lengkap">
                            @error('name')
                                <small class="text-danger text-end">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-7">
                            <label for="email" class="form-label">Email</label>
                            <input wire:model.defer ="email" type="email" class="form-control" id="email" name="email" placeholder="Masukan email pajak">
                            @error('email')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-5">
                            <label for="role" class="form-label">Role</label>
                            <select id="role" wire:model.defer="role" class="form-select" name="role">
                                <option value="admin">Administrator</option>
                                <option value="reguler">Regular User</option>
                            </select>
                            @error('role')
                                <small class="text-danger text-end">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="password" class="form-label">Atur ulang kata sandi</label>
                            <input type="{{ $showPassword ? 'text' : 'password' }}" name="password" wire:model.defer="password" class="form-control" id="password" placeholder="Masukan kata sandi">
                        </div>
                        <div class="col-md-12">
                            <label for="password_confirmation" class="form-label">Konfirmasi kata sandi</label>
                            <input type="{{ $showPassword ? 'text' : 'password' }}" name="password_confirmation" wire:model.defer="password_confirmation" class="form-control" id="password_confirmation" placeholder="Masukan ulang kata sandi">
                        </div>
                        @error('password')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                        <div class="col-md-12">
                            <div class="form-check">
                                <input wire:click="toggleShow" class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Tampilkan kata sandi 
                                </label>
                            </div>
                        </div>
                    </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-primary" wire:click="update">Ubah</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

