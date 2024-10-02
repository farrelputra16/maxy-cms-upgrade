@extends('layout.main-v3')

@section('title', 'Dashboard | CMS Template')

@section('content')
    <!-- start page title -->
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
    <!-- end page title -->

    <div class="row">
        <div class="col-xl-8">
            <div class="">
                <div class="card overflow-hidden">
                    <div class="bg-primary-subtle">
                        <div class="row">
                            <div class="col-7">
                                <div class="text-primary p-3">
                                    <h5 class="text-primary">Welcome Back !</h5>
                                    <p>Agent CMS Dashboard</p>
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
                            <div class="col-sm-4">
                                <div class="avatar-md profile-user-wid mb-4">
                                    @if (auth()->user()->profile_picture)
                                        <img src="{{ asset('uploads/' . auth()->user()->profile_picture) }}" alt=""
                                            class="img-thumbnail rounded-circle">
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
                                        <p class="text-muted fw-medium">Student</p>
                                        <h4 class="mb-0">1,235</h4>
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
                                        <p class="text-muted fw-medium">University</p>
                                        <h4 class="mb-0">1,235</h4>
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
                                        <p class="text-muted fw-medium">Company</p>
                                        <h4 class="mb-0">1,235</h4>
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
            <h4 class="card-title mb-4">Partnership Expiring List</h4>
            <div class="container">
                <div class="card">
                    <div class="card-body" style="height: 100%;">
                        <div class="boxActive box">
                            @if ($partnerships->isEmpty())
                                <div class="alert alert-info text-center" role="alert">
                                    No partnerships are expiring soon.
                                </div>
                            @else
                                <table id="table" class="tableActive table-striped" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th class="ticlass" style="width: 50%; text-align: left;">Partner</th>
                                            <th class="tibatch" style="width: 20%;">Type</th>
                                            <th class="tiaction" style="width: 30%; text-align: right;">Expiry Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($partnerships as $record)
                                            <tr>
                                                <td>{{ $record->Partner->name }}</td>
                                                <td>{{ $record->MPartnershipType->name }}</td>
                                                <td>{{ \Carbon\Carbon::parse($record->date_end)->format('Y-m-d') }}</td>
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
                        <h4 class="card-title mb-4">Active Classes</h4>
                        <div class="card">
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
                                                    <td>
                                                        {{ $class->course_name }}
                                                    </td>
                                                    <td>
                                                        {{ $class->batch }}
                                                    </td>
                                                    <td>
                                                        <a href=""
                                                            class="btn btn-primary waves-effect waves-light btn btn-primary">Detail</a>
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
                        <h4 class="card-title mb-4">Students</h4>
                        <div class="card">
                            <div class="card-body">
                                <div id="student-chart" style="height: 100%;"></div>
                                <div class="justify-content-center row">
                                    <div class="col-sm-4 text-center">
                                        <h5 id="user-active" class="mb-0">879</h5>
                                        <p class="text-muted text-truncate">Active</p>
                                    </div>
                                    <div class="col-sm-4 text center">
                                        <h5 id="user-inactive"class="mb-0">23</h5>
                                        <p class="text-muted text-truncate">Inactive</p>
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
            <div class="card">
                <div class="card-body">
                    <h5>Schedule Today</h5>
                    <hr>
                    <div>
                        @if (isset($schedules) && $schedules->isNotEmpty())
                            @foreach ($schedules as $schedule)
                                <h6>{{ $schedule->title }}</h6>
                                <p>{{ \Carbon\Carbon::parse($schedule->time)->format('h:i A') }}</p>
                                <hr>
                            @endforeach
                        @else
                            <p>You're all clear today – no schedules!</p>
                            <!-- Menampilkan pesan jika schedules kosong -->
                        @endif
                    </div>
                </div>
            </div>
        @endsection

        @section('script')

            <script>
                // Ambil data dari endpoint untuk status mahasiswa
                fetch('/student-status-data')
                    .then(response => response.json())
                    .then(data => {
                        // Data yang diterima dari server
                        var active = data.active;
                        var inactive = data.inactive;
                        // Memasukkan data.active ke dalam elemen HTML dengan ID 'user-active'
                        document.getElementById('user-active').innerText = data.active;

                        // Memasukkan data.inactive ke dalam elemen HTML dengan ID 'user-inactive'
                        document.getElementById('user-inactive').innerText = data.inactive;

                        // ApexChart
                        var options = {
                            series: [active, inactive], // Data dari database (Active, Inactive)
                            chart: {
                                type: 'pie',
                                height: '100%', // Ubah ukuran tinggi chart
                                width: '100%' // Ubah ukuran lebar chart
                            },
                            legend: {
                                position: 'bottom',
                                horizontalAlign: 'center'
                            },
                            labels: ['Active', 'Inactive'],
                            colors: ['#00E396', '#FF4560'], // Warna untuk setiap bagian chart
                            responsive: [{
                                breakpoint: 480,
                                options: {
                                    chart: {
                                        width: '100%' // Lebar chart di layar kecil
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
                    // Ambil elemen yang berisi angka user active dan inactive
                    var userActive = document.getElementById('user-active');
                    var userInactive = document.getElementById('user-inactive');

                    // Ambil nilai asli dari elemen tersebut
                    var activeCount = parseInt(userActive.textContent);
                    var inactiveCount = parseInt(userInactive.textContent);

                    // Format angka dengan toLocaleString untuk menggunakan format Indonesia (id-ID)
                    userActive.textContent = activeCount.toLocaleString('id-ID');
                    userInactive.textContent = inactiveCount.toLocaleString('id-ID');
                });
            </script>

            <script>
                // calendar
                document.addEventListener('DOMContentLoaded', function() {
                    var calendarEl = document.getElementById('calendar');

                    var calendar = new FullCalendar.Calendar(calendarEl, {
                        initialView: 'dayGridMonth',
                        headerToolbar: {
                            left: 'prev,next',
                            center: 'title',
                            right: 'today'
                        },
                        editable: true,
                        events: [{
                                title: 'Event 1',
                                start: '2024-09-30'
                            },
                            {
                                title: 'Event 2',
                                start: '2024-10-01',
                                end: '2024-10-02'
                            }
                        ],
                        dateClick: function(info) {
                            alert('Date: ' + info.dateStr);
                        }
                    });

                    calendar.render();
                });
            </script>

        @endsection
