<header class="main-nav">
    <nav>
        <div class="main-navbar">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                    </li>
                    <li class="sidebar-main-title">
                    </li>
                    <li class="dropdown mt-5">
                    </li>
                     <li class="dropdown"><a class="nav-link menu-title link-nav" href="{{route('dashboard')}}"><span>Dashboard</span></a></li>

                    <li class="dropdown"><a class="nav-link menu-title link-nav {{routeActive('category.*')}}" href="{{route('category.index')}}"><span>Category</span></a></li>

                    <li class="dropdown"><a class="nav-link menu-title link-nav {{routeActive('slider.*')}}" href="{{route('slider.index')}}"><span>Slider</span></a></li>

                    <li class="dropdown"><a class="nav-link menu-title link-nav {{routeActive('testimonial.*')}}" href="{{route('testimonial.index')}}"><span>Testimonial</span></a></li>

                    <li class="dropdown"><a class="nav-link menu-title link-nav {{routeActive('about.*')}}" href="{{route('about.index')}}"><span>About Us</span></a></li>

                    <li class="dropdown"><a class="nav-link menu-title link-nav {{routeActive('pages.*')}}" href="{{route('pages.index')}}"><span>Page</span></a></li>

                    <li class="dropdown"><a class="nav-link menu-title link-nav {{routeActive('social-media.*')}}" href="{{route('social-media.index')}}"><span>Social Media</span></a></li>

                    <li class="dropdown"><a class="nav-link menu-title link-nav {{routeActive('general-setting.*')}}" href="{{route('general-setting.index')}}"><span>General Setting</span></a></li>

                    <li class="dropdown"><a class="nav-link menu-title link-nav {{routeActive('user.*')}}" href="{{route('user.index')}}"><span>User</span></a></li>

                    <li class="dropdown"><a class="nav-link menu-title link-nav {{routeActive('roles.*')}}" href="{{route('roles.index')}}"><span>User Role</span></a></li>

                    <li class="dropdown"><a class="nav-link menu-title link-nav {{routeActive('clear')}}" href="{{route('clear')}}"><span>Cache Clear</span></a></li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>
