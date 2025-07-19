<div>
    @include('components.delete')
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="cartModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Form Peminjaman</h5>
                </div>
                <form wire:submit="pinjam">
                    <div class="modal-body">
                        <div class="row">
                            <div class="mb-3">
                                <label for="no_surat" class="form-label">Nomor Surat</label>
                                <input wire:model="no_surat" type="text" class="form-control" id="no_surat" placeholder="Masukan nomor surat peminjaman">
                                @error('no_surat')
                                    <small class="text-danger text-end">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-4">
                                <label for="tgl_surat" class="form-label">Tanggal Surat</label>
                                <input wire:model="tgl_surat" type="date" class="form-control" id="tgl_surat" name= "tgl_surat">
                                @error('tgl_surat')
                                    <small class="text-danger text-end">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col-4">
                                <label for="tgl_peminjaman" class="form-label">Tanggal Peminjaman</label>
                                <input wire:model="tgl_peminjaman" type="date" class="form-control" id="tgl_peminjaman" name= "tgl_peminjaman">
                                @error('tgl_peminjaman')
                                    <small class="text-danger text-end">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col-4">
                                <label for="tgl_pengembalian" class="form-label">Tanggal Pengembalian</label>
                                <input wire:model="tgl_pengembalian" type="date" class="form-control" id="tgl_pengembalian" name= "tgl_pengembalian">
                                @error('tgl_pengembalian')
                                    <small class="text-danger text-end">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="table-responsive" style="max-width: 100%;">
                                    <table id="taransactionTable" class="table table-bordered table-hover">
                                        <thead class="text-center table-secondary">
                                            <tr>
                                                <th class="custom-thead">No</th>
                                                <th class="custom-thead">NPWP</th>
                                                <th class="custom-thead">Nama WP</th>
                                                <th class="custom-thead">Nomor Dokumen</th>
                                                <th class="custom-thead">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            @if (count($documents) == 0)
                                                <tr>
                                                    <td colspan="5">Tidak ada berkas</td>
                                                </tr>
                                            @endif
                                            @foreach ($documents as $key => $document)
                                            <tr>
                                                <td>{{$key + 1}}</td>
                                                <td>{{$document->wajib_pajak_id}}</td>
                                                <td>{{$document->wajib_pajak->name}}</td>
                                                <td>{{$document->no_lhp}}</td>
                                                <td>
                                                    <button 
                                                        type="button" 
                                                        class="btn btn-outline-danger" 
                                                        title="Hapus"
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#deleteConfirm"
                                                        wire:click="selectedBerkas({{$document->berkas_id}})"
                                                    >
                                                        <i class="bi bi-trash"></i>
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Pinjam</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
