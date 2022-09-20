<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = [
        'name',
        'nama_pemilik',
        'harga',
        'deskripsi',
        'lokasi',
        'image',
    ];
}
