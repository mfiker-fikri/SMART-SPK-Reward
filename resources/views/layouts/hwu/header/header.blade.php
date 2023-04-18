<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar" tabindex="-1">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>

    <div class="container px-sm-1 d-flex flex-row align-items-center" id="navbar-collapse">
        <!-- Breadcrumb -->
        <ol class="breadcrumb breadcrumb-style1 my-lg-3 my-3">
            <!-- Dashboard -->
            @if ( request()->is('headworkunit/dashboard') )
                <li class="breadcrumb-item fw-bold active">
                    Dashboard
                </li>

            <!-- Profile -->
            @elseif ( request()->is('headworkunit/profile') )
                <li class="breadcrumb-item fw-light">
                    <a href="{{ URL::to('/headworkunit/dashboard') }}" style="text-decoration: none !important;">Dashboard</a>
                </li>
                <li class="breadcrumb-item fw-bold active">Profile</li>

            <!-- Manage Inovation Employee -->
            @elseif ( request()->is('headworkunit/form-inovation/list') )
                <li class="breadcrumb-item fw-light">
                    <a href="{{ URL::to('/headworkunit/dashboard') }}" style="text-decoration: none !important;">Dashboard</a>
                </li>
                <li class="breadcrumb-item fw-bold active">Form Persetujuan Pendaftaran Penghargaan Inovasi Pegawai</li>

            @elseif ( request()->is('headworkunit/form-inovation/list/update*') )
                <li class="breadcrumb-item fw-light">
                    <a href="{{ URL::to('/headworkunit/dashboard') }}" style="text-decoration: none !important;">Dashboard</a>
                </li>
                <li class="breadcrumb-item fw-light">
                    <a href="{{ URL::to('/headworkunit/form-inovation/list') }}" style="text-decoration: none !important;">Form Persetujuan Pendaftaran Penghargaan Inovasi Pegawai</a>
                </li>
                <li class="breadcrumb-item fw-bold active"> {{ $rewardInovation->full_name }} </li>

            @endif
        </ol>
        <!--/ Breadcrumb -->


        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <!-- Place this tag where you want the button to render. -->
            <!-- Admin -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar {{ Auth::guard('head_work_units')->user()->status_id == 1 && Auth::guard('head_work_units')->user()->status_active == 1 && (Cache::has('head_work_units-is-online-' . Auth::guard('head_work_units')->user()->id)) ? 'avatar-online' : '' }}">
                        <!-- Photo Profile -->
                        @if (Auth::guard('head_work_units')->user()->photo_profile)
                            <img src="{{ asset( 'storage/headworkunit/photos/photoProfile/'. Auth::guard('head_work_units')->user()->username. '/' . Auth::guard('head_work_units')->user()->photo_profile) }}"
                            alt="headworkunit-avatar {{ Auth::guard('head_work_units')->user()->full_name }}" class="rounded-circle"
                            style="width: 40px; height: 45px" id="head_work_unitsAvatar" />
                        @else
                            <img src="https://th.bing.com/th/id/OIP.xcp9_uPOg5pOlPQyd63c9wHaKX?pid=ImgDet&rs=1"
                                alt="headworkunit-avatar" class="rounded-circle"
                                style="width: 40px; height: 45px" id="head_work_unitsAvatar" />
                        @endif
                    </div>
                </a>

                <ul class="dropdown-menu dropdown-menu-xl-end">

                    <!-- Greeting Morning, Afternoon, etc -->
                    <li>
                        <div class="mx-sm-1 px-sm-3 d-flex flex-row justify-content-center">
                            <p class="text-nowrap align-middle text-center" id="greeting"></p>
                        </div>
                    </li>
                    <!--/ Greeting Morning, Afternoon, etc -->

                    <li>
                        <div class="mx-sm-1 px-sm-3 d-flex">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar {{ Auth::guard('head_work_units')->user()->status_id == 1 && Auth::guard('head_work_units')->user()->status_active == 1 && Cache::has('head_work_units-is-online-' . Auth::guard('head_work_units')->user()->id ) ? 'avatar-online' : '' }}">
                                    <!-- Photo Profile -->
                                    @if (Auth::guard('head_work_units')->user()->photo_profile)
                                        <img src="{{ asset( 'storage/headworkunit/photos/photoProfile/'. Auth::guard('head_work_units')->user()->username. '/' . Auth::guard('head_work_units')->user()->photo_profile) }}"
                                        alt="headworkunit-avatar {{ Auth::guard('head_work_units')->user()->full_name }}" class="rounded-circle"
                                        style="width: 40px; height: 45px" id="head_work_unitsAvatar" />
                                    @else
                                    <img src="https://th.bing.com/th/id/OIP.xcp9_uPOg5pOlPQyd63c9wHaKX?pid=ImgDet&rs=1"
                                        alt="headworkunit-avatar" class="rounded-circle"
                                        style="width: 40px; height: 45px" id="head_work_unitsAvatar" />
                                    @endif
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <span class="fw-semibold d-block">{{ Auth::guard('head_work_units')->user()->full_name }}</span>
                                <small class="text-muted">Kepala Satuan Kerja</small>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="dropdown-divider"></div>
                    </li>

                    <!-- Date -->
                    <li>
                        <div class="mx-sm-1 mx-sm-3 d-flex flex-row flex-nowrap">
                            <div class="d-flex flex-row justify-content-start align-middle">
                                <i class="fa-solid fa-calendar-day" style="margin: 0 0.88rem 0 0;font-size: 1.4em;"></i>
                            </div>
                            <span class="text-nowrap align-middle text-center" id="date"></span>
                        </div>
                        {{-- <li>
                            <a class="dropdown-item disabled" href="#" tabindex="-1" aria-disabled="true" >
                                <i class="fa-solid fa-clock fa-lg me-3"></i>
                                <span class="align-middle" id="date"></span>
                            </a>
                        </li> --}}
                    </li>
                    <!--/ Date -->

                    <li>
                        <div class="dropdown-divider"></div>
                    </li>

                    <!-- Clock -->
                    <li>
                        <div class="mx-sm-1 mx-sm-3 d-flex flex-row">
                            <div class="d-flex flex-row justify-content-start align-middle">
                                <i class="fa-solid fa-clock fa-lg me-3"></i>
                            </div>
                            <div id="clock"></div>
                        </div>
                        {{-- <a class="dropdown-item disabled" href="#" tabindex="-1" aria-disabled="true" >
                            <i class="fa-solid fa-clock fa-lg me-3"></i>
                            <span class="align-middle" id="clock"></span>
                        </a> --}}
                    </li>
                    <!--/ Clock -->

                    <li>
                        <div class="dropdown-divider"></div>
                    </li>


                    <!-- My Profile -->
                    <li>
                        <a class="d-flex flex-row justify-content-start align-middle dropdown-item {{ (request()->is('headworkunit/profile*')) ? 'active' : '' }}" href="{{ URL::to('/headworkunit/profile') }}">
                            <i class="fa-solid fa-user-large fa-lg me-3"></i>
                            <span class="align-middle">My Profile</span>
                        </a>
                    </li>
                    <!--/ My Profile -->

                    <li>
                        <div class="dropdown-divider"></div>
                    </li>

                    <!-- Logout {{URL::to('/headworkunit/logout')}} -->
                    <li>
                        <a class="d-flex flex-row justify-content-start align-middle dropdown-item" id="logout" style="cursor: pointer;">
                            <i class="fa-solid fa-person-running" style="margin: 0 0.9rem 0 0;font-size: 1.6em;"></i>
                            <span class="align-middle">Log Out</span>
                        </a>
                    </li>
                    <!--/ Logout -->
                </ul>
            </li>
            <!--/ User -->
        </ul>
    </div>
</nav>
