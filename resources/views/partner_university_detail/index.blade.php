@extends('layout.master')

@section('title', 'Access Group')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <h2>Partner University Detail</h2>
        <hr style="margin-bottom: 0px;">
        <nav class="navbar bg-body-tertiary" style="padding: 12px 0px 12px 0px;">
            <div class="navbar-nav">
                <a class="btn btn-primary" href="{{ route('getAddPartnerUniversityDetail') }}" role="button">Tambah Detail Partner Universitas +</a>
            </div>
        </nav>
        <div id="table_content">
            <table class="ui tablet unstackable table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>ref</th>
                        <th>Type</th>
                        <th>ID Partner</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Created_at</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($partnerUniversitiesDetail as $item)
                        <tr>
                            <td>{{ $item->pud_id }}</td>
                            <td>{{ $item->pud_name }}</td>
                            <td>{{ $item->pud_ref }}</td>
                            <td>{{ $item->pud_type }}</td>
                            <td>{{ $item->partner_name }}</td>
                            <td id="description">{{ $item->pud_description }}</td>
                            <td>
                                @if ($item->pud_status == 1)
                                    <a class="ui tiny green label" style="text-decoration: none;">Aktif</a>
                                @else
                                    <a class="ui tiny red label" style="text-decoration: none;">Non Aktif</a>
                                @endif
                            </td>
                            <td>{{ $item->pud_created_at }}</td>
                            <td>{{ $item->pud_updated_at }}</td>
                            <td>
                                <a href="{{ route('getEditPartnerUniversityDetail', ['id' => $item->pud_id]) }}" style="text-decoration: none; color:blue;">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection