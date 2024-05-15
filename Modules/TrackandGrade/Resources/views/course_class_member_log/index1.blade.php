@extends ('layout.master')

@section('title', 'History')
@section('content')

    <div style="padding: 0px 12px 0px 12px;">
        <!DOCTYPE html>
        <html>

        <head>
            <title>History</title>
            <!-- Include CSS libraries for styling the table -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
            <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
            <link rel="stylesheet" type="text/css"
                href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">

            
        </head>

        <body>
            <h2>CCMH Tracking</h2>
            <hr>
            <div class="ui breadcrumb pt-2 pb-4">
                <a class="section" href="{{ url('/') }}">Dashboard</a>
                <i class="right angle icon divider"></i>
                <div class="active section">CCMH Tracking</div>
            </div>

            <div id="courseClassTable_wrapper">
                <table id="users-table" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>user_id</th>
                            <th>course_class_module_id</th>
                            <th>log_type</th>
                            <th>status_log</th>
                            <th>created_at</th>
                            <th>updated_at</th>
                        </tr>
                    </thead>
                </table>
            </div>

            <script src="https://code.jquery.com/jquery.js"></script>
            <script src="https://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
            <script src="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
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
                $(function() {
                    $('#users-table').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: '{!! route('getCCMHajax') !!}', // memanggil route yang menampilkan data json
                        columns: [{ // mengambil & menampilkan kolom sesuai tabel database
                                data: 'id',
                                name: 'id',
                                searchable: true
                            },
                            {
                                data: 'user_id',
                                name: 'user_id',
                                searchable: true
                            },
                            {
                                data: 'course_class_module_id',
                                name: 'course_class_module_id',
                                searchable: true
                            },
                            {
                                data: 'log_type',
                                name: 'log_type',
                                searchable: true
                            },
                            {
                                data: 'status_log',
                                name: 'status_log',
                                searchable: true
                            },
                            {
                                data: 'created_at',
                                name: 'created_at',
                                searchable: true
                            },
                            {
                                data: 'updated_at',
                                name: 'updated_at',
                                searchable: true
                            }
                        ]
                    });
                });
            </script>

            
        </body>

        </html>
    </div>
@endsection
