<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar" tabindex="-1">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>

    <div class="container px-sm-1 d-flex flex-row align-items-center" id="navbar-collapse">
        <!-- Breadcrumb -->
        <ol class="breadcrumb breadcrumb-style1 my-lg-3 my-3">
            @if (Auth::guard('human_resources')->user()->role == 1)
                <!-- Dashboard -->
                @if ( request()->is('sdm/kepala-biro-SDM/dashboard') )
                    <li class="breadcrumb-item fw-bold active">
                        Dashboard
                    </li>
                <!--/ Dashboard -->

                <!-- Profile -->
                @elseif ( request()->is('sdm/kepala-biro-SDM/profile') )
                    <li class="breadcrumb-item fw-light">
                        <a href="{{ URL::to('/sdm/kepala-biro-SDM/dashboard') }}" style="text-decoration: none !important;">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item fw-bold active">Profile</li>
                <!--/ Profile -->

                @endif

            @elseif (Auth::guard('human_resources')->user()->role == 2)
                <!-- Dashboard -->
                @if ( request()->is('sdm/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/dashboard') )
                <li class="breadcrumb-item fw-bold active">
                    Dashboard
                </li>
                <!--/ Dashboard -->

                <!-- Profile -->
                @elseif ( request()->is('sdm/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/profile') )
                    <li class="breadcrumb-item fw-light">
                        <a href="{{ URL::to('/sdm/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/dashboard') }}" style="text-decoration: none !important;">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item fw-bold active">Profile</li>
                <!--/ Profile -->

                @endif

            @endif




        </ol>
        <!--/ Breadcrumb -->


        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <!-- Place this tag where you want the button to render. -->
            <!-- Admin -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar {{ Auth::guard('human_resources')->user()->status_id == 1 && Auth::guard('human_resources')->user()->status_active == 1 && (Cache::has('admin-is-online-' . Auth::guard('human_resources')->user()->id)) ? 'avatar-online' : '' }}">
                        <!-- Photo Profile -->
                        @if (Auth::guard('human_resources')->user()->photo_profile)
                            <img src="{{ asset( 'storage/sdm/headOfHumanResources/photos/photoProfile/'. Auth::guard('human_resources')->user()->username. '/' . Auth::guard('human_resources')->user()->photo_profile) }}"
                            alt="admin-avatar {{ Auth::guard('human_resources')->user()->full_name }}" class="rounded-circle"
                            style="width: 40px; height: 45px" id="adminAvatar" />
                        @else
                            <img src="https://th.bing.com/th/id/OIP.xcp9_uPOg5pOlPQyd63c9wHaKX?pid=ImgDet&rs=1"
                                alt="admin-avatar" class="rounded-circle"
                                style="width: 40px; height: 45px" id="adminAvatar" />
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
                                <div class="avatar {{ Cache::has('admin-is-online-' . Auth::guard('human_resources')->user()->id ) ? 'avatar-online' : '' }}">
                                    <!-- Photo Profile -->
                                    @if (Auth::guard('human_resources')->user()->photo_profile)
                                        <img src="{{ asset( 'storage/sdm/headOfHumanResources/photos/photoProfile/'. Auth::guard('human_resources')->user()->username. '/' . Auth::guard('human_resources')->user()->photo_profile) }}"
                                        alt="admin-avatar {{ Auth::guard('human_resources')->user()->full_name }}" class="rounded-circle"
                                        style="width: 40px; height: 45px" id="adminAvatar" />
                                    @else
                                    <img src="https://th.bing.com/th/id/OIP.xcp9_uPOg5pOlPQyd63c9wHaKX?pid=ImgDet&rs=1"
                                        alt="admin-avatar" class="rounded-circle"
                                        style="width: 40px; height: 45px" id="adminAvatar" />
                                    @endif
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <span class="fw-semibold d-block">{{ Auth::guard('human_resources')->user()->full_name }}</span>
                                @if (Auth::guard('human_resources')->user()->role == 1)
                                <small class="text-muted">Kepala-Biro SDM</small>
                                @elseif (Auth::guard('human_resources')->user()->role == 2)
                                <small class="text-muted">Kepala Bagian Penghargaan, Disiplin, dan Tata Usaha</small>
                                @elseif (Auth::guard('human_resources')->user()->role == 3)
                                <small class="text-muted">Kepala Subbagian Penghargaan, Disiplin, dan Pensiun</small>
                                @endif
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
                    </li>
                    <!--/ Clock -->

                    <li>
                        <div class="dropdown-divider"></div>
                    </li>


                    <!-- My Profile -->
                    <li>
                        @if (Auth::guard('human_resources')->user()->role == 1)
                        <a class="d-flex flex-row justify-content-start align-middle dropdown-item {{ (request()->is('sdm/kepala-biro-SDM/profile')) ? 'active' : '' }}" href="{{ URL::to('/sdm/kepala-biro-SDM/profile') }}">
                        @elseif (Auth::guard('human_resources')->user()->role == 2)
                        <a class="d-flex flex-row justify-content-start align-middle dropdown-item {{ (request()->is('sdm/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/profile')) ? 'active' : '' }}" href="{{ URL::to('/sdm/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/profile') }}">
                        @elseif (Auth::guard('human_resources')->user()->role == 3)
                        <a class="d-flex flex-row justify-content-start align-middle dropdown-item {{ (request()->is('sdm/kepala-biro-SDM/profile')) ? 'active' : '' }}" href="{{ URL::to('/sdm/kepala-biro-SDM/profile') }}">
                        @endif
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
