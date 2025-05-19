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
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Donation Tracker</a></li>
                        <li class="breadcrumb-item active">Donators</li>
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
                    <h4 class="card-title">Donators</h4>
                    <p class="card-title-desc">
                        This page shows all the donators of MAXY Academy. You can manage their shortlist by clicking on a
                        data row's shortlist button located on the right side of the table.
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100"
                        data-server-processing="true" data-url="{{ route('donator.getData') }}" data-colvis="[1, -2]">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th>Name</th>

                                <th>Total Donation</th>
                                <th>Allocated Funds</th>
                                <th>Remaining Funds</th>

                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th>Name</th>

                                <th>Total Donation</th>
                                <th>Allocated Funds</th>
                                <th>Remaining Funds</th>

                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- end content -->
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
                data: "total_donation",
                name: "total_donation",
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
                data: "updated_at",
                name: "updated_at",
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
