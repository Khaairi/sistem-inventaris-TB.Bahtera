@extends('layouts.main')

@section('container')

<!-- Begin Page Content -->
<div class="container-fluid bg-white pb-5">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 ">
        <h1 class="h2-bold mb-0 text-white-800 pt-4" style="color: black; ">LAPORAN PENDAPATAN</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Laporan Pendapatan</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">

                    <thead>
                        <tr class="table-primary">
                            <th>Tanggal</th>
                            <th>Jumlah Transaksi</th>
                            <th>Pendapatan</th>
                            <th>Keuntungan</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($pendapatan as $p)
                            <tr>
                                <td>{{ $p->waktu }}</td>
                                <td>{{ $p->transaksi }}</td>
                                <td>{{ $p->pendapatan }}</td>
                                <td>{{ $p->keuntungan }}</td>
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