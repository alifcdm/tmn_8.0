<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <span class="app-brand-logo demo">
            <img width="200" src="{{ asset('assets/img/avatars/logo.png') }}" alt="">
        </span>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item">
            <a href="{{ url('/dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('users.show', Auth::user()->id) }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Analytics">My Profile</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ url('/absensi' . '/' . Auth::user()->fullname) }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Analytics">Attendance</div>
            </a>
        </li>
        @if (Auth::user()->role == 'admin')
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Admin Settings</span>
            </li>
            <li class="menu-item">
                <a href="{{ route('users.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-layout"></i>
                    <div data-i18n="Analytics">User Data</div>
                </a>
            </li>
        @endif
        <li class="menu-item">
            <a class="menu-link" href="{{ route('logout') }}">
                <i class="menu-icon tf-icons bx bx-power-off me-2"></i>
                <span class="align-middle">Log Out</span>
            </a>
        </li>
    </ul>
</aside>
