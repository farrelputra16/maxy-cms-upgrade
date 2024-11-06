@extends('layout.main-v3')

@section('title', 'Attendance')

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
                        <li class="breadcrumb-item"><a href="{{ route('getCourseClass') }}">Class</a></li>
                        <li class="breadcrumb-item"><a>Attendance</a></li>
                        <li class="breadcrumb-item active">Member Attendance</li>
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
                    <h4 class="card-title">Attendance {{ $class->course_name }} Batch {{ $class->batch }}</h4>
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
                                <th class="data-medium">Name</th>
                                <th class="data-medium">Feedback</th>
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
                            @foreach ($attendance as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->attendance ? $item->attendance->id : '-' }}</td>
                                    <td class="data-medium" data-toggle="tooltip" data-placement="top"
                                        title="{{ $item->user_name }}">
                                        {!! \Str::limit($item->user_name, 30) !!}
                                    </td>
                                    <td class="data-medium" data-toggle="tooltip" data-placement="top"
                                        title="{{ $item->attendance ? $item->attendance->feedback : '-' }}">
                                        {!! \Str::limit($item->attendance ? $item->attendance->feedback : '-', 30) !!}
                                    </td>
                                    <td class="data-long" data-toggle="tooltip" data-placement="top"
                                        title="{!! strip_tags($item->attendance ? $item->attendance->description : '-') !!}">
                                        {!! !empty($item->attendance) ? \Str::limit($item->attendance->description, 30) : '-' !!}
                                    </td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->created_id }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                    <td>{{ $item->updated_id }}</td>
                                    <td value="{{ $item->attendance ? $item->attendance->status : 0 }}">
                                        @if ($item->attendance)
                                            @if ($item->attendance->status == 0)
                                                <a class="btn btn-danger disabled">Tidak Hadir</a>
                                            @elseif ($item->attendance->status == 1)
                                                <a class="btn btn-primary disabled">Hadir</a>
                                            @elseif($item->attendance->status == 2)
                                                <a class="btn btn-warning disabled">Izin</a>
                                            @endif
                                        @else
                                            <a class="btn btn-danger disabled">Tidak Hadir</a>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->attendance)
                                            <a href="{{ route('getEditMemberAttendance', ['id' => $item->attendance->id, 'class_id' => $class->id, 'class_attendance_id' => $class_attendance_id]) }}"
                                                class="btn btn-primary">Edit</a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">Name</th>
                                <th class="data-medium">Feedback</th>
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

@endsection

@section('script')

@endsection
