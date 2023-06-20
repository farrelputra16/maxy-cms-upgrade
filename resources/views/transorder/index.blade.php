@extends ('layout.master')

@section ('title', 'Trans Order')
@section ('content')
    <div style="padding: 0px 12px 0px 12px;">
        <hr style = "margin-bottom: 0px;">
            <nav class="navbar bg-body-tertiary" style="padding: 12px 0px 12px 0px;">
                <div class="navbar-nav" >
                    <a class="btn btn-primary" href="{{ route('getAddTransOrder')}}" role="button">Tambah Order +</a>
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
                            <th>ID Course Class</th>
                            <th>ID Member</th>
                            <th>ID Course Package</th>
                            <th>ID Promotion</th>
                            <th>Forced at</th>
                            <th>Forced Comment</th>
                            <th>ID User Forced</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transorder as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->order_number}}</td>
                            <td>{{$item->date}}</td>
                            <td>{{$item->total}}</td>
                            <td>{{$item->discount}}</td>
                            <td>{{$item->total_after_discount}}</td>
                            <td>{{$item->payment_status}}</td>
                            <td>{{$item->id_course}}</td>
                            <td>{{$item->id_course_class}}</td>
                            <td>{{$item->id_member}}</td>
                            <td>{{$item->id_course_package}}</td>
                            <td>{{$item->id_promotion}}</td>
                            <td>{{$item->forced_at}}</td>
                            <td>{{$item->forced_comment}}</td>
                            <td>{{$item->id_user_forced}}</td>
                            <td>{{$item->description}}</td>
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