<?php

namespace App\Http\Controllers;
use App\Models\Stok;
use App\Models\LaporanPenjualanHeader;
use App\Models\LaporanPembelianHeader;
use App\Models\Pendapatan;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $currentMonth = Carbon::now()->format('M');
        $currentMonth2 = Carbon::now()->format('m');
        $currentYear = Carbon::now()->format('Y');
        $currentDate = Carbon::now()->toDateString();

        return view('dashboard.index', [
            "title" => "Dashboard",
            "stok" => Stok::whereColumn('stok', '<', 'batas_stok')->get(),
            "currentMonth" => $currentMonth,
            "currentYear" => $currentYear,
            "transaksiPenjualan" => LaporanPenjualanHeader::whereMonth('created_at', $currentMonth2)->whereYear('created_at', $currentYear)->latest('created_at')->get(),
            "transaksiPembelian" => LaporanPembelianHeader::whereMonth('created_at', $currentMonth2)->whereYear('created_at', $currentYear)->latest('created_at')->get(),
            "pendapatan" => Pendapatan::whereMonth('created_at', $currentMonth2)->whereYear('created_at', $currentYear)->get()
        ]);
    }
}
