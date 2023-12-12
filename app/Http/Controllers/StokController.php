<?php

namespace App\Http\Controllers;

use App\Models\Stok;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.stok.index', [
            "title" => "Stok",
            "stok" => Stok::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.stok.tambah',[
            "title" => "Stok | Tambah Data",
            "kategori" => Kategori::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            "kode_barang" => "required|unique:stoks",
            "image" => "image|file|max:1024",
            "nama_barang" => "required",
            "harga_beli" => "required",
            "harga_jual" => "required",
            "stok" => "required",
            "batas_stok" => "required",
            "kategori_id" => "required",
            "satuan" => "required"
        ]);

        if($request->file('image'))
        {
            $validate['image'] = $request->file('image')->store('product-images');
        }

        Stok::create($validate);

        return redirect('/stok')->with('success', 'Data barang berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Stok $stok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stok $stok)
    {
        return view('dashboard.stok.edit',[
            "title" => "Stok | Ubah Data",
            "stok" => $stok,
            "kategori" => Kategori::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stok $stok)
    {
        $rules = [
            "image" => "image|file|max:1024",
            "nama_barang" => "required",
            "harga_beli" => "required",
            "harga_jual" => "required",
            "stok" => "required",
            "batas_stok" => "required",
            "kategori_id" => "required",
            "satuan" => "required"
        ];

        if($request->kode_barang != $stok->kode_barang)
        {
            $rules['kode_barang'] = "required|unique:stoks";
        }

        $validate = $request->validate($rules);

        if($request->file('image'))
        {
            if($request->oldImage)
            {
                Storage::delete($request->oldImage);
            }
            $validate['image'] = $request->file('image')->store('product-images');
        }

        Stok::where('id', $stok->id)->update($validate);

        return redirect('/stok')->with('success', 'Data barang berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stok $stok)
    {
        if($stok->image)
        {
            Storage::delete($stok->image);
        }
        Stok::destroy($stok->id);

        return redirect('/stok')->with('success', 'Data barang berhasil dihapus');
    }
}
