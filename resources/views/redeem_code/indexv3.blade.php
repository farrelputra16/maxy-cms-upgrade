@extends('layout.main-v3')

@section('title', 'Reedem Code')

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
                        <li class="breadcrumb-item"><a>Members</a></li>
                        <li class="breadcrumb-item active">Reedem Code</li>
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
                    <h4 class="card-title">Member Testimonial</h4>
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
                                <th class="data-medium">Code</th>
                                <th>Quota</th>
                                <th>Type</th>
                                <th>Expired Date</th>
                                <th class="data-long">Description</th>
                                <th>Created At</th>
                                <th>Created Id</th>
                                <th>Created By</th>
                                <th>Updated At</th>
                                <th>Updated Id</th>
                                <th>Updated By</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($redeemCodes as $key => $redeemCode)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $redeemCode->id }}</td>
                                    <td class="data-medium" data-toggle="tooltip" data-placement="top"
                                        title="{{ $redeemCode->code }}">
                                        {!! \Str::limit($redeemCode->code, 30) !!}
                                    </td>
                                    <td>{{ $redeemCode->quota }}</td>
                                    <td>{{ $redeemCode->type }}</td>
                                    <td>{{ $redeemCode->expired_date }}</td>
                                    <td class="data-long" data-toggle="tooltip" data-placement="top"
                                        title="{!! strip_tags($redeemCode->description) !!}">
                                        {!! !empty($redeemCode->description) ? \Str::limit($redeemCode->description, 30) : '-' !!}
                                    </td>
                                    <td>{{ $redeemCode->created_at }}</td>
                                    <td>{{ $redeemCode->created_id }}</td>
                                    <td>{{ $redeemCode->userCreated->name }}</td>
                                    <td>{{ $redeemCode->updated_at }}</td>
                                    <td>{{ $redeemCode->updated_id }}</td>
                                    <td>{{ $redeemCode->userUpdated->name }}</td>
                                    <td value="{{ $redeemCode->status }}">
                                        @if ($redeemCode->status == 1)
                                            <a class="btn btn-success" style="pointer-events: none;">Aktif</a>
                                        @else
                                            <a class="btn btn-danger" style="pointer-events: none;">Non Aktif</a>
                                        @endif
                                    </td>
                                    <td>
                                        {{-- <div class="btn-group"> --}}
                                        <a href="{{ route('getEditRedeemCode', ['id' => $redeemCode->id]) }}"
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
                                <th class="data-medium">Code</th>
                                <th>Quota</th>
                                <th>Type</th>
                                <th>Expired Date</th>
                                <th class="data-long">Description</th>
                                <th>Created At</th>
                                <th>Created Id</th>
                                <th>Created By</th>
                                <th>Updated At</th>
                                <th>Updated Id</th>
                                <th>Updated By</th>
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
        <a href="{{ route('getAddRedeemCode') }}" target="_blank" data-toggle="tooltip"
            title="Tambah Reedem Code">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <!-- FAB Add Ends -->
@endsection

@section('script')

@endsection
