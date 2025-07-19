<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="detailDocument" tabindex="-1" aria-labelledby="detailDocumentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {{-- <div class="modal-header">
                    <h1 class="modal-title fs-5" id="detailDocumentModalLabel">Detail Berkas</h1>
                </div> --}}
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{$nama_wp}}</h5>
                            <h6 class="card-title">{{$npwp}}</h6>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{$no_lhp}}</li>
                            <li class="list-group-item">{{date('d F Y', strtotime($tgl_lhp))}}</li>
                            <li class="list-group-item">{{$masa_awal}} s.d. {{$masa_akhir}}</li>
                            <li class="list-group-item">{{$kode_riksa}} - {{$deskripsi_kode_riksa}}</li>
                        </ul>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
