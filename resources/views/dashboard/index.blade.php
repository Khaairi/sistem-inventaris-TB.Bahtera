@extends('layouts.main')

@section('container')

    <!-- Begin Page Content -->
    <div class="container-fluid bg-white pb-5">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h2-bold mb-0 text-white-800 pt-4" style="color: black;">DASHBOARD</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card bg-primary shadow">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="text-s font-weight-bold text-white text-uppercase">
                                    Transaksi Penjualan</div>
                                <div class="text-xs font-weight-bold text-grey text-uppercase mb-1">
                                {{ $currentMonth }}-{{ $currentYear }}</div>
                                <div><span class="h2 mb-0 font-weight-bold text-white pr-2">{{ $transaksiPenjualan->count() }}</span>transaksi</div>
                                
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-white"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-body-secondary text-center">
                        <a href="/penjualan" style="color: black; text-decoration:none;"><span class="pr-2">Lebih Detail</span><i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card bg-info shadow">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="text-s font-weight-bold text-white text-uppercase">
                                    Transaksi Pembelian</div>
                                <div class="text-xs font-weight-bold text-grey text-uppercase mb-1">
                                {{ $currentMonth }}-{{ $currentYear }}</div>
                                <div><span class="h2 mb-0 font-weight-bold text-white pr-2">{{ $transaksiPembelian->count() }}</span>transaksi</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-white"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-body-secondary text-center">
                        <a href="/pembelian" style="color: black; text-decoration:none;"><span class="pr-2">Lebih Detail</span><i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card bg-success shadow">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="text-s font-weight-bold text-white text-uppercase">
                                    Pendapatan</div>
                                    <div class="text-xs font-weight-bold text-grey text-uppercase mb-1">
                                    {{ $currentMonth }}-{{ $currentYear }}</div>
                                    <div>Rp<span class="h2 mb-0 font-weight-bold text-white pl-2">
                                        @if ($pendapatan->count())
                                            @foreach ($pendapatan as $p)
                                                {{ $p->pendapatan }}
                                            @endforeach
                                        @else
                                            0
                                        @endif
                                    </span></div>
                            </div>
                            <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-white"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-body-secondary text-center">
                        <a href="/pendapatan" style="color: black; text-decoration:none;"><span class="pr-2">Lebih Detail</span><i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content Row -->

        <!-- DataTales Example -->
        
        <div class="row">
            <div class="col">
                <div class="card shadow"  style="width: 700px;">
                    <div class="card-header py-3">
                        <h4 class="m-0 font-weight-bold text-primary">Laporan Penjualan Bulanan</h4>
                        <h6 class="m-0 font-weight">{{ $currentMonth }}-{{ $currentYear }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">

                                <thead>
                                    <tr class="table-primary">
                                        <th>ID Transaksi</th>
                                        <th>Waktu Transaksi</th>
                                        <th>Jumlah Barang</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($transaksiPenjualan as $t)
                                    <tr>
                                        <td>{{ $t->id }}</td>
                                        <td>{{ $t->created_at }}</td>
                                        <td>{{ $t->banyakProduk }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card shadow"  style="width: 450px;">
                    <div class="card-header py-3">
                        <h4 class="m-0 font-weight-bold text-primary">Stok Barang Terbatas</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="table-primary">
                                        <th>Kode</th>
                                        <th>Nama Barang</th>
                                        <th>Sisa Stok</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($stok as $s)
                                        <tr>
                                            <td>{{ $s->kode_barang }}</td>
                                            <td>{{ $s->nama_barang }}</td>
                                            <td>{{ $s->stok }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Content -->
@endsection