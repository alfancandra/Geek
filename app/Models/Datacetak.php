<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datacetak extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'gambar',
        'ukuran',
        'deskripsi',
        'sudah',
    ];
}
