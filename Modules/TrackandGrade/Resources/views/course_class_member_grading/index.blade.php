@extends ('layout.master')

@section('title', 'Voucher')
@section('content')

    <head>
        <title>Course</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
        <link rel="stylesheet" type="text/css"
            href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    </head>

    <div class="container-fluid">
        <h2>CCMH Grading</h2>

        <hr>
        <div class="ui breadcrumb pt-2 pb-4">
            <a class="section" href="{{ url('/') }}">Dashboard</a>
            <i class="right angle icon divider"></i>
            <div class="active section">CCMH Grading</div>
        </div>

        <div class="row">
            <div class="col-10">
                <div class="form-container pt-5">
                    <form method="GET" action="{{ route('getGradeCCMH') }}"
                        class="row row-cols-lg-3 g-3 align-items-center">
                        <div class="col-12">
                            <label for="courses" class="form-label">Course</label>
                            <select class="form-select" id="courses" name="course_name">
                                <option value="all" {{ request()->course_name == 'all' ? 'selected' : '' }}>
                                    All
                                </option>
                                {{-- @foreach ($courseNames as $name)
                                    <option value="{{ $name->name }}"
                                        {{ request()->course_name == $name->name ? 'selected' : '' }}>{{ $name->name }}
                                    </option>
                                @endforeach --}}
                            </select>
                        </div>

                        {{-- <div class="col-12">
                            <label for="days" class="form-label">Day</label>
                            <select class="form-select" id="days" name="day">
                                <option value="all" {{ request()->day == 'all' ? 'selected' : '' }}>All</option>
                                @foreach ($day as $item)
                                    <option value="{{ $item->day }}"
                                        {{ request()->day == $item->day ? 'selected' : '' }}>{{ $item->day }}</option>
                                @endforeach
                            </select>
                        </div> --}}

                        <div class="col-12 align-self-end">
                            <button type="submit" class="btn btn-primary">Generate</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-2" style="padding-top: 3.7%">
                <div class="settings-container" style="margin-top: 2%; text-align: right">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="addColumnDropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Show/Hide Column
                        </button>
                        <div class="dropdown-menu" aria-labelledby="addColumnDropdown">
                            <label class="dropdown-item">
                                <input type="checkbox" class="column-checkbox" data-column="ID Course Class Member"> ID
                                Course Class Member
                            </label>
                            <label class="dropdown-item">
                                <input type="checkbox" class="column-checkbox" data-column="ID Course Module"> ID Course
                                Module
                            </label>
                            <label class="dropdown-item">
                                <input type="checkbox" class="column-checkbox" data-column="Description"> Description
                            </label>
                            <label class="dropdown-item">
                                <input type="checkbox" class="column-checkbox" data-column="Paket Soal"> Paket Soal
                            </label>
                            <label class="dropdown-item">
                                <input type="checkbox" class="column-checkbox" data-column="Package Type"> Package Type
                            </label>
                            <label class="dropdown-item">
                                <input type="checkbox" class="column-checkbox" data-column="Created At"> Created At
                            </label>
                            <label class="dropdown-item">
                                <input type="checkbox" class="column-checkbox" data-column="Updated At"> Updated At
                            </label>
                            <div class="dropdown-divider"></div>
                            <label class="dropdown-item">
                                <input type="checkbox" id="checkAllColumns"> Check All
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="table_content">
            <table id="example" class="table table-striped w-100">
                <thead>
                    <tr>
                        <th>course class</th>
                        <th>course module</th>
                        <th>day</th>
                        <th>student name</th>
                        <th>submitted file</th>
                        <th>grade</th>
                        <th>student comment</th>
                        <th>tutor comment</th>
                        <th>Action</th>
                        {{-- <th data-column="ID Course Class Member" class="hidden-column">ID Course Class Member</th>
                        <th data-column="ID Course Module" class="hidden-column">ID Course Module</th>
                        <th data-column="Description" class="hidden-column">Description</th>
                        <th data-column="Paket Soal" class="hidden-column">Paket Soal</th>
                        <th data-column="Package Type" class="hidden-column">Package Type</th>
                        <th data-column="Created At" class="hidden-column">Created At</th>
                        <th data-column="Updated At" class="hidden-column">Updated At</th>
                        <th>File</th>
                        <th>Comment</th>
                        <th>Grade</th>
                        <th>Grade At</th>
                        <th>Action</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($class_list as $item)
                        <tr>
                            <td>{{ $item->course_name }} {{ $item->batch }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->day }}</td>
                            <td>{{ $item->user_name }}</td>
                            <td>{{ $item->submitted_file ?? '-' }}</td>
                            <td>{{ $item->grade ?? '-' }}</td>
                            <td>{!! Str::limit($item->comment ?? '-') !!}</td>
                            <td>{!! Str::limit($item->tutor_comment ?? '-') !!}</td>
                            {{-- <td data-column="ID Course Class Member" class="hidden-column">
                                {{ $item->course_class_member_id }}</td>
                            <td data-column="ID Course Class Module" class="hidden-column">
                                {{ $item->course_class_module_id }}</td>
                            <td data-column="Description" class="hidden-column">{{ $item->description }}</td>
                            <td data-column="Paket Soal" class="hidden-column">{{ $item->paket_soal }}</td>
                            <td data-column="Package Type" class="hidden-column">{{ $item->package_type }}</td>
                            <td data-column="Created At" class="hidden-column">{{ $item->created_at }}</td>
                            <td data-column="Updated At" class="hidden-column">{{ $item->updated_at }}</td>
                            <td>
                                @if ($item->submitted_file)
                                    <a
                                        href="{{ asset('uploads/course_class_member_grading/' . Str::snake(Str::lower($item->courseClassModule->courseModule->course->name)) . '/' . Str::snake(Str::lower($item->user->name)) . '/' . Str::snake(Str::lower($item->courseClassModule->courseModule->name)) . '/' . $item->submitted_file) }}">
                                        {{ $item->submitted_file }}
                                    </a>
                                @else
                                    -
                                @endif
                            </td> --}}
                            @if ($item->id_grading !== null)
                                <td>
                                    <a href="{{ route('getEditCCMH', $item->id_grading) }}"
                                        class="btn btn-success btn-sm">Edit</a>
                                </td>
                            @else
                                <td>
                                    <button type="submit" class="btn btn-success btn-sm" disabled>-</button>
                                </td>
                            @endif

                            {{-- Display additional grading information --}}
                            {{-- @if (isset($item->grading_info))
                                @foreach ($item->grading_info as $grading)
                                    <td>{{ $grading->submitted_file }}</td>
                                @endforeach
                            @endif --}}
                        </tr>
                    @endforeach

                </tbody>
            </table>
            {{-- @if ($averageGrade > 75)
                <a href="{{ route('getCertificate', $item->id) }}" class="btn btn-info btn-sm">Generate Certificate</a>
            @endif --}}
        </div>
    </div>

    <style>
        .form-container {
            width: 48%;
        }

        /* CSS untuk kolom-kolom yang disembunyikan */
        .hidden-column {
            display: none;
        }
    </style>

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

    <script></script>

    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable({
                lengthChange: true,
                lengthMenu: [10, 25, 50, 100],
                buttons: ['copy', 'excel', 'pdf', 'colvis'],
                searching: true,
            });

            // Add individual column search inputs and titles
            $('#example thead th').each(function() {
                var title = $(this).text();
                $(this).html('<div class="text-center">' + title +
                    '</div><div class="mt-2"><input type="text" placeholder="Search ' + title +
                    '" /></div>');
            });

            // Apply individual column search
            table.columns().every(function() {
                var that = this;
                $('input', this.header()).on('keyup change', function() {
                    if (that.search() !== this.value) {
                        that.search(this.value).draw();
                    }
                });
            });

            table.buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');

            // Additional code for showing/hiding columns
            $('#checkAllColumns').on('change', function() {
                var checked = $(this).prop('checked');
                $('.column-checkbox').prop('checked', checked);
                toggleColumns();
            });

            $('.column-checkbox').on('change', function() {
                toggleColumns();
            });

            function toggleColumns() {
                $('.column-checkbox').each(function() {
                    var column = $(this).data('column');
                    if ($(this).prop('checked')) {
                        $('th[data-column="' + column + '"]').removeClass('hidden-column');
                        $('td[data-column="' + column + '"]').removeClass('hidden-column');
                    } else {
                        $('th[data-column="' + column + '"]').addClass('hidden-column');
                        $('td[data-column="' + column + '"]').addClass('hidden-column');
                    }
                });
            }

            toggleColumns(); // To hide columns by default
        });

        $(document).ready(function() {
            $('#checkAllColumns').on('change', function() {
                var checked = $(this).prop('checked');
                $('.column-checkbox').prop('checked', checked);
                toggleColumns();
            });

            $('.column-checkbox').on('change', function() {
                toggleColumns();
            });

            function toggleColumns() {
                $('.column-checkbox').each(function() {
                    var column = $(this).data('column');
                    if ($(this).prop('checked')) {
                        $('th[data-column="' + column + '"]').removeClass('hidden-column');
                        $('td[data-column="' + column + '"]').removeClass('hidden-column');
                    } else {
                        $('th[data-column="' + column + '"]').addClass('hidden-column');
                        $('td[data-column="' + column + '"]').addClass('hidden-column');
                    }
                });
            }

            toggleColumns(); // Untuk menyembunyikan kolom secara default pada awalnya
        });
    </script>
@endsection
