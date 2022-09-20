<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesankostkontrakan extends Model
{
    protected $fillable = ['user_id', 'kode_pesan_kostkontrakan',
    'status', 'name', 'phone', 'detail_lokasi','deskripsi', 
    'created_att', 'tanggal'];

    public function details(){
        return $this->hasMany(Pesankostkontrakandetail::class, "pesan_kostkontrakan_id", "id");
    }

    public function user(){
        return $this->belongsTo(Usergeneral::class, "user_id", "id");
    }
}
