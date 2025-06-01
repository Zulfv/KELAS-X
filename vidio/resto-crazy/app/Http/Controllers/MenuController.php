<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use App\Models\Kategori;
use Illuminate\Http\Request; 

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $kategoris = Kategori::all();

        $menus = menu::join('kategoris','menus.idkategori','=','kategoris.idkategori')->select(['menus.*','kategoris.*'])->paginate(2);
          return view('backend.menu.select',['menus'=>$menus,'kategoris'=>$kategoris]);
    } 

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $kategoris = Kategori::all();
        return view('backend.menu.insert',['kategoris'=>$kategoris]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'gambar' => 'required|max:2048',
            'menu' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
        ]);

        $id = $request->idkategori;

        $namagambar = $request->file('gambar')->getClientOriginalName();

        $request->gambar->move(public_path('gambar'),$namagambar);

        Menu::create([
           'idkategori'=>$id,
           'menu'=>$data['menu'],
           'deskripsi'=>$data['deskripsi'],
           'harga'=>$data['harga'],
           'gambar'=>$namagambar,
        ]);

       return redirect('admin/menu');
    }

    /**
     * Display the specified resource.
     */
    public function show($idmenu)
    {
        menu::where('idmenu','=',$idmenu)->delete();

        return redirect('admin/menu');  
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $idmenu)
    {
        $kategoris = Kategori::all();
        $menu = menu::where('idmenu',$idmenu)->first();
        return view('backend.menu.update',['menu'=>$menu,'kategoris'=>$kategoris]);
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $idmenu)
    {
       if (isset($request->gambar)) {
        $namagambar = $request->file('gambar')->getClientOriginalName();

        

        $data = $request->validate([
            'gambar' => 'required|max:2048',
            'menu' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
        ]);

        menu::where('idmenu',$idmenu)->update([
            'menu' => $data['menu'],
            'deskripsi' => $data['deskripsi'],
            'harga' => $data['harga'],
            'gambar'=>$namagambar,
       ]);

       $request->gambar->move(public_path('gambar'),$namagambar);

       } else {
        $data = $request->validate([
            
            'menu' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
        ]);

        menu::where('idmenu',$idmenu)->update([
            'menu' => $data['menu'],
            'deskripsi' => $data['deskripsi'],
            'harga' => $data['harga']
       ]);

       }
        
        return redirect('admin/menu');

    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        //
    }


   public function select(Request $request) 
   {
    
       $id = $request->idkategori;

        $kategoris = Kategori::all();

        $menus = menu::join('kategoris','menus.idkategori','=','kategoris.idkategori')
        ->select(['menus.*','kategoris.*'])
        ->where('menus.idkategori', $id)
        ->paginate(2);
          return view('backend.menu.select',['menus'=>$menus,'kategoris'=>$kategoris]);

   }

}
