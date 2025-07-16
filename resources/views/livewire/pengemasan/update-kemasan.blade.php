<div>
    <div wire:ignore.self class="modal fade" id="updateKemasan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updateKemasanBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="updateKemasanBackdropLabel">Ubah Data Kemasan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        @csrf
                        <div class="mb-3 row">
                            <label for="update_rak" class="col-sm-2 col-form-label">Rak</label>
                            <div class="col-sm-10">
                                <input wire:model.defer= "update_rak" type="text" class="form-control" id="update_rak" placeholder="Masukan nama rak">
                            </div>
                            @error('update_rak')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="mb-3 row">
                            <label for="update_baris" class="col-sm-2 col-form-label">Baris</label>
                            <div class="col-sm-10">
                                <input wire:model.defer="update_baris" type="number" class="form-control" id="update_baris" placeholder="Masukan nomor baris">
                            </div>
                            @error('update_baris')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="mb-3 row">
                            <label for="update_kolom" class="col-sm-2 col-form-label">Kolom</label>
                            <div class="col-sm-10">
                                <select id="update_kolom" wire:model="update_kolom" class="form-select" name="status">
                                    <option value="" selected>Pilih...</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </div>
                            @error('update_kolom')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                            @error('update_label')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button wire:click="update" type="button" class="btn btn-primary" id="test">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>
