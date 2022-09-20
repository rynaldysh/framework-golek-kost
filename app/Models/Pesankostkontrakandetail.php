<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesankostkontrakandetail extends Model
{
    protected $fillable = ['pesan_kostkontrakan_id', 'kostkontrakan_id'];

    public function pesankostkontrakan(){
    return $this->belongsTo(Pesankostkontrakan::class, "pesan_kostkontrakan_id", "id");
    }

    public function kostkontrakan(){
        return $this->belongsTo(Kostkontrakan::class, "kostkontrakan_id", "id");
        }
}
