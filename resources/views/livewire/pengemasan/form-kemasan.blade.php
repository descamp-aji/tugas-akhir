<div>
    @include('livewire.pengemasan.update-kemasan')
    <div class="row mt-3">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-6">
                            <form>
                                @csrf
                                <h5 class="fw-bold text-center mb-3">Input Kemasan</h5>
                                <div class="mb-3 row">
                                    <label for="npwp" class="col-sm-2 col-form-label">Rak</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="npwp" placeholder="Masukan nama rak">
                                    </div>
                                    @error('npwp')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <label for="nama_wp" class="col-sm-2 col-form-label">Baris</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="nama_wp" placeholder="Masukan nomor baris">
                                    </div>
                                    @error('nama_wp')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <label for="jenis_wp" class="col-sm-2 col-form-label">Kolom</label>
                                    <div class="col-sm-10">
                                        <select id="role" wire:model="status" class="form-select" name="status">
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
                                    @error('jenis_wp')
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <div class="card border-success">
                <div class="card-body">
                    <div class="row">
                        <div class="col d-flex align-items-center">
                            <h6 class="fw-bold" style="margin:0;">Daftar Kemasan</h6>
                        </div>
                        <div class="col-3">
                            <input type="text" class="form-control" id="keyWord" placeholder="Masukan kata kunci">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <table id="taransactionTable" class="table table-bordered table-hover text-center">
                                <thead class="table-success">
                                    <tr>
                                        <th style="width: 50px;">No</th>
                                        <th style="width: 150px;">Nama Kemasan</th>
                                        <th style="width: 150px;">Terisi</th>
                                        <th style="width: 150px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="align-middle">
                                        <td>1</td>
                                        <td>Cannary-2-3</td>
                                        <td>4 berkas</td>
                                        <td>
                                            <div class="row">
                                                <div class="col">
                                                    <button 
                                                        type="button" 
                                                        class="btn btn-outline-warning" 
                                                        title="Edit"
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#updateKemasan"
                                                    >
                                                        <i class="bi bi-pencil-square"></i>
                                                    </button>
                                                    <button 
                                                        type="button" 
                                                        class="btn btn-outline-danger" 
                                                        title="Hapus"
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#deleteConfirm" 
                                                    >
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
