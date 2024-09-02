@extends ('layout.main-v3')

@section('title', 'Grade Assignment')

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
                        <li class="breadcrumb-item active">Submission List</li>
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

            <!-- start card -->
            <div class="card">

                <!-- start card content -->
                <div class="card-body">
                    <h4 class="card-title">Select Class</h4>

                    <!-- start class selection -->
                    <form action="{{ route('getGrade') }}" method="GET">
                        @csrf
                        <div class="row">
                            <div class="col-10">
                                <select class="form-control select2 w-100" name="class_id"
                                    data-placeholder="Select Class ...">
                                    @foreach ($class_list as $item)
                                        <option value="{{ $item->class_id }}"
                                            @if ($class_id == $item->class_id) selected @endif>
                                            {{ $item->course_name }} - Batch {{ $item->batch }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-2 d-flex align-items-center justify-content-end">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                    <!-- end class selection -->

                </div>
            </div>


            <!-- start DataTables card -->
            <div class="card">

                <!-- start DataTables card content -->
                <div class="card-body">
                    <h4 class="card-title">Grade Assignment</h4>
                    <p class="card-title-desc">
                        This page presents a comprehensive overview of all available data, displayed in an interactive
                        and sortable DataTable format. Each row represents a unique data, providing key details such as
                        name, description, and status. Utilize the <b>column visibility, sorting, and column
                            search bar</b> features to
                        customize your view and quickly access the specific information you need.
                    </p>

                    <!-- start assignment DataTables -->
                    @if (count($data) > 0)
                        <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Id</th>
                                    <th>Module</th>
                                    <th>Day</th>
                                    <th>Student Name</th>
                                    <th>Submitted File</th>
                                    <th>Submitted At</th>
                                    <th>Grade</th>
                                    <th>Updated At</th>
                                    <th>Student Comment</th>
                                    <th>Tutor Comment</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php $data_index = 0; @endphp
                                @foreach ($data as $item)
                                    @foreach ($item->member_list as $key => $member)
                                        @php $data_index += 1; @endphp

                                        <tr>
                                            <td>
                                                @php
                                                    $number = $data_index;
                                                    if ($data_index < 10) {
                                                        $number = '0' . $data_index;
                                                    }
                                                    echo $number;
                                                @endphp
                                            </td>
                                            <td>
                                                @php
                                                    if (isset($member->submission)) {
                                                        $number = $member->submission->id;
                                                        if ($member->submission->id < 10) {
                                                            $number = '0' . $member->submission->id;
                                                        }
                                                        echo $number;
                                                    } else {
                                                        echo '-';
                                                    }
                                                @endphp
                                            </td>
                                            <td class="data-medium" data-toggle="tooltip" data-placement="top"
                                                title="{{ $item->module_name }}">
                                                {!! \Str::limit($item->module_name, 30) !!}
                                            </td>
                                            <td>
                                                @php
                                                    if (isset($item->parent->priority)) {
                                                        $number = $item->parent->priority;
                                                        if ($item->parent->priority < 10) {
                                                            $number = '0' . $item->parent->priority;
                                                        }
                                                        echo $number;
                                                    } else {
                                                        echo '-';
                                                    }
                                                @endphp
                                            </td>
                                            <td>{{ $member->user_name }}</td>
                                            <td>{{ $member->submission->submitted_file ?? '-' }}</td>
                                            <td>{{ $member->submission->submitted_at ?? '-' }}</td>
                                            <td>{{ $member->submission->grade ?? '-' }}</td>
                                            <td>{{ $member->submission->updated_at ?? '-' }}</td>
                                            <td class="data-long" data-toggle="tooltip" data-placement="top"
                                                title="@if ($member->submission) {!! strip_tags($member->submission->comment) !!} @else - @endif">
                                                {!! !empty($member->submission->comment) ? \Str::limit(strip_tags($member->submission->comment), 30) : '-' !!}
                                            </td>
                                            <td class="data-long" data-toggle="tooltip" data-placement="top"
                                                title="@if ($member->submission) {!! strip_tags($member->submission->tutor_comment) !!} @else - @endif">
                                                {!! !empty($member->submission->tutor_comment)
                                                    ? \Str::limit(strip_tags($member->submission->tutor_comment), 30)
                                                    : '-' !!}
                                            </td>
                                            <td>
                                                @if (isset($member->submission))
                                                    @if ($member->submission->grade)
                                                        <div class="badge bg-success">Graded</div>
                                                    @else
                                                        <div class="badge bg-warning">Submitted for Grading</div>
                                                    @endif
                                                @else
                                                    <div class="badge bg-danger">No Submission</div>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($member->submission)
                                                    <a href="{{ route('getEditGrade', ['id' => $member->submission->id]) }}"
                                                        class="btn btn-success btn-sm">Edit</a>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Id</th>
                                    <th class="data-medium">Module</th>
                                    <th>Day</th>
                                    <th>Student Name</th>
                                    <th>Submitted File</th>
                                    <th>Submitted At</th>
                                    <th>Grade</th>
                                    <th>Updated At</th>
                                    <th class="data-long">Student Comment</th>
                                    <th class="data-long">Tutor Comment</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    @else
                        <p class="text-center text-muted">please select a class first...</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
    <!-- end content -->

    <!-- FAB add starts -->
    <div id="floating-whatsapp-button">
        <a href="{{ route('getAddBlog') }}" target="_blank">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <!-- FAB add ends -->

@endsection

@section('script')

@endsection
