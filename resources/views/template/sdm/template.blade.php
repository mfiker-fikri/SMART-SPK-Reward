<!DOCTYPE html>

<html lang="en"
    class="light-style layout-menu-fixed"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="../assets/"
    data-template="vertical-menu-template-free">
    <head>
        <!-- Meta Tag -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,
            initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Meta Tag -->
            <!-- Role 1 -->
                <!-- Kepala Biro SDM -->
                    @if ( request()->is('sdm/kepala-biro-SDM/dashboard*') )
                    <!-- Dashboard -->
                    <meta name="title" content="{{ Auth::guard('human_resources')->user()->full_name }} - Beranda | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
                    <meta name="description" content="{{ Auth::guard('human_resources')->user()->full_name }} - Beranda | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">

                    @elseif ( request()->is('sdm/kepala-biro-SDM/profile*') )
                    <!-- Profile -->
                    <meta name="title" content="{{ Auth::guard('human_resources')->user()->full_name }} - Data Diri | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
                    <meta name="description" content="{{ Auth::guard('human_resources')->user()->full_name }} - Data Diri | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">

                    @elseif ( request()->is('sdm/kepala-biro-SDM/signature/innovation*') )
                    <!-- Signature Innovation -->
                    <meta name="title" content="Signature Innovation | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
                    <meta name="description" content="Signature Innovation | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">

                    @elseif ( request()->is('sdm/kepala-biro-SDM/signature/representative*') )
                    <!-- Signature Representative -->
                    <meta name="title" content="Signature Representative | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
                    <meta name="description" content="Signature Representative | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
                <!--/ Kepala Biro SDM -->
            <!--/ Role 1 -->

            <!-- Role 2 -->
                <!-- Kepala Bagian Penghargaan, Disiplin, dan Tata Usaha -->
                    @elseif ( request()->is('sdm/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/dashboard*') )
                    <!-- Dashboard -->
                    <meta name="title" content="{{ Auth::guard('human_resources')->user()->full_name }} - Beranda | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
                    <meta name="description" content="{{ Auth::guard('human_resources')->user()->full_name }} - Beranda | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">

                    @elseif ( request()->is('sdm/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/profile*') )
                    <!-- Profile -->
                    <meta name="title" content="{{ Auth::guard('human_resources')->user()->full_name }} - Data Diri | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
                    <meta name="description" content="{{ Auth::guard('human_resources')->user()->full_name }} - Data Diri | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">

                <!--/ Kepala Bagian Penghargaan, Disiplin, dan Tata Usaha -->
            <!--/ Role 2 -->

            <!-- Role 3 -->
                <!-- Kepala Subbagian Penghargaan, Disiplin, dan Pensiun -->
                    @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/dashboard*') )
                    <!-- Dashboard -->
                    <meta name="title" content="{{ Auth::guard('human_resources')->user()->full_name }} - Beranda | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
                    <meta name="description" content="{{ Auth::guard('human_resources')->user()->full_name }} - Beranda | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">

                    @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/profile') )
                    <!-- Profile -->
                    <meta name="title" content="{{ Auth::guard('human_resources')->user()->full_name }} - Data Diri | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
                    <meta name="description" content="{{ Auth::guard('human_resources')->user()->full_name }} - Data Diri | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">

                    <!-- Manage Categories -->
                        @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/categories/create') )
                        <!-- Create -->
                        <meta name="title" content="Tambah Data Kategori Baru | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
                        <meta name="description" content="Tambah Data Kategori Baru | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
                        @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/categories') )
                        <!-- Read -->
                        <meta name="title" content="Kelola Data Kategori | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
                        <meta name="description" content="Kelola Data Kategori | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
                        @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/categories/view*') )
                        <!-- View -->
                        <meta name="title" content="Lihat Data Kategori | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
                        <meta name="description" content="Lihat Data Kategori | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
                        @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/categories/edit*') )
                        <!-- Edit -->
                        <meta name="title" content="Edit Data Kategori | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
                        <meta name="description" content="Edit Data Kategori | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
                    <!--/ Manage Categories -->

                    <!-- Manage Criteria -->
                        @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/criterias/create') )
                        <!-- Create -->
                        <meta name="title" content="Tambah Data Kriteria Baru | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
                        <meta name="description" content="Tambah Data Kriteria Baru | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
                        @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/criterias') )
                        <!-- Read -->
                        <meta name="title" content="Kelola Data Kriteria | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
                        <meta name="description" content="Kelola Data Kriteria | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
                        @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/criterias/view*') )
                        <!-- View -->
                        <meta name="title" content="Lihat Data Kriteria | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
                        <meta name="description" content="Lihat Data Kriteria | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
                        @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/criterias/edit*') )
                        <!-- Edit -->
                        <meta name="title" content="Edit Data Kriteria | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
                        <meta name="description" content="Edit Data Kriteria | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
                    <!--/ Manage Criteria -->

                    <!-- Manage Parameters -->
                        @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/parameters/create') )
                        <!-- Create -->
                        <meta name="title" content="Tambah Data Parameter Baru | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
                        <meta name="description" content="Tambah Data Parameter Baru | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
                        @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/parameters') )
                        <!-- Read -->
                        <meta name="title" content="Kelola Data Parameter | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
                        <meta name="description" content="Kelola Data Parameter | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
                        @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/parameters/view*') )
                        <!-- View -->
                        <meta name="title" content="Lihat Data Parameter | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
                        <meta name="description" content="Lihat Data Parameter | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
                        @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/parameters/edit*') )
                        <!-- Edit -->
                        <meta name="title" content="Edit Data Parameter | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
                        <meta name="description" content="Edit Data Parameter | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
                    <!--/ Manage Parameters -->

                    <!-- Manage Team Assessment -->
                        @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/team-assessment/create') )
                        <!-- Create -->
                        <meta name="title" content="Tambah Data Penilai Baru | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
                        <meta name="description" content="Tambah Data Penilai Baru | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
                        @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/team-assessment') )
                        <!-- Read -->
                        <meta name="title" content="Kelola Data Penilai | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
                        <meta name="description" content="Kelola Data Penilai | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
                        @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/team-assessment/view*') )
                        <!-- View -->
                        <meta name="title" content="Lihat Data Penilai | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
                        <meta name="description" content="Lihat Data Penilai | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
                        @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/team-assessment/edit*') )
                        <!-- Edit -->
                        <meta name="title" content="Edit Data Penilai | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
                        <meta name="description" content="Edit Data Penilai | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
                    <!--/ Manage Team Assessment -->

                    <!-- Manage Timer CountDown -->
                        @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/timer-countdown/form-innovation') )
                        <!-- Create Or Update -->
                        <meta name="title" content="Timer Countdown Innovation | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
                        <meta name="description" content="Timer Countdown Innovation | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
                        @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/timer-countdown/representative-appraisement') )
                        <!-- Create Or Update -->
                        <meta name="title" content="Timer Countdown Representative | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
                        <meta name="description" content="Timer Countdown Representative | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
                    <!--/ Manage Timer CountDown -->
                <!--/ Kepala Subbagian Penghargaan, Disiplin, dan Pensiun -->
            <!--/ Role 3 -->
            @endif
        <!--/ Meta Tag -->


        <!-- Title -->
            <!-- Role 1 -->
                <!-- Kepala Biro SDM -->
                @if ( request()->is('sdm/kepala-biro-SDM/dashboard*') )
                <!-- Dashboard -->
                <title> {{ Auth::guard('human_resources')->user()->full_name }} - Beranda | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia </title>

                @elseif ( request()->is('sdm/kepala-biro-SDM/profile*') )
                <!-- Profile -->
                <title> {{ Auth::guard('human_resources')->user()->full_name }} - Data Diri | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia </title>

                @elseif ( request()->is('sdm/kepala-biro-SDM/signature/innovation*') )
                <!-- Signature Innovation -->
                <title> Tanda Tangan Penghargaan Inovasi | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia </title>
                @elseif ( request()->is('sdm/kepala-biro-SDM/signature/representative*') )
                <!-- Signature Representative -->
                <title> Tanda Tangan Penghargaan Teladan | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia </title>

                @elseif ( request()->is('sdm/kepala-biro-SDM/reward/innovation*') )
                <!-- Reward Innovation -->
                <title> Hasil Penghargaan Inovasi | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia </title>
                @elseif ( request()->is('sdm/kepala-biro-SDM/reward/representative*') )
                <!-- Reward Representative -->
                <title> Hasil Penghargaan Teladan | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia </title>
                <!--/ Kepala Biro SDM -->
            <!--/ Role 1 -->

            <!-- Role 2 -->
                <!-- Kepala Bagian Penghargaan, Disiplin, dan Tata Usaha -->
                    @elseif ( request()->is('sdm/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/dashboard*') )
                    <!-- Dashboard -->
                    <title> {{ Auth::guard('human_resources')->user()->full_name }} - Beranda | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia </title>

                    @elseif ( request()->is('sdm/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/profile*') )
                    <!-- Profile -->
                    <title> {{ Auth::guard('human_resources')->user()->full_name }} - Data Diri | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia </title>

                    @elseif ( request()->is('sdm/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/signature/innovation*') )
                    <!-- Signature Innovation -->
                    <title> Tanda Tangan Penghargaan Inovasi | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia </title>
                    @elseif ( request()->is('sdm/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/signature/representative*') )
                    <!-- Signature Representative -->
                    <title> Tanda Tangan Penghargaan Teladan | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia </title>

                    @elseif ( request()->is('sdm/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/reward/innovation*') )
                    <!-- Reward Innovation -->
                    <title> Hasil Penghargaan Inovasi | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia </title>
                    @elseif ( request()->is('sdm/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/reward/representative*') )
                    <!-- Reward Representative -->
                    <title> Hasil Penghargaan Teladan | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia </title>

                <!--/ Kepala Bagian Penghargaan, Disiplin, dan Tata Usaha -->
            <!--/ Role 2 -->

            <!-- Role 3 -->
                <!-- Kepala Subbagian Penghargaan, Disiplin, dan Pensiun -->
                    @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/dashboard*') )
                    <!-- Dashboard -->
                    <title> {{ Auth::guard('human_resources')->user()->full_name }} - Beranda | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia </title>

                    @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/profile*') )
                    <!-- Profile -->
                    <title> {{ Auth::guard('human_resources')->user()->full_name }} - Data Diri | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia </title>

                    <!-- Manage Kategori -->
                        @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/categories/create') )
                        <!-- Create -->
                        <title> Tambah Data Kategori Baru | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia </title>
                        @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/categories') )
                        <!-- Read -->
                        <title> Kelola Data Kategori | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia </title>
                        @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/categories/view*') )
                        <!-- View -->
                        <title> Lihat Data Kategori | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia </title>
                        @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/categories/edit*') )
                        <!-- Edit -->
                        <title> Edit Data Kategori | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia </title>
                    <!--/ Manage Kategori -->

                    <!-- Manage Kriteria -->
                        @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/criterias/create') )
                        <!-- Create -->
                        <title> Tambah Data Kriteria Baru | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia </title>
                        @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/criterias') )
                        <!-- Read -->
                        <title> Kelola Data Kriteria | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia </title>
                        @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/criterias/view*') )
                        <!-- View -->
                        <title> Lihat Data Kriteria | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia </title>
                        @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/criterias/edit*') )
                        <!-- Edit -->
                        <title> Edit Data Kriteria | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia </title>
                    <!--/ Manage Criterias -->

                    <!-- Manage Parameters -->
                        @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/parameters/create') )
                        <!-- Create -->
                        <title> Tambah Data Parameter Baru | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia </title>
                        @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/parameters') )
                        <!-- Read -->
                        <title> Kelola Data Parameter | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia </title>
                        @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/parameters/view*') )
                        <!-- View -->
                        <title> Lihat Data Parameter | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia </title>
                        @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/parameters/edit*') )
                        <!-- Edit -->
                        <title> Edit Data Parameter | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia </title>
                    <!--/ Manage Parameters -->

                    <!-- Manage Team Assessment -->
                        @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/team-assessment/create') )
                        <!-- Create -->
                        <title> Tambah Data Penilai Baru | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia </title>
                        @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/team-assessment') )
                        <!-- Read -->
                        <title> Kelola Data Penilai | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia </title>
                        @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/team-assessment/view*') )
                        <!-- View -->
                        <title> Lihat Data Penilai | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia </title>
                        @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/team-assessment/edit*') )
                        <!-- Edit -->
                        <title> Edit Data Penilai | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia </title>
                    <!-- Manage Team Assessment -->

                    <!-- Manage Timer CountDown -->
                        @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/timer-countdown/form-innovation') )
                        <!-- Create Or Update -->
                        <title> Penghitung Waktu Mundur Inovasi | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia </title>
                        @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/timer-countdown/representative-appraisement') )
                        <!-- Create Or Update -->
                        <title> Penghitung Waktu Mundur Teladan | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia </title>
                    <!--/ Manage Timer CountDown -->

                    <!-- Manage Signature -->
                            @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/signature/innovation*') )
                            <!-- Signature Innovation -->
                            <title> Tanda Tangan Penghargaan Inovasi | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia </title>
                            @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/signature/representative*') )
                            <!-- Signature Representative -->
                            <title> Tanda Tangan Penghargaan Teladan | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia </title>
                    <!--/ Manage Signature -->

                    <!-- Manage Recap -->
                            @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/reward/innovation*') )
                            <!-- Reward Innovation -->
                            <title> Hasil Penghargaan Inovasi | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia </title>
                            @elseif ( request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/reward/representative*') )
                            <!-- Reward Representative -->
                            <title> Hasil Penghargaan Teladan | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia </title>
                    <!--/ Manage Recap -->
                <!-- Kepala Subbagian Penghargaan, Disiplin, dan Pensiun -->
            <!--/ Role 3 -->
        @endif
        <!-- /Title -->


        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('assets/favicon/apple-icon-57x57.png') }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('assets/favicon/apple-icon-60x60.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/favicon/apple-icon-72x72.png') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/favicon/apple-icon-76x76.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/favicon/apple-icon-114x114.png') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/favicon/apple-icon-120x120.png') }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets/favicon/apple-icon-144x144.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/favicon/apple-icon-152x152.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/favicon/apple-icon-180x180.png') }}">
        <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('assets/favicon/android-icon-192x192.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/favicon/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/favicon/favicon-96x96.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/favicon/favicon-16x16.png') }}">
        <link rel="manifest" href="{{ asset('assets/favicon/manifest.json') }}">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="{{ asset('assets/favicon/ms-icon-144x144.png') }}">
        <meta name="theme-color" content="#ffffff">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

        <!-- Icons. Uncomment required icon fonts -->
        <link rel="stylesheet" href="{{ asset('css/admin/ext_css/fonts/boxicons.css') }}" />

        <!-- Core CSS -->
        <link rel="stylesheet" href="{{ asset('css/admin/ext_css/core.css') }}" class="template-customizer-core-css" />
        <link rel="stylesheet" href="{{ asset('css/admin/ext_css/theme-default.css') }}" class="template-customizer-theme-css" />
        <link rel="stylesheet" href="{{ asset('css/admin/ext_css/demo.css') }}" />

        <!-- Vendors CSS -->
        <link rel="stylesheet" href="{{ asset('css/admin/ext_css/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

        <link rel="stylesheet" href="{{ asset('css/admin/ext_css/libs/apex-charts/apex-charts.css') }}" />

        <!-- Page CSS -->
        <!-- Helpers -->
        <script src="{{ asset('js/admin/ext_js/js/helpers.js') }}"></script>

        <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
        <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
        <script src="{{ asset('js/admin/ext_js/js/config.js') }}"></script>

        <!-- Add Ext Plugin -->
        <!-- Bootstrap 5 dan 4 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous"> --}}

        <!-- Icon Font Awesome -->
        <script src="https://kit.fontawesome.com/8beb7150bc.js" crossorigin="anonymous"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/brands.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/fontawesome.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/regular.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/solid.min.css" rel="stylesheet">

        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/brands.min.css" rel="stylesheet" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/fontawesome.min.css" rel="stylesheet" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/regular.min.css" rel="stylesheet" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/solid.min.css" rel="stylesheet" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/svg-with-js.min.css" rel="stylesheet" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/v4-font-face.min.css" rel="stylesheet" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/v4-shims.min.css" rel="stylesheet" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/v5-font-face.min.css" rel="stylesheet" crossorigin="anonymous">

        <!-- Sweet Alert 2 -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="sweetalert2.all.min.js"></script>

        <!-- Sweet Alert -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <!-- Animate Css -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

        <!-- Webcam Js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>

        <!-- Datatables -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/autofill/2.4.0/css/autoFill.dataTables.min.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/4.1.0/css/fixedColumns.dataTables.min.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.4/css/fixedHeader.dataTables.min.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap5.css" />



        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js" crossorigin="anonymous" defer></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js" crossorigin="anonymous" defer></script>
        <script src="https://cdn.datatables.net/autofill/2.4.0/js/dataTables.autoFill.min.js" crossorigin="anonymous" defer></script>
        <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js" crossorigin="anonymous" defer></script>
        <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js" crossorigin="anonymous" defer></script>
        <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.colVis.min.js" crossorigin="anonymous" defer></script>
        <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js" crossorigin="anonymous" defer></script>
        <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js" crossorigin="anonymous" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" crossorigin="anonymous" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" crossorigin="anonymous" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" crossorigin="anonymous" defer></script>
        <script src="https://cdn.datatables.net/fixedheader/3.2.4/js/dataTables.fixedHeader.min.js" crossorigin="anonymous" defer></script>
        <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js" crossorigin="anonymous" defer></script>
        <script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap.min.js" crossorigin="anonymous" defer></script>
        <script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js" crossorigin="anonymous" defer></script>
        <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.js" crossorigin="anonymous" defer></script>
        <script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap5.js" crossorigin="anonymous" defer></script>
        <script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.dataTables.js" crossorigin="anonymous" defer></script>
        <script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.dataTables.min.js" crossorigin="anonymous" defer></script>

        <!-- Ajax Jquery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

        <!-- Password Hide -->
        <script src="{{ asset('js/admin/int_js/password/show-hide-password.js') }}" crossorigin="anonymous" defer></script>
        <script src="{{ asset('js/admin/int_js/password/show-hide-password.min.js') }}" crossorigin="anonymous" defer></script>

        <!-- Select2 -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.min.css" integrity="sha512-aD9ophpFQ61nFZP6hXYu4Q/b/USW7rpLCQLX6Bi0WJHXNO7Js/fUENpBQf/+P4NtpzNX0jSgR5zVvPOJp+W2Kg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js" integrity="sha512-4MvcHwcbqXKUHB6Lx3Zb5CEAVoE9u84qN+ZSMM6s7z8IeJriExrV3ND5zRze9mxNlABJ6k864P/Vl8m0Sd3DtQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.full.min.js" integrity="sha512-PZUUFofP00wI366Au6XSNyN4Zg8M8Kma4JKIG7ywt8FEY1+Ur0H+FAlH6o0fKoCrdmM4+ZzMyW30msp8Z2zDaA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" /> --}}
        {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" /> --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
        <!-- Or for RTL support -->
        {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" /> --}}
        <!--/ Select2 -->

        {{-- <link link rel="stylesheet" href="{{ asset('css/admin/int_css/login.css') }}" /> --}}

        <!-- Date Picker -->
        <link rel="stylesheet" href="{{ asset('css/pegawai/ext_css/datepicker/datepicker-bs5.css') }}" crossorigin="anonymous" />
        <link rel="stylesheet" href="{{ asset('css/pegawai/ext_css/datepicker/datepicker-bs5.min.css') }}" crossorigin="anonymous" />
        <link rel="stylesheet" href="{{ asset('css/pegawai/ext_css/datepicker/datepicker-bulma.css') }}" crossorigin="anonymous" />
        <link rel="stylesheet" href="{{ asset('css/pegawai/ext_css/datepicker/datepicker-bulma.min.css') }}" crossorigin="anonymous" />
        <link rel="stylesheet" href="{{ asset('css/pegawai/ext_css/datepicker/datepicker-foundation.css') }}" crossorigin="anonymous" />
        <link rel="stylesheet" href="{{ asset('css/pegawai/ext_css/datepicker/datepicker-foundation.min.css') }}" crossorigin="anonymous" />
        <link rel="stylesheet" href="{{ asset('css/pegawai/ext_css/datepicker/datepicker.css') }}" crossorigin="anonymous" />
        <link rel="stylesheet" href="{{ asset('css/pegawai/ext_css/datepicker/datepicker.min.css') }}" crossorigin="anonymous" />
        {{-- <script src="{{ asset('js/pegawai/ext_js/datepicker/datepicker-full.js') }}"></script> --}}

        <!--/ Date Picker -->

        <script>
            function onLoad() {
                new InputMask().Initialize(document.querySelectorAll("#sample-ssnmask"),
                {
                    mask: InputMaskDefaultMask.Ssn,
                    placeHolder: "SSN: 999-99-9999"
                });

                new InputMask().Initialize(document.querySelectorAll("#date_birth"),
                // new InputMask().Initialize(document.getElementById('date_birth'),
                {
                    mask: InputMaskDefaultMask.Date,
                    placeHolder: "Date: 01/01/2015"
                });

                new InputMask().Initialize(document.querySelectorAll("#sample-phone"),
                {
                    mask: InputMaskDefaultMask.Phone,
                    placeHolder: "Phone: (999) 999-9999"
                });
            }
        </script>

        <!--  -->
        @stack('css_header')
        @stack('js_header')
        @yield('css_header')
        @yield('js_header')
        <!--/ -->

        <style>
            .preloader {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: 9999;
                background-color: #fff;
            }
            .preloader .loading {
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%,-50%);
                font: 14px arial;
            }

            input::-ms-reveal,
            input::-ms-clear {
                display: none;
            }
        </style>

        <!--/ Add Ext Plugin -->
    </head>

    <body onload="startTime();onLoad();">
    {{-- <body onload="start()"> --}}
        <div class="preloader">
            <div class="loading">
                <img src="{{ asset('css/pegawai/ext_css/GIF/Hourglass.gif') }}" width="80">
                <p>Harap Tunggu</p>
            </div>
        </div>

        <!-- Layout wrapper -->
        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
                <!-- Menu -->
                @include('layouts.sdm.sidebar.sidebar')
                <!-- / Menu -->

                <!-- Layout container -->
                <div class="layout-page">
                    <!-- Navbar -->
                    @include('layouts.sdm.header.header')
                    <!-- / Navbar -->

                    <!-- Content wrapper -->
                    <div class="content-wrapper">
                        <!-- Content -->
                        @yield('content')
                        @include('sweetalert::alert')
                        <!-- / Content -->

                        <!-- Footer -->
                        @include('layouts.sdm.footer.footer')
                        <!-- / Footer -->

                        <div class="content-backdrop fade"></div>
                    </div>
                    <!-- Content wrapper -->
                </div>
                <!-- / Layout page -->
            </div>

            <!-- Overlay -->
            <div class="layout-overlay layout-menu-toggle"></div>
        </div>
        <!-- / Layout wrapper -->

        <!-- Core JS -->
        <!-- build:js assets/vendor/js/core.js -->
        <script src="{{ asset('js/admin/ext_js/libs/jquery/jquery.js') }}"></script>
        <script src="{{ asset('js/admin/ext_js/libs/popper/popper.js') }}"></script>
        {{-- <script src="{{ asset('js/admin/ext_js/js/bootstrap.js') }}"></script> --}}
        <script src="{{ asset('js/admin/ext_js/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

        <script src="{{ asset('js/admin/ext_js/js/menu.js') }}"></script>
        <!-- endbuild -->

        <!-- Vendors JS -->
        <script src="{{ asset('js/admin/ext_js/libs/apex-charts/apexcharts.js') }}"></script>

        <!-- Main JS -->
        <script src="{{ asset('js/admin/ext_js/js/main.js') }}"></script>

        <!-- Page JS -->
        <script src="{{ asset('js/admin/ext_js/js/dashboards-analytics.js') }}"></script>

        <!-- Place this tag in your head or just before your close body tag. -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>

        <!-- Add Ext Plugin -->
        <!-- Bootstrap 5 dan 4 -->
        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> --}}
        {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script> --}}

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        <!--
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>


        <!-- Icon Font Awesome -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/brands.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/fontawesome.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/regular.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/solid.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/brands.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/fontawesome.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/regular.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/solid.min.js"></script>
        <!--/ Icon Font Awesome -->

        <!-- Select2 -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.min.css" integrity="sha512-aD9ophpFQ61nFZP6hXYu4Q/b/USW7rpLCQLX6Bi0WJHXNO7Js/fUENpBQf/+P4NtpzNX0jSgR5zVvPOJp+W2Kg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js" integrity="sha512-4MvcHwcbqXKUHB6Lx3Zb5CEAVoE9u84qN+ZSMM6s7z8IeJriExrV3ND5zRze9mxNlABJ6k864P/Vl8m0Sd3DtQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.full.min.js" integrity="sha512-PZUUFofP00wI366Au6XSNyN4Zg8M8Kma4JKIG7ywt8FEY1+Ur0H+FAlH6o0fKoCrdmM4+ZzMyW30msp8Z2zDaA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <!-- Date Picker -->
        <script src="{{ asset('js/pegawai/ext_js/datepicker/datepicker-full.js') }}"></script>
        <script src="{{ asset('js/pegawai/ext_js/datepicker/datepicker-full.min.js') }}"></script>
        <script src="{{ asset('js/pegawai/ext_js/datepicker/datepicker.js') }}"></script>
        <script src="{{ asset('js/pegawai/ext_js/datepicker/datepicker.min.js') }}"></script>

        <!--/ Date Picker -->

        <!-- -->
        @stack('js_footer')
        @yield('js_footer')

        <!-- Loader -->
        <script>
            $(document).ready(function(){
                $(".preloader").delay(5000).fadeOut();
            })
        </script>
        <!--/ Loader  -->

        <!-- Greeting Morning, Afternoon, etc -->
        <script type="text/javascript">
            // Get Date
            var day = new Date();
            // Get Hour
            var hr = day.getHours();
            //
            let greeting;
            //
            if (hr >= 4 && hr < 10) {
                greeting = "Selamat Pagi!";
            } else if (hr >= 10 && hr < 15) {
                greeting = "Selamat Siang!"
            } else if (hr >= 15 && hr < 18) {
                greeting = "Selamat Sore!"
            } else {
                greeting = "Selamat Malam!"
            }
            document.getElementById("greeting").innerHTML = greeting;
        </script>
        <!--/ Greeting Morning, Afternoon, etc -->

        <!-- Clock & Date -->
        <script type="text/javascript">
            function startTime() {
                const today = new Date();
                let h = today.getHours();
                let m = today.getMinutes();
                let s = today.getSeconds();
                m = checkTime(m);
                s = checkTime(s);
                document.getElementById('clock').innerHTML =  h + ":" + m + ":" + s;
                setTimeout(startTime, 1000);

                var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                var days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                var curWeekDay = days[today.getDay()];
                var curDay = today.getDate();
                var curMonth = months[today.getMonth()];
                var curYear = today.getFullYear();
                var date = curWeekDay+","+" "+curDay+" "+curMonth+" "+curYear;
                document.getElementById("date").innerHTML = date;
            }

            function checkTime(i) {
                if (i < 10) {
                    i = "0" + i
                };  // add zero in front of numbers < 10
                return i;
            }

            // function onLoad() {
            //     new InputMask().Initialize(document.querySelectorAll("#sample-ssnmask"),
            //     {
            //         mask: InputMaskDefaultMask.Ssn,
            //         placeHolder: "SSN: 999-99-9999"
            //     });

            //     new InputMask().Initialize(document.querySelectorAll("#date_birth"),
            //     // new InputMask().Initialize(document.getElementById('date_birth'),
            //     {
            //         mask: InputMaskDefaultMask.Date,
            //         placeHolder: "Date: 01/01/2015"
            //     });

            //     new InputMask().Initialize(document.querySelectorAll("#sample-phone"),
            //     {
            //         mask: InputMaskDefaultMask.Phone,
            //         placeHolder: "Phone: (999) 999-9999"
            //     });
            // }

            function start() {
                startTime();
                onLoad();
            }


        </script>
        <!--/ Clock & Date -->

        <!-- Logout SDM -->
        <script>
            document.getElementById("logout").onclick = function() {
                logoutSDM()
            };

            function logoutSDM() {
                Swal.fire({
                    title: 'Apakah kamu ingin keluar?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Tidak',
                    showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "/sdm/logout";
                    }
                })
            }
        </script>
        <!--/ Logout SDM -->

        <!-- -->
        <script type="text/javascript">
            $(document).ready(function () {
                //Disable cut copy paste
                $(document).bind('cut copy paste', function (e) {
                    e.preventDefault();
                });

                //Disable mouse right click
                // $(document).on("contextmenu",function(e){
                //     return false;
                // });
            });
        </script>
        <!--/ -->

        <!--/ Add Ext Plugin -->
    </body>
</html>
