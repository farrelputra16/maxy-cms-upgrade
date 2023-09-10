@extends ('layout.master')

@section ('title', 'Trans Order')
@section ('content')
    <div style="padding: 0px 12px 0px 12px;">
        <hr style = "margin-bottom: 0px;">
            <nav class="navbar bg-body-tertiary" style="padding: 12px 0px 12px 0px;">
                <div class="navbar-nav" >
                    <a class="btn btn-primary" href="{{ route('getAddTransOrder')}}" role="button">Tambah Transaksi Order +</a>
                </div>
            </nav>
            <div id="table_content">
                <table class="ui tablet unstackable table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Order Number</th>
                            <th>Date</th>
                            <th>Total</th>
                            <th>Discount</th>
                            <th>After Discount</th>
                            <th>Payment Status</th>
                            <th>ID Course</th>
                            <th>ID Course Class (Batch)</th>
                            <th>ID Member</th>
                            <th>ID Course Package</th>
                            <th>ID Promotion</th>
                            <th>Forced At</th>
                            <th>Forced Comment</th>
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
                            <td>{{ $item->total }}</td>
                            <td>{{ $item->discount }}</td>
                            <td>{{ $item->total_after_discount }}</td>
                            <td>{{ $item->payment_status }}</td>
                            <td>{{ $item->course_name }}</td>
                            <td>{{ $item->course_class_batch }}</td>
                            <td>{{ $item->users_name }}</td>
                            <td>{{ $item->course_package_name }}</td>
                            <td>{{ $item->promotion_name }}</td>
                            <td>{{ $item->forced_at }}</td>
                            <td>{{ $item->forced_comment }}</td>
                            <td>{{ $item->description }}</td>
                            <td>
                            @if ($item->status == 1)
                                    <a class="ui tiny green label" style="text-decoration: none;">Aktif</a>
                                @else
                                    <a class="ui tiny red label" style="text-decoration: none;">Non Aktif</a>
                                @endif
                            </td>
                            <td>
                                <a href ="{{ route('getEditTransOrder', ['id' => $item->id])}}" style="text-decoration: none; color:blue;">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
</div>
@endsection