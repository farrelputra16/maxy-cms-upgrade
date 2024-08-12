@extends('layout.master')

@section('title', 'Event')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <!DOCTYPE html>
        <html>

        <head>
            <title>Events</title>
            <!-- Include CSS libraries for styling the table -->
            <link rel="stylesheet"
                href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
            <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
            <link rel="stylesheet" type="text/css"
                href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">

        </head>

        <body>
            <h2>Event</h2>
            <hr>
            <div class="ui breadcrumb pt-2 pb-4">
                <a class="section" href="{{ url('/') }}">Dashboard</a>
                <i class="right angle icon divider"></i>
                <div class="active section">Events</div>
            </div>
            <div id="example_wrapper">
                <div class="navbar bg-body-tertiary" style="padding: 12px 0px 12px 0px;">
                    <div class="navbar-nav">
                        <a class="btn btn-primary" href="{{ route('getAddEvent') }}" role="button">Tambah Event
                            +</a>
                    </div>
                </div>
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Date start</th>
                            <th>Date end</th>
                            <th>Description</th>
                            <th>Need verification</th>
                            <th>Public</th>
                            <th>Status</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($events as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>
                                    <img src="{{ asset('uploads/event/' . $item->image) }}" alt="Image"
                                        style="max-width: 200px; max-height: 150px;">
                                </td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->date_start }}</td>
                                <td>{{ $item->date_end }}</td>
                                <td>{{ $item->description }}</td>
                                <td>
                                    @if ($item->is_need_verification == 1)
                                        <a class="ui tiny green label" style="text-decoration: none;">Yes</a>
                                    @else
                                        <a class="ui tiny red label" style="text-decoration: none;">No</a>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->is_public == 1)
                                        <a class="ui tiny green label" style="text-decoration: none;">Yes</a>
                                    @else
                                        <a class="ui tiny red label" style="text-decoration: none;">No</a>
                                    @endif
                                </td>
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
                                    <div class="btn-group">
                                        <a href="{{ route('getEditEvent', ['id' => $item->id]) }}"
                                            class="btn btn-primary">Edit</a>
                                        <a href="{{ route('getAttendanceEvent', ['id' => $item->id]) }}"
                                            class="btn btn-info">Attendance</a>
                                        <a href="{{ route('getEventRequirement', ['id' => $item->id]) }}"
                                            class="btn btn-secondary">Requirements</a>
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
                $(document).ready(function() {
                    let table = $('#example').DataTable({
                        lengthChange: true,
                        lengthMenu: [10, 25, 50, 100],
                        buttons: ['copy', 'excel', 'pdf', 'colvis'],
                        searching: true,
                        columnDefs: [{
                            "visible": false,
                            "targets": [0]
                        }]
                    });

                    // Add individual column search inputs and titles
                    $('#example thead th').each(function() {
                        let title = $(this).text();
                        $(this).html('<div class="text-center">' + title +
                            '</div><div class="mt-2"><input class="form-control" type="text" placeholder="Search ' +
                            title +
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

                    table.buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');
                });
            </script>

        </body>

        </html>

    </div>
@endsection
