<div>
    <div>
        <div wire:ignore.self class="modal fade" id="updateDocument" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addDocumentBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addDocumentBackdropLabel">Ubah Data Berkas</h1>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3" wire:submit="update">
                            <div class="row g-3">
                                @csrf
                                <div class="col-md-5">
                                    <label for="wajib_pajak_id" class="form-label">NPWP</label>
                                    <input type="text" wire:model.live="wajib_pajak_id" class="form-control" id="wajib_pajak_id" name= "wajib_pajak_id" placeholder="Masukan NPWP">
                                    @error('wajib_pajak_id')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-7">
                                    <label for="nama_wp" class="form-label">Nama Wajib Pajak</label>
                                    <input type="text" wire:model="nama_wp" class="form-control" id="nama_wp" name= "nama_wp" disabled>
                                    @error('nama_wp')
                                        <small class="text-danger text-end">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="no_lhp" class="form-label">Nomor LHP</label>
                                    <input type='text' name="no_lhp" wire:model="no_lhp" class="form-control" id="no_lhp" placeholder="Masukan Nomor LHP">
                                </div>
                                    @error('no_lhp')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                <div class="col-md-6">
                                    <label for="tgl_lhp" class="form-label">Tanggal LHP</label>
                                    <input type="date" wire:model="tgl_lhp" class="form-control" id="tgl_lhp" name="tgl_lhp" placeholder="Masukan tgl_lhp pajak">
                                    @error('tgl_lhp')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <label for="update_masa_pajak_awal" class="form-label">Masa Awal</label>
                                    <input type="text" name="update_masa_pajak_awal" wire:model="update_masa_pajak_awal" class="form-control" id="update_masa_pajak_awal" placeholder="mm-YYYY">
                                </div>
                                @error('update_masa_pajak_awal')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                                <div class="col-md-3">
                                    <label for="masa_pajak_akhir" class="form-label">Masa Akhir</label>
                                    <input type="text" name="masa_pajak_akhir" wire:model="masa_pajak_akhir" class="form-control" id="masa_pajak_akhir" placeholder="mm-YYYY">
                                </div>
                                @error('masa_pajak_akhir')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                                <div class="col-md-4">
                                    <label for="berkas_status_id" class="form-label">Status Berkas</label>
                                    <select id="berkas_status_id" wire:model="berkas_status_id" class="form-select" name="berkas_status_id">
                                        @foreach ($status as $item)
                                        <option value="{{$item->berkas_status_id}}">{{$item->deskripsi}}</option>   
                                        @endforeach
                                    </select>
                                    @error('berkas_status_id')
                                        <small class="text-danger text-end">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <label for="kode_riksa_id" class="form-label">Kode Riksa</label>
                                    <select id="kode_riksa_id" wire:model="kode_riksa_id" class="form-select" name="kode_riksa_id">
                                        @foreach ($kode_riksa as $kode)
                                        <option value="{{$kode->kode_riksa_id}}">{{$kode->kode_riksa_id}}</option>
                                        @endforeach
                                    </select>
                                    @error('kode_riksa_id')
                                        <small class="text-danger text-end">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-md-5">
                                <label for="kemasan_id" class="form-label">Kemasan</label>
                                <select id="kemasan_id" wire:model="kemasan_id" class="form-select" name="kemasan_id">
                                    <option value="" selected>Pilih</option>
                                    @foreach ($kemasan as $item)
                                    <option value="{{$item->kemasan_id}}"> {{$item->label}}</option>
                                    @endforeach
                                </select>
                                @error('kemasan_id')
                                    <small class="text-danger text-end">{{$message}}</small>
                                @enderror
                            </div>
                            </div>
                            <div class="modal-footer">
                                <a type="button" class="btn btn-secondary" href="{{route("berkas")}}">Batal</a>
                                <button type="submit" class="btn btn-primary" id="test">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
