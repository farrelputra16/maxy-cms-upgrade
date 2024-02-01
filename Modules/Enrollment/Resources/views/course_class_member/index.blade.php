@extends('layout.master')

@section('title', 'Course Class Member')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <!DOCTYPE html>
        <html>

        <head>
            <title>Course Class Member</title>
            <!-- Include CSS libraries for styling the table -->
            <link rel="stylesheet"
                href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
            <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
            <link rel="stylesheet" type="text/css"
                href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">

    
        </head>

        <body>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <h2>Class Member on Class: {{ $course_class_detail->course_name }} Batch {{ $course_class_detail->batch }}</h2>
            <hr style="margin-bottom: 0px;">
            <div class="ui breadcrumb pt-2 pb-4">
            <a class="section" href="{{ url('/') }}">Dashboard</a>
            <i class="right angle icon divider"></i>
            <a class="section" href="{{ url('/course/class') }}">Course Class</a>
            <i class="right angle icon divider"></i>
            <div class="active section">{{ $course_class_detail->course_name }} Batch {{ $course_class_detail->batch }}</div>
        </div>
            <nav class="navbar bg-body-tertiary" style="padding: 12px 0px 12px 0px;">
                <div class="row">
                    <div class="col">
                        @if ($course_class_detail->id != null)
                            <a class="btn btn-primary"
                                href="{{ route('getAddCourseClassMember', ['id' => $course_class_detail->id]) }}"
                                role="button">Tambah Class Member +</a>
                        @else
                            <a class="btn btn-primary" href="{{ route('getAddCourseClassMember') }}" role="button">Tambah
                                Class Member +</a>
                        @endif
                    </div>
                </div>
            </nav>
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>ID - Name</th>
                        <!-- <th>Batch - Course</th> -->
                        <th>Description</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courseClassMembers as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->user_id }} - {{ $item->user_name }}</td>
                            <!-- <td>Batch {{ $item->course_class_batch }} - {{ $item->course_name }}</td> -->
                            <td id="description">{{ $item->description }}</td>
                            <td>
                                @if ($item->status == 1)
                                    <a class="ui tiny green label" style="text-decoration: none;">Aktif</a>
                                @else
                                    <a class="ui tiny red label" style="text-decoration: none;">Non Aktif</a>
                                @endif
                            </td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->updated_at }}</td>
                            <td>
                                <a href="{{ route('getEditCourseClassMember', ['id' => $item->id]) }}"
                                    style="text-decoration: none; color:blue;">Edit</a>
                                {{-- <a href="{{ route('getCertificate', $item->id) }}" class="btn btn-info btn-sm">Generate Certificate</a> --}}
                                <a href="{{ route('getGenerateCertificate', ['user_id' => $item->user_id, 'course_class_id' => $course_class_detail->id]) }}" class="btn btn-warning">Generate Certificate</a>
                                <a href="{{ route('getEditCertificateTemplate', ['id' => $course_class_detail->id]) }}" class="btn btn-success">Edit Certificate</a>
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
            var table = $('#example').DataTable({
                lengthChange: true, // Aktifkan opsi perubahan jumlah entri
                lengthMenu: [10, 25, 50, 100], // Menentukan pilihan jumlah entri yang dapat ditampilkan
                buttons: ['copy', 'excel', 'pdf', 'colvis']
            });

        table.buttons().container()
            .appendTo('#example_wrapper .col-md-6:eq(0)');
        });
    </script>
    </body>

    </html>

    </div>
@endsection
