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
                        <a class="nav-link menu-title link-nav" href="<?php echo e(route('dashboard')); ?>">
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav <?php echo e(routeActive('category.*')); ?>"
                            href="<?php echo e(route('category.index')); ?>">
                            <span>Category</span>
                        </a>
                    </li>

                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav <?php echo e(routeActive('slider.*')); ?>"
                            href="<?php echo e(route('slider.index')); ?>">
                            <span>Slider</span>
                        </a>
                    </li>

                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav <?php echo e(routeActive('testimonial.*')); ?>"
                            href="<?php echo e(route('testimonial.index')); ?>">
                            <span>Testimonial</span>
                        </a>
                    </li>

                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav <?php echo e(routeActive('about.*')); ?>"
                            href="<?php echo e(route('about.index')); ?>">
                            <span>About Us</span>
                        </a>
                    </li>

                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav <?php echo e(routeActive('pages.*')); ?>"
                            href="<?php echo e(route('pages.index')); ?>">
                            <span>Page</span>
                        </a>
                    </li>

                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav <?php echo e(routeActive('social-media.*')); ?>"
                            href="<?php echo e(route('social-media.index')); ?>">
                            <span>Social Media</span>
                        </a>
                    </li>

                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav <?php echo e(routeActive('general-setting.*')); ?>"
                            href="<?php echo e(route('general-setting.index')); ?>">
                            <span>General Setting</span>
                        </a>
                    </li>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['user-list', 'role-list'])): ?>
                        <li class="dropdown <?php echo e(Route::is('user.*', 'roles.*') ? 'open' : ''); ?>">
                            <a class="nav-link menu-title <?php echo e(Route::is('user.*', 'roles.*') ? 'active' : ''); ?>"
                                href="javascript:void(0)">
                                <span>User Management</span>
                            </a>
                            <ul class="nav-submenu menu-content"
                                style="<?php echo e(Route::is('user.*', 'roles.*') ? 'display: block;' : ''); ?>">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user-list')): ?>
                                    <li>
                                        <a href="<?php echo e(route('user.index')); ?>" class="<?php echo e(routeActive('user.*')); ?>">User</a>
                                    </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role-list')): ?>
                                    <li>
                                        <a href="<?php echo e(route('roles.index')); ?>" class="<?php echo e(routeActive('roles.*')); ?>">User
                                            Role</a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                    <?php endif; ?>

                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav <?php echo e(routeActive('clear')); ?>"
                            href="<?php echo e(route('clear')); ?>">
                            <span>Cache Clear</span>
                        </a>
                    </li>
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
<?php /**PATH C:\xampp\htdocs\RealEstate\resources\views/layouts/admin/partials/sidebar.blade.php ENDPATH**/ ?>