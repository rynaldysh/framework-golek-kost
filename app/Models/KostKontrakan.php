<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KostKontrakan extends Model
{
    protected $fillable = [
        'name',
        'pengelola',
        'harga',
        'mayoritas',
        'lokasi',
        'sisakamar',
        'totalkamar',
        'deskripsi',
        'listrik',
        'air',
        'wifi',
        'bed',
        'ac',
        'kamarmandi',
        'kloset',
        'satpam',
        'image',
    ];
}
