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
    });