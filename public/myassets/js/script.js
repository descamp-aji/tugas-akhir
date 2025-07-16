$(document).ready(function() {
    $('#addDocument').on('shown.bs.modal', function () {
        flatpickr("#masaAwal", {
            plugins: [
                new monthSelectPlugin({
                    shorthand: true, // Jika true, bulan tampil dalam bentuk singkat (Jan, Feb, etc)
                    dateFormat: "m-Y", // Format tanggal yang disimpan dan ditampilkan
                    altFormat: "Y F" // Format tampilan alternatif yang lebih user-friendly
                })
            ],
            allowInput: true,
        });
        flatpickr("#masaAkhir", {
            plugins: [
                new monthSelectPlugin({
                    shorthand: true, // Jika true, bulan tampil dalam bentuk singkat (Jan, Feb, etc)
                    dateFormat: "m-Y", // Format tanggal yang disimpan dan ditampilkan
                    altFormat: "Y F" // Format tampilan alternatif yang lebih user-friendly
                })
            ],
            allowInput: true,
        });
    });
        document.addEventListener('close-modal', () => {
        var modalEl = document.getElementById('deleteConfirm');
        var modal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
        modal.hide();
    });
        document.addEventListener('close-cart', () => {
        var modalEl = document.getElementById('cartModal');
        var modal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
        modal.hide();
    });
        document.addEventListener('close-reject', () => {
        var modalEl = document.getElementById('rejectConfirm');
        var modal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
        modal.hide();
    });
        document.addEventListener('close-approve', () => {
        var modalEl = document.getElementById('approveConfirm');
        var modal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
        modal.hide();
    });
        document.addEventListener('close-pengembalian', () => {
        var modalEl = document.getElementById('returnConfirm');
        var modal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
        modal.hide();
    });
        document.addEventListener('close-addDocument', () => {
        var modalEl = document.getElementById('addDocument');
        var modal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
        modal.hide();
    });
});