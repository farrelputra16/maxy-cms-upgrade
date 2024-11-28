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

                @if (Session::has('access_master') &&
                        Session::get('access_master')->contains(function ($access) {
                            return in_array($access->access_master_name, [
                                'course_manage',
                                'm_course_type_manage',
                                'course_package_manage',
                                'm_difficulty_type_manage',
                                'm_partner_manage',
                                'category_manage',
                                'm_proposal_type_manage',
                                'm_proposal_status_manage',
                                'm_event_type_manage',
                                'm_partnership_type_manage',
                                'm_survey_manage',
                                'm_academic_period_manage',
                                'm_score_manage',
                                'm_jobdesc_manage',
                            ]);
                        }))
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class='bx bx-book'></i>
                            <span key="t-master">Master</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            @if (Session::has('access_master') && Session::get('access_master')->contains('access_master_name', 'course_manage'))
                                <li><a href="{{ route('getCourse') }}" key="t-carousel">Mata Kuliah</a></li>
                            @endif
                            @if (env('APP_ENV') == 'local')
                                @if (Session::has('access_master') && Session::get('access_master')->contains('access_master_name', 'course_manage'))
                                    <li><a href="{{ route('getCourseMBKM') }}" key="t-carousel">MBKM</a></li>
                                @endif
                            @endif
                            @if (Session::has('access_master') &&
                                    Session::get('access_master')->contains('access_master_name', 'm_course_type_manage'))
                                <li><a href="{{ route('getCourseType') }}" key="t-testimonial">Tipe Mata Kuliah</a></li>
                            @endif
                            @if (env('APP_ENV') != 'local')
                                @if (Session::has('access_master') &&
                                        Session::get('access_master')->contains('access_master_name', 'course_package_manage'))
                                    <li><a href="{{ route('getCoursePackage') }}" key="t-blog">Paket Mata Kuliah</a>
                                    </li>
                                @endif
                            @endif
                            @if (Session::has('access_master') &&
                                    Session::get('access_master')->contains('access_master_name', 'm_difficulty_type_manage'))
                                <li><a href="{{ route('getDifficulty') }}" key="t-blog">Tingkat Kesulitan Mata
                                        Kuliah</a></li>
                            @endif
                            @if (Session::has('access_master') && Session::get('access_master')->contains('access_master_name', 'm_partner_manage'))
                                <li><a href="{{ route('getPartner') }}" key="t-blog">Mitra</a></li>
                            @endif
                            @if (Session::has('access_master') && Session::get('access_master')->contains('access_master_name', 'category_manage'))
                                <li><a href="{{ route('getCategory') }}" key="t-blog">Program Studi</a></li>
                            @endif
                            @if (Session::has('access_master') &&
                                    Session::get('access_master')->contains('access_master_name', 'm_proposal_type_manage'))
                                <li><a href="{{ route('getProposalType') }}" key="t-blog">Jenis Proposal</a></li>
                            @endif
                            @if (Session::has('access_master') &&
                                    Session::get('access_master')->contains('access_master_name', 'm_proposal_status_manage'))
                                <li><a href="{{ route('getProposalStatus') }}" key="t-blog">Status Proposal</a></li>
                            @endif
                            @if (Session::has('access_master') &&
                                    Session::get('access_master')->contains('access_master_name', 'm_event_type_manage'))
                                <li><a href="{{ route('getEventType') }}" key="t-blog">Tipe Event</a></li>
                            @endif
                            @if (Session::has('access_master') &&
                                    Session::get('access_master')->contains('access_master_name', 'm_partnership_type_manage'))
                                <li><a href="{{ route('getPartnershipType') }}" key="t-blog">Tipe Kemitraan</a></li>
                            @endif
                            @if (Session::has('access_master') &&
                                    Session::get('access_master')->contains('access_master_name', 'm_partner_type_manage'))
                                <li><a href="{{ route('getPartnerType') }}" key="t-blog">Tipe Mitra</a></li>
                            @endif
                            @if (Session::has('access_master') && Session::get('access_master')->contains('access_master_name', 'm_survey_manage'))
                                <li><a href="{{ route('getSurvey') }}" key="t-blog">Survei</a></li>
                            @endif
                            @if (Session::has('access_master') &&
                                    Session::get('access_master')->contains('access_master_name', 'm_academic_period_manage'))
                                <li><a href="{{ route('getAcademicPeriod') }}" key="t-blog">Periode Akademik</a></li>
                            @endif
                            @if (Session::has('access_master') && Session::get('access_master')->contains('access_master_name', 'm_score_manage'))
                                <li><a href="{{ route('getScore') }}" key="t-blog">Bobot Penilaian</a></li>
                            @endif
                            @if (Session::has('access_master') && Session::get('access_master')->contains('access_master_name', 'm_jobdesc_manage'))
                                <li><a href="{{ route('getJobdesc') }}" key="t-blog">Deskripsi Pekerjaan</a></li>
                            @endif
                        </ul>
                    </li>
                @endif

                @if (Session::has('access_master') &&
                        Session::get('access_master')->contains(function ($access) {
                            return in_array($access->access_master_name, ['course_class_manage', 'course_class_member_grading_manage']);
                        }))
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class='bx bxs-graduation'></i>
                            <span key="t-class">Kelas</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            @if (Session::has('access_master') &&
                                    Session::get('access_master')->contains('access_master_name', 'course_class_manage'))
                                <li><a href="{{ route('getCourseClass') }}" key="t-class">Manajemen Kelas</a></li>
                            @endif
                            <li><a href="{{ route('certificate-templates.index') }}" key="t-certificate">Template
                                    Sertifikat</a></li>
                            {{-- <li><a href="{{ route('getCCMH') }}" key="t-student-tracker">Student Tracker</a></li> --}}
                            @if (Session::has('access_master') &&
                                    Session::get('access_master')->contains('access_master_name', 'course_class_member_grading_manage'))
                                <li><a href="{{ route('getGrade') }}" key="t-grade-assignment">Penilaian Tugas</a></li>
                            @endif
                        </ul>
                    </li>
                @endif

                @if (Session::has('access_master') &&
                        Session::get('access_master')->contains(function ($access) {
                            return in_array($access->access_master_name, ['schedule_read', 'schedule_manage']);
                        }))
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class='bx bx-calendar-event'></i>
                            <span key="t-schedule">Jadwal</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            @if (Session::has('access_master') && Session::get('access_master')->contains('access_master_name', 'schedule_read'))
                                <li><a href="{{ route('getSchedule') }}" key="t-schedule">Jadwal</a></li>
                            @endif
                            @if (Session::has('access_master') && Session::get('access_master')->contains('access_master_name', 'schedule_manage'))
                                <li><a href="{{ route('getGeneralSchedule') }}" key="t-general-schedule">Jadwal
                                        Umum</a></li>
                            @endif
                        </ul>
                    </li>
                @endif

                @if (Session::has('access_master') &&
                        Session::get('access_master')->contains(function ($access) {
                            return in_array($access->access_master_name, [
                                'users_manage',
                                'access_group_manage',
                                'access_master_manage',
                            ]);
                        }))
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class='bx bx-universal-access'></i>
                            <span key="t-user-access">Pengguna & Akses</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            @if (Session::has('access_master') && Session::get('access_master')->contains('access_master_name', 'users_manage'))
                                <li><a href="{{ route('getUser') }}" key="t-user">Pengguna</a></li>
                            @endif
                            @if (Session::has('access_master') &&
                                    Session::get('access_master')->contains('access_master_name', 'access_group_manage'))
                                <li><a href="{{ route('getAccessGroup') }}" key="t-access-group">Hak Grup Akses
                                        (Peran)</a></li>
                            @endif
                            @if (Session::has('access_master') &&
                                    Session::get('access_master')->contains('access_master_name', 'access_master_manage'))
                                <li><a href="{{ route('getAccessMaster') }}" key="t-access-master">Hak Akses Utama</a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif

                @if (Session::has('access_master') &&
                        Session::get('access_master')->contains(function ($access) {
                            return in_array($access->access_master_name, ['trans_order_manage', 'trans_voucher_manage']);
                        }))
                    @if (env('APP_ENV') != 'local')
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class='bx bx-cart'></i>
                                <span key="t-transaction">Transaksi</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                @if (Session::has('access_master') &&
                                        Session::get('access_master')->contains('access_master_name', 'trans_order_manage'))
                                    <li><a href="{{ route('getTransOrder') }}" key="t-order">Pesanan</a></li>
                                @endif
                                @if (Session::has('access_master') &&
                                        Session::get('access_master')->contains('access_master_name', 'trans_voucher_manage'))
                                    <li><a href="{{ route('getVoucher') }}" key="t-voucher">Vouchers</a></li>
                                @endif
                            </ul>
                        </li>
                    @endif
                @endif

                @if (Session::has('access_master') &&
                        Session::get('access_master')->contains(function ($access) {
                            return in_array($access->access_master_name, ['redeem_code_manage', 'proposal_manage', 'transkrip_read']);
                        }))
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class='bx bx-user-circle'></i>
                            <span key="t-member">Mahasiswa</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            @if (env('APP_ENV') != 'local')
                                @if (Session::has('access_master') &&
                                        Session::get('access_master')->contains('access_master_name', 'redeem_code_manage'))
                                    <li><a href="{{ route('getRedeemCode') }}" key="t-redeem-code">Redeem Code</a></li>
                                @endif
                            @endif
                            @if (Session::has('access_master') && Session::get('access_master')->contains('access_master_name', 'proposal_manage'))
                                <li><a href="{{ route('getProposal') }}" key="t-proposal">Proposal</a></li>
                            @endif
                            @if (Session::has('access_master') && Session::get('access_master')->contains('access_master_name', 'transkrip_read'))
                                <li><a href="{{ route('getTranskrip') }}" key="t-proposal">Transkrip</a></li>
                            @endif
                        </ul>
                    </li>
                @endif

                @if (Session::has('access_master') &&
                        Session::get('access_master')->contains(function ($access) {
                            return in_array($access->access_master_name, [
                                'carousel_manage',
                                'event_manage',
                                'partnership_manage',
                                'user_testimonial_manage',
                            ]);
                        }))
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bxs-bar-chart-alt-2"></i>
                            <span key="t-content">Konten</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            @if (env('APP_ENV') != 'local')
                                @if (Session::has('access_master') && Session::get('access_master')->contains('access_master_name', 'carousel_manage'))
                                    <li><a href="{{ route('getCarousel') }}" key="t-carousel">Carousel</a></li>
                                @endif
                            @endif
                            @if (Session::has('access_master') && Session::get('access_master')->contains('access_master_name', 'event_manage'))
                                <li><a href="{{ route('getEvent') }}" key="t-event">Event</a></li>
                            @endif
                            @if (Session::has('access_master') &&
                                    Session::get('access_master')->contains('access_master_name', 'partnership_manage'))
                                <li><a href="{{ route('getPartnership') }}" key="t-partnership">Kerja Sama</a></li>
                            @endif
                            @if (Session::has('access_master') &&
                                    Session::get('access_master')->contains('access_master_name', 'user_testimonial_manage'))
                                @if (env('APP_ENV') != 'local')
                                    <li><a href="{{ route('getTestimonial') }}" key="t-testimonial">Testimonial</a>
                                    </li>
                                @endif
                            @endif
                            <li><a href="{{ route('getBlog') }}" key="t-blog">Blog</a></li>
                            <li><a href="{{ route('getBlogTag') }}" key="t-blog-tag">Tag Blog</a></li>
                        </ul>
                    </li>
                @endif

                @if (Session::has('access_master') &&
                        Session::get('access_master')->contains(function ($access) {
                            return in_array($access->access_master_name, ['m_general_manage', 'maxy_talk_manage']);
                        }))
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class='bx bx-cog'></i>
                            <span key="t-setting">Pengaturan</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            @if (Session::has('access_master') && Session::get('access_master')->contains('access_master_name', 'm_general_manage'))
                                <li><a href="{{ route('getGeneral') }}" key="t-general">Pengaturan Umum</a></li>
                            @endif
                            <li><a href="{{ route('getPages') }}" key="t-pages">Halaman</a></li>
                            @if (env('APP_ENV') != 'local')
                                @if (Session::has('access_master') && Session::get('access_master')->contains('access_master_name', 'maxy_talk_manage'))
                                    <li><a href="{{ route('getMaxyTalk') }}" key="t-maxy-talk">Maxy Talk</a></li>
                                @endif
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
