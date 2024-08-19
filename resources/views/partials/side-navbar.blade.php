<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>
                <li>
                    <a href="{{ route('getDashboard2') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboard">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('agent.getContent') }}" class="waves-effect">
                        <i class="bx bx-info-circle"></i>
                        <span key="t-content">Content</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('agent.getTestimonial') }}" class="waves-effect">
                        <i class='bx bx-line-chart'></i>
                        <span key="t-content">Testimonial</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('agent.getColor') }}" class="waves-effect">
                        <i class="bx bx-palette"></i>
                        <span key="t-color">Color</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('agent.getSetting') }}" class="waves-effect">
                        <i class="bx bx-cog"></i>
                        <span key="t-setting">Setting</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-bar-chart-alt-2"></i>
                        <span key="t-transaction">Content</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#" key="t-carousel">Carousel</a></li>
                        <li><a href="#" key="t-testimonial">Testimonial</a></li>
                        <li><a href="{{ route('getBlog') }}" key="t-blog">Blog</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{ url('/profile') }}" class="waves-effect">
                        <i class="fas fa-user-circle logoDash"></i>
                        <span key="t-setting">Profile</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fa fa-book logoMaster"></i>
                        <span key="t-transaction">Master</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('getCourse') }}" key="t-carousel">Course</a></li>
                        <li><a href="{{ route('getCourseType') }}" key="t-testimonial">Course Type</a></li>
                        <li><a href="{{ route('getCoursePackage') }}" key="t-blog">Course Package</a></li>
                        <li><a href="{{ route('getDifficulty') }}" key="t-blog">Course Difficulty</a></li>
                        <li><a href="{{ route('getPartner') }}" key="t-blog">Partners</a></li>
                        <li><a href="{{ route('getCategory') }}" key="t-blog">Category</a></li>
                        <li><a href="{{ route('getProposalType') }}" key="t-blog">Proposal Type</a></li>
                        <li><a href="{{ route('getProposalStatus') }}" key="t-blog">Proposal Status</a></li>
                        <li><a href="{{ route('getEventType') }}" key="t-blog">Event Type</a></li>
                        <li><a href="{{ route('getPartnershipType') }}" key="t-blog">Partnership Type</a></li>
                        <li><a href="{{ route('getSurvey') }}" key="t-blog">Survey</a></li>
                        
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fa fa-graduation-cap logoClass"></i>
                        <span key="t-transaction">Class</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('getCourseClass') }}" key="t-carousel">Class</a></li>
                        <li><a href="{{ route('certificate-templates.index') }}" key="t-carousel">Certificate Template</a></li>
                        <li><a href="{{ route('getCCMH') }}" key="t-carousel">Student Tracker</a></li>
                        <li><a href="{{ route('getCCMHGrade') }}" key="t-carousel">Grade Assignment</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fa-solid fa-calendar"></i>
                        <span key="t-transaction">Schedule</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('getSchedule') }}" key="t-carousel">Schedule</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fa fa-shield logoUser"></i>
                        <span key="t-transaction">User & Access</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('getUser') }}" key="t-carousel">Users</a></li>
                        <li><a href="{{ route('getAccessGroup') }}" key="t-carousel">Access Group</a></li>
                        <li><a href="{{ route('getAccessMaster') }}" key="t-carousel">Access Master</a></li>
                        <li><a href="#" key="t-carousel">Need Help?</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fa fa-shopping-cart logoOrder"></i>
                        <span key="t-transaction">Order</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('getTransOrder') }}" key="t-carousel">Orders</a></li>
                        <li><a href="{{ route('getVoucher') }}" key="t-carousel">Vouchers</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fa fa-gear logoSet"></i>
                        <span key="t-transaction">Settings</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('getGeneral') }}" key="t-blog">General</a></li>
                        <li><a href="{{ route('getMaxyTalk') }}" key="t-blog">Maxy Talk</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fa fa-user logoMember"></i>
                        <span key="t-transaction">Members</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('getTestimonial') }}" key="t-blog">Testimonial</a></li>
                        <li><a href="{{ route('getRedeemCode') }}" key="t-blog">Redeem Code</a></li>
                        <li><a href="{{ route('getProposal') }}" key="t-blog">Proposal</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fa-solid fa-file-pen"></i>
                        <span key="t-transaction">Content</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('getCarousel') }}" key="t-carousel">Carousel</a></li>
                        <li><a href="{{ route('getEvent') }}" key="t-carousel">Event</a></li>
                        <li><a href="{{ route('getPartnership') }}" key="t-carousel">Partnership</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
