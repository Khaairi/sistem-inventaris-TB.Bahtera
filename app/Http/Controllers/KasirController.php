<?php

namespace App\Http\Controllers;
use App\Models\Stok;
use App\Models\Cart;
use App\Models\LaporanPenjualanHeader;
use App\Models\LaporanPenjualanDetail;
use App\Models\Pendapatan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class KasirController extends Controller
{
    public function index()
    {
        return view('dashboard.kasir.index', [
            "title" => "Kasir",
            "stok" => Stok::latest()->Filter(request(['search']))->paginate(2),
            "cart" => Cart::all(),
            "banyakCart" => Cart::count()
        ]);
    }

    public function process()
    {
        if(Cart::count())
        {
            $timestamp = Carbon::now()->toIso8601String();
            $carbon = Carbon::parse($timestamp)->setTimezone('Asia/Jakarta');
            $banyak = Cart::count();
            $laporanHeader = LaporanPenjualanHeader::create([
                "banyakProduk" => $banyak,
                "created_at" => $carbon
            ]);

            $cart = Cart::all();
            foreach($cart as $c)
            {
                $stok = Stok::find($c->produk_id);
                $totalBeli = $stok->harga_beli * $c->banyak;
                $keuntungan = $c->totalHarga - $totalBeli;
                $laporan = LaporanPenjualanDetail::create([
                    "transaksi_id" => $laporanHeader->id,
                    "kode_barang" => $c->kode_produk,
                    "nama_barang" => $c->nama_produk,
                    "harga_barang" => $c->harga,
                    "banyak_barang" => $c->banyak,
                    "total_harga" => $c->totalHarga,
                    "keuntungan" => $keuntungan,
                    "created_at" => $carbon
                ]);

                $currentDate = Carbon::now()->toDateString();
                $p = Pendapatan::whereDate('created_at', $currentDate)->first();
                if($p)
                {
                    $p->pendapatan = $p->pendapatan + $c->totalHarga;
                    $p->keuntungan = $p->keuntungan + $keuntungan;
                    $p->transaksi = $p->transaksi + 1;
                    $p->save();
                }
                else
                {
                    Pendapatan::create([
                        "pendapatan" => $c->totalHarga,
                        "keuntungan" => $keuntungan,
                        "transaksi" => 1,
                        "waktu" => $currentDate,
                        "created_at" => $carbon
                    ]);
                }
            }

            Cart::truncate();

            return redirect('/kasir')->with('success', "Berhasil melakukan transaksi");
        }
        else
        {
            return redirect('/kasir')->with('message', 'Pilih produk terlebih dahulu');
        }
    }
}
