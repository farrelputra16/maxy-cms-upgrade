<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>

                <li>
                    <a href="{{ route('getDashboard') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboard">Dasbor</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class='bx bx-book'></i>
                        <span key="t-master">Master</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('getCourse') }}" key="t-carousel">Kursus</a></li>
                        @if (env('APP_ENV') == 'local')
                            <li><a href="{{ route('getCourseMBKM') }}" key="t-carousel">MBKM</a></li>
                        @endif
                        @if ($userAccess == 'super')
                            <li><a href="{{ route('getCourseType') }}" key="t-testimonial">Tipe Kursus</a></li>
                            @if (env('APP_ENV') != 'local')
                            <li><a href="{{ route('getCoursePackage') }}" key="t-blog">Paket Kursus</a></li>
                            @endif
                            <li><a href="{{ route('getDifficulty') }}" key="t-blog">Tingkat Kesulitan Kursus</a></li>
                            <li><a href="{{ route('getPartner') }}" key="t-blog">Mitra</a></li>
                            <li><a href="{{ route('getCategory') }}" key="t-blog">Kategori Kursus</a></li>
                            <li><a href="{{ route('getProposalType') }}" key="t-blog">Jenis Proposal</a></li>
                            <li><a href="{{ route('getProposalStatus') }}" key="t-blog">Status Proposal</a></li>
                            <li><a href="{{ route('getEventType') }}" key="t-blog">Tipe Event</a></li>
                            <li><a href="{{ route('getPartnershipType') }}" key="t-blog">Tipe Kemitraan</a></li>
                            <li><a href="{{ route('getSurvey') }}" key="t-blog">Survei</a></li>
                            <li><a href="{{ route('getAcademicPeriod') }}" key="t-blog">Periode Akademik</a></li>
                            <li><a href="{{ route('getScore') }}" key="t-blog">TIngkat Penilaian</a></li>
                            <li><a href="{{ route('getJobdesc') }}" key="t-blog">Jobdesc</a></li>
                        @endif
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class='bx bxs-graduation'></i>
                        <span key="t-class">Kelas</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('getCourseClass') }}" key="t-class">Manajemen Kelas</a></li>
                        <li><a href="{{ route('certificate-templates.index') }}" key="t-certificate">Template Sertifikat</a></li>
                        {{-- <li><a href="{{ route('getCCMH') }}" key="t-student-tracker">Student Tracker</a></li> --}}
                        <li><a href="{{ route('getGrade') }}" key="t-grade-assignment">Penilaian Tugas</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class='bx bx-calendar-event'></i>
                        <span key="t-schedule">Jadwal</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('getSchedule') }}" key="t-schedule">Jadwal</a></li>
                        <li><a href="{{ route('getGeneralSchedule') }}" key="t-general-schedule">Jadwal Umum</a>
                        </li>
                    </ul>
                </li>

                @if ($userAccess == 'super')
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class='bx bx-lock-open'></i>
                            <span key="t-user-access">Pengguna & Akses</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('getUser') }}" key="t-user">Pengguna</a></li>
                            <li><a href="{{ route('getAccessGroup') }}" key="t-access-group">Grup Akses</a></li>
                            <li><a href="{{ route('getAccessMaster') }}" key="t-access-master">Hak Akses Utama</a></li>
                        </ul>
                    </li>
                    
                    @if (env('APP_ENV') != 'local')
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class='bx bx-cart'></i>
                            <span key="t-transaction">Transaksi</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('getTransOrder') }}" key="t-order">Pesanan</a></li>
                            <li><a href="{{ route('getVoucher') }}" key="t-voucher">Vouchers</a></li>
                        </ul>
                    </li>
                    @endif
                @endif

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class='bx bx-user-circle'></i>
                        <span key="t-member">Anggota</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        @if (env('APP_ENV') != 'local')
                            @if ($userAccess == 'super')
                                <li><a href="{{ route('getRedeemCode') }}" key="t-redeem-code">Redeem Code</a></li>
                            @endif
                        @endif
                        <li><a href="{{ route('getProposal') }}" key="t-proposal">Proposal</a></li>
                        <li><a href="{{ route('getTranskrip') }}" key="t-proposal">Transkrip</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-bar-chart-alt-2"></i>
                        <span key="t-content">Konten</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        @if ($userAccess == 'super')
                            @if (env('APP_ENV') != 'local')
                                <li><a href="{{ route('getCarousel') }}" key="t-carousel">Carousel</a></li>
                            @endif
                            <li><a href="{{ route('getEvent') }}" key="t-event">Event</a></li>
                            <li><a href="{{ route('getPartnership') }}" key="t-partnership">Kerja Sama</a></li>
                            @if (env('APP_ENV') != 'local')
                            <li><a href="{{ route('getTestimonial') }}" key="t-testimonial">Testimonial</a></li>
                            @endif
                        @endif
                        <li><a href="{{ route('getBlog') }}" key="t-blog">Blog</a></li>
                        <li><a href="{{ route('getBlogTag') }}" key="t-blog-tag">Tag Blog</a></li>
                    </ul>
                </li>

                @if ($userAccess == 'super')
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class='bx bx-cog'></i>
                            <span key="t-setting">Pengaturan</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('getGeneral') }}" key="t-general">Pengaturan Umum</a></li>
                            <li><a href="{{ route('getPages') }}" key="t-pages">Pages</a></li>
                            @if (env('APP_ENV') != 'local')
                                <li><a href="{{ route('getMaxyTalk') }}" key="t-maxy-talk">Maxy Talk</a></li>
                            @endif
                        </ul>
                    </li>
                @endif
                <li>
                    <a href="{{ route('profile') }}" class="waves-effect">
                        <i class="bx bx-info-circle"></i>
                        <span key="t-profile">Profil</span>
                    </a>
                </li>

                @if (Route::has('accredify.template.index'))
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class='bx bx-badge-check'></i>
                            <span key="t-accredify">Accredify</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('accredify.template.index') }}" key="t-template">Template</a></li>
                            <li><a href="{{ route('accredify.course.index') }}" key="t-course">Courses</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
