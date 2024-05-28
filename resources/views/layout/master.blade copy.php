<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MA | @yield('title')</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/semantic-ui@2.5.0/dist/semantic.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="{{ asset('css/bootstrap-multiselect.css') }}" type="text/css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.css">

    <!-- Bootstrap5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/0756825c13.js" crossorigin="anonymous"></script>

    <!-- Semantic UI -->
    <link href="https://cdn.jsdelivr.net/npm/semantic-ui@2.5.0/dist/semantic.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.5.0/dist/semantic.min.js"></script>

    <!-- CK Editor -->
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

    <!-- Alpine JS -->
    <script src="https://unpkg.com/alpinejs@3.13.10/dist/cdn.min.js" defer></script>

    <!-- Multiselect -->
    <script type="text/javascript" src="{{ asset('js/bootstrap-multiselect.js') }}"></script>

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Extra -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    @yield('styles')

    <style>
        .dashboard-bg {
            background-color: #232E66;
            position: fixed;
            overflow-y: scroll;
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
            padding-left: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .btn-transparent {
            background-color: transparent !important;
            border: none;
            color: #FFF;
            outline: none;
        }

        .btn-transparent:hover {
            background-color: #FBB041;
            color: #FFF;
        }

        .btn-transparent.active {
            border-color: transparent !important;
        }

        .btnMaster,
        .btnClass,
        .btnUser,
        .btnOrder,
        .btnSet,
        .btnMember {
            margin-top: 1rem;
            margin-left: 2rem;
            margin-bottom: .5rem;
            background-color: #232E66;
            color: #FFF;
            font-size: 14px;
            border: none;
            border-color: #232E66;
        }

        .collapse .list-group-item {
            background-color: #232E66;
            color: #FFF;
            margin-left: 2rem;
            margin-bottom: .5rem;
            width: 150px;
            border: 1px solid #232E66;
        }

        .collapse .list-group-item:hover {
            background-color: #FBB041;
            color: #FFF;
        }

        .collapse .list-group {
            background-color: #232E66;
        }

        .nav-item {
            list-style-type: none;
            border: 0px;

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
                    <a href="{{ url('/') }}" class="nav-link text-white" aria-current="page">
                        <i class="fa fa-house logoDash"></i>
                        <span class="ms-2">Dashboard</span>
                    </a>
                </li>

                <!-- Master -->
                <li class="nav-item">
                    <a class="btn btn-transparent btnMaster text-white" data-bs-toggle="collapse" href="#">
                        <i class="fa fa-book logoMaster"></i>
                        <span class="ms-2">Master</span>
                    </a>
                    <ul class="colMaster collapse">
                        <li class="nav-item">
                            <a href="{{ route('getCourse') }}" class="list-group-item list-group-item-action">Course</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('getCourseType') }}" class="list-group-item list-group-item-action">Course Type</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('getCoursePackage') }}" class="list-group-item list-group-item-action">Course Package</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('getDifficulty') }}" class="list-group-item list-group-item-action">Course Difficulty</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('getPartner') }}" class="list-group-item list-group-item-action">Partners</a>
                        </li>
                    </ul>
                </li>

                <!-- Class -->
                <li class="nav-item">
                    <a class="btn btn-transparent btnClass text-white" data-bs-toggle="collapse" href="#">
                        <i class="fa fa-graduation-cap logoClass"></i>
                        <span class="ms-2">Class</span>
                    </a>
                    <ul class="colClass collapse">
                        <li class="nav-item">
                            <a href="{{ route('getCourseClass') }}" class="list-group-item list-group-item-action">Class</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('certificate-templates.index') }}" class="list-group-item list-group-item-action">Certificate Template</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('getCCMH') }}" class="list-group-item list-group-item-action">Student Tracker</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('getCCMHGrade') }}" class="list-group-item list-group-item-action">Grade Assignment</a>
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
                            <a href="{{ route('getUser') }}" class="list-group-item list-group-item-action">Users</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('getAccessGroup') }}" class="list-group-item list-group-item-action">Access Group</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('getAccessMaster') }}" class="list-group-item list-group-item-action">Access Master</a>
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
                            <a href="{{ route('getTransOrder') }}" class="list-group-item list-group-item-action">Orders</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('getVoucher') }}" class="list-group-item list-group-item-action">Vouchers</a>
                        </li>
                    </ul>
                </li>

                <!-- Settings -->
                <li class="nav-item">
                    <a class="btn btn-transparent btnSet text-white" data-bs-toggle="collapse" href="#">
                        <i class="fa fa-gear logoSet"></i>
                        <span class="ms-2">Settings</span>
                    </a>
                    <ul class="colSet collapse">
                        <li class="nav-item">
                            <a href="{{ route('getGeneral') }}" class="list-group-item list-group-item-action">General</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('getMaxyTalk') }}" class="list-group-item list-group-item-action">Maxy Talk</a>
                        </li>
                    </ul>
                </li>

                <!-- Members -->
                <li class="nav-item">
                    <a class="btn btn-transparent btnMember text-white" data-bs-toggle="collapse" href="#">
                        <i class="fa fa-user logoMember"></i>
                        <span class="ms-2">Members</span>
                    </a>
                    <ul class="colMember collapse">
                        <li class="nav-item">
                            <a href="{{ route('getTestimonial') }}" class="list-group-item list-group-item-action">Testimonial</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('getRedeemCode') }}" class="list-group-item list-group-item-action">Redeem Code</a>
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

    @yield('scripts')
    <!-- jQuery (Bootstrap requires this version) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <!-- Semantic UI JS -->
    <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.5.0/dist/semantic.min.js"></script>
    <!-- CKEditor -->
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <!-- Alpine JS -->
    <script src="https://unpkg.com/alpinejs@3.13.10/dist/cdn.min.js" defer></script>
    <!-- Bootstrap Multiselect JS -->
    <script type="text/javascript" src="{{ asset('js/bootstrap-multiselect.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const closeIcons = document.querySelectorAll('.message .close.icon');

            closeIcons.forEach(function(icon) {
                icon.addEventListener('click', function() {
                    this.closest('.message').remove();
                });
            });
        });

        $('.collapse').on('show.bs.collapse', function() {
            $(this).siblings('.btn-transparent').addClass('active');
        }).on('hide.bs.collapse', function() {
            $(this).siblings('.btn-transparent').removeClass('active');
        });

        jQuery(function($) {
            $('#Master').on('click', function(e) {
                e.preventDefault();
                $('#MasterMenu').toggleClass('show');
            });

            $('#MasterMenu .nav-link').on('click', function(e) {
                e.stopPropagation();
                $('#MasterMenu').removeClass('show');
            });

            $(document).on('click', function(e) {
                if (!$(e.target).closest('#Master').length && !$(e.target).closest('#MasterMenu').length) {
                    $('#MasterMenu').removeClass('show');
                }
            });
        });

        $('.btn-transparent').click(function(e) {
            e.preventDefault();
            var $this = $(this);
            var $collapse = $this.siblings('.collapse');
            $collapse.collapse('toggle');
            $this.toggleClass('active');
        });
    </script>
</body>

</html>
@endauth