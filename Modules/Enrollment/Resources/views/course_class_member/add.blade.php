@extends('layout.master')

@section('title', 'Add Course Class Member')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Member for Class: {{ $course_class_detail->course_name }} Batch{{ $course_class_detail->batch }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap-5-theme@1.1.2/dist/select2-bootstrap-5-theme.min.css" rel="stylesheet" />

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

        .btnBatal {
            background-color: #F13C20;
            color: #FFF;
            color: #FFF;
            width: 80px;
            height: 35px;
            border-radius: 10px;
            border: none;
            box-shadow: none;
            font-weight: bold;
        }

        .btnTambah {
            background-color: #4056A1;
            color: #FFF;
            color: #FFF;
            width: 120px;
            height: 35px;
            border-radius: 10px;
            border: none;
            box-shadow: none;
            font-weight: bold;
        }

        .btnMulti {
            background-color: #4056A1;
            color: #FFF;
            color: #FFF;
            width: 120px;
            height: 35px;
            border-radius: 10px;
            border: none;
            box-shadow: none;
            font-weight: bold;
        }

        .divBatal {
            text-align: right;
            margin-right: 10rem;
            margin-bottom: 1rem;
            margin-top: -3rem;
            z-index: 1000;
        }

        .divTambah {
            text-align: right;
            margin-right: 1rem;
            margin-bottom: .5rem;
            margin-left: 65rem;
        }

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
            height: 38px;
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
            width: 20px;
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

        th,
        td {
            padding: 12px;
            text-align: center;
        }

        th {
            font-weight: bold;
            color: #232E66;
            font-size: 13px;
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

        .tableMentor {
            border: 1px solid #000000;
            border-radius: 8px;
            overflow: hidden;
            padding-left: .5rem;
            padding-top: .5rem;
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

        .select2-container--bootstrap-5 .select2-selection {
            height: calc(1.5em + .75rem + 2px);
            padding: .375rem .75rem;
        }
    </style>
</head>

<body>
    <div class="container conTitle">
        <h2 class="h2">Add Member for Class: {{ $course_class_detail->course_name }} Batch
            {{ $course_class_detail->batch }}
        </h2>
        <button class="logout">Logout</button>
    </div>

    <div class="breadcrumb pt-2 pb-4">
        <a class="sectionDashboard" href="{{ url('/') }}">Dashboard</a>
        <span class="divider">></span>
        <div class="sectionMaster">Class</div>
        <span class="divider">></span>
        <div class="sectionCourse">Member</div>
        <span class="divider">></span>
        <div class="sectionCourse">Add Class Member</div>
    </div>

    <div class="container">
        <form class="formUser ui form" action="{{ route('postAddCourseClassMember') }}" method="post">
            @csrf
            <div class="field">
                <div class="two fields">
                    <div class="field">
                        <label for="multiple-select-clear-field">Pilih User: </label>
                        <select name="users[]" class="form-select select2" style="width: 100%;" id="multiple-select-clear-field" data-placeholder="Pilih User" multiple>
                            @foreach ($users as $item)
                            <option value="{{ $item->id }}">{{ $item->email }} - {{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="field">
                        <label for="course_class" class="form-label">Pilih Mentor:</label>
                        <!-- <select id="course_class" name="class_id" class="form-select" > -->
                        <select name="mentor" class="formUser form-select select2" id="mentor" style="width: 100%;">
                            <option value="" selected disabled>Pilih Mentor</option>
                            @foreach($mentors as $item)
                            <option value="{{ $item->id }}">{{ $item->email }} - {{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <!-- <div class="field">
                <select class="ui fluid multiple search selection dropdown" name="users[]">
                    <option value="">Select User</option>
                    @foreach ($users as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div> -->

            <input type="hidden" name="course_class" value="{{ $course_class_detail->id }}">
            <div class="field">
                <label for="">Course Class Description</label>
                <textarea name="description"></textarea>
            </div>

            <div class="field">
                <div class="ui checkbox">
                    <input class="form-check-input" type="checkbox" value="1" name="status" id="status">
                    <label for="status">Aktif</label>
                </div>
            </div>

            <div class="divTambah">
                <button class="btnTambah">Add Member</button>
            </div>
        </form>
        <a href="{{ url()->previous() }}">
            <button class="btnBatal">Batal</button>
        </a>
        <br><br>
        <h2>Bulk Upload</h2>
        <hr>
        <div class="content pb-5">
            <form method="post" action="{{ route('course-class-member.import-csv') }}" enctype="multipart/form-data">
                @csrf
                <div class="card p-5">
                    <div class="row">
                        <div class="col-6">
                            <label for="csv_file">Upload_File CSV:</label>
                            <input type="file" name="csv_file" id="csv_file" accept=".csv">
                            @error('csv_file')
                            <span style="color: red;">{{ $message }}</span>
                            @enderror
                            <br>
                            <small>sample: <i class="fa fa-file" aria-hidden="true"></i> <a href="{{ asset('csv/addccmember.csv') }}" download>csv example (click me to download)</a></small>
                        </div>
                        <div class="divMulti">
                            <button class="btnMulti" type="submit">Add Multiple Users</button>
                        </div>
                        <!-- <div class="col-6" style="text-align:right">
                            <button type="submit" class="btnMulti ui button primary">Add Multiple Users</button>
                        </div> -->
                    </div>
                </div>
            </form>
        </div>

        <h2>List Mentor</h2>
        <hr>
        <table id="table" class="tableMentor table-striped" style="width:100%;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mentors as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>

<!-- Script -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
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
<!-- <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha384-btZ82u+UkZp2Hd4zDTLzLzbn/7KW8xbDQbl5cpkL6uj5L/2m8cndGmYVRJsF70UtO" crossorigin="anonymous"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/js/bootstrap-multiselect.min.js"></script>

<!-- End Of Script -->

<script>
    $(document).ready(function() {
        $('.form-select2').select2({
            theme: 'bootstrap-5',
            width: '100%',
            allowClear: true,
        });
        // $('#multiple-select-clear-field').select2({
        //     theme: "bootstrap-5",
        //     width: '100%',
        //     placeholder: 'Pilih User',
        //     closeOnSelect: false,
        //     allowClear: true
        // });

        $('#mentor').select2({
            theme: 'bootstrap-5',
            width: '100%',
            placeholder: 'Pilih Mentor'
        });

        $(document).ready(function() {
            $('.select2').select2();
        });

        $('.ui.search.selection.dropdown').dropdown({
            keepSearchTerm: true
        });

        $('#hapus, #tambah').multiselect({
            maxHeight: 300,
            includeSelectAllOption: true,
            enableFiltering: true,
        });

        // Inisialisasi DataTables
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
        table.buttons().container().appendTo(buttonContainer);
        buttonContainer.insertBefore('.tableMentor_wrapper .dataTables_length');

        $('.buttons-prev').on('click', function() {
            table.page('previous').draw('page');
        });

        $('.buttons-next').on('click', function() {
            table.page('next').draw('page');
        });

        // Create container for buttons and pagination
        let buttonPaginationContainer = $('<div>').addClass('button-pagination-container');
        buttonPaginationContainer.css({
            display: 'flex',
            flexDirection: 'row',
            justifyContent: 'space-between',
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

        table.buttons().container().appendTo('.container .col-md-6:eq(0)');
    });
</script>

<!-- <script>
        $(document).ready(function() {
            $('.select2').select2();
        });

        $('.ui.search.selection.dropdown')
            .dropdown({
                keepSearchTerm: true
            });
    </script> -->

<!-- <script>
        $('#hapus, #tambah').multiselect({
            maxHeight: 300,
            includeSelectAllOption: true,
            enableFiltering: true,
        });
    </script> -->
@endsection