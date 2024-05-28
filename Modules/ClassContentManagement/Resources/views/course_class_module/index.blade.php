@extends('layout.master')

@section('title', 'Course Class Module')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Class Module</title>
    <!-- Include CSS libraries for styling the table -->
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
            /* padding-top: 1rem; */
            /* margin-top: 1rem; */
            display: inline;
            font-size: 11px;
            font-weight: bold;
        }

        .breadcrumb .divider {
            margin: 0 5px;
        }

        .btnModule {
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
    </style>
</head>

<body>
    <div class="container conTitle">
        <h2 class="h2">Course Class Module</h2>
        <button class="logout">Logout</button>
    </div>
    <div class="breadcrumb pt-2 pb-4">
        <a class="section" href="{{ url('/') }}">Dashboard</a>
        <span class="divider">></span>
        <div class="sectionCourse">Class</div>
        <span class="divider">></span>
        <div class="sectionCourse">Module List</div>
    </div>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col">
                <a class="btnModule" href="{{ route('getAddCourseClassModule', ['id' => $course_class_id]) }}" role="button">Add Class Module</a>
            </div>

            <table id="table" class="tableModule table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th>Day</th>
                        <th scope="col">Course Module</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>
                        <th scope="col">Description</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Created Id</th>
                        <th scope="col">Updated At</th>
                        <th scope="col">Updated Id</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                        <!-- More buat tempat button edit -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courseclassmodules as $item)
                    <tr>
                        <td scope="row">{{ $item->id }}</td>
                        <td>{{ $item->priority }}</td>
                        <td>{{ $item->course_module_name }}</td>
                        <td>{{ $item->start_date }}</td>
                        <td>{{ $item->end_date }}</td>
                        <td id="description">{{ $item->description }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->created_id }}</td>
                        <td>{{ $item->updated_at }}</td>
                        <td>{{ $item->updated_id }}</td>
                        <td>
                            @if ($item->status == 1)
                            <a class="ui tiny green label" style="text-decoration: none;">Aktif</a>
                            @else
                            <a class="ui tiny red label" style="text-decoration: none;">Non Aktif</a>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('getEditCourseClassModule', ['id' => $item->id]) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ route('getCourseClassChildModule', ['id' => $item->id]) }}" class="btn btn-primary">Content</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <!-- <tfoot>
                <tr>
                    <th><input type="text" class="form-control search-0" placeholder="Search Id" /></th>
                    <th><input type="text" class="form-control search-1" placeholder="Search Day" /></th>
                    <th><input type="text" class="form-control search-2" placeholder="Search Name" /></th>
                    <th><input type="text" class="form-control search-3" placeholder="Search Start Date" /></th>
                    <th><input type="text" class="form-control search-4" placeholder="Search End Date" /></th>
                    <th><input type="text" class="form-control search-5" placeholder="Search Description" /></th>
                    <th><input type="text" class="form-control search-6" placeholder="Search Created At" /></th>
                    <th><input type="text" class="form-control search-7" placeholder="Search Created Id" /></th>
                    <th><input type="text" class="form-control search-8" placeholder="Search Updated At" /></th>
                    <th><input type="text" class="form-control search-9" placeholder="Search Updated Id" /></th>
                    <th><input type="text" class="form-control search-10" placeholder="Search Status" /></th>
                    <th></th>
                </tr>
            </tfoot> -->
            </table>
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

        <script>
            $(document).ready(function() {
                let table = $('#table').DataTable({
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
                    order: [
                        [1, "asc"]
                    ],
                    columnDefs: [{
                        "visible": false,
                        "targets": [0]
                    }]
                });
                let buttonContainer = $('<div>').addClass('buttons-container');
                table.buttons().container().appendTo('.container .col-md-6:eq(0)');
                buttonContainer.insertBefore('#tableCourse .dataTables_length');

                // Add individual column search inputs and titles
                $('#table thead th').each(function() {
                    let title = $(this).text();
                    $(this).html('<div class="text-center">' + title +
                        '</div><div class="mt-2"><input class="form-control" type="text" placeholder="Search ' + title +
                        '" /></div>');
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

                table.buttons().container().appendTo('#tableModule_wrapper .col-md-6:eq(0)');
            });
        </script>
    </div>
</body>

</html>
@endsection