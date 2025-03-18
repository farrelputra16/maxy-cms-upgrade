@extends('layout.main-v3')

@section('title', 'Dashboard')

@section('content')
    <!-- Start Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- Start Row -->
    <div class="row">

        <div class="col-xl-8">
            <!-- Start Profile Card -->
            <div class="card overflow-hidden">
                <div class="bg-primary-subtle">
                    <div class="row">
                        <div class="col-7">
                            <div class="text-primary p-3">
                                <h5 class="text-primary">Welcome Back!</h5>
                                <p>MAXY CMS Dashboard</p>
                            </div>
                        </div>
                        <div class="col-5 align-self-end">
                            <img src="{{ asset('jago-digital/assets/images/profile-img.png') }}" alt=""
                                class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="avatar-md profile-user-wid mb-4">
                                @if (auth()->user()->profile_picture)
                                    <img src="{{ asset('uploads/' . auth()->user()->profile_picture) }}"
                                        alt="{{ auth()->user()->name }} profile"
                                        class="img-thumbnail rounded-circle d-inline-block w-100 h-100">
                                @else
                                    <img src="{{ asset('img/default_profile.png') }}" alt=""
                                        class="img-thumbnail rounded-circle">
                                @endif
                            </div>
                            <h5 class="font-size-15 text-truncate">{{ auth()->user()->name }}</h5>
                            <p class="text-muted mb-0 text-truncate">
                                You are logged in as <strong>{{ $admin->accessGroup->name }}</strong> account
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Profile Card -->
        </div>
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Start Row -->
    <div class="row">

        <!-- Start Col 1 -->
        <div class="col-xl-8">
            <!-- Start Total Count Items -->
            <div class="container py-4">
                <h4 class="card-title mb-4">Total</h4>
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="mini-stats-wid card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">Students</p>
                                        <h4 class="mb-0" id="student_total">
                                            {{ number_format($studentCount, 0, ',', '.') }}</h4>
                                    </div>
                                    <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                        <span class="avatar-title rounded-circle bg-primary">
                                            <i class="fas fa-id-badge font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mini-stats-wid card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">Universities</p>
                                        <h4 class="mb-0" id="university_total">
                                            {{ number_format($universityCount, 0, ',', '.') }}</h4>
                                    </div>
                                    <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                        <span class="avatar-title rounded-circle bg-primary">
                                            <i class="fas fa-school font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mini-stats-wid card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">Companies</p>
                                        <h4 class="mb-0" id="company_total">
                                            {{ number_format($companyCount, 0, ',', '.') }}</h4>
                                    </div>
                                    <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                        <span class="avatar-title rounded-circle bg-primary">
                                            <i class="fas fa-building font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Total Count Items -->

            <!-- Start Partnership Expiring Soon -->
            <div class="container py-4">
                <h4 class="card-title mb-4">Partnerships <strong class="text-danger">expiring soon</strong></h4>
                <div class="card">
                    <div class="card-body" style="height: 100%;">
                        <div class="boxActive box">
                            @if ($partnerships->isEmpty())
                                <div class="alert alert-info text-center" role="alert">
                                    No partnership is expiring soon.
                                </div>
                            @else
                                <table id="table" class="tableActive table-striped" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th class="ticlass" style="width: 50%; text-align: left;">Partner</th>
                                            <th class="tibatch" style="width: 20%;">Type</th>
                                            <th class="tiaction" style="width: 30%; text-align: right;">Expired Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($partnerships as $record)
                                            <tr>
                                                <td>{{ $record->Partner->name }}</td>
                                                <td>{{ $record->MPartnershipType->name }}</td>
                                                <td style="text-align: right">
                                                    {{ \Carbon\Carbon::parse($record->date_end)->format('Y-m-d') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Partnership Expiring Soon -->
        </div>
        <!-- End Col 1 -->

        <!-- Start Col 2 -->
        <div class="col-xl-4">

            <!-- Start Ongoing Class List -->
            <div class="container py-4">
                <h4 class="card-title mb-4">Ongoing Classes</h4>
                <div class="card overflow-y-scroll" style="height: 380px;">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0 table">
                                <thead>
                                    <tr>
                                        <th>Class</th>
                                        <th>Batch</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($active_class_list as $class)
                                        <tr>
                                            <td>{{ $class->course_name }}</td>
                                            <td>{{ $class->batch }}</td>
                                            <td>
                                                <a href="{{ route('getCourseClassModule', ['id' => $class->id, 'batch' => $class->batch]) }}"
                                                    class="btn btn-primary waves-effect waves-light">Detail</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Ongoing Class List -->

        </div>
        <!-- End Col 2 -->
    </div>




    </div>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var activeEvents = @json($activeEvents);
            var activePartnerships = @json($activePartnerships);

            var eventDatas = [];

            // Loop untuk menambahkan activeEvents
            activeEvents.forEach(function(event) {
                eventDatas.push({
                    title: event.name.slice(0, 30) + '...',
                    start: new Date(event.date_start).toISOString().split('T')[0],
                    end: new Date(event.date_end).toISOString().split('T')[0],
                    message: "<strong>Acara:</strong> " + event.name + "<br/>" +
                        "<strong>Tanggal Mulai:</strong> " + event.date_start + "<br/>" +
                        "<strong>Tanggal Selesai:</strong> " + event.date_end,
                });
            });

            // Loop untuk menambahkan activePartnerships, yang hanya membutuhkan end date
            activePartnerships.forEach(function(partnership) {
                eventDatas.push({
                    title: partnership.m_partnership_type.name + ' - ' + partnership.partner.name,
                    start: partnership.date_end,
                    backgroundColor: '#B22222',
                    message: "<strong>Mitra:</strong> " + partnership.partner.name + "<br/>" +
                        "<strong>Tipe Kemitraan:</strong> " + partnership.m_partnership_type.name +
                        "<br/>" +
                        "<strong>Tanggal Berakhir:</strong> " + partnership.date_end,
                });
            });

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next',
                    center: 'title',
                    right: 'today'
                },
                editable: false,
                events: eventDatas,
                eventClick: function(info) {
                    // Menampilkan informasi ketika event diklik
                    var eventInfo = info.event;
                    Swal.fire({
                        title: 'Informasi',
                        html: eventInfo.extendedProps.message,
                        icon: 'info',
                        confirmButtonText: 'OK',
                    });
                },
                dateClick: function(info) {
                    alert('Tanggal: ' + info.dateStr);
                }
            });

            calendar.render();
        });
    </script>

@endsection
