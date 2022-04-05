<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    protected $fillable = [
        'name',
        'harga',
        'deskripsi',
        'lokasi',
        'category_id',
        'image',
    ];
}
