<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        $name = "Wulan isgandini";
        $alamat = "Kota Bandung";
        $tanggal_lahir = "12 Januari 2002";

        $data_array = array(
            "nama" => array(
                "Wulan", "Anisa", "Resa",
            ),
        );


        return view(
            'profil.profil',
            compact('name', 'alamat', 'tanggal_lahir', 'data_array')
        );
    }
}
