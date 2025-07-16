<div>
    <div wire:ignore.self class="modal fade" id="detailContact" tabindex="-1" aria-labelledby="detailContactLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="detailContactLabel">Detail Kontak</h1>
                </div>
                <div class="modal-body">
                    <h5 class="card-title mb-3" style="color: #8b6d5c;">{{$name}}</h5>
                    <a class="card-text mb-1" href="https://wa.me/62{{$phone}}" target="blank"><i class="bi bi-whatsapp"></i> +62{{$phone}}</a>
                    <p class="card-text mb-1"><i class="bi bi-envelope-at"></i> {{$email}}</p>
                    <p class="card-text mb-1"><i class="bi bi-building"></i></i> {{$seksi}}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
