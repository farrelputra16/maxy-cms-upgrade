<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MA | @yield('title')</title>

    <!-- Memuat CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/semantic-ui@2.5.0/dist/semantic.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-multiselect.css') }}" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/0756825c13.js" crossorigin="anonymous"></script>

    <!-- Memuat jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <!-- Memuat Bootstrap CSS dan JS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <!-- Memuat DataTables JS -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.js"></script>

    <!-- Memuat Semantic UI JS -->
    <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.5.0/dist/semantic.min.js"></script>

    <!-- Memuat CKEditor -->
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

    <!-- Memuat Alpine JS -->
    <script src="https://unpkg.com/alpinejs@3.13.10/dist/cdn.min.js" defer></script>

    <!-- Memuat Bootstrap Multiselect JS -->
    <script type="text/javascript" src="{{ asset('js/bootstrap-multiselect.js') }}"></script>

    @yield('styles')
    <style>
        .dashboard-bg {
            background-color: #232E66;
            position: fixed;
            overflow-y: auto;
            top: 0;
            bottom: 0;
        }

        .dashboard-bg img {
            width: 150px;
            height: 55px;
            margin-top: 3rem;
            margin-left: .3rem;
            margin-bottom: 5rem;
        }

        .logoDash {
            margin-left: -1.8rem;
            margin-bottom: 1.5rem;
        }

        .dash {
            margin-top: -1rem;
        }

        .btn-transparent {
            background-color: transparent !important;
            border: none !important;
            color: #FFF;
        }

        .btn-transparent:hover {
            background-color: #FBB041;
            border: none !important;
            color: #FFF;
        }

        .btn-transparent:focus,
        .btn-transparent:active {
            border: none !important;
            outline: none !important;
        }

        .nav-link {
            text-decoration: none;
            display: block;
            padding: 10px;
            color: #FFF;
        }

        .nav-item i {
            margin-right: 10px;
            margin-top: 1rem;
        }

        .nav-link::before {
            content: '';
            display: inline-block;
            width: 24px;
            height: 24px;
            background: url('/path/to/your/icon.png') no-repeat center center;
            background-size: contain;
            vertical-align: middle;
            margin-right: 10px;
        }

        .nav-link:hover,
        .nav-link.active {
            background-color: #FBB041;
            color: #FFF;
            border-radius: 10px;
        }

        .btnMaster,
        .btnClass,
        .btnUser,
        .btnOrder,
        .btnSet,
        .btnMember {
            margin-top: 1rem;
            margin-left: 1.5rem;
            margin-bottom: .5rem;
            background-color: #232E66;
            color: #FFF;
            font-size: 14px;
        }

        li .nav-item {
            list-style-type: none;
            margin-bottom: .5rem;
        }

        .collapse .list-group-item {
            background-color: #232E66;
            color: #FFF;
            margin-left: 2.5rem;
            margin-bottom: .5rem;
            width: 110px;
            border: 1px solid #232E66;
        }

        .collapse .list-group-item:hover,
        .collapse .list-group-item:focus,
        .collapse .list-group-item.active {
            background-color: #FBB041;
            color: #FFF;
            border: none !important;
            outline: none !important;
        }

        .collapsing {
            background-color: #232E66;
            color: #FFF;
            margin-left: 2rem;
            width: auto;
            border: 1px solid #232E66;
        }

        .collapse.show {
            background-color: #232E66;
            color: #FFF;
            width: auto;
        }

        .active {
            background-color: #FBB041;
        }

        .submenu.active {
            background-color: #FBB041;
        }

        .nav-item.active .list-group-item .list-group-item-action {
            background-color: #FBB041;
            color: #FFF;
        }

        .active-submenu {
            background-color: #FBB041 !important;
        }
    </style>
</head>

<body>
    @auth
        <!-- Side Bar -->
        <div class="row">
            <div class="d-flex flex-column col-2 min-vh-100 dashboard-bg">
                <a class="text-white text-decoration-none d-flex align-items-center ms-4" role="button">
                    <img src="{{ asset('uploads/LogoMaxyBgWhite.png') }}" alt="">
                </a>
                <ul class="nav flex-column mt-2 mt-sm-0" id="menu">
                    <!-- Dashboard -->
                    <li class="nav-item py-2 py-sm-0">
                        <a href="{{ url('/') }}"
                            class="nav-link text-white {{ Route::is('getDashboard') ? 'active' : '' }}" aria-current="page">
                            <i class="fa fa-house logoDash"></i>
                            <span class="dash">Dashboard</span>
                        </a>
                    </li>

                    <!-- Profile -->
                    <li class="nav-item py-2 py-sm-0">
                        <a href="{{ url('/profile') }}"
                            class="nav-link text-white {{ Route::is('profile') ? 'active' : '' }}" aria-current="page">
                            <i class="fas fa-user-circle logoDash"></i>
                            <span class="dash">Profile</span>
                        </a>
                    </li>

                    <!-- Master -->
                    <li class="nav-item">
                        <a class="btn btn-transparent btnMaster text-white" data-bs-toggle="collapse" href="#">
                            <i class="fa fa-book logoMaster"></i>
                            <span class="ms-2">Master</span>
                        </a>
                        <ul class="colMaster collapse" id="subMaster">
                            <li class="nav-item">
                                <a href="{{ route('getCourse') }}"
                                    class="list-group-item list-group-item-action {{ Route::is('getCourse') ? 'active' : '' }}">Course</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('getCourseType') }}"
                                    class="list-group-item list-group-item-action {{ Route::is('getCourseType') ? 'active' : '' }}">Course
                                    Type</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('getCoursePackage') }}"
                                    class="list-group-item list-group-item-action {{ Route::is('getCoursePackage') ? 'active' : '' }}">Course
                                    Package</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('getDifficulty') }}"
                                    class="list-group-item list-group-item-action {{ Route::is('getDifficulty') ? 'active' : '' }}">Course
                                    Difficulty</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('getPartner') }}"
                                    class="list-group-item list-group-item-action {{ Route::is('getPartner') ? 'active' : '' }}">Partners</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('getCategory') }}"
                                    class="list-group-item list-group-item-action {{ Route::is('getCategory') ? 'active' : '' }}">Category</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('getProposalType') }}"
                                    class="list-group-item list-group-item-action {{ Route::is('getProposalType') ? 'active' : '' }}">Proposal
                                    Type</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('getProposalStatus') }}"
                                    class="list-group-item list-group-item-action {{ Route::is('getProposalStatus') ? 'active' : '' }}">Proposal
                                    Status</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('getEventType') }}"
                                    class="list-group-item list-group-item-action {{ Route::is('getEventType') ? 'active' : '' }}">Event
                                    Type</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('getPartnershipType') }}"
                                    class="list-group-item list-group-item-action {{ Route::is('getPartnershipType') ? 'active' : '' }}">Partnership
                                    Type</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('getSurvey') }}"
                                    class="list-group-item list-group-item-action {{ Route::is('getSurvey') ? 'active' : '' }}">Survey</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('getAcademicPeriod') }}" 
                                    class="list-group-item list-group-item-action {{ Route::is('getAcademicPeriod') ? 'active' : '' }}">Academic Period</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('getScore') }}" 
                                    class="list-group-item list-group-item-action {{ Route::is('getScore') ? 'active' : '' }}">Grade</a>
                            </li>
                        </ul>
                    </li>

                    <!-- Class -->
                    <li class="nav-item">
                        <a class="btn btn-transparent btnClass text-white" data-bs-toggle="collapse" href="#"
                            style="margin-left: 20px;">
                            <i class="fa fa-graduation-cap logoClass"></i>
                            <span class="ms-2">Class</span>
                        </a>
                        <ul class="colClass collapse" id="subClass">
                            <li class="nav-item">
                                <a href="{{ route('getCourseClass') }}"
                                    class="list-group-item list-group-item-action {{ Route::is('getCourseClass') ? 'active' : '' }}">Class</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('certificate-templates.index') }}"
                                    class="list-group-item list-group-item-action {{ Route::is('certificate-templates.index') ? 'active' : '' }}">Certificate
                                    Template</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('getCCMH') }}"
                                    class="list-group-item list-group-item-action {{ Route::is('getCCMH') ? 'active' : '' }}">Student
                                    Tracker</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('getGrade') }}"
                                    class="list-group-item list-group-item-action {{ Route::is('getCCMHGrade') ? 'active' : '' }}">Grade
                                    Assignment</a>
                            </li>
                        </ul>
                    </li>

                    <!-- Schedule -->
                    <li class="nav-item">
                        <a class="btn btn-transparent btnUser text-white" data-bs-toggle="collapse" href="#">
                            <i class="fa-solid fa-calendar"></i>
                            <span class="ms-2">Schedule</span>
                        </a>
                        <ul class="colUser collapse">
                            <li class="nav-item">
                                <a href="{{ route('getSchedule') }}"
                                    class="list-group-item list-group-item-action {{ Route::is('getSchedule') ? 'active' : '' }}">Schedule</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('getGeneralSchedule') }}"
                                    class="list-group-item list-group-item-action {{ Route::is('getGeneralSchedule') ? 'active' : '' }}">General Schedule</a>
                            </li>
                        </ul>
                    </li>

                    <!-- User & Access -->
                    <li class="nav-item">
                        <a class="btn btn-transparent btnUser text-white" data-bs-toggle="collapse" href="#">
                            <i class="fa fa-shield logoUser"></i>
                            <span class="ms-2">User & Access</span>
                        </a>
                        <ul class="colUser collapse">
                            <li class="nav-item">
                                <a href="{{ route('getUser') }}"
                                    class="list-group-item list-group-item-action {{ Route::is('getUser') ? 'active' : '' }}">Users</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('getAccessGroup') }}"
                                    class="list-group-item list-group-item-action {{ Route::is('getAccessGroup') ? 'active' : '' }}">Access
                                    Group</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('getAccessMaster') }}"
                                    class="list-group-item list-group-item-action {{ Route::is('getAccessMaster') ? 'active' : '' }}">Access
                                    Master</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="list-group-item list-group-item-action">Need Help?</a>
                            </li>
                        </ul>
                    </li>

                    <!-- Order -->
                    <li class="nav-item">
                        <a class="btn btn-transparent btnOrder text-white" data-bs-toggle="collapse" href="#">
                            <i class="fa fa-shopping-cart logoOrder"></i>
                            <span class="ms-2">Order</span>
                        </a>
                        <ul class="colOrder collapse">
                            <li class="nav-item">
                                <a href="{{ route('getTransOrder') }}"
                                    class="list-group-item list-group-item-action {{ Route::is('getTransOrder') ? 'active' : '' }}">Orders</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('getVoucher') }}"
                                    class="list-group-item list-group-item-action {{ Route::is('getVoucher') ? 'active' : '' }}">Vouchers</a>
                            </li>
                        </ul>
                    </li>

                    <!-- Settings -->
                    <li class="nav-item mt-1">
                        <a class="btn btn-transparent btnSet text-white" data-bs-toggle="collapse" href="#">
                            <i class="fa fa-gear logoSet"></i>
                            <span class="ms-2">Settings</span>
                        </a>
                        <ul class="colSet collapse">
                            <li class="nav-item">
                                <a href="{{ route('getGeneral') }}"
                                    class="list-group-item list-group-item-action {{ Route::is('getGeneral') ? 'active' : '' }}">General</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('getMaxyTalk') }}"
                                    class="list-group-item list-group-item-action {{ Route::is('getMaxyTalk') ? 'active' : '' }}">Maxy
                                    Talk</a>
                            </li>
                        </ul>
                    </li>

                    <!-- Members -->
                    <li class="nav-item ">
                        <a class="btn btn-transparent btnMember text-white d-inline-flex" data-bs-toggle="collapse" href="#">
                            <i class="fa fa-user logoMember mb-1"></i>
                            <span class="ms-2 mt-2">Members</span>
                        </a>
                        <ul class="colMember collapse mt-3">
                            <li class="nav-item">
                                <a href="{{ route('getTestimonial') }}"
                                    class="list-group-item list-group-item-action {{ Route::is('getTestimonial') ? 'active' : '' }}">Testimonial</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('getRedeemCode') }}"
                                    class="list-group-item list-group-item-action {{ Route::is('getRedeemCode') ? 'active' : '' }}">Redeem
                                    Code</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('getProposal') }}"
                                    class="list-group-item list-group-item-action {{ Route::is('getProposal') ? 'active' : '' }}">Proposal</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('getTranskrip') }}"
                                    class="list-group-item list-group-item-action {{ Route::is('getTranskrip') ? 'active' : '' }}">Transkrip</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown pt-2">
                        <a class="btn btn-transparent btnMember text-white d-inline-flex" data-bs-toggle="collapse" href="#">
                            <i class="fa-solid fa-file-pen mb-1"></i>
                            <span class="ms-2 mt-2">Content</span>
                        </a>
                        <ul class="colMember collapse mt-4">
                            <li class="nav-item">
                                <a href="{{ route('getCarousel') }}"
                                    class="list-group-item list-group-item-action {{ Route::is('getCarousel') ? 'active' : '' }}">Carousel</a>
                            </li>
                        </ul>
                        <ul class="colMember collapse">
                            <li class="nav-item">
                                <a href="{{ route('getEvent') }}"
                                    class="list-group-item list-group-item-action {{ Route::is('getEvent') ? 'active' : '' }}">Event</a>
                            </li>
                        </ul>
                        <ul class="colMember collapse">
                            <li class="nav-item">
                                <a href="{{ route('getPartnership') }}"
                                    class="list-group-item list-group-item-action {{ Route::is('getPartnership') ? 'active' : '' }}">Partnership</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <div class="content" style="padding-left: 17%;">
            @yield('content')
        </div>
        <!-- End of Side Bar -->

        @if (session()->has('messageP'))
            <div class="ui success message">
                <i class="close icon"></i>
                <div class="header">
                    Information:
                </div>
                <p>{{ session()->get('messageP') }}</p>
            </div>
        @endif

        @if (session()->has('messageW'))
            <div class="ui warning message">
                <i class="close icon"></i>
                <div class="header">
                    Information:
                </div>
                <p>{{ session()->get('messageW') }}</p>
            </div>
        @endif

        @if (session()->has('messageN'))
            <div class="ui negative message">
                <i class="close icon"></i>
                <div class="header">
                    Information:
                </div>
                <p>{{ session()->get('messageN') }}</p>
            </div>
        @endif
    </body>

    </html>

    @yield('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const closeIcons = document.querySelectorAll('.message .close.icon');

            closeIcons.forEach(function(icon) {
                icon.addEventListener('click', function() {
                    this.closest('.message').remove();
                });
            });

            // Script untuk bootstrap collapse
            $('.collapse').on('show.bs.collapse', function() {
                $(this).siblings('.btn-transparent').addClass('active');
            }).on('hide.bs.collapse', function() {
                $(this).siblings('.btn-transparent').removeClass('active');
            });

            // Script untuk menu Master
            jQuery(function($) {
                $('#Master').on('click', function(e) {
                    e.preventDefault();
                    $('#MasterMenu').toggleClass('show');
                });

                $(document).on('click', function(e) {
                    if (!$(e.target).closest('#Master').length && !$(e.target).closest(
                            '#MasterMenu').length) {
                        $('#MasterMenu').removeClass('show');
                    }
                });
            });

            // Script untuk btn-transparent toggle
            $('.btn-transparent').click(function(e) {
                e.preventDefault();
                var $this = $(this);
                var $collapse = $this.siblings('.collapse');
                $collapse.collapse('toggle');
                $this.toggleClass('active');

                // Hapus border dan outline jika ada
                $this.css('border', 'none');
                $this.css('outline', 'none');
            });
            $(document).ready(function() {
                // Ketika submenu diklik
                $('.nav-link, .list-group-item').on('click', function() {
                    // Hapus class active-submenu dari semua submenu
                    $('.nav-link, .list-group-item').removeClass('active-submenu');

                    // Tambahkan class active-submenu ke submenu yang diklik
                    $(this).addClass('active-submenu');
                });
            });

            // Script untuk menambahkan dan menghapus class active pada nav-link
            const links = document.querySelectorAll('.nav-link');

            // Smooth scroll for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    document.querySelector(this.getAttribute('href')).scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            });
        });
    </script>
@endauth
