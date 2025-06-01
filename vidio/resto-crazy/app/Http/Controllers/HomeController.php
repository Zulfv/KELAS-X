<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;

class HomeController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all();
        return view('home', compact('kategoris'));
    }

    public function show($idkategori)
    {
        $kategori = Kategori::find($idkategori);
        $produks = Produk::where('idkategori', $idkategori)->get();

        return view('produk.index', compact('kategori', 'produks'));
    }
}
