@extends('layout.main-v3')

@section('title', 'Course Module')

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
                        <li class="breadcrumb-item"><a href="{{ route('getCourse')}}">Course</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getCourseModule', ['course_id' => $parent_module_detail->course_id, 'page_type' => 'LMS'])}}">Course Module</a></li>
                        <li class="breadcrumb-item active">Course Child: {{ $parent_module_detail->name }}</li>
                    </ol>
                </div>
                <!-- End Breadcrumb -->
            </div>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    <!-- End Page Title -->

    <!-- Begin Content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Course Child Module: {{ $parent_module_detail->name }}</h4>
                    <p class="card-title-desc">
                        This page presents a comprehensive overview of all available data, displayed in an interactive
                        and sortable DataTable format. Each row represents a unique data, providing key details such as
                        name, description, and status. Utilize the <b>column visibility, sorting, and column search bar</b> features to
                        customize your view and quickly access the specific information you need.
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">Module Name</th>
                                <th>Priority</th>
                                <th>Type</th>
                                <th>Material</th>
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
                            @foreach ($sub_modules as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->id }}</td>

                                <td class="data-medium" data-toggle="tooltip" data-placement="top"
                                        title="{{ $item->name }}">
                                        {!! \Str::limit($item->name, 30) !!}
                                    </td>

                                <td>{{ $item->priority }}</td>
                                <td>{{ $item->type }}</td>
                                <td>{{ $item->material }}</td>
                                <td class="data-long" data-toggle="tooltip" data-placement="top"
                                title="{!! strip_tags($item->description) !!}">
                                {!! !empty($item->description) ? \Str::limit($item->description, 30) : '-' !!}
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
                                    {{-- <div class="btn-group"> --}}
                                        <a href="{{ route('getEditChildModule', ['id' => $item->id]) }}" class="btn btn-primary rounded">Edit</a>
                                        @if ($item->type == 'Quiz')
                                        <a href="{{ route('getCMQuiz', ['id' => $item->id]) }}" class="btn btn-info">Questions</a>
                                        @elseif ($item->type == 'form')
                                        <a href="{{ route('getCMForm', ['id' => $item->id]) }}" class="btn btn-info">Questions</a>
                                        @endif
                                    {{-- </div> --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">Module Name</th>
                                <th>Priority</th>
                                <th>Type</th>
                                <th>Material</th>
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
    <!-- End Content -->

    <!-- FAB Add Starts -->
    <div id="floating-whatsapp-button">
        <a href="{{ route('getAddCourseChildModule', ['id' => $parent_module_detail->id, 'course_id' => $course_detail->id, 'page_type' => $page_type]) }}" target="_blank">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <!-- FAB Add Ends -->
@endsection

@section('script')

@endsection
