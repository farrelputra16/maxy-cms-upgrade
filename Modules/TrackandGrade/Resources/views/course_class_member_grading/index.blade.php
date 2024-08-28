@extends ('layout.main-v3')

@section('title', 'Grade Assignment')

@section('content')
    <!-- begin page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Overview</h4>

                <!-- begin breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item active">Course</li>
                    </ol>
                </div>
                <!-- end breadcrumb -->
            </div>
        </div>
    </div>
    <!-- end page title -->

    <!-- begin content -->
    <div class="row">
        <div class="col-12">

            <!-- start card -->
            <div class="card">

                <!-- start card content -->
                <div class="card-body">
                    <h4 class="card-title">Select Class</h4>

                    <!-- start class selection -->
                    <form action="{{ route('getGrade') }}" method="GET">
                        @csrf
                        <div class="row">
                            <div class="col-10">
                                <select class="form-control select2 w-100" name="class_id"
                                    data-placeholder="Select Class ...">
                                    @foreach ($class_list as $item)
                                        <option value="{{ $item->class_id }}"
                                            @if ($class_id == $item->class_id) selected @endif>
                                            {{ $item->course_name }} - Batch {{ $item->batch }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-2 d-flex align-items-center justify-content-end">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                    <!-- end class selection -->

                </div>
            </div>


            <!-- start DataTables card -->
            <div class="card">

                <!-- start DataTables card content -->
                <div class="card-body">
                    <h4 class="card-title">Grade Assignment</h4>
                    <p class="card-title-desc">
                        This page presents a comprehensive overview of all available data, displayed in an interactive
                        and sortable DataTable format. Each row represents a unique data, providing key details such as
                        name, description, and status. Utilize the <b>column visibility, sorting, and column
                            search bar</b> features to
                        customize your view and quickly access the specific information you need.
                    </p>

                    <!-- start assignment DataTables -->
                    @if (count($data) > 0)
                        <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Module</th>
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
                                @php $data_index = 0; @endphp
                                @foreach ($data as $item)
                                    @foreach ($item->member_list as $key => $member)
                                        @php $data_index += 1; @endphp

                                        <tr>
                                            <td>{{ $data_index }}</td>
                                            <td class="data-medium" data-toggle="tooltip" data-placement="top"
                                                title="{{ $item->module_name }}">
                                                {!! \Str::limit($item->module_name, 30) !!}
                                            </td>
                                            <td>{{ $item->parent->priority }}</td>
                                            <td>{{ $member->user_name }}</td>
                                            <td>{{ $member->submission->submitted_file ?? '-' }}</td>
                                            <td>{{ $member->submission->submitted_at ?? '-' }}</td>
                                            <td>{{ $member->submission->grade ?? '-' }}</td>
                                            <td>{{ $member->submission->updated_at ?? '-' }}</td>
                                            <td class="data-long" data-toggle="tooltip" data-placement="top"
                                                title="@if ($member->submission) {!! strip_tags($member->submission->comment) !!} @else - @endif">
                                                {!! !empty($member->submission->comment) ? \Str::limit(strip_tags($member->submission->comment), 30) : '-' !!}
                                            </td>
                                            <td class="data-long" data-toggle="tooltip" data-placement="top"
                                                title="@if ($member->submission) {!! strip_tags($member->submission->tutor_comment) !!} @else - @endif">
                                                {!! !empty($member->submission->tutor_comment)
                                                    ? \Str::limit(strip_tags($member->submission->tutor_comment), 30)
                                                    : '-' !!}
                                            </td>
                                            <td>
                                                @if ($member->submission)
                                                    <a href="{{ route('getEditGrade', ['id' => $member->submission->id]) }}"
                                                        class="btn btn-success btn-sm">Edit</a>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th class="data-medium">Module</th>
                                    <th>Day</th>
                                    <th>Student Name</th>
                                    <th>Submitted File</th>
                                    <th>Submitted At</th>
                                    <th>Grade</th>
                                    <th>Updated At</th>
                                    <th class="data-long">Student Comment</th>
                                    <th class="data-long">Tutor Comment</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    @else
                        <p class="text-center text-muted">please select a class first...</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
    <!-- end content -->

    <!-- FAB add starts -->
    <div id="floating-whatsapp-button">
        <a href="{{ route('getAddBlog') }}" target="_blank">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <!-- FAB add ends -->

@endsection

@section('script')
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
                lengthChange: false,
                // lengthMenu: [10, 25, 50, 100],
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
                            $('<input class="form-control" type="text" placeholder="Search ' +
                                    title + '" />')
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
            $('#formSubmit').on('submit', function(e) {
                e.preventDefault(); // Prevent form submission
                var selectedValue = $('#course_class').val(); // Get selected value from dropdown

                // Check if value is not null or empty
                if (selectedValue) {
                    // Set the value of the hidden input field to the selected value
                    $('#selectedClassId').val(selectedValue);
                    // Submit the form
                    $(this).unbind('submit').submit();
                } else {
                    // Handle case where no value is selected
                    alert('Pilih kelas terlebih dahulu.');
                }
            });
        });
    </script>

@endsection
