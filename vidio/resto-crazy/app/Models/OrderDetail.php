<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderdetail extends Model
{
    /** @use HasFactory<\Database\Factories\OrderdetailFactory> */
    use HasFactory;

    protected $table = 'order_details';
    
    protected $fillable = [
        'idorder',
        'idmenu',
        'jumlah',
        'hargajual',
    
    ];  



}
