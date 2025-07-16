<div>
    <div wire:ignore.self class="modal fade" id="detailTransaction" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Daftar Berkas</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="table-responsive" style="max-width: 100%;">
                                <table id="taransactionTable" class="table table-bordered table-hover">
                                    <thead class="text-center table-primary">
                                        <tr>
                                            <th>No</th>
                                            <th>NPWP</th>
                                            <th>Nama WP</th>
                                            <th>Nomor Dokumen</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @if (count($transaction_detail) == 0)
                                        <tr>
                                            <td colspan="4">Tidak ada data</td>
                                        </tr>
                                        @endif
                                        @foreach ($transaction_detail as $key => $item)
                                        <tr>
                                            <td>{{$key + 1}}</td>
                                            <td>{{$item->wajib_pajak_id}}</td>
                                            <td>{{$item->wajib_pajak->name}}</td>
                                            <td>{{$item->no_lhp}}</td>
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
                </div>
            </div>
        </div>
    </div>
</div>
