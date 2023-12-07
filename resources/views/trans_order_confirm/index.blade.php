
@extends('layout.master')

@section('title', 'Trans Order')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
    <!DOCTYPE html>
<html>
<head>
    <title>Trans Order Confirm</title>
    <!-- Include CSS libraries for styling the table -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">

</head>
<body>
    <h2>Trans Order Confirm</h2>
    <hr>
    <div id="example_wrapper">
        <div class="navbar bg-body-tertiary" style="padding: 12px 0px 12px 0px;">
            <div class="navbar-nav">
                <a class="btn btn-primary" href="{{ route('getAddTransOrderConfirm', ['id' => $idtransorder]) }}" role="button">
                    Tambah Transaksi Order Confirm +
                </a>
            </div>

        </div>
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Order Confirm Number</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>sender_account_name</th>
                    <th>sender_account_number</th>
                    <th>sender_bank</th>
                    <th>trans_order_id</th>
                    <th>m_bank_account_id</th>
                    <th>Created At</th>
                    <th>Created Id</th>
                    <th>Updated At</th>
                    <th>Updated Id</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transordersconfirm as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->order_confirm_number }}</td>
                    <td>{{ $item->date }}</td>
                    <td>{{ $item->amount }}</td>
                    <td>{{ $item->sender_account_name }}</td>
                    <td>{{ $item->sender_account_number }}</td>
                    <td>{{ $item->sender_bank }}</td>
                    <td>{{ $item->trans_order_id }}</td>
                    <td>{{ $item->m_bank_account_id }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->created_id }}</td>
                    <td>{{ $item->updated_at }}</td>
                    <td>{{ $item->updated_id }}</td>
                    <td>
                    @if ($item->status == 1)
                            <a class="ui tiny green label" style="text-decoration: none;">Aktif</a>
                        @else
                            <a class="ui tiny red label" style="text-decoration: none;">Non Aktif</a>
                        @endif
                    </td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('getEditTransOrderConfirm', ['id' => $item->id]) }}" class="btn btn-primary">Edit</a>
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