@extends('layout.master')

@section('title', 'Add Course Class Member')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha384-btZ82u+UkZp2Hd4zDTLzLzbn/7KW8xbDQbl5cpkL6uj5L/2m8cndGmYVRJsF70UtO" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
            height: 38px; /* Ubah nilai height sesuai kebutuhan Anda */
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
    </style>

    <div style="padding: 12px 12px 0px 12px;">
        <h2 style="">Add Member for Class: {{ $course_class_detail->course_name }} Batch
            {{ $course_class_detail->batch }}</h2>
        <hr>
        <form class="ui form" action="{{ route('postAddCourseClassMember') }}" method="post">
            @csrf
            <div class="field">
                <label for="">Select User:</label>
                <select id="hapus" name="users[]" multiple="">
                    @foreach ($users as $item)
                        <option value="{{ $item->id }}">{{ $item->email }} - {{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="field">
                <label for="course_class" class="form-label">Pilih Mentor:</label>
                    <!-- <select id="course_class" name="class_id" class="form-select" > -->
                    <select name="mentor" class="ui dropdown select2" style="width: 100%;">
                        <option value="" selected disabled>Pilih mentor</option>
                        @foreach($mentors as $item)
                            <option value="{{ $item->id }}">{{ $item->email }} - {{ $item->name }}</option>
                        @endforeach
                    </select>

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
            <button type="submit" class="right floated ui button primary">Tambah Course Class Member</button>
        </form>
        <a href="{{ route('getCourseClassMember') }}"><button class="right floated ui red button"
                style="margin-right:2%;">Batal</button></a>
        </form>

        <br><br>
        <hr>
        <h2>Bulk Upload</h2>
        <hr>
        <div class="content pb-5">
            <form method="post" action="{{ route('course-class-member.import-csv') }}" enctype="multipart/form-data">
                @csrf
                <div class="card p-5">
                    <div class="row">
                        <div class="col-6">
                            <label for="csv_file">Upload File CSV:</label>
                            <input type="file" name="csv_file" id="csv_file" accept=".csv">
                            @error('csv_file')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
                            <br>
                            <small>sample: <i class="fa fa-file" aria-hidden="true"></i> <a href="{{ asset('csv/addccmember.csv') }}" download>csv example (click me to download)</a></small>
                        </div>
                        <div class="col-6" style="text-align:right">
                            <button type="submit" class="ui button primary">Tambah Multiple Users</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <hr>
        <h2>List Mentor</h2>
        <hr>
        <table id="example" class="table table-striped" style="width:100%">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"
        integrity="sha384-oBEahFNqz9AORwL3hFZO9zrZcIEJ0VlX4z/6xLc3pNRdh5iRNXFbpekwB6h5U2Pg" crossorigin="anonymous">
    </script>
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
                $(document).ready(function () {
                    let table = $('#example').DataTable({
                        lengthChange: true,
                        lengthMenu: [10, 25, 50, 100],
                        buttons: ['copy', 'excel', 'pdf', 'colvis'],
                        searching: true,
                    });

                    // Add individual column search inputs and titles
                    $('#example thead th').each(function () {
                        let title = $(this).text();
                        $(this).html('<div class="text-center">' + title +
                    '</div><div class="mt-2"><input class="form-control" type="text" placeholder="Search ' + title +
                    '" /></div>');
                    });

                    // Apply individual column search
                    table.columns().every(function () {
                        let that = this;
                        $('input', this.header()).on('keyup change', function () {
                            if (that.search() !== this.value) {
                                that.search(this.value).draw();
                            }
                        });
                    });

                    table.buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');
                });
            </script>

    

    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
    <script>
        $('.ui.search.selection.dropdown')
            .dropdown({
                keepSearchTerm: true
            });
    </script>

<script>
        $('#hapus, #tambah').multiselect({
            maxHeight: 300,
            includeSelectAllOption: true,
            enableFiltering: true,
        });
    </script>
@endsection
