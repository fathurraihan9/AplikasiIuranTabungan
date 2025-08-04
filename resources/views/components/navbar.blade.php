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
            <li class="nav-item d-none d-md-block ml-auto">
                <a href="{{ route('landing_page.kontak') }}" class="nav-link">Kontak</a>
            </li>
            <li class="nav-item d-none d-md-block">
                <button type="button" class="nav-link" data-toggle="modal" data-target="#logoutModal">Logout</button>
            </li>
        </ul>
        <!--end::End Navbar Links-->
    </div>
    <!--end::Container-->
</nav>
<!--end::Header-->
<x-modal-logout></x-modal-logout>
