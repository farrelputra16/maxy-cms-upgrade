@extends('layout.master')

@section('title', 'Course')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course</title>
    <!-- Include CSS libraries for styling the table -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
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

        .logout {
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
            width: 1010px;
            margin-left: 1rem;
            margin-bottom: 1rem;
        }

        .breadcrumb .sectionDashboard,
        .breadcrumb .divider,
        .breadcrumb .sectionMaster,
        .breadcrumb .sectionCourse {
            display: inline;
            font-size: 11px;
            font-weight: bold;
        }

        .breadcrumb .divider {
            margin: 0 5px;
        }

        .btnTambahCourse {
            background-color: #4056A1;
            color: #FFF;
            width: 140px;
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

        .tableCourse {
            border: 1px solid #000000;
            border-radius: 8px;
            overflow: hidden;
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
    </style>
</head>

<body>
    <div class="container conTitle">
        <h2 class="h2">Course</h2>
        <button class="logout">Logout</button>
    </div>
    <div class="breadcrumb pt-2 pb-4">
        <a class="sectionDashboard" href="{{ url('/') }}">Dashboard</a>
        <span class="divider">></span>
        <div class="sectionMaster">Master</div>
        <span class="divider">></span>
        <div class="sectionCourse">Course</div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col">
                <a class="btnTambahCourse" href="{{ route('getAddCourse') }}" role="button">Tambah Course</a>
            </div>
            <table id="table" class="tableCourse table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th class="id" style="width: 3%;">ID</th>
                        <th class="name" style="width: 5%;">Course Name</th>
                        <th class="fake" style="width: 5%">Fake Price</th>
                        <th class="price" style="width: 5%;">Price</th>
                        <th class="type" style="width: 5%;">Course Type</th>
                        <th class="desc" style="width: 2%;">Description</th>
                        <th class="crea" style="width: 8%;">Created At</th>
                        <th class="up" style="width: 8%;">Updated At</th>
                        <th class="sta" style="width: 3%;">Status</th>
                        <th class="act" style="width: 10%;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            {{ $item->fake_price ? 'Rp' . number_format($item->fake_price, 0, ',', '.') : '-' }}
                        </td>
                        <td>
                            {{ $item->price ? 'Rp' . number_format($item->price, 0, ',', '.') : '-' }}
                        </td>
                        <td>
                            @if ($item->m_course_type_id == 1)
                            {{ 'Bootcamp' }}
                            @elseif ($item->m_course_type_id == 2)
                            {{ 'Rapid Onboarding' }}
                            @elseif ($item->m_course_type_id == 3)
                            {{ 'Mini Bootcamp' }}
                            @elseif ($item->m_course_type_id == 4)
                            {{ 'Hackathon' }}
                            @elseif ($item->m_course_type_id == 5)
                            {{ 'Prakerja' }}
                            @elseif ($item->m_course_type_id == 6)
                            {{ 'MSIB' }}
                            @elseif ($item->m_course_type_id == 7)
                            {{ 'Upskilling' }}
                            @else
                            -
                            @endif
                        </td>
                        <td id="description">{!! !empty($item->description) ? \Str::limit($item->description, 30) : '-' !!}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->updated_at }}</td>
                        <td>
                            @if ($item->status == 1)
                            <a class="btnAktif">Aktif</a>
                            @else
                            <a class="btnNon">Non Aktif</a>
                            @endif
                        </td>
                        <td style="width: 8%;">
                            <div class="btn-group">
                                <a href="{{ route('getEditCourse', ['id' => $item->id]) }}" class="btnEdit">Edit</a>
                                <a href="{{ route('getCourseModule', ['course_id' => $item->id, 'page_type' => 'LMS']) }}" class="btnModul">Modules List</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endsection

        @section('scripts')
        <!-- Include JS libraries for DataTable initialization -->
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
                    lengthChange: true,
                    lengthMenu: [10, 25, 50, 100],
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
                    columnDefs: [{
                        "visible": false,
                        "targets": [0]
                    }],
                    paging: true,
                    responsive: true,
                    dom: '<"top"lfB>rt<"bottom"ip><"clear">',
                });

                $('.buttons-prev').on('click', function() {
                    table.page('previous').draw('page');
                });

                $('.buttons-next').on('click', function() {
                    table.page('next').draw('page');
                });

                // Create container for buttons and pagination
                let buttonPaginationContainer = $('<div>').addClass('button-pagination-container');
                buttonPaginationContainer.css({
                    display: 'block',
                    flexDirection: 'row',
                    alignItems: 'flex-start',
                    marginBottom: '10px'
                });

                // Insert the buttons into the new container
                table.buttons().container().appendTo(buttonPaginationContainer);

                // Insert the show entries and info into the new container with custom classes
                $('.dataTables_length').addClass('custom-length-container').appendTo(buttonPaginationContainer);
                $('.dataTables_info').addClass('custom-info-text').appendTo(buttonPaginationContainer);
                $('.dataTables_paginate').addClass('custom-pagination-container').appendTo(buttonPaginationContainer);

                // Insert the new container before the table
                buttonPaginationContainer.insertBefore('#table');

                // Add individual column search inputs and titles
                $('#table thead th').each(function() {
                    let title = $(this).text();
                    $(this).html('<div class="search">' + title +
                        '</div><div class="mt-2"><input class="form-control" style="width:3rem; text-align:center;" type="text" placeholder="Search ' + title + '" /></div>');
                });

                // Apply individual column search
                table.columns().every(function() {
                    let that = this;
                    $('input', this.header()).on('keyup change', function() {
                        if (that.search() !== this.value) {
                            that.search(this.value).draw();
                        }
                    });
                });
            });
        </script>
    </div>
</body>

</html>

@endsection