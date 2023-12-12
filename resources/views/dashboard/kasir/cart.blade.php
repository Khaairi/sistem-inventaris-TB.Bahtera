@extends('layouts.main')

@section('container')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <a href="/kasir" style="text-decoration: none"><i class="fa-sharp fa-solid fa-chevron-left mt-4 mr-2"></i>kembali</a>
    <div class="d-sm-flex align-items-center justify-content-center">
        <h1 class="h2-bold mb-0 text-white-800 pt-4" style="color: black;">KERANJANG</h1>
    </div>

    @if (session()->has('message'))
        <div class="alert alert-danger mt-2", role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="float:right"></button>
        </div>
    @endif

</div>
<!-- End Page Content -->

<!-- Cart Start -->
<!-- <div class="container-fluid pt-3"> -->
    <div class="row">
        <div class="col-lg-7 m-3 pl-5">
            <table class="table table-bordered text-center mb-0">
                <thead class=" text-white" style="background-color: #FF304F;">
                    <tr>
                        <th>Produk</th>
                        <th>Harga Jual</th>
                        <th>Kuantitas</th>
                        <th>Total</th>
                        <th>Hapus</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @foreach ($cart as $c)
                    <tr>
                        <td>{{ $c->nama_produk }}</td>
                        <td>Rp {{ $c->harga }}</td>
                        <td>
                            <div class="input-group quantity mx-auto" style="width: 100px;">
                                <div class="input-group-btn">
                                    <form method="POST" action="{{ route('cart.change', ['id' => $c->id]) }}">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="flag" value="1">
                                        <button class="btn btn-sm btn-primary border-0"><i class="fa fa-minus"></i></button>
                                    </form>
                                </div>
                                <input type="text" class="form-control form-control-sm bg-white text-center" value="{{ $c->banyak }}" disabled>
                                <div class="input-group-btn">
                                    <form method="POST" action="{{ route('cart.change', ['id' => $c->id]) }}">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="flag" value="2">
                                        <button class="btn btn-sm btn-primary border-0"><i class="fa fa-plus"></i></button>
                                    </form>
                                </div>
                            </div>
                        </td>
                        <td>Rp {{ $c->totalHarga }}</td>
                        <td class="align-middle">
                            <form method="POST" action="{{ route('cart.destroy', ['id' => $c->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-warning border-0"><i class="fa fa-times"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-lg-4 m-3"">
            <div class="card border-secondary mb-5">
                <div class="card-header border-0" style="background-color: #FF304F;">
                    <h4 class="font-weight-semi-bold m-0 text-white">Cart Summary</h4>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Total</h5>
                        <h5>Rp {{ $totalHarga }}</h5>
                    </div>
                </div>
                <form method="POST" action="{{ route('kasir.process') }}">
                    @csrf
                    @method('PUT')
                    <button class="btn btn-primary border-0 w-100">Proses</button>
                </form>
            </div>
        </div>
    </div>
@endsection