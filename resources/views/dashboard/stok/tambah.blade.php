@extends('layouts.main')

@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid bg-white pb-5">

        <!-- Page Heading -->
        <a href="/stok" style="text-decoration: none"><i class="fa-sharp fa-solid fa-chevron-left mt-4 mr-2"></i>kembali</a>
        <div class="d-sm-flex align-items-center justify-content-center mb-4">
            <h1 class="h2-bold mb-0 text-white-800 pt-4"  style="color: black;">TAMBAH DATA BARANG</h1>
        </div>

        <div class="container">
            <form method="POST" action="/stok" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col"> 
                        <div class="mb-3">
                            <label for="image" class="form-label">Tambah Gambar</label>
                            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image">
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang" name="nama_barang" value="{{ old('nama_barang') }}" placeholder="xxx">
                            <label for="nama_barang">Nama Barang</label>
                            @error('nama_barang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('kode_barang') is-invalid @enderror" id="kode_barang" name="kode_barang" value="{{ old('kode_barang') }}" placeholder="xxx">
                            <label for="kode_barang">Kode Barang</label>
                            @error('kode_barang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="form-floating">
                            <select class="form-select @error('kategori_id') is-invalid @enderror" id="kategori_id" name="kategori_id">
                                <option value="" disabled selected hidden></option>
                                @foreach ($kategori as $k)
                                    @if (old('kategori_id') == $k->id)
                                        <option value="{{ $k->id }}" selected>{{ $k->kategori }}</option>
                                    @else
                                        <option value="{{ $k->id }}">{{ $k->kategori }}</option>
                                    @endif
                                    
                                @endforeach
                            </select>
                            <label for="kategori">Kategori</label>
                            @error('kategori_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col">
                        <div class="form-floating mb-3 mt-2">
                            <input type="text" class="form-control @error('harga_beli') is-invalid @enderror" id="harga_beli" name="harga_beli" value="{{ old('harga_beli') }}" placeholder="xxx">
                            <label for="harga_beli">Harga Beli</label>
                            @error('harga_beli')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('harga_jual') is-invalid @enderror" id="harga_jual" name="harga_jual" value="{{ old('harga_jual') }}" placeholder="xxx">
                            <label for="harga_jual">Harga Jual</label>
                            @error('harga_jual')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('stok') is-invalid @enderror" id="stok" name="stok" value="{{ old('stok') }}" placeholder="xxx">
                            <label for="stok">Stok</label>
                            @error('stok')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('batas_stok') is-invalid @enderror" id="batas_stok" name="batas_stok" value="{{ old('batas_stok') }}" placeholder="xxx">
                            <label for="batas_stok">Batas Minimum Stok</label>
                            @error('batas_stok')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('satuan') is-invalid @enderror" id="satuan" name="satuan" value="{{ old('satuan') }}" placeholder="xxx">
                            <label for="satuan">satuan</label>
                            @error('satuan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-outline-success btn-lg ml-2 mb-5" style="float:right">Tambah</button>
                <button type="reset" class="btn btn-outline-secondary btn-lg mb-5" style="float:right">Batal</button>
            </form>
        </div>
    </div>
    <!-- End Page Content -->
@endsection        