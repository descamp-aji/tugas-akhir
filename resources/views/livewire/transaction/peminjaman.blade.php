<div>
    @include('livewire.transaction.detail-transaction')
    <div class="row mt-3">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col d-flex align-items-center">
                            <h6 class="fw-bold" style="margin:0;">Peminjaman Aktif Dokumen</h6>
                        </div>
                        <div class="col-3">
                            <input wire:model.live="search_peminjaman" type="text" class="form-control" id="keyWord" placeholder="Masukan nomor surat">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <table id="taransactionTable" class="table table-bordered table-hover text-center">
                                <thead>
                                    <tr>
                                        <th class="custom-thead">No</th>
                                        <th class="custom-thead">Surat Peminjaman</th>
                                        <th class="custom-thead">Jatuh Tempo</th>
                                        <th class="custom-thead">Sisa Hari</th>
                                        <th class="custom-thead">Jumlah</th>
                                        <th class="custom-thead">Status Peminjaman</th>
                                        <th class="custom-thead">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        function JatuhTempo($tanggalAwal, $tanggalAkhir) {
                                            $date1 = new DateTime($tanggalAwal);
                                            $date2 = new DateTime($tanggalAkhir);
                                            $diff = $date1->diff($date2);
                                            return $diff->invert ? -$diff->days : $diff->days;
                                        }
                                    @endphp
                                    @if (count($peminjaman)==0)
                                        <tr>
                                            <td colspan="7">Tidak ada data</td>
                                        </tr>
                                    @endif
                                    @foreach ($peminjaman as $key => $item)
                                    <tr class="align-middle">
                                        <td>{{$key + 1}}</td>
                                        <td>{{$item->no_surat}}</td>
                                        <td>{{date('d F Y', strtotime($item->tgl_kembali))}}</td>
                                        <td>{{JatuhTempo(now(),$item->tgl_kembali)}} hari</td>
                                        <td>{{count($item->transaction_dtl)}}</td>
                                        <td>
                                            @if ($item->transaction_status_id == 1)
                                                <span class="badge text-bg-warning">Persetujuan</span>
                                            @elseif($item->transaction_status_id == 2)
                                                <span class="badge text-bg-success">Menunggu pengembalian</span>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('livewire.transaction.riwayat-peminjaman')
</div>
