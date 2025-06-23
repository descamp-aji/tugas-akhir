<div>
    <div class="row mt-3">
        <div class="col">
            <div class="card border-info">
                <div class="card-body">
                    <div class="row">
                        <div class="col d-flex align-items-center">
                            <h6 style="margin:0;" class="fw-bold">Riwayat Peminjaman Dokumen</h6>
                        </div>
                        <div class="col-3">
                            <input type="text" class="form-control" id="searchHistory" placeholder="Masukan kata kunci">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <table id="taransactionTable" class="table table-bordered table-hover text-center">
                                <thead class="table-info">
                                    <tr>
                                        <th>No</th>
                                        <th>Surat Peminjaman</th>
                                        <th>Tanggal Surat</th>
                                        <th>Jumlah</th>
                                        <th>Status Peminjaman</th>
                                        <th>Pengembalian</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="align-middle">
                                        <td>1</td>
                                        <td>ND-25/KPP.080306/2025</td>
                                        <td>15 Juni 2025</td>
                                        <td>2</td>
                                        <td><span class="badge text-bg-primary">Selesai</span></td>
                                        <td>15 Juni 2025</td>
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
                                    <tr class="align-middle">
                                        <td>2</td>
                                        <td>ND-26/KPP.080306/2025</td>
                                        <td>25 Juni 2025</td>
                                        <td>2</td>
                                        <td><span class="badge text-bg-danger">Ditolak</span></td>
                                        <td>-</td>
                                        <td>
                                            <div class="row">
                                                <div class="col">
                                                    <button 
                                                        type="button" 
                                                        class="btn btn-outline-primary" 
                                                        title="Ubah" 
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
