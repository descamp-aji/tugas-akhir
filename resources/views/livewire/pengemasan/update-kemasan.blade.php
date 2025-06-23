<div>
    <div class="modal fade" id="updateKemasan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updateKemasanBackdropLabel" aria-hidden="true">
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
                            <label for="npwp" class="col-sm-2 col-form-label">Rak</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="npwp" placeholder="Masukan nama rak">
                            </div>
                            @error('npwp')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="mb-3 row">
                            <label for="nama_wp" class="col-sm-2 col-form-label">Baris</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="nama_wp" placeholder="Masukan nomor baris">
                            </div>
                            @error('nama_wp')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="mb-3 row">
                            <label for="jenis_wp" class="col-sm-2 col-form-label">Kolom</label>
                            <div class="col-sm-10">
                                <select id="role" wire:model="status" class="form-select" name="status">
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
                            @error('jenis_wp')
                                <small class="text-danger">{{$message}}</small>
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
