<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kostkontrakan;

class KostKontrakanController extends Controller
{
    public function index(){
        // dd($requset->all());die();
        $kostkontrakan = Kostkontrakan::all();
        return response()->json([
            'success' => 1,
            'message' => 'Get kost kontrakan berhasil',
            'kostkontrakans' => $kostkontrakan
        ]);
    }

    public function sleman(){
        // dd($requset->all());die();
        $kostkontrakan = Kostkontrakan::where('lokasi','sleman')->get();
        return response()->json([
            'success' => 1,
            'message' => 'Get kost kontrakan berhasil',
            'kostkontrakans' => $kostkontrakan
        ]);
    }

    
}
