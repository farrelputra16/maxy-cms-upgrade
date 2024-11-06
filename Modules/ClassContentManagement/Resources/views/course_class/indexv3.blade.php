@extends('layout.main-v3')

@section('title', 'Course Class')

@section('content')
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <!-- Begin Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Overview</h4>

                <!-- Begin Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Master</a></li>
                        <li class="breadcrumb-item active">Course Class</li>
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
                    <h4 class="card-title">Class</h4>
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
                                <th class="class">Batch</th>
                                <th class="type">Type</th>
                                <th>Ongoing</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Quota</th>
                                <th>Credits</th> <!-- New Column -->
                                <th>Duration</th> <!-- New Column -->
                                <th class="data-long">Announcement</th>
                                <th class="data-long">Content</th>
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
                            @foreach ($course_list as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->id }}</td>
                                    <td class="batch" scope="row">{{ $item->course_name }} Batch {{ $item->batch }}
                                    </td>
                                    <td>{{ $item->type }} </td>
                                    <td>
                                        @if ($item->status_ongoing == 1)
                                            <button class="btn btn-success" style="pointer-events: none;">Yes</button>
                                        @else
                                            <button class="btn btn-danger" style="pointer-events: none;">No</button>
                                        @endif
                                    </td>
                                    <td>{{ $item->start_date }}</td>
                                    <td>{{ $item->end_date }}</td>
                                    <td>{{ $item->quota }}</td>
                                    <td>{{ $item->credits }}</td> <!-- New Column Data -->
                                    <td>{{ sprintf('%02d:00:00', $item->duration) }}</td> <!-- New Column Data -->
                                    <td class="data-long" data-toggle="tooltip" data-placement="top"
                                        title="{!! strip_tags($item->announcement) !!}">
                                        {!! !empty($item->announcement) ? \Str::limit(strip_tags($item->content), 30) : '-' !!}
                                    </td>
                                    <td class="data-long" data-toggle="tooltip" data-placement="top"
                                        title="{!! strip_tags($item->content) !!}">
                                        {!! !empty($item->content) ? \Str::limit(strip_tags($item->content), 30) : '-' !!}
                                    </td>
                                    <td class="data-long" data-toggle="tooltip" data-placement="top"
                                        title="{!! strip_tags($item->description) !!}">
                                        {!! !empty($item->description) ? \Str::limit(strip_tags($item->content), 30) : '-' !!}
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
                                        <a href="{{ route('getEditCourseClass', ['id' => $item->id]) }}"
                                            class="btn btn-primary rounded">Edit</a>
                                        <a href="{{ route('getCourseClassModule', ['id' => $item->id]) }}"
                                            class="btn btn-info rounded">Module</a>
                                        <a href="{{ route('getCourseClassMember', ['id' => $item->id]) }}"
                                            class="btn btn-info rounded">Member</a>
                                        <a href="{{ route('getCourseClassAttendance', ['id' => $item->id]) }}"
                                            class="btn btn-outline-primary rounded">Attendence</a>
                                        <a href="{{ route('getCourseClassScoring', ['id' => $item->id]) }}"
                                            class="btn btn-outline-primary rounded">Scoring</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th>Batch</th>
                                <th>Type</th>
                                <th>Ongoing</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Quota</th>
                                <th>Credits</th> <!-- New Column Footer -->
                                <th>Duration</th> <!-- New Column Footer -->
                                <th>Announcement</th>
                                <th>Content</th>
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
    <div id="floating-whatsapp-button" style='margin-bottom: 5%;'>
        <a href="{{ route('getAddCourseClass') }}" target="_blank" data-toggle="tooltip" title="Add New Course Class">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <div id="floating-whatsapp-button">
        <a href="{{ route('getDuplicateCourseClass') }}" target="_blank" data-toggle="tooltip" title="Duplicate Course Class">
            <i class="fa-solid fa-copy"></i>
        </a>
    </div>
    <!-- FAB Add Ends -->
@endsection

@section('script')

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});

    @if(session('class_added'))
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                Swal.fire({
                    title: 'Information!',
                    html: "<strong>{{ session('class_added') }}</strong>",
                    icon: 'info',
                    confirmButtonText: 'OK',
                    // Optional: You can also add a cancel button if you want
                    // showCancelButton: true,
                    // cancelButtonText: 'Close',
                });
            });
        </script>
    @endif


@endsection
