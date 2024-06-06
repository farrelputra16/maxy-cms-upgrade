@extends('layout.master')

@section('title', 'Course')

@section('content')
<!DOCTYPE html>
<html>

<head>
    <title>Course</title>
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
            width: 97%;;
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

        .btnTambahCourse {
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
        <h2 class="h2">Course</h2>
        <button class="logout">Logout</button>
    </div>
    <div class="breadcrumb pt-2 pb-4">
        <a class="section" href="{{ url('/') }}">Dashboard</a>
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
                        <th>ID</th>
                        <th>Course Name</th>
                        <th>Fake Price</th>
                        <th>Price</th>
                        <th>Course Type</th>
                        <th>Description</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $item)
                    <tr>
                        <td style="width: 3%;">{{ $item->id }}</td>
                        <td style="width: 7%;">{{ $item->name }}</td>
                        <td style="width: 8%;">
                            {{ $item->fake_price ? 'Rp' . number_format($item->fake_price, 0, ',', '.') : '-' }}
                        </td>
                        <td style="width: 7%;">
                            {{ $item->price ? 'Rp' . number_format($item->price, 0, ',', '.') : '-' }}
                        </td>
                        <td style="width: 9%;">
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
                        <td style="width: 19%;" id="description">{!! !empty($item->description) ? \Str::limit($item->description, 30) : '-' !!}</td>
                        <td style="width: 10%;">{{ $item->created_at }}</td>
                        <td style="width: 10%;">{{ $item->updated_at }}</td>
                        <td style="width: 3%;">
                            @if ($item->status == 1)
                            <a class="ui tiny green label" style="text-decoration: none;">Aktif</a>
                            @else
                            <a class="ui tiny red label" style="text-decoration: none;">Non Aktif</a>
                            @endif
                        </td>

                        <td style="width: 8%;">
                            <div class="btn-group">
                                <a href="{{ route('getEditCourse', ['id' => $item->id]) }}" class="btn btn-primary">Edit</a>
                                <!-- <a href="{{ route('getCourseModule', ['id' => $item->id]) }}"
                                                class="btn btn-info">Modules List</a> -->
                                <a href="{{ route('getCourseModule', ['course_id' => $item->id, 'page_type' => 'LMS']) }}" class="btn btn-info">Modules List</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
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
                        '</div><div class="mt-2"><input class="form-control" type="text" placeholder="Search ' +
                        title + '" /></div>');
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

                // table.buttons().container().appendTo('.container .col-md-6:eq(0)');
            });
        </script>
    </div>
</body>

</html>
@endsection