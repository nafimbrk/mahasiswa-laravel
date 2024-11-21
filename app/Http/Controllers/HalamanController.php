<?php

namespace App\Http\Controllers;

use App\Models\SiswaModel;
use Illuminate\Http\Request;

class HalamanController extends Controller
{
    function index ()
    {
        return view('halaman/index');
    }
    function tentang ()
    {
        return view('halaman/tentang');
    }
    function kontak ()
    {
        $data = [
            'judul' => 'ini adalah halaman kontak',
            'kontak' => [
                'email' => 'nafimubarok@gmail.com',
                'youtube' => 'kuliketik'
            ]
        ];
        return view('halaman/kontak')->with('halaman_judul', $data);
    }
}
