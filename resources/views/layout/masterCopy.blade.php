<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MA | @yield('title')</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.5.0/dist/semantic.min.css" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Roboto:wght@400;500;700;900&display=swap">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-multiselect.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.css">

    <!-- Font Awesome (Alternatif CDN) -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.0/css/all.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Bootstrap5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!-- Semantic UI -->
    <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.5.0/dist/semantic.min.js"></script>

    <!-- CK Editor -->
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

    <!-- Alpine JS -->
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://unpkg.com/alpinejs@3.13.10/dist/cdn.min.js" defer></script>

    <!-- Multiselect -->
    <script src="{{ asset('js/bootstrap-multiselect.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap-multiselect.js') }}"></script>

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <!-- Extra -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    @yield('styles')

    <style>
        .dashboard-bg {
            background-color: #232E66 !important;
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
        }

        .btn-transparent:hover {
            background-color: #FBB041;
            border: none;
            color: #FFF;
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
            <ul class="nav nav-pills flex-column mt-2 mt-sm-0" id="menu">
                <!-- Dashboard -->
                <li class="nav-item py-2 py-sm-0">
                    <a href="{{ url('/') }}" class="nav-link text-white" aria-current="page">
                        <i class="fa fa-house logoDash"></i>
                        <span class="ms-2">Dashboard</span>
                    </a>
                </li>

                <!-- Master -->
                <li class="nav-item">
                    <a class="btn btn-transparent btnMaster text-white" data-bs-toggle="collapse" href="#multiCollapseMaster" role="button" aria-expanded="false" aria-controls="multiCollapseMaster">
                        <i class="fa fa-book logoMaster"></i>
                        <span class="ms-2">Master</span>
                    </a>
                    <div class="colMaster">
                        <div class="collapse multi-collapse" id="multiCollapseMaster">
                            <div class="list-group">
                                <a href="{{ route('getCourse') }}" class="list-group-item list-group-item-action active" aria-current="true">Course</a>
                                <a href="{{ route('getSession') }}" class="list-group-item list-group-item-action">Session</a>
                                <a href="{{ route('getPartner') }}" class="list-group-item list-group-item-action">Partners</a>
                            </div>
                        </div>
                    </div>
                </li>

                <!-- Class -->
                <li class="nav-item">
                    <a class="btn btn-transparent btnClass text-white" data-bs-toggle="collapse" href="#multiCollapseClass" role="button" aria-expanded="false" aria-controls="multiCollapseClass">
                        <i class="fa fa-graduation-cap logoClass"></i>
                        <span class="ms-2">Class</span>
                    </a>
                    <div class="colClass">
                        <div class="collapse multi-collapse" id="multiCollapseClass">
                            <div class="list-group">
                                <a href="{{ route('getCourseClass') }}" class="list-group-item list-group-item-action active" aria-current="true">Class</a>
                                <a href="{{ route('certificate-templates.index') }}" class="list-group-item list-group-item-action">Certificate Template</a>
                                <a href="{{ route('getCCMH') }}" class="list-group-item list-group-item-action">Student Tracker</a>
                                <a href="{{ route('getCCMHGrade') }}" class="list-group-item list-group-item-action">Grade Assignment</a>
                            </div>
                        </div>
                    </div>
                </li>

                <!-- User & Access -->
                <li class="nav-item">
                    <a class="btn btn-transparent btnUser text-white" data-bs-toggle="collapse" href="#multiCollapseUser" role="button" aria-expanded="false" aria-controls="multiCollapseUser">
                        <i class="fa fa-shield logoUser"></i>
                        <span class="ms-2">User & Access</span>
                    </a>
                    <div class="collapse multi-collapse" id="multiCollapseUser">
                        <div class="colUser">
                            <div class="list-group">
                                <a href="{{ route('getUser') }}" class="list-group-item list-group-item-action active">Users</a>
                                <a href="{{ route('getAccessGroup') }}" class="list-group-item list-group-item-action">Access Group</a>
                                <a href="{{ route('getAccessMaster') }}" class="list-group-item list-group-item-action">Access Master</a>
                                <a href="#" class="list-group-item list-group-item-action">Need Help?</a>
                            </div>
                        </div>
                    </div>
                </li>

                <!-- Order -->
                <li class="nav-item">
                    <a class="btn btn-transparent btnOrder text-white" data-bs-toggle="collapse" href="#multiCollapseOrder" role="button" aria-expanded="false" aria-controls="multiCollapseOrder">
                        <i class="fa fa-shopping-cart logoOrder"></i>
                        <span class="ms-2">Order</span>
                    </a>
                    <div class="collapse multi-collapse" id="multiCollapseOrder">
                        <div class="colOrder">
                            <div class="list-group">
                                <a href="{{ route('getTransOrder') }}" class="list-group-item list-group-item-action active">Orders</a>
                                <a href="{{ route('getVoucher') }}" class="list-group-item list-group-item-action">Vouchers</a>
                            </div>
                        </div>
                    </div>
                </li>

                <!-- Settings -->
                <li class="nav-item">
                    <a class="btn btn-transparent btnSet text-white" data-bs-toggle="collapse" href="#multiCollapseSet" role="button" aria-expanded="false" aria-controls="multiCollapseSet">
                        <i class="fa fa-gear logoSet"></i>
                        <span class="ms-2">Settings</span>
                    </a>
                    <div class="collapse multi-collapse" id="multiCollapseSet">
                        <div class="colSet">
                            <div class="list-group">
                                <a href="{{ route('getGeneral') }}" class="list-group-item list-group-item-action active">General</a>
                                <a href="{{ route('getMaxyTalk') }}" class="list-group-item list-group-item-action">Maxy Talk</a>
                            </div>
                        </div>
                    </div>
                </li>

                <!-- Members -->
                <li class="nav-item">
                    <a class="btn btn-transparent btnMember text-white" data-bs-toggle="collapse" href="#multiCollapseMembers" role="button" aria-expanded="false" aria-controls="multiCollapseMembers">
                        <i class="fa fa-user logoMember"></i>
                        <span class="ms-2">Members</span>
                    </a>
                    <div class="collapse multi-collapse" id="multiCollapseMembers">
                        <div class="colMember">
                            <div class="list-group">
                                <a href="{{ route('getTestimonial') }}" class="list-group-item list-group-item-action active">Testimonial</a>
                                <a href="{{ route('getRedeemCode') }}" class="list-group-item list-group-item-action">Redeem Code</a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="col-10">
            @yield('content')
        </div>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const closeIcons = document.querySelectorAll('.message .close.icon');

            closeIcons.forEach(function(icon) {
                icon.addEventListener('click', function() {
                    this.closest('.message').remove();
                });
            });
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
    </script>
</body>

</html>
@endauth