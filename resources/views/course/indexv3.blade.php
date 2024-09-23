@extends('layout.main-v3')

@section('title', 'Course')

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
                        <li class="breadcrumb-item active">Course</li>
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
                    <h4 class="card-title">Course</h4>
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
                                <th class="course-name">Course Name</th>
                                <th>Promo Price</th>
                                <th>Price</th>
                                <th>Course Type</th>
                                <th class="short">Short Description</th>
                                <th class="desc">Description</th>
                                <th>Content</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->id }}</td>
                                    <td class="course-name" data-toggle="tooltip" data-placement="top"
                                        title="{{ $item->name }}">{{ $item->name }}</td>
                                    <td>{{ $item->fake_price ? 'Rp ' . number_format($item->fake_price, 0, ',', '.') : '-' }}
                                    </td>
                                    <td>{{ $item->price ? 'Rp ' . number_format($item->price, 0, ',', '.') : '-' }}</td>
                                    <td>
                                        @switch($item->m_course_type_id)
                                            @case(1)
                                                Bootcamp
                                            @break

                                            @case(2)
                                                Rapid Onboarding
                                            @break

                                            @case(3)
                                                Mini Bootcamp
                                            @break

                                            @case(4)
                                                Hackathon
                                            @break

                                            @case(5)
                                                Prakerja
                                            @break

                                            @case(6)
                                                MSIB
                                            @break

                                            @case(7)
                                                Upskilling
                                            @break

                                            @default
                                                -
                                        @endswitch
                                    </td>
                                    <td class="data-long" data-toggle="tooltip" data-placement="top"
                                        title="{!! strip_tags($item->short_description) !!}">
                                        {!! \Str::limit($item->short_description, 30) !!}
                                    </td>
                                    <td class="desc" data-toggle="tooltip" data-placement="top"
                                        title="{{ $item->description }}">{!! \Str::limit($item->description, 30) !!}</td>
                                    <td class="content" title="{{ $item->content }}">{{ $item->content }}</td>
                                    <td>{{ $item->created_at->format('Y-m-d H:i') }}</td>
                                    <td>{{ $item->updated_at->format('Y-m-d H:i') }}</td>
                                    <td>
                                        @if ($item->status == 1)
                                            <span class="btn btn-success disabled">Active</span>
                                        @else
                                            <span class="btn btn-success disabled">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{-- <div class="btn-group"> --}}
                                        <a href="{{ route('getEditCourse', ['id' => $item->id]) }}"
                                            class="btn btn-primary rounded">Edit</a>
                                        <a href="{{ route('getCourseModule', ['course_id' => $item->id, 'page_type' => 'LMS']) }}"
                                            class="btn btn-outline-primary rounded-end">Modules List</a>
                                        {{-- </div> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th>Course Name</th>
                                <th>Promo Price</th>
                                <th>Price</th>
                                <th>Course Type</th>
                                <th>Short Description</th>
                                <th>Description</th>
                                <th>Content</th>
                                <th>Created At</th>
                                <th>Updated At</th>
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
        <a href="{{ route('getAddCourse') }}" target="_blank">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <!-- FAB Add Ends -->
@endsection

@section('script')
    <!-- Add custom scripts here if needed -->
@endsection
