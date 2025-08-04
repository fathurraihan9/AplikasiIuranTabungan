<!--begin::Sidebar-->
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="{{ route('landing_page.welcome') }}" class="brand-link">
            <!--begin::Brand Image-->
            {{-- <img src="../assets/img/AdminLTELogo.png" alt="AdminLTE Logo"
class="brand-image opacity-75 shadow" /> --}}
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">Aplikasi Iuran Dan Tabungan</span>
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
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link {{ Route::is('admin.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-palette"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                {{-- santri --}}
                <li class="nav-item">
                    <a href="{{ route('admin.santri') }}"
                        class="nav-link {{ Route::is('admin.santri') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-people"></i>
                        <p>Santri</p>
                    </a>
                </li>
                {{-- iuran --}}
                <li
                    class="nav-item {{ Route::is('admin.pembayaran_iuran') || Route::is('admin.riwayat_pembayaran_iuran') || Route::is('admin.bukti_pemabayaran_iuran') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-cash"></i>
                        <p>
                            Iuran
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        {{-- pembayaran iuran --}}
                        <li class="nav-item">
                            <a href="{{ route('admin.pembayaran_iuran') }}"
                                class="nav-link {{ Route::is('admin.pembayaran_iuran') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Pembayaran Iuran</p>
                            </a>
                        </li>
                        {{-- riwayat pembayaran --}}
                        <li class="nav-item">
                            <a href="{{ route('admin.riwayat_pembayaran_iuran') }}"
                                class="nav-link {{ Route::is('admin.riwayat_pembayaran_iuran') || Route::is('admin.bukti_pemabayaran_iuran') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Riwayat Pembayaran</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- tabungan --}}
                <li
                    class="nav-item {{ Route::is('admin.setoran_tabungan') || Route::is('admin.penarikan_tabungan') || Route::is('admin.pengecekan_saldo') || Route::is('admin.riwayat_pembayaran_tabungan') || Route::is('admin.riwayat_transaksi_tabungan') || Route::is('admin.bukti_setoran') || Route::is('admin.bukti_penarikan') ? 'menu-open' : '' }}">
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
                            <a href="{{ route('admin.setoran_tabungan') }}"
                                class="nav-link {{ Route::is('admin.setoran_tabungan') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Setoran</p>
                            </a>
                        </li>
                        {{-- tarik tabungan --}}
                        <li class="nav-item">
                            <a href="{{ route('admin.penarikan_tabungan') }}"
                                class="nav-link {{ Route::is('admin.penarikan_tabungan') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Tarik Tabungan</p>
                            </a>
                        </li>
                        {{-- pengelolaan saldo --}}
                        <li class="nav-item">
                            <a href="{{ route('admin.pengecekan_saldo') }}"
                                class="nav-link {{ Route::is('admin.pengecekan_saldo') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Pengecekan Saldo</p>
                            </a>
                        </li>
                        {{-- riwayat transaksi tabungan --}}
                        <li class="nav-item">
                            <a href="{{ route('admin.riwayat_transaksi_tabungan') }}"
                                class="nav-link {{ Route::is('admin.riwayat_transaksi_tabungan') || Route::is('admin.bukti_setoran') || Route::is('admin.bukti_penarikan') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Riwayat Transaksi Tabungan</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- laporan --}}
                <li
                    class="nav-item {{ Route::is('admin.laporan_iuran') || Route::is('admin.laporan_tabungan') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-cash"></i>
                        <p>
                            Laporan
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        {{-- Iuran --}}
                        <li class="nav-item">
                            <a href="{{ route('admin.laporan_iuran') }}"
                                class="nav-link {{ Route::is('admin.laporan_iuran') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Iuran</p>
                            </a>
                        </li>
                        {{-- Tabungan --}}
                        <li class="nav-item">
                            <a href="{{ route('admin.laporan_tabungan') }}"
                                class="nav-link {{ Route::is('admin.laporan_tabungan') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Tabungan</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- pesan --}}
                <li class="nav-item">
                    <a href="{{ route('admin.pesan') }}"
                        class="nav-link {{ Route::is('admin.pesan') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-envelope"></i>
                        <p>Pesan</p>
                    </a>
                </li>
            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
<!--end::Sidebar-->
