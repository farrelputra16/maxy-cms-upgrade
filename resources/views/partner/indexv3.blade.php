@extends('layout.main-v3')

@section('title', 'Partners')

@section('content')
    <!-- Begin Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Overview</h4>

                <!-- Begin Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Master</a></li>
                        <li class="breadcrumb-item active">Partners</li>
                    </ol>
                </div>
                <!-- End Breadcrumb -->
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- Begin Content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Partners</h4>
                    <p class="card-title-desc">
                        This page presents a comprehensive overview of all available data, displayed in an interactive
                        and sortable DataTable format. Each row represents a unique data, providing key details such as
                        name, description, and status. Utilize the <b>column visibility, sorting, and column search bar</b>
                        features to
                        customize your view and quickly access the specific information you need.
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">Module Name</th>
                                <th>Logo</th>
                                <th>Type</th>
                                <th>URL</th>
                                <th class="data-medium">Address</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Contact Person</th>
                                <th>Status Highlight</th>
                                <th class="data-long">Description</th>
                                <th>Created At</th>
                                <th>Created Id</th>
                                <th>Updated At</th>
                                <th>Updated Id</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($partners as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->id }}</td>

                                    <td class="data-medium" data-toggle="tooltip" data-placement="top"
                                        title="{{ $item->name }}">
                                        {!! \Str::limit($item->name, 30) !!}
                                    </td>

                                    <td>
                                        <img src="{{ asset('uploads/partner/' . $item->logo) }}" alt="Image"
                                            style="max-width: 200px; max-height: 150px;">
                                    </td>
                                    <td>{{ $item->type }}</td>
                                    <td>{{ $item->url }}</td>
                                    <td class="data-medium" data-toggle="tooltip" data-placement="top"
                                        title="{!! strip_tags($item->address) !!}">
                                        {!! !empty($item->address) ? \Str::limit($item->address, 30) : '-' !!}
                                    </td>
                                    <td data-toggle="tooltip" data-placement="top" title="{!! strip_tags($item->phone) !!}">
                                        {!! !empty($item->phone) ? \Str::limit($item->phone, 30) : '-' !!}
                                    <td data-toggle="tooltip" data-placement="top" title="{!! strip_tags($item->email) !!}">
                                        {!! !empty($item->email) ? \Str::limit($item->email, 30) : '-' !!}
                                    <td data-toggle="tooltip" data-placement="top" title="{!! strip_tags($item->contact_person) !!}">
                                        {!! !empty($item->contact_person) ? \Str::limit($item->contact_person, 30) : '-' !!}
                                    <td>
                                        @if ($item->status_highlight == 1)
                                            <button class="btn btn-success" style="pointer-events: none;">Aktif</button>
                                        @else
                                            <button class="btn btn-danger" style="pointer-events: none;">Nonaktif</button>
                                        @endif
                                    </td>
                                    <td class="data-long" data-toggle="tooltip" data-placement="top"
                                        title="{!! strip_tags($item->description) !!}">
                                        {!! !empty($item->description) ? \Str::limit($item->description, 30) : '-' !!}
                                    </td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->created_id }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                    <td>{{ $item->updated_id }}</td>
                                    <td value="{{ $item->status }}">
                                        @if ($item->status == 1)
                                            <a class="btn btn-success" style="pointer-events: none;">Aktif</a>
                                        @else
                                            <a class="btn btn-danger" style="pointer-events: none;">Non Aktif</a>
                                        @endif
                                    </td>
                                    <td>
                                        {{-- <div class="btn-group"> --}}
                                        <a href="{{ route('getEditPartner', ['id' => $item->id]) }}"
                                            class="btn btn-primary rounded">Edit</a>
                                        {{-- </div> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th>Module Name</th>
                                <th>Logo</th>
                                <th>Type</th>
                                <th>URL</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Contact Person</th>
                                <th>Status Highlight</th>
                                <th>Description</th>
                                <th>Created At</th>
                                <th>Created Id</th>
                                <th>Updated At</th>
                                <th>Updated Id</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->

    <!-- FAB Add Starts -->
    <div id="floating-whatsapp-button">
        <a href="{{ route('getAddPartner') }}" target="_blank">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <!-- FAB Add Ends -->
@endsection

@section('script')

@endsection
