<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function services()
    {
        return view('services.index');
    }

    public function contact()
    {
        return view('contact.index');
    }

    public function about()
    {
        return view('about.index');
    }

    public function booking()
    {
        return view('booking.index');
    }
}
