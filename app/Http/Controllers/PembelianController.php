<?php

namespace App\Http\Controllers;
use App\Models\LaporanPembelianDetail;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    public function index()
    {
        return view('dashboard.laporan.pembelian', [
            "title" => "Laporan Pembelian",
            "laporanPembelian" => LaporanPembelianDetail::latest()->get()
        ]);
    }

    public function destroy($id)
    {
        $laporan = LaporanPembelianDetail::findOrFail($id);
        $laporan->delete();

        return redirect('/pembelian')->with('success', 'Laporan pembelian berhasil dihapus');
    }
}
