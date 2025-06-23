<div>
    <div class="row mt-5">
        <div class="col-3">
            <div class="card border-success mb-3" style="max-width: 18rem;">
                <div class="card-header bg-transparent border-success text-success text-center">
                    <h5 class="card-title">Jumlah<br>Pengguna</h5>
                </div>
                    <div class="card-body text-success text-center">
                        <h2 class="card-title">10</h2>
                    </div>
                <div class="card-footer bg-transparent border-success text-success text-center">
                    <i class="bi bi-people"></i>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card border-primary mb-3" style="max-width: 18rem;">
                <div class="card-header bg-transparent border-primary text-primary text-center">
                    <h5 class="card-title">Berkas<br>Tersedia</h5>
                </div>
                    <div class="card-body text-primary text-center">
                        <h2 class="card-title">10</h2>
                    </div>
                <div class="card-footer bg-transparent border-primary text-primary text-center">
                    <i class="bi bi-file-earmark-text"></i>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card border-danger mb-3" style="max-width: 18rem;">
                <div class="card-header bg-transparent border-danger text-danger text-center">
                    <h5 class="card-title ">Menunggu<br>Pengembalian</h5>
                </div>
                    <div class="card-body text-danger text-center">
                        <h2 class="card-title">10</h2>
                    </div>
                <div class="card-footer bg-transparent border-danger text-danger text-center">
                    <i class="bi bi-arrow-counterclockwise"></i>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card border-info mb-3" style="max-width: 18rem;">
                <div class="card-header bg-transparent border-info text-info text-center">
                    <h5 class="card-title ">Persetujuan<br>Peminjaman</h5>
                </div>
                    <div class="card-body text-info text-center">
                        <h2 class="card-title">10</h2>
                    </div>
                <div class="card-footer bg-transparent border-info text-info text-center">
                    <i class="bi bi-bag-check"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col d-flex align-items-center">
                            <h6 style="margin:0;" class="fw-bold">Monitoring Peminjaman Dokumen</h6>
                        </div>
                        <div class="col-3">
                            <input type="text" class="form-control" id="searchHistory" placeholder="Masukan kata kunci">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <table id="taransactionTable" class="table table-bordered table-hover text-center">
                                <thead class="table-secondary">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Peminjam</th>
                                        <th>Surat Peminjaman</th>
                                        <th>Jumlah</th>
                                        <th>Status Peminjaman</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="align-middle">
                                        <td>1</td>
                                        <td>Descamp Warna Purna Aji</td>
                                        <td>ND-25/KPP.080306/2025</td>
                                        <td>2</td>
                                        <td><span class="badge text-bg-primary">Selesai</span></td>
                                        <td>
                                            <div class="row">
                                                <div class="col">
                                                    <button 
                                                        type="button" 
                                                        class="btn btn-outline-primary" 
                                                        title="Info" 
                                                    >
                                                        <i class="bi bi-info-circle"></i>
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

