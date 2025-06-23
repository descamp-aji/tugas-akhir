<div>
    @include('livewire.pengemasan.add-document')
    @include('livewire.pengemasan.update-document')
    @include('components.delete')
    <div class="row mt-3">
        <div class="col">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDocument">
                <i class="bi bi-file-earmark-plus"></i> Tambah Berkas
            </button>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <div class="card border-warning">
                <div class="card-body">
                    <div class="row">
                        <div class="col d-flex align-items-center">
                            <h6 class="fw-bold" style="margin:0;">Daftar Berkas</h6>
                        </div>
                        <div class="col-3">
                            <input type="text" class="form-control" id="keyWord" placeholder="Masukan kata kunci">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <div class="table-responsive" style="max-width: 100%;">
                                <table id="taransactionTable" style="table-layout: fixed;" class="table table-bordered table-hover text-center">
                                    <thead class="table-warning">
                                        <tr>
                                            <th style="width: 50px;">No</th>
                                            <th style="width: 150px;">NPWP</th>
                                            <th style="width: 200px;">Nama Wajib Pajak</th>
                                            <th style="width: 270px;">Nomor LHP</th>
                                            <th style="width: 150px;">Tanggal LHP</th>
                                            <th style="width: 150px;">Masa Pajak</th>
                                            <th style="width: 100px;">Kode Riksa</th>
                                            <th style="width: 150px;">Status</th>
                                            <th style="width: 120px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="align-middle">
                                            <td>1</td>
                                            <td>123456789411000</td>
                                            <td>Sumber Makmur Jaya</td>
                                            <td>LAP-450/RIKSIS/KP.080308/2025</td>
                                            <td>20 Juni 2023</td>
                                            <td>01-2022 12-2022</td>
                                            <td>1182</td>
                                            <td><span class="badge text-bg-danger">Tidak Tersedia</span></td>
                                            <td>
                                                <div class="row">
                                                    <div class="col d-flex justify-content-around">
                                                        <button 
                                                            type="button" 
                                                            class="btn btn-outline-warning" 
                                                            title="Edit"
                                                            data-bs-toggle="modal" 
                                                            data-bs-target="#updateDocument"
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
</div>