<div>
    {{-- Modal Konfirmasi Pengembalian --}}
    <div wire:ignore.self class="modal fade" id="returnConfirm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteConfirmLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="returnConfirmLabel">Form Pengembalian</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit="kembalikan">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="tgl_dikembalikan" class="form-label">Tanggal Pengembalian</label>
                            <input wire:model="tgl_dikembalikan" type="date" class="form-control" id="tgl_dikembalikan" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" >Kembalikan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Akhir Modal Konfirmasi Pengembalian --}}
    <div class="row mt-3">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col d-flex align-items-center">
                            <h6 class="fw-bold">Pengembalian Dokumen</h6>
                        </div>
                        <div class="col-3">
                            <input wire:model.live="search_pengembalian"type="text" class="form-control" id="searchPengembalian" placeholder="Masukan nomor surat">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <div class="table-responsive" style="max-width: 100%;">
                                <table id="pengembalianTable" style="table-layout: fixed;" class="table table-bordered table-hover">
                                    <thead class="text-center table-secondary">
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
                                        @php
                                            function JatuhTempo($tanggalAwal, $tanggalAkhir) {
                                                $date1 = new DateTime($tanggalAwal);
                                                $date2 = new DateTime($tanggalAkhir);
                                                $diff = $date1->diff($date2);
                                                return $diff->invert ? -$diff->days : $diff->days;
                                            }
                                        @endphp
                                        @if (count($pengembalian)==0)
                                            <tr>
                                                <td colspan="8">Tidak ada data</td>
                                            </tr>
                                        @endif
                                        @foreach ($pengembalian as $key => $item)
                                        <tr class="align-middle">
                                            <td>{{$pengembalian->firstItem() + $key}}</td>
                                            <td>{{$item->user->name}}</td>
                                            <td>{{$item->no_surat}}</td>
                                            <td>{{date('d F Y', strtotime($item->tgl_surat))}}</td>
                                            <td>{{date('d F Y', strtotime($item->tgl_kembali))}}</td>
                                            <td>{{JatuhTempo(now(),$item->tgl_kembali)}}</td>
                                            <td>{{count($item->transaction_dtl)}}</td>
                                            <td>
                                                <div class="row">
                                                    <div class="d-grid gap-2 col-10 mx-auto">
                                                        <button 
                                                        type="button" 
                                                        class="btn btn-outline-success btn-sm d-block" 
                                                        title="kembalikan"
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#returnConfirm"
                                                        wire:click="selectedTransaction({{$item->id}})"
                                                        >
                                                            <i class="bi bi-arrow-clockwise"></i> Kembalikan
                                                        </button>
                                                        <button 
                                                        type="button" 
                                                        class="btn btn-outline-secondary btn-sm d-block" 
                                                        title="kontak" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#detailContact"
                                                        wire:click="getContact({{$item->user->nip}})"
                                                        >
                                                            <i class="bi bi-telephone"></i> Kontak
                                                        </button>
                                                        <button 
                                                            type="button" 
                                                            class="btn btn-outline-primary btn-sm d-block" 
                                                            title="detail"
                                                            data-bs-toggle="modal" 
                                                            data-bs-target="#detailConfirmation"
                                                            wire:click="getDetail({{$item->id}})" 
                                                            >
                                                            <i class="bi bi-info-square"></i> Detail
                                                        </button>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{$pengembalian->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
