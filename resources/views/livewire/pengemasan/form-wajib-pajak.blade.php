<div>
    @include('livewire.pengemasan.update-wajib-pajak')
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
                                    <label for="npwp" class="col-sm-3 col-form-label">NPWP</label>
                                    <div class="col-sm-9">
                                        <input wire:model="wajib_pajak_id" type="text" class="form-control" id="npwp" placeholder="Masukan NPWP">
                                    </div>
                                    @error('wajib_pajak_id')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <label for="nama_wp" class="col-sm-3 col-form-label">Nama Wajib Pajak</label>
                                    <div class="col-sm-9">
                                        <input wire:model="name" type="text" class="form-control" id="nama_wp" placeholder="Masukan Nama">
                                    </div>
                                    @error('name')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <label for="jenis_wp" class="col-sm-3 col-form-label">Jenis Wajib Pajak</label>
                                    <div class="col-sm-9">
                                        <select id="role" wire:model="jenis" class="form-select" name="status">
                                            <option value="" selected>Pilih...</option>
                                            <option value="1">Orang Pribadi</option>
                                            <option value="2">Badan</option>
                                        </select>
                                    </div>
                                    @error('jenis')
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
                                <h5 class="fw-bold text-center" style="color: #8b6d5c">Input Wajib Pajak</h5>
                                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="#8b6d5c" class="bi bi-bookmark" viewBox="0 0 16 16">
                                    <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1z"/>
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
                            <h6 class="fw-bold" style="margin:0;">Daftar Wajib Pajak</h6>
                        </div>
                        <div class="col-3">
                            <input wire:model.live="search" type="text" class="form-control" id="keyWord" placeholder="Masukan kata kunci">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <table id="taransactionTable" class="table table-bordered table-hover text-center">
                                <thead class="table-secondary">
                                    <tr>
                                        <th style="width: 50px;">No</th>
                                        <th style="width: 150px;">NPWP</th>
                                        <th style="width: 200px;">Nama Wajib Pajak</th>
                                        <th style="width: 150px;">Jenis Wajib Pajak</th>
                                        <th style="width: 120px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($tax_payers->firstItem() == 0)
                                        <tr>
                                            <td colspan=5>Tidak ada data</td>
                                        </tr>
                                    @endif
                                    @foreach ($tax_payers as $key => $tax_payer)
                                    <tr class="align-middle">
                                        <td>{{$key + 1}}</td>
                                        <td>{{$tax_payer->wajib_pajak_id}}</td>
                                        <td>{{$tax_payer->name}}</td>
                                        <td>{{$tax_payer->jenis === 1 ? 'Orang Pribadi' : 'Badan'}}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col">
                                                    <button 
                                                        type="button" 
                                                        class="btn btn-outline-warning" 
                                                        title="Edit"
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#updateWajibPajak"
                                                        wire:click="edit({{ $tax_payer }})"
                                                    >
                                                        <i class="bi bi-pencil-square"></i>
                                                    </button>
                                                    <button 
                                                        type="button" 
                                                        class="btn btn-outline-danger" 
                                                        title="Hapus"
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#deleteConfirm"
                                                        wire:click="selectedTaxPayer({{ $tax_payer->wajib_pajak_id }})"
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
                            {{ $tax_payers->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
