<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>
                <li>
                    <a href="{{ route('agent.getDashboard') }}" class="waves-effect">
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
                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-bar-chart-alt-2"></i>
                        <span key="t-transaction">Content</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#" key="t-carousel">Carousel</a></li>
                        <li><a href="#" key="t-testimonial">Testimonial</a></li>
                        <li><a href="#" key="t-theme">Theme</a></li>
                    </ul>
                </li> --}}
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
