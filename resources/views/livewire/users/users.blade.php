<div>
    @include("livewire.users.update")
    @include("components.delete")
    <div class="row mt-3">
        <div class="col">
            <div class="card border-primary">
                <div class="card-body">
                    @if (session('success'))
                        <x-flash-message type="success" :message="session('success')" />
                    @endif
                    @if (session('warning'))
                        <x-flash-message type="warning" :message="session('warning')" />
                    @endif
                    @if (session('danger'))
                        <x-flash-message type="danger" :message="session('danger')" />
                    @endif
                    <div class="row">
                            <div class="col">
                                <div class="col d-flex align-items-center">
                                    <h6 class="fw-bold">Pencarian Pengguna</h6>
                                </div>
                            </div>
                        </div>
                    <div class="row justify-content-between mt-3">
                        <div class="col-2">
                            <div class="pilihan" style="width: 70px">
                                <select wire:model.live="perPage" class="form-select">
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="searchUser" wire:model.live="search" placeholder="Cari pengguna">
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered table-hover text-center">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">NIP</th>
                                <th scope="col">Nama Pegawai</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($users->firstItem() == 0)
                                <tr>
                                    <td colspan=6>Data tidak ditemukan</td>
                                </tr>
                            @endif
                            @foreach ($users as $key => $user)
                            <tr wire:key="user-{{ $user->id }}" class="align-middle">
                                <td>{{ $users->firstItem() + $key}}</td>
                                <td>{{ $user->nip }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    {!! $user->role === 'admin' ? 
                                    '<span class="badge text-bg-primary">Administrator</span>' : 
                                    '<span class="badge text-bg-secondary">Regular User</span>' !!}
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col d-flex justify-content-around">
                                            <button 
                                                type="button" 
                                                class="btn btn-outline-warning" 
                                                data-bs-toggle="modal" 
                                                title="Ubah" 
                                                data-bs-target="#updateModal"
                                                wire:click="edit({{ $user }})"
                                            >
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                            <button 
                                                type="button" 
                                                class="btn btn-outline-danger" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#deleteConfirm"
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
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
