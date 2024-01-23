@extends('layout.master')

@section('title', 'Course Package Benefit')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <!DOCTYPE html>
        <html>

        <head>
            <h2>Course Package Benefit</h2>
            <!-- Include CSS libraries for styling the table -->
            <link rel="stylesheet"
                href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
            <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
            <link rel="stylesheet" type="text/css"
                href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">

        </head>

        <body>
            <hr>
            <div id="example_wrapper">
                <div class="navbar bg-body-tertiary" style="padding: 12px 0px 12px 0px;">
                    <div class="navbar-nav">

                        @if (isset($idCPB))
                            <a class="btn btn-primary" href="{{ route('getAddCoursePackageBenefit', ['idCPB' => $idCPB]) }}"
                                role="button">Tambah Course Package Benefit +</a>
                        @else
                            <a class="btn btn-primary" href="{{ route('getAddCoursePackageBenefit') }}"
                                role="button">Tambah Course Package Benefit +</a>
                        @endif




                    </div>
                </div>
                <table id="example" class="table table-striped" style="width:100%">
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
                                        <a class="ui tiny green label" style="text-decoration: none;">Aktif</a>
                                    @else
                                        <a class="ui tiny red label" style="text-decoration: none;">Non Aktif</a>
                                    @endif
                                </td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->updated_at }}</td>
                                <td>
                                    @if (isset($idCPB))
                                        <a href="{{ route('getEditCoursePackageBenefit', ['id' => $item->id, 'idCPB' => $idCPB]) }}"
                                            style="text-decoration: none; color:blue;">Edit</a>
                                        <form
                                            action="{{ route('deleteCoursePackageBenefit', ['id' => $item->id, 'idCPB' => $idCPB]) }}"
                                            method="post"
                                            onsubmit="return confirm('Are you sure you want to delete this Course Package Benefit?')">
                                            @method('delete')
                                            @csrf
                                            <button type="submit"
                                                style="text-decoration: none; color: red; border: none; background-color: transparent; cursor: pointer;">Delete</button>
                                        </form>
                                    @else
                                        <a href="{{ route('getEditCoursePackageBenefit', ['id' => $item->id]) }}"
                                            style="text-decoration: none; color:blue;">Edit</a>
                                        <form action="{{ route('deleteCoursePackageBenefit', ['id' => $item->id]) }}"
                                            method="post"
                                            onsubmit="return confirm('Are you sure you want to delete this Course Package Benefit?')">
                                            @method('delete')
                                            @csrf
                                            <button type="submit"
                                                style="text-decoration: none; color: red; border: none; background-color: transparent; cursor: pointer;">Delete</button>
                                        </form>
                                    @endif
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- <div class="navbar-nav">
            @if (isset($idCPB))
                <a class="btn btn-primary" href="{{ route('getAddCoursePackageBenefit', ['idCPB' => $idCPB]) }}" role="button">Tambah Course Package Benefit +</a>
            @endif
            <a class="btn btn-secondary" href="{{ url()->previous() }}" role="button">Back</a>
        </div> --}}
                <div class="navbar-nav">
                    @if (isset($idCPB))
                        <a class="btn btn-primary" href="{{ route('getCoursePackage') }}" role="button">BACK</a>
                    @endif
                    {{-- <a class="btn btn-secondary" href="{{ url()->previous() }}" role="button">Back</a> --}}
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
                $(document).ready(function() {
                    var table = $('#example').DataTable({
                        lengthChange: true, // Aktifkan opsi perubahan jumlah entri
                        lengthMenu: [10, 25, 50, 100], // Menentukan pilihan jumlah entri yang dapat ditampilkan
                        buttons: ['copy', 'excel', 'pdf', 'colvis']
                    });

                    table.buttons().container()
                        .appendTo('#example_wrapper .col-md-6:eq(0)');
                });
            </script>
        </body>

        </html>

    </div>
@endsection
