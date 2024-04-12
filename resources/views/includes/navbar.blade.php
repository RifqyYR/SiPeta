<nav class="navbar navbar-expand navbar-light topbar mb-2 static-top shadow">
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <div class="navbar-brand me-auto">
        <span class="fs-6 fw-bold text-success">Sistem Informasi Pertumbuhan Tanaman</span>
    </div>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown no-arrow">
            <div class="nav-link dropdown-toggle" id="userDropdown">
                <span class="mr-2 d-none d-lg-inline text-black small">
                    <span style="0.7rem;">{{ Auth::user()->name }}</span>
                </span>
                <img class="img-profile rounded-circle" src="{{ url('template/img/undraw_profile.svg') }}">
            </div>
        </li>
    </ul>
</nav>
