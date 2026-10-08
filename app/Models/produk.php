<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    use HasFactory;

    // Menentukan nama tabel di database agar tidak otomatis dicari sebagai 'produks'
    protected $table = 'produk'; 

    protected $fillable = [
        'name',
        'price',
        'description',
    ];
}