$(document).ready(function () {
    // Ambil title dari halaman HTML
    var pageTitle = document.title; // Mengambil title dari tag <title> di HTML

    // Inisialisasi DataTable
    $(".table").each(function () {
        var table = $(this);

        // Cek apakah menggunakan server-side processing
        var isServerProcessing = table.data("server-processing") === true;
        var ajaxUrl = table.data("url");
        var colVis = table.data("colvis")
            ? table.data("colvis")
            : [-6, -5, -4, -3, 1];

        // Inisialisasi DataTable dengan atau tanpa server-side processing
        var tableInstance = table.DataTable({
            dom: "Btip",
            autoWidth: true,
            scrollX: true,
            lengthChange: false,
            processing: isServerProcessing, // Tampilkan indikator loading jika server processing aktif
            serverSide: isServerProcessing, // Aktifkan server-side processing sesuai kebutuhan
            ajax: isServerProcessing
                ? {
                      url: ajaxUrl, // Ganti dengan URL yang sesuai
                      type: "GET",
                      data: function (d) {
                          // Tambahkan data tambahan jika diperlukan
                          d.class_id = $("#classSelect").val(); // Misal mengambil class_id dari dropdown
                      },
                  }
                : null, // Jika tidak server-side, tidak perlu ajax
            columns: columns,
            buttons: [
                {
                    extend: 'copy',
                    text: 'Salin'
                },
                {
                    extend: 'excel',
                    text: 'Ekspor ke Excel'
                },
                // {
                //     extend: "pdfHtml5",
                //     text: "Export PDF",
                //     filename: pageTitle, // Menggunakan title halaman sebagai nama file PDF
                //     title: pageTitle, // Menggunakan title halaman sebagai judul PDF
                //     orientation: "landscape", // Atur orientasi halaman PDF
                //     pageSize: "A4", // Ukuran halaman
                //     exportOptions: {
                //         // Mengekspor kolom yang terlihat dan bukan kolom terakhir
                //         columns: function (idx, data, node) {
                //             // Pilih hanya kolom yang terlihat dan bukan kolom terakhir
                //             return $(node).css('display') !== 'none' && !$(node).is(':last-child');
                //         }
                //     },
                //     customize: function (doc) {
                //         // Kurangi margin untuk menambah ruang
                //         doc.styles.tableHeader.fontSize = 7; // Ukuran font header tabel
                //         doc.styles.tableBodyOdd.fillColor = "#f3f3f3"; // Warna latar baris ganjil
                //         doc.styles.tableBodyEven.fillColor = "#ffffff"; // Warna latar baris genap

                //         // Sesuaikan lebar kolom agar sesuai dengan konten
                //         var table = doc.content[1].table;
                //         var columnCount = table.body[0].length;
                //         var columnWidths = [];

                //         // Tentukan lebar kolom berdasarkan konten terpanjang
                //         for (var i = 0; i < columnCount; i++) {
                //             var maxWidth = Math.max(
                //                 ...table.body.map(function (row) {
                //                     return (
                //                         (row[i] && row[i].toString().length) ||
                //                         0
                //                     );
                //                 })
                //             );
                //             columnWidths.push(maxWidth * 2); // Sesuaikan faktor untuk lebar kolom
                //         }

                //         // Terapkan lebar kolom yang dihitung
                //         table.widths = columnWidths;

                //         // Atur margin jika perlu
                //         doc.pageMargins = [30, 30, 30, 30]; // Margin atas, kiri, kanan, bawah
                //     },
                // },
                {
                    extend: "pdfHtml5",
                    text: "Export PDF",
                    filename: pageTitle, // Gunakan title halaman sebagai nama file
                    title: pageTitle, // Gunakan title halaman sebagai judul PDF
                    orientation: "landscape", // Orientasi landscape untuk tabel lebar
                    pageSize: "A4", // Ukuran kertas
                    exportOptions: {
                        columns: function (idx, data, node) {
                            // Ekspor hanya kolom yang terlihat (tidak disembunyikan)
                            return $(node).css("display") !== "none" && !$(node).is(":last-child");
                        },

                        format: {
                            body: function (data, row, column, node) {
                                // Ambil data dari atribut data-export jika ada
                                var exportData = $(node).data("export");
                                return exportData !== undefined ? exportData : data;
                            }
                        }
                    },
                    customize: function (doc) {
                        // Gunakan margin kecil untuk memaksimalkan ruang kertas
                        doc.pageMargins = [10, 10, 10, 10];

                        // Ambil tabel dari konten
                        var table = doc.content[1].table;
                        var columnCount = table.body[0].length;

                        // Tentukan lebar total halaman (A4 landscape dalam pt adalah 595)
                        var totalWidth = 595 - 20; // 20 adalah total margin (10 + 10)

                        // Jika tabel memiliki banyak kolom, kecilkan proporsional agar fit
                        if (columnCount > 10) {
                            table.widths = Array(columnCount).fill(totalWidth / columnCount);
                        } else {
                            // Jika kolom sedikit, gunakan auto-fit
                            table.widths = Array(columnCount).fill("*");
                        }

                        // Sesuaikan ukuran font untuk keterbacaan
                        doc.defaultStyle.fontSize = columnCount > 10 ? 6 : 8; // Font lebih kecil jika kolom banyak
                        doc.styles.tableHeader.fontSize = columnCount > 10 ? 7 : 9; // Header lebih kecil juga jika kolom banyak

                        // Warna latar baris bergantian
                        doc.content[1].layout = {
                            fillColor: function (rowIndex) {
                                return rowIndex % 2 === 0 ? "#d9d9d9" : null; // Baris ganjil diberi warna
                            }
                        };
                    }
                },

                {
                    extend: "colvis",
                    className: "custom-colvis-btn",
                    postfixButtons: ["colvisRestore"],
                    columnText: function (dt, idx, title) {
                        return title;
                    },
                },
            ],
            language: {
                url: 'https://cdn.datatables.net/plug-ins/2.1.8/i18n/id.json'  // Menambahkan URL bahasa Indonesia
            },
            scrollX: true, // Mengaktifkan scroll horizontal jika tabel terlalu lebar
            scrollCollapse: true, // Mengaktifkan collapse scroll jika tidak penuh
            searching: true,
            columnDefs: [{ visible: false, targets: colVis }],
            initComplete: function () {
                // Simpan referensi API DataTables
                var api = this.api();

                // Iterasi setiap kolom
                api.columns().every(function () {
                    var column = this;
                    var title = $(column.header()).text(); // Ambil judul kolom dari header
                    var columnIndex = column.index();
                    var totalColumns = api.columns().count();
                    var statusColumnIndex = totalColumns - 2; // Indeks kolom status (ke-2 dari akhir)

                    // Cek apakah kolom memiliki footer
                    if ($(column.footer()).length) {
                        if (columnIndex === statusColumnIndex) {
                            // Membuat elemen dropdown untuk kolom status
                            var select = $(
                                '<select class="form-control"><option value="">All</option><option value="Aktif">Aktif</option><option value="Non Aktif">Nonaktif</option></select>'
                            )
                                .appendTo($(column.footer()).empty())
                                .on("change", function () {
                                    var val = $.fn.dataTable.util.escapeRegex(
                                        $(this).val()
                                    );
                                    column
                                        .search(
                                            val ? "^" + val + "$" : "",
                                            true,
                                            false
                                        )
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
                    }
                });
            },
        });

        // Menempatkan tombol di dalam kontainer yang sesuai
        tableInstance
            .buttons()
            .container()
            .appendTo(
                table.closest(".dataTables_wrapper").find(".col-md-6:eq(0)")
            );
    });
});
