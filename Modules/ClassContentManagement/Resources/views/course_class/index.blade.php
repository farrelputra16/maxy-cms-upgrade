@extends('layout.master')

@section('title', 'Course Class')

@section('content')
<!DOCTYPE html>
<html>

<head>
    <title>Course Class</title>
    <!-- Include CSS libraries for styling the table -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
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
            width: 97%;;
            margin-left: 1rem;
            margin-bottom: 1rem;
        }

        .breadcrumb .sectionDashboard,
        .breadcrumb .divider,
        .breadcrumb .secClass {
            /* padding-top: 1rem; */
            /* margin-top: 1rem; */
            display: inline;
            font-size: 11px;
            font-weight: bold;
        }

        .breadcrumb .divider {
            margin: 0 5px;
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
            font-size: 12px;
            /* padding-left: .2rem; */
            /* margin-bottom: -0.5rem; */
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
            margin-left: .2rem;
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
            margin-left: 42rem;
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

        .btnAdd {
            background-color: #4056A1;
            color: #FFF;
            width: 80px;
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

        .btnDupli {
            background-color: #4056A1;
            color: #FFF;
            width: 120px;
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

        .tableClass {
            border: 1px solid #000000;
            border-radius: 8px;
            overflow: hidden;
        }

        .tableClass td,
        .tableClass th,
        .batch th,
        .batch td {
            word-wrap: break-word;
            white-space: normal;
        }

        .tableClass th:nth-child(1),
        .tableClass td:ntn-child(1) {
            max-width: 200px;
            word-wrap: break-word;
        }

        .tableClass td:nth-child(1) div {
            white-space: normal !important;
            display: -webkit-box;
            overflow: hidden;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
        }

        .tableClass th.batch {
            max-width: 200px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .tableClass td.batch {
            white-space: normal;
            word-wrap: break-word;
        }

        .tableClass td.batch::after {
            content: '...';
            display: block;
            position: absolute;
            bottom: 0;
            right: 0;
            background: linear-gradient(to right, rgba(255, 255, 255, 0), #ffffff 50%);
            padding: 0 4px;
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

        .btnModul, .btnMember {
            background-color: #4056A1;
            width: 3.5rem;
            height: 1rem;
            color: #FFF !important;
            font-size: 12px;
            text-align: center;
            display: inline-block;
            padding-top: 4px;
            padding-bottom: 10px;
            border-radius: .4rem;
            margin: auto;
            margin-right: 10px;
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
        <h2 class="h2">Class</h2>
        <form class="form-inline my-2 my-lg-0 me-3" method="post" action="{{ route('logout') }}">
            @csrf
            <button class="btnlogout" type="submit">Logout</button>
        </form>
    </div>
    <div class="breadcrumb pt-2 pb-4">
        <a class="sectionDashboard" href="{{ url('/') }}">Dashboard</a>
        <span class="divider">></span>
        <div class="secClass">Class</div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col">
                <a class="btnAdd btn-primary" href="{{ route('getAddCourseClass') }}" role="button">Add Class</a>
                <a class="btnDupli btn-primary" href="{{ route('getDuplicateCourseClass') }}" role="button">Duplicate Class</a>
            </div>

            <table id="table" class="tableClass table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th class="batch">Batch</th>
                        <th>Type</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Quota</th>
                        <th>Announcement</th>
                        <th>Content</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($course_list as $item)
                    <tr>
                        <td class="batch" scope="row">{{ $item->course_name }} Batch {{ $item->batch }}</td>
                        <td>{{ $item->type }} </td>
                        <td>{{ $item->start_date }}</td>
                        <td>{{ $item->end_date }}</td>
                        <td>{{ $item->quota }}</td>
                        <td>{{ $item->announcement ?? '-' }}</td>
                        <td>{!! !empty($item->content) ? \Str::limit($item->content, 30) : '-' !!}</td>
                        <td id="description">{!! !empty($item->description) ? \Str::limit($item->description, 30) : '-'
                            !!}</td>
                        <td>
                            @if ($item->status == 1)
                            <a class="btnAktif">Aktif</a>
                            @else
                            <a class="btnNon">Non Aktif</a>
                            @endif
                        </td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->updated_at }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('getEditCourseClass', ['id' => $item->id]) }}" class="btnEdit">Edit</a>
                                <a href="{{ route('getCourseClassModule', ['id' => $item->id]) }}" class="btnModul">Module</a>
                                <a href="{{ route('getCourseClassMember', ['id' => $item->id]) }}" class="btnMember">Member</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Batch</th>
                        <th>Type</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Quota</th>
                        <th>Announcement</th>
                        <th>Content</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Updated At</th>
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

        <!-- <script>
        $(document).ready(function () {
            let table = $('#courseClassTable').DataTable({
                lengthChange: true,
                lengthMenu: [10, 25, 50, 100],
                buttons: ['copy', 'excel', 'pdf', 'colvis']
            });

            $("select[name='courseClassTable_length']").on('click', function () {
                $.ajax({
                    url: "",
                    type: 'GET',
                    data: {
                        per_page: $(this).val()
                    },
                    success: function (data) {
                        console.log(data);
                    }
                });
                console.log($(this).val());
            });

            table.buttons().container()
                .appendTo('#courseClassTable_wrapper .col-md-6:eq(0)');
        });
    </script> -->
        <script>
            $(document).ready(function() {
                $('[data-toggle="tooltip"]').tooltip();
                let table = $('#table').DataTable({
                    scrollX: true,
                    lengthChange: true,
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
                        "targets": [2, 3, 4, 5, 9]
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
                table.buttons().container().appendTo('.container .col-md-6:eq(0)');
                buttonContainer.insertBefore('#tableCourse .dataTables_length');

                // Create container for buttons and pagination
                let buttonPaginationContainer = $('<div>').addClass('button-pagination-container');
                buttonPaginationContainer.css({
                    display: 'block',
                    flexDirection: 'row',
                    alignItems: 'flex-start',
                    // marginBottom: '10px'
                });

                // Insert the buttons into the new container
                table.buttons().container().appendTo(buttonPaginationContainer);

                // Insert the show entries and info into the new container with custom classes
                // $('.dataTables_length').addClass('custom-length-container').appendTo(buttonPaginationContainer);
                // $('.dataTables_info').addClass('custom-info-text').appendTo(buttonPaginationContainer);
                // $('.dataTables_paginate').addClass('custom-pagination-container').appendTo(buttonPaginationContainer);

                // Insert the new container before the table
                buttonPaginationContainer.insertBefore('#table');

                // Add individual column search inputs and titles
                // $('#table thead th').each(function() {
                //     let title = $(this).text();
                //     $(this).html('<div class="text-center">' + title +
                //         '</div><div class="mt-2"><input class="form-control" type="text" placeholder="Search ' + title +
                //         '" /></div>');
                // });

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
    </div>
</body>

</html>

</div>
@endsection