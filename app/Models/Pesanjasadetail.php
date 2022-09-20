<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanjasadetail extends Model
{
    protected $fillable = ['pesan_jasa_id', 'jasaangkut_id'];

    public function pesanjasa(){
    return $this->belongsTo(Pesanjasa::class, "pesan_jasa_id", "id");
    }

    public function jasaangkut(){
        return $this->belongsTo(Jasaangkut::class, "jasaangkut_id", "id");
        }
}
