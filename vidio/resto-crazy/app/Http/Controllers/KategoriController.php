<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Http\Requests\StoreKategoriRequest;
use App\Http\Requests\UpdateKategoriRequest;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoris = kategori::all();

         return view('backend.kategori.select',['kategoris'=>$kategoris]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('backend.kategori.insert');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'kategori' => 'required'
        ]);
    
        Kategori::create([
            'kategori' => $data['kategori']
        ]);
    
        return redirect('admin/kategori');
    }

    /**
     * Display the specified resource.
     */
    public function show( $idkategori)
    {
       Kategori::where('idkategori','=',$idkategori)->delete();

       return redirect('admin/kategori');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $idkategori)
    {
        $kategori = Kategori::where('idkategori',$idkategori)->first();
        return view('backend.kategori.update',['kategori'=>$kategori]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $idkategori)
    {  
       $data = $request->validate([
            'kategori'=>'required'
       ]);

       Kategori::where('idkategori',$idkategori)->update([
            'kategori' => $data['kategori']
       ]);

       return redirect('admin/kategori');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        //
    }
}
