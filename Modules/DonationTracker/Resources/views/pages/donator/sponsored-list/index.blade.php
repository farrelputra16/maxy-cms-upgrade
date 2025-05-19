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
                    <h4 class="card-title">{{ $user->name }}'s Fund Overview</h4>
                    <p class="card-title-desc">
                        This page shows all the donators of MAXY Academy. You can manage their shortlist by clicking on a
                        data row's shortlist button located on the right side of the table.
                    </p>
                    <p><strong>Total Donation:</strong> IDR {{ number_format($totalDonation, 0, ',', '.') }}</p>
                    <p><strong>Allocated Funds:</strong> IDR {{ number_format($totalAllocated, 0, ',', '.') }}</p>
                    <p><strong>Remaining Funds:</strong> IDR {{ number_format($remainingFund, 0, ',', '.') }}</p>


                    @php
                        $percentage = $totalDonation > 0 ? ($totalAllocated / $totalDonation) * 100 : 0;
                    @endphp

                    <div class="progress" style="height: 25px;">
                        <div class="progress-bar" role="progressbar" style="width: {{ $percentage }}%;"
                            aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="100">
                            {{ number_format($percentage, 2) }}%
                        </div>
                    </div>




                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100"
                        data-server-processing="true"
                        data-url="{{ route('donator.sponsored-list.getData', ['id' => $id]) }}"
                        data-colvis="[1, -3, -4, -5, -6]">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Funded</th>

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
                                <th>Funded</th>

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
    @if (Session::has('access_master') &&
            Session::get('access_master')->contains('access_master_name', 'donator_sponsoredlist_create'))
        <div id="floating-whatsapp-button">
            <a href="{{ route('donator.sponsored-list.getAdd', ['id' => $id]) }}">
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
