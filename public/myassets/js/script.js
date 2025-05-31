let dataTableInstance;

function initializeDataTable() {
    // Jika DataTable sudah diinisialisasi, hancurkan dulu agar tidak duplikat
    if ($.fn.DataTable.isDataTable('#userTable')) {
        $('#userTable').DataTable().destroy();
    }

    // Inisialisasi DataTable dengan konfigurasi yang sesuai
    dataTableInstance = $('#userTable').DataTable({
        pageLength: 5,
        lengthMenu: [5, 10, 25, 50],
        columnDefs: [
            { orderable: false, targets: 0 },  // Kolom nomor urut (No)
            { orderable: false, targets: -1 }  // Kolom aksi (biasanya kolom terakhir)
        ],
        // Tambahkan opsi lain jika diperlukan, misal bahasa, searching, dll
    });

    // Membuat nomor urut otomatis yang update saat sorting, searching, dan paging
    dataTableInstance.on('order.dt search.dt draw.dt', function() {
        let pageInfo = dataTableInstance.page.info();
        dataTableInstance.column(0, { search: 'applied', order: 'applied', page: 'current' }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1 + pageInfo.start;
        });
    }).draw();
}

// Inisialisasi saat Livewire selesai load halaman
document.addEventListener('livewire:load', function () {
    initializeDataTable();
});

// Re-inisialisasi saat Livewire melakukan update DOM
document.addEventListener('livewire:update', function () {
    initializeDataTable();
});

initializeDataTable();