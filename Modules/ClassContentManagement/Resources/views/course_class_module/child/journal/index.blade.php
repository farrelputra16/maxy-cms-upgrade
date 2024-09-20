@extends('layout.master')

@section('title', 'Course Class Module Journal')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Class Module Journal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
            background-color: #DFE3F1;
        }

        .conTitle {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 2rem;
        }

        .h2 {
            font-weight: bold;
            color: #232E66;
            padding-left: .1rem;
            font-size: 22px;
            margin-bottom: -0.5rem;
            margin-left: 1rem;
        }

        .btnlogout {
            margin-right: 2rem;
            margin-bottom: .5rem;
            background-color: #FBB041;
            color: #FFF;
            width: 80px;
            height: 35px;
            border-radius: 10px;
            border: none;
            box-shadow: none;
            font-weight: bold;
        }

        .breadcrumb {
            border-top: 2px solid black;
            display: inline-block;
            width: 97%;
            ;
            margin-left: 1rem;
            margin-bottom: 1rem;
        }

        .breadcrumb .sectionDashboard,
        .breadcrumb .divider,
        .breadcrumb .secClass,
        .breadcrumb .secBatch,
        .breadcrumb .secModul {
            /* padding-top: 1rem; */
            /* margin-top: 1rem; */
            display: inline;
            font-size: 11px;
            font-weight: bold;
        }

        .breadcrumb .divider {
            margin: 0 5px;
        }

        .btnTambah {
            background-color: #4056A1;
            color: #FFF;
            width: 160px;
            height: 30px;
            border-radius: 8px;
            border: none;
            box-shadow: none;
            font-weight: bold;
            font-size: 13px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
            margin-left: .5rem;
            margin-bottom: 3rem;
            padding-top: .3rem;
        }

        .conBtn {
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            margin-right: 1rem;
        }

        .conBtn button {
            margin-right: 1rem;
            margin-left: .5rem;
        }

        th {
            font-weight: bold;
            color: #232E66;
            font-size: 12px;
            /* padding-left: .2rem; */
            /* margin-bottom: -0.5rem; */
        }

        .buttons-colvis {
            background-color: #4056A1;
            color: #FFF;
            width: 135px;
            height: 30px;
            border-radius: 8px;
            border: none;
            box-shadow: none;
            font-weight: bold;
            font-size: 12px;
            margin-top: .5rem;
            margin-left: .5rem;
            margin-bottom: .5rem;
            padding: 6px 12px;
            transition: background-color 0.3s ease;
        }

        .buttons-colvis:hover {
            background-color: #31446B;
        }

        .buttons-colvis:active {
            background-color: #2C3F63;
        }

        .buttons-copy,
        .buttons-excel,
        .buttons-pdf {
            background-color: #4056A1;
            color: #FFF;
            width: 80px;
            height: 30px;
            border-radius: 8px;
            border: none;
            box-shadow: none;
            font-size: 12px;
            font-weight: bold;
            margin-top: .5rem;
            margin-left: 45rem;
            margin-bottom: .5rem;
            /* margin-right: .5rem; */
            padding: 6px 12px;
            transition: background-color 0.3 ease;
        }

        .buttons-copy:hover,
        .buttons-excel:hover,
        .buttons-pdf:hover {
            background-color: #31446B;
        }

        .buttons-copy:active,
        .buttons-excel:active,
        .buttons-pdf:active {
            background-color: #2C3F63;
        }

        .buttons-container {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            margin-bottom: 10px;
        }

        .tableChild {
            overflow-x: scroll;
            padding-left: .5rem;
        }

        .custom-striped tbody tr:nth-of-type(odd) {
            background-color: pink;
        }

        .custom-striped tbody tr:nth-of-type(even) {
            background-color: #FFF;
        }

        .custom-striped tbody tr:nth-of-type(odd) td,
        .custom-striped tbody tr:nth-of-type(even) td {
            color: #000000;
        }

        .btnAktif {
            background-color: #46E44C;
            width: 5rem;
            height: 1rem;
            color: #FFF !important;
            font-size: 12px;
            text-align: center;
            display: inline-block;
            padding-top: 4px;
            padding-bottom: 10px;
            border-radius: .4rem;
        }

        .btnNon {
            background-color: #F13C20;
            width: 5rem;
            height: 1rem;
            color: #FFF !important;
            font-size: 12px;
            text-align: center;
            display: inline-block;
            padding-top: 4px;
            padding-bottom: 10px;
            border-radius: .4rem;
        }

        .btnEdit {
            background-color: #4056A1;
            width: 3rem;
            height: 1rem;
            color: #FFF !important;
            font-size: 12px;
            text-align: center;
            display: inline-block;
            padding-top: 4px;
            padding-bottom: 10px;
            border-radius: .4rem;
            margin-right: .5rem;
        }

        .dataTables_length {
            margin-bottom: 10px;
        }

        .buttons-container .dt-buttons {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="container conTitle">
        <h2 class="h2">Child Modules: {{ $parent_module->detail->name }}</h2>
        <form class="form-inline my-2 my-lg-0 me-3" method="post" action="{{ route('logout') }}">
            @csrf
            <button class="btnlogout" type="submit">Logout</button>
        </form>
    </div>
    <div class="breadcrumb pt-2 pb-4">
        <a class="section" href="{{ url('/') }}">Dashboard</a>
        <span class="divider">></span>
        <div class="secClass">Class</div>
        <span class="divider">></span>
        <div class="secClass">Module List</div>
        <span class="divider">></span>
        <div class="secClass">Content</div>
    </div>

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

    <div class="container">
        <div class="row">
            <div class="col">
                
            </div>
            <div class="card" style="margin-right: 1rem; margin-bottom: 5rem;">
                <div class="card-body">
                    <table id="table" class="tableChild table-striped custom-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Notes</th>
                                <th>Updated At</th>
                                <th>Status</th>
                                <th>Action</th>
                                <!-- More buat tempat button edit -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $item)
                            <tr>
                                <td scope="row">{{ $item->id }}</td>
                                <td>{{ $item->User->name }}</td>
                                <td id="description">{{ $item->description }}</td>
                                <td>{{ $item->updated_at }}</td>
                                <td>
                                    @if ($item->status == 1)
                                    <a class="btnAktif">Aktif</a>
                                    @else
                                    <a class="btnNon">Non Aktif</a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('getAddJournalCourseClassChildModule', ['id' => $item->id, 'user_id' => $item->User->id, 'course_class_module_id' => $parent_module->id]) }}" class="btnEdit btn-primary">Reply</a>
                                    @if ($item->status == 1)
                                    <button type="button" class="btn btn-danger delete-button" 
                                        data-id="{{ $item->id }}" 
                                        data-course_class_module_id="{{ $parent_module->id }}">
                                        Delete
                                    </button>
                                    @else
                                    <button type="button" class="btn btn-success delete-button" 
                                        data-id="{{ $item->id }}" 
                                        data-course_class_module_id="{{ $parent_module->id }}">
                                        Restore
                                    </button>
                                    @endif
                                    <form action="{{ route('postRejectJournalCourseClassChildModule', ['id' => $item->id, 'course_class_module_id' => $parent_module->id]) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @if ($item->acceptable == 1)
                                        <button type="submit" class="btn btn-warning">Reject</button>
                                        @else
                                        <button type="submit" class="btn btn-success">Accept</button>
                                        @endif
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Notes</th>
                                <th>Updated At</th>
                                <th>Status</th>
                                <th>Action</th>
                                <!-- More buat tempat button edit -->
                            </tr>
                        </tfoot>
                    </table>
                    <!-- Modal -->
                    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="confirmationModalLabel">Confirm Deletion</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete this item?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                    <button type="button" class="btn btn-primary" id="confirm-delete">Yes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Info and Pagination container -->
                    <div class="buttons-container">
                        <div class="custom-info-text"></div>
                        <div class="custom-pagination-container"></div>
                    </div>
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
                    // Listen for clicks on elements with the class 'delete-button'
                    document.querySelectorAll('.delete-button').forEach(button => {
                        button.addEventListener('click', function () {
                            // Get the ID and course_class_module_id from the clicked button's data attributes
                            let id = this.getAttribute('data-id');
                            let course_class_module_id = this.getAttribute('data-course_class_module_id');

                            // Show the confirmation modal (Bootstrap example)
                            var confirmationModal = new bootstrap.Modal(document.getElementById('confirmationModal'));
                            confirmationModal.show();

                            // Handle the confirm-delete button inside the modal
                            document.getElementById('confirm-delete').addEventListener('click', function () {
                                // Send the request when the user confirms
                                fetch('/courseclassmodule/child/journal/delete', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': "{{ csrf_token() }}" // CSRF token from Blade
                                    },
                                    body: JSON.stringify({
                                        id: id,  // Pass the correct ID here
                                        course_class_module_id: course_class_module_id  // And the correct course_class_module_id
                                    })
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        confirmationModal.hide();
                                        Swal.fire({
                                            title: 'Deleted!',
                                            text: 'Journal entry deleted/restored successfully.',
                                            icon: 'success',
                                            confirmButtonText: 'OK'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                // Refresh the page after the alert is closed
                                                location.reload();
                                            }
                                        });
                                    } else {
                                        Swal.fire({
                                            title: 'Error!',
                                            text: 'Failed to delete the journal entry. Please try again.',
                                            icon: 'error',
                                            confirmButtonText: 'OK'
                                        });
                                    }
                                })
                                .catch(error => {
                                    console.error('Error:', error);
                                    Swal.fire({
                                        title: 'Error!',
                                        text: 'An error occurred. Please try again.',
                                        icon: 'error',
                                        confirmButtonText: 'OK'
                                    });
                                });
                            });
                        });
                    });

                    $(document).ready(function() {
                        let table = $('#table').DataTable({
                            scrollX: true,
                            lengthChange: true,
                            lengthMenu: [10, 25, 50, 100],
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

                        let buttonContainer = $('<div>').addClass('buttons-container');
                        table.buttons().container().appendTo('.container .col-md-6:eq(0)');
                        buttonContainer.insertBefore('.tableChild .dataTables_length');

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

                        // Insert the new container before the table
                        buttonPaginationContainer.insertBefore('#table');

                        // Add individual column search inputs and titles
                        // $('#table thead th').each(function() {
                        //     let title = $(this).text();
                        //     $(this).html('<div class="text-center">' + title +
                        //         '</div><div class="mt-2"><input class="form-control" type="text" placeholder="Search ' + title +
                        //         '" /></div>');
                        // });

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
            </div>
        </div>
    </div>
</body>

</html>

</div>
@endsection