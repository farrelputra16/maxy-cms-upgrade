@extends('layout.master')

@section('title', 'Course Class Member')

@section('styles')
    <!-- Include CSS libraries for styling the table -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
@endsection

@section('content')
    <div class="px-3 pb-3">
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

        <h2>Class Member on Class: {{ $courseClassDetail->course_name }} Batch {{ $courseClassDetail->batch }}</h2>
        <hr>

        <div class="ui breadcrumb pt-2 pb-4">
            <a class="section" href="{{ route('getDashboard') }}">Dashboard</a>
            <i class="right angle icon divider"></i>
            <a class="section" href="{{ route('getCourseClass') }}">Course Class</a>
            <i class="right angle icon divider"></i>
            <div class="active section">{{ $courseClassDetail->course_name }}
                Batch {{ $courseClassDetail->batch }}</div>
        </div>

        <nav class="navbar bg-body-tertiary py-3">
            <div class="row">
                <div class="col">
                    @if (!empty($courseClassDetail->id))
                        <a class="btn btn-primary"
                           href="{{ route('getAddCourseClassMember', ['id' => $courseClassDetail->id]) }}"
                           role="button">
                            Tambah Class Member +
                        </a>
                    @else
                        <a class="btn btn-primary" href="{{ route('getAddCourseClassMember') }}" role="button">
                            Tambah Class Member +
                        </a>
                    @endif
                </div>
            </div>
        </nav>

        <table id="example" class="table table-striped w-100">
            <thead>
            <tr>
                <th>No.</th>
                <th>ID - Name</th>
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
                        <a href="{{ route('getEditCourseClassMember', $item->id) }}"
                           class="text-decoration-none text-primary">Edit</a>
                        <a href="{{ route('getGenerateCertificate', [
                                'course_class_member' => $item->id,
                                'user' => $item->user_id,
                                'course_class' => $courseClassDetail->id,
                        ]) }}"
                           class="btn btn-warning mx-2">Generate Certificate</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
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
                            '</div><div class="mt-2"><input type="text" placeholder="Search ' + title +
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

@endsection
