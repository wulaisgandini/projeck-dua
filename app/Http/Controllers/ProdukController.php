<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{

    public function index()
    {
        $produk = Produk::all();
        return view('produk.index', compact('produk'));
    }

    public function create()
    {
        return view('produk.create');
    }

    public function store(Request $request)
    {
        //validasi
        $validated = $request->validate([
            'produk' => 'required',
            'price' => 'required',
            'stock' => 'required',
        ]);

        $produk = new Produk();
        $produk->produk = $request->produk;
        $produk->price = $request->price;
        $produk->stock = $request->stock;
        $produk->save();
        return redirect('/produk')->with('success', 'Data berhasil dibuat!');
    }

    public function show($id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.show', compact('produk'));
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.edit', compact('produk'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'produk' => 'required',
            'price' => 'required',
            'stock' => 'required',
        ]);

        $produk = Produk::findOrFail($id);
        $produk->produk = $request->produk;
        $produk->price = $request->price;
        $produk->stock = $request->stock;
        $produk->save();
        return redirect()->route('produk.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();
        return redirect()->route('produk.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
