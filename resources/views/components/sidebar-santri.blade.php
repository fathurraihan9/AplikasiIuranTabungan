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
                {{-- dashboard --}}
                <li class="nav-item">
                    <a href="{{ route('santri.dashboard') }}"
                        class="nav-link {{ Route::is('santri.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-palette"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                {{-- iuran --}}
                <li
                    class="nav-item {{ Route::is('santri.riwayat_pembayaran_iuran') || Route::is('santri.bukti_pembayaran_iuran')
                        ? 'menu-open'
                        : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-cash"></i>
                        <p>
                            Iuran
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        {{-- riwayat pembayaran --}}
                        <li class="nav-item">
                            <a href="{{ route('santri.riwayat_pembayaran_iuran') }}"
                                class="nav-link {{ Route::is('santri.riwayat_pembayaran_iuran') || Route::is('santri.bukti_pembayaran_iuran') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Riwayat Pembayaran Iuran</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- tabungan --}}
                <li
                    class="nav-item {{ Route::is('santri.pengecekan_saldo_tabungan') || Route::is('santri.riwayat_transaksi_tabungan')
                        ? 'menu-open'
                        : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-bank"></i>
                        <p>
                            Tabungan
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        {{-- setoran --}}
                        <li class="nav-item">
                            <a href="{{ route('santri.pengecekan_saldo_tabungan') }}"
                                class="nav-link {{ Route::is('santri.pengecekan_saldo_tabungan') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Pengecekan Saldo</p>
                            </a>
                        </li>
                        {{-- tarik tabungan --}}
                        <li class="nav-item">
                            <a href="{{ route('santri.riwayat_transaksi_tabungan') }}"
                                class="nav-link {{ Route::is('santri.riwayat_transaksi_tabungan') || Route::is('santri.bukti_penarikan') || Route::is('santri.bukti_setoran') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Riwayat Transaksi</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
<!--end::Sidebar-->
