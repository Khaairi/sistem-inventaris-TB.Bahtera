@extends('layouts.main')

@section('container')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h2-bold mb-0 text-white-800 pt-4" style="color: black;">KASIR</h1>
    </div>

    @if (session()->has('message'))
        <div class="alert alert-danger", role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="float:right"></button>
        </div>
    @elseif(session()->has('success'))
        <div class="alert alert-success", role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="float:right"></button>
        </div>
    @endif

    <div class="row">
        <div class="col">
            <a href="/cart" class="btn btn-success shadow"><i class="fa-solid fa-cart-shopping pr-2"></i>Keranjang</a>
            <button class="btn btn-primary" disabled>{{ $banyakCart }}</button>
        </div>
        <div class="col">
            <form action="/kasir">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari..." name="search" value="{{ request('search') }}">
                    <button class="btn btn-outline-primary" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </form>
        </div>
    </div>

    

    <!-- Card Items -->
    @if ($stok->count())
    <div class="row row-cols-1 row-cols-md-5 g-4">
        @foreach ($stok as $s)
            <div class="col">
                <div class="card mb-3 shadow">
                    @if ($s->image)
                        <img src="{{ asset('storage/' . $s->image) }}" class="card-img-top" alt="{{ $s->image }}" style="object-fit: cover" height="150" width="200">
                    @else
                        <img src="/images/no-image.png" class="card-img-top" alt="no image" style="object-fit: cover" height="150" width="200">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $s->nama_barang }}</h5>
                        {{-- <p class="card-text">Rp {{ $s->harga_jual }}<span class="card-text" style="color: grey; float:right" >Stok {{ $s->stok }}</span></p> --}}
                        <p class="badge rounded-pill text-bg-primary float-start p-2">Rp. {{ $s->harga_jual }}</p>
                        <p class="card-text float-end" style="color: grey">Stok {{ $s->stok }}</p>
                    </div>
                    {{-- <hr style="border-color: black;"> --}}
                    <div class="card-footer">
                        @if ($cart->where('produk_id', $s->id)->count())
                            <p class="text-center">Dalam Keranjang</p>
                        @elseif ($s->stok == 0)
                            <p class="text-center">Stok Habis</p>
                        @else
                            <form class="row" action="/cart" method="POST">
                                @csrf
                                <input type="hidden" name="produk_id" value="{{ $s->id }}">
                                <div class="col-md-7">
                                    <input type="number" value="1" name="quantity" style="display: inline-block;" class="form-control">
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary" style="display: inline-block;"><i class="fa-solid fa-cart-shopping mr-2"></i></button>
                                </div>
                                {{-- <small class="mt-2"><button class="btn-primary" type="submit" style="color: black; text-decoration:none;"><i class="fa-solid fa-cart-shopping"></i><span class="pl-2">Add to cart</span></button></small> --}}
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @else
    <div>
        <p class="text-center mt-5">Produk tidak ditemukan.</p>
    </div>
    @endif

    <div class="d-flex justify-content-center">
        {{ $stok->links() }}
    </div>
    
</div>
<!-- End Page Content -->

@endsection