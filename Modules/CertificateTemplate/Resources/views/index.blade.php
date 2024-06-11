@extends('layout.master')

@section('title', 'Certificate Templates')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate Templates</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">

    <style>
        .conTitle {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 2rem;
        }

        .h2 {
            font-weight: bold;
            color: #232E66;
            padding-left: .1rem;
            font-size: 22px;
            margin-bottom: -0.5rem;
            margin-left: 1rem;
        }

        .btnlogout {
            margin-right: 2rem;
            margin-bottom: .5rem;
            background-color: #FBB041;
            color: #FFF;
            width: 80px;
            height: 35px;
            border-radius: 10px;
            border: none;
            box-shadow: none;
            font-weight: bold;
        }

        .breadcrumb {
            border-top: 2px solid black;
            display: inline-block;
            width: 97%;;
            margin-left: 1rem;
            margin-bottom: 1rem;
        }

        .breadcrumb .sectionDashboard,
        .breadcrumb .divider,
        .breadcrumb .secClass,
        .breadcrumb .sectionCourse {
            /* padding-top: 1rem; */
            /* margin-top: 1rem; */
            display: inline;
            font-size: 11px;
            font-weight: bold;
        }

        .breadcrumb .divider {
            margin: 0 5px;
        }

        .btnTemplate {
            background-color: #4056A1;
            color: #FFF;
            width: 170px;
            height: 30px;
            border-radius: 8px;
            border: none;
            box-shadow: none;
            font-weight: bold;
            font-size: 13px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
            margin-left: .5rem;
            margin-bottom: 3rem;
            padding-top: .3rem;
        }

        .conBtn {
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            margin-right: 1rem;
        }

        .conBtn button {
            margin-right: 1rem;
            margin-left: .5rem;
        }

        th,
        td {
            padding: 12px;
            /* Adjust this value as needed for the desired spacing */
            text-align: center;
            /* Optional: Center-align text */
        }

        th {
            font-weight: bold;
            color: #232E66;
            font-size: 13px;
        }

        .buttons-colvis {
            background-color: #4056A1;
            color: #FFF;
            width: 135px;
            height: 30px;
            border-radius: 8px;
            border: none;
            box-shadow: none;
            font-weight: bold;
            font-size: 12px;
            margin-left: .5rem;
            margin-bottom: .5rem;
            padding: 6px 12px;
            transition: background-color 0.3s ease;
        }

        .buttons-colvis:hover {
            background-color: #31446B;
        }

        .buttons-colvis:active {
            background-color: #2C3F63;
        }

        .buttons-copy,
        .buttons-excel,
        .buttons-pdf {
            background-color: #4056A1;
            color: #FFF;
            width: 80px;
            height: 30px;
            border-radius: 8px;
            border: none;
            box-shadow: none;
            font-size: 12px;
            font-weight: bold;
            margin-left: 45rem;
            margin-bottom: .5rem;
            /* margin-right: .5rem; */
            padding: 6px 12px;
            transition: background-color 0.3 ease;
        }

        .buttons-copy:hover,
        .buttons-excel:hover,
        .buttons-pdf:hover {
            background-color: #31446B;
        }

        .buttons-copy:active,
        .buttons-excel:active,
        .buttons-pdf:active {
            background-color: #2C3F63;
        }

        .buttons-container {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            margin-bottom: 10px;
        }

        .dataTables_length {
            margin-bottom: 10px;
        }

        .buttons-container .dt-buttons {
            margin-bottom: 10px;
        }

        .tableCerti {
            border: 1px solid #000000;
            border-radius: 8px;
            overflow: hidden;
        }

        .btnEdit {
            background-color: #4056A1;
            width: 3rem;
            height: 1rem;
            color: #FFF !important;
            font-size: 12px;
            text-align: center;
            display: inline-block;
            padding-top: 4px;
            padding-bottom: 10px;
            border-radius: .4rem;
            margin-right: .5rem;
        }

        .btnDelete {
            background-color: #F13C20;
            width: 3.5rem;
            height: 1rem;
            color: #FFF !important;
            font-size: 12px;
            text-align: center;
            display: inline-block;
            padding-top: 5px;
            padding-bottom: 10px;
            border-radius: .4rem;
            margin-right: .5rem;
        }

        .custom-length-container {
            margin-bottom: 10px;
            margin-left: .5rem;
            font-size: 12px;
        }

        .custom-pagination-container {
            margin-left: 10rem;
        }

        .custom-info-text {
            margin-bottom: 10px;
            margin-left: .5rem;
            font-size: 12px;
        }

        .dataTables_paginate {
            font-size: 12px;
        }

        .buttons-container .dt-buttons {
            margin-bottom: 10px;
            /* margin-right: 10rem; */
        }

        .dataTables_wrapper .dataTables_filter {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container conTitle">
        <h2 class="h2">Certificate Templates</h2>
        <form class="form-inline my-2 my-lg-0 me-3" method="post" action="{{ route('logout') }}">
            @csrf
            <button class="btnlogout" type="submit">Logout</button>
        </form>
    </div>

    <div class="breadcrumb pt-2 pb-4">
        <a class="section" href="{{ url('/') }}">Dashboard</a>
        <span class="divider">></span>
        <div class="sectionCourse">Class</div>
        <span class="divider">></span>
        <div class="secClass">Certificate Templates</div>
    </div>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    <div class="container">
        <div class="row">
            <div class="col">
                <a class="btnTemplate btn-primary" href="{{ route('certificate-templates.create') }}">
                    Template Certificate +
                </a>
            </div>

            <table id="table" class="tableCerti table-striped w-100">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Course Type - Batch</th>
                        <th>Marker State</th>
                        <th>Template Content</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($certificateTemplates as $certificateTemplate)
                    <tr>
                        <td>{{ $certificateTemplate->id }}</td>
                        <td>
                            <img src="{{ asset('uploads/certificate/' . $certificateTemplate->type->id . '/' . $certificateTemplate->filename) }}" alt="{{ $certificateTemplate->filename }}" width="225">
                        </td>
                        <td>{{ $certificateTemplate->type->name . " - " . "Batch $certificateTemplate->batch" ?? '-' }}</td>
                        <td class="text-wrap">{{ \Str::limit($certificateTemplate->marker_state) }}</td>
                        <td id="description" class="text-wrap">{!! !empty($certificateTemplate->template_content) ? \Str::limit($certificateTemplate->template_content) : '-' !!}</td>
                        <td>{{ $certificateTemplate->created_at }}</td>
                        <td>{{ $certificateTemplate->updated_at }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('certificate-templates.edit', $certificateTemplate->id) }}" class="btnEdit">Edit</a>
                                <a href="{{ route('certificate-templates.destroy', $certificateTemplate->id) }}" class="btnDelete">Delete</a>
                                <!-- <form action="{{ route('certificate-templates.destroy', $certificateTemplate->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btnDelete" type="submit">Delete</button>
                                </form> -->
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Course Type - Batch</th>
                        <th>Marker State</th>
                        <th>Template Content</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>

        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.colVis.min.js"></script>

        <script>
            $(document).ready(function() {
                let table = $('#table').DataTable({
                    scrollX: true,
                    lengthChange: true,
                    lengthMenu: [10, 25, 50, 100],
                    lengthMenu: [10, 25, 50, 100],
                    buttons: [
                        'colvis',
                        {
                            extend: 'copy',
                            className: 'buttons-copy',
                        },
                        {
                            extend: 'excel',
                            className: 'buttons-excel',
                        },
                        {
                            extend: 'pdf',
                            className: 'buttons-pdf',
                        },
                    ],
                    searching: true,
                    columnDefs: [{
                        "visible": false,
                        "targets": [0]
                    }],
                    initComplete: function() {
                        this.api()
                            .columns()
                            .every(function() {
                                var column = this;
                                var title = column.footer().textContent;

                                // Create input element and add event listener
                                $('<input class="form-control" type="text" placeholder="Search ' + title + '" />')
                                    .appendTo($(column.footer()).empty())
                                    .on('keyup change clear', function() {
                                        if (column.search() !== this.value) {
                                            column.search(this.value).draw();
                                        }
                                    });
                            });
                    }
                });
                let buttonContainer = $('<div>').addClass('buttons-container');
                table.buttons().container().appendTo(buttonContainer);
                buttonContainer.insertBefore('.tableCerti .dataTables_length');

                // Create container for buttons and pagination
                let buttonPaginationContainer = $('<div>').addClass('button-pagination-container');
                buttonPaginationContainer.css({
                    display: 'block',
                    flexDirection: 'row',
                    justifyContent: 'flex-start',
                    // marginTop: '10px'
                });

                // Insert the buttons into the new container
                table.buttons().container().appendTo(buttonPaginationContainer);

                // Insert the show entries and info into the new container with custom classes
                // $('.dataTables_length').addClass('custom-length-container').appendTo(buttonPaginationContainer);
                // $('.dataTables_info').addClass('custom-info-text').appendTo(buttonPaginationContainer);
                // $('.dataTables_paginate').addClass('custom-pagination-container').appendTo(buttonPaginationContainer);

                // Insert the new container before the table
                buttonPaginationContainer.insertBefore('#table');

                // Apply the search for individual columns
                table.columns().every(function() {
                    let that = this;

                    $('input', this.header()).on('keyup change clear', function() {
                        if (that.search() !== this.value) {
                            that
                                .search(this.value)
                                .draw();
                        }
                    });
                });
                table.buttons().container().appendTo('#table_wrapper .col-md-6:eq(0)');

                // $("select[name='table_length']").on('click', function() {
                //     $.ajax({
                //         url: "",
                //         type: 'GET',
                //         data: {
                //             per_page: $(this).val()
                //         },
                //         success: function(data) {
                //             console.log(data);
                //         }
                //     });
                //     console.log($(this).val());
                // });

                table.buttons().container()
                    .appendTo('#table_wrapper .col-md-6:eq(0)');

                $(".btnDelete").on("click", function(e) {
                    e.preventDefault();
                    let confirmDelete = confirm("Are you sure you want to delete this item?");
                    if (confirmDelete) {
                        $(this).parent().submit();
                    }
                });
            });
        </script>
    </div>
</body>

</html>
@endsection