<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <!-- Logo -->
    <div class="app-brand demo" style="max-height: 10rem; min-height: 10rem; margin-bottom: 10px">
        <a href="{{ URL::to('/dashboard') }}" class="app-brand-link d-flex flex-column justify-content-center" style="text-decoration: none !important;">
            <span class="app-brand-logo demo text-center">
                <img src="{{ asset('assets/icon/KLN.png') }}" alt="Icon" width="50" height="50" />
            </span>
            <span class="app-brand-text demo menu-text fw-bolder mx-auto text-uppercase text-center text-wrap" style="font-size: 22px">
                <b>
                    {{-- SPK Pemberian Penghargaan Pegawai ASN Berprestasi --}}
                    Kementerian Luar Negeri Republik Indonesia Pegawai ASN
                </b>
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

        <li class="menu-item {{ (request()->is('dashboard')) ? 'active' : '' }}">
            <a href="{{ URL::to('/dashboard') }}" class="menu-link" style="text-decoration: none !important;">
                <i class="menu-icon tf-icons fa-solid fa-gauge"></i>
                <div data-i18n="Beranda">Beranda</div>
            </a>
        </li>
        <!--/ Dashboard -->

        <!-- My Profile -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Data Diri</span>
        </li>

        <li class="menu-item {{ (request()->is('profile')) ? 'active' : '' }}">
            <a href="{{ URL::to('/profile') }}" class="menu-link" style="text-decoration: none !important;">
                <i class="menu-icon tf-icons fa-solid fa-user-large"></i>
                <div data-i18n="DataDiri">Data Diri</div>
            </a>
        </li>
        <!--/ My Profile -->

        <!-- Form Inovation dan teladan -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Formulir Pendaftaran Penghargaan Inovasi</span>
        </li>

        <li class="menu-item {{ (request()->is('form-innovation*')) || (request()->is('form-representative*')) ? 'active' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle" style="text-decoration: none !important;">
                <i class="menu-icon tf-icons fa-regular fa-file-lines"></i>
                <div data-i18n="FormAward">Formulir Pendaftaran Penghargaan Inovasi</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item {{ (request()->is('form-innovation*')) ? 'active' : '' }}">
                    <a href="{{ URL::to('form-innovation/list') }}" class="menu-link" style="text-decoration: none !important;">
                        <i class="menu-icon tf-icons fa-regular fa-file-lines"></i>
                        <div data-i18n="FormInovation">Formulir Pendaftaran Penghargaan Inovasi</div>
                    </a>
                </li>
                {{-- <li class="menu-item {{ (request()->is('form-representative*')) ? 'active' : '' }}">
                    <a href="{{ URL::to('form-representative/list') }}" class="menu-link" style="text-decoration: none !important;">
                        <i class="menu-icon tf-icons fa-regular fa-file-lines"></i>
                        <div data-i18n="Form Teladan">Form Teladan</div>
                    </a>
                </li> --}}
            </ul>
        </li>
        <!--/ Form Inovation dan teladan -->

        <!-- Hasil Penghargaan Inovation dan Teladan -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Hasil Penghargaan</span>
        </li>

        <li class="menu-item {{ (request()->is('result-reward-innovation*')) || (request()->is('result-reward-representative*')) ? 'active' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle" style="text-decoration: none !important;">
                <i class="menu-icon tf-icons fa-regular fa-file-lines"></i>
                <div data-i18n="resultAward">Hasil Penghargaan</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item {{ (request()->is('result-reward-innovation*')) ? 'active' : '' }}">
                    <a href="{{ URL::to('result-reward-innovation') }}" class="menu-link" style="text-decoration: none !important;">
                        <i class="menu-icon tf-icons fa-regular fa-file-lines"></i>
                        <div data-i18n="resultInovation">Inovasi</div>
                    </a>
                </li>
                <li class="menu-item {{ (request()->is('result-reward-representative*')) ? 'active' : '' }}">
                    <a href="{{ URL::to('result-reward-representative') }}" class="menu-link" style="text-decoration: none !important;">
                        <i class="menu-icon tf-icons fa-regular fa-file-lines"></i>
                        <div data-i18n="resultTeladan">Teladan</div>
                    </a>
                </li>
            </ul>
        </li>
        <!--/ Hasil Penghargaan Inovation dan Teladan -->


    </ul>
</aside>
