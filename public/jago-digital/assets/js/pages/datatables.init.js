$(document).ready(function () {
    // Inisialisasi DataTable
    let table = $("#datatable").DataTable({
        dom: "Bftip",
        scrollX: true,
        lengthChange: false,
        buttons: [
            "copy",
            "excel",
            "pdf",
            {
                extend: "colvis",
                className: "custom-colvis-btn",
                postfixButtons: ["colvisRestore"],
                columnText: function (dt, idx, title) {
                    return title;
                },
            },
        ],
        searching: true,
        columnDefs: [{ visible: false, targets: [-5, -4, -3, 0] }],
        initComplete: function () {
            // Simpan referensi API DataTables dalam variabel
            var api = this.api();

            // Iterasi setiap kolom
            api.columns().every(function () {
                var column = this;
                var title = column.header().textContent; // Gunakan header() untuk mendapatkan judul kolom
                var columnIndex = column.index();
                var totalColumns = api.columns().count();
                var statusColumnIndex = totalColumns - 2; // Indeks kolom status (ke-2 dari akhir)

                // Jika ini adalah kolom status
                if (columnIndex === statusColumnIndex) {
                    // Membuat elemen dropdown dengan opsi yang diinginkan
                    var select = $(
                        '<select class="form-control"><option value="">All</option><option value="Aktif">Aktif</option><option value="Non Aktif">Nonaktif</option></select>'
                    )
                        .appendTo($(column.footer()).empty())
                        .on("change", function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );
                            column
                                .search(val ? "^" + val + "$" : "", true, false)
                                .draw();
                        });
                } else {
                    // Membuat elemen input text untuk kolom lainnya
                    $(
                        '<input class="form-control" type="text" placeholder="Search ' +
                            title +
                            '" />'
                    )
                        .appendTo($(column.footer()).empty())
                        .on("keyup change clear", function () {
                            if (column.search() !== this.value) {
                                column.search(this.value).draw();
                            }
                        });
                }
            });
        },
    });

    // Menempatkan tombol di dalam kontainer yang sesuai
    table.buttons().container().appendTo("#datatable_wrapper .col-md-6:eq(0)");
});
