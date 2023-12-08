<?php

namespace App\Http\Controllers;

//import Model "Post
use App\Models\product;

//return type View
use Illuminate\View\View;

use Illuminate\Http\Request;

class produkController extends Controller

{
    public function index()
    {

        //get posts
        $produk = product::get();

        //render view with posts
        return view('product.index', compact('produk'));
    }
    public function create()
    {
        return view('product.create');
    }
    public function store(Request $request)
    {
        product::create([
            'product' => $request->product,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

        return redirect('/produk');
    }
    public function edit($id)
    {
        $produk = product::find($id);
        return view('produk.edit', compact('produk'));
    }
    public function destroy($id)
    {
        $product = product::find($id);

        if (!$product) {
            return redirect('/produk')->with('error', 'Produk tidak ditemukan');
        }

        $product->delete();

        return redirect('/produk')->with('success', 'Produk berhasil dihapus');
    }
    public function update(Request $request, $id)
    {
        $produk = product::find($id);
        $produk->update([
            'product' => $request->product,
            'price'   => $request->price,
            'stock'   => $request->stock,
        ]);

        return redirect('/produk');
    }
}
