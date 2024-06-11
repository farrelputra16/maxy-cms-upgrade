@extends('layout.master')

@section('title', 'Trans Order')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trans Order</title>
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

        .btnlogout {
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
            width: 97%;;
            margin-left: 1rem;
            margin-bottom: 1rem;
        }

        .breadcrumb .sectionDashboard,
        .breadcrumb .divider,
        .breadcrumb .sectionMaster,
        .breadcrumb .secOrder {
            /* padding-top: 1rem; */
            /* margin-top: 1rem; */
            display: inline;
            font-size: 11px;
            font-weight: bold;
        }

        .breadcrumb .divider {
            margin: 0 5px;
        }

        .btnTambahCourse {
            background-color: #4056A1;
            color: #FFF;
            width: 140px;
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
            font-size: 13px;
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
        <h2 class="h2">Trans Order</h2>
        <form class="form-inline my-2 my-lg-0 me-3" method="post" action="{{ route('logout') }}">
            @csrf
            <button class="btnlogout" type="submit">Logout</button>
        </form>
    </div>

    <div class="breadcrumb pt-2 pb-4">
        <a class="sectionDashboard" href="{{ url('/') }}">Dashboard</a>
        <span class="divider">></span>
        <div class="sectionMaster">Order</div>
        <span class="divider">></span>
        <div class="secOrder">{{ $transOrderName->order_number }}</div>
    </div>

    <div class="container">
        <div class="row">
            <div class="row">
                <!-- <a class="btn btn-primary" href="{{ route('getAddTransOrder') }}" role="button">Tambah Transaksi
                    Order +</a> -->
            </div>

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