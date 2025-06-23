<div>
    <div class="row mt-3">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col d-flex align-items-center">
                            <h6 class="fw-bold">Pencarian Dokumen</h6>
                        </div>
                        <div class="col d-flex justify-content-end">
                            <button type="button" class="btn btn-primary position-relative">
                                <i class="bi bi-cart"></i> keranjang
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    0
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-3">
                            <select class="form-select" id="inputGroupSelect02">
                                <option value="" selected>Pilih Kriteria</option>
                                <option value="name">Nama WP</option>
                                <option value="npwp">NPWP</option>
                                <option value="no_lhp">No LHP</option>
                            </select>
                        </div>
                        <div class="col d-flex align-items-end">
                            <div class="input-group">
                                <input type="text" class="form-control" id="npwp" placeholder="Masukan kata kunci">
                                <button class="btn btn-primary" type="button"><i class="bi bi-search"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="table-responsive" style="max-width: 100%;">
                                <table id="taransactionTable" style="table-layout: fixed;" class="table table-bordered table-hover">
                                    <thead class="text-center table-secondary">
                                        <tr>
                                            <th style="width: 50px;">No</th>
                                            <th style="width: 150px;">NPWP</th>
                                            <th style="width: 300px;">Nama WP</th>
                                            <th style="width: 250px;">Nomor Dokumen</th>
                                            <th style="width: 150px;">Masa Pajak</th>
                                            <th style="width: 100px;">Status</th>
                                            <th style="width: 70px;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <tr class="align-middle">
                                            <td>1</td>
                                            <td>123456789411000</td>
                                            <td>Sumber Makmur Jaya</td>
                                            <td>LAP-450/RIKSIS/KP.080308/2025</td>
                                            <td>01-2021 12-2021</td>
                                            <td><span class="badge text-bg-success">Tersedia</span></td>
                                            <td>
                                                <button type="button" class="btn btn-outline-success" title="Tambah" >
                                                    <i class="bi bi-plus-square"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr class="align-middle">
                                            <td>2</td>
                                            <td>123456789411000</td>
                                            <td>Sumber Makmur Jaya</td>
                                            <td>LAP-454/RIKSIS/KP.080308/2025</td>
                                            <td>01-2021 12-2021</td>
                                            <td><span class="badge text-bg-danger">Dipinjam</span></td>
                                            <td>
                                                <button type="button" class="btn btn-outline-primary" title="Info" >
                                                    <i class="bi bi-info-circle"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr class="align-middle">
                                            <td>3</td>
                                            <td>123456789411000</td>
                                            <td>Sumber Makmur Jaya</td>
                                            <td>LAP-454/RIKSIS/KP.080308/2025</td>
                                            <td>01-2021 12-2021</td>
                                            <td><span class="badge text-bg-warning">Dikeranjang</span></td>
                                            <td>
                                                <button type="button" class="btn btn-outline-primary" title="Info" >
                                                    <i class="bi bi-info-circle"></i>
                                                </button>
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
