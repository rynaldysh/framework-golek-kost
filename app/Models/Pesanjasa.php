<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanjasa extends Model
{
    protected $fillable = [
    'usergeneral_id',
    'kode_pesan_jasa',
    'status',
    'name',
    'phone',
    'detail_lokasi_asal',
    'detail_lokasi_tujuan',
    'type_asal',
    'type_tujuan',
    'deskripsi',
    'created_att',
    'tanggal'];

    public function details(){
        return $this->hasMany(Pesanjasadetail::class, "pesan_jasa_id", "id");
    }

    public function user(){
        return $this->belongsTo(Usergeneral::class, "usergeneral_id", "id");
    }
}

