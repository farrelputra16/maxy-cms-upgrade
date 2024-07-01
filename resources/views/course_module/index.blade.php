@extends('layout.master')

@section('title', 'Course Module')

@section('content')
<!DOCTYPE html>
<html>

<head>
    <title>Course Module</title>
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
            ;
            margin-left: 1rem;
            margin-bottom: 1rem;
        }

        .breadcrumb .sectionDashboard,
        .breadcrumb .divider,
        .breadcrumb .sectionMaster,
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

        .btnColumn {
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

        .btnCopy,
        .btnPdf,
        .btnExcel {
            margin-left: 45rem;
            margin-bottom: .5rem;
            background-color: #4056A1;
            color: #FFF;
            width: 80px;
            height: 30px;
            border-radius: 8px;
            border: none;
            box-shadow: none;
            font-size: 12px;
            font-weight: bold;
        }

        .formSearch {
            margin-top: .8rem;
            margin-left: 40rem;
            margin-bottom: .5rem;
            width: 150px;
            height: 30px;
        }

        th,
        td {
            padding: 5px;
            /* Adjust this value as needed for the desired spacing */
            text-align: center;
            /* Optional: Center-align text */
        }

        th {
            width: 1%;
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

        .tableParent {
            width: 100%;
            table-layout: fixed;
        }

        .tableParent td,
        .tableParent th,
        .module td,
        .module th,
        .content td,
        .content th,
        .desc td,
        .desc th {
            word-wrap: break-word;
            white-space: normal;
        }

        .tableParent th:nth-child(3),
        .tableParent td:ntn-child(3),
        .tableParent th:nth-child(4),
        .tableParent td:ntn-child(4),
        .tableParent th:nth-child(5),
        .tableParent td:ntn-child(5) {
            max-width: 200px;
            word-wrap: break-word;
        }

        .tableParent td:nth-child(3) div,
        .tableParent td:nth-child(4) div,
        .tableParent td:nth-child(5) div {
            white-space: normal !important;
            display: -webkit-box;
            overflow: hidden;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
        }

        .tableParent th.module,
        .tableParent td.module,
        .tableParent th.content,
        .tableParent td.content,
        .tableParent th.desc,
        .tableParent td.desc {
            max-width: 200px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .tableParent td.module,
        .tableParent td.content,
        .tableParent td.desc {
            white-space: normal;
            word-wrap: break-word;
        }

        .tableParent td.module::after {
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

        .btnContent {
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

        .card {
            margin-right: 1rem;
            margin-bottom: 2rem;
            border-radius: 15px;
        }
    </style>
</head>

<body>
    <div class="container conTitle">
        <h2 class="h2">Parent Modules For Course: {{ $course_detail->name }}</h2>
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
                    <div class="sectionCourse" href="{{ url('/course') }}">Course</div>
                    <span class="divider">></span>
                    <div class="sectionMaster">Modules List</div>
                </div>
                <div class="col-2">
                    <a class="btnAdd" href="{{ route('getAddCourseModule', ['id' => $course_detail->id, 'page_type' => $page_type]) }}" role="button">Add Module +</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <table id="table" class="tableParent table-striped custom-striped display nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Day</th>
                                <th class="module">Module Name</th>
                                <th class="content">Content</th>
                                <th class="desc">Description</th>
                                <th>Created At</th>
                                <th>Created Id</th>
                                <th>Updated At</th>
                                <th>Updated Id</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($parent_modules as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->priority }}</td>
                                <td class="module" data-toggle="tooltip" data-placement="top" title="{{ $item->name }}">{{ $item->name }}</td>
                                <td class="desc" data-toggle="tooltip" data-placement="top" title="{{ $item->description }}">{{ $item->description }}</td>
                                <td class="content" data-toggle="tooltip" data-placement="top" title="{{ $item->content }}">{{ $item->content}}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->created_id }}</td>
                                <td>{{ $item->updated_at }}</td>
                                <td>{{ $item->updated_id }}</td>
                                <td>
                                    @if ($item->status == 1)
                                    <a class="btnAktif">Aktif</a>
                                    @else
                                    <a class="btnNon">Non Aktif</a>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('getEditCourseModule', ['id' => $item->id, 'page_type' => $page_type]) }}" class="btnEdit btn-primary">Edit</a>
                                        @if ($page_type == 'LMS')
                                        <a href="{{ route('getCourseSubModule', ['course_id' => $course_detail->id, 'module_id' => $item->id, 'page_type' => 'LMS_child']) }}" class="btnContent btn-info">Content</a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
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
            pageLength: 10,
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
            columnDefs: [{}],
            // columnDefs: [{
            //     "visible": false,
            //     "targets": [0]
            // }]
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

        // Insert the show entries and info into the new container with custom classes
        // $('.dataTables_length').addClass('custom-length-container').appendTo(buttonPaginationContainer);
        // $('.dataTables_info').addClass('custom-info-text').appendTo(buttonPaginationContainer);
        // $('.dataTables_paginate').addClass('custom-pagination-container').appendTo(buttonPaginationContainer);

        // Insert the new container before the table
        buttonPaginationContainer.insertBefore('#table');

        // Add individual column search inputs and titles
        // $('#table thead th').each(function() {
        //     let title = $(this).text();
        //     $(this).html('<div class="text-center">' + title + '</div><div class="mt-2"><input class="form-control" type="text" placeholder="Search ' + title + '" /></div>');
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
@endsection