<div>
    <div class="row mt-3">
        <div class="col">
            <div class="card border-warning">
                <div class="card-body">
                    <div class="row">
                        <div class="col d-flex align-items-center">
                            <h6 class="fw-bold">Pengembalian Dokumen</h6>
                        </div>
                        <div class="col-3">
                            <input type="text" class="form-control" id="searchPengembalian" placeholder="Masukan kata kunci">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <div class="table-responsive" style="max-width: 100%;">
                                <table id="pengembalianTable" style="table-layout: fixed;" class="table table-bordered table-hover">
                                    <thead class="text-center table-warning">
                                        <tr>
                                            <th style="width: 50px;">No</th>
                                            <th style="width: 250px;">Nama Peminjaman</th>
                                            <th style="width: 200px;">Surat Peminjaman</th>
                                            <th style="width: 150px;">Tanggal Surat</th>
                                            <th style="width: 150px;">Pengembalian</th>
                                            <th style="width: 100px;">Sisa Hari</th>
                                            <th style="width: 100px;">Jumlah</th>
                                            <th style="width: 160px;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <tr class="align-middle">
                                            <td>1</td>
                                            <td>Descamp Warna Purna Aji</td>
                                            <td>ND-50/KPP.080306/2025</td>
                                            <td>14 Juni 2025</td>
                                            <td>20 Juni 2025</td>
                                            <td>5 hari</td>
                                            <td>2</td>
                                            <td>
                                                <div class="row">
                                                    <div class="d-grid gap-2 col-10 mx-auto">
                                                        <button type="button" class="btn btn-outline-success btn-sm d-block" title="setuju" >
                                                            <i class="bi bi-arrow-clockwise"></i> Kembalikan
                                                        </button>
                                                        <button type="button" class="btn btn-outline-primary btn-sm d-block" title="tolak" >
                                                            <i class="bi bi-info-square"></i> Detail
                                                        </button>
                                                        <button type="button" class="btn btn-outline-secondary btn-sm d-block" title="detail" >
                                                            <i class="bi bi-telephone"></i> Kontak
                                                        </button>
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
