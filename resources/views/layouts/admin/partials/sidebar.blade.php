<style>
    .page-wrapper.compact-wrapper .page-body-wrapper header.main-nav .main-navbar .nav-menu .dropdown ul.nav-submenu li a.active {
        color: #24695c;
        font-weight: 600;
    }
</style>

<header class="main-nav">
    <nav>
        <div class="main-navbar">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                aria-hidden="true"></i></div>
                    </li>
                    <li class="sidebar-main-title"></li>
                    <li class="dropdown mt-5"></li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav" href="{{ route('dashboard') }}">
                            <span>Dashboard</span>
                        </a>
                    </li>

                    @can('category-list')
                        <li class="dropdown">
                            <a class="nav-link menu-title link-nav {{ routeActive('category.*') }}"
                                href="{{ route('category.index') }}">
                                <span>Category</span>
                            </a>
                        </li>
                    @endcan

                    @can('slider-list')
                        <li class="dropdown">
                            <a class="nav-link menu-title link-nav {{ routeActive('slider.*') }}"
                                href="{{ route('slider.index') }}">
                                <span>Slider</span>
                            </a>
                        </li>
                    @endcan

                    @can('testimonial-list')
                        <li class="dropdown">
                            <a class="nav-link menu-title link-nav {{ routeActive('testimonial.*') }}"
                                href="{{ route('testimonial.index') }}">
                                <span>Testimonial</span>
                            </a>
                        </li>
                    @endcan

                    @can('about-list')
                        <li class="dropdown">
                            <a class="nav-link menu-title link-nav {{ routeActive('about.*') }}"
                                href="{{ route('about.index') }}">
                                <span>About Us</span>
                            </a>
                        </li>
                    @endcan

                    @can('pages-list')
                        <li class="dropdown">
                            <a class="nav-link menu-title link-nav {{ routeActive('pages.*') }}"
                                href="{{ route('pages.index') }}">
                                <span>Page Management</span>
                            </a>
                        </li>
                    @endcan

                    @can('social_media-list')
                        <li class="dropdown">
                            <a class="nav-link menu-title link-nav {{ routeActive('social-media.*') }}"
                                href="{{ route('social-media.index') }}">
                                <span>Social Media</span>
                            </a>
                        </li>
                    @endcan

                    @can('general_setting-list')
                        <li class="dropdown">
                            <a class="nav-link menu-title link-nav {{ routeActive('general-setting.*') }}"
                                href="{{ route('general-setting.index') }}">
                                <span>General Setting</span>
                            </a>
                        </li>
                    @endcan

                    @canany(['user-list', 'role-list'])
                        <li class="dropdown {{ Route::is('user.*', 'roles.*') ? 'open' : '' }}">
                            <a class="nav-link menu-title {{ Route::is('user.*', 'roles.*') ? 'active' : '' }}"
                                href="javascript:void(0)">
                                <span>User Management</span>
                            </a>
                            <ul class="nav-submenu menu-content"
                                style="{{ Route::is('user.*', 'roles.*') ? 'display: block;' : '' }}">
                                @can('user-list')
                                    <li>
                                        <a href="{{ route('user.index') }}" class="{{ routeActive('user.*') }}">User</a>
                                    </li>
                                @endcan
                                @can('role-list')
                                    <li>
                                        <a href="{{ route('roles.index') }}" class="{{ routeActive('roles.*') }}">User
                                            Role</a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcanany

                    @can('clear_cache-list')
                        <li class="dropdown">
                            <a class="nav-link menu-title link-nav {{ routeActive('clear') }}"
                                href="{{ route('clear') }}">
                                <span>Cache Clear</span>
                            </a>
                        </li>
                    @endcan
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const container = document.querySelector(".custom-scrollbar");
        const activeItem = container.querySelector("a.active");

        if (activeItem && container) {
            const offsetTop = activeItem.getBoundingClientRect().top - container.getBoundingClientRect().top;
            container.scrollTop = offsetTop - container.clientHeight / 2;
        }
    });
</script>
