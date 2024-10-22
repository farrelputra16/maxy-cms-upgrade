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
                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100" data-colvis="[]">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Course Code</th>
                                <th>Course Name</th>
                                <th>Issuance Type</th>
                                <th>Pending Actions</th>
                                <th>Total Issued</th>
                                <th>Last Updated</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $course)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $course['course_code'] ?? 'N/A' }}</td> <!-- Memeriksa apakah 'course_code' ada -->
                                    <td><a href="{{ route('courses.show', ['token' => $token, 'id' => $course['id']]) }}">{{ $course['course_title'] ?? 'N/A' }}</a></td>
                                    <td>{{ $course['issuance_type'] ?? 'N/A' }}</td> <!-- Memeriksa apakah 'issuance_type' ada -->

                                    <!-- Pastikan pending_actions adalah numerik dan lakukan cast ke integer -->
                                    <td>{{ is_numeric($course['pending_actions']) ? (int) $course['pending_actions'] : 0 }}</td>

                                    <!-- Pastikan total_issued adalah numerik dan lakukan cast ke integer -->
                                    <td><span class="badge bg-success">{{ is_numeric($course['total_issued']) ? (int) $course['total_issued'] : 0 }}</span></td>

                                    <td>
                                        @if(isset($course['last_updated']) && $course['last_updated'])
                                            {{ \Carbon\Carbon::parse($course['last_updated'])->format('j M Y, h:i:s A') }}
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Course Code</th>
                                <th>Course Name</th>
                                <th>Issuance Type</th>
                                <th>Pending Actions</th>
                                <th>Total Issued</th>
                                <th>Last Updated</th>
                            </tr>
                        </tfoot>
                    </table>
                    @else
                        <p>No data available.</p> <!-- Tambahkan fallback jika tidak ada data -->
                    @endif

                </div>
            </div>
        </div>
    </div>
    <!-- end content -->

    <!-- Floating Button -->
    <div id="floating-whatsapp-button">
        <a href="{{ route('courses.create', ['token' => $token]) }}" class="btn btn-success">
            <i class="fas fa-plus"></i> <!-- Or any other icon you are using -->
        </a>
    </div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#datatable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'colvis'
            ]
        });
    });

    console.log(@json($data));
</script>
@endsection
