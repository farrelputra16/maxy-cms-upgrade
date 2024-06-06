@extends ('layout.master')

@section('title', 'CCMH Grading')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCMH Grading</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

    <style>
        .form-container {
            width: 48%;
        }

        /* CSS untuk kolom-kolom yang disembunyikan */
        .hidden-column {
            display: none;
        }

        .select2-container .select2-selection--single {
            box-sizing: border-box;
            cursor: pointer;
            display: block;
            height: 35px;
            /* Ubah nilai height sesuai kebutuhan Anda */
            user-select: none;
            -webkit-user-select: none;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #444;
            line-height: 33px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 33px;
            position: absolute;
            top: 1px;
            right: 1px;
            width: 1rem;
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

        .btnSubmit {
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
            width: 1%;
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

        .tableGrade {
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

        .form-label {
            margin-left: 1rem;
        }

        .ddClass {
            margin-left: 1rem;
            width: 1rem;
        }

        .ddClass2 {
            margin-left: 1rem;
            width: 1rem;
        }

        .table-container {
            width: 100%;
            overflow-x: auto;
        }
    </style>
</head>

<body>
    <div class="container conTitle">
        <h2 class="h2">CCMH Grading</h2>
        <button class="logout">Logout</button>
    </div>
    <div class="breadcrumb pt-2 pb-4">
        <a class="sectionDashboard" href="{{ url('/') }}">Dashboard</a>
        <span class="divider">></span>
        <div class="sectionMaster">Class</div>
        <span class="divider">></span>
        <div class="sectionCourse">Grade Assignment</div>
        <span class="divider">></span>
        <div class="sectionCourse">CCMH Grading</div>
    </div>

    @if(is_null($class_list))
    <div class="row">
        <div class="col-md-2">
            <form action="{{ route('getCCMHGrade') }}" method="GET">
                @csrf
                <label for="course_class" class="form-label">Pilih Kelas:</label>
                <!-- <select id="course_class" name="class_id" class="form-select" > -->
                <select name="class_id" class="ddClass ui dropdown" style="width: 100%;">
                    @foreach($class_list_dropdown1 as $class)
                    <option value="{{ $class->class_id }}">{{ $class->course_name }} - Batch {{ $class->batch }}</option>
                    @endforeach
                </select>

                <div class="col-md-2">
                    <button type="submit" class="btnSubmit btn-primary" style="margin-top: 27.5px;">Submit</button>
                </div>
            </form>
        </div>
    </div>
    @else
    <div class="row">
        <div class="col-md-2">
            <form action="{{ route('getCCMHGrade') }}" method="GET">
                @csrf
                <label for="course_class" class="form-label">Pilih Kelas:</label>
                <select name="class_id" class="ddClass2 ui dropdown" style="width: 100%;">
                    @foreach($class_list_dropdown1 as $class)
                    <option value="{{ $class->class_id }}" @if($id_class=$class->class_id) selected
                        @endif>
                        {{ $class->course_name }} - Batch {{ $class->batch }}
                    </option>
                    @endforeach
                </select>
            </form>
        </div>

        <div class="col-md-2">
            <button type="submit" class="btnSubmit btn-primary" style="margin-top: 27.5px;">Submit</button>
            </form>
        </div>
    </div>
    <br>

    <table id="table" class="tableGrade table-striped w-100">
        <thead>
            <tr>
                <th>Course Module</th>
                <th>Day</th>
                <th>Student Name</th>
                <th>Submitted File</th>
                <th>Submitted At</th>
                <th>Grade</th>
                <th>Updated At</th>
                <th>Student Comment</th>
                <th>Tutor Comment</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($class_list as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->day }}</td>
                <td>{{ $item->user_name }}</td>
                <td>{{ $item->submitted_file ?? '-' }}</td>
                <td>{{ $item->submitted_at ?? '-' }}</td>
                <td>{{ $item->grade ?? '-' }}</td>
                <td>{{ $item->updated_at }}</td>
                <td>{!! Str::limit(htmlspecialchars($item->comment) ?? '-') !!}</td>
                <td>{!! Str::limit($item->tutor_comment ?? '-') !!}</td>
                @if ($item->id_grading !== null)
                <td>
                    <a href="{{ route('getEditCCMH', [$item->id_grading , 'class_id' => $id_class]) }}" class="btnEdit btn-success btn-sm">Edit</a>
                </td>
                @else
                <td>
                    -
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Course Module</th>
                <th>Day</th>
                <th>Student Name</th>
                <th>Submitted File</th>
                <th>Submitted At</th>
                <th>Grade</th>
                <th>Updated At</th>
                <th>Student Comment</th>
                <th>Tutor Comment</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
    <!-- Info and Pagination container -->
    <div class="buttons-container">
        <div class="custom-info-text"></div>
        <div class="custom-pagination-container"></div>
    </div>
    <br><br>
    <h2>Download File</h2>
    <div class="content pb-5">
        @csrf
        <div class="card p-5">
            <div class="row">
                <label for="course_class" class="form-label">Download File:</label>
                <div class="col-md-2">
                    <form action="{{ route('getCCMHGrade') }}" method="GET">
                        @csrf
                        <label for="day" class="form-label">Pilih Hari:</label>
                        <select id="day" name="day" class="form-select">
                            <option value="all">Semua Hari</option>
                            @foreach($day_dropdown as $day)
                            <option value="{{ strtolower($day) }}">{{ ucfirst($day) }}</option>
                            @endforeach
                        </select>
                    </form>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btnSubmit btn-primary" style="margin-top: 27.5px;">Submit</button>
                    <div class="col-md-2">
                        <select id="course_class" name="class_id" class="form-select" style="display: none;">
                            @foreach($class_list_dropdown as $class)
                            <option value="{{ $class['class_id'] }}">{{ $class['course_name'] }} - Batch {{ $class['batch'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>

</body>

</html>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        let table = $('#table').DataTable({
            scrollX: true,
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
        buttonContainer.insertBefore('.tableCourseMember_wrapper .dataTables_length');

        // $('.buttons-prev').on('click', function() {
        //     table.page('previous').draw('page');
        // });

        // $('.buttons-next').on('click', function() {
        //     table.page('next').draw('page');
        // });

        // let buttonContainer = $('<div>').addClass('button-container');
        // let infoContainer = $('<div>').addClass('info-container');

        // Create container for buttons and pagination
        let buttonPaginationContainer = $('<div>').addClass('button-pagination-container');
        buttonPaginationContainer.css({
            display: 'block',
            flexDirection: 'row',
            justifyContent: 'flex-start',
            // marginBottom: '10px'
        });

        // Insert the buttons into the new container
        table.buttons().container().appendTo(buttonContainer);
        // $('.dataTables_length, .dataTables_info').appendTo(infoContainer);

        // $('.top').append(buttonContainer);
        // $('.top').append(infoContainer);

        // $('.button-container').css('margin-bottom', '10px');
        // $('.info-container').css('margin-bottom', '10px');

        // Insert the show entries and info into the new container with custom classes
        // $('.dataTables_length').addClass('custom-length-container').appendTo(buttonPaginationContainer);
        // $('.dataTables_info').addClass('custom-info-text').appendTo(buttonPaginationContainer);
        // $('.dataTables_paginate').addClass('custom-pagination-container').appendTo(buttonPaginationContainer);

        // Insert the new container before the table
        // buttonPaginationContainer.insertBefore('#table');

        // Add individual column search inputs and titles
        // $('#table thead th').each(function() {
        //     let title = $(this).text();
        //     $(this).html('<div class="search">' + title +
        //         '</div><div class="mt-2"><input class="form-control" style="width:3rem; text-align:center;" type="text" placeholder="Search ' + title + '" /></div>');
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

<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
@endsection