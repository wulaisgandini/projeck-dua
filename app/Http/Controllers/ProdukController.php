<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index(){
        $data = [
            'pageTitle' => 'Tentang Kami',
            'content' => 'Ini adalah halaman tentang kami.'
        ];
       
       return view('produk', compact('data'));
    }
}
