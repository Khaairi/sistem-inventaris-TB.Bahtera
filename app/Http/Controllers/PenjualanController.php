<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\LaporanPenjualanDetail;

class PenjualanController extends Controller
{
    public function index()
    {
        return view('dashboard.laporan.penjualan', [
            "title" => "Laporan Penjualan",
            "laporanPenjualan" => LaporanPenjualanDetail::latest()->get()
        ]);
    }

    public function destroy($id)
    {
        $laporan = LaporanPenjualanDetail::findOrFail($id);
        $laporan->delete();

        return redirect('/penjualan')->with('success', 'Laporan penjualan berhasil dihapus');
    }
}
