<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'message' => 'required|min:10',
        ]);

        // Untuk sementara, kita cuma redirect kembali dengan pesan sukses
        return back()->with('success', 'Pesan Anda telah terkirim, terima kasih!');
    }
}
