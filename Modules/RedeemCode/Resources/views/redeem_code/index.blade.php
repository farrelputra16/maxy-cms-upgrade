@extends('layout.main-v3')

@section('title', 'Redeem Code')

@section('content')
    <!-- Start Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Overview</h4>

                <!-- Start Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Transaction</a></li>
                        <li class="breadcrumb-item active">Redeem Codes</li>
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
                    <h4 class="card-title">Redeem Codes</h4>
                    <p class="card-title-desc">
                        This page shows the list of redeem codes. You can create and manage a redeem code, including
                        assigning redeemable classes to a redeem code.
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100"
                        data-server-processing="true" data-url="{{ route('redeemCode.getData') }}"
                        data-colvis="[1, -3, -4, -5, -6]" data-order-by="7">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th class="data-medium">Code</th>
                                <th>Quota</th>
                                <th>Expiration Date</th>
                                <th class="data-long">Admin Notes</th>
                                <th>Created At</th>
                                <th>Created By</th>
                                <th>Updated At</th>
                                <th>Updated By</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th class="data-medium">Code</th>
                                <th>Quota</th>
                                <th>Expiration Date</th>
                                <th class="data-long">Admin Notes</th>
                                <th>Created At</th>
                                <th>Created By</th>
                                <th>Updated At</th>
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
    <!-- end content -->

    <!-- start add course button -->
    @if (Session::has('access_master') &&
            Session::get('access_master')->contains('access_master_name', 'redeem_code_create'))
        <div id="floating-whatsapp-button">
            <a href="{{ route('redeemCode.getAdd') }}">
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
                name: "id",
                orderable: true,
                searchable: true
            },
            {
                data: "name",
                name: "name",
                orderable: true,
                searchable: true
            },
            {
                data: "quota",
                name: "quota",
                orderable: true,
                searchable: true
            },
            {
                data: "expired_date",
                name: "expired_date",
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
                name: "created_at",
                orderable: true,
                searchable: true
            },
            {
                data: "created_id",
                name: "created_id",
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
                data: "updated_id",
                name: "updated_id",
                orderable: true,
                searchable: true
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
