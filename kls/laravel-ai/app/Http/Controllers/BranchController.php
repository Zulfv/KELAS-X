<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index()
    {
        $branches = [
            ['name' => 'B-Quik Jakarta', 'address' => 'Jl. Sudirman No.123, Jakarta', 'phone' => '021-1234567'],
            ['name' => 'B-Quik Bandung', 'address' => 'Jl. Asia Afrika No.45, Bandung', 'phone' => '022-7654321'],
            ['name' => 'B-Quik Surabaya', 'address' => 'Jl. Pemuda No.78, Surabaya', 'phone' => '031-9876543'],
        ];

        return view('branches.index', compact('branches'));
    }
}
