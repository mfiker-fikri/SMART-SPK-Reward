<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <!-- Logo -->
    <div class="app-brand demo" style="max-height: 10rem; min-height: 10rem; margin-bottom: 10px">
        <a href="{{ URL::to('/dashboard') }}" class="app-brand-link d-flex flex-column justify-content-center" style="text-decoration: none !important;">
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

        <li class="menu-item {{ (request()->is('dashboard')) ? 'active' : '' }}">
            <a href="{{ URL::to('/dashboard') }}" class="menu-link" style="text-decoration: none !important;">
                <i class="menu-icon tf-icons fa-solid fa-gauge"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>
        <!--/ Dashboard -->

        <!-- My Profile -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">My Profile</span>
        </li>

        <li class="menu-item {{ (request()->is('profile')) ? 'active' : '' }}">
            <a href="{{ URL::to('/profile') }}" class="menu-link" style="text-decoration: none !important;">
                <i class="menu-icon tf-icons fa-solid fa-user-large"></i>
                <div data-i18n="My Profile">My Profile</div>
            </a>
        </li>
        <!--/ My Profile -->

        <!-- Form Inovation -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Form Penghargaan Berprestasi</span>
        </li>

        <li class="menu-item {{ (request()->is('form-inovation*')) || (request()->is('form-teladan*')) ? 'active' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle" style="text-decoration: none !important;">
                <i class="menu-icon tf-icons fa-regular fa-file-lines"></i>
                <div data-i18n="Timer Countdown">Form Penghargaan Berprestasi</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item {{ (request()->is('form-inovation*')) ? 'active' : '' }}">
                    <a href="{{ URL::to('form-inovation/list') }}" class="menu-link" style="text-decoration: none !important;">
                        <i class="menu-icon tf-icons fa-regular fa-file-lines"></i>
                        <div data-i18n="Form Inovation">Form Inovation</div>
                    </a>
                </li>
                <li class="menu-item {{ (request()->is('form-teladan*')) ? 'active' : '' }}">
                    <a href="{{ URL::to('form-teladan/list') }}" class="menu-link" style="text-decoration: none !important;">
                        <i class="menu-icon tf-icons fa-regular fa-file-lines"></i>
                        <div data-i18n="Form Teladan">Form Teladan</div>
                    </a>
                </li>
            </ul>
        </li>
        <!--/ Form Inovation -->


    </ul>
</aside>
