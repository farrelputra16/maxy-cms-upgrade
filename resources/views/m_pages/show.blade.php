@extends('m_pages.layouts.main')
@push('styles')
    <style>
        a {
            text-decoration: none;
        }

        .package {
            height: fit-content;
        }

        #program-area .card {
            box-shadow: none;
        }

        .owl-carousel .owl-stage-outer {
            background: transparent;
            height: fit-content;
        }

        /* Add custom styles if needed */
        .icon img {
            max-width: 100%;
            height: auto;
        }

        .card-title {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card {
            filter: none;
        }

        .sub-item {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            padding-top: 0px;
            padding-right: 6px;
            flex: 1;
        }

        .sub-item ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sub-item ul li {
            display: flex;
            align-items: center;
        }

        .spreadReview {
            margin-top: 25%;
        }

        .partner-img {
            max-width: 100%;
            /* Gambar tidak akan melebihi lebar div */
            max-height: 100%;
            /* Gambar tidak akan melebihi tinggi div */
            width: auto;
            /* Lebar gambar akan disesuaikan agar sesuai dengan tinggi div */
            height: auto;
            /* Tinggi gambar akan disesuaikan agar sesuai dengan lebar div */
        }

        .carousel-controls {
            text-align: center;
            margin-top: 20px;
        }

        .owl-carousel .item {
            padding: 15px;
        }

        .event-card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: none;
        }

        .owl-nav .bi {
            font-size: 30px;
            color: #FFB800;
        }

        .fixed-height-img {
            width: 100%;
            height: 200px;
            /* Sesuaikan tinggi gambar yang diinginkan */
            object-fit: cover;
            /* Menjaga proporsi gambar, tetapi memotong jika perlu */
            object-position: center;
            /* Memastikan gambar tetap berada di tengah */
        }


        .arrow-button {
            background-color: #cbc3c3;
            color: #fff;
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            font-size: 20px;
            margin: 0 10px;
            cursor: pointer;
        }

        .arrow-button:hover {
            background-color: #FFB800;
        }

        .student-content {
            margin-bottom: 5%;
            /* Atur jarak bawah sesuai kebutuhan Anda */
        }

        .faq-content {
            margin-top: -15%;
            /* Atur jarak atas sesuai kebutuhan Anda */
        }

        @media (max-width: 768px) {
            .icon {
                display: none;
            }

            .card-container {
                margin-left: 20px
            }
        }

        @media (min-width: 769px) {
            .icon img {
                max-width: none;
            }
        }

        @media (max-width: 767px) {
            .custom-tab-content {
                margin-top: -30%;
            }

            .col-lg-6 .month-learn {
                margin-top: -20%;
            }

            #testimonial1 p {
                font-size: 5px;
                /* Adjust font size as needed */
                margin-top: -95%;
            }

            #image1 img {
                max-width: 100%;
                /* Make the image fit the container width */
                margin-top: -20%;

            }

            #tab4 {
                margin-top: 150px;
                /* Ubah margin sesuai kebutuhan */
            }

            .btn-prog-rapid {
                margin-top: 20px;
                /* Tambahkan margin-bottom pada ukuran layar kecil */
            }

            .card.package {
                margin: -100px;
                /* Sesuaikan dengan jarak yang Anda inginkan */
                height: auto;
                /* Ubah tinggi paket agar bisa menyesuaikan kontennya */
            }
        }

        @media (min-width: 768px) and (max-width: 1024px) {
            .btn-prog-rapid {
                margin-top: 20px;
            }

            .custom-tab-content {
                margin-top: -10%;
            }

            .col-lg-6 .month-learn {
                margin-top: -10%;
            }

            #testimonial1 p {
                font-size: 10px;
                /* Adjust font size as needed */
                margin-top: -110%;
            }

            #image1 img {
                max-width: 400px;
                /* Make the image fit the container width */
                margin-top: -20%;

            }

            #tab4 {
                margin-top: 150px;
                /* Ubah margin sesuai kebutuhan */
            }

        }
    </style>
@endpush

@section('content')

    {{-- @php
        $general = \App\Models\MGeneral::getGeneral();
    @endphp --}}

    <!-- Home Section -->
    <section id="home" class="home pb-5 m-0">
        <div class="container">
            <div class="row pt-5">
                <div class=" col-lg-6 home-tagline pt-5">
                    @if (env('APP_ENV') == 'local')
                        <p style="color:#FFB800;font-weight:bold;font-size:1.2rem" class="text-start">Selamat Datang di
                            {{ env('APP_CLIENT') }} </p>
                        <h3 data-aos="fade-in">{{ env('APP_CLIENT') }}: <br> Sekolah Tinggi untuk Meraih <span
                                style="color:#0066FF" class="fw-bold">Kesuksesan</span> <br> Karir Anda
                        </h3>
                        <p> Wujudkan cita-cita dan bersiaplah untuk karir yang cemerlang<br>dengan bimbingan STIE Bina
                            Karya.</p>
                    @else
                        <p style="color:#FFB800;font-weight:bold;font-size:1.2rem" class="text-start">Selamat Datang di MAXY
                            Academy </p>
                        <h3 data-aos="fade-in">Maksimalkan <br><span style="color:#0066FF" class="fw-bold">potensi</span>
                            dan persiapkan karirmu bersama <br> MAXY Academy
                        </h3>
                        <p> Peluang mendapatkan magang di perusahaan mitra kami<br>melalui micro learning program.</p>
                    @endif
                    <div class="row">
                        <div class="col-lg-10">
                            <button onclick="window.location.href='{{ route('getPages') }}'" class="button-lms"
                                style="display: block; width: 100%;">Ayo Belajar Sekarang</button>
                        </div>
                        <div class="col-lg-3"></div>
                    </div>
                </div>
                <div class="col-lg-6 pt-4 d-flex">
                    <div class="banner-home-right d-none d-lg-block" data-aos="fade-in" style="margin:auto;">
                        @if (env('APP_ENV') == 'local')
                            <img src="{{ asset(env('APP_CLIENT_HOME_IMAGE')) }}" alt="Img Home" class="img-fluid">
                        @else
                            <img src="{{ asset('img/home.png') }}" alt="Img Home" class="img-fluid">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="total">
        <div class="container">
            <div class="row py-5">
                <div class="col-lg-1 d-md-none d-lg-block">
                    <span class="icon">
                        <img src="{{ config('app.url_backend') . '/uploads/icon1.png' }}" alt="" data-aos="fade-in">
                    </span>
                </div>
                @if (env('APP_ENV') != 'local')
                    <div class="col-lg-3 col-6">
                        <div class="row">
                            <h3 data-aos="zoom-in"> 2000+</h3>
                        </div>
                        <div class="row">
                            <p data-aos="zoom-in">Murid Maxy</p>
                        </div>
                    </div>
                    <div class="col-lg-2 col-6">
                        <div class="row">
                            <h3 data-aos="zoom-in">70+</h3>
                        </div>
                        <div class="row">
                            <p data-aos="zoom-in">Perusahaan Mitra <br> Maxy</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="row">
                            <h3 data-aos="zoom-in">200+</h3>
                        </div>
                        <div class="row">
                            <p data-aos="zoom-in">Universitas Mitra <br> Maxy</p>
                        </div>
                    </div>
                    <div class="col-lg-2 col-6">
                        <div class="row">
                            <h3 data-aos="zoom-in">85%</h3>
                        </div>
                        <div class="row">
                            <p data-aos="zoom-in">Alumni Mendapatkan Tempat Magang</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Partner Section -->
    <section id="partner" class="partner py-5">
        <div class="row">
            <div class="col-lg-12 mx-3">
                @if (env('APP_ENV') == 'local')
                    <h3 data-aos="fade-in">
                        {{ env('APP_CLIENT') }} bekerjasama dengan lebih dari
                        <span style="color:#0066FF"> 70+ perusahaan </span>terkemuka di Indonesia <br> untuk menghadirkan
                        program internship terarah
                    </h3>
                @else
                    <h3 data-aos="fade-in">
                        MAXY Academy bekerjasama dengan lebih dari
                        <span style="color:#0066FF"> 70+ perusahaan </span>terkemuka di Indonesia <br> untuk menghadirkan
                        program internship terarah
                    </h3>
                @endif

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel owl-theme partners-carousel">

                    {{-- Start Company Partner Logo --}}
                    @foreach ($allCompanyPartnerLogo as $item)
                        <div class="item box d-flex overflow-hidden justify-content-center align-items-center">
                            <img src="{{ config('app.url_backend') . '/uploads/partner/' . $item->logo }}"
                                alt="{{ $item->logo }}" class="partner-img object-fit-contain" style="object-fit:contain">
                        </div>
                    @endforeach
                    {{-- End Company Partner Logo --}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel owl-theme partners-carousel uni">

                    {{-- Start University Partner Logo --}}
                    @foreach ($allUniversityPartnerLogo as $item)
                        <div class="item box"
                            style="display:flex;overflow:hidden;align-items: center;justify-content:center">
                            <img src="{{ config('app.url_backend') . '/uploads/partner/' . $item->logo }}"
                                alt="{{ $item->logo }}" class="partner-img" style="size:auto">
                        </div>
                    @endforeach
                    {{-- End University Partner Logo --}}
                </div>
            </div>
        </div>
        <div class="pt-5" style="text-align:center">
            <!-- <button onclick="window.location.href='/products/professional-bootcamp'" class="btn btn-primary fw-bold">
                                                                                                                    Career Guidance
                                                                                                                </button> -->
            <button onclick="window.location.href='/partners'" class="button-tertiary-c my-2 me-2"
                style="max-width: 100%;">View All
            </button>
        </div>
    </section>

    <!-- Benefit Section -->
    <section id="benefit" class="benefit pt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 d-none d-md-block">
                    <div class="img-benefit" data-aos="fade-in">
                        <img src="{{ config('app.url_backend') . '/uploads/benefit.png' }}" alt=""
                            class="img-fluid">
                    </div>
                </div>
                @if (env('APP_ENV') != 'local')
                    <div class="col-md-6 py-5">
                        <h3 data-aos="fade-in">
                            Apa yang akan kamu <span class="text-primary">dapatkan?</span>
                        </h3>
                        <p class="sub" style="margin-left:5px" data-aos="zoom-out">Mahasiswa Akan Mendapatkan:</p>

                        <div class="card my-4 w-100" data-aos="zoom-out" style="margin-left:2px">
                            <div class="d-flex align-items-start p-1">
                                <div class="col-auto ms-2">
                                    <img src="{{ asset('img/check.png') }}" id="img-check" class="col-xs-5"
                                        alt="Check List">
                                </div>
                                <div class="col ms-2">
                                    <div class="mt-3">
                                        <h3 class="h5">Kesempatan belajar siap berkarir</h3>
                                        <p class="small">
                                            Dikemas dalam bentuk mini bootcamp yang telah teruji,
                                            mahasiswa akan mendapatkan pembelajaran intensif dengan
                                            para ahli selama satu bulan dengan praktek lapangan melalui proyek nyata.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card my-4 w-100" data-aos="zoom-out" style="margin-left:2px">
                            <div class="d-flex align-items-start p-1">
                                <div class="col-auto ms-2">
                                    <img src="{{ asset('img/check.png') }}" id="img-check" class="col-xs-5"
                                        alt="">
                                </div>
                                <div class="col ms-2">
                                    <div class="mt-3">
                                        <h3 class="h5">Akses magang</h3>
                                        <p class="small">Di minggu terakhir bootcamp, mahasiswa akan melalui internship
                                            matchmaking dengan perusahaan yang berpartner dengan MAXY Academy. </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card my-4 w-100" data-aos="zoom-out" style="margin-left:2px">
                            <div class="d-flex align-items-start p-1">
                                <div class="col-auto ms-2">
                                    <img src="{{ asset('img/check.png') }}" id="img-check" class="col-xs-5"
                                        alt="" data-aos="fade-in">
                                </div>
                                <div class="col ms-2">
                                    <div class="mt-3">
                                        <h3 class="h5">Akses MAXY community seumur hidup</h3>
                                        <p class="small">Para alumni MAXY Academy dapat mengakses semua
                                            konten dalam MAXY community kapan saja dan tanpa batasan waktu.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Program Section -->
    @if (env('APP_ENV') != 'local')
        <section id="program" class="program m-0 py-5">
            <div class="container h-100">
                <div class=" " data-aos="zoom-out">
                    <div class="" style="padding-left: 1%">
                        <h3 class="mb-2" style="font-size: 40px; font-weight: 600">
                            Program <span class="text-primary" style="font-size: 40px; font-weight: 600">Bootcamp
                                kami</span>
                        </h3>
                        <p style="color: #ABABAB; font-size: 18px;">Mari bergabung dengan kelas-kelas terbaik kami bersama
                            instruktur dan
                            lembaga terkenal kami.</p>
                        <ul class="nav nav-pills mt-5" id="pills-prog" role="tablist" style="">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link rounded-pill active" id="pills-all-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-all"
                                    aria-selected="false">Semua Kelas
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link rounded-pill" id="pills-rapid-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-rapid" type="button" role="tab"
                                    aria-controls="pills-rapid" aria-selected="true">Professional Bootcamp
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link rounded-pill" id="pills-mini-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-mini" type="button" role="tab"
                                    aria-controls="pills-mini" aria-selected="false">Mini Bootcamp
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content pt-5" id="pills-tabContent">
                    <div class="tab-pane fade" id="pills-rapid" role="tabpanel" aria-labelledby="pills-rapid-tab">
                        <section id="program-area">
                            <div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="owl-carousel owl-theme prog-carousel">
                                            {{-- Start Rapid Bootcamp Card --}}
                                            @foreach ($rapidBootcampCourse as $item)
                                                <div class="card" data-aos="fade-up">
                                                    <img src="{{ config('app.url_backend') . '/uploads/course_img/' . $item->course_image }}"
                                                        alt="course1" class="w-100">
                                                    <div class="card-body d-flex flex-column justify-content-between"
                                                        style="height: 50%;">
                                                        <div>
                                                            <h3
                                                                style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">
                                                                Rapid Bootcamp {{ $item->course_name }}</h3>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <span>
                                                                        <i class="fas fa-book"></i>&nbsp; Lesson :
                                                                        {{ $item->module_parents }}
                                                                    </span>
                                                                </div>
                                                                <div class="col-lg-6 ">
                                                                    <!-- <span><i class="fas fa-user-friends"></i> Students : </span> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="btn btn-primary w-100 text-center fs-6 fw-medium py-1"
                                                            style="border-radius: 7px;">
                                                            <a href="{{ route('browse-courses.show', ['type' => $item->course_type_slug, 'slug' => $item->slug, 'payment_link' => $item->payment_link]) }}"
                                                                class="text-white">Mulai Kelas</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            {{-- End Rapid Bootcamp Card --}}
                                        </div>
                                        <div class="carousel-controls">
                                            <button class="arrow-button left-button" onclick="prevSlide()"><i
                                                    class="bi bi-caret-left"></i></button>
                                            <button class="arrow-button right-button" onclick="nextSlide()"><i
                                                    class="bi bi-caret-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="tab-pane fade" id="pills-mini" role="tabpanel" aria-labelledby="pills-mini-tab">
                        <section id="program-area">
                            <div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="owl-carousel owl-theme prog-carousel">
                                            {{-- Start Mini Bootcamp Card --}}
                                            @foreach ($miniBootcampCourse as $item)
                                                <div class="card" data-aos="fade-up">
                                                    <img src="{{ config('app.url_backend') . '/uploads/course_img/' . $item->course_image }}"
                                                        alt="course1" class="">
                                                    <div class="card-body d-flex flex-column justify-content-between h-50">
                                                        <div>
                                                            <h3
                                                                style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">
                                                                {{ $item->course_name }}</h3>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <span><i class="fas fa-book"></i>&nbsp; Lesson :
                                                                        {{ $item->module_parents }}</span>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <!-- <span><i class="fas fa-user-friends"></i> Students : </span> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="btn btn-primary w-100 text-center fs-6 fw-medium py-1"
                                                            style="border-radius: 7px;">
                                                            <a href="{{ route('browse-courses.show', ['type' => $item->course_type_slug, 'slug' => $item->slug, 'payment_link' => $item->payment_link]) }}"
                                                                class="text-white">Mulai Kelas</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            {{-- End Mini Bootcamp Card --}}
                                        </div>
                                        <div class="carousel-controls">
                                            <button class="arrow-button left-button" onclick="prevSlide()"><i
                                                    class="bi bi-caret-left"></i></button>
                                            <button class="arrow-button right-button" onclick="nextSlide()"><i
                                                    class="bi bi-caret-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="tab-pane fade show active" id="pills-all" role="tabpanel"
                        aria-labelledby="pills-all-tab">
                        <section id="program-area">
                            <div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="owl-carousel owl-theme prog-carousel">
                                            {{-- Start Rapid Bootcamp List Card --}}
                                            @foreach ($rapidBootcampCourse as $item)
                                                <div class="card" data-aos="fade-up">
                                                    <img src="{{ config('app.url_backend') . '/uploads/course_img/' . $item->course_image }}"
                                                        alt="course1" class="">
                                                    <div class="card-body d-flex flex-column justify-content-between h-50">
                                                        <div>
                                                            <h3
                                                                style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">
                                                                Rapid Bootcamp {{ $item->course_name }}</h3>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <span>
                                                                        <i class="fas fa-book"></i>&nbsp; Lesson :
                                                                        {{ $item->module_parents }}
                                                                    </span>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <!-- <span><i class="fas fa-user-friends"></i> Students : </span> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="btn btn-primary w-100 text-center fs-6 fw-medium py-1"
                                                            style="border-radius: 7px;">
                                                            <a href="{{ route('browse-courses.show', ['type' => $item->course_type_slug, 'slug' => $item->slug, 'payment_link' => $item->payment_link]) }}"
                                                                class="text-white">Mulai Kelas </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            {{-- End Rapid Bootcamp List Card --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="row pt-4">
                                    <div class="col-md-12">
                                        <div class="owl-carousel owl-theme prog-carousel">
                                            {{-- Start Mini Bootcamp List Card --}}
                                            @foreach ($miniBootcampCourse as $item)
                                                <div class="card" data-aos="fade-up">
                                                    <img src="{{ config('app.url_backend') . '/uploads/course_img/' . $item->course_image }}"
                                                        alt="course1" class="">
                                                    <div class="card-body d-flex flex-column justify-content-between h-50">
                                                        <div>
                                                            <h3
                                                                style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">
                                                                {{ $item->course_name }}</h3>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <span><i class="fas fa-book"></i>&nbsp; Lesson :
                                                                        {{ $item->module_parents }} </span>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <!-- <span><i class="fas fa-user-friends"></i> Students : </span> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="btn btn-primary w-100 text-center fs-6 fw-medium py-1"
                                                            style="border-radius: 7px;">
                                                            <a href="{{ route('browse-courses.show', ['type' => $item->course_type_slug, 'slug' => $item->slug, 'payment_link' => $item->payment_link]) }}"
                                                                class="text-white">Mulai Kelas</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            {{-- End Mini Bootcamp List Card --}}

                                        </div>
                                        <div class="carousel-controls">
                                            <button class="arrow-button left-button" onclick="prevSlide()"><i
                                                    class="bi bi-caret-left"></i></button>
                                            <button class="arrow-button right-button" onclick="nextSlide()"><i
                                                    class="bi bi-caret-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- about us Section -->
    @if (env('APP_ENV') != 'local')
        <section id="aboutus" class="aboutus py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 tagline">
                        <h3 class="pt-5" data-aos="zoom-out">Inilah cara <span style="color:#FFB800;">kerjanya</span>
                        </h3>
                        <p class="py-4">MAXY Academy Bootcamp memberikan pengalaman bekerja nyata <br> bagi mahasiswa</p>
                        <div class="card" style="max-width: 100%;" data-aos="zoom-in">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-1">
                                        <div class="img-ellipse-work">
                                            <img src="{{ asset('img/ellipse-work.png') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-11">
                                        <h3>Akademi Bootcamp</h3>
                                        <p>Percepat keterampilan dan potensi karirmu dengan Mini Akademi Bootcamp kami,
                                            menawarkan perekrutan cepat dan mata pelajaran imersif seperti Pembuatan Konten
                                            Digital dan Hacking</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card my-4" style="max-width: 100%;" data-aos="zoom-in">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-1">
                                        <div class="img-ellipse-work">
                                            <img src="{{ asset('img/ellipse-work.png') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-11">
                                        <h3>Magang</h3>
                                        <p>Dapatkan peluang magang yang berharga melalui proses pencocokan, membuka jalan
                                            untuk
                                            pengalaman industri yang praktis</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card" style="max-width: 100%;" data-aos="zoom-in">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-1">
                                        <div class="img-ellipse-work">
                                            <img src="{{ asset('img/ellipse-work.png') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-11">
                                        <h3>Penempatan Magang Kerja Terjamin</h3>
                                        <p>MAXY Academy menjamin penempatan kerja melalui jaringan mitra perusahaan kami
                                            yang
                                            luas, memastikan peralihan mulus dari pembelajaran menuju karir yang sukses</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if (env('APP_ENV') != 'local')
        @include('partials.instructor')
    @endif

    <!-- EVENT -->
    @if (env('APP_ENV') == 'local')
        @if (count($upcomingEvents) > 0)
            <section id="event" class="event m-0 py-5 bg-light">
                <div class="container h-100">
                    <div class="text-center" data-aos="zoom-out">
                        <h3 class="mb-4" style="font-size: 40px; font-weight: 600">
                            <span class="text-primary" style="font-size: 40px; font-weight: 600">Events </span> Yang Akan
                            Datang
                        </h3>
                        <p style="color: #ABABAB; font-size: 18px;">
                            Jangan lewatkan kesempatan untuk mengikuti event menarik.
                        </p>
                    </div>

                    <div class="owl-carousel owl-theme event-carousel">
                        @if (count($upcomingEvents) > 1)
                            @foreach ($upcomingEvents as $event)
                                <div class="item">
                                    <div class="card event-card" style="width: 100%" data-aos="fade-up">
                                        <img src="{{ config('app.url_backend') . '/uploads/event/' . $event->image }}"
                                            alt="{{ $event->name }}" class="card-img-top fixed-height-img">
                                        <div class="card-body" align="center">
                                            <h6 class="card-title" style="height: 3.5rem">{{ $event->name }}</h6>
                                            <p class="event-date small">
                                                <i class="fas fa-calendar-alt"></i> :
                                                {{ \Carbon\Carbon::parse($event->date_start)->format('d F Y') }}
                                            </p>
                                            <div class="mt-3 text-center">
                                                <a href="{{ route('register-redirect-no-password', ['redirect' => 'lms/events?auto-click-profile-tab=true']) }}"
                                                    class="btn btn-primary rounded"
                                                    style="font-size: 16px; padding: 8px 16px; background-color: #1A2480; border-color: #1A2480;">
                                                    Register
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <!-- If only one event, center it -->
                            <div class="item" style="margin-left: auto; margin-right: auto;">
                                <div class="card event-card" style="width: 100%" data-aos="fade-up">
                                    <img src="{{ config('app.url_backend') . '/uploads/event/' . $upcomingEvents[0]->image }}"
                                        alt="{{ $upcomingEvents[0]->name }}" class="card-img-top fixed-height-img">
                                    <div class="card-body" align="center">
                                        <h6 class="card-title" style="height: 3.5rem">{{ $upcomingEvents[0]->name }}</h6>
                                        <p class="event-date small">
                                            <i class="fas fa-calendar-alt"></i> :
                                            {{ \Carbon\Carbon::parse($upcomingEvents[0]->date_start)->format('d F Y') }}
                                        </p>
                                        <div class="mt-3 text-center">
                                            <a href="{{ route('register-redirect-no-password', ['redirect' => 'lms/events?auto-click-profile-tab=true']) }}"
                                                class="btn btn-primary rounded"
                                                style="font-size: 16px; padding: 8px 16px; background-color: #1A2480; border-color: #1A2480;">
                                                Register
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </section>
        @endif
    @else
        @if (count($upcomingEvents) > 0)
            <section id="event" class="event m-0 py-5 bg-light">
                <div class="container h-100">
                    <div class="text-center" data-aos="zoom-out">
                        <h3 class="mb-4" style="font-size: 40px; font-weight: 600">
                            Upcoming <span class="text-primary" style="font-size: 40px; font-weight: 600">Events</span>
                        </h3>
                        <p style="color: #ABABAB; font-size: 18px;">
                            Jangan lewatkan kesempatan untuk mengikuti event menarik yang kami adakan.
                        </p>
                    </div>

                    <div class="owl-carousel owl-theme event-carousel">
                        @if (count($upcomingEvents) > 1)
                            @foreach ($upcomingEvents as $event)
                                <div class="item">
                                    <div class="card event-card" style="width: 100%" data-aos="fade-up">
                                        <img src="{{ config('app.url_backend') . '/uploads/event/' . $event->image }}"
                                            alt="{{ $event->name }}" class="card-img-top fixed-height-img">
                                        <div class="card-body" align="center">
                                            <h6 class="card-title" style="height: 3.5rem">{{ $event->name }}</h6>
                                            <p class="event-date small">
                                                <i class="fas fa-calendar-alt"></i> :
                                                {{ \Carbon\Carbon::parse($event->date_start)->format('d F Y') }}
                                            </p>
                                            <div class="mt-3 text-center">
                                                <a href="{{ route('register-redirect-no-password', ['redirect' => 'lms/events?auto-click-profile-tab=true']) }}"
                                                    class="btn btn-primary rounded"
                                                    style="font-size: 16px; padding: 8px 16px; background-color: #1A2480; border-color: #1A2480;">
                                                    Register
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <!-- If only one event, center it -->
                            <div class="item" style="margin-left: auto; margin-right: auto;">
                                <div class="card event-card" style="width: 100%" data-aos="fade-up">
                                    <img src="{{ config('app.url_backend') . '/uploads/event/' . $upcomingEvents[0]->image }}"
                                        alt="{{ $upcomingEvents[0]->name }}" class="card-img-top fixed-height-img">
                                    <div class="card-body" align="center">
                                        <h6 class="card-title" style="height: 3.5rem">{{ $upcomingEvents[0]->name }}</h6>
                                        <p class="event-date small">
                                            <i class="fas fa-calendar-alt"></i> :
                                            {{ \Carbon\Carbon::parse($upcomingEvents[0]->date_start)->format('d F Y') }}
                                        </p>
                                        <div class="mt-3 text-center">
                                            <a href="{{ route('register-redirect-no-password', ['redirect' => 'lms/events?auto-click-profile-tab=true']) }}"
                                                class="btn btn-primary rounded"
                                                style="font-size: 16px; padding: 8px 16px; background-color: #1A2480; border-color: #1A2480;">
                                                Register
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </section>
        @endif
    @endif

    <!-- ADS BANNER -->
    @if (env('APP_ENV') != 'local')
        <section id="banner-home" class="py-5">
            <div class="container-fluid p-0">
                <div class="w-100">
                    <img src="{{ asset('img/Banner_Web_Footer.png') }}" alt="Img Home" class="img-fluid w-100">
                </div>
            </div>
        </section>
    @endif
    <!-- END ADS BANNER -->

    @if (env('APP_ENV') != 'local')
        @include('partials.choose-plan')
        {{-- <x-review /> --}}
        <div class="spreadReview"></div>
    @endif

    @if (env('APP_ENV') != 'local')
        @include('partials.faq')
    @endif

    @if (env('APP_ENV') != 'local')
        {{-- <x-bermitra /> --}}
    @endif
@endsection

@push('scripts')
    <script>
        var appUrlBackend = "{{ config('app.url_backend') }}";
    </script>

    <script>
        var currentIndex = 0;
        var maxIndex = {{ count($rapidBootcampCourse) }} - 1; // Jumlah kartu minus 1

        function prevSlide() {
            if (currentIndex > 0) {
                currentIndex--;
            } else {
                currentIndex = maxIndex;
            }
            updateCarousel();
        }

        function nextSlide() {
            if (currentIndex < maxIndex) {
                currentIndex++;
            } else {
                currentIndex = 0;
            }
            updateCarousel();
        }

        function updateCarousel() {
            $('.prog-carousel').trigger('to.owl.carousel', currentIndex);
        }
    </script>
    <script>
        function showMoreBenefits(button) {
            const packageContainer = button.closest('.card.package');
            const additionalBenefits = packageContainer.querySelectorAll('.additional-benefit');
            const btnSeeMore = button;

            additionalBenefits.forEach(benefit => {
                if (benefit.style.display === 'none' || benefit.style.display === '') {
                    benefit.style.display = 'list-item';
                    // packageContainer.style.height = '100%';
                } else {
                    benefit.style.display = 'none';
                    packageContainer.removeAttribute("style");
                }
            });
            btnSeeMore.textContent = btnSeeMore.textContent === 'See Less' ? 'See More' : 'See Less';
        }
    </script>
    <script>
        $(document).ready(function() {
            // Initialize the carousel
            $('#packageCarousel').carousel();
        });
    </script>

    <!-- Carousel JS -->
    <script>
        $(document).ready(function() {
            $('.event-carousel').owlCarousel({
                loop: $('.event-carousel .item').length > 2,
                margin: 10,
                nav: true,
                dots: false,
                autoplay: true,
                autoplayTimeout: 5000,
                center: $('.event-carousel .item').length == 1,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 3
                    }
                },
                navText: [
                    '<i class="bi bi-caret-left"></i>',
                    '<i class="bi bi-caret-right"></i>'
                ]
            });
        });
    </script>
    <!-- End Carousel JS -->
@endpush
