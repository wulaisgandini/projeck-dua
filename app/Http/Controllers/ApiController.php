<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class Apicontroller extends Controller
{
    public function product_index()
    {
        $product = Product::get();
        return response()->json($product);
    }
    //
    public function product_store(Request $request)
    {
        Product::insert([
            'product'       => $request->api_product,
            'price'         => $request->api_price,
            'stock'         => $request->api_stock,
        ]);

        $response = array(
            'responseCode'       => '00',
            'responseStatus'     => 'Success'
        );
        return response()->json($response);
    }

    public function product_by_id($id)
    {
        $product = Product::where('id', $id)->get();
        return response()->json($product);
    }

    public function product_delete($id)
    {
        Product::where('id', $id)->delete();

        $response = array(
            'responseCode'       => '00',
            'responseStatus'     => 'Success Delete'
        );
        return response()->json($response);
    }


    public function product_update(Request $request, $id)
    {
        // Validasi request
        $request->validate([
            'api_product' => 'required',
            'api_price'   => 'required|numeric',
            'api_stock'   => 'required|integer',
        ]);

        // Update data produk
        Product::where('id', $id)->update([
            'product' => $request->api_product,
            'price'   => $request->api_price,
            'stock'   => $request->api_stock,
        ]);

        // Response sukses
        $response = array(
            'responseCode'   => '00',
            'responseStatus' => 'Success Update'
        );
        return response()->json($response);
    }
}
