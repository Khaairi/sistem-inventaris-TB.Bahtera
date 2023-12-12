<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        return view('dashboard.stok.kategori', [
            "title" => "Kategori",
            "kategori" => Kategori::all()
        ]);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            "kategori" => "required|unique:kategoris"
        ]);
        
        Kategori::create($validate);

        return redirect('/kategori')->with('success', 'Kategori berhasil ditambahkan');
    }

    public function edit(Kategori $kategori)
    {
        return view('dashboard.stok.kategori_edit', [
            "title" => "Kategori | Ubah Data",
            "kategoris" => $kategori,
            "kategori" => Kategori::all()
        ]);
    }

    public function update(Request $request, Kategori $kategori)
    {
        $validate = $request->validate([
            "kategori" => "required|unique:kategoris"
        ]);

        Kategori::where('id', $kategori->id)->update($validate);
        return redirect('/kategori')->with('success', 'Kategori berhasil diubah');
    }

    public function destroy(Kategori $kategori)
    {
        Kategori::destroy($kategori->id);
        return redirect('/kategori')->with('success', 'Kategori berhasil dihapus');
    }
}
