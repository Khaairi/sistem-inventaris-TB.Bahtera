@extends('layouts.main')

@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid bg-white pb-5">

        <!-- Page Heading -->
        <a href="/stok" style="text-decoration: none"><i class="fa-sharp fa-solid fa-chevron-left mt-4 mr-2"></i>kembali</a>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h2-bold mb-0 text-white-800 pt-4"  style="color: black;">KATEGORI</h1>
        </div>

        @if (session()->has('success'))
            <div class="alert alert-success", role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="float:right"></button>
            </div>
        @endif

        <!-- DataTales Example -->
        <div class="row">
            <div class="col">
                <div class="card shadow" style="width: 750px;">
                    <div class="card-header py-3">
                        <h4 class="m-0 font-weight-bold text-primary">List Kategori</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">

                                <thead class="table-primary">
                                    <tr>
                                        <th>#</th>
                                        <th>Kategori</th>
                                        <th>Banyak Barang</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kategori as $k)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $k->kategori }}</td>
                                        <td>{{ $k->banyak_barang }}</td>
                                        <td><a href="/kategori/{{ $k->id }}/edit" class="badge bg-warning text-white"><i class="fa-solid fa-pen"></i></a>
                                            <form action="/kategori/{{ $k->id }}" method="POST" class="d-inline">
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
            </div>

            <div class="col">
                <div class="card bg-info shadow">
                    <div class="card-body">
                        <h4 class="text-white mb-2">Tambah Kategori</h4>
                        <form action="/kategori" method="POST">
                            @csrf
                            <div class="form-floating">
                                <input type="text" class="form-control @error('kategori') is-invalid @enderror" id="kategori" name="kategori"  placeholder="xxx">
                                <label for="kategori">Nama Kategori</label>
                                @error('kategori')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <button type="submit" class="btn btn-success mt-2" style="float:right">Tambah</button>
                                <button type="reset" class="btn btn-secondary mt-2 mr-2" style="float:right">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
        <!-- endof datatable -->
    </div>
    <!-- End Page Content -->

    {{-- @if (session()->has('update'))
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-m" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h5 class="modal-title" id="exampleModalLabel" style="color: white;">Ubah Kategori</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                        <div class="modal-body">
                        <form action="/kategori/{{ $kategori->id }}" method="POST" id="form_tambah">
                            @method('put')
                            @csrf
                            <div class="form-floating">
                                <input type="text" class="form-control @error('kategori') is-invalid @enderror" id="kategori" name="kategori" value="{{ old('kategori', $kategori->kategori) }}" placeholder="xxx">
                                <label for="kategori">Nama Kategori</label>
                                @error('kategori')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </form>
                        </div>
                    <!-- Footer tombol bawah -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success" form="form_tambah">Ubah</button>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-m" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h5 class="modal-title" id="exampleModalLabel" style="color: white;">Input Kategori</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                        <div class="modal-body">
                        <form action="/kategori" method="POST" id="form_tambah">
                            @csrf
                            <div class="form-floating">
                                <input type="text" class="form-control @error('kategori') is-invalid @enderror" id="kategori" name="kategori" placeholder="xxx">
                                <label for="kategori">Nama Kategori</label>
                                @error('kategori')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </form>
                        </div>
                    <!-- Footer tombol bawah -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success" form="form_tambah">Tambah</button>
                    </div>
                </div>
            </div>
        </div>
    @endif --}}
@endsection        