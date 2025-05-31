<div>
    <div class="login-body d-flex align-items-center" style="height: 100vh">
        <div class="container">
            <div class="row justify-content-center">
                <main class="login-card" role="main" aria-label="Form login aplikasi inventaris berkas">
                    <!-- Logo Aplikasi -->
                    <div class="logo" aria-label="Logo aplikasi inventaris berkas">
                        <img src="{{asset('myassets/img/logo.png')}}" style="width:70px" alt="Logo">
                        <span>DocuTrack</span>
                    </div>
                
                    <!-- Form Login -->
                    <form wire:submit="login" class="row">
                        @csrf
                        <div class="mb-3">
                            <label for="nip" class="form-label">Nomor ID</label>
                            <input
                            type="text"
                            class="form-control"
                            id="nip"
                            name="nip"
                            wire:model="nip"
                            placeholder="Masukkan NIP 9 digit"
                            required
                            />
                        </div>
                
                        <div class="mb-3">
                            <label for="password" class="form-label">Kata Sandi</label>
                            <input
                            type="password"
                            class="form-control"
                            id="password"
                            wire:model="password"
                            name="password"
                            placeholder="Masukkan kata sandi"
                            required
                            />
                        </div>
                        @error('error')
                            <p class="text-danger text-center">{{$message}}</p>
                        @enderror
                        <div class="col-12 text-center mt-2">
                            <button type="submit" class="btn btn-primary w-50">
                                Masuk
                            </button>
                        </div>
                        <div class="mt-3 text-center form-text" >
                            <p>Created @2025 by Descamp Warna Purna Aji</p>
                        </div>
                    </form>
                </main>
            </div>
        </div>
    </div>
</div>
