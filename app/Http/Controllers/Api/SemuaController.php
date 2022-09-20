<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Jasaangkut;
use App\Models\Kostkontrakan;

class SemuaController extends Controller
{
    public function index(){
        // dd($requset->all());die();
        $barang = Barang::all();
        $jasaangkut = Jasaangkut::all();
        $kostkontrakan = Kostkontrakan::all();
        return response()->json([
            'success' => 1,
            'message' => 'Get Semua berhasil berhasil',
            'barangs' => $barang,
            'jasaangkuts' => $jasaangkut,
            'kostkontrakans' => $kostkontrakan
        ]);
    }
}
