<div>
    @include('livewire.pengemasan.update-kemasan')
    @include('components.delete')
    <div class="row mt-3">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center mt-3">
                        <div class="col-8">
                            <form wire:submit="save">
                                @csrf
                                <div class="mb-3 row">
                                    <label for="rak" class="col-sm-3 col-form-label">Rak/lemari</label>
                                    <div class="col-sm-9">
                                        <input wire:model="rak" type="text" class="form-control" id="rak" placeholder="Masukan nama rak atau lemari">
                                    </div>
                                    @error('rak')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <label for="baris" class="col-sm-3 col-form-label">Baris</label>
                                    <div class="col-sm-9">
                                        <input wire:model="baris" type="number" class="form-control" id="baris" placeholder="Masukan nomor baris">
                                    </div>
                                    @error('baris')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <label for="kolom" class="col-sm-3 col-form-label">Kolom</label>
                                    <div class="col-sm-9">
                                        <select id="role" wire:model="kolom" class="form-select" name="status">
                                            <option value="" selected>Pilih...</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </div>
                                    @error('kolom')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                    @error('label')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <div class="col text-center">
                                        <button type="submit" class="btn btn-primary me-1">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-4">
                            <div class="row justify-content-center">
                                <h5 class="fw-bold text-center" style="color: #8b6d5c">Input Kemasan</h5>
                                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="#8b6d5c" class="bi bi-archive" viewBox="0 0 16 16">
                                    <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5zm13-3H1v2h14zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            @if (session('success'))
                                <x-flash-message type="success" :message="session('success')" />
                            @endif
                            @if (session('warning'))
                                <x-flash-message type="warning" :message="session('warning')" />
                            @endif
                            @if (session('danger'))
                                <x-flash-message type="danger" :message="session('danger')" />
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col d-flex align-items-center">
                            <h6 class="fw-bold" style="margin:0;">Daftar Kemasan</h6>
                        </div>
                        <div class="col-3">
                            <input wire:model.live="search" type="text" class="form-control" id="keyWord" placeholder="Masukan nama kemasan">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <table id="taransactionTable" class="table table-bordered table-hover text-center">
                                <thead class="table-secondary">
                                    <tr>
                                        <th class="custom-thead" style="width: 50px;">No</th>
                                        <th class="custom-thead" style="width: 150px;">Nama Kemasan</th>
                                        <th class="custom-thead" style="width: 150px;">Terisi</th>
                                        <th class="custom-thead" style="width: 150px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($items->firstItem() == 0)
                                        <tr>
                                            <td colspan=4>Tidak ada data</td>
                                        </tr>
                                    @endif
                                    @foreach ($items as $key => $item)
                                    <tr class="align-middle">
                                        <td>{{$items->firstItem() + $key}}</td>
                                        <td>{{$item['label']}}</td>
                                        <td>{{count($item->berkas)}} berkas</td>
                                        <td>
                                            <div class="row">
                                                <div class="col">
                                                    <button 
                                                        type="button" 
                                                        class="btn btn-outline-warning" 
                                                        title="Edit"
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#updateKemasan"
                                                        wire:click = "edit_data({{ $item }})"
                                                    >
                                                        <i class="bi bi-pencil-square"></i>
                                                    </button>
                                                    <button 
                                                        type="button" 
                                                        class="btn btn-outline-danger" 
                                                        title="Hapus"
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#deleteConfirm"
                                                        wire:click="selected({{ $item->kemasan_id }})""
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
                </div>
            </div>
        </div>
    </div>
</div>
