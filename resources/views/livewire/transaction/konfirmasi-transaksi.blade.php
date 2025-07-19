<div>
    @include('livewire.transaction.detail-transaction')
    @include('livewire.transaction.detail-confirmation')
    @include('livewire.transaction.detail-contact')
    {{-- Modal konfirmasi penolakan --}}
    <div wire:ignore.self class="modal fade" id="rejectConfirm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteConfirmLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="rejectConfirmLabel">Konfirmasi !</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" wire:click="tolak" >Tolak</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal konfirmasi persetujuan --}}
    <div wire:ignore.self class="modal fade" id="approveConfirm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteConfirmLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="approveConfirmLabel">Konfirmasi !</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" wire:click="setujui" >Setujui</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            @if (session('success'))
                <x-flash-message type="success" :message="session('success')" />
            @endif
            @if (session('warning'))
                <x-flash-message type="warning" :message="session('warning')" />
            @endif
            @if (session('danger'))
                <x-flash-message type="danger" :message="session('danger')" />
            @endif
            <div class="card border-custom">
                <div class="card-body">
                    <div class="row">
                        <div class="col d-flex align-items-center">
                            <h6 class="fw-bold">Persetujuan Peminjaman</h6>
                        </div>
                        <div class="col-3">
                            <input wire:model.live="search_persetujuan" type="text" class="form-control" id="searchPeminjaman" placeholder="Masukan nomor surat">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <table id="confirmationTable" class="table table-bordered table-hover">
                                <thead class="text-center">
                                    <tr>
                                        <th class="custom-thead">No</th>
                                        <th class="custom-thead">Nama Peminjaman</th>
                                        <th class="custom-thead">Surat Peminjaman</th>
                                        <th class="custom-thead">Tanggal Surat</th>
                                        <th class="custom-thead">Jumlah</th>
                                        <th class="custom-thead" style="width:160px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @if (count($peminjaman)==0)
                                        <tr>
                                            <td colspan="6">Tidak ada data</td>
                                        </tr>
                                    @endif
                                    @foreach ($peminjaman as $key => $item)
                                    <tr class="align-middle">
                                        <td>{{$key + 1}}</td>
                                        <td>{{$item->user->name}}</td>
                                        <td>{{$item->no_surat}}</td>
                                        <td>{{date('d F Y', strtotime($item->tgl_surat))}}</td>
                                        <td>{{count($item->transaction_dtl)}}</td>
                                        <td>
                                            <div class="row">
                                                <div class="d-grid gap-2 col-10 mx-auto">
                                                    <button 
                                                    type="button" 
                                                    class="btn btn-outline-success btn-sm d-block" 
                                                    title="setuju"
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#approveConfirm"
                                                    wire:click="selectedTransaction({{$item->id}})"
                                                    >
                                                        <i class="bi bi-check-square"></i> Setuju
                                                    </button>
                                                    <button 
                                                    type="button" 
                                                    class="btn btn-outline-danger btn-sm d-block" 
                                                    title="tolak"
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#rejectConfirm"
                                                    wire:click="selectedTransaction({{$item->id}})"
                                                    
                                                    >
                                                        <i class="bi bi-x-square"></i> Tolak
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('livewire.transaction.pengembalian')
</div>
