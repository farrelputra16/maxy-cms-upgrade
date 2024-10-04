@extends('layout.main-v3')

@section('title', 'Course Package')

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
                        <li class="breadcrumb-item active">Course Package</li>
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
                    <h4 class="card-title">Course Package</h4>
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
                                <th class="data-medium">Package Name</th>
                                <th>Fake Price</th>
                                <th>Price</th>
                                <th>Payment Link</th>
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
                            @foreach ($coursePackages as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->id }}</td>
                                    <td class="package-name" data-toggle="tooltip" data-placement="top"
                                        title="{{ $item->name }}">{{ $item->name }}</td>
                                    <td>{{ $item->fake_price ? 'Rp ' . number_format($item->fake_price, 0, ',', '.') : '-' }}
                                    </td>
                                    <td>{{ $item->price ? 'Rp ' . number_format($item->price, 0, ',', '.') : '-' }}</td>
                                    <td id="payment_link">{{ $item->payment_link }}</td>
                                    <td class="data-long" data-toggle="tooltip" data-placement="top"
                                        title="{{ strip_tags($item->description) }}">
                                        {{ !empty($item->description) ? \Str::limit(strip_tags($item->description), 30) : '-' }}
                                    </td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->created_id }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                    <td>{{ $item->updated_id }}</td>
                                    <td>
                                        @if ($item->status == 1)
                                            <span class="btn btn-success disabled">Active</span>
                                        @else
                                            <span class="btn btn-danger disabled">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{-- <div class="btn-group"> --}}
                                        <a href="{{ route('getEditCoursePackage', ['id' => $item->id]) }}"
                                            class="btn btn-primary rounded">Edit</a>
                                        <a href="{{ route('getCoursePackageBenefit', ['course_id' => $item->id, 'page_type' => 'LMS']) }}"
                                            class="btn btn-outline-primary rounded-end">Benefit List</a>
                                        {{-- </div> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th>package Name</th>
                                <th>Fake Price</th>
                                <th>Price</th>
                                <th>PayMent Link</th>
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
        <a href="{{ route('getAddCoursePackage') }}" target="_blank">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <!-- FAB Add Ends -->
@endsection

@section('script')
    <!-- Add custom scripts here if needed -->
@endsection
