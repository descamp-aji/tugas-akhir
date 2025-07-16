<div>
    <div wire:ignore.self class="modal fade" id="updateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Ubah Data Pengguna</h5>
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
                                <option value="user">Regular User</option>
                            </select>
                            @error('role')
                                <small class="text-danger text-end">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="seksi_id" class="form-label">Seksi</label>
                            <select id="seksi_id" wire:model="seksi_id" class="form-select" name="seksi_id">
                                @foreach ($seksi as $item)
                                    <option value="{{$item->id}}">{{$item->deskripsi}}</option>
                                @endforeach
                            </select>
                            @error('seksi_id')
                                <small class="text-danger text-end">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="form-label">No Whatsapp</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">+62</span>
                                <input type="text" wire:model="phone" class="form-control" id="phone" name="phone" placeholder="Masukan tanpa angka nol" aria-label="phone" aria-describedby="basic-addon1">
                            </div>
                            @error('phone')
                                <small class="text-danger">{{$message}}</small>
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
                    <a type="button" class="btn btn-secondary" href="{{route("control")}}">Batal</a>
                    <button type="button" class="btn btn-primary" wire:click="update">Ubah</button>
                </div>
            </div>
        </div>
    </div>
</div>
