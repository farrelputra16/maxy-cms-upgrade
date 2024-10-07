@extends('layout.master')

@section('title', 'Profile User')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Users</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">

    <style>
        body {
            background-color: #E3E5EE;
        }
        
        .conTitle {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 2rem;
        }

        .h2 {
            font-weight: bold;
            color: #232E66;
            padding-left: .1rem;
            font-size: 22px;
            margin-bottom: -0.5rem;
            margin-left: 1rem;
        }

        .btnlogout {
            margin-right: 1rem;
            margin-bottom: .5rem;
            background-color: #FBB041;
            color: #FFF;
            width: 80px;
            height: 35px;
            border-radius: 10px;
            border: none;
            box-shadow: none;
            font-weight: bold;
        }

        .breadcrumb {
            border-top: 2px solid black;
            display: inline-block;
            width: 97%;;
            margin-left: 1rem;
            margin-bottom: 1rem;
        }

        .breadcrumb .sectionDashboard,
        .breadcrumb .divider,
        .breadcrumb .sectionMaster,
        .breadcrumb .sectionCourse {
            /* padding-top: 1rem; */
            /* margin-top: 1rem; */
            display: inline;
            font-size: 11px;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .breadcrumb .divider {
            margin: 0 5px;
        }

        #content,
        #short_description,
        #description {
            width: 1000px;
            height: auto;
        }

        .btnBatal {
            background-color: #F13C20;
            color: #FFF;
            margin-right: 1rem;
            margin-left: 38.5rem;
            margin-bottom: .5rem;
            color: #FFF;
            width: 80px;
            height: 35px;
            border-radius: 10px;
            border: none;
            box-shadow: none;
            font-weight: bold;
        }

        .btnTambah {
            background-color: #4056A1;
            color: #FFF;
            margin-right: 1rem;
            margin-bottom: .5rem;
            color: #FFF;
            width: 180px;
            height: 35px;
            border-radius: 10px;
            border: none;
            box-shadow: none;
            font-weight: bold;
        }

        .btnSave {
            background-color: #4056A1;
            color: #FFF;
            margin-bottom: .5rem;
            color: #FFF;
            width: 130px;
            height: 35px;
            border-radius: 10px;
            border: none;
            box-shadow: none;
            font-weight: bold;
        }

        .divBatal {
            text-align: right;
            margin-right: 20rem;
            margin-bottom: 1rem;
            margin-top: -3rem;
        }

        .divTambah {
            text-align: right;
            margin-bottom: .5rem;
        }

        .divSave {
            text-align: right;
            margin-right: 1rem;
            margin-bottom: .5rem;
            margin-left: 65rem;
        }
    </style>
</head>

<body>
    <div class="container conTitle">
        <h2 class="h2">Profile User</h2>
        <form class="form-inline my-2 my-lg-0 me-3" method="post" action="{{ route('logout') }}">
            @csrf
            <button class="btnlogout" type="submit">Logout</button>
        </form>
    </div>

    <div class="breadcrumb pt-2 pb-4">
        <a class="sectionDashboard" href="{{ url('/') }}">Dashboard</a>
        <span class="divider">></span>
        <div class="sectionMaster">User</div>
        <span class="divider">></span>
        <div class="sectionCourse">Profile User</div>
    </div>

    <div class="container">
        <form class="ui form" method="post">
            @csrf
            <div class="field">
                <div class="two fields">
                    <div class="field">
                        <label for="">ID</label>
                        <input type="text" name="id" value="{{ $currentData->id ?? '-' }}" disabled>
                    </div>
                    <div class="field">
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{ $currentData->name ?? '-' }}" disabled>
                    </div>
                </div>

                <div class="two fields">
                    <div class="field">
                        <label for="no_ktp">KTP</label>
                        <input type="text" name="no_ktp" id="no_ktp" value="{{ $currentData->no_ktp ?? '-' }}" disabled>
                    </div>
                    <div class="field">
                        <label for="">Telp</label>
                        <input type="text" name="phone" value="{{ $currentData->phone ?? '-' }}" disabled>
                    </div>
                </div>

                <div class="two fields">
                    <div class="field">
                        <label for="supervisor_name">Nama Pembimbing</label>
                        <input type="text" name="supervisor_name" id="supervisor_name" value="{{ $currentData->supervisor_name ?? '-' }}" disabled>
                    </div>
                    <div class="field">
                        <label for="supervisor_email">Email Pembimbing</label>
                        <input type="text" name="supervisor_email" id="supervisor_email" value="{{ $currentData->supervisor_email ?? '-' }}" disabled>
                    </div>
                </div>

                <div class="two fields">
                    <div class="field">
                        <label for="supervisor_name">Nama Ayah</label>
                        <input type="text" name="supervisor_name" id="supervisor_name" value="{{ $father->name ?? '-' }}" disabled>
                    </div>
                    <div class="field">
                        <label for="supervisor_email">Pekerjaan Ayah</label>
                        <input type="text" name="supervisor_email" id="supervisor_email" value="{{ $father->job ?? '-' }}" disabled>
                    </div>
                </div>

                <div class="two fields">
                    <div class="field">
                        <label for="supervisor_name">Nama Ibu</label>
                        <input type="text" name="supervisor_name" id="supervisor_name" value="{{ $mother->name ?? '-' }}" disabled>
                    </div>
                    <div class="field">
                        <label for="supervisor_email">Pekerjaan Ibu</label>
                        <input type="text" name="supervisor_email" id="supervisor_email" value="{{ $mother->job ?? '-' }}" disabled>
                    </div>
                </div>

                <div class="two fields">
                    <div class="field">
                        <label for="supervisor_name">Agama</label>
                        <input type="text" name="supervisor_name" id="supervisor_name" value="{{ $currentData->religion ?? '-' }}" disabled>
                    </div>
                    <div class="field">
                        <label for="supervisor_email">Status Kewarganegaraan</label>
                        <input type="text" name="supervisor_email" id="supervisor_email" value="{{ $currentData->citizenship_status ?? '-' }}" disabled>
                    </div>
                </div>

                <div class="two fields">
                    <div class="field">
                        <label for="supervisor_name">Transkrip Nilai</label>
                        <label>{{ asset('uploads/' . $currentData->transcripts) }}</label>
                    </div>
                    <div class="field">
                        <label for="supervisor_email">IPK</label>
                        <input type="text" name="supervisor_email" id="supervisor_email" value="{{ $currentData->ipk ?? '-' }}" disabled>
                    </div>
                </div>

                <div class="two fields">
                    <div class="field">
                        <label for="supervisor_name">Kota</label>
                        <input type="text" name="supervisor_name" id="supervisor_name" value="{{ $currentData->city ?? '-' }}" disabled>
                    </div>
                    <div class="field">
                        <label for="supervisor_email">Provinsi</label>
                        <input type="text" name="supervisor_email" id="supervisor_email" value="{{ $currentData->MProvince->name ?? '-' }}" disabled>
                    </div>
                </div>

                <div class="two fields">
                    <div class="field">
                        <label for="supervisor_name">Negara</label>
                        <input type="text" name="supervisor_name" id="supervisor_name" value="{{ $currentData->country ?? '-' }}" disabled>
                    </div>
                    <div class="field">
                        <label for="supervisor_email">Kode Pos</label>
                        <input type="text" name="supervisor_email" id="supervisor_email" value="{{ $currentData->postal_code ?? '-' }}" disabled>
                    </div>
                </div>

                <div class="two fields">
                    <div class="field">
                        <label for="supervisor_name">Alamat</label>
                        <input type="text" name="supervisor_name" id="supervisor_name" value="{{ $currentData->address ?? '-' }}" disabled>
                    </div>
                    <div class="field">
                        <label for="">Hobby</label>
                        <input type="text" name="hobby" value="{{ $currentData->hobby ?? '-' }}" disabled>
                    </div>
                </div>
                
                <div class="two fields">
                    <div class="field">
                        <label for="practitioner">Practitioner</label>
                        @php
                            $currentData->practitioner = $currentData->practitioner == 1 ? 'Praktisi' : 'Akademisi';
                        @endphp
                        <input type="text" name="practitioner" id="practitioner" value="{{ $currentData->practitioner ?? '-' }}" disabled>
                    </div>
                    <div class="field">
                        <label for="">Place</label>
                        <input type="text" name="place" value="{{ $currentData->place ?? '-' }}" disabled>
                    </div>
                </div>

                <div class="field">
                    <label for="category" class="form-label me-0">Keahlian yang Dimiliki</label>
                    <div class="category-list">
                        @if(is_array($courseData) && count($courseData) > 0)
                            <ul class="list-group">
                                @foreach($courseData as $course)
                                    <li class="list-group-item text-start"> <!-- Category Item -->
                                        <strong>{{ $course['category_name'] }}</strong> <!-- Category Name -->
                                        <ul class="list-unstyled mt-1">
                                            @foreach($course['course_names'] as $courseName)
                                                <li class="text-start" style="padding-left: 20px;">
                                                    <i class="bi bi-arrow-right-short"></i>{{ $courseName }} <!-- Course Name -->
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p>Belum ada keahlian yang ditambahkan.</p> <!-- Message when no courses are available -->
                        @endif
                    </div>
                </div>
                

                <div class="field">
                    <label for="supervisor_name">Deskripsi Diri</label>
                    {!! $currentData->detail_description_text !!}
                </div>

                <div class="field">
                    <label for="supervisor_name">Video Perkenalan</label>
                    <input type="text" name="supervisor_name" id="supervisor_name" value="{{ $currentData->detail_description_video ?? '-' }}" disabled>
                </div>

                <div class="field">
                    <label for="supervisor_name">Ringkasan Pribadi</label>
                    {!! $currentData->personal_summary !!}
                </div>

                <div class="field">
                    <h3>Riwayat Karir</h3>
                    @if($currentData->UserExperience->count() > 0)
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Position</th>
                                    <th>Job Type</th>
                                    <th>Company</th>
                                    <th>Industry</th>
                                    <th>Location</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <!-- Add more table headers as needed -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($currentData->UserExperience as $portofolio)
                                    <tr>
                                        <td>{{ $portofolio->name }}</td>
                                        <td>{{ $portofolio->job_type }}</td>
                                        <td>{{ $portofolio->company }}</td>
                                        <td>{{ $portofolio->industry }}</td>
                                        <td>{{ $portofolio->location }}</td>
                                        <td>{{ $portofolio->start_date }}</td>
                                        <td>{{ $portofolio->end_date }}</td>
                                        <!-- Add more table data as needed -->
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No data available</p>
                    @endif
                </div>

                <div class="field">
                    <h3>Education</h3>
                    @if($currentData->UserEducation->count() > 0)
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>School</th>
                                    <th>Degree</th>
                                    <th>Fields of Study</th>
                                    <th>Score</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <!-- Add more table headers as needed -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($currentData->UserEducation as $portofolio)
                                    <tr>
                                        <td>{{ $portofolio->name }}</td>
                                        <td>{{ $portofolio->degree }}</td>
                                        <td>{{ $portofolio->fields_of_study }}</td>
                                        <td>{{ $portofolio->score }}</td>
                                        <td>{{ $portofolio->start_date }}</td>
                                        <td>{{ $portofolio->end_date }}</td>
                                        <!-- Add more table data as needed -->
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No data available</p>
                    @endif
                </div>

                <div class="field">
                    <h3>Portofolio</h3>
                    @if($currentData->UserPortofolio->count() > 0)
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>URL</th>
                                    <th>Date Created</th>
                                    <!-- Add more table headers as needed -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($currentData->UserPortofolio as $portofolio)
                                    <tr>
                                        <td>{{ $portofolio->url_portfolio }}</td>
                                        <td>{{ $portofolio->created_at }}</td>
                                        <!-- Add more table data as needed -->
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No data available</p>
                    @endif
                </div>

                {{-- Penelitian --}}
                <section>
                    <h1 class="title-section-profile mb-4 mt-4">Penelitian</h1>

                    @php
                        // Filter portfolios to only include those of type 'Penelitian'
                        use Carbon\Carbon;
                        $penelitianPortfolios = $portfolios->where('type', 'Penelitian');
                    @endphp

                    @if ($penelitianPortfolios->count() > 0)
                        @foreach ($penelitianPortfolios as $penelitian)
                            <div class="card mb-4">  <!-- Individual card for each penelitian -->
                                <div class="card-header">
                                    <h5 class="card-title">Nama Penelitian: {{ $penelitian->name }}</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            @php
                                                // Calculate semester and academic year
                                                $startDate = Carbon::parse($penelitian->start_date);
                                                $semester = $startDate->month <= 6 ? 'Ganjil' : 'Genap';
                                                $academicYear = $startDate->year . '/' . ($startDate->year + 1);
                                            @endphp
                                            <label for="periode">Periode</label>
                                            <input type="text" class="form-control" name="periode" value="{{ $semester }} {{ $academicYear }}" disabled>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="url_portfolio">URL Portfolio</label>
                                            <input type="text" class="form-control" name="url_portfolio" value="{{ $penelitian->url_portfolio }}" disabled>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-md-12">
                                            <label for="description">Deskripsi</label>
                                            <textarea name="description" class="form-control" disabled>{{ strip_tags($penelitian->description) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- End of individual card -->
                        @endforeach
                    @else
                        <p>No portfolio added yet</p>
                    @endif
                </section>
                {{-- End of Penelitian --}}

                {{-- Pengabdian --}}
                <section>
                    <h1 class="title-section-profile mb-4 mt-4">Pengabdian</h1>

                    @php
                        // Filter portfolios to only include those of type 'Pengabdian'
                        $pengabdianPortfolios = $portfolios->where('type', 'Pengabdian');
                    @endphp

                    @if ($pengabdianPortfolios->count() > 0)
                        @foreach ($pengabdianPortfolios as $pengabdian)
                            <div class="card mb-4">  <!-- Individual card for each pengabdian -->
                                <div class="card-header">
                                    <h5 class="card-title">Nama Pengabdian: {{ $pengabdian->name }}</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            @php
                                                // Calculate semester and academic year
                                                $startDate = Carbon::parse($pengabdian->start_date);
                                                $semester = $startDate->month <= 6 ? 'Ganjil' : 'Genap';
                                                $academicYear = $startDate->year . '/' . ($startDate->year + 1);
                                            @endphp
                                            <label for="periode">Periode</label>
                                            <input type="text" class="form-control" name="periode" value="{{ $semester }} {{ $academicYear }}" disabled>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="url_portfolio">URL Portfolio</label>
                                            <input type="text" class="form-control" name="url_portfolio" value="{{ $pengabdian->url_portfolio }}" disabled>
                                        </div>
                                    </div>
                                    @php
                                        $description = $pengabdian->description; // Ambil data deskripsi yang digabung

                                        // Periksa apakah deskripsi berisi nomor surat tugas dengan delimiter '|||||'
                                        if (str_contains($description, '|||||')) {
                                            // Jika ada delimiter '|||||', pisahkan deskripsi dan nomor surat tugas
                                            [$descriptionText, $nomorSuratTugas] = explode('|||||', $description, 2);
                                        } else {
                                            // Jika tidak ada '|||||', maka hanya ada deskripsi tanpa nomor surat tugas
                                            $descriptionText = $description;
                                            $nomorSuratTugas = null; // Tidak ada nomor surat tugas
                                        }

                                        // Sekarang Anda bisa menggunakan $descriptionText dan $nomorSuratTugas
                                    @endphp
                                    <div class="row mb-4">
                                        <div class="col-md-12">
                                            <label for="description">Deskripsi</label>
                                            <textarea name="description" class="form-control" disabled>{{ $descriptionText }}</textarea>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="url_portfolio">Nomor Surat Tugas</label>
                                            <input type="text" class="form-control" name="url_portfolio" value="{{ $nomorSuratTugas }}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- End of individual card -->
                        @endforeach
                    @else
                        <p>No pengabdian added yet</p>
                    @endif
                </section>
                {{-- End of Pengabdian --}}

                {{-- Pengajaran --}}
                <section>
                    <h1 class="title-section-profile mb-4 mt-4">Pengajaran</h1>
                    <div class="d-flex flex-column gap-4">
                        @if(!empty($courses) && count($courses) > 0)
                        @foreach ($courses as $course)
                            <div class="card mb-4"> <!-- Individual card for each pengajaran -->
                                <div class="card-body">
                                    <h5 class="card-title fs-3">{{ $course['course_name'] }}</h5>
                                    <p class="text-muted fs-3">{{ $course['category_name'] }}</p>
                                    @if($course['sks'] > 0)
                                        <p class="text-muted fs-5">{{ $course['sks'] }} SKS</p>
                                    @endif
                                    <p class="text-muted fst-italic fw-bold">Periode: {{ $course['periode'] }}</p>
                                </div>
                            </div> <!-- End of individual card -->
                        @endforeach
                        @else
                            <p>Belum ada pengajaran</p>
                        @endif
                    </div>
                </section>
                {{-- End of Pengajaran --}}

                {{-- Bimbingan --}}
                <section>
                    <h1 class="title-section-profile mb-4 mt-4">Bimbingan</h1>
                    <div class="d-flex flex-column gap-4">
                        @if(!empty($bimbinganData) && count($bimbinganData) > 0)
                        @foreach ($bimbinganData as $bimbingan)
                            <div class="card mb-4"> <!-- Individual card for each bimbingan -->
                                <div class="card-body">
                                    <h5 class="card-title fs-3">{{ $bimbingan['jobdesc'] }}</h5>
                                    <p class="fw-bold mb-3 fs-3">{{ $bimbingan['category_name'] }}</p>
                                    <p class="fw-bold fs-6 me-2">📘 Jenis Bimbingan: <span class="fs-6">{{ $bimbingan['course_name'] }}</span></p>
                                    <p class="fw-bold fs-6 me-2">👨‍🎓 Jumlah Mahasiswa: <span class="fs-6">{{ $bimbingan['jumlah_mahasiswa'] }}</span></p>
                                    <p class="text-muted fst-italic fw-bold">Periode: {{ $bimbingan['periode'] }}</p>
                                </div>
                            </div> <!-- End of individual card -->
                        @endforeach
                        @else
                            <p>Belum ada bimbingan</p>
                        @endif
                    </div>
                </section>
                {{-- End of Bimbingan --}}

                {{-- Pengajaran Di Universitas Lain --}}
                <section>
                    <h1 class="title-section-profile mb-4 mt-4">Pengajaran Di Universitas Lain</h1>
                    @php
                        // Filter portfolios to only include those of type 'Pengajaran'
                        $pengajaranPortfolios = $portfolios->where('type', 'Pengajaran');
                    @endphp

                    @if ($pengajaranPortfolios->count() > 0)
                        @foreach ($pengajaranPortfolios as $pengajaran)
                            <div class="card mb-4"> <!-- Individual card for each pengajaran -->
                                @php
                                    $name = $pengajaran->name;
                                    if (str_contains($name, '|||||')) {
                                        [$namaPt, $namaProdi] = explode('|||||', $name, 2);
                                    } else {
                                        $namaPt = $name;
                                        $namaProdi = null; // If no delimiter, no Prodi
                                    }
                                @endphp
                                <div class="card-header">
                                    <h5 class="card-title">Nama PT: {{ $namaPt }}</h5>
                                </div>
                                <div class="card-header">
                                    <h5 class="card-title">Nama Prodi: {{ $namaProdi }}</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <label for="periode">Periode</label>
                                            @php
                                                // Calculate semester and academic year
                                                $startDate = Carbon::parse($pengajaran->start_date);
                                                $semester = $startDate->month <= 6 ? 'Ganjil' : 'Genap';
                                                $academicYear = $startDate->year . '/' . ($startDate->year + 1);
                                            @endphp
                                            <input type="text" class="form-control" name="periode" value="{{ $semester }} {{ $academicYear }}" disabled>
                                        </div>
                                        @php
                                            $description = $pengajaran->description; // Ambil data deskripsi yang digabung
                                        // Periksa apakah deskripsi berisi nomor surat tugas dengan delimiter '|||||'
                                        if (str_contains($description, '|||||')) {
                                            // Jika ada delimiter '|||||', pisahkan deskripsi dan nomor surat tugas
                                            [$descriptionText, $sks] = explode('|||||', $description, 2);
                                        } else {
                                            // Jika tidak ada '|||||', maka hanya ada deskripsi tanpa nomor surat tugas
                                            $descriptionText = $description;
                                            $sks = null; // Tidak ada nomor surat tugas
                                        }
                                        // Sekarang Anda bisa menggunakan $descriptionText dan $sks
                                        @endphp
                                        <div class="col-md-6">
                                            <label for="sks">SKS</label>
                                            <input type="text" class="form-control" name="sks" value="{{ $sks }}" disabled>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-md-12">
                                            <label for="description">Deskripsi</label>
                                            <input class="form-control" name="description" value="{{ $descriptionText }}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- End of individual card -->
                        @endforeach
                    @else
                        <p>Belum ada pengajaran</p>
                    @endif
                </section>
                {{-- End of Pengajaran Di Universitas Lain --}}

                {{-- Bimbingan Di Universitas Lain --}}
                <section>
                    <h1 class="title-section-profile mb-4 mt-4">Bimbingan Di Universitas Lain</h1>
                    @php
                        // Filter portfolios to only include those of type 'Bimbingan'
                        $bimbinganPortfolios = $portfolios->where('type', 'Bimbingan');
                    @endphp

                    @if ($bimbinganPortfolios->count() > 0)
                        @foreach ($bimbinganPortfolios as $bimbingan)
                            <div class="card mb-4"> <!-- Individual card for each bimbingan -->
                                @php
                                    $name = $bimbingan->name;
                                    if (str_contains($name, '|||||')) {
                                        [$namaPt, $namaProdi] = explode('|||||', $name, 2);
                                    } else {
                                        $namaPt = $name;
                                        $namaProdi = null; // If no delimiter, no Prodi
                                    }
                                @endphp
                                <div class="card-header">
                                    <h5 class="card-title">Nama PT: {{ $namaPt }}</h5>
                                </div>
                                <div class="card-header">
                                    <h5 class="card-title">Nama Prodi: {{ $namaProdi }}</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <label for="periode">Periode</label>
                                            @php
                                                // Calculate semester and academic year
                                                $startDate = Carbon::parse($bimbingan->start_date);
                                                $semester = $startDate->month <= 6 ? 'Ganjil' : 'Genap';
                                                $academicYear = $startDate->year . '/' . ($startDate->year + 1);
                                            @endphp
                                            <input type="text" class="form-control" name="periode" value="{{ $semester }} {{ $academicYear }}" disabled>
                                        </div>
                                        @php
                                            $description = $bimbingan->description; // Ambil data deskripsi yang digabung
                                            // Periksa apakah deskripsi berisi nomor surat tugas dengan delimiter '|||||'
                                            if (str_contains($description, '|||||')) {
                                                // Jika ada delimiter '|||||', pisahkan deskripsi dan nomor surat tugas
                                                [$descriptionText, $jumlah_mahasiswa] = explode('|||||', $description, 2);
                                            } else {
                                                // Jika tidak ada '|||||', maka hanya ada deskripsi tanpa nomor surat tugas
                                                $descriptionText = $description;
                                                $jumlah_mahasiswa = null; // Tidak ada nomor surat tugas
                                            }
                                        @endphp
                                        <div class="col-md-6">
                                            <label for="jumlah_mahasiswa">Jumlah Mahasiswa</label>
                                            <input type="text" class="form-control" name="jumlah_mahasiswa" value="{{ $jumlah_mahasiswa ?? 'N/A' }}" disabled>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-md-12">
                                            <label for="description">Deskripsi</label>
                                            <input class="form-control" name="description" value="{{ $descriptionText }}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- End of individual card -->
                        @endforeach
                    @else
                        <p>Belum ada bimbingan</p>
                    @endif
                </section>
                {{-- End of Bimbingan Di Universitas Lain --}}

                <div class="field">
                    <h3>Certificate</h3>
                    @if($currentData->UserCertificate->count() > 0)
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Company</th>
                                    <th>ID Credential</th>
                                    <th>URL Credential</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Description</th>
                                    <!-- Add more table headers as needed -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($currentData->UserCertificate as $portofolio)
                                    <tr>
                                        <td>{{ $portofolio->name }}</td>
                                        <td>{{ $portofolio->company }}</td>
                                        <td>{{ $portofolio->id_credential }}</td>
                                        <td>{{ $portofolio->url_credential }}</td>
                                        <td>{{ $portofolio->start_date }}</td>
                                        <td>{{ $portofolio->end_date }}</td>
                                        <td>{{ $portofolio->description }}</td>
                                        <!-- Add more table data as needed -->
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No data available</p>
                    @endif
                </div>

                <div class="field">
                    <h3>Language</h3>
                    @if($currentData->UserLanguage->count() > 0)
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Language</th>
                                    <th>Proficiency</th>
                                    <!-- Add more table headers as needed -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($currentData->UserLanguage as $portofolio)
                                    <tr>
                                        <td>{{ $portofolio->MLanguage->name }}</td>
                                        <td>{{ $portofolio->proficiency }}</td>
                                        <!-- Add more table data as needed -->
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No data available</p>
                    @endif
                </div>

                <div class="field">
                    <h3>Active Course</h3>
                    @foreach($currentData->courseClassMembers as $portofolio)
                        @if(isset($portofolio->courseClass) && !is_null($portofolio->courseClass) && $portofolio->courseClass->status_ongoing==1)
                            <p class='active_course'>{{ $portofolio->courseClass->slug }}</p>
                        @endif
                    @endforeach
                    <p id='active_course' class="d-none">No data available</p>
                </div>

                <div class="field">
                    <h3>Completed Course</h3>
                    @foreach($currentData->courseClassMembers as $portofolio)
                        @if(isset($portofolio->courseClass) && !is_null($portofolio->courseClass) && $portofolio->courseClass->status_ongoing==2)
                            <p class='completed_course'>{{ $portofolio->courseClass->slug }}</p>
                        @endif
                    @endforeach
                    <p id='completed_course' class="d-none">No data available</p>
                </div>
            </div>
        </form>

        <!-- <div class="divBatal"> -->
        <a href="{{ url()->previous() }}" class="divBatal">
            <button class="btnBatal">Batal</button>
        </a>
        <!-- </div> -->
    </div>

</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var activeCourses = document.getElementsByClassName("active_course");
        if (activeCourses.length === 0) {
            var noDataElement = document.getElementById("active_course");
            if (noDataElement) {
                noDataElement.classList.remove("d-none");
            }
        }

        var activeCourses = document.getElementsByClassName("completed_course");
        if (activeCourses.length === 0) {
            var noDataElement = document.getElementById("completed_course");
            if (noDataElement) {
                noDataElement.classList.remove("d-none");
            }
        }
    });
</script>
</html>
<script>
    CKEDITOR.replace('description');
</script>
@endsection