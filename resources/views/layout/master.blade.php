<html>
    <head>
        <title>MA | @yield('title')</title>
        <link rel="stylesheet" href="{{ asset("css/style.css") }}">
        <link href="https://cdn.jsdelivr.net/npm/semantic-ui@2.5.0/dist/semantic.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/bootstrap-multiselect.css" type="text/css">
    </head>
    <body>
        <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.5.0/dist/semantic.min.js"></script>        
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script type="text/javascript" src="/js/bootstrap-multiselect.js"></script>
        @if (Auth::user())
            <div style="padding: 12px;">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="#">
                        <img src="{{ asset('img/maxy_logo.jpg') }}" width="30" height="30" alt="" style="margin-left: 12px;">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                  
                    <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('getDashboard')}}">Dashboard<span class="sr-only"></span></a>
                            </li>
                            <li class="nav-item">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        All Course
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        @if ($broGotAccessMaster->contains('name', 'course_manage'))
                                            <a class="dropdown-item" href="{{ route('getCourse') }}">Course</a>
                                        @else
                                            <a class="dropdown-item disabled" href="{{ route('getCourse') }}">Course <i class="lock icon"></i></a>
                                        @endif
                                        @if ($broGotAccessMaster->contains('name', 'course_module_manage'))
                                            <a class="dropdown-item" href="{{ route('getCourseModule') }}">Course Module</a>
                                        @else
                                            <a class="dropdown-item disabled" href="{{ route('getCourseModule') }}">Course Module <i class="lock icon"></i></a>
                                        @endif
                                        <div class="dropdown-divider"></div>
                                        @if ($broGotAccessMaster->contains('name', 'course_class_manage'))
                                            <a class="dropdown-item" href="{{ route('getCourseClass') }}">Course Class</a>
                                        @else
                                            <a class="dropdown-item disabled" href="{{ route('getCourseClass') }}">Course Class <i class="lock icon"></i></a>
                                        @endif
                                        @if ($broGotAccessMaster->contains('name', 'course_class_member_manage'))
                                            <a class="dropdown-item" href="{{ route('getCourseClassMember') }}">Course Class Member</a>
                                        @else
                                            <a class="dropdown-item disabled" href="{{ route('getCourseClassMember') }}">Course Class Member <i class="lock icon"></i></a>
                                        @endif
                                        @if ($broGotAccessMaster->contains('name', 'course_class_module_manage'))
                                            <a class="dropdown-item" href="{{ route('getCourseClassModule') }}">Course Class Module</a>
                                        @else
                                            <a class="dropdown-item disabled" href="{{ route('getCourseClassModule') }}">Course Class Module <i class="lock icon"></i></a>
                                        @endif
                                        <div class="dropdown-divider"></div>
                                        @if ($broGotAccessMaster->contains('name', 'course_package_manage'))
                                            <a class="dropdown-item" href="{{ route('getCoursePackage') }}">Course Package</a>
                                        @else
                                            <a class="dropdown-item disabled" href="{{ route('getCoursePackage') }}">Course Package <i class="lock icon"></i></a>
                                        @endif
                                        @if ($broGotAccessMaster->contains('name', 'course_package_benefit_manage'))
                                            <a class="dropdown-item" href="{{ route('getCoursePackageBenefit') }}">Course Package Benefit</a>
                                        @else
                                            <a class="dropdown-item disabled" href="{{ route('getCoursePackageBenefit') }}">Course Package Benefit <i class="lock icon"></i></a>
                                        @endif
                                        <div class="dropdown-divider"></div>
                                        @if ($broGotAccessMaster->contains('name', 'm_difficulty_type_manage'))
                                            <a class="dropdown-item" href="{{ route('getDifficulty')}}">Course Difficulty</a>
                                        @else
                                            <a class="dropdown-item disabled" href="{{ route('getDifficulty')}}">Course Difficulty <i class="lock icon"></i></a>
                                        @endif
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Need Help?</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        User & Access
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        @if ($broGotAccessMaster->contains('name', 'users_manage'))
                                            <a class="dropdown-item" href="{{ route('getUser') }}">Users</a>
                                        @else
                                            <a class="dropdown-item disabled" href="{{ route('getUser') }}">Users <i class="lock icon"></i></a>
                                        @endif
                                        @if ($broGotAccessMaster->contains('name', 'access_group_manage'))
                                            <a class="dropdown-item" href="{{ route('getAccessGroup') }}">Access Group</a>
                                        @else
                                            <a class="dropdown-item disabled" href="{{ route('getAccessGroup') }}">Access Group <i class="lock icon"></i></a>
                                        @endif
                                        @if ($broGotAccessMaster->contains('name', 'access_master_manage'))
                                            <a class="dropdown-item" href="{{ route('getAccessMaster') }}">Access Master</a>
                                        @else
                                            <a class="dropdown-item disabled" href="{{ route('getAccessMaster') }}">Access Master <i class="lock icon"></i></a>
                                        @endif
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Need Help?</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Partner
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        @if ($broGotAccessMaster->contains('name', 'partner_manage'))
                                            <a class="dropdown-item" href="{{ route('getPartner') }}">Partners</a>
                                        @else
                                            <a class="dropdown-item disabled" href="{{ route('getPartner') }}">Partners <i class="lock icon"></i></a>
                                        @endif
                                        @if ($broGotAccessMaster->contains('name', 'course_manage'))
                                            <a class="dropdown-item" href="{{ route('getPartnerUniversityDetail') }}">Partner University Detail</a>
                                        @else
                                            <a class="dropdown-item disabled" href="{{ route('getPartnerUniversityDetail') }}">Partner University Detail <i class="lock icon"></i></a>
                                        @endif
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Order
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        @if ($broGotAccessMaster->contains('name', 'trans_order_manage'))
                                            <a class="dropdown-item" href="{{ route('getTransOrder') }}">Orders</a>
                                        @else
                                            <a class="dropdown-item disabled" href="{{ route('getTransOrder') }}">Orders <i class="lock icon"></i></a>
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
        @endif
        @yield('content')
        <script>
            $('.message .close')
                .on('click', function() {
                    $(this)
                    .closest('.message')
                    .transition('fade');
            });
        </script>
    </body>
</html>