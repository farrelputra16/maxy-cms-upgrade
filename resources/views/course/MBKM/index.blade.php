@extends('layout.master')

@section('title', 'MBKM')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MBKM</title>
    <!-- Include CSS libraries for styling the table -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">

    <style>
        body {
            background-color: #E3E5EE;
        }

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
            margin-right: 1rem;
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
            width: 97%;
            margin-left: 1rem;
            margin-bottom: 1rem;
        }

        .breadcrumb .sectionDashboard,
        .breadcrumb .divider,
        .breadcrumb .sectionMaster,
        .breadcrumb .sectionMBKM {
            display: inline;
            font-size: 11px;
            font-weight: bold;
        }

        .breadcrumb .divider {
            margin: 0 5px;
        }

        .btnAdd {
            color: #1533B5;
            width: 140px;
            height: 30px;
            font-weight: bold;
            font-size: 13px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
            padding-top: .3rem;
            margin-left: 2rem;
        }

        .conBtn {
            display: flex;
            justify-content: flex-end;
            margin-right: 1rem;
        }

        .conBtn button {
            margin-right: 1rem;
            margin-left: .5rem;
        }

        .conShow {
            display: flex;
            align-items: center;
            gap: .5rem;
        }

        .conPagi {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 10px;
        }

        .buttons-prev,
        .buttons-next {
            background-color: #4056A1;
            color: #FFF;
            border: none;
            border-radius: 8px;
            padding: 6px 12px;
            font-size: 12px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .buttons-prev:hover,
        .buttons-next:hover {
            background-color: #31446B;
        }

        .buttons-prev:active,
        .buttons-next:active {
            background-color: #2C3F63;
        }

        th,
        td {
            padding: 12px;
            /* Adjust this value as needed for the desired spacing */
            text-align: left;
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
            margin-top: .5rem;
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
            margin-top: .5rem;
            margin-left: 1rem;
            margin-bottom: .5rem;
            padding: 6px 12px;
            transition: background-color 0.3s ease;
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
            flex-direction: row;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .tableMBKM {
            overflow-x: scroll;
        }

        .tableMBKM td,
        .tableMBKM th,
        .desc th,
        .desc td,
        .short th,
        .short td,
        .content th,
        .content td {
            word-wrap: break-word;
            white-space: normal;
        }

        .tableMBKM th:nth-child(2),
        .tableMBKM td:ntn-child(2),
        .short th:nth-child(5),
        .short td:ntn-child(5),
        .desc th:nth-child(6),
        .desc td:ntn-child(6),
        .content th:nth-child(7),
        .content td:ntn-child(7) {
            max-width: 200px;
            word-wrap: break-word;
        }

        .tableMBKM td:nth-child(2) div,
        .tableMBKM td:nth-child(5) div,
        .tableMBKM td:nth-child(6) div,
        .tableMBKM td:nth-child(7) div {
            white-space: normal !important;
            display: -webkit-box;
            overflow: hidden;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
        }

        .tableMBKM th.course-name,
        .tableMBKM td.course-name,
        .tableMBKM th.short,
        .tableMBKM td.short,
        .tableMBKM th.desc,
        .tableMBKM td.desc,
        .tableMBKM th.content,
        .tableMBKM td.content {
            max-width: 200px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .tableMBKM td.course-name,
        .tableMBKM td.short,
        .tableMBKM td.desc,
        .tableMBKM td.content {
            white-space: normal;
            word-wrap: break-word;
        }

        .tableMBKM td.course-name::after {
            content: '...';
            display: block;
            position: absolute;
            bottom: 0;
            right: 0;
            background: linear-gradient(to right, rgba(255, 255, 255, 0), #ffffff 50%);
            padding: 0 4px;
        }

        .tableMBKM td.short::after {
            content: '...';
            display: block;
            position: absolute;
            bottom: 0;
            right: 0;
            background: linear-gradient(to right, rgba(255, 255, 255, 0), #ffffff 50%);
            padding: 0 4px;
        }

        .custom-striped tbody tr:nth-of-type(odd) {
            background-color: #E3E3E3;
        }

        .custom-striped tbody tr:nth-of-type(even) {
            background-color: #FFF;
        }

        .custom-striped tbody tr:nth-of-type(odd) td,
        .custom-striped tbody tr:nth-of-type(even) td {
            color: #000000;
        }

        .btnAktif {
            background-color: #46E44C;
            width: 5rem;
            height: 1rem;
            color: #FFF !important;
            font-size: 12px;
            text-align: center;
            display: inline-block;
            padding-top: 4px;
            padding-bottom: 10px;
            border-radius: .4rem;
        }

        .btnNon {
            background-color: #F13C20;
            width: 5rem;
            height: 1rem;
            color: #FFF !important;
            font-size: 12px;
            text-align: center;
            display: inline-block;
            padding-top: 4px;
            padding-bottom: 10px;
            border-radius: .4rem;
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

        .btnModul {
            background-color: #4056A1;
            width: 6rem;
            height: 1rem;
            color: #FFF !important;
            font-size: 12px;
            text-align: center;
            display: inline-block;
            padding-top: 4px;
            padding-bottom: 10px;
            border-radius: .4rem;
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

        div.dt-container {
            width: 800px;
            margin: 0 auto;
        }

        .card {
            margin-right: 1rem;
            margin-bottom: 2rem;
            border-radius: 15px;
        }
    </style>
</head>

<body>
    <div class="container conTitle">
        <h2 class="h2">MBKM</h2>
        <form class="form-inline my-2 my-lg-0 me-3" method="post" action="{{ route('logout') }}">
            @csrf
            <button class="btnlogout" type="submit">Logout</button>
        </form>
    </div>
    <div class="breadcrumb pt-2 pb-4">
        <div class="container">
            <div class="row">
                <div class="col-10">
                    <a class="sectionDashboard" href="{{ url('/') }}">Dashboard</a>
                    <span class="divider">></span>
                    <div class="sectionMaster">Master</div>
                    <span class="divider">></span>
                    <div class="sectionMBKM">MBKM</div>
                </div>
                <div class="col-2">
                    <a class="btnAdd" href="{{ route('getAddMBKM') }}" role="button">Add MBKM</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <table id="table" class="tableMBKM table-striped custom-striped nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th class="course-name">MBKM Name</th>
                                <th>Promo Price</th>
                                <th>Price</th>
                                <!-- <th>MBKM Type</th> -->
                                <th class="short">Short Description</th>
                                <th class="desc">Description</th>
                                <th>Content</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td class="course-name" data-toggle="tooltip" data-placement="top" title="{{ $item->name }}">{{ $item->name }}</td>
                                <td>{{ $item->fake_price ? 'Rp' . number_format($item->fake_price, 0, ',', '.') : '-' }}</td>
                                <td>{{ $item->price ? 'Rp' . number_format($item->price, 0, ',', '.') : '-' }}</td>
                                <td class="short" data-toggle="tooltip" data-placement="top" title="{{ $item->short_description }}">{{ $item->short_description }}</td>
                                <td class="desc" data-toggle="tooltip" data-placement="top" title="{{ $item->description }}">{!! !empty($item->description) ? \Str::limit($item->description, 30) : '-' !!}</td>
                                <td class="content" title="{{ $item->content }}">{{ $item->content }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->updated_at }}</td>
                                <td>
                                    @if ($item->status == 1)
                                    <a class="btnAktif">Aktif</a>
                                    @else
                                    <a class="btnNon">Non Aktif</a>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('getEditMBKM', ['id' => $item->id]) }}" class="btnEdit">Edit</a>
                                        <a href="{{ route('getCourseModule', ['course_id' => $item->id, 'page_type' => 'LMS']) }}" class="btnModul">Modules List</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>MBKM Name</th>
                                <th>Fake Price</th>
                                <th>Price</th>
                                <!-- <th>MBKM Type</th> -->
                                <th>Short Description</th>
                                <th>Description</th>
                                <th>Content</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>

                    <!-- Info and Pagination container -->
                    <div class="buttons-container">
                        <div class="custom-info-text"></div>
                        <div class="custom-pagination-container"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<!-- Include JS libraries for DataTable initialization -->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
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
        $('[data-toggle="tooltip"]').tooltip();
        let table = $('#table').DataTable({
            scrollX: true,
            lengthChange: false,
            // lengthMenu: [10, 25, 50, 100],
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
            // columnDefs: [{}],
            columnDefs: [{
                    "visible": false,
                    "targets": [0]
                },
                // {
                //     "width": "200px",
                //     "targets": 1
                // }
            ],
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

        let buttonContainer = $('<div>').addClass('buttons-container');
        table.buttons().container().appendTo(buttonContainer);
        buttonContainer.insertBefore('.tableMBKM .dataTables_length');

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
    });
</script>
@endsection