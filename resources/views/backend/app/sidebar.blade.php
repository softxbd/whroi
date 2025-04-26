@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
@endphp
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('dashboard') }}" class="app-brand-link">
            <span class="app-brand-text demo menu-text fw-bold ms-2">WHRO</span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="bx menu-toggle-icon d-none d-xl-block fs-4 align-middle"></i>
            <i class="bx bx-x d-block d-xl-none bx-sm align-middle"></i>
        </a>
    </div>
    <div class="menu-divider mt-0"></div>
    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-1">

        <!-- Dashboards -->
        <li class="menu-item">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home"></i>
                <div>Dashboard</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="{{ route('edit.homepage.banner') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div>Homepage Banner</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-food-menu"></i>
                <div>Stay Healthy</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('edit.stay.healthy') }}" class="menu-link">
                        <div>Stay Healthy</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('add.stay.healthy.point')}}" class="menu-link">
                        <div>Add Section</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a  href="{{route('manage.stay.healthy.point')}}" class="menu-link">
                        <div>Manage Section</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item">
            <a href="{{ route('edit.our.story') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div>Our Story</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="{{ route('edit.how.we.use.funds') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div>How we use funds</div>
            </a>
        </li>


        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-food-menu"></i>
                <div>Why Choose Us</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('create.why.choose.us') }}" class="menu-link">
                        <div>Add Why Choose Us</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('manage.why.choose.us')}}" class="menu-link">
                        <div>Manage Why Choose Us</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-food-menu"></i>
                <div>Meet WHRO Patients</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{route('create.meet.whro.patients')}}" class="menu-link">
                        <div>Add Patients</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a  href="{{route('manage.meet.whro.patients')}}" class="menu-link">
                        <div>Manage Patients</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-food-menu"></i>
                <div>WHRO Impact</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{route('add.whro.impact')}}" class="menu-link">
                        <div>Add Impact</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a  href="{{route('manage.whro.impact')}}" class="menu-link">
                        <div>Manage Impact</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-food-menu"></i>
                <div>Blog</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('create.blog') }}" class="menu-link">
                        <div>Create Blog</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('manage.blog') }}" class="menu-link">
                        <div>Manage Blog</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-food-menu"></i>
                <div>Our Support</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <div>Add Support Category</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('manage.support') }}" class="menu-link">
                        <div>Manage Support</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-food-menu"></i>
                <div>Get Involved</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <div>Add Get Involved Category</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('manage.get.involved') }}" class="menu-link">
                        <div>Manage Get Involved</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-food-menu"></i>
                <div>About Me</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <div>Add About Me Category</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('manage.about.me') }}" class="menu-link">
                        <div>Manage About Me</div>
                    </a>
                </li>
            </ul>
        </li>

    </ul>
</aside>
