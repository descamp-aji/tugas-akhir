<div>
    <div class="row mt-3">
        <div class="col">
            <div class="card border-primary">
                <div class="card-body">
                    <div class="row">
                        <div class="col d-flex align-items-center">
                            <h6 class="fw-bold">Persetujuan Peminjaman</h6>
                        </div>
                        <div class="col-3">
                            <input type="text" class="form-control" id="searchPeminjaman" placeholder="Masukan kata kunci">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <table id="confirmationTable" class="table table-bordered table-hover">
                                <thead class="text-center table-primary">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Peminjaman</th>
                                        <th>Surat Peminjaman</th>
                                        <th>Tanggal Surat</th>
                                        <th>Jumlah</th>
                                        <th style="width:160px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <tr class="align-middle">
                                        <td>1</td>
                                        <td>Descamp Warna Purna Aji</td>
                                        <td>ND-50/KPP.080306/2025</td>
                                        <td>14 Juni 2025</td>
                                        <td>2</td>
                                        <td>
                                            <div class="row">
                                                <div class="d-grid gap-2 col-10 mx-auto">
                                                    <button type="button" class="btn btn-outline-success btn-sm d-block" title="setuju" >
                                                        <i class="bi bi-check-square"></i> Setuju
                                                    </button>
                                                    <button type="button" class="btn btn-outline-danger btn-sm d-block" title="tolak" >
                                                        <i class="bi bi-x-square"></i> Tolak
                                                    </button>
                                                    <button type="button" class="btn btn-outline-primary btn-sm d-block" title="detail" >
                                                        <i class="bi bi-info-square"></i> Detail
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
    @include('livewire.transaction.pengembalian')
</div>
