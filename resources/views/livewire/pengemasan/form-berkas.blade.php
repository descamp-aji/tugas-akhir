<div>
    @include('livewire.pengemasan.add-document')
    @include('livewire.pengemasan.update-document')
    @include('components.delete')
    <div class="row mt-3">
        <div class="col">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDocument">
                <i class="bi bi-file-earmark-plus"></i> Tambah Berkas
            </button>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="row">
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
                        </div>
                    </div>
                    <div class="row">
                        <div class="col d-flex align-items-center">
                            <h6 class="fw-bold" style="margin:0;">Daftar Berkas</h6>
                        </div>
                        <div class="col-3">
                            <input wire:model.live="search" type="text" class="form-control" id="keyWord" placeholder="Masukan NPWP atau LHP">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <div class="table-responsive" style="max-width: 100%;">
                                <table id="taransactionTable" style="table-layout: fixed;" class="table table-bordered table-hover text-center">
                                    <thead class="table-secondary">
                                        <tr>
                                            <th style="width: 50px;">No</th>
                                            <th style="width: 150px;">NPWP</th>
                                            <th style="width: 200px;">Nama Wajib Pajak</th>
                                            <th style="width: 270px;">Nomor LHP</th>
                                            <th style="width: 150px;">Tanggal LHP</th>
                                            <th style="width: 150px;">Masa Pajak</th>
                                            <th style="width: 100px;">Kode Riksa</th>
                                            <th style="width: 150px;">Kemasan</th>
                                            <th style="width: 150px;">Status</th>
                                            <th style="width: 120px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($berkas->firstItem() == 0)
                                            <tr>
                                                <td colspan=10>Data tidak ditemukan</td>
                                            </tr>
                                        @endif
                                        @foreach ($berkas as $key => $item)
                                        <tr class="align-middle">
                                            <td>{{$key + 1}}</td>
                                            <td>{{$item->wajib_pajak_id}}</td>
                                            <td>{{$item->wajib_pajak->name}}</td>
                                            <td>{{$item->no_lhp}}</td>
                                            <td>{{date('d F Y', strtotime($item->tgl_lhp))}}</td>
                                            <td>{{$item->masa_pajak_awal}} {{$item->masa_pajak_akhir}}</td>
                                            <td>{{$item->kode_riksa_id}}</td>
                                            <td>{{$item->kemasan->label}}</td>
                                            <td>
                                                @if ($item->berkas_status->berkas_status_id == 1)
                                                    <span class="badge text-bg-success">Tersedia</span>
                                                @else
                                                    <span class="badge text-bg-danger">Tidak Tersedia</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <div class="col d-flex justify-content-around">
                                                        <button 
                                                            type="button" 
                                                            class="btn btn-outline-warning" 
                                                            title="Edit"
                                                            data-bs-toggle="modal" 
                                                            data-bs-target="#updateDocument"
                                                            wire:click="edit({{ $item }})"
                                                        >
                                                            <i class="bi bi-pencil-square"></i>
                                                        </button>
                                                        <button 
                                                            type="button" 
                                                            class="btn btn-outline-danger" 
                                                            title="Hapus"
                                                            data-bs-toggle="modal" 
                                                            data-bs-target="#deleteConfirm"
                                                            wire:click = "selectedId({{ $item->berkas_id }})" 
                                                        >
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{ $berkas->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>