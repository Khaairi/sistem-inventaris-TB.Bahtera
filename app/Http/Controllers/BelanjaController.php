<?php

namespace App\Http\Controllers;
use App\Models\Stok;
use App\Models\CartBelanja;
use App\Models\LaporanPembelianDetail;
use App\Models\LaporanPembelianHeader;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BelanjaController extends Controller
{
    public function index()
    {
        return view('dashboard.belanja.index', [
            "title" => "Belanja",
            "stok" => Stok::latest()->Filter(request(['search']))->paginate(2),
            "cart" => CartBelanja::all(),
            "banyakCart" => CartBelanja::count()
        ]);
    }

    public function process()
    {
        if(CartBelanja::count())
        {
            $timestamp = Carbon::now()->toIso8601String();
            $carbon = Carbon::parse($timestamp)->setTimezone('Asia/Jakarta');
            $banyak = CartBelanja::count();
            $laporanHeader = LaporanPembelianHeader::create([
                "banyakProduk" => $banyak,
                "created_at" => $carbon
            ]);

            $cart = CartBelanja::all();
            foreach($cart as $c)
            {
                LaporanPembelianDetail::create([
                    "transaksi_id" => $laporanHeader->id,
                    "kode_barang" => $c->kode_produk,
                    "nama_barang" => $c->nama_produk,
                    "harga_beli" => $c->harga_beli,
                    "banyak_barang" => $c->banyak,
                    "total_harga" => $c->totalHarga,
                    "created_at" => $carbon
                ]);
            }

            CartBelanja::truncate();

            return redirect('/belanja')->with('success', "Berhasil melakukan transaksi");
        }
        else
        {
            return redirect('/belanja')->with('message', 'Pilih produk terlebih dahulu');
        }
    }
}
