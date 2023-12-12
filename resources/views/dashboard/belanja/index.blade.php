@extends('layouts.main')

@section('container')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h2-bold mb-0 text-white-800 pt-4" style="color: black;">BELANJA</h1>
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

    <!-- List Belanja -->
    <div class="row">

        <!-- Button List Belanja -->
        <div class="col">
            <a href="/cartBelanja" class="btn btn-success shadow"><i class="fa-solid fa-cart-shopping pr-2"></i>Keranjang</a>
            <button class="btn btn-primary" disabled>{{ $banyakCart }}</button>
        </div>

        <div class="col">
            <!-- search -->
            <form action="/belanja">
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
                        {{-- <p class="badge rounded-pill text-bg-primary float-start p-2">Rp. {{ $s->harga_jual }}</p> --}}
                        <p class="card-text" style="color: grey">Stok {{ $s->stok }}</p>
                    </div>
                    
                    {{-- <hr style="border-color: black;"> --}}

                    <div class="card-footer">
                        @if ($cart->where('produk_id', $s->id)->count())
                            <p class="text-center">Dalam Keranjang</p>
                        @else
                            <form class="row" action="/cartBelanja" method="POST">
                                @csrf
                                <input type="hidden" name="produk_id" value="{{ $s->id }}">
                                <div class="col-md-7">
                                    <input type="number" value="1" name="quantity" style="display: inline-block;" class="form-control">
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary" style="display: inline-block;"><i class="fa-solid fa-cart-shopping mr-2"></i></button>
                                    {{-- <button type="submit" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-solid fa-cart-shopping mr-2"></i></button> --}}
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

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Kode Barang</h1>
                    </div>
                    <div class="col">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Nama Barang</h1>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="hargaBeli" class="form-label">Harga Beli</label>
                    <input type="text" class="form-control" id="hargaBeli">
                </div>
                <div class="mb-3">
                    <label for="hargaJual" class="form-label">Harga Jual</label>
                    <input type="text" class="form-control" id="hargaJual">
                </div>
                <div class="mb-3">
                    <label for="jumlahBarang" class="form-label">Jumlah Barang</label>
                    <input type="text" class="form-control" id="jumlahBarang">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-success">Ok</button>
            </div>
        </div>
    </div>
</div>

@endsection