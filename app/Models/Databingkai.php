<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Databingkai extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'jenis',
        'ukuran',
        'harga_beli',
        'harga_jual',
        'stock',
    ];
}
