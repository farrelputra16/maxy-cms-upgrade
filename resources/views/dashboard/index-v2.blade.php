@extends('layout.main-v3')

@section('title', 'Dasbor')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Dasbor</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Dasbor</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xl-8">
            <div class="">
                <div class="card overflow-hidden">
                    <div class="bg-primary-subtle">
                        <div class="row">
                            <div class="col-7">
                                <div class="text-primary p-3">
                                    <h5 class="text-primary">Selamat Datang Kembali!</h5>
                                    <p>Dasbor Admin CMS</p>
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
                                <p class="text-muted mb-0 text-truncate"> Role akun ini adalah:
                                    <strong>{{ $admin->accessGroup->name }}</strong>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <h4 class="card-title mb-4">Total</h4>
            <div class="container">
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="mini-stats-wid card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">Siswa</p>
                                        <h4 class="mb-0" id="student_total">
                                            {{ number_format($studentCount, 0, ',', '.') }}</h4>
                                    </div>
                                    <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                        <span class="avatar-title rounded-circle bg-primary">
                                            <i class="fa-solid fa-id-badge font-size-24"></i>
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
                                        <p class="text-muted fw-medium">Universitas</p>
                                        <h4 class="mb-0" id="university_total">
                                            {{ number_format($universityCount, 0, ',', '.') }}</h4>
                                    </div>
                                    <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                        <span class="avatar-title rounded-circle bg-primary">
                                            <i class="fa-solid fa-school font-size-24"></i>
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
                                        <p class="text-muted fw-medium">Perusahaan</p>
                                        <h4 class="mb-0" id="company_total">
                                            {{ number_format($companyCount, 0, ',', '.') }}</h4>
                                    </div>
                                    <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                        <span class="avatar-title rounded-circle bg-primary">
                                            <i class="fa-solid fa-building font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <h4 class="card-title mb-4">Daftar Kemitraan yang Akan Berakhir</h4>
            <div class="container">
                <div class="card">
                    <div class="card-body" style="height: 100%;">
                        <div class="boxActive box">
                            @if ($partnerships->isEmpty())
                                <div class="alert alert-info text-center" role="alert">
                                    Tidak ada kemitraan yang akan segera berakhir.
                                </div>
                            @else
                                <table id="table" class="tableActive table-striped" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th class="ticlass" style="width: 50%; text-align: left;">Mitra</th>
                                            <th class="tibatch" style="width: 20%;">Tipe</th>
                                            <th class="tiaction" style="width: 30%; text-align: right;">Tanggal Berakhir
                                            </th>
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
            <br>
            <div class="container">
                <div class="row g-4">
                    <div class="col-8">
                        <h4 class="card-title mb-4">Kelas Aktif</h4>
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table mb-0 table">
                                        <thead>
                                            <tr>
                                                <th>Kelas</th>
                                                <th>Paralel</th>
                                                <th>Aksi</th>
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
                    <div class="col-4">
                        <h4 class="card-title mb-4">Siswa</h4>
                        <div class="card">
                            <div class="card-body">
                                <div id="student-chart" style="height: 100%;"></div>
                                <div class="justify-content-center row">
                                    <div class="col-6 text-center">
                                        <h5 id="user-active" class="mb-0">{{ $activeStudentCount }}</h5>
                                        <p class="text-muted">Aktif</p>
                                    </div>
                                    <div class="col-6 text-center">
                                        <h5 id="user-inactive" class="mb-0">{{ $inactiveStudentCount }}</h5>
                                        <p class="text-muted">Tidak Aktif</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div id="calendar"></div>
                </div>
            </div>
            {{-- <div class="card">
                <div class="card-body">
                    <h5>Jadwal Hari Ini</h5>
                    <hr>
                    <div>
                        @if (isset($schedules) && $schedules->isNotEmpty())
                            @foreach ($schedules as $schedule)
                                <h6>{{ $schedule->title }}</h6>
                                <p>{{ \Carbon\Carbon::parse($schedule->time)->format('H:i') }}</p>
                                <hr>
                            @endforeach
                        @else
                            <p>Jadwal Anda hari ini kosong – tidak ada jadwal!</p>
                        @endif
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection

@section('script')

    <script>
        fetch('/student-status-data')
            .then(response => response.json())
            .then(data => {
                var active = data.active;
                var inactive = data.inactive;
                document.getElementById('user-active').innerText = data.active;
                document.getElementById('user-inactive').innerText = data.inactive;

                var options = {
                    series: [active, inactive],
                    chart: {
                        type: 'pie',
                        height: '100%',
                        width: '100%'
                    },
                    legend: {
                        position: 'bottom',
                        horizontalAlign: 'center'
                    },
                    labels: ['Aktif', 'Tidak Aktif'],
                    colors: ['#00E396', '#FF4560'],
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            chart: {
                                width: '100%'
                            },
                        }
                    }]
                };

                var chart = new ApexCharts(document.querySelector("#student-chart"), options);
                chart.render();
            })
            .catch(error => console.error('Error fetching data:', error));
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var userActive = document.getElementById('user-active');
            var userInactive = document.getElementById('user-inactive');
            var activeCount = parseInt(userActive.textContent);
            var inactiveCount = parseInt(userInactive.textContent);
            userActive.textContent = activeCount.toLocaleString('id-ID');
            userInactive.textContent = inactiveCount.toLocaleString('id-ID');
        });
    </script>

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

            console.log(eventDatas);

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
