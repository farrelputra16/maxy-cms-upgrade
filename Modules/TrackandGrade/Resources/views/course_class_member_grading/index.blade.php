@extends ('layout.master')

@section('title', 'CCMH Grading')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <style>
        .form-container {
            width: 48%;
        }

        /* CSS untuk kolom-kolom yang disembunyikan */
        .hidden-column {
            display: none;
        }
    </style>
@endsection

@section('content')
    <div class="px-3 pb-3">
        <h2>CCMH Grading</h2>

        <hr>

        <div class="ui breadcrumb pt-2 pb-4">
            <a class="section" href="{{ route('getDashboard') }}">Dashboard</a>
            <i class="right angle icon divider"></i>
            <div class="active section">CCMH Grading</div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <form action="{{ route('getCCMHGrade') }}" method="GET">
                @csrf
                    <label for="course_class" class="form-label">Pilih Kelas:</label>
                    <select id="course_class" name="class_id" class="form-select">
                        @foreach($class_list_dropdown as $class)
                            <option value="{{ $class['class_id'] }}">{{ $class['course_name'] }} - Batch {{ $class['batch'] }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-2">
                    <label for="day" class="form-label">Pilih Hari:</label>
                    <select id="day" name="day" class="form-select">
                        <option value="all">Semua Hari</option>
                        @foreach($day_dropdown as $day)
                            <option value="{{ strtolower($day) }}">{{ ucfirst($day) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary" style="margin-top: 27.5px;">Submit</button>
                </form>
            </div>
        </div>

                    <!-- <form method="GET" action="{{ route('getGradeCCMH') }}"
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

                        
                    </form> -->
       

        <div id="table_content">
            <table id="example" class="table table-striped w-100">
                <thead>
                    <tr>
                        <th>Course Class</th>
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
                        <th>Updated At</th>
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
                            <td>{{ $item->submitted_at ?? '-' }}</td>
                            <td>{{ $item->grade ?? '-' }}</td>
                            <td>{{ $item->updated_at }}</td>
                            <td>{!! Str::limit(htmlspecialchars($item->comment) ?? '-') !!}</td>
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
                                    -
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
@endsection

@section('scripts')
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
