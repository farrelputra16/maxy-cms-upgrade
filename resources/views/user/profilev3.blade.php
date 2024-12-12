@extends('layout.main-v3')

@section('title', 'Profil Pengguna')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Profil Pengguna</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pengguna & Akses</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getUser') }}">Pengguna</a></li>
                        <li class="breadcrumb-item active">Profil Pengguna</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Profil Pengguna: {{ $currentData->name }}</small></h4>
                    <p class="card-title-desc">
                        Di halaman ini, Anda dapat melihat informasi profil Anda, termasuk nama, email, nomor telepon, dan
                        data penting lainnya.
                        Informasi ini bersifat hanya untuk dilihat dan tidak dapat diubah langsung di halaman ini.
                        <br><br>
                        <strong>Cara Mengelola Profil:</strong>
                    <ul>
                        <li><strong>Lihat Detail Profil:</strong> Gunakan halaman ini untuk memastikan informasi profil Anda
                            sudah sesuai.</li>
                        <li><strong>Perbarui Informasi:</strong> Jika Anda ingin memperbarui data profil, silakan masuk ke
                            platform LMS.</li>
                    </ul>
                    </p>


                    <form method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">ID</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="id"
                                    value="{{ $currentData->id ?? '-' }}" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Nama</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name"
                                    value="{{ $currentData->name ?? '-' }}" disabled>
                            </div>
                        </div>

                        <br>

                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">KTP</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="no_ktp"
                                    value="{{ $currentData->no_ktp ?? '-' }}" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Telp</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="phone"
                                    value="{{ $currentData->phone ?? '-' }}" disabled>
                            </div>
                        </div>

                        <br>

                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Nama Pembimbing</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="supervisor_name" id="supervisor_name"
                                    value="{{ $currentData->supervisor_name ?? '-' }}" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-discount" class="col-md-2 col-form-label">Email Pembimbing</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="supervisor_email" id="supervisor_email"
                                    value="{{ $currentData->supervisor_email }}" id="input-discount" disabled>
                            </div>
                        </div>

                        <br>

                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Nama Ayah</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="father_name"
                                    value="{{ $father->name ?? '-' }}" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Pekerjaan Ayah</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="father_job"
                                    value="{{ $father->job ?? '-' }}" disabled>
                            </div>
                        </div>

                        <br>

                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Nama Ibu</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="mother_name"
                                    value="{{ $mother->name ?? '-' }}" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Pekerjaan Ibu</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="mother_job"
                                    value="{{ $mother->job ?? '-' }}" disabled>
                            </div>
                        </div>

                        <br>

                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Agama</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="religion"
                                    value="{{ $currentData->religion ?? '-' }}" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Status Kewarganegaraan</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="citizenship_status"
                                    value="{{ $currentData->citizenship_status ?? '-' }}" disabled>
                            </div>
                        </div>

                        <br>

                        <div class="mb-3 row">
                            <label for="input-slug" class="col-md-2 col-form-label">Transkrip Nilai</label>
                            <div class="col-md-10">
                                <label class="col-form-label">{{ asset('uploads/' . $currentData->transcripts) }}</label>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">IPK</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="ipk"
                                    value="{{ $currentData->ipk ?? '-' }}" disabled>
                            </div>
                        </div>

                        <br>

                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">kota</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="city"
                                    value="{{ $currentData->city ?? '-' }}" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Provinsi</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="province"
                                    value="{{ $currentData->MProvince->name ?? '-' }}" disabled>
                            </div>
                        </div>

                        <br>

                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Negara</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="country"
                                    value="{{ $currentData->country ?? '-' }}" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Kode Pos</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="postal_code"
                                    value="{{ $currentData->postal_code ?? '-' }}" disabled>
                            </div>
                        </div>

                        <br>

                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Alamat</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="address"
                                    value="{{ $currentData->address ?? '-' }}" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Hobi</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="hobby"
                                    value="{{ $currentData->hobby ?? '-' }}" disabled>
                            </div>
                        </div>

                        <br>

                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Alamat</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="address"
                                    value="{{ $currentData->address ?? '-' }}" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Hobi</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="hobby"
                                    value="{{ $currentData->hobby ?? '-' }}" disabled>
                            </div>
                        </div>

                        <br>

                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Practitioner</label>
                            <div class="col-md-10">
                                @php
                                    $currentData->practitioner =
                                        $currentData->practitioner == 1 ? 'Praktisi' : 'Akademisi';
                                @endphp
                                <input class="form-control" type="text" name="practitioner"
                                    value="{{ $currentData->practitioner ?? '-' }}" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Lokasi</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="place"
                                    value="{{ $currentData->place ?? '-' }}" disabled>
                            </div>
                        </div>

                        <br>

                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 .col-form-label">Keahlian yg Dimiliki</label>
                            <div class="col-md-10">
                                @if (is_array($courseData) && count($courseData) > 0)
                                    <ul class="list-group">
                                        @foreach ($courseData as $course)
                                            <li class="list-group-item text-start"> <!-- Category Item -->
                                                <strong>{{ $course['category_name'] }}</strong> <!-- Category Name -->
                                                <ul class="list-unstyled mt-1">
                                                    @foreach ($course['course_names'] as $courseName)
                                                        <li class="text-start" style="padding-left: 20px;">
                                                            <i class="bi bi-arrow-right-short"></i>{{ $courseName }}
                                                            <!-- Course Name -->
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p>Belum ada keahlian yang ditambahkan.</p>
                                    <!-- Message when no courses are available -->
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="description" class="col-md-2 col-form-label">Deskripsi Diri</label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="self_desc" class="form-control" disabled>{{ $currentData->detail_description_text }}</textarea>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-slug" class="col-md-2 col-form-label">Video Perkenalan</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="video_perkenalan"
                                    value="{{ $currentData->detail_description_video ?? '-' }}" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="description" class="col-md-2 col-form-label">Ringkasan Pribadi</label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="self_desc" class="form-control" disabled>{{ $currentData->personal_summary }}</textarea>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <h6>Riwayat Karir</h6>
                            @if ($currentData->UserExperience->count() > 0)
                                <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>Posisi</th>
                                            <th>Jenis Pekerjaan</th>
                                            <th>Perusahaan</th>
                                            <th>Industri</th>
                                            <th>Lokasi</th>
                                            <th>Tanggal Mulai</th>
                                            <th>Tanggal Selesai</th>
                                            <!-- Add more table headers as needed -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($currentData->UserExperience as $portofolio)
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
                                <div class="mb-3 row justify-content">
                                    <div class="">
                                        <div class="border card border-danger">
                                            <div class="card-body text-center">
                                                <p class="card-text text-danger">Belum ada data untuk ditampilkan.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>


                        <div class="mb-3 row">
                            <h6>Riwayat Pendidikan.</h6>
                            @if ($currentData->UserEducation->count() > 0)
                                <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>Sekolah</th>
                                            <th>Gelar</th>
                                            <th>Bidang Studi</th>
                                            <th>Nilai</th>
                                            <th>Tanggal Mulai</th>
                                            <th>Tanggal Selesai</th>
                                            <!-- Add more table headers as needed -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($currentData->UserEducation as $portofolio)
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
                                <div class="mb-3 row justify-content">
                                    <div class="">
                                        <div class="border card border-danger">
                                            <div class="card-body text-center">
                                                <p class="card-text text-danger">Belum ada data untuk ditampilkan.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="mb-3 row">
                            <h6>Portofolio</h6>
                            @if ($currentData->UserPortofolio->count() > 0)
                                <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>URL</th>
                                            <th>Tanggal Dibuat</th>
                                            <!-- Add more table headers as needed -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($currentData->UserPortofolio as $portofolio)
                                            <tr>
                                                <td>{{ $portofolio->url_portfolio }}</td>
                                                <td>{{ $portofolio->created_at }}</td>
                                                <!-- Add more table data as needed -->
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="mb-3 row justify-content">
                                    <div class="">
                                        <div class="border card border-danger">
                                            <div class="card-body text-center">
                                                <p class="card-text text-danger">Belum ada data untuk ditampilkan.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <section>
                            <h6>Penelitian</h6>
                            @php
                                // Filter portfolios to only include those of type 'Penelitian'
                                use Carbon\Carbon;
                                $penelitianPortfolios = $portfolios->where('type', 'Penelitian');
                            @endphp

                            @if ($penelitianPortfolios->count() > 0)
                                @foreach ($penelitianPortfolios as $penelitian)
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h6 class="card-title">Nama Penelitian: {{ $penelitian->name }}</h6>
                                                    <div class="card-body">
                                                        <div class="row mb-4">
                                                            <div class="col-md-6">
                                                                @php
                                                                    // Calculate semester and academic year
                                                                    $startDate = Carbon::parse($penelitian->start_date);
                                                                    $semester =
                                                                        $startDate->month <= 6 ? 'Ganjil' : 'Genap';
                                                                    $academicYear =
                                                                        $startDate->year . '/' . ($startDate->year + 1);
                                                                @endphp
                                                                <label for="periode">Periode</label>
                                                                <input type="text" class="form-control" name="periode"
                                                                    value="{{ $semester }} {{ $academicYear }}"
                                                                    disabled>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="url_portfolio">URL Portfolio</label>
                                                                <input type="text" class="form-control"
                                                                    name="url_portfolio"
                                                                    value="{{ $penelitian->url_portfolio }}" disabled>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-4">
                                                            <div class="col-md-12">
                                                                <label for="description">Deskripsi</label>
                                                                <textarea name="description" class="form-control" disabled>{{ strip_tags($penelitian->description) }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="mb-3 row justify-content">
                                    <div class="">
                                        <div class="border card border-danger">
                                            <div class="card-body text-center">
                                                <p class="card-text text-danger">Belum ada portofolio yang ditambahkan</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </section>

                        <section>
                            <h6>Pengabdian</h6>
                            @php
                                // Filter portfolios to only include those of type 'Pengabdian'
                                $pengabdianPortfolios = $portfolios->where('type', 'Pengabdian');
                            @endphp

                            @if ($pengabdianPortfolios->count() > 0)
                                @foreach ($pengabdianPortfolios as $pengabdian)
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h6 class="card-title">Nama Pengabdian: {{ $pengabdian->name }}</h6>
                                                    <div class="card-body">
                                                        <div class="row mb-4">
                                                            <div class="col-md-6">
                                                                @php
                                                                    // Calculate semester and academic year
                                                                    $startDate = Carbon::parse($pengabdian->start_date);
                                                                    $semester =
                                                                        $startDate->month <= 6 ? 'Ganjil' : 'Genap';
                                                                    $academicYear =
                                                                        $startDate->year . '/' . ($startDate->year + 1);
                                                                @endphp
                                                                <label for="periode">Periode</label>
                                                                <input type="text" class="form-control" name="periode"
                                                                    value="{{ $semester }} {{ $academicYear }}"
                                                                    disabled>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="url_portfolio">URL Portfolio</label>
                                                                <input type="text" class="form-control"
                                                                    name="url_portfolio"
                                                                    value="{{ $pengabdian->url_portfolio }}" disabled>
                                                            </div>
                                                        </div>

                                                        @php
                                                            $description = $pengabdian->description; // Ambil data deskripsi yang digabung

                                                            // Periksa apakah deskripsi berisi nomor surat tugas dengan delimiter '|||||'
                                                            if (str_contains($description, '|||||')) {
                                                                // Jika ada delimiter '|||||', pisahkan deskripsi dan nomor surat tugas
                                                                [$descriptionText, $nomorSuratTugas] = explode(
                                                                    '|||||',
                                                                    $description,
                                                                    2,
                                                                );
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
                                                                <input type="text" class="form-control"
                                                                    name="url_portfolio" value="{{ $nomorSuratTugas }}"
                                                                    disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="mb-3 row justify-content">
                                    <div class="">
                                        <div class="border card border-danger">
                                            <div class="card-body text-center">
                                                <p class="card-text text-danger">Belum ada pengabdian yang ditambahkan</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </section>

                        <section>
                            <h6>Pengajaran</h6>
                            <div class="d-flex flex-column gap-4">
                                @if (!empty($courses) && count($courses) > 0)
                                    @foreach ($courses as $course)
                                        <div class="card mb-4"> <!-- Individual card for each pengajaran -->
                                            <div class="card-body">
                                                <h5 class="card-title fs-3">{{ $course['course_name'] }}</h5>
                                                <p class="text-muted fs-3">{{ $course['category_name'] }}</p>
                                                @if ($course['sks'] > 0)
                                                    <p class="text-muted fs-5">{{ $course['sks'] }} SKS</p>
                                                @endif
                                                <p class="text-muted fst-italic fw-bold">Periode: {{ $course['periode'] }}
                                                </p>
                                            </div>
                                        </div> <!-- End of individual card -->
                                    @endforeach
                                @else
                                    <div class="mb-3 row justify-content">
                                        <div class="">
                                            <div class="border card border-danger">
                                                <div class="card-body text-center">
                                                    <p class="card-text text-danger">Belum ada pengajaran</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </section>

                        <section>
                            <h6>Bimbingan</h6>
                            <div class="d-flex flex-column gap-4">
                                @if (!empty($bimbinganData) && count($bimbinganData) > 0)
                                    @foreach ($bimbinganData as $bimbingan)
                                        <div class="card mb-4"> <!-- Individual card for each bimbingan -->
                                            <div class="card-body">
                                                <h5 class="card-title fs-3">{{ $bimbingan['jobdesc'] }}</h5>
                                                <p class="fw-bold mb-3 fs-3">{{ $bimbingan['category_name'] }}</p>
                                                <p class="fw-bold fs-6 me-2">📘 Jenis Bimbingan: <span
                                                        class="fs-6">{{ $bimbingan['course_name'] }}</span></p>
                                                <p class="fw-bold fs-6 me-2">👨‍🎓 Jumlah Mahasiswa: <span
                                                        class="fs-6">{{ $bimbingan['jumlah_mahasiswa'] }}</span></p>
                                                <p class="text-muted fst-italic fw-bold">Periode:
                                                    {{ $bimbingan['periode'] }}</p>
                                            </div>
                                        </div> <!-- End of individual card -->
                                    @endforeach
                                @else
                                    <div class="mb-3 row justify-content">
                                        <div class="">
                                            <div class="border card border-danger">
                                                <div class="card-body text-center">
                                                    <p class="card-text text-danger">Belum ada bimbingan</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </section>

                        <section>
                            <h6>Pengajaran Di Universitas Lain</h6>
                            @php
                                // Filter portfolios to only include those of type 'Pengajaran'
                                $bimbinganPortfolios = $portfolios->where('type', 'Pengajaran');
                            @endphp
                            @if ($bimbinganPortfolios->count() > 0)
                                @foreach ($bimbinganPortfolios as $pengajaran)
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
                                                    <input type="text" class="form-control" name="periode"
                                                        value="{{ $semester }} {{ $academicYear }}" disabled>
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
                                                    <input type="text" class="form-control" name="sks"
                                                        value="{{ $sks }}" disabled>
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <div class="col-md-12">
                                                    <label for="description">Deskripsi</label>
                                                    <input class="form-control" name="description"
                                                        value="{{ $descriptionText }}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- End of individual card -->
                                @endforeach
                            @else
                                <div class="mb-3 row justify-content">
                                    <div class="">
                                        <div class="border card border-danger">
                                            <div class="card-body text-center">
                                                <p class="card-text text-danger">Belum ada pengajaran</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </section>

                        <section>
                            <h6>Bimbingan Di Universitas Lain</h6>
                            @php
                                // Filter portfolios to only include those of type 'Pengajaran'
                                $bimbinganPortfolios = $portfolios->where('type', 'Pengajaran');
                            @endphp
                            @if ($bimbinganPortfolios->count() > 0)
                                @foreach ($bimbinganPortfolios as $bimbingan)
                                    <div class="card mb-4"> <!-- Individual card for each pengajaran -->
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
                                                    <input type="text" class="form-control" name="periode"
                                                        value="{{ $semester }} {{ $academicYear }}" disabled>
                                                </div>
                                                @php
                                                    $description = $bimbingan->description; // Ambil data deskripsi yang digabung
                                                    // Periksa apakah deskripsi berisi nomor surat tugas dengan delimiter '|||||'
                                                    if (str_contains($description, '|||||')) {
                                                        // Jika ada delimiter '|||||', pisahkan deskripsi dan nomor surat tugas
                                                        [$descriptionText, $jumlah_mahasiswa] = explode(
                                                            '|||||',
                                                            $description,
                                                            2,
                                                        );
                                                    } else {
                                                        // Jika tidak ada '|||||', maka hanya ada deskripsi tanpa nomor surat tugas
                                                        $descriptionText = $description;
                                                        $jumlah_mahasiswa = null; // Tidak ada nomor surat tugas
                                                    }
                                                @endphp
                                                <div class="col-md-6">
                                                    <label for="jumlah_mahasiswa">Jumlah Mahasiswa</label>
                                                    <input type="text" class="form-control" name="jumlah_mahasiswa"
                                                        value="{{ $jumlah_mahasiswa ?? 'N/A' }}" disabled>
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <div class="col-md-12">
                                                    <label for="description">Deskripsi</label>
                                                    <input class="form-control" name="description"
                                                        value="{{ $descriptionText }}" disabled>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-md-12">
                                                    <label for="description">Deskripsi</label>
                                                    <input class="form-control" name="description"
                                                        value="{{ $descriptionText }}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- End of individual card -->
                                @endforeach
                            @else
                                <div class="mb-3 row justify-content">
                                    <div class="">
                                        <div class="border card border-danger">
                                            <div class="card-body text-center">
                                                <p class="card-text text-danger">Belum ada bimbingan</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </section>

                        <div class="mb-3 row">
                            <h6>Certificate</h6>
                            @if ($currentData->UserCertificate->count() > 0)
                                <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Perusahaan</th>
                                            <th>ID Kredensial</th>
                                            <th>URL Kredensial</th>
                                            <th>Tanggal Mulai</th>
                                            <th>Tanggal Selesai</th>
                                            <th>Deskripsi</th>
                                            <!-- Add more table headers as needed -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($currentData->UserCertificate as $portofolio)
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
                                <div class="mb-3 row justify-content">
                                    <div class="">
                                        <div class="border card border-danger">
                                            <div class="card-body text-center">
                                                <p class="card-text text-danger">Belum ada data untuk ditampilkan.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <br>
                        <div class="mb-3 row">
                            <h6>Bahasa</h6>
                            @if ($currentData->UserLanguage->count() > 0)
                                <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>Bahasa</th>
                                            <th>Kemampuan</th>
                                            <!-- Add more table headers as needed -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($currentData->UserLanguage as $portofolio)
                                            <tr>
                                                <td>{{ $portofolio->MLanguage->name }}</td>
                                                <td>{{ $portofolio->proficiency }}</td>
                                                <!-- Add more table data as needed -->
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="mb-3 row justify-content">
                                    <div class="">
                                        <div class="border card border-danger">
                                            <div class="card-body text-center">
                                                <p class="card-text text-danger">Belum ada data untuk ditampilkan.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="mb-3 row">
                            <h6>Kelas yang Aktif</h6>
                            @php
                                $hasActiveCourses = false;
                            @endphp

                            @foreach ($currentData->courseClassMembers as $portofolio)
                                @if (isset($portofolio->courseClass) &&
                                        !is_null($portofolio->courseClass) &&
                                        $portofolio->courseClass->status_ongoing == 1)
                                    @php
                                        $hasActiveCourses = true;
                                    @endphp
                                    <p class='active_course'>{{ $portofolio->courseClass->slug }}</p>
                                @endif
                            @endforeach

                            @if (!$hasActiveCourses)
                                <div class="mb-3 row justify-content">
                                    <div class="">
                                        <div class="border card border-danger">
                                            <div class="card-body text-center">
                                                <p class="card-text text-danger">Belum ada data untuk ditampilkan.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="mb-3 row">
                            <h6>Kelas yang telah Diselesaikan</h6>
                            @php
                                $hasActiveCourses = false;
                            @endphp

                            @foreach ($currentData->courseClassMembers as $portofolio)
                                @if (isset($portofolio->courseClass) &&
                                        !is_null($portofolio->courseClass) &&
                                        $portofolio->courseClass->status_ongoing == 2)
                                    @php
                                        $hasActiveCourses = true;
                                    @endphp
                                    <p class='active_course'>{{ $portofolio->courseClass->slug }}</p>
                                @endif
                            @endforeach

                            @if (!$hasActiveCourses)
                                <div class="mb-3 row justify-content">
                                    <div class="">
                                        <div class="border card border-danger">
                                            <div class="card-body text-center">
                                                <p class="card-text text-danger">Belum ada data untuk ditampilkan.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

@section('script')
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
@endsection
