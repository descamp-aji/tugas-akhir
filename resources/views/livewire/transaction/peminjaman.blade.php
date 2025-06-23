<div>
    <div class="row mt-3">
        <div class="col">
            <div class="card border-success">
                <div class="card-body">
                    <div class="row">
                        <div class="col d-flex align-items-center">
                            <h6 class="fw-bold" style="margin:0;">Peminjaman Aktif Dokumen</h6>
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
                                        <th>No</th>
                                        <th>Surat Peminjaman</th>
                                        <th>Tanggal Surat</th>
                                        <th>Batas Waktu</th>
                                        <th>Sisa Hari</th>
                                        <th>Jumlah</th>
                                        <th>Status Peminjaman</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="align-middle">
                                        <td>1</td>
                                        <td>ND-25/KPP.080306/2025</td>
                                        <td>15 Juni 2025</td>
                                        <td>19 Juni 2025</td>
                                        <td>2 hari</td>
                                        <td>2</td>
                                        <td><span class="badge text-bg-success">Disetujui</span></td>
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
                                        <td>30 Juni 2025</td>
                                        <td>2 hari</td>
                                        <td>2</td>
                                        <td><span class="badge text-bg-warning">Persetujuan</span></td>
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
    @include('livewire.transaction.riwayat-peminjaman')
</div>
