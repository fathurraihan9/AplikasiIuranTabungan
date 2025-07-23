<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite(['resources/dist/css/adminlte.min.css', 'resources/dist/js/adminlte.min.js'])

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
        integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous" media="print"
        onload="this.media='all'" />
    <!--end::Fonts-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css"
        crossorigin="anonymous" />
    <!--end::Third Party Plugin(OverlayScrollbars)-->
    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
        crossorigin="anonymous" />
    <title>Aplikasi Iuran dan Tabungan</title>
</head>

<body class="sidebar-expand-lg sidebar-open bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
        <!--begin::Header-->
        <nav class="app-header navbar navbar-expand bg-body">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Start Navbar Links-->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                            <i class="bi bi-list"></i>
                        </a>
                    </li>
                </ul>
                <!--end::Start Navbar Links-->
                <!--begin::End Navbar Links-->
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item d-none d-md-block ml-auto"><a href="#" class="nav-link">Kontak</a></li>
                    <li class="nav-item d-none d-md-block"><a href="#" class="nav-link">Logout</a></li>
                </ul>
                <!--end::End Navbar Links-->
            </div>
            <!--end::Container-->
        </nav>
        <!--end::Header-->
        <!--begin::Sidebar-->
        <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
            <!--begin::Sidebar Brand-->
            <div class="sidebar-brand">
                <!--begin::Brand Link-->
                <a href="../index.html" class="brand-link">
                    <!--begin::Brand Image-->
                    {{-- <img src="../assets/img/AdminLTELogo.png" alt="AdminLTE Logo"
                        class="brand-image opacity-75 shadow" /> --}}
                    <!--end::Brand Image-->
                    <!--begin::Brand Text-->
                    <span class="brand-text fw-light">Aplikasi Tabungan Dan Iuran</span>
                    <!--end::Brand Text-->
                </a>
                <!--end::Brand Link-->
            </div>
            <!--end::Sidebar Brand-->
            <!--begin::Sidebar Wrapper-->
            <div class="sidebar-wrapper">
                <nav class="mt-2">
                    <!--begin::Sidebar Menu-->
                    <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation"
                        aria-label="Main navigation" data-accordion="false" id="navigation">
                        <li class="nav-item">
                            <a href="../generate/theme.html" class="nav-link">
                                <i class="nav-icon bi bi-palette"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../generate/theme.html" class="nav-link">
                                <i class="nav-icon bi bi-people"></i>
                                <p>Santri</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-cash"></i>
                                <p>
                                    Iuran
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../index.html" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Pembayaran Iuran</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../index2.html" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Riwayat Pembayaran</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-bank"></i>
                                <p>
                                    Tabungan
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../index.html" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Setoran</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../index2.html" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Tarik Tabungan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../index2.html" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Pengelolaan Salod</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../index2.html" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Riwayat Transaksi Tabungan</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="../generate/theme.html" class="nav-link">
                                <i class="nav-icon bi bi-journal-check"></i>
                                <p>Laporan</p>
                            </a>
                        </li>
                    </ul>
                    <!--end::Sidebar Menu-->
                </nav>
            </div>
            <!--end::Sidebar Wrapper-->
        </aside>
        <!--end::Sidebar-->
        <!--begin::App Main-->
        <main class="app-main">
            <!--begin::App Content Header-->
            <div class="app-content-header">
                @yield('app-content-header')
            </div>
            <!--end::App Content Header-->
            <!--begin::App Content-->
            <div class="app-content">
                @yield('app-content')
            </div>
            <!--end::App Content-->
        </main>
    </div>
</body>

</html>
