<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jasaangkut extends Model
{
    protected $fillable = [
        'name',
        'nomortelfon',
        'harga',
        'deskripsi',
        'lokasi',
        'image',
    ];
}
