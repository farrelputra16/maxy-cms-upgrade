<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>MA | @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/semantic-ui@2.5.0/dist/semantic.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/bootstrap-multiselect.css') }}" type="text/css">
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/0756825c13.js" crossorigin="anonymous"></script>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    @yield('styles')

    <style>
        /*.dataTables_wrapper .dataTables_filter {*/
        /*    text-align: right;*/
        /*}*/
    </style>

</head>

<body>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.5.0/dist/semantic.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap-multiselect.js') }}"></script>
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>       
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap-multiselect.js') }}"></script>

    @auth
        <div class="p-3">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('img/maxy_logo.jpg') }}" width="30" height="30" alt=""
                        style="margin-left: 12px;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('getDashboard') }}">Dashboard<span
                                    class="sr-only"></span></a>
                        </li>
                        <li class="nav-item">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Master
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @if ($broGotAccessMaster->contains('name', 'course_manage'))
                                    <a class="dropdown-item" href="{{ route('getCourse') }}">Course</a>
                                @else
                                    <a class="dropdown-item disabled" href="{{ route('getCourse') }}">Course <i
                                            class="lock icon"></i></a>
                                @endif

                                @if ($broGotAccessMaster->contains('name', 'm_course_type_manage'))
                                    <a class="dropdown-item" href="{{ route('getCourseType') }}">Course Type</a>
                                @else
                                    <a class="dropdown-item disabled" href="{{ route('getCourseType') }}">
                                        Course Type <i class="lock icon"></i>
                                    </a>
                                @endif
                                
                                @if ($broGotAccessMaster->contains('name', 'course_package_manage'))
                                    <a class="dropdown-item" href="{{ route('getCoursePackage') }}">Course Package</a>
                                @else
                                    <a class="dropdown-item disabled" href="{{ route('getCoursePackage') }}">
                                        Course Package <i class="lock icon"></i>
                                    </a>
                                @endif
                                
                                
                                <!-- @if ($broGotAccessMaster->contains('name', 'course_package_benefit_manage'))
                                    <a class="dropdown-item" href="{{ route('getCoursePackageBenefit') }}">
                                        Course Package Benefit
                                    </a>
                                @else
                                    <a class="dropdown-item disabled"
                                        href="{{ route('getCoursePackageBenefit') }}">Course Package Benefit <i
                                            class="lock icon"></i>
                                    </a>
                                @endif -->
                                @if ($broGotAccessMaster->contains('name', 'm_difficulty_type_manage'))
                                    <a class="dropdown-item" href="{{ route('getDifficulty') }}">Course Difficulty</a>
                                @else
                                    <a class="dropdown-item disabled" href="{{ route('getDifficulty') }}">Course
                                        Difficulty <i class="lock icon"></i>
                                    </a>
                                @endif

                                @if ($broGotAccessMaster->contains('name', 'm_partner_manage'))
                                    <a class="dropdown-item" href="{{ route('getPartner') }}">Partners</a>
                                @else
                                    <a class="dropdown-item disabled" href="{{ route('getPartner') }}">
                                        Partners <i class="lock icon"></i>
                                    </a>
                                @endif

                                
                            </div>

                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Class
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <!-- <h6 class="dropdown-header">CLASS</h6>
                                <div class="dropdown-divider"></div> -->
                                @if ($broGotAccessMaster->contains('name', 'course_class_manage'))
                                    <a class="dropdown-item" href="{{ route('getCourseClass') }}">Class</a>
                                @else
                                    <a class="dropdown-item disabled" href="{{ route('getCourseClass') }}">Class <i
                                            class="lock icon"></i></a>
                                @endif

                                {{-- Harusnya ini ada pengecekan hak akses, tapi karena fitur access group dkk itu msh ngga jelas jadi ngga usah pakai dulu yaa --}}
                                <a class="dropdown-item" href="{{ route('certificate-templates.index') }}">Certificate Template</a>

                                @if ($broGotAccessMaster->contains('name', 'course_class_member_log_read'))
                                    <a class="dropdown-item" href="{{ route('getCCMH') }}">Student Tracker Server Side</a>
                                @else
                                    <a class="dropdown-item disabled" href="{{ route('getCCMH') }}">Student Tracker Server Side <i class="lock icon"></i></a>
                                @endif


                                @if ($broGotAccessMaster->contains('name', 'course_class_member_log_read'))
                                    <a class="dropdown-item" href="{{ route('getCCMH') }}">Student Tracker</a>
                                @else
                                    <a class="dropdown-item disabled" href="{{ route('getCCMH') }}">Student Tracker<i class="lock icon"></i></a>
                                @endif
                                @if ($broGotAccessMaster->contains('name', 'course_class_member_grading_manage'))
                                    <a class="dropdown-item" href="{{ route('getCCMHGrade') }}">Grade Asssignments</a>
                                @else
                                    <a class="dropdown-item disabled" href="{{ route('getCCMHGrade') }}">Grade Asssignments<i class="lock icon"></i></a>
                                @endif
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                User & Access
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @if ($broGotAccessMaster->contains('name', 'users_manage'))
                                    <a class="dropdown-item" href="{{ route('getUser') }}">Users</a>
                                @else
                                    <a class="dropdown-item disabled" href="{{ route('getUser') }}">Users <i
                                            class="lock icon"></i></a>
                                @endif
                                @if ($broGotAccessMaster->contains('name', 'access_group_manage'))
                                    <a class="dropdown-item" href="{{ route('getAccessGroup') }}">Access Group</a>
                                @else
                                    <a class="dropdown-item disabled" href="{{ route('getAccessGroup') }}">Access
                                        Group <i class="lock icon"></i></a>
                                @endif
                                @if ($broGotAccessMaster->contains('name', 'access_master_manage'))
                                    <a class="dropdown-item" href="{{ route('getAccessMaster') }}">Access Master</a>
                                @else
                                    <a class="dropdown-item disabled" href="{{ route('getAccessMaster') }}">Access
                                        Master <i class="lock icon"></i></a>
                                @endif
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Need Help?</a>
                            </div>
                        </li>
                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Partner
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @if ($broGotAccessMaster->contains('name', 'm_partner_manage'))
                                    <a class="dropdown-item" href="{{ route('getPartner') }}">Partners</a>
                                @else
                                    <a class="dropdown-item disabled" href="{{ route('getPartner') }}">Partners <i
                                            class="lock icon"></i></a>
                                @endif
                                @if ($broGotAccessMaster->contains('name', 'course_manage'))
                                    <a class="dropdown-item" href="{{ route('getPartnerUniversityDetail') }}">Partner
                                        University Detail</a>
                                @else
                                    <a class="dropdown-item disabled"
                                        href="{{ route('getPartnerUniversityDetail') }}">Partner University Detail <i
                                            class="lock icon"></i></a>
                                @endif
                            </div>
                        </li> -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Order
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @if ($broGotAccessMaster->contains('name', 'trans_order_manage'))
                                    <a class="dropdown-item" href="{{ route('getTransOrder') }}">Orders</a>
                                    <a class="dropdown-item" href="{{ route('getVoucher') }}">Vouchers</a>
                                @else
                                    <a class="dropdown-item disabled" href="{{ route('getTransOrder') }}">Orders <i
                                            class="lock icon"></i></a>
                                    <a class="dropdown-item disabled" href="{{ route('getVoucher') }}">Voucher <i
                                            class="lock icon"></i></a>
                                @endif
                            </div>

                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Settings
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @if ($broGotAccessMaster->contains('name', 'm_general_manage'))
                                    <a class="dropdown-item" href="{{ route('getGeneral') }}">General</a>
                                @else
                                    <a class="dropdown-item disabled" href="{{ route('getGeneral') }}">General <i
                                            class="lock icon"></i></a>
                                @endif
                                @if ($broGotAccessMaster->contains('name', 'maxy_talk_manage'))
                                    <a class="dropdown-item" href="{{ route('getMaxyTalk') }}">Maxy Talk</a>
                                @else
                                    <a class="dropdown-item disabled" href="{{ route('getMaxyTalk') }}">Maxy Talk <i
                                            class="lock icon"></i></a>
                                @endif
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Members
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @if ($broGotAccessMaster->contains('name', 'user_testimonial_manage'))
                                    <a class="dropdown-item" href="{{ route('getTestimonial') }}">Testimonial</a>
                                @else
                                    <a class="dropdown-item disabled"
                                        href="{{ route('getTestimonial') }}">Testimonial <i
                                            class="lock icon"></i></a>
                                @endif

                                @if ($broGotAccessMaster->contains('name', 'redeem_code_manage'))
                                    <a class="dropdown-item" href="{{ route('getRedeemCode') }}">Redeem Code</a>
                                @else
                                    <a class="dropdown-item disabled"
                                        href="{{ route('getRedeemCode') }}">Redeem Code <i
                                            class="lock icon"></i></a>
                                @endif
                            </div>
                        </li>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0 me-3" method="post" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
                    </form>
                </div>
            </nav>
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
        </div>
    @endauth

    @yield('content')

    @yield('scripts')
    <script>
        // $('.message .close')
        //     .on('click', function() {
        //         $(this)
        //             .closest('.message')
        //             .transition('fade');
        //     });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Cari semua ikon 'close' dan tambahkan event listener
            const closeIcons = document.querySelectorAll('.message .close.icon');

            closeIcons.forEach(function(icon) {
                icon.addEventListener('click', function() {
                    // Ambil parent dari ikon dan hapus elemen tersebut
                    this.closest('.message').remove();
                });
            });
        });
    </script>
</body>
</html>
