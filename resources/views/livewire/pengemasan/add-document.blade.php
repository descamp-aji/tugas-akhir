<div>
    <div class="modal fade" id="addDocument" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addDocumentBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addDocumentBackdropLabel">Tambah Berkas</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" wire:submit="save">
                        @csrf
                        <div class="col-md-5">
                            <label for="npwp" class="form-label">NPWP</label>
                            <input type="text" wire:model="npwp" class="form-control" id="npwp" name= "npwp" placeholder="Masukan NPWP">
                            @error('npwp')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-7">
                            <label for="name" class="form-label">Nama Wajib Pajak</label>
                            <input type="text" wire:model="name" class="form-control" id="name" name= "name" value="Sumber Makmur Jaya" disabled>
                            @error('name')
                                <small class="text-danger text-end">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="no_lhp" class="form-label">Nomor LHP</label>
                            <input type='text' name="no_lhp" wire:model="no_lhp" class="form-control" id="no_lhp" placeholder="Masukan Nomor LHP">
                        </div>
                        <div class="col-md-6">
                            <label for="tgl_lhp" class="form-label">Tanggal LHP</label>
                            <input type="date" wire:model="tgl_lhp" class="form-control" id="tgl_lhp" name="tgl_lhp" placeholder="dd-mm-YYYY">
                            @error('tgl_lhp')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label for="masa_pajak_awal" class="form-label">Masa Awal</label>
                            <input type="text" name="masa_pajak_awal" wire:model="masa_pajak_awal" class="form-control" id="masaAwal" placeholder="mm-YYYY">
                        </div>
                        @error('password')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                        <div class="col-md-3">
                            <label for="masa_pajak_akhir" class="form-label">Masa Akhir</label>
                            <input type="text" name="masa_pajak_akhir" wire:model="masa_pajak_akhir" class="form-control" id="masaAkhir" placeholder="mm-YYYY">
                        </div>
                        @error('password')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                        <div class="col-md-6">
                            <label for="role" class="form-label">Status Berkas</label>
                            <select id="role" wire:model="status" class="form-select" name="status">
                                <option value="" selected>Pilih...</option>
                                <option value="0">Tersedia</option>
                                <option value="1">Tidak Tersedia</option>
                            </select>
                            @error('role')
                                <small class="text-danger text-end">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="role" class="form-label">Kode Pemeriksaan</label>
                            <select id="role" wire:model="status" class="form-select" name="status">
                                <option value="" selected>Pilih...</option>
                                <option value="0">1182</option>
                                <option value="1">2182</option>
                            </select>
                            @error('role')
                                <small class="text-danger text-end">{{$message}}</small>
                            @enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="test">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>