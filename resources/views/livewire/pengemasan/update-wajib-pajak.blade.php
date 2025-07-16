<div>
    <div wire:ignore.self class="modal fade" id="updateWajibPajak" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updateWajibPajakBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="updateWajibPajakBackdropLabel">Ubah Data Wajib Pajak</h1>
                </div>
                <div class="modal-body">
                    <form>
                        @csrf
                        <div class="mb-3 row">
                            <label for="npwp" class="col-sm-4 col-form-label">NPWP</label>
                            <div class="col-sm-8">
                                <input wire:model.defer="update_wajib_pajak_id" type="text" class="form-control" id="npwp" placeholder="Masukan NPWP">
                            </div>
                            @error('update_wajib_pajak_id')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="mb-3 row">
                            <label for="nama_wp" class="col-sm-4 col-form-label">Nama Wajib Pajak</label>
                            <div class="col-sm-8">
                                <input wire:model.defer="update_name" type="text" class="form-control" id="nama_wp" placeholder="Masukan Nama">
                            </div>
                            @error('update_name')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="mb-3 row">
                            <label for="update_jenis" class="col-sm-4 col-form-label">Jenis Wajib Pajak</label>
                            <div class="col-sm-8">
                                <select id="update_jenis" wire:model.defer="update_jenis" class="form-select" name="status">
                                    <option value="0">Badan</option>
                                    <option value="1">Orang Pribadi</option>
                                </select>
                            </div>
                            @error('update_jenis_wp')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-secondary" href="{{route('wajibPajak')}}">Batal</a>
                    <button wire:click="update" type="button" class="btn btn-primary" id="test">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>
