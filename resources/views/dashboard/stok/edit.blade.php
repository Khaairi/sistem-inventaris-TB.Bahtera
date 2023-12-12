@extends('layouts.main')

@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid bg-white pb-5">

        <!-- Page Heading -->
        <a href="/stok" style="text-decoration: none"><i class="fa-sharp fa-solid fa-chevron-left mt-4 mr-2"></i>kembali</a>
        <div class="d-sm-flex align-items-center justify-content-center mb-4">
            <h1 class="h2-bold mb-0 text-white-800 pt-4"  style="color: black;">UBAH DATA BARANG</h1>
        </div>

        <div class="container">
            <form method="POST" action="/stok/{{ $stok->id }}" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="row">
                    <div class="col"> 
                        {{-- <div class="form-group">                                        
                            <label for="kode">Foto Produk:</label><br>
                            <div class="image-upload">
                                <label for="file-input">
                                    <img src="https://icons.iconarchive.com/icons/dtafalonso/android-lollipop/128/Downloads-icon.png" width="117" height="117"/>
                                </label>

                                <input id="file-input" type="file" />
                            </div>
                        </div>                                                 --}}
                        <div class="mb-3">
                            <label for="image" class="form-label">Tambah Gambar</label>
                            <input type="hidden" name="oldImage" value="{{ $stok->image }}">
                            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image">
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang" name="nama_barang" value="{{ old('nama_barang', $stok->nama_barang) }}" placeholder="xxx">
                            <label for="nama_barang">Nama Barang</label>
                            @error('nama_barang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('kode_barang') is-invalid @enderror" id="kode_barang" name="kode_barang" value="{{ old('kode_barang', $stok->kode_barang) }}" placeholder="xxx">
                            <label for="kode_barang">Kode Barang</label>
                            @error('kode_barang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="form-floating">
                            <select class="form-select" name="kategori_id">
                                @foreach ($kategori as $k)
                                    @if (old('kategori_id', $stok->kategori_id) == $k->id)
                                        <option value="{{ $k->id }}" selected>{{ $k->kategori }}</option>
                                    @else
                                        <option value="{{ $k->id }}">{{ $k->kategori }}</option>
                                    @endif
                                    
                                @endforeach
                            </select>
                            <label for="kategori">Kategori</label>
                        </div>
                    </div>
                    
                    <div class="col">
                        <div class="form-floating mb-3 mt-2">
                            <input type="text" class="form-control @error('harga_beli') is-invalid @enderror" id="harga_beli" name="harga_beli" value="{{ old('harga_beli', $stok->harga_beli) }}" placeholder="xxx">
                            <label for="harga_beli">Harga Beli</label>
                            @error('harga_beli')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('harga_jual') is-invalid @enderror" id="harga_jual" name="harga_jual" value="{{ old('harga_jual', $stok->harga_jual) }}" placeholder="xxx">
                            <label for="harga_jual">Harga Jual</label>
                            @error('harga_jual')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('stok') is-invalid @enderror" id="stok" name="stok" value="{{ old('stok', $stok->stok) }}" placeholder="xxx">
                            <label for="stok">Stok</label>
                            @error('stok')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('batas_stok') is-invalid @enderror" id="batas_stok" name="batas_stok" value="{{ old('batas_stok', $stok->batas_stok) }}" placeholder="xxx">
                            <label for="batas_stok">Batas Minimum Stok</label>
                            @error('batas_stok')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('satuan') is-invalid @enderror" id="satuan" name="satuan" value="{{ old('satuan', $stok->satuan) }}" placeholder="xxx">
                            <label for="satuan">satuan</label>
                            @error('satuan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-outline-success btn-lg ml-2 mb-5" style="float:right">Ubah</button>
                <button type="button" class="btn btn-outline-secondary btn-lg mb-5" data-dismiss="modal" style="float:right">Batal</button>
            </form>
        </div>
    </div>
    <!-- End Page Content -->
@endsection        