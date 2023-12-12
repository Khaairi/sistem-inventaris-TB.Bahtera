<!-- Topbar -->
<nav class="navbar navbar-expand topbar static-top shadow" style="background-color: #FF304F;">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav navbar-dark ml-auto">
        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <div class="nav-link dropdown-toggle" id="userDropdown" >
                <img class="img-profile rounded-circle mr-2"
                    src="/images/bg-01.jpg">
                <span class="d-none d-lg-inline" style="color: white;">{{ auth()->user()->name }}</span>
                <a class="ml-5" href="#" style="color: white;" data-toggle="modal" data-target="#logoutModal"><i class="fa-solid fa-right-from-bracket"></i>Logout</a>
            </div>
        </li>

    </ul>

</nav>
<!-- End of Topbar -->