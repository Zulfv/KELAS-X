<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pelanggan extends Model
{
    /** @use HasFactory<\Database\Factories\PelangganFactory> */
    use HasFactory;
    protected $fillable = [
        'pelanggan',
        'email',
        'password',
        'alamat',
        'telp',
        'aktif',
        
    
    ];
}
