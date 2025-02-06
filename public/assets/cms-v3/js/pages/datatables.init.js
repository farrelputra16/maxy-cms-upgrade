$(document).ready(function () {
    var pageTitle = document.title;

    var buttons = [
            {
                extend: "copy",
                text: "Copy",
                className: "maxy-btn-secondary custom-colvis-btn",
            },
            {
                extend: "excel",
                text: "Export Excel",
                className: "maxy-btn-secondary custom-colvis-btn",
            },
            {
                extend: "pdfHtml5",
                text: "Export PDF",
                className: "maxy-btn-secondary custom-colvis-btn",
                filename: pageTitle,
                title: pageTitle,
                orientation: "landscape",
                pageSize: "A4",
                exportOptions: {
                    columns: function (idx, data, node) {
                        // Export only shown columns; hidden columns won't be included
                        return (
                            $(node).css("display") !== "none" &&
                            !$(node).is(":last-child")
                        );
                    },
                    format: {
                        body: function (data, row, column, node) {
                            // Extract only the text content from the <td> element
                            return $(node).text().trim();
                        },
                    },
                },
                customize: function (doc) {
                    // Customize the PDF document
                    console.log("customizing the PDF...");
                    doc.pageMargins = [10, 10, 10, 10];
                    var table = doc.content[1].table;
                    var columnCount = table.body[0].length;
                    var totalWidth = 595 - 20; // A4 landscape width minus margins (10 left + 10 right)
                    if (columnCount > 10) {
                        table.widths = Array(columnCount).fill(
                            totalWidth / columnCount
                        );
                    } else {
                        table.widths = Array(columnCount).fill("*");
                    }
                    doc.defaultStyle.fontSize = columnCount > 10 ? 6 : 8;
                    doc.styles.tableHeader.fontSize = columnCount > 10 ? 7 : 9;
                    doc.content[1].layout = {
                        fillColor: function (rowIndex) {
                            return rowIndex % 2 === 0 ? "#d9d9d9" : null;
                        },
                    };
                    console.log("finished customizing the PDF.");
                },
            },
            {
                extend: "colvis",
                className: "maxy-btn-secondary custom-colvis-btn",
                postfixButtons: ["colvisRestore"],
                columnText: function (dt, idx, title) {
                    return title;
                },
            },
        ];

    if (window.exportCsvRoute) {
        console.log("exportCsvRoute Found.");
        buttons.push({
            text: "Export All (CSV)",
            className: "maxy-btn-secondary custom-colvis-btn",
            action: function (e, dt, node, config) {
                var params = dt.ajax.params();
                params.start = 0;
                params.length = -1; // Signal to export all data

                $.ajax({
                    url: window.exportCsvRoute,
                    type: "POST",
                    data: params,
                    xhrFields: {
                        responseType: "blob",
                    },
                    headers: {
                        "X-CSRF-TOKEN": window.csrfToken,
                    },
                    success: function (data) {
                        var blob = new Blob([data], { type: "text/csv" });
                        var link = document.createElement("a");
                        link.href = window.URL.createObjectURL(blob);
                        link.download = "users_export.csv";
                        document.body.appendChild(link);
                        link.click();
                        document.body.removeChild(link);
                        window.URL.revokeObjectURL(link.href);
                    },
                    error: function (xhr, status, error) {
                        console.error("Export error:", error);
                        alert(
                            "Error exporting data. Check console for details."
                        );
                    },
                });
            },
        });
    }
    if (window.exportPdfRoute) {
        console.log("exportPdfRoute Found");
        buttons.push({
            text: "Export All (PDF)",
            className: "maxy-btn-secondary custom-colvis-btn",
            action: function (e, dt, node, config) {
                var params = dt.ajax.params();
                params.start = 0;
                params.length = -1; // Signal to export all data
                $.ajax({
                    url: window.exportPdfRoute,
                    type: "POST",
                    data: params,
                    xhrFields: {
                        responseType: "blob",
                    },
                    headers: {
                        "X-CSRF-TOKEN": window.csrfToken,
                    },
                    success: function (data) {
                        var blob = new Blob([data], {
                            type: "application/pdf",
                        });
                        var link = document.createElement("a");
                        link.href = window.URL.createObjectURL(blob);
                        link.download = "users_export.pdf";
                        document.body.appendChild(link);
                        link.click();
                        document.body.removeChild(link);
                        window.URL.revokeObjectURL(link.href);
                    },
                    error: function (xhr, status, error) {
                        console.error("Export error:", error);
                        alert(
                            "Error exporting data. Check console for details."
                        );
                    },
                });
            },
        });
    }

    // Initialize DataTables
    $(".table").each(function () {
        var table = $(this);

        // Check if DataTables is using server-side processing
        var isServerProcessing = table.data("server-processing") === true;
        var ajaxUrl = table.data("url");
        var colVis = table.data("colvis")
            ? table.data("colvis")
            : [-6, -5, -4, -3, 1];
        var id = table.data("id");
        var noStatus = table.data("no-status");

        if (isServerProcessing) console.log("server-processing set to TRUE.");
        else console.log("server-processing set to FALSE");

        // create DataTables
        var tableInstance = table.DataTable({
            dom: "Btip",
            autoWidth: true,
            scrollX: true,
            lengthChange: false,
            processing: isServerProcessing,
            serverSide: isServerProcessing,
            ajax: isServerProcessing
                ? {
                      url: ajaxUrl,
                      type: "GET",
                      data: function (d) {
                          // Add additional data if needed
                          d.class_id = $("#classSelect").val(); // // Example: Get class_id from a dropdown
                          d.id = id;
                      },
                  }
                : null, // No ajax if not server-side
            ...(isServerProcessing && { columns: columns }),
            buttons: buttons,
            language: {
                url: "https://cdn.datatables.net/plug-ins/2.1.8/i18n/id.json", // Menambahkan URL bahasa Indonesia
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
                    if (!noStatus) {
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
                                        var val =
                                            $.fn.dataTable.util.escapeRegex(
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
                    } else {
                        if ($(column.footer()).length) {
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
