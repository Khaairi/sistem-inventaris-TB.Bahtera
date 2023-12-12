@extends('layouts.main')

@section('container')
<!-- Begin Page Content -->
<div class="container-fluid bg-white pb-5">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h2-bold mb-0 text-white-800 pt-4"  style="color: black;">STOK BARANG</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Button buat tambah product -->
        <div class="col-xl-3 col-md-6 mb-2">
        {{-- <button type="button" class="btn btn-success shadow" data-toggle="modal" data-target="#exampleModal"><i class="fa-solid fa-plus pr-2"></i>Tambah Barang</button> --}}
        <a href="/stok/create" class="btn btn-success"><i class="fa-solid fa-plus pr-2"></i>Tambah Barang</a>
        <a href="/kategori" class="btn btn-primary">Kategori</a>
        </div>
        
    </div>
    <!-- Content Row -->
    @if (session()->has('success'))
        <div class="alert alert-success", role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="float:right"></button>
        </div>
    @endif

    <!-- DataTales Example -->
    <div class="card shadow">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">List Barang</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">

                    <thead class="table-primary">
                        <tr>
                            <th>Kode</th>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Harga Jual (Rp)</th>
                            <th>Harga Beli (Rp)</th>
                            <th>Stok</th>
                            <th>Satuan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stok as $s)
                        <tr>
                            <td>{{ $s->kode_barang }}</td>
                            <td>
                                @if ($s->image)
                                    <img src="{{ asset('storage/' . $s->image) }}" alt="{{ $s->image }}" width="50" height="50">
                                @else
                                    <img src="/images/no-image.png" alt="no image" width="50" height="50">
                                @endif
                            </td>
                            <td>{{ $s->nama_barang }}</td>
                            <td>{{ $s->kategori->kategori}}</td>
                            <td>{{ $s->harga_jual }}</td>
                            <td>{{ $s->harga_beli }}</td>
                            <td>{{ $s->stok }}</td>
                            <td>{{ $s->satuan }}</td>
                            <td>
                                <a href="/stok/{{ $s->id }}/edit" class="badge bg-warning text-white"><i class="fa-solid fa-pen"></i></a>
                                <form action="/stok/{{ $s->id }}" method="POST" class="d-inline">
                                    @method('delete')
                                    @csrf
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
    <!-- endof datatable -->
</div>
<!-- End Page Content -->
@endsection        