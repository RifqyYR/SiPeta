<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-light accordion toggled" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
        <div class="sidebar-brand-icon">
            <i class="fas fa-seedling text-success"></i>
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-1">

    <div class="sidebar-heading my-1 text-success">
        Menu Utama
    </div>

    <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
        <a class="nav-link nav-link-item" href="{{ route('home') }}">
            <i class="fas fa-fw fa-home fs-5 sidebar-icon"></i>
            <span class="nav-text">Dashboard</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-leaf fs-5 sidebar-icon"></i>
            <span class="nav-text">Jenis Tanaman</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="">Bayam</a>
                <a class="collapse-item" href="">Bawang</a>
            </div>
        </div>
    </li>

    <div class="sidebar-heading my-2 text-success">
        Lainnya
    </div>

    <li class="nav-item {{ Request::is('/kelola-user') ? 'active' : '' }}">
        <a class="nav-link nav-link-item" href="{{ route('home') }}">
            <i class="fas fa-fw fa-users fs-5 sidebar-icon"></i>
            <span class="nav-text">Kelola User</span>
        </a>
    </li>

    <li class="nav-item {{ Request::is('/ubah-password') ? 'active' : '' }}">
        <a class="nav-link nav-link-item" href="{{ route('home') }}">
            <i class="fas fa-fw fa-key fs-5 sidebar-icon"></i>
            <span class="nav-text">Ubah Password</span>
        </a>
    </li>

    <li class="nav-item {{ Request::is('/logout') ? 'active' : '' }}">
        <a class="nav-link nav-link-item" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt fs-5 sidebar-icon"></i>
            <span class="nav-text">Keluar</span>
        </a>
    </li>
</ul>
<!-- End of Sidebar -->
