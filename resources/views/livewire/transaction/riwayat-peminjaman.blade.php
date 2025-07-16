<div>
    <div class="row mt-3">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col d-flex align-items-center">
                            <h6 style="margin:0;" class="fw-bold">Riwayat Peminjaman Dokumen</h6>
                        </div>
                        <div class="col-3">
                            <input wire:model.live="search_history" type="text" class="form-control" id="searchHistory" placeholder="Masukan nomor surat">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <table id="taransactionTable" class="table table-bordered table-hover text-center">
                                <thead class="table-secondary">
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
                                    @if (count($history)==0)
                                        <tr>
                                            <td colspan="7">Tidak Ada Data</td>
                                        </tr>
                                    @endif
                                    @foreach ($history as $key => $item)
                                    <tr class="align-middle">
                                        <td>{{$key + 1}}</td>
                                        <td>{{$item->no_surat}}</td>
                                        <td>{{date('d F Y', strtotime($item->tgl_surat))}}</td>
                                        <td>{{count($item->transaction_dtl)}}</td>
                                        <td>
                                            @if ($item->transaction_status_id == 4)
                                                <span class="badge text-bg-primary">Sudah dikembalikan</span>
                                            @else
                                                <span class="badge text-bg-danger">Ditolak</span>
                                            @endif
                                        </td>
                                        <td>{{($item->tgl_dikembalikan == null) ? "-" : date('d F Y', strtotime($item->tgl_dikembalikan))}}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col">
                                                    <button 
                                                        type="button" 
                                                        class="btn btn-outline-primary" 
                                                        title="Info"
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#detailTransaction"
                                                        wire:click="getDetail({{$item->id}})" 
                                                    >
                                                        <i class="bi bi-info-circle"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $history->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
