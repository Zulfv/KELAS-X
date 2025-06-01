<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = [
            ['name' => 'Ban Mobil Michelin', 'price' => 'Rp1.200.000', 'image' => 'ban1.jpg', 'description' => 'Ban berkualitas tinggi dari Michelin.'],
            ['name' => 'Ban Mobil Bridgestone', 'price' => 'Rp1.000.000', 'image' => 'ban2.jpg', 'description' => 'Ban kuat dan tahan lama Bridgestone.'],
            ['name' => 'Ban Mobil Goodyear', 'price' => 'Rp1.100.000', 'image' => 'ban3.jpg', 'description' => 'Ban nyaman dan awet Goodyear.'],
        ];

        return view('products.index', compact('products'));
    }
}
