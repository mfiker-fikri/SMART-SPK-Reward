<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <!-- Logo -->
    <div class="app-brand demo" style="max-height: 10rem; min-height: 10rem; margin-bottom: 10px">
        <a href="{{ URL::to('/ksk/dashboard') }}" class="app-brand-link d-flex flex-column justify-content-center" style="text-decoration: none !important;">
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
            <span class="menu-header-text">Beranda</span>
        </li>

        <li class="menu-item {{ (request()->is('ksk/dashboard*')) ? 'active' : '' }}">
            <a href="{{ URL::to('/ksk/dashboard') }}" class="menu-link" style="text-decoration: none !important;">
                <i class="menu-icon tf-icons fa-solid fa-gauge"></i>
                <div data-i18n="Beranda">Beranda</div>
            </a>
        </li>
        <!--/ Dashboard -->

        <!-- My Profile -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Data Diri</span>
        </li>

        <li class="menu-item {{ (request()->is('ksk/profile*')) ? 'active' : '' }}">
            <a href="{{ URL::to('/ksk/profile') }}" class="menu-link" style="text-decoration: none !important;">
                <i class="menu-icon tf-icons fa-solid fa-user-large"></i>
                <div data-i18n="DataDiri">Data Diri</div>
            </a>
        </li>
        <!--/ My Profile -->

        <!-- My Profile -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Formulir Persetujuan Pendaftaran Penghargaan Inovasi Pegawai</span>
        </li>

        <li class="menu-item {{ (request()->is('ksk/form-innovation/list*')) ? 'active' : '' }}">
            <a href="{{ URL::to('/ksk/form-innovation/list') }}" class="menu-link" style="text-decoration: none !important;">
                <i class="menu-icon tf-icons fa-solid fa-user-large"></i>
                <div data-i18n="Analytics">Formulir Persetujuan Pendaftaran Penghargaan Inovasi Pegawai</div>
            </a>
        </li>
        <!--/ My Profile -->

    </ul>
</aside>
