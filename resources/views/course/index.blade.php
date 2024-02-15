@extends('layout.master')

@section('title', 'Course')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <!DOCTYPE html>
        <html>

        <head>
            <title>Course</title>
            <!-- Include CSS libraries for styling the table -->
            <link rel="stylesheet"
                href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
            <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
            <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">

        </head>

        <body>
            <h2>Course</h2>
            <hr>
            <div class="ui breadcrumb pt-2 pb-4">
            <a class="section" href="{{ url('/') }}">Dashboard</a>
            <i class="right angle icon divider"></i>
            <div class="active section">Course</div>
        </div>
            <div id="example_wrapper">
                <div class="navbar bg-body-tertiary" style="padding: 12px 0px 12px 0px;">
                    <div class="navbar-nav">
                        <a class="btn btn-primary" href="{{ route('getAddCourse') }}" role="button">Tambah Course +</a>
                    </div>
                </div>
                <table id="example" class="table table-striped" style="width:100%">
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
                                    {{ $item->price ? 'Rp' . number_format($item->price, 0, ',', '.') : '-' }}</td>
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
                                        <a href="{{ route('getEditCourse', ['id' => $item->id]) }}"
                                            class="btn btn-primary">Edit</a>
                                        <!-- <a href="{{ route('getCourseModule', ['id' => $item->id]) }}"
                                            class="btn btn-info">Modules List</a> -->
                                        <a href="{{ route('getCourseModule', ['course_id' => $item->id, 'page_type' => 'LMS']) }}"
                                            class="btn btn-info">Modules List</a>
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

        </body>

        </html>

    </div>
@endsection
