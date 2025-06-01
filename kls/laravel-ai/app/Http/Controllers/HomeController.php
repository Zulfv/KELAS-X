<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $banners = [
            ['image' => 'banner1.jpg', 'title' => 'Promo Ban Mobil', 'subtitle' => 'Diskon hingga 30%'],
            ['image' => 'banner2.jpg', 'title' => 'Servis Berkala', 'subtitle' => 'Cepat dan Terpercaya'],
        ];

        $services = [
            ['icon' => 'bi-wrench', 'name' => 'Servis Ban', 'description' => 'Servis ban mobil lengkap.'],
            ['icon' => 'bi-droplet', 'name' => 'Ganti Oli', 'description' => 'Penggantian oli cepat dan murah.'],
            ['icon' => 'bi-car-front', 'name' => 'Tune Up', 'description' => 'Perawatan mesin berkala.'],
        ];

        $products = [
            ['name' => 'Ban Mobil Michelin', 'price' => 'Rp1.200.000', 'image' => 'ban1.jpg'],
            ['name' => 'Ban Mobil Bridgestone', 'price' => 'Rp1.000.000', 'image' => 'ban2.jpg'],
            ['name' => 'Ban Mobil Goodyear', 'price' => 'Rp1.100.000', 'image' => 'ban3.jpg'],
        ];

        return view('home', compact('banners', 'services', 'products'));
    }
}
