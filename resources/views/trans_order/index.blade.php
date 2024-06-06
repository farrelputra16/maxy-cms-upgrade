@extends('layout.master')

@section('title', 'Trans Order')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>
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
            width: 130px;
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

        .dataTables_length {
            margin-bottom: 10px;
        }

        .buttons-container .dt-buttons {
            margin-bottom: 10px;
        }

        .tableOrder {
            border: 1px solid #000000;
            border-radius: 8px;
            overflow: hidden;
            padding-top: .5rem;
            padding-left: .5rem;
        }

        .btnStatus {
            background-color: #000000;
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
            margin-right: .2rem;
        }

        .btnCon {
            background-color: #4056A1;
            width: 6rem;
            height: 1rem;
            color: #FFF !important;
            font-size: 12px;
            text-align: center;
            display: inline-block;
            padding-top: 4px;
            padding-bottom: 10px;
            margin-right: .2rem;
        }

        .btnDetail {
            background-color: #4056A1;
            width: 6rem;
            height: 1rem;
            color: #FFF !important;
            font-size: 12px;
            text-align: center;
            display: inline-block;
            padding-top: 4px;
            padding-bottom: 10px;
            border-radius: .2rem;
        }

        .custom-length-container {
            margin-bottom: 10px;
            margin-left: .5rem;
            font-size: 12px;
        }

        .custom-pagination-container {
            margin-left: 10rem;
        }

        .custom-info-text {
            margin-bottom: 10px;
            margin-left: .5rem;
            font-size: 12px;
        }

        .dataTables_paginate {
            font-size: 12px;
        }

        .buttons-container .dt-buttons {
            margin-bottom: 10px;
            /* margin-right: 10rem; */
        }

        .dataTables_wrapper .dataTables_filter {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container conTitle">
        <h2 class="h2">Order</h2>
        <button class="logout">Logout</button>
    </div>

    <div class="breadcrumb pt-2 pb-4">
        <a class="sectionDashboard" href="{{ url('/') }}">Dashboard</a>
        <span class="divider">></span>
        <div class="sectionMaster">Order</div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col">
                <a class="btnTambah btn-primary" href="{{ route('getAddTransOrder') }}" role="button">Add Transaksi Order</a>
            </div>
            <table id="table" class="tableOrder table-striped w-100">
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
                        <th>Member</th>
                        <th>Course Package</th>
                        <th>ID Promotion</th>
                        <th>Description</th>
                        <th>Status</th>
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
                        <td>{{ $item->discount ?? 0 }}%</td>
                        {{-- <td>{{ $item->total_after_discount }}</td> --}}
                        <td>{{ 'Rp' . number_format($item->total_after_discount) }}</td>
                        {{-- <td>{{ $item->payment_status }}</td> --}}
                        <td>
                            @if ($item->payment_status == 0)
                            <a class="btnStatus ui tiny black label" style="text-decoration: none;">Not Completed</a>
                            {{-- <a href="">Not Completed</a> --}}
                            @elseif ($item->payment_status == 1)
                            <a class="btnStatus ui tiny green label" style="text-decoration: none;">Completed</a>
                            {{-- Completed --}}
                            @elseif ($item->payment_status == 2)
                            <a class="btnStatus ui tiny yellow label" style="text-decoration: none;">Partial</a>

                            {{-- Partial --}}
                            @elseif ($item->payment_status == 3)
                            <a class="btnStatus ui tiny red label" style="text-decoration: none;">Cancelled</a>

                            {{-- Cancelled --}}
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
                        <td>{!! $item->description !!}</td>
                        <td>
                            @if ($item->status == 1)
                            <a class="btnAktif">Aktif</a>
                            @else
                            <a class="btnNon">Non Aktif</a>
                            @endif
                        </td>
                        <td>
                            <!-- <a href ="{{ route('getEditTransOrder', ['id' => $item->id]) }}" style="text-decoration: none; color:blue;">Edit</a>
                                    <a href ="{{ route('getEditTransOrder', ['id' => $item->id]) }}" style="text-decoration: none; color:blue;">TransOrder Confirm</a> -->

                            <div class="btn-group">
                                <a href="{{ route('getEditTransOrder', ['id' => $item->id]) }}" class="btnEdit btn-primary">Edit</a>
                                <a href="{{ route('getTransOrderConfirm', ['id' => $item->id]) }}" class="btnCon btn-info">TransOrder Confirm</a>
                                <a href="{{ route('showTransOrderDetail', ['id' => $item->id]) }}" class="btnDetail btn-info">Detail</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Order Number</th>
                        <th>Date</th>
                        <th>Total</th>
                        <th>Discount</th>
                        <th>After Discount</th>
                        <th>Payment Status</th>
                        <th>Course</th>
                        <th>Member</th>
                        <th>Course Package</th>
                        <th>ID Promotion</th>
                        <th>Description</th>
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

                let buttonContainer = $('<div>').addClass('buttons-container');
                table.buttons().container().appendTo(buttonContainer);
                buttonContainer.insertBefore('.tableOrder_wrapper .dataTables_length');

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

                // Insert the show entries and info into the new container with custom classes
                // $('.dataTables_length').addClass('custom-length-container').appendTo(buttonPaginationContainer);
                // $('.dataTables_info').addClass('custom-info-text').appendTo(buttonPaginationContainer);
                // $('.dataTables_paginate').addClass('custom-pagination-container').appendTo(buttonPaginationContainer);

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

        <!-- Ids in the navbar a-href and ids in the content should match-->

        <div data-bs-spy="scroll" data-bs-target="#navId" data-bs-smooth-scroll="true">

            <div id="navId">
                <ul class="nav nav-tabs" role="tablist">

                </ul>
            </div>

        </div>
        <script>
            var scrollSpy = new bootstrap.ScrollSpy(document.body, {
                target: '#navId'
            })
        </script>
    </div>
</body>

</html>

@endsection