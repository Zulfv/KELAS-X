<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Menu;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FrontController extends Controller
{
    public function index()
    {
        $menus = Menu::paginate(6);
        $kategoris = Kategori::all();
        return view('home', compact('menus', 'kategoris'));
    }

    public function show(string $id)
    {
        $kategoris = Kategori::all();
        $menus = Menu::where('idkategori', $id)->paginate(6);
        return view('home', compact('menus', 'kategoris'));
    }

    public function register()
    {
        $kategoris = Kategori::all();
        return view('register', compact('kategoris'));
    }

    public function login()
    {
        $kategoris = Kategori::all();
        return view('login', compact('kategoris'));
    }

    public function postlogin(Request $request)
    {
        $data = $request->validate([
            'email' => 'required',
            'password' => 'required|min:3',
        ]);

        $pelanggan = Pelanggan::where('email', $data['email'])->where('aktif', 1)->first();

        if ($pelanggan && Hash::check($data['password'], $pelanggan->password)) {
            $request->session()->put('idpelanggan', [
                'idpelanggan' => $pelanggan->idpelanggan,
                'email' => $pelanggan->email,
            ]);
            return redirect('/');
        }

        return back()->with('pesan', 'Email atau password salah');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'pelanggan' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
            'jeniskelamin' => 'required',
            'email' => 'required|email|unique:pelanggans',
            'password' => 'required|min:3',
        ]);

        Pelanggan::create([
            'pelanggan' => $data['pelanggan'],
            'jeniskelamin' => $data['jeniskelamin'],
            'alamat' => $data['alamat'],
            'telp' => $data['telp'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'aktif' => 1,
        ]);

        return redirect('/');
    }

    public function logout()
    {
        session()->flush();
        return redirect('/');
    }
}
