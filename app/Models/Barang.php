<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = [ 
        'user_id',
        'kode_input_barang',
        'name',
        'nama_pemilik',
        'harga',
        'deskripsi',
        'lokasi',
        'image',
    ];

    public function user(){
        return $this->belongsTo(Usergeneral::class, "user_id", "id");
    }
}
