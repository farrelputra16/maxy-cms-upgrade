@extends('layout.main-v3')

@section('title', 'Course Type')

@section('content')
    <!-- begin page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Overview</h4>

                <!-- begin breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item active">Course Type</li>
                    </ol>
                </div>
                <!-- end breadcrumb -->
            </div>
        </div>
    </div>
    <!-- end page title -->

    <!-- begin content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Course Type</h4>
                    <p class="card-title-desc">
                        This page presents a comprehensive overview of all available data, displayed in an interactive
                        and sortable DataTable format. Each row represents a unique data, providing key details such as
                        name, description, and status. Utilize the <b>column visibility, sorting, and column
                            search bar</b> features to
                        customize your view and quickly access the specific information you need.
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">Name</th>
                                <th>Slug</th>
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
                            @foreach ($mCourseType as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->slug }}</td>
                                    <td class="data-long" data-toggle="tooltip" data-placement="top"
                                        title="{{ strip_tags($item->description) }}">
                                        {{ !empty($item->description) ? \Str::limit(strip_tags($item->description), 30) : '-' }}
                                    </td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->created_id }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                    <td>{{ $item->updated_id }}</td>
                                    <td value="{{ $item->status }}">
                                        @if ($item->status == 1)
                                            <a class="btn btn-success disabled">Aktif</a>
                                        @else
                                            <a class="btn btn-danger disabled">Non Aktif</a>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('getEditCourseType', ['id' => $item->id, 'access' => 'm_course_type_update']) }}"
                                                class="btn btn-primary rounded">Edit</a>
                                            <!-- <a href="{{ route('getCourseClassChildModule', ['id' => $item->id]) }}" class="btnModul">Sertifikat Template</a> -->
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">Name</th>
                                <th>Slug</th>
                                <th class="data-long">Description</th>
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

    <!-- FAB add starts -->
    <div id="floating-whatsapp-button">
        <a href="{{ route('getAddCourseType', ['access' => 'm_course_type_create']) }}" target="_blank">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <!-- FAB add ends -->
@endsection

@section('script')


@endsection
