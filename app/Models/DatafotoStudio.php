<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatafotoStudio extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'alamat',
        'telp',
        'paket',
        'orang',
        'total'
    ];
}
