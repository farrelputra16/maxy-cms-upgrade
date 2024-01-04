@extends('layout.master')

@section('title', 'Trans Order')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <!DOCTYPE html>
        <html>

        <head>
            <title>Trans Order</title>
            <!-- Include CSS libraries for styling the table -->
            <link rel="stylesheet"
                href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
            <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
            <link rel="stylesheet" type="text/css"
                href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">

        </head>

        <body>
            <h2>Trans Order</h2>
            <hr>
            <div id="example_wrapper">
                <div class="navbar bg-body-tertiary" style="padding: 12px 0px 12px 0px;">
                    <div class="navbar-nav">
                        <a class="btn btn-primary" href="{{ route('getAddTransOrder') }}" role="button">Tambah Transaksi
                            Order +</a>
                    </div>
                </div>
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Order Number</th>
                            <th>Date</th>
                            <th>Total</th>
                            <th>Discount</th>
                            <th>After Discount</th>
                            <th>Payment Status</th>
                            <th>Course</th>
                            {{-- <th>Batch</th> --}}
                            <th>Member</th>
                            <th>Course Package</th>
                            <th>ID Promotion</th>
                            {{-- <th>Forced At</th>
                    <th>Forced Comment</th> --}}
                            {{-- <th>Description</th> --}}
                            {{-- <th>Status</th> --}}
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transOrders as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->order_number }}</td>
                                <td>{{ $item->date }}</td>
                                {{-- <td>{{ $item->total }}</td> --}}
                                <td>{{ 'Rp ' . number_format($item->total, 0, ',', '.') }}</td>
                                <td>{{ $item->discount }}%</td>
                                {{-- <td>{{ $item->total_after_discount }}</td> --}}
                                <td>{{ 'Rp' . number_format($item->total_after_discount) }}</td>
                                {{-- <td>{{ $item->payment_status }}</td> --}}
                                <td>
                                    @if ($item->payment_status == 0)
                                        Not Completed
                                    @elseif ($item->payment_status == 1)
                                        Completed
                                    @elseif ($item->payment_status == 2)
                                        Partial
                                    @elseif ($item->payment_status == 3)
                                        Cancelled
                                    @else
                                        Unknown Status
                                    @endif
                                </td>
                                <td>{{ $item->course_name }}</td>
                                {{-- <td>{{ $item->course_class_batch }}</td> --}}
                                <td>{{ $item->users_name }}</td>
                                <td>{{ $item->course_package_name }}</td>
                                {{-- <td>{{ $item->promotion_name }}</td> --}}
                                <td>
                                    @if ($item->promotion_name !== null)
                                        {{ $item->promotion_name }}
                                    @else
                                        Tidak ada
                                    @endif
                                </td>
                                {{-- <td>{{ $item->forced_at }}</td>
                    <td>{{ $item->forced_comment }}</td> --}}
                                {{-- <td>{!! $item->description !!}</td> --}}
                                {{-- <td>
                                    @if ($item->status == 1)
                                        <a class="ui tiny green label" style="text-decoration: none;">Aktif</a>
                                    @else
                                        <a class="ui tiny red label" style="text-decoration: none;">Non Aktif</a>
                                    @endif
                                </td> --}}
                                <td>
                                    <!-- <a href ="{{ route('getEditTransOrder', ['id' => $item->id]) }}" style="text-decoration: none; color:blue;">Edit</a>
                                <a href ="{{ route('getEditTransOrder', ['id' => $item->id]) }}" style="text-decoration: none; color:blue;">TransOrder Confirm</a> -->

                                    <div class="btn-group">
                                        <a href="{{ route('getEditTransOrder', ['id' => $item->id]) }}"
                                            class="btn btn-primary">Edit</a>
                                        <a href="{{ route('getTransOrderConfirm', ['id' => $item->id]) }}"
                                            class="btn btn-info">TransOrder Confirm</a>
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
