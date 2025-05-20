@extends('layout.master')

@section('title', 'Course Child Module')

@section('content')
<div style="padding: 0px 12px 0px 12px;">
    <!DOCTYPE html>
    <html>

    <head>
        <title>Form</title>
        <!-- Include CSS libraries for styling the table -->
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
        <link rel="stylesheet" type="text/css"
            href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    </head>

    <body>
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
        <h2>Question List For: {{ $module_detail->name }}</h2>
        <hr>
        <div class="ui breadcrumb pt-2 pb-4">
            <a class="section" href="{{ route('welcome') }}">Dashboard</a>
            <i class="right angle icon divider"></i>
            <a class="section" href="{{ route('getCourse') }}">Course</a>
            <i class="right angle icon divider"></i>
            <a class="section" href="{{ route('getCourseModule', ['course_id' => $module_detail->course_id, 'page_type' => 'LMS']) }}"> {{ $module_detail->course_name }}</a>
            <i class="right angle icon divider"></i>
            <a class="section" href="{{ route('getCourseSubModule', ['course_id' => $module_detail->course_id, 'module_id' => $module_detail->course_module_parent_id, 'page_type' => 'LMS_child']) }}"> {{ $module_detail->parent_detail->name }}</a>
            <i class="right angle icon divider"></i>
            <div class="active section">{{ $module_detail->name }}</div>
        </div>
        <div id="example_wrapper">
            <div class="navbar bg-body-tertiary" style="padding: 12px 0px 12px 0px;">
                <div class="navbar-nav">
                    <a
                        href="{{ route('getAddCMForm', ['id' => $module_detail->id, 'course_id' => $module_detail->course_id]) }}"><button
                            class=" right floated ui button primary">Tambah Module +</button></a>
                </div>
            </div>
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>No. Pertanyaan</th>
                        <th>Pertanyaan</th>
                        <th>Type</th>
                        <th>Description</th>
                        <th>Created At</th>
                        <th>Created By</th>
                        <th>Updated At</th>
                        <th>Updated By</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($question_list as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->priority }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->type }}</td>
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
                            <div class="btn-group">
                                <a href="{{ route('getEditCMForm', ['id' => $item->id, 'parent_id' => $module_detail->id]) }}" class="btn btn-primary">Edit</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th><input type="text" class="form-control search-0" placeholder="Search ID" /></th>
                        <th><input type="text" class="form-control search-1" placeholder="Search Question No." /></th>
                        <th><input type="text" class="form-control search-2" placeholder="Search Name" /></th>
                        <th><input type="text" class="form-control search-3" placeholder="Search Type" /></th>
                        <th><input type="text" class="form-control search-4" placeholder="Search Description" /></th>
                        <th><input type="text" class="form-control search-5" placeholder="Search Created At" /></th>
                        <th><input type="text" class="form-control search-6" placeholder="Search Created Id" /></th>
                        <th><input type="text" class="form-control search-7" placeholder="Search Updated At" /></th>
                        <th><input type="text" class="form-control search-8" placeholder="Search Updated Id" /></th>
                        <th><input type="text" class="form-control search-9" placeholder="Search Status" /></th>
                        <th></th>
                    </tr>
                </tfoot>
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
            $(document).ready(function () {
                var table = $('#example').DataTable({
                    lengthChange: true, // Aktifkan opsi perubahan jumlah entri
                    lengthMenu: [10, 25, 50, 100], // Menentukan pilihan jumlah entri yang dapat ditampilkan
                    buttons: ['copy', 'excel', 'pdf', 'colvis'],
                    order: [[1, "asc"]],
                    columnDefs: [
                        { "visible": false, "targets": [0, 5, 6, 7, 8] }
                    ],
                    columns: [
                        null,
                        null,
                        null,
                        null,
                        null,
                        null,
                        null,
                        null,
                        null,
                        null,
                        null,
                    ]
                });

                table.columns().every(function (index) {
                    var that = this;

                    // Menambahkan event listener untuk input pencarian di setiap kolom
                    $('.search-' + index, this.footer()).on('input', function () {
                        if (that.search() !== this.value) {
                            that.search(this.value).draw();
                        }
                    });
                });

                table.buttons().container()
                    .appendTo('#example_wrapper .col-md-6:eq(0)');
            });
        </script>
    </body>

    </html>

</div>
@endsection
