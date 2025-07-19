<div>
    @include('livewire.transaction.detail-document')
    @include('livewire.transaction.cart')
    <div class="row mt-3">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    @if (session('success'))
                        <x-flash-message type="success" :message="session('success')" />
                    @endif
                    @if (session('warning'))
                        <x-flash-message type="warning" :message="session('warning')" />
                    @endif
                    @if (session('danger'))
                        <x-flash-message type="danger" :message="session('danger')" />
                    @endif
                    <div class="row">
                        <div class="col d-flex align-items-center">
                            <h6 class="fw-bold">Pencarian Dokumen</h6>
                        </div>
                        <div class="col d-flex justify-content-end">
                            <button 
                            type="button" 
                            class="btn btn-primary position-relative"
                            data-bs-toggle="modal" 
                            data-bs-target="#cartModal"
                            wire:click="keranjang"
                            >
                                <i class="bi bi-cart"></i> keranjang
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{count($cart)}}
                                </span>
                            </button>
                        </div>
                    </div>
                    <form wire:submit="search">
                        @csrf
                        <div class="row my-3">
                            <div class="col-3">
                                <select wire:model="kriteria" class="form-select" id="kriteria" required>
                                    <option value="" selected>Pilih Kriteria</option>
                                    <option value="wajib_pajak_id">NPWP</option>
                                    <option value="no_lhp">No LHP</option>
                                </select>
                            </div>
                            <div class="col d-flex align-items-end">
                                <div class="input-group">
                                    <input wire:model="key_word" type="text" class="form-control" id="key_word" autofocus placeholder="Masukan NPWP atau No LHP" required>
                                    <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col">
                            <div class="table-responsive" style="max-width: 100%;">
                                <table id="taransactionTable" style="table-layout: fixed; min-width: 920px" class="table table-bordered table-hover">
                                    <thead class="text-center table-secondary">
                                        <tr>
                                            <th class="custom-thead" style="width: 50px;">No</th>
                                            <th class="custom-thead" style="width: 150px;">NPWP</th>
                                            <th class="custom-thead" style="width: 230px;">Nama WP</th>
                                            <th class="custom-thead" style="width: 250px;">Nomor Dokumen</th>
                                            <th class="custom-thead" style="width: 110px;">Status</th>
                                            <th class="custom-thead" style="width: 130px;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @if (count($result)==0)
                                            <tr>
                                                <td colspan=6>Tidak ada data</td>
                                            </tr>
                                        @endif
                                        @foreach ($result as $key => $item)
                                        <tr class="align-middle">
                                            <td>{{$key + 1}}</td>
                                            <td>{{$item->wajib_pajak_id}}</td>
                                            <td>{{$item->wajib_pajak->name}}</td>
                                            <td>{{$item->no_lhp}}</td>
                                            <td>
                                                @if ($item->berkas_status->berkas_status_id == 1)
                                                    <span class="badge text-bg-success">Tersedia</span>
                                                @elseif ($item->berkas_status->berkas_status_id == 0)
                                                    <span class="badge text-bg-danger">Tidak Tersedia</span>
                                                @else
                                                    <span class="badge text-bg-warning">Keranjang</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->berkas_status->berkas_status_id == 1)
                                                    <button 
                                                    type="button" 
                                                    class="btn btn-outline-success" 
                                                    title="tambah"
                                                    wire:click="add_to_cart({{$item->berkas_id}})"
                                                    >
                                                        <i class="bi bi-plus-square"></i>
                                                    </button>
                                                @endif
                                                    <button 
                                                    type="button" 
                                                    class="btn btn-outline-primary" 
                                                    title="info"
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#detailDocument"
                                                    wire:click="detail({{$item->berkas_id}})"
                                                    >
                                                        <i class="bi bi-info-square"></i>
                                                    </button>
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
    </div>
</div>
