<div class="regist-body d-flex align-items-center" style="height: 100vh">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="regist-card">
                    <div class="logo" aria-label="Logo aplikasi inventaris berkas">
                        @if (session('success'))
                        <div class="row">
                            <x-flash-message type="success" :message="session('success')" />
                        </div>
                        @endif
                        <div class="row">
                            <span>Daftarkan Pengguna</span>
                        </div>
                    </div>
                    <div class="card-body regist-bg">
                        <form wire:submit="save">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-5">
                                    <label for="nip" class="form-label">NIP Pegawai</label>
                                    <input type="text" wire:model="nip" class="form-control" id="nip" name= "nip" placeholder="Masukan NIP 9 digit">
                                    @error('nip')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-7">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" wire:model="name" class="form-control" id="name" name= "name" placeholder="Masukan nama lengkap">
                                    @error('name')
                                        <small class="text-danger text-end">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-md-7">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" wire:model="email" class="form-control" id="email" name="email" placeholder="Masukan email pajak">
                                    @error('email')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-md-5">
                                    <label for="role" class="form-label">Role</label>
                                    <select id="role" wire:model="role" class="form-select" name="role">
                                        <option value="" selected>Pilih...</option>
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
                                        <option value="" selected>Pilih...</option>
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
                                        <input type="text" wire:model="phone" class="form-control" id="phone" name="phone" placeholder="Masukan tanpa nol" aria-label="phone" aria-describedby="basic-addon1">
                                    </div>
                                    @error('phone')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="password" class="form-label">Kata Sandi</label>
                                    <input type="{{ $showPassword ? 'text' : 'password' }}" name="password" wire:model="password" class="form-control" id="password" placeholder="Masukan password">
                                </div>
                                <div class="col-md-12">
                                    <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
                                    <input type="{{ $showPassword ? 'text' : 'password' }}" name="password_confirmation" wire:model="password_confirmation" class="form-control" id="password_confirmation" placeholder="Masukan ulang password">
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
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary me-1">Daftar</button>
                                    <a class="btn btn-regist ms-1" href="{{route('home')}}">Batal</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
