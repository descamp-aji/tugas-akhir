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
                            <label for="nip" class="form-label">NIP</label>
                            <input
                            type="text"
                            class="form-control"
                            id="nip"
                            name="nip"
                            wire:model="nip"
                            placeholder="NIP 9 digit"
                            required
                            />
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <input 
                                type="{{ $showPassword ? 'text' : 'password' }}" 
                                id="password"
                                name="password"
                                wire:model="password"
                                class="form-control" 
                                placeholder="Masukan password" 
                                aria-describedby="btn-toggleShow">
                                <button wire:click="toggleShow" class="btn btn-primary" type="button" id="toggleShow">
                                    {!! $showPassword ? '<i class="bi bi-eye"></i>' : '<i class="bi bi-eye-fill"></i>' !!}
                                </button>
                            </div>
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
                            <p>Lupa password? silakan hubungi Admin</p>
                        </div>
                    </form>
                </main>
            </div>
        </div>
    </div>
</div>
