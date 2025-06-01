<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = [
            (object)[
                'name' => 'Tuning Mesin',
                'description' => 'Naikkan performa motor balapmu dengan tuning akurat.',
                'icon' => 'bi-gear-fill'
            ],
            (object)[
                'name' => 'Ganti Oli',
                'description' => 'Gunakan oli racing kualitas tinggi, ganti cepat!',
                'icon' => 'bi-droplet-half'
            ],
            (object)[
                'name' => 'Cek Rem & Lampu',
                'description' => 'Pastikan rem dan penerangan siap untuk trek.',
                'icon' => 'bi-brightness-high-fill'
            ],
        ];

        return view('services.index', compact('services'));
    }

    public function search(Request $request)
{
    $query = strtolower($request->q);

    $allServices = [
        (object)[
            'name' => 'Tuning Mesin',
            'description' => 'Naikkan performa motor balapmu dengan tuning akurat.',
            'icon' => 'bi-gear-fill'
        ],
        (object)[
            'name' => 'Ganti Oli',
            'description' => 'Gunakan oli racing kualitas tinggi, ganti cepat!',
            'icon' => 'bi-droplet-half'
        ],
        (object)[
            'name' => 'Cek Rem & Lampu',
            'description' => 'Pastikan rem dan penerangan siap untuk trek.',
            'icon' => 'bi-brightness-high-fill'
        ],
    ];

    $services = collect($allServices)->filter(function ($service) use ($query) {
        return str_contains(strtolower($service->name), $query) || str_contains(strtolower($service->description), $query);
    });

    return view('services.index', compact('services'));
}

}
