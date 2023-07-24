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
                        Beranda
                    </li>
                <!--/ Dashboard -->

                <!-- Profile -->
                @elseif ( request()->is('sdm/kepala-biro-SDM/profile') )
                    <li class="breadcrumb-item fw-light">
                        <a href="{{ URL::to('/sdm/kepala-biro-SDM/dashboard') }}" style="text-decoration: none !important;">Beranda</a>
                    </li>
                    <li class="breadcrumb-item fw-bold active">Data Diri</li>
                <!--/ Profile -->

                <!-- Tanda Tangan -->
                @elseif ( request()->is('sdm/kepala-biro-SDM/signature/innovation') )
                    <li class="breadcrumb-item fw-light">
                        <a href="{{ URL::to('/sdm/kepala-biro-SDM/dashboard') }}" style="text-decoration: none !important;">Beranda</a>
                    </li>
                    <li class="breadcrumb-item fw-bold active">Tanda Tangan Penghargaan Inovasi</li>
                @elseif ( request()->is('sdm/kepala-biro-SDM/signature/representative') )
                    <li class="breadcrumb-item fw-light">
                        <a href="{{ URL::to('/sdm/kepala-biro-SDM/dashboard') }}" style="text-decoration: none !important;">Beranda</a>
                    </li>
                    <li class="breadcrumb-item fw-bold active">Tanda Tangan Penghargaan Teladan</li>
                <!--/ Tanda Tangan -->

                <!-- Hasil Rekap -->
                @elseif ( request()->is('sdm/kepala-biro-SDM/reward/innovation') )
                    <li class="breadcrumb-item fw-light">
                        <a href="{{ URL::to('/sdm/kepala-biro-SDM/dashboard') }}" style="text-decoration: none !important;">Beranda</a>
                    </li>
                    <li class="breadcrumb-item fw-bold active">Hasil Rekap Penghargaan Inovasi</li>
                @elseif ( request()->is('sdm/kepala-biro-SDM/reward/representative') )
                    <li class="breadcrumb-item fw-light">
                        <a href="{{ URL::to('/sdm/kepala-biro-SDM/dashboard') }}" style="text-decoration: none !important;">Beranda</a>
                    </li>
                    <li class="breadcrumb-item fw-bold active">Hasil Rekap Penghargaan Teladan</li>
                <!--/ Hasil Rekap -->

                @endif

            @elseif (Auth::guard('human_resources')->user()->role == 2)
                <!-- Dashboard -->
                @if ( request()->is('sdm/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/dashboard') )
                <li class="breadcrumb-item fw-bold active">
                    Beranda
                </li>
                <!--/ Dashboard -->

                <!-- Profile -->
                @elseif ( request()->is('sdm/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/profile') )
                    <li class="breadcrumb-item fw-light">
                        <a href="{{ URL::to('/sdm/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/dashboard') }}" style="text-decoration: none !important;">Beranda</a>
                    </li>
                    <li class="breadcrumb-item fw-bold active">Data Diri</li>
                <!--/ Profile -->

                <!-- Tanda Tangan -->
                @elseif ( request()->is('sdm/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/signature/innovation') )
                    <li class="breadcrumb-item fw-light">
                        <a href="{{ URL::to('/sdm/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/dashboard') }}" style="text-decoration: none !important;">Beranda</a>
                    </li>
                    <li class="breadcrumb-item fw-bold active">Tanda Tangan Penghargaan Inovasi</li>
                @elseif ( request()->is('sdm/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/signature/representative') )
                    <li class="breadcrumb-item fw-light">
                        <a href="{{ URL::to('/sdm/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/dashboard') }}" style="text-decoration: none !important;">Beranda</a>
                    </li>
                    <li class="breadcrumb-item fw-bold active">Tanda Tangan Penghargaan Teladan</li>
                <!--/ Tanda Tangan -->

                <!-- Hasil Rekap -->
                @elseif ( request()->is('sdm/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/reward/innovation') )
                    <li class="breadcrumb-item fw-light">
                        <a href="{{ URL::to('/sdm/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/dashboard') }}" style="text-decoration: none !important;">Beranda</a>
                    </li>
                    <li class="breadcrumb-item fw-bold active">Hasil Rekap Penghargaan Inovasi</li>
                @elseif ( request()->is('sdm/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/reward/representative') )
                    <li class="breadcrumb-item fw-light">
                        <a href="{{ URL::to('/sdm/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/dashboard') }}" style="text-decoration: none !important;">Beranda</a>
                    </li>
                    <li class="breadcrumb-item fw-bold active">Hasil Rekap Penghargaan Teladan</li>
                <!--/ Hasil Rekap -->



                @endif

            <!-- Kepala Subbagian Penghargaan, Disiplin, dan Pensiun -->
            @elseif (Auth::guard('human_resources')->user()->role == 3)
                <!-- Dashboard -->
                @if ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/dashboard') )
                <li class="breadcrumb-item fw-bold active">
                    Beranda
                </li>
                <!--/ Dashboard -->

                <!-- Profile -->
                @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/profile') )
                    <li class="breadcrumb-item fw-light">
                        <a href="{{ URL::to('/sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/dashboard') }}" style="text-decoration: none !important;">Beranda</a>
                    </li>
                    <li class="breadcrumb-item fw-bold active">Data Diri</li>
                <!--/ Profile -->

                <!-- Manage Categories -->
                @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/categories/create') )
                    <!-- Create -->
                    <li class="breadcrumb-item fw-light">
                        <a href="{{ URL::to('/sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/dashboard') }}" style="text-decoration: none !important;">Beranda</a>
                    </li>
                    <li class="breadcrumb-item fw-light">
                        <a href="{{ URL::to('/sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/categories') }}" style="text-decoration: none !important;">Kelola Data Kategori</a>
                    </li>
                    <li class="breadcrumb-item fw-bold active">Tambah Data Kategori Baru</li>
                @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/categories') )
                    <!-- Read -->
                    <li class="breadcrumb-item fw-light">
                        <a href="{{ URL::to('/sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/dashboard') }}" style="text-decoration: none !important;">Beranda</a>
                    </li>
                    <li class="breadcrumb-item fw-bold active">Kelola Data Kategori</li>
                @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/categories/view*') )
                    <!-- View -->
                    <li class="breadcrumb-item fw-light">
                        <a href="{{ URL::to('/sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/dashboard') }}" style="text-decoration: none !important;">Beranda</a>
                    </li>
                    <li class="breadcrumb-item fw-light">
                        <a href="{{ URL::to('/sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/categories') }}" style="text-decoration: none !important;">Kelola Data Kategori</a>
                    </li>
                    <li class="breadcrumb-item fw-bold active">Lihat Data Kategori</li>
                @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/categories/edit*') )
                    <!-- Edit -->
                    <li class="breadcrumb-item fw-light">
                        <a href="{{ URL::to('/sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/dashboard') }}" style="text-decoration: none !important;">Beranda</a>
                    </li>
                    <li class="breadcrumb-item fw-light">
                        <a href="{{ URL::to('/sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/categories') }}" style="text-decoration: none !important;">Kelola Data Kategori</a>
                    </li>
                    <li class="breadcrumb-item fw-bold active">Edit Data Kategori</li>
                <!--/ Manage Categories -->

                <!-- Manage Criterias -->
                @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/criterias/create') )
                    <!-- Create -->
                    <li class="breadcrumb-item fw-light">
                        <a href="{{ URL::to('/sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/dashboard') }}" style="text-decoration: none !important;">Beranda</a>
                    </li>
                    <li class="breadcrumb-item fw-light">
                        <a href="{{ URL::to('/sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/criterias') }}" style="text-decoration: none !important;">Kelola Data Kriteria</a>
                    </li>
                    <li class="breadcrumb-item fw-bold active">Tambah Data Kriteria Baru</li>
                @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/criterias') )
                    <!-- Read -->
                    <li class="breadcrumb-item fw-light">
                        <a href="{{ URL::to('/sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/dashboard') }}" style="text-decoration: none !important;">Beranda</a>
                    </li>
                    <li class="breadcrumb-item fw-bold active">Kelola Data Kriteria</li>
                @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/criterias/view*') )
                    <!-- View -->
                    <li class="breadcrumb-item fw-light">
                        <a href="{{ URL::to('/sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/dashboard') }}" style="text-decoration: none !important;">Beranda</a>
                    </li>
                    <li class="breadcrumb-item fw-light">
                        <a href="{{ URL::to('/sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/criterias') }}" style="text-decoration: none !important;">Kelola Data Kriteria</a>
                    </li>
                    <li class="breadcrumb-item fw-bold active">Lihat Data Kriteria</li>
                @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/criterias/edit*') )
                    <!-- Edit -->
                    <li class="breadcrumb-item fw-light">
                        <a href="{{ URL::to('/sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/dashboard') }}" style="text-decoration: none !important;">Beranda</a>
                    </li>
                    <li class="breadcrumb-item fw-light">
                        <a href="{{ URL::to('/sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/criterias') }}" style="text-decoration: none !important;">Kelola Data Kriteria</a>
                    </li>
                    <li class="breadcrumb-item fw-bold active">Edit Data Kriteria</li>
                <!--/ Manage Criterias -->

                <!-- Manage Parameters -->
                @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/parameters/create') )
                    <!-- Create -->
                    <li class="breadcrumb-item fw-light">
                        <a href="{{ URL::to('/sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/dashboard') }}" style="text-decoration: none !important;">Beranda</a>
                    </li>
                    <li class="breadcrumb-item fw-light">
                        <a href="{{ URL::to('/sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/parameters') }}" style="text-decoration: none !important;">Kelola Data Parameter</a>
                    </li>
                    <li class="breadcrumb-item fw-bold active">Tambah Data Parameter Baru</li>
                @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/parameters') )
                    <!-- Read -->
                    <li class="breadcrumb-item fw-light">
                        <a href="{{ URL::to('/sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/dashboard') }}" style="text-decoration: none !important;">Beranda</a>
                    </li>
                    <li class="breadcrumb-item fw-bold active">Kelola Data Parameter</li>
                @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/parameters/view*') )
                    <!-- View -->
                    <li class="breadcrumb-item fw-light">
                        <a href="{{ URL::to('/sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/dashboard') }}" style="text-decoration: none !important;">Beranda</a>
                    </li>
                    <li class="breadcrumb-item fw-light">
                        <a href="{{ URL::to('/sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/parameters') }}" style="text-decoration: none !important;">Kelola Data Parameter</a>
                    </li>
                    <li class="breadcrumb-item fw-bold active">Lihat Data Parameter</li>
                @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/parameters/edit*') )
                    <!-- Edit -->
                    <li class="breadcrumb-item fw-light">
                        <a href="{{ URL::to('/sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/dashboard') }}" style="text-decoration: none !important;">Beranda</a>
                    </li>
                    <li class="breadcrumb-item fw-light">
                        <a href="{{ URL::to('/sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/parameters') }}" style="text-decoration: none !important;">Kelola Data Parameter</a>
                    </li>
                    <li class="breadcrumb-item fw-bold active">Edit Data Parameter</li>
                <!--/ Manage Parameters -->

                <!-- Manage Team Assessment -->
                @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/team-assessment/create') )
                    <!-- Create -->
                    <li class="breadcrumb-item fw-light">
                        <a href="{{ URL::to('/sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/dashboard') }}" style="text-decoration: none !important;">Beranda</a>
                    </li>
                    <li class="breadcrumb-item fw-light">
                        <a href="{{ URL::to('/sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/team-assessment') }}" style="text-decoration: none !important;">Kelola Data Tim Penilai</a>
                    </li>
                    <li class="breadcrumb-item fw-bold active">Tambah Data Tim Penilai Baru</li>
                @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/team-assessment') )
                    <!-- Read -->
                    <li class="breadcrumb-item fw-light">
                        <a href="{{ URL::to('/sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/dashboard') }}" style="text-decoration: none !important;">Beranda</a>
                    </li>
                    <li class="breadcrumb-item fw-bold active">Kelola Data Tim Penilai</li>
                @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/team-assessment/view*') )
                    <!-- View -->
                    <li class="breadcrumb-item fw-light">
                        <a href="{{ URL::to('/sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/dashboard') }}" style="text-decoration: none !important;">Beranda</a>
                    </li>
                    <li class="breadcrumb-item fw-light">
                        <a href="{{ URL::to('/sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/team-assessment') }}" style="text-decoration: none !important;">Kelola Data Tim Penilai</a>
                    </li>
                    <li class="breadcrumb-item fw-bold active">Lihat Data Tim Penilai</li>
                @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/team-assessment/edit*') )
                    <!-- Edit -->
                    <li class="breadcrumb-item fw-light">
                        <a href="{{ URL::to('/sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/dashboard') }}" style="text-decoration: none !important;">Beranda</a>
                    </li>
                    <li class="breadcrumb-item fw-light">
                        <a href="{{ URL::to('/sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/team-assessment') }}" style="text-decoration: none !important;">Kelola Data Tim Penilai</a>
                    </li>
                    <li class="breadcrumb-item fw-bold active">Edit Data Tim Penilai</li>
                <!--/ Manage Team Assessment -->

                <!-- Manage Timer CountDown -->
                @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/timer-countdown/form-innovation') )
                    <!-- Create Or Update -->
                    <li class="breadcrumb-item fw-light">
                        <a href="{{ URL::to('/sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/dashboard') }}" style="text-decoration: none !important;">Beranda</a>
                    </li>
                    <li class="breadcrumb-item fw-bold active">Innovation Countdown Timer  </li>
                @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/timer-countdown/representative-appraisement') )
                    <!-- Create Or Update -->
                    <li class="breadcrumb-item fw-light">
                        <a href="{{ URL::to('/sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/dashboard') }}" style="text-decoration: none !important;">Beranda</a>
                    </li>
                    <li class="breadcrumb-item fw-bold active">Representative Countdown Timer </li>
                <!--/ Manage Timer CountDown -->

                <!-- Signature Innovation -->
                @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/signature/innovation') )
                    <!-- Read -->
                    <li class="breadcrumb-item fw-light">
                        <a href="{{ URL::to('/sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/dashboard') }}" style="text-decoration: none !important;">Beranda</a>
                    </li>
                    <li class="breadcrumb-item fw-bold active">Innovation Award Signature</li>
                <!--/ Signature Innovation -->

                <!-- Signature Teladan -->
                @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/signature/representative') )
                    <!-- Read -->
                    <li class="breadcrumb-item fw-light">
                        <a href="{{ URL::to('/sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/dashboard') }}" style="text-decoration: none !important;">Beranda</a>
                    </li>
                    <li class="breadcrumb-item fw-bold active">Representative Award Signature</li>
                <!--/ Signature Teladan -->


                @endif

            @endif




        </ol>
        <!--/ Breadcrumb -->


        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <!-- Place this tag where you want the button to render. -->
            <!-- Head Of Human Resources -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar {{ Auth::guard('human_resources')->user()->status_id == 1 && Auth::guard('human_resources')->user()->status_active == 1 && (Cache::has('humanResource-is-online-' . Auth::guard('human_resources')->user()->id)) ? 'avatar-online' : '' }}">
                        <!-- Photo Profile -->
                        @if (Auth::guard('human_resources')->user()->photo_profile)
                            @if (Auth::guard('human_resources')->user()->role == 1)
                            <!-- Role 1 -->
                            <img src="{{ asset( 'storage/sdm/headOfHumanResources/photos/photoProfile/'. Auth::guard('human_resources')->user()->username. '/' . Auth::guard('human_resources')->user()->photo_profile) }}"
                            alt="headOfHumanResources-avatar {{ Auth::guard('human_resources')->user()->full_name }}" class="rounded-circle"
                            style="width: 40px; height: 45px" id="headOfHumanResourcesAvatar" />
                            @elseif (Auth::guard('human_resources')->user()->role == 2)
                            <!-- Role 2 -->
                            <img src="{{ asset( 'storage/sdm/headOfDisciplinaryAwardsAndAdministration/photos/photoProfile/'. Auth::guard('human_resources')->user()->username. '/' . Auth::guard('human_resources')->user()->photo_profile) }}"
                            alt="headOfDisciplinaryAwardsAndAdministration-avatar {{ Auth::guard('human_resources')->user()->full_name }}" class="rounded-circle"
                            style="width: 40px; height: 45px" id="headOfDisciplinaryAwardsAndAdministrationAvatar" />
                            @elseif (Auth::guard('human_resources')->user()->role == 3)
                            <!-- Role 3 -->
                            <img src="{{ asset( 'storage/sdm/headOfRewardsDisciplineAndPensionSubdivision/photos/photoProfile/'. Auth::guard('human_resources')->user()->username. '/' . Auth::guard('human_resources')->user()->photo_profile) }}"
                            alt="headOfRewardsDisciplineAndPensionSubdivision-avatar {{ Auth::guard('human_resources')->user()->full_name }}" class="rounded-circle"
                            style="width: 40px; height: 45px" id="headOfRewardsDisciplineAndPensionSubdivisionAvatar" />
                            @endif
                        @else
                            <img src="https://th.bing.com/th/id/OIP.xcp9_uPOg5pOlPQyd63c9wHaKX?pid=ImgDet&rs=1"
                                alt="humanResources-avatar" class="rounded-circle"
                                style="width: 40px; height: 45px" id="humanResourcesAvatar" />
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
                                <div class="avatar {{ Cache::has('humanResource-is-online-' . Auth::guard('human_resources')->user()->id ) ? 'avatar-online' : '' }}">
                                    <!-- Photo Profile -->
                                    @if (Auth::guard('human_resources')->user()->photo_profile)
                                        @if (Auth::guard('human_resources')->user()->role == 1)
                                        <!-- Role 1 -->
                                        <img src="{{ asset( 'storage/sdm/headOfHumanResources/photos/photoProfile/'. Auth::guard('human_resources')->user()->username. '/' . Auth::guard('human_resources')->user()->photo_profile) }}"
                                        alt="headOfHumanResources-avatar {{ Auth::guard('human_resources')->user()->full_name }}" class="rounded-circle"
                                        style="width: 40px; height: 45px" id="headOfHumanResourcesAvatar" />
                                        @elseif (Auth::guard('human_resources')->user()->role == 2)
                                        <!-- Role 2 -->
                                        <img src="{{ asset( 'storage/sdm/headOfDisciplinaryAwardsAndAdministration/photos/photoProfile/'. Auth::guard('human_resources')->user()->username. '/' . Auth::guard('human_resources')->user()->photo_profile) }}"
                                        alt="headOfDisciplinaryAwardsAndAdministration-avatar {{ Auth::guard('human_resources')->user()->full_name }}" class="rounded-circle"
                                        style="width: 40px; height: 45px" id="headOfDisciplinaryAwardsAndAdministrationAvatar" />
                                        @elseif (Auth::guard('human_resources')->user()->role == 3)
                                        <!-- Role 3 -->
                                        <img src="{{ asset( 'storage/sdm/headOfRewardsDisciplineAndPensionSubdivision/photos/photoProfile/'. Auth::guard('human_resources')->user()->username. '/' . Auth::guard('human_resources')->user()->photo_profile) }}"
                                        alt="headOfRewardsDisciplineAndPensionSubdivision-avatar {{ Auth::guard('human_resources')->user()->full_name }}" class="rounded-circle"
                                        style="width: 40px; height: 45px" id="headOfRewardsDisciplineAndPensionSubdivisionAvatar" />
                                        @endif
                                    @else
                                        <img src="https://th.bing.com/th/id/OIP.xcp9_uPOg5pOlPQyd63c9wHaKX?pid=ImgDet&rs=1"
                                            alt="humanResources-avatar" class="rounded-circle"
                                            style="width: 40px; height: 45px" id="humanResourcesAvatar" />
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
                        <a class="d-flex flex-row justify-content-start align-middle dropdown-item {{ (request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/profile')) ? 'active' : '' }}" href="{{ URL::to('/sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/profile') }}">
                        @endif
                            <i class="fa-solid fa-user-large fa-lg me-3"></i>
                            <span class="align-middle">Data Diri</span>
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
                            <span class="align-middle">Keluar</span>
                        </a>
                    </li>
                    <!--/ Logout -->
                </ul>
            </li>
            <!--/ User -->
        </ul>
    </div>
</nav>
