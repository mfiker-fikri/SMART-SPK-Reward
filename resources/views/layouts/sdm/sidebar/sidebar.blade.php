<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <!-- Logo -->
    <div class="app-brand demo" style="max-height: 10rem; min-height: 10rem; margin-bottom: 10px">
        @if (Auth::guard('human_resources')->user()->role == 1)
        <a href="{{ URL::to('/sdm/kepala-biro-SDM/dashboard') }}" class="app-brand-link d-flex flex-column justify-content-center" style="text-decoration: none !important;">

        @elseif (Auth::guard('human_resources')->user()->role == 2)
        <a href="{{ URL::to('/sdm/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/dashboard') }}" class="app-brand-link d-flex flex-column justify-content-center" style="text-decoration: none !important;">

        @elseif (Auth::guard('human_resources')->user()->role == 3)
        <a href="{{ URL::to('/sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/dashboard') }}" class="app-brand-link d-flex flex-column justify-content-center" style="text-decoration: none !important;">
        @endif
            <span class="app-brand-logo demo text-center">
                <img src="{{ asset('assets/icon/KLN.png') }}" alt="Icon" width="50" height="50" />
            </span>
            <span class="app-brand-text demo menu-text fw-bolder mx-auto text-uppercase text-center text-wrap" style="font-size: 22px">
                <b>SPK Pemberian Penghargaan Pegawai ASN Berprestasi</b>
            </span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>
    <!--/ Logo -->

    <div class="menu-inner-shadow" style="margin-top: 6.2rem;"></div>

    <!-- Menu -->
    <ul class="menu-inner py-1 mt-2 mt-2 mt-2 mt-2">

        @if (Auth::guard('human_resources')->user()->role == 1)
            <!-- Dashboard -->
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Dashboard</span>
            </li>

            <li class="menu-item {{ (request()->is('sdm/kepala-biro-SDM/dashboard*')) ? 'active' : '' }}">
                <a href="{{ URL::to('/sdm/kepala-biro-SDM/dashboard') }}" class="menu-link" style="text-decoration: none !important;">
                    <i class="menu-icon tf-icons fa-solid fa-gauge"></i>
                    <div data-i18n="Dashboard">Dashboard</div>
                </a>
            </li>
            <!--/ Dashboard -->

            <!-- My Profile -->
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">My Profile</span>
            </li>

            <li class="menu-item {{ (request()->is('sdm/kepala-biro-SDM/profile*')) ? 'active' : '' }}">
                <a href="{{ URL::to('/sdm/kepala-biro-SDM/profile') }}" class="menu-link" style="text-decoration: none !important;">
                    <i class="menu-icon tf-icons fa-solid fa-user-large"></i>
                    <div data-i18n="My Profile">My Profile</div>
                </a>
            </li>
            <!--/ My Profile -->

        @elseif (Auth::guard('human_resources')->user()->role == 2)
            <!-- Dashboard -->
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Dashboard</span>
            </li>

            <li class="menu-item {{ (request()->is('sdm/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/dashboard*')) ? 'active' : '' }}">
                <a href="{{ URL::to('/sdm/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/dashboard') }}" class="menu-link" style="text-decoration: none !important;">
                    <i class="menu-icon tf-icons fa-solid fa-gauge"></i>
                    <div data-i18n="Dashboard">Dashboard</div>
                </a>
            </li>
            <!--/ Dashboard -->

            <!-- My Profile -->
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">My Profile</span>
            </li>

            <li class="menu-item {{ (request()->is('sdm/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/profile*')) ? 'active' : '' }}">
                <a href="{{ URL::to('/sdm/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/profile') }}" class="menu-link" style="text-decoration: none !important;">
                    <i class="menu-icon tf-icons fa-solid fa-user-large"></i>
                    <div data-i18n="My Profile">My Profile</div>
                </a>
            </li>
            <!--/ My Profile -->

        @elseif (Auth::guard('human_resources')->user()->role == 3)
            <!-- Dashboard -->
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Dashboard</span>
            </li>

            <li class="menu-item {{ (request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/dashboard*')) ? 'active' : '' }}">
                <a href="{{ URL::to('/sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/dashboard') }}" class="menu-link" style="text-decoration: none !important;">
                    <i class="menu-icon tf-icons fa-solid fa-gauge"></i>
                    <div data-i18n="Dashboard">Dashboard</div>
                </a>
            </li>
            <!--/ Dashboard -->

            <!-- My Profile -->
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">My Profile</span>
            </li>

            <li class="menu-item {{ (request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/profile*')) ? 'active' : '' }}">
                <a href="{{ URL::to('/sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/profile') }}" class="menu-link" style="text-decoration: none !important;">
                    <i class="menu-icon tf-icons fa-solid fa-user-large"></i>
                    <div data-i18n="My Profile">My Profile</div>
                </a>
            </li>
            <!--/ My Profile -->

            <!-- Kelola SMART Kategori  -->
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Kelola SMART</span>
            </li>

            <li class="menu-item {{ (request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/categories*')) || (request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/criterias*')) || (request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/parameters*')) ? 'active' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle" style="text-decoration: none !important;">
                    <i class="menu-icon tf-icons fa-solid fa-list"></i>
                    <div data-i18n="Kelola SMART">Kelola SMART</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item {{ (request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/categories*')) ? 'active' : '' }}">
                        <a href="{{ URL::to('/sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/categories') }}" class="menu-link" style="text-decoration: none !important;">
                            <div data-i18n="Kelola Kategori">Kelola Kategori</div>
                        </a>
                    </li>
                    <li class="menu-item {{ (request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/criterias*')) ? 'active' : '' }}">
                        <a href="{{ URL::to('/sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/criterias') }}" class="menu-link" style="text-decoration: none !important;">
                            <div data-i18n="Kelola Kriteria">Kelola Kriteria</div>
                        </a>
                    </li>
                    <li class="menu-item {{ (request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/parameters*')) ? 'active' : '' }}">
                        <a href="{{ URL::to('/sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/parameters') }}" class="menu-link" style="text-decoration: none !important;">
                            <div data-i18n="Kelola Parameter">Kelola Parameter</div>
                        </a>
                    </li>
                </ul>
            </li>
            <!--/ Kelola SMART Kategori  -->

            <!-- Manage Categories -->
            {{-- <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Kelola Kategori</span>
            </li>

            <li class="menu-item {{ (request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/categories*')) ? 'active' : '' }}">
                <a href="{{ URL::to('/sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/categories') }}" class="menu-link" style="text-decoration: none !important;">
                    <i class="menu-icon tf-icons fa-solid fa-user-large"></i>
                    <div data-i18n="Analytics">Kelola Kategori</div>
                </a>
            </li> --}}
            <!--/ Manage Categories -->

            <!-- Manage Criterias -->
            {{-- <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Kelola Kriteria</span>
            </li>

            <li class="menu-item {{ (request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/criterias*')) ? 'active' : '' }}">
                <a href="{{ URL::to('/sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/criterias') }}" class="menu-link" style="text-decoration: none !important;">
                    <i class="menu-icon tf-icons fa-solid fa-user-large"></i>
                    <div data-i18n="Analytics">Kelola Kriteria</div>
                </a>
            </li> --}}
            <!--/ Manage Criterias -->

            <!-- Manage Parameters -->
            {{-- <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Kelola Parameter</span>
            </li>

            <li class="menu-item {{ (request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/parameters*')) ? 'active' : '' }}">
                <a href="{{ URL::to('/sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/parameters') }}" class="menu-link" style="text-decoration: none !important;">
                    <i class="menu-icon tf-icons fa-solid fa-user-large"></i>
                    <div data-i18n="Analytics">Kelola Parameter</div>
                </a>
            </li> --}}
            <!--/ Manage Parameters -->

            <!-- Manage Team Assessment -->
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Kelola Tim Penilai</span>
            </li>

            <li class="menu-item {{ (request()->is('sdm/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/profile*')) ? 'active' : '' }}">
                <a href="{{ URL::to('/sdm/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/profile') }}" class="menu-link" style="text-decoration: none !important;">
                    <i class="menu-icon tf-icons fa-solid fa-user-large"></i>
                    <div data-i18n="Kelola Tim Penilai">Kelola Tim Penilai</div>
                </a>
            </li>
            <!--/ Manage Team Assessment -->

            <!-- Countdown Timer Form -->
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Countdown Timer Open Form</span>
            </li>

            <li class="menu-item {{ (request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/timer-countdown/form-inovation*')) ? 'active' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle" style="text-decoration: none !important;">
                    <i class="menu-icon tf-icons fa-solid fa-list"></i>
                    <div data-i18n="Timer Countdown">Timer Countdown</div>
                </a>

                <ul class="menu-sub">
                    <li class="menu-item {{ (request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/timer-countdown/form-inovation*')) ? 'active' : '' }}">
                        <a href="{{ URL::to('/sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/timer-countdown/form-inovation') }}" class="menu-link" style="text-decoration: none !important;">
                            <div data-i18n="Form Inovation">Form Inovation</div>
                        </a>
                    </li>
                </ul>
            </li>
            <!--/ Countdown Timer Form -->
        @endif

    </ul>
</aside>
