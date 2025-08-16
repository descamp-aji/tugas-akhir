<div>
    @include('livewire.transaction.detail-confirmation')
    <div class="row mt-5">
        <div class="col-3">
            <div class="card mb-3" style="max-width: 18rem;">
                <div class="card-header bg-transparent text-dark text-center">
                    <h5 class="card-title">Jumlah<br>Pengguna</h5>
                </div>
                    <div class="card-body text-dark text-center">
                        <h2 class="card-title">{{count($users)}}</h2>
                    </div>
                <div class="card-footer bg-transparent text-dark text-center">
                    <i class="bi bi-people"></i>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card mb-3" style="max-width: 18rem;">
                <div class="card-header bg-transparent text-dark text-center">
                    <h5 class="card-title">Berkas<br>Tersedia</h5>
                </div>
                    <div class="card-body text-dark text-center">
                        <h2 class="card-title">{{count($berkas)}}</h2>
                    </div>
                <div class="card-footer bg-transparent text-dark text-center">
                    <i class="bi bi-file-earmark-text"></i>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card mb-3" style="max-width: 18rem;">
                <div class="card-header bg-transparent text-dark text-center">
                    <h5 class="card-title ">Menunggu<br>Pengembalian</h5>
                </div>
                    <div class="card-body text-dark text-center">
                        <h2 class="card-title">{{count($pengembalian)}}</h2>
                    </div>
                <div class="card-footer bg-transparent text-dark text-center">
                    <i class="bi bi-arrow-counterclockwise"></i>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card mb-3" style="max-width: 18rem;">
                <div class="card-header bg-transparent text-dark text-center">
                    <h5 class="card-title ">Persetujuan<br>Peminjaman</h5>
                </div>
                    <div class="card-body text-dark text-center">
                        <h2 class="card-title">{{count($persetujuan)}}</h2>
                    </div>
                <div class="card-footer bg-transparent text-dark text-center">
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
                            <input wire:model.live="search" type="text" class="form-control" id="searchHistory" placeholder="Masukan nomor surat">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <table id="taransactionTable" class="table table-bordered table-hover text-center">
                                <thead class="table-secondary">
                                    <tr>
                                        <th class="custom-thead" >No</th>
                                        <th class="custom-thead" >Nama Peminjam</th>
                                        <th class="custom-thead" >Surat Peminjaman</th>
                                        <th class="custom-thead" >Jumlah</th>
                                        <th class="custom-thead" >Status Peminjaman</th>
                                        <th class="custom-thead" >Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($monitoring) == 0)
                                        <td colspan="6">Tidak Ada Data</td>
                                    @endif
                                    @foreach ($monitoring as $key=> $item)
                                    <tr class="align-middle">
                                        <td>{{$key + 1}}</td>
                                        <td>{{$item->user->name}}</td>
                                        <td>{{$item->no_surat}}</td>
                                        <td>{{count($item->transaction_dtl)}}</td>
                                        <td>
                                            @if ($item->transaction_status_id == 1)
                                                <span class="badge text-bg-warning">Persetujuan</span>
                                            @elseif($item->transaction_status_id == 2)
                                                <span class="badge text-bg-success">Menunggu Pengembalian</span>
                                            @elseif($item->transaction_status_id == 3)
                                                <span class="badge text-bg-danger">Ditolak</span>
                                            @else
                                                <span class="badge text-bg-primary">Selesai</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="col">
                                                    <button 
                                                        type="button" 
                                                        class="btn btn-outline-primary" 
                                                        title="Info"
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#detailConfirmation"
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
                            {{$monitoring->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

