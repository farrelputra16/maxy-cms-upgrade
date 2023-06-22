@extends('layout.master')

@section('title', 'Transaction Order Confirm')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <hr style="margin-bottom: 0px;">
        <nav class="navbar bg-body-tertiary" style="padding: 12px 0px 12px 0px;">
            <div class="navbar-nav">
                <a class="btn btn-primary" href="{{ route('getAddTransOrderConfirm') }}" role="button">Tambah User +</a>
            </div>
        </nav>
        <div id="table_content">
            <table class="ui tablet unstackable table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Order Confirm Number</th>
                        <th>Date</th>
                        <th>Sender Account Name</th>
                        <th>Sender Account Number</th>
                        <th>Sender Bank</th>
                        <th>Amount</th>
                        <th>Verified at</th>
                        <th>Verified Comment</th>
                        <th>Verified ID</th>
                        <th>Bank Account</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Created_at</th>
                        <th>Updated_at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transorderconfirm as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->order_confirm_number }}</td>
                            <td>{{ $item->date }}</td>
                            <td>{{ $item->sender_account_name }}</td>
                            <td>{{ $item->sender_account_number }}</td>
                            <td>{{ $item->sender_bank }}</td>
                            <td>{{ $item->amount }}</td>
                            <td>{{ $item->image }}</td>
                            <td>{{ $item->image }}</td>
                            <td>{{ $item->verified_at }}</td>
                            <td>{{ $item->verified_comment }}</td>
                            <td>{{ $item->verified_id }}</td>
                            <td>{{ $item->trans_order_id }}</td>
                            <td>{{ $item->m_bank_account_id }}</td>
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
                                <a href="{{ route('getEditTransOrderConfirm', ['id' => $item->id]) }}" style="text-decoration: none; color:blue;">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection