@extends('layout.master')

@section('title', 'Course Package')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
    <!DOCTYPE html>
<html>
<head>
<h2>Course Package</h2>
    <!-- Include CSS libraries for styling the table -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">

</head>
<body>
    <hr>
    <div class="ui breadcrumb pt-2 pb-4">
            <a class="section" href="{{ url('/') }}">Dashboard</a>
            <i class="right angle icon divider"></i>
            <div class="active section">Course Package</div>
        </div>
    <div id="example_wrapper">
        <div class="navbar bg-body-tertiary" style="padding: 12px 0px 12px 0px;">
        <div class="navbar-nav">
                <a class="btn btn-primary" href="{{ route('getAddCoursePackage') }}" role="button">Tambah Course Package +</a>
            </div>
        </div>
        
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Package Name</th>
                    <th scope="col">Fake Price</th>
                    <th scope="col">Price</th>
                    <th scope="col">Payment Link</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Action</th>
                    <!-- More buat tempat edit / delete -->
                </tr>
            </thead>
            <tbody>
                @foreach ($coursePackages as $item)
                    <tr>
                        <td scope="row">{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td id="fake_price">Rp. {{ number_format($item->fake_price, 2,',','.') }}</td>
                        <td id="price">Rp. {{ number_format($item->price, 2,',','.') }}</td>
                        <td id="payment_link">{{ $item->payment_link }}</td>
                        <td id="description">{{ $item->description }}</td>
                        <td>
                            @if ($item->status == 1)
                                <a class="ui tiny green label" style="text-decoration: none;">Aktif</a>
                            @else
                                <a class="ui tiny red label" style="text-decoration: none;">Non Aktif</a>
                            @endif
                        </td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->updated_at }}</td>
                        <!-- <td>
                            <a href="{{ route('getEditCoursePackage', ['id' => $item->id]) }}" style="text-decoration: none; color:blue;">Edit</a>
                        </td> -->
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('getEditCoursePackage', ['id' => $item->id]) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ route('getCoursePackageBenefit', ['id' => $item->id]) }}" class="btn btn-info">Benefit List</a>
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