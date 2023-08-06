<div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
    <div class="navbar-nav align-items-center">
        <div class="nav-item d-flex align-items-center">
            <marquee behavior="" direction="" style="font-size: 30px;">
                Please Check Your Attendance, Today :
                <span style="font-weight:bolder;" id="date_time"></span> ,
                If u have not Attendance, Please go to Attendance page
            </marquee>
        </div>
    </div>
    <ul class="navbar-nav flex-row align-items-center ms-auto">
        <!-- User -->
        <li class="nav-item navbar-dropdown dropdown-user dropdown">
            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                <div class="avatar avatar-online">
                    <img src="{{ asset('assets/img/avatars/avatar.png') }}" alt class="w-px-40 h-auto rounded-circle" />
                </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <div class="dropdown-item">
                        <div class="d-flex-grow-1">
                            @if (Auth::user() !== null)
                                <span class="fw-semibold d-block mt-2">{{ Auth::user()->fullname }}</span>
                            @endif
                        </div>
                    </div>
                </li>
                <li>
                    <div class="dropdown-divider"></div>
                </li>
                <li>
                    @if (Auth::user() !== null)
                        {{-- {{ route('users.show', Auth::user()->id) }} --}}
                        <a class="dropdown-item" href="{{ route('users.show', Auth::user()->id) }}">
                            <i class="bx bx-user me-2"></i>
                            <span class="align-middle">My Profile</span>
                        </a>
                    @endif
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                    </a>
                </li>
            </ul>
        </li>
        <!--/ User -->
    </ul>
</div>
