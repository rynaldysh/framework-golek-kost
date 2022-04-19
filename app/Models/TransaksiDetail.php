<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiDetail extends Model
{
    protected $fillable = ['transaksi_id', 'barang_id', 'total_item', 'catatan',
                            'kode_promo', 'harga_asli', 'total_harga'];

    public function transaksi(){
    return $this->belongsTo(Transaksi::class, "transaksi_id", "id");
    }

    public function barang(){
        return $this->belongsTo(Barang::class, "barang_id", "id");
        }


}
