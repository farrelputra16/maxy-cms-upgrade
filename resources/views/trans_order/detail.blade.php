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
            <div id="#">
                <div class="#" style="padding: 12px 0px 12px 0px;">
                    {{-- <div class="navbar-nav">
                        <a class="btn btn-primary" href="{{ route('getAddTransOrder') }}" role="button">Tambah Transaksi
                            Order +</a>
                    </div> --}}
                    <h2>ID Transaksi: {{ $transOrderDetail->id }}</h2>

                    <h2>Order Number: {{ $transOrderDetail->order_number }}</h2>
                    <h2>Tanggal Order: {{ $transOrderDetail->date }}</h2>
                    <h2>Total: {{ 'Rp ' . number_format($transOrderDetail->total, 0, ',', '.') }}</h2>
                    <h2>Discount: {{ $transOrderDetail->discount }}%</h2>
                    <h2>After Discount: {{ 'Rp' . number_format($transOrderDetail->total_after_discount) }}</h2>
                    <h2>Payment Status: @if ($transOrderDetail->payment_status == 0)
                            <a class="ui tiny black label" style="text-decoration: none;">Not Completed</a>
                            {{-- <a href="">Not Completed</a> --}}
                        @elseif ($transOrderDetail->payment_status == 1)
                            <a class="ui tiny green label" style="text-decoration: none;">Completed</a>
                            {{-- Completed --}}
                        @elseif ($transOrderDetail->payment_status == 2)
                            <a class="ui tiny yellow label" style="text-decoration: none;">Partial</a>

                            {{-- Partial --}}
                        @elseif ($transOrderDetail->payment_status == 3)
                            <a class="ui tiny red label" style="text-decoration: none;">Cancelled</a>

                            {{-- Cancelled --}}
                        @else
                            Unknown Status
                        @endif
                    </h2>
                    <h2>Course: {{ $transOrderDetail->course_name }}</h2>
                    <h2>Batch: {{ $transOrderDetail->course_class_batch }}</h2>
                    <h2>Member: {{ $transOrderDetail->users_name }}</h2>
                    <h2>Course Package: {{ $transOrderDetail->course_package_name }}</h2>
                    <h2>ID Promotion: @if ($transOrderDetail->promotion_name !== null)
                            {{ $transOrderDetail->promotion_name }}
                        @else
                            Tidak ada
                        @endif
                    </h2>
                    <h2>Forced At: {{ $transOrderDetail->forced_at }}</h2>
                    <h2>Forced Comment: {{ $transOrderDetail->forced_comment }}</h2>
                    <h2>Description: {!! $transOrderDetail->description !!}</h2>
                    <h2>Status: @if ($transOrderDetail->status == 1)
                            <a class="ui tiny green label" style="text-decoration: none;">Aktif</a>
                        @else
                            <a class="ui tiny red label" style="text-decoration: none;">Non Aktif</a>
                        @endif
                    </h2>
                </div>
                {{-- @foreach ($transordersconfirm as $transorderconfirm)
                    <p>Trans Order Confirm ID: {{ $transorderconfirm->id }}</p>
                    <!-- Other properties of TransOrderConfirm -->
                @endforeach
                <h2>ID :{{ $transordersconfirm->id }}</h2> --}}

                <div class="navbar-nav">
                    <a class="btn btn-primary" href="{{ route('getTransOrder') }}" role="button">BACK</a>
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
