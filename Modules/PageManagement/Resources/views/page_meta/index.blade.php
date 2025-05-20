@extends('layout.main-v3')

@section('title', 'Courses')

@section('content')
    <!-- begin page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Overview</h4>

                <!-- begin breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Page Management</a></li>
                        <li class="breadcrumb-item active">Page</li>
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

                    <h4 class="card-title">Course Overview</h4>
                    <p class="card-title-desc">
                        This page presents a comprehensive overview of all available data, displayed in an interactive
                        and sortable DataTable format. Each row represents a unique data, providing key details such as
                        name, description, and status. Utilize the <b>column visibility, sorting, and column
                            search bar</b> features to
                        customize your view and quickly access the specific information you need.
                    </p>

                    @if (count($data) > 0)
                        <!-- Display as DataTable -->
                        <table id="datatable" class="table table-bordered dt-responsive nowrap w-100" data-colvis="[0, -3, -4, -5, -6]">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Title</th>
                                    <th>Favicon</th>
                                    <th class="data-long">GTM</th>
                                    <th class="data-long">GA ID</th>
                                    <th class="data-long">Additional Scripts</th>
                                    <th class="data-long">Custom CSS</th>
                                    <th class="data-long">Header Code</th>
                                    <th class="data-long">Footer Code</th>
                                    <th class="data-long">Social Image</th>
                                    <th class="data-long">Description</th>
                                    <th>Created At</th>
                                    <th>Created By</th>
                                    <th>Updated At</th>
                                    <th>Updated By</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $item)
                                    <tr>
                                        <td>{{ $item->id ?? 'N/A' }}</td>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->name ?? 'N/A' }}</td>
                                        <td>{{ $item->slug ?? 'N/A' }}</td>
                                        <td>{{ $item->title ?? 'N/A' }}</td>
                                        <td>{{ $item->favicon_url ?? 'N/A' }}</td>
                                        <td class="data-long" data-toggle="tooltip" data-placement="top"
                                            title="{!! strip_tags($item->google_tag_manager) !!}">
                                            {!! !empty($item->google_tag_manager) ? \Str::limit($item->google_tag_manager, 30) : '-' !!}
                                        </td>
                                        <td>{{ $item->google_analytics_id ?? 'N/A' }}</td>
                                        <td class="data-long" data-toggle="tooltip" data-placement="top"
                                            title="{!! strip_tags($item->additional_scripts) !!}">
                                            {!! !empty($item->additional_scripts) ? \Str::limit($item->additional_scripts, 30) : '-' !!}
                                        </td>
                                        <td class="data-long" data-toggle="tooltip" data-placement="top"
                                            title="{!! strip_tags($item->custom_css) !!}">
                                            {!! !empty($item->custom_css) ? \Str::limit($item->custom_css, 30) : '-' !!}
                                        </td>
                                        <td class="data-long" data-toggle="tooltip" data-placement="top"
                                            title="{!! strip_tags($item->header_code) !!}">
                                            {!! !empty($item->header_code) ? \Str::limit($item->header_code, 30) : '-' !!}
                                        </td>
                                        <td class="data-long" data-toggle="tooltip" data-placement="top"
                                            title="{!! strip_tags($item->footer_code) !!}">
                                            {!! !empty($item->footer_code) ? \Str::limit($item->footer_code, 30) : '-' !!}
                                        </td>
                                        <td>{{ $item->social_image_url ?? 'N/A' }}</td>
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
                                            <a href="{{ route('pageManagement.page.getEdit', ['id' => $item->id]) }}"
                                                class="btn btn-primary rounded">Edit</a>
                                            <a href="{{ route('pageManagement.pageMeta.index') }}"
                                                class="btn btn-info rounded">Meta</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Title</th>
                                    <th>Favicon</th>
                                    <th>GTM</th>
                                    <th>GA ID</th>
                                    <th>Custom CSS</th>
                                    <th>Header Code</th>
                                    <th>Footer Code</th>
                                    <th>Social Image</th>
                                    <th>Description</th>
                                    <th>Created At</th>
                                    <th>Created By</th>
                                    <th>Updated At</th>
                                    <th>Updated By</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    @else
                        <p>No data available.</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
    <!-- end content -->
@endsection

@section('script')

@endsection
