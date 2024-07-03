<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('images/logo.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="/" class="d-block">Admin Panel</a>
            </div>
        </div>


        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <!-- Sliders -->
                <li class="nav-item">
                    <a href="{{ route('slider.index') }}"
                        class="nav-link {{ request()->is('sliders') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Sliders</p>
                    </a>
                </li>

                <!-- Categories -->
                <li class="nav-item">
                    <a href="{{ route('category.index') }}"
                        class="nav-link {{ request()->is('categories') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Categories
                        </p>
                    </a>
                </li>

                <!-- Services -->
                <li class="nav-item">
                    <a href="{{ route('service.index') }}"
                        class="nav-link {{ request()->is('services') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Services
                        </p>
                    </a>
                </li>

                <!-- Testimonials -->
                <li class="nav-item">
                    <a href="{{ route('testimonial.index') }}"
                        class="nav-link {{ request()->is('testimonials') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tree"></i>
                        <p>
                            Testimonials
                        </p>
                    </a>
                </li>

                <!-- Business -->
                <li class="nav-item">
                    <a href="{{ route('business.index') }}"
                        class="nav-link {{ request()->is('businesses') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Business
                        </p>
                    </a>
                </li>

                <!-- Events -->
                <li class="nav-item">
                    <a href="{{ route('event.index') }}"
                        class="nav-link {{ request()->is('events') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Events
                        </p>
                    </a>
                </li>

                <!-- News -->
                <li class="nav-item">
                    <a href="{{ route('news.index') }}"
                        class="nav-link {{ request()->is('newses') ? 'active' : '' }}">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                            News
                        </p>
                    </a>
                </li>
            </ul>
        </nav>

    </div>
</aside>
