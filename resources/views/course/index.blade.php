@extends('layout.main-v3')

@section('title', 'Course')

@section('content')

<body>
    <div class="container conTitle">
        <h2 class="h2">Course</h2>
        {{-- <form class="form-inline my-2 my-lg-0 me-3" method="post" action="{{ route('logout') }}">
            @csrf
            <button class="btnlogout" type="submit">Logout</button> --}}
        </form>
    </div>
    <div class="breadcrumb pt-2 pb-4">
        <div class="container">
            <div class="row">
                <div class="col-10">
                    <a class="sectionDashboard" href="{{ url('/') }}">Dashboard</a>
                    <span class="divider">></span>
                    <div class="sectionMaster">Master</div>
                    <span class="divider">></span>
                    <div class="sectionCourse">Course</div>
                </div>
                <div class="col-2">
                    <a class="btnAdd" href="{{ route('getAddCourse') }}" role="button">Add Course</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <table id="table" class="tableCourse table-striped custom-striped nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th class="course-name">Course Name</th>
                                <th>Promo Price</th>
                                <th>Price</th>
                                <th>Course Type</th>
                                <th class="short">Short Description</th>
                                <th class="desc">Description</th>
                                <th>Content</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td class="course-name" data-toggle="tooltip" data-placement="top" title="{{ $item->name }}">{{ $item->name }}</td>
                                <td>{{ $item->fake_price ? 'Rp' . number_format($item->fake_price, 0, ',', '.') : '-' }}</td>
                                <td>{{ $item->price ? 'Rp' . number_format($item->price, 0, ',', '.') : '-' }}</td>
                                <td>
                                    {{ $item->type->name }}
                                </td>
                                <td class="short" data-toggle="tooltip" data-placement="top" title="{{ $item->short_description }}">{{ $item->short_description }}</td>
                                <td class="desc" data-toggle="tooltip" data-placement="top" title="{{ $item->description }}">{!! !empty($item->description) ? \Str::limit($item->description, 30) : '-' !!}</td>
                                <td class="content" title="{{ $item->content }}">{{ $item->content }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->updated_at }}</td>
                                <td>
                                    @if ($item->status == 1)
                                    <a class="btnAktif">Aktif</a>
                                    @else
                                    <a class="btnNon">Non Aktif</a>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('getEditCourse', ['id' => $item->id]) }}" class="btnEdit">Edit</a>
                                        <a href="{{ route('getCourseModule', ['course_id' => $item->id, 'page_type' => 'LMS']) }}" class="btnModul">Modules List</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Course Name</th>
                                <th>Fake Price</th>
                                <th>Price</th>
                                <th>Course Type</th>
                                <th>Short Description</th>
                                <th>Description</th>
                                <th>Content</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>

                    <!-- Info and Pagination container -->
                    <div class="buttons-container">
                        <div class="custom-info-text"></div>
                        <div class="custom-pagination-container"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
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
        $('[data-toggle="tooltip"]').tooltip();
        let table = $('#table').DataTable({
            scrollX: true,
            lengthChange: false,
            // lengthMenu: [10, 25, 50, 100],
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
            columnDefs: [{}],
            // columnDefs: [{
            //         "visible": false,
            //         "targets": [0]
            //     },
            //     {
            //         "width": "200px",
            //         "targets": 1
            //     }
            // ],
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

        // Create container for buttons and pagination
        let buttonPaginationContainer = $('<div>').addClass('button-pagination-container');
        buttonPaginationContainer.css({
            display: 'block',
            flexDirection: 'row',
            justifyContent: 'flex-start',
            // marginTop: '10px'
        });

        // Insert the buttons into the new container
        table.buttons().container().appendTo(buttonPaginationContainer);

        let buttonContainer = $('<div>').addClass('buttons-container');
        table.buttons().container().appendTo(buttonContainer);
        buttonContainer.insertBefore('.tableCourse .dataTables_length');

        // Insert the new container before the table
        buttonPaginationContainer.insertBefore('#table');

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
@endsection