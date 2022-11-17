<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <!-- Logo -->
    <div class="app-brand demo" style="max-height: 10rem; min-height: 10rem; margin-bottom: 10px">
        <a href="{{ URL::to('/admin/dashboard') }}" class="app-brand-link d-flex flex-column justify-content-center" style="text-decoration: none !important;">
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

        <li class="menu-item {{ (request()->is('admin/dashboard*')) ? 'active' : '' }}">
            <a href="{{ URL::to('/admin/dashboard') }}" class="menu-link" style="text-decoration: none !important;">
                <i class="menu-icon tf-icons fa-solid fa-gauge"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        <!--/ Dashboard -->

        <!-- My Profile -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">My Profile</span>
        </li>

        <li class="menu-item {{ (request()->is('admin/profile*')) ? 'active' : '' }}">
            <a href="{{ URL::to('/admin/profile') }}" class="menu-link" style="text-decoration: none !important;">
                <i class="menu-icon tf-icons fa-solid fa-user-large"></i>
                <div data-i18n="Analytics">My Profile</div>
            </a>
        </li>
        <!--/ My Profile -->

        <!-- Manage Account Admin -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Kelola Akun Admin</span>
        </li>

        <li class="menu-item {{ (request()->is('admin/manage/admins*')) ? 'active' : '' }}">
            <a href="{{ URL::to('/admin/manage/admins') }}" class="menu-link" style="text-decoration: none !important;">
                <i class="menu-icon tf-icons fa-solid fa-users"></i>
                <div data-i18n="Analytics">Akun Data Admin</div>
            </a>
        </li>
        <!--/ Manage Account Admin -->

        <!-- Manage Account Human Resources -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Kelola Akun Divisi Sumber Daya Manusia</span>
        </li>

        <li class="menu-item {{ (request()->is('admin/manage/sdm*')) ? 'active' : '' }}">
            <a href="{{ URL::to('/admin/manage/sdm') }}" class="menu-link" style="text-decoration: none !important;">
                <i class="menu-icon tf-icons fa-solid fa-users"></i>
                <div data-i18n="Analytics">Akun Data Divisi Sumber Daya Manusia</div>
            </a>
        </li>
        <!--/ Manage Account Human Resources -->

        <!-- Manage Account Score Finalis -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Kelola Akun Tim Penilai</span>
        </li>

        <li class="menu-item {{ (request()->is('admin/manage-admin*')) ? 'active' : '' }}">
            <a href="#" class="menu-link" style="text-decoration: none !important;">
                <i class="menu-icon tf-icons fa-solid fa-users"></i>
                <div data-i18n="Analytics">Akun Data Tim Penilai</div>
            </a>
        </li>
        <!--/ Manage Account Score Finalis -->

        <!-- Manage Account Employee -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Kelola Akun Pegawai ASN</span>
        </li>

        <li class="menu-item {{ (request()->is('admin/manage/employees*')) ? 'active' : '' }}">
            <a href="{{ URL::to('/admin/manage/employees') }}" class="menu-link" style="text-decoration: none !important;">
                {{-- <i class="menu-icon tf-icons bx bx-user"></i> --}}
                <i class="menu-icon tf-icons fa-solid fa-users"></i>
                <div data-i18n="Analytics">Akun Data Pegawai ASN</div>
            </a>
        </li>


    </ul>
</aside>
