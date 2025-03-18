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
                        <li class="breadcrumb-item active">Class List: {{ $data->name }}</li>
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
                    <h4 class="card-title">Class List: {{$data->name}} <small>[ #{{ $data->code }} ]</small></h4>
                    <p class="card-title-desc">
                        This page shows the class list of a redeem code. You can manage what class can be claimed using the
                        current redeem code.
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100"
                        data-server-processing="true" data-url="{{ route('redeemCode.class.getData', ['id' => $data->id]) }}"
                        data-colvis="[1]" data-order-by="1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Batch</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Batch</th>
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
            <a href="{{ route('redeemCode.class.getAdd', ['id' => $data->id]) }}">
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
                data: "class_name",
                name: "class_name",
                orderable: true,
                searchable: true
            },
            {
                data: "batch",
                name: "batch",
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
