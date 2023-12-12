<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Stok;

class CartController extends Controller
{
    public function index()
    {
        return view('dashboard.kasir.cart', [
            "title" => "Keranjang",
            "cart" => Cart::all(),
            "totalHarga" => Cart::sum('totalHarga')
        ]);
    }

    public function store(Request $request)
    {
        $produk = Stok::findOrFail($request->input('produk_id'));
        if($produk->stok < $request->input('quantity'))
        {
            return redirect('/kasir')->with('message', 'Input jumlah melebihi stok yang tersedia');
        }
        else if($request->input('quantity') <= 0)
        {
            return redirect('/kasir')->with('message', 'Input jumlah terlebih dahulu');
        }
        else
        {
            $totalHarga = $produk->harga_jual * $request->input('quantity');
            Cart::create([
                'produk_id' => $request->input('produk_id'),
                'kode_produk' => $produk->kode_barang,
                'nama_produk' => $produk->nama_barang,
                'harga' => $produk->harga_jual,
                'banyak' => $request->input('quantity'), 
                'totalHarga' => $totalHarga,
            ]);

            return redirect('/kasir');
        }
    }

    public function destroy($id)
    {
        $cart = Cart::findOrFail($id);
        $cart->delete();

        return redirect('/cart');
    }

    public function change(Request $request, $id)
    {
        if($request->input('flag') == 1)
        {
            $cart = Cart::findOrFail($id);
            if($cart->banyak - 1 == 0)
            {
                $cart->delete();
            }
            else
            {
                $cart->banyak = $cart->banyak - 1;
                $cart->totalHarga = $cart->harga * $cart->banyak;
                $cart->save();
            }
        }
        else if($request->input('flag') == 2)
        {
            $cart = Cart::findOrFail($id);
            $produk = Stok::findOrFail($cart->produk_id);
            if($cart->banyak + 1 > $produk->stok)
            {
                return redirect('/cart')->with('message', 'Input jumlah melebihi stok yang tersedia');
            }
            else
            {
                $cart->banyak = $cart->banyak + 1;
                $cart->totalHarga = $cart->harga * $cart->banyak;
                $cart->save();
            }
        }

        return redirect('/cart');
    }
}
