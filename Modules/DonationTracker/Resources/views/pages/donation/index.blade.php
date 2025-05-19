@extends('layout.main-v3')

@section('title', 'Donation Tracker')

@section('content')
    <!-- Start Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Overview</h4>

                <!-- Start Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">Donation Tracker</a></li>
                    </ol>
                </div>
                <!-- End Breadcrumb -->
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- Start Content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Donation Tracker</h4>
                    <p class="card-title-desc">
                        This page tracks the donation received by MAXY Academy. You can track the total received and
                        allocated funds.
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100"
                        data-server-processing="true" data-url="{{ route('donation.getData') }}"
                        data-colvis="[1, -3, -4, -5, -6]">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Value</th>
                                <th>Allocated Funds</th>
                                <th>Remaining Funds</th>
                                <th>Donated By</th>

                                <th class="data-long">Admin Notes</th>
                                <th>Created At</th>
                                <th>Created Id</th>
                                <th>Updated At</th>
                                <th>Updated Id</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Value</th>
                                <th>Allocated Funds</th>
                                <th>Remaining Funds</th>
                                <th>Donated By</th>

                                <th class="data-long">Admin Notes</th>
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
    <!-- end content -->

    <!-- start add course button -->
    @if (Session::has('access_master') && Session::get('access_master')->contains('access_master_name', 'donation_all_funds_create'))
        <div id="floating-whatsapp-button">
            <a href="{{ route('donation.getAdd') }}">
                <i class="fas fa-plus"></i>
            </a>
        </div>
    @endif
    <!-- end add course button -->
@endsection

@section('script')
    <script>
        const columns = [{
                data: "DT_RowIndex",
                name: "DT_RowIndex",
                orderable: false,
                searchable: false
            },
            {
                data: "id",
                name: "id"
            },
            {
                data: "name",
                name: "name",
                orderable: true,
                searchable: true
            },
            {
                data: "value",
                name: "value",
                orderable: true,
                searchable: true
            },
            {
                data: "allocated_funds",
                name: "allocated_funds",
                orderable: true,
                searchable: true
            },
            {
                data: "remaining_funds",
                name: "remaining_funds",
                orderable: true,
                searchable: true
            },
            {
                data: "donated_by",
                name: "donated_by",
                orderable: true,
                searchable: true
            },
            {
                data: "description",
                name: "description",
                orderable: true,
                searchable: true
            },
            {
                data: "created_at",
                name: "created_at"
            },
            {
                data: "created_id",
                name: "created_id"
            },
            {
                data: "updated_at",
                name: "updated_at"
            },
            {
                data: "updated_id",
                name: "updated_id"
            },
            {
                data: "status",
                name: "status",
                orderable: true,
                searchable: true
            },
            {
                data: "action",
                name: "action",
                orderable: false,
                searchable: false
            },
        ];
    </script>
@endsection
