<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartBelanja;
use App\Models\Stok;

class CartBelanjaController extends Controller
{
    public function index()
    {
        return view('dashboard.belanja.cartBelanja', [
            "title" => "listBarang",
            "cart" => CartBelanja::all(),
            "totalHarga" => CartBelanja::sum('totalHarga')
        ]);
    }

    public function store(Request $request)
    {
        if($request->input('quantity') <= 0)
        {
            return redirect('/belanja')->with('message', 'Input jumlah terlebih dahulu');
        }
        else
        {
            $produk = Stok::findOrFail($request->input('produk_id'));
            $totalHarga = $produk->harga_beli * $request->input('quantity');
            CartBelanja::create([
                'produk_id' => $request->input('produk_id'),
                'kode_produk' => $produk->kode_barang,
                'nama_produk' => $produk->nama_barang,
                'harga_beli' => $produk->harga_beli,
                'banyak' => $request->input('quantity'), 
                'totalHarga' => $totalHarga
            ]);

            return redirect('/belanja');
        }
    }

    public function destroy($id)
    {
        $cart = CartBelanja::findOrFail($id);
        $cart->delete();

        return redirect('/cartBelanja');
    }

    public function change(Request $request, $id)
    {
        if($request->input('flag') == 1)
        {
            $cart = CartBelanja::findOrFail($id);
            if($cart->banyak - 1 == 0)
            {
                $cart->delete();
            }
            else
            {
                $cart->banyak = $cart->banyak - 1;
                $cart->totalHarga = $cart->harga_beli * $cart->banyak;
                $cart->save();
            }
        }
        else if($request->input('flag') == 2)
        {
            $cart = CartBelanja::findOrFail($id);
            $cart->banyak = $cart->banyak + 1;
            $cart->totalHarga = $cart->harga_beli * $cart->banyak;
            $cart->save();
        }

        return redirect('/cartBelanja');
    }
}
