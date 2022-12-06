<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = ['usergeneral_id', 'kode_payment',
    'kode_trx', 'total_item', 'total_harga', 'kode_unik',
    'status', 'name', 'phone', 'detail_lokasi',
    'created_att', 'expired_at', 'jasa_pengiriman', 'ongkir', 'total_transfer',
    'bank', 'bukti_transfer'];

    public function details(){
        return $this->hasMany(TransaksiDetail::class, "transaksi_id", "id");
    }

    public function user(){
        return $this->belongsTo(Usergeneral::class, "usergeneral_id", "id");
    }
}
