<?php

namespace App\Http\Controllers;

use App\Models\pelanggan;
use App\Http\Requests\StorepelangganRequest;
use App\Http\Requests\UpdatepelangganRequest;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pelanggans = pelanggan::paginate(1);
        return view('backend.pelanggan.select',['pelanggans'=>$pelanggans]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorepelangganRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($idpelanggan)
    {
       $pelanggan = pelanggan::where('idpelanggan',$idpelanggan)->first();

       if ($pelanggan->aktif == 0) {
          $status = 1;
       } else {
         $status = 0;
       }
       
       pelanggan::where('idpelanggan',$idpelanggan)->update(['aktif'=>$status]);
       return redirect ('admin/pelanggan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pelanggan $pelanggan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatepelangganRequest $request, pelanggan $pelanggan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pelanggan $pelanggan)
    {
        //
    }
}
