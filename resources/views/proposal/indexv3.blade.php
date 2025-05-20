@extends('layout.main-v3')

@section('title', 'Proposal')

@section('content')
    <!-- Begin Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Overview</h4>

                <!-- Begin Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Mahasiswa</a></li>
                        <li class="breadcrumb-item active">Proposal</li>
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
                    <h4 class="card-title">Proposal</h4>
                    <p class="card-title-desc">
                        Halaman ini menampilkan table untuk melakukan manajemen proposal.
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100"
                        data-server-processing="true" data-url="{{ route('getProposalData') }}"
                        data-no-status="true"
                        data-colvis="[1, -3, -4, -5, -6]">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th class="data-medium">Name</th>
                                <th class="data-medium">Title</th>
                                <th>Proposal</th>
                                <th>Created At</th>
                                <th>Created By</th>
                                <th>Updated At</th>
                                <th>Updated By</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">Name</th>
                                <th class="data-medium">Title</th>
                                <th>Proposal</th>
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
    <!-- End Content -->
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
            data: "user_name",
            name: "user_name",
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
            data: "proposal",
            name: "proposal",
            orderable: true,
            searchable: true
        },
        {
            data: "created_at",
            name: "created_at",
            orderable: true,
            searchable: false
        },
        {
            data: "created_id",
            name: "created_id",
            orderable: false,
            searchable: false
        },
        {
            data: "updated_at",
            name: "updated_at",
            orderable: true,
            searchable: false
        },
        {
            data: "updated_id",
            name: "updated_id",
            orderable: false,
            searchable: false
        },
        {
            data: "proposal_status", // Changed from 'status'
            name: "proposal_status",
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
