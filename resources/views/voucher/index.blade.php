@extends ('layout.master')

@section ('title', 'Voucher')
@section ('content')
    <div style="padding: 0px 12px 0px 12px;">
        <hr style = "margin-bottom: 0px;">
            <nav class="navbar bg-body-tertiary" style="padding: 12px 0px 12px 0px;">
                <div class="navbar-nav" >
                    <a class="btn btn-primary" href="{{ route('getAddVoucher')}}" role="button">Tambah Voucher +</a>
                </div>
            </nav>
            <div id="table_content">
                <table class="ui tablet unstackable table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Voucher Name</th>
                            <th>Voucher Code</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Discount Type</th>
                            <th>Discount</th>
                            <th>Max Discount</th>
                            <th>Description</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($voucher as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->code }}</td>
                            <td>{{ $item->start_date }}</td>
                            <td>{{ $item->end_date }}</td>
                            <td>{{ $item->discount_type }}</td>
                            <td>{{ $item->discount }}</td>
                            <td>{{ $item->max_discount }}</td>
                            <td>{{ $item->description }}</td>
                            <th>Action</th>
                            <td>
                            @if ($item->status == 1)
                                    <a class="ui tiny green label" style="text-decoration: none;">Aktif</a>
                                @else
                                    <a class="ui tiny red label" style="text-decoration: none;">Non Aktif</a>
                                @endif
                            </td>
                            <td>
                                <a href ="{{ route('getEditVoucher', ['id' => $item->id])}}" style="text-decoration: none; color:blue;">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
</div>
@endsection