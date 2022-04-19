<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    public function index(){
        // dd($requset->all());die();
        $barang = Barang::all();
        return response()->json([
            'success' => 1,
            'message' => 'Get barang berhasil',
            'barangs' => $barang
        ]);
    }
}
