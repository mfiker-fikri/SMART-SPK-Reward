<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar" >
    <div class="layout-menu-toggle navbar-nav align-items-xl-center py-2 me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>

    <div class="container px-sm-1 d-flex align-items-center" id="navbar-collapse">
        <!-- Breadcrumb "-->
        <ol class="breadcrumb breadcrumb-style1 my-lg-3 my-3">
            @if ( request()->is('penilai/dashboard') )
            <!-- Dashboard -->
                <li class="breadcrumb-item fw-bold active">
                    Dashboard
                </li>
            @elseif ( request()->is('penilai/profile') )
            <!-- Profile -->
                <li class="breadcrumb-item fw-light">
                    <a href="{{ URL::to('/penilai/dashboard') }}" style="text-decoration: none !important;">Dashboard</a>
                </li>
                <li class="breadcrumb-item fw-bold active">Profile</li>



            @elseif ( request()->is('penilai/categories/list') )
            <!-- Kategori -->
                <li class="breadcrumb-item fw-light">
                    <a href="{{ URL::to('/penilai/dashboard') }}" style="text-decoration: none !important;">Dashboard</a>
                </li>
                <li class="breadcrumb-item fw-bold active">Kategori</li>

            @elseif ( request()->is('penilai/criterias/list') )
            <!-- Kriteria -->
                <li class="breadcrumb-item fw-light">
                    <a href="{{ URL::to('/penilai/dashboard') }}" style="text-decoration: none !important;">Dashboard</a>
                </li>
                <li class="breadcrumb-item fw-light">Penilaian</li>
                <li class="breadcrumb-item fw-bold active">Kriteria</li>

            @elseif ( request()->is('penilai/parameters/list') )
            <!-- Parameter -->
                <li class="breadcrumb-item fw-light">
                    <a href="{{ URL::to('/penilai/dashboard') }}" style="text-decoration: none !important;">Dashboard</a>
                </li>
                <li class="breadcrumb-item fw-light">Penilaian</li>
                <li class="breadcrumb-item fw-bold active">Parameter</li>

            @elseif ( request()->is('penilai/appraisement/inovation'))
            <!-- Kelola Data Penilaian Penghargaan Inovasi -->
                <li class="breadcrumb-item fw-light">
                    <a href="{{ URL::to('/penilai/dashboard') }}" style="text-decoration: none !important;">Dashboard</a>
                </li>
                <li class="breadcrumb-item fw-light">Penilaian</li>
                <li class="breadcrumb-item fw-bold active">Kelola Data Penilaian Penghargaan Inovasi</li>

            @elseif ( request()->is('penilai/appraisement/inovation/valuation*'))
            <!-- Penilaian Penghargaan Inovasi -->
                <li class="breadcrumb-item fw-light">
                    <a href="{{ URL::to('/penilai/dashboard') }}" style="text-decoration: none !important;">Dashboard</a>
                </li>
                <li class="breadcrumb-item fw-bold active">Penilaian Penghargaan Inovasi</li>

            @elseif ( request()->is('penilai/appraisement/representative'))
            <!-- Kelola Data Penilaian Penghargaan Teladan -->
                <li class="breadcrumb-item fw-light">
                    <a href="{{ URL::to('/penilai/dashboard') }}" style="text-decoration: none !important;">Dashboard</a>
                </li>
                <li class="breadcrumb-item fw-light">Penilaian</li>
                <li class="breadcrumb-item fw-bold active">Kelola Data Penilaian Penghargaan Teladan</li>

            @elseif ( request()->is('penilai/appraisement/representative/valuation*'))
            <!-- Penilaian Penghargaan Teladan -->
                <li class="breadcrumb-item fw-light">
                    <a href="{{ URL::to('/penilai/dashboard') }}" style="text-decoration: none !important;">Dashboard</a>
                </li>
                <li class="breadcrumb-item fw-light">
                    <a href="{{ URL::to('/penilai/appraisement/representative') }}" style="text-decoration: none !important;">Kelola Data Penilaian Penghargaan Teladan</a>
                </li>
                <li class="breadcrumb-item fw-bold active">Penilaian Penghargaan Teladan</li>


            @elseif ( request()->is('penilai/appraisement/result/inovation') )
            <!-- Hasil Penilaian Inovasi -->
                <li class="breadcrumb-item fw-light">
                    <a href="{{ URL::to('/penilai/dashboard') }}" style="text-decoration: none !important;">Dashboard</a>
                </li>
                <li class="breadcrumb-item fw-bold active">Hasil Penilaian Penghargaan Inovasi</li>

            @endif
        </ol>
        <!--/ Breadcrumb -->

        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <!-- Place this tag where you want the button to render. -->
            <!-- Employee -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar {{ Auth::guard('team_assessments')->user()->status_id == 1 && Auth::guard('team_assessments')->user()->status_active == 1 ? 'avatar-online' : '' }}">
                        <!-- Photo Profile -->
                        @if ( Auth::guard('team_assessments')->user()->photo_profile )
                        <img src="{{ asset( 'storage/teamAssesments/photos/photoProfile/'. Auth::guard('team_assessments')->user()->username. '/' . Auth::guard('team_assessments')->user()->photo_profile) }}"
                            alt="employee-avatar {{ Auth::guard('team_assessments')->user()->full_name }}" class="rounded-circle"
                            style="width: 40px; height: 45px" id="employeeAvatar" />
                        @else
                        <img src="https://th.bing.com/th/id/OIP.xcp9_uPOg5pOlPQyd63c9wHaKX?pid=ImgDet&rs=1"
                            alt="employee-avatar" class="rounded-circle"
                            style="width: 40px; height: 45px" id="employeeAvatar" />
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
                                <div class="avatar avatar-online">
                                    <!-- Photo Profile -->
                                    @if (Auth::guard('team_assessments')->user()->photo_profile)
                                        <img src="{{ asset( 'storage/teamAssesments/photos/photoProfile/'. Auth::guard('team_assessments')->user()->username. '/' . Auth::guard('team_assessments')->user()->photo_profile) }}"
                                        alt="employee-avatar {{ Auth::guard('team_assessments')->user()->full_name }}" class="rounded-circle"
                                        style="width: 40px; height: 45px" id="employeeAvatar" />
                                    @else
                                    <img src="https://th.bing.com/th/id/OIP.xcp9_uPOg5pOlPQyd63c9wHaKX?pid=ImgDet&rs=1"
                                        alt="employee-avatar" class="rounded-circle"
                                        style="width: 40px; height: 45px" id="employeeAvatar" />
                                    @endif
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <span class="fw-semibold d-block">{{ Auth::guard('team_assessments')->user()->full_name }}</span>
                                <small class="text-muted">Tim Penilai</small>
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
                                <i class="fa-solid fa-calendar-day fa-lg me-3" style="margin: 0 0.9rem 0 0;font-size: 1.4em;"></i>
                            </div>
                            <span class="text-nowrap align-middle text-center" id="date"></span>
                        </div>
                    </li>
                    <!--/ Date -->

                    <li>
                        <div class="dropdown-divider"></div>
                    </li>

                    <!-- Clock -->
                    <li>
                        <div class="mx-sm-1 mx-sm-3 d-flex flex-row flex-nowrap">
                            <div class="d-flex flex-row justify-content-start align-middle">
                                <i class="fa-solid fa-clock fa-lg me-3"></i>
                            </div>
                            <div id="clock"></div>
                        </div>
                    </li>
                    <!--/ Clock -->

                    <li>
                        <div class="dropdown-divider"></div>
                    </li>

                    <!-- My Profile -->
                    <li>
                        <a class="d-flex flex-row justify-content-start align-middle dropdown-item {{ (request()->is('penilai/profile')) ? 'active' : '' }}" href="{{ URL::to('/penilai/profile') }}">
                            <i class="fa-solid fa-user-large fa-lg me-3"></i>
                            <span class="align-middle">My Profile</span>
                        </a>
                    </li>
                    <!--/ My Profile -->

                    <li>
                        <div class="dropdown-divider"></div>
                    </li>

                    <!-- Logout -->
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
