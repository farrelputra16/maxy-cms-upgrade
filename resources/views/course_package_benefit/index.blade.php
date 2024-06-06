@extends('layout.master')

@section('title', 'Course Package Benefit')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Package Benefit</title>
    <!-- Include CSS libraries for styling the table -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">

    <style>
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

        .logout {
            margin-right: 1rem;
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
            width: 1010px;
            margin-left: 1rem;
            margin-bottom: 1rem;
        }

        .breadcrumb .sectionDashboard,
        .breadcrumb .divider,
        .breadcrumb .sectionMaster,
        .breadcrumb .sectionCourse {
            display: inline;
            font-size: 11px;
            font-weight: bold;
        }

        .breadcrumb .divider {
            margin: 0 5px;
        }

        .btnAdd {
            background-color: #4056A1;
            color: #FFF;
            width: 200px;
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

        .btnBack{
            background-color: #4056A1;
            color: #FFF;
            width: 200px;
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
            margin-right: .5rem;
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

        th,
        td {
            padding: 12px;
            /* Adjust this value as needed for the desired spacing */
            text-align: center;
            /* Optional: Center-align text */
        }

        th {
            font-weight: bold;
            color: #232E66;
            font-size: 13px;
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
            margin-left: 45rem;
            margin-bottom: .5rem;
            padding: 6px 12px;
            transition: background-color 0.3s ease;
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

        .dataTables_length {
            margin-bottom: 10px;
        }

        .buttons-container .dt-buttons {
            margin-bottom: 10px;
        }

        .tableBene {
            border: 1px solid #000000;
            border-radius: 8px;
            overflow: hidden;
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
    </style>
</head>

<body>
    <div class="container conTitle">
        <h2 class="h2">Course Package Benefit</h2>
        <button class="logout">Logout</button>
    </div>
    <div class="breadcrumb pt-2 pb-4">
        <a class="sectionDashboard" href="{{ url('/') }}">Dashboard</a>
        <span class="divider">></span>
        <div class="sectionMaster">Master</div>
        <span class="divider">></span>
        <div class="sectionCourse">Course Package</div>
        <span class="divider">></span>
        <div class="sectionCourse">Benefit List</div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col">
                @if (isset($idCPB))
                <a class="btnAdd" href="{{ route('getAddCoursePackageBenefit', ['idCPB' => $idCPB]) }}" role="button">Add Course Package Benefit</a>
                @else
                <a class="btnAdd" href="{{ route('getAddCoursePackageBenefit') }}" role="button">Add Course Package Benefit</a>
                @endif
            </div>

            <table id="table" class="tableBene table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">ID Course Package - Price</th>
                        <th scope="col">Description</th>
                        <th scope="col">Status</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($coursePackageBenefits as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->course_package_name }} - Rp. {{ $item->course_package_price }}</td>
                        <td>{{ $item->description }}</td>
                        <td>
                            @if ($item->status == 1)
                            <a class="btnAktif">Aktif</a>
                            @else
                            <a class="btnNon">Non Aktif</a>
                            @endif
                        </td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->updated_at }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('getEditCoursePackageBenefit', ['id' => $item->id]) }}" class="btnEdit">Edit</a>
                                <!-- <a href="{{ route('deleteCourseModule', ['id' => $item->id]) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this module?')">Delete</a> -->
                            </div>
                        </td>
                        <!-- <td>
                            @if (isset($idCPB))
                            <a href="{{ route('getEditCoursePackageBenefit', ['id' => $item->id, 'idCPB' => $idCPB]) }}" style="text-decoration: none; color:blue;">Edit</a>
                            <form action="{{ route('deleteCoursePackageBenefit', ['id' => $item->id, 'idCPB' => $idCPB]) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this Course Package Benefit?')">
                                @method('delete')
                                @csrf
                                <button type="submit" style="text-decoration: none; color: red; border: none; background-color: transparent; cursor: pointer;">Delete</button>
                            </form>
                            @else
                            <a href="{{ route('getEditCoursePackageBenefit', ['id' => $item->id]) }}" style="text-decoration: none; color:blue;">Edit</a>
                            <form action="{{ route('deleteCoursePackageBenefit', ['id' => $item->id]) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this Course Package Benefit?')">
                                @method('delete')
                                @csrf
                                <button type="submit" style="text-decoration: none; color: red; border: none; background-color: transparent; cursor: pointer;">Delete</button>
                            </form>
                            @endif
                        </td> -->
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>ID Course Package - Price</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Updated At</th>
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

        <!-- <div class="navbar-nav"> -->
        <!-- @if (isset($idCPB)) -->
        <!-- <a class="btn btn-primary" href="{{ route('getAddCoursePackageBenefit', ['idCPB' => $idCPB]) }}" role="button">Tambah Course Package Benefit +</a> -->
        <!-- @endif -->
        <!-- <a class="btn btn-secondary" href="{{ url()->previous() }}" role="button">Back</a> -->
        <!-- </div> -->
        <div class="navbar-nav">
            @if (isset($idCPB))
            <a class="btnBack btn-primary" href="{{ route('getCoursePackage') }}" role="button">BACK</a>
            @endif
            {{-- <a class="btnBack btn-secondary" href="{{ url()->previous() }}" role="button">Back</a> --}}
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
    });
    let buttonContainer = $('<div>').addClass('buttons-container');
    table.buttons().container().appendTo(buttonContainer);
    buttonContainer.insertBefore('.tableBene .dataTables_length');

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
    //         '</div><div class="mt-2"><input type="text" placeholder="Search ' + title +
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
</script>
@endsection