<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return view('backend.user.select',['users'=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.user.insert');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:3', // ini sudah benar
        ]);
    
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'level' => $request->level,
        ]);
    
        return redirect('admin/user')->with('success', 'Data berhasil disimpan');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $users = user::where('id',$id)->get();
        $levels = User::where('level',$users[0]['level']);
        $jumlah =$levels->count();

        if ($jumlah == 1) {
            session()->flash('pesan','data hanya satu tidak bisa di hapus !');
        } else {
           user::where('id',$id)->delete();
        }

        return redirect('admin/user');
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
      $user = User::where('id', $id)->first();
     return view('backend.user.update', ['user' => $user]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $data = $request->validate([
            'password'=>'required'
       ]);

       user::where('id',$id)->update([
            'password' =>bcrypt($data['password']) 
       ]);

       return redirect('admin/user')->with('success', 'Password berhasil diupdate');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
