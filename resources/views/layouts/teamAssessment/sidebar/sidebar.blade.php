<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <!-- Logo -->
    <div class="app-brand demo" style="max-height: 10rem; min-height: 10rem; margin-bottom: 10px">
        <a href="{{ URL::to('/penilai/dashboard') }}" class="app-brand-link d-flex flex-column justify-content-center" style="text-decoration: none !important;">
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

        <li class="menu-item {{ (request()->is('penilai/dashboard')) ? 'active' : '' }}">
            <a href="{{ URL::to('/penilai/dashboard') }}" class="menu-link" style="text-decoration: none !important;">
                <i class="menu-icon tf-icons fa-solid fa-gauge"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>
        <!--/ Dashboard -->

        <!-- My Profile -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">My Profile</span>
        </li>

        <li class="menu-item {{ (request()->is('penilai/profile')) ? 'active' : '' }}">
            <a href="{{ URL::to('/penilai/profile') }}" class="menu-link" style="text-decoration: none !important;">
                <i class="menu-icon tf-icons fa-solid fa-user-large"></i>
                <div data-i18n="My Profile">My Profile</div>
            </a>
        </li>
        <!--/ My Profile -->

        <!-- Kelola SMART Kategori  -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Penilaian Metode SMART</span>
        </li>

        <li class="menu-item {{ (request()->is('penilai/categories/list*')) || (request()->is('penilai/criterias/list*')) || (request()->is('penilai/parameters/list*')) ? 'active' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle" style="text-decoration: none !important;">
                <i class="menu-icon tf-icons fa-solid fa-list"></i>
                <div data-i18n="Kelola SMART">Penilaian Metode SMART</div>
            </a>
            <ul class="menu-sub">
                <!-- Manage Categories -->
                <li class="menu-item {{ (request()->is('penilai/categories/list*')) ? 'active' : '' }}">
                    <a href="{{ URL::to('/penilai/categories/list') }}" class="menu-link" style="text-decoration: none !important;">
                        <div data-i18n="Kelola Kategori">Kategori</div>
                    </a>
                </li>
                <!--/ Manage Categories -->

                <!-- Manage Criterias -->
                <li class="menu-item {{ (request()->is('penilai/criterias/list*')) ? 'active' : '' }}">
                    <a href="{{ URL::to('/penilai/criterias/list') }}" class="menu-link" style="text-decoration: none !important;">
                        <div data-i18n="Kelola Kriteria">Kriteria</div>
                    </a>
                </li>
                <!--/ Manage Criterias -->

                <!-- Manage Parameters -->
                <li class="menu-item {{ (request()->is('penilai/parameters/list*')) ? 'active' : '' }}">
                    <a href="{{ URL::to('/penilai/parameters/list') }}" class="menu-link" style="text-decoration: none !important;">
                        <div data-i18n="Kelola Parameter">Parameter</div>
                    </a>
                </li>
                <!--/ Manage Parameters -->
            </ul>
        </li>
        <!--/ Kelola SMART Kategori  -->

        <!-- Appraisment Form Inovation and  -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Penilaian Form Penghargaan Berprestasi</span>
        </li>

        <li class="menu-item {{ (request()->is('penilai/appraisement/inovation*')) || (request()->is('penilai/appraisement/representative*')) ? 'active' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle" style="text-decoration: none !important;">
                <i class="menu-icon tf-icons fa-regular fa-file-lines"></i>
                <div data-i18n="Timer Countdown">Penilaian Form Penghargaan Berprestasi</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item {{ (request()->is('penilai/appraisement/inovation*')) ? 'active' : '' }}">
                    <a href="{{ URL::to('penilai/appraisement/inovation') }}" class="menu-link" style="text-decoration: none !important;">
                        <i class="menu-icon tf-icons fa-regular fa-file-lines"></i>
                        <div data-i18n="Form Inovation">Penilaian Form Inovation</div>
                    </a>
                </li>
                <li class="menu-item {{ (request()->is('penilai/appraisement/representative*')) ? 'active' : '' }}">
                    <a href="{{ URL::to('penilai/appraisement/representative') }}" class="menu-link" style="text-decoration: none !important;">
                        <i class="menu-icon tf-icons fa-regular fa-file-lines"></i>
                        <div data-i18n="Form Teladan">Penilaian Form Teladan</div>
                    </a>
                </li>
            </ul>
        </li>
        <!--/ Form Inovation -->

        <!-- Appraisment Form Inovation and  -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Hasil Penilaian Penghargaan Berprestasi</span>
        </li>

        <li class="menu-item {{ (request()->is('penilai/appraisement/result/inovation*')) || (request()->is('penilai/appraisement/result/representative*')) ? 'active' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle" style="text-decoration: none !important;">
                <i class="menu-icon tf-icons fa-regular fa-file-lines"></i>
                <div data-i18n="Timer Countdown">Hasil Penilaian Hasil Penghargaan Berprestasi</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item {{ (request()->is('penilai/appraisement/result/inovation*')) ? 'active' : '' }}">
                    <a href="{{ URL::to('penilai/appraisement/result/inovation') }}" class="menu-link" style="text-decoration: none !important;">
                        <i class="menu-icon tf-icons fa-regular fa-file-lines"></i>
                        <div data-i18n="Hasil Inovation">Hasil Penilaian Hasil Inovation</div>
                    </a>
                </li>
                <li class="menu-item {{ (request()->is('penilai/appraisement/result/representative*')) ? 'active' : '' }}">
                    <a href="{{ URL::to('penilai/appraisement/result/representative') }}" class="menu-link" style="text-decoration: none !important;">
                        <i class="menu-icon tf-icons fa-regular fa-file-lines"></i>
                        <div data-i18n="Hasil Teladan">Hasil Penilaian Hasil Teladan</div>
                    </a>
                </li>
            </ul>
        </li>
        <!--/ Form Inovation -->


    </ul>
</aside>
