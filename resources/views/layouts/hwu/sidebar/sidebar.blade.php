<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <!-- Logo -->
    <div class="app-brand demo" style="max-height: 10rem; min-height: 10rem; margin-bottom: 10px">
        <a href="{{ URL::to('/headworkunit/dashboard') }}" class="app-brand-link d-flex flex-column justify-content-center" style="text-decoration: none !important;">
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

        <!-- Dashboard -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Dashboard</span>
        </li>

        <li class="menu-item {{ (request()->is('hrd/dashboard*')) ? 'active' : '' }}">
            <a href="{{ URL::to('/hrd/dashboard') }}" class="menu-link" style="text-decoration: none !important;">
                <i class="menu-icon tf-icons fa-solid fa-gauge"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        <!--/ Dashboard -->

        <!-- My Profile -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">My Profile</span>
        </li>

        <li class="menu-item {{ (request()->is('hrd/profile*')) ? 'active' : '' }}">
            <a href="{{ URL::to('/hrd/profile') }}" class="menu-link" style="text-decoration: none !important;">
                <i class="menu-icon tf-icons fa-solid fa-user-large"></i>
                <div data-i18n="Analytics">My Profile</div>
            </a>
        </li>
        <!--/ My Profile -->

        <!-- My Category -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Category</span>
        </li>

        <li class="menu-item {{ (request()->is('hrd/manage/categories*')) ? 'active' : '' }}">
            <a href="{{ URL::to('/hrd/manage/categories') }}" class="menu-link" style="text-decoration: none !important;">
                <i class="menu-icon tf-icons fa-solid fa-list"></i>
                <div data-i18n="Analytics">Category</div>
            </a>
        </li>
        <!--/ My Category -->

        <!-- My Criteria -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Criteria</span>
        </li>

        <li class="menu-item {{ (request()->is('hrd/manage/criterias*')) ? 'active' : '' }}">
            <a href="{{ URL::to('/hrd/manage/criterias') }}" class="menu-link" style="text-decoration: none !important;">
                <i class="menu-icon tf-icons fa-solid fa-list-check"></i>
                <div data-i18n="Analytics">Criteria</div>
            </a>
        </li>
        <!--/ My Criteria -->

        <!-- My Parameter -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Parameter</span>
        </li>

        <li class="menu-item {{ (request()->is('hrd/manage/parameters*')) ? 'active' : '' }}">
            <a href="{{ URL::to('/hrd/manage/parameters') }}" class="menu-link" style="text-decoration: none !important;">
                <i class="menu-icon tf-icons fa-solid fa-sliders"></i>
                <div data-i18n="Analytics">Parameter</div>
            </a>
        </li>
        <!--/ My Parameter -->

        <!-- Penilaian Penghargaan -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Penilaian Penghargaan Pegawai</span>
        </li>

        <li class="menu-item {{ (request()->is('hrd/manage/penilaian*')) ? 'active' : '' }}">
            <a href="{{ URL::to('/hrd/manage/penilaian') }}" class="menu-link" style="text-decoration: none !important;">
                <i class="menu-icon tf-icons fa-solid fa-file-pen"></i>
                <div data-i18n="Analytics">Penilaian Penghargaan Pegawai</div>
            </a>
        </li>
        <!--/ Penilaian Penghargaan -->

        <!-- Peringkat Penghargaan -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Peringkat Penghargaan Pegawai</span>
        </li>

        <li class="menu-item {{ (request()->is('hrd/manage/penilaian*')) ? 'active' : '' }}">
            <a href="{{ URL::to('/hrd/manage/penilaian') }}" class="menu-link" style="text-decoration: none !important;">
                <i class="menu-icon tf-icons fa-solid fa-ranking-star"></i>
                <div data-i18n="Analytics">Peringkat Penghargaan Pegawai</div>
            </a>
        </li>
        <!--/ Peringkat Penghargaan -->
    </ul>
</aside>
