<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatapaketStudio extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_paket',
        'harga',
        'orang',
    ];
}
