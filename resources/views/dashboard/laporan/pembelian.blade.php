@extends('layouts.main')

@section('container')

<!-- Begin Page Content -->
<div class="container-fluid bg-white pb-5">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 ">
        <h1 class="h2-bold mb-0 text-white-800 pt-4" style="color: black; ">LAPORAN TRANSAKSI PEMBELIAN</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success", role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="float:right"></button>
        </div>
    @endif

    <!-- Content Row -->
    <div class="row">
        
    </div>
    <!-- Content Row -->

    <!-- DataTales Example -->
    <div class="card shadow">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Laporan Pembelian</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">

                    <thead>
                        <tr class="table-primary">
                            <th>ID Transaksi</th>
                            <th>Kode Produk</th>
                            <th>Nama Produk</th>
                            <th>Harga Beli (Rp)</th>
                            <th>Banyak Produk</th>
                            <th>Total (Rp)</th>
                            <th>Waktu Transaksi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($laporanPembelian as $l)
                            <tr>
                                <td>{{ $l->transaksi_id }}</td>
                                <td>{{ $l->kode_barang }}</td>
                                <td>{{ $l->nama_barang }}</td>
                                <td>{{ $l->harga_beli }}</td>
                                <td>{{ $l->banyak_barang }}</td>
                                <td>{{ $l->total_harga }}</td>
                                <td>{{ $l->created_at }}</td>
                                <td>
                                    <form method="POST" action="{{ route('laporanPembelian.destroy', ['id' => $l->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="badge bg-danger text-white border-0" onclick="return confirm('Apakah yakin untuk menghapus data?')"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>

</div>
<!-- End Page Content -->

@endsection