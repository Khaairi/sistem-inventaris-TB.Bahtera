<!-- Sidebar -->
<ul class="navbar-nav navbar-red sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #0E2F56;">

    <!-- Sidebar - Logo Toko -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php" style="background-color: #EC2D46;">
        <div class="sidebar-brand-icon">
            <img src="/images/logo2.png" width="60px" height="60px">
        </div>
        <div class="sidebar-brand-text" style="color: white">CV BAHTERA JAYA ABADI</div>
    </a>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ (Request::is('dashboard')) ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard">
            <i class="fa-solid fa-gauge-high {{ (Request::is('dashboard')) ? 'fa-flip' : '' }}"  style="color: {{ (Request::is('dashboard')) ? '#DF5062' : 'white' }}"></i>
            <span style="color: {{ (Request::is('dashboard')) ? '#DF5062' : 'white' }}">Dashboard</span></a>
    </li>

    <!-- Nav Item - Stok -->
    <li class="nav-item {{ (Request::is('stok', 'stok/create', 'kategori')) ? 'active' : '' }}">
        <a class="nav-link" href="/stok">
            <i class="fa-solid fa-database {{ (Request::is('stok', 'stok/create', 'kategori')) ? 'fa-flip' : '' }}"  style="color: {{ (Request::is('stok', 'stok/create', 'kategori')) ? '#DF5062' : 'white' }}"></i>
            <span style="color: {{ (Request::is('stok', 'stok/create', 'kategori')) ? '#DF5062' : 'white' }}">Stok Barang</span></a>
    </li>

    <!-- Nav Item - Kasir -->
    <li class="nav-item {{ (Request::is('kasir', 'cart')) ? 'active' : '' }}">
        <a class="nav-link" href="/kasir">
            <i class="fa-solid fa-cash-register {{ (Request::is('kasir', 'cart')) ? 'fa-flip' : '' }}" style="color: {{ (Request::is('kasir', 'cart')) ? '#DF5062' : 'white' }}"></i>
            <span style="color: {{ (Request::is('kasir', 'cart')) ? '#DF5062' : 'white' }}">Kasir</span></a>
    </li>

    <!-- Nav Item - Belanja -->
    <li class="nav-item {{ (Request::is('belanja', 'cartBelanja')) ? 'active' : '' }}">
        <a class="nav-link" href="/belanja">
            <i class="fa-solid fa-cart-shopping {{ (Request::is('belanja', 'cartBelanja')) ? 'fa-flip' : '' }}" style="color: {{ (Request::is('belanja', 'cartBelanja')) ? '#DF5062' : 'white' }}"></i>
            <span style="color: {{ (Request::is('belanja', 'cartBelanja')) ? '#DF5062' : 'white' }}">Belanja</span></a>
    </li>
    
    <!-- Nav Item - Laporan Keuangan -->
    <li class="nav-item {{ (Request::is('pendapatan')) ? 'active' : '' }}">
        <a class="nav-link" href="/pendapatan">
            <i class="fa-solid fa-sack-dollar {{ (Request::is('pendapatan')) ? 'fa-flip' : '' }}" style="color: {{ (Request::is('pendapatan')) ? '#DF5062' : 'white' }}"></i>
            <span style="color: {{ (Request::is('pendapatan')) ? '#DF5062' : 'white' }}">Laporan Pendapatan</span></a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ (Request::is('penjualan', 'pembelian')) ? 'active' : '' }}">
        <a class="nav-link collapsed" href="/transaksi" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
            <i class="fa-solid fa-clipboard-list {{ (Request::is('penjualan', 'pembelian')) ? 'fa-flip' : '' }}" style="color: {{ (Request::is('penjualan', 'pembelian')) ? '#DF5062' : 'white' }}"></i>
            <span style="color: {{ (Request::is('penjualan', 'pembelian')) ? '#DF5062' : 'white' }}">Laporan Transaksi</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded" style="color: white">
                <a class="collapse-item" href="/penjualan">
                    <i class="fa-solid fa-clipboard-list {{ (Request::is('penjualan')) ? 'fa-flip' : '' }}" style="color: {{ (Request::is('penjualan')) ? '#DF5062' : 'black' }}"></i> Penjualan</a>
                <a class="collapse-item" href="/pembelian">
                    <i class="fa-solid fa-clipboard-list {{ (Request::is('pembelian')) ? 'fa-flip' : '' }}" style="color: {{ (Request::is('pembelian')) ? '#DF5062' : 'black' }}"></i> Pembelian</a>
            </div>
        </div>
    </li>

</ul>
<!-- End of Sidebar -->