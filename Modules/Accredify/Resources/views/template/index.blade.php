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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item active">Course</li>
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

                    @if(count($data) > 0)
                    <!-- Display as DataTable -->
                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100" data-colvis="[0]">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>No</th>
                                <th>Issuer</th>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Schema</th>
                                <th>Template</th>
                                <th>Email Template</th>
                                <th>Sharing</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $course)
                                <tr>
                                    <td>{{ $course['id'] ?? 'N/A' }}</td>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $course['issuer']['name'] ?? 'N/A' }}</td>
                                    <td>{{ $course['course_code'] ?? 'N/A' }}</td>
                                    <td>{{ $course['course_title'] ?? 'N/A' }}</td>
                                    <td>{{ isset($course['course_description']) ? strip_tags($course['course_description']) : 'N/A' }}</td>
                                    <td>{{ $course['schema'] ?? 'N/A' }}</td>
                                    <td>{{ $course['template'] ?? 'N/A' }}</td>
                                    <td>{{ $course['email_template']['name'] ?? 'N/A' }}</td>
                                    <td>{{ ($course['sharing']['share_enabled'] ?? 0) == 1 ? 'Yes' : 'No' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>No</th>
                                <th>Issuer</th>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Schema</th>
                                <th>Template</th>
                                <th>Email Template</th>
                                <th>Sharing</th>
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
