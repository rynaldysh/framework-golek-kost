<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KostKontrakan;

class KostKontrakanController extends Controller
{
    public function index(){
        // dd($requset->all());die();
        $kostkontrakan = KostKontrakan::all();
        return response()->json([
            'success' => 1,
            'message' => 'Get kost kontrakan berhasil',
            'kostkontrakans' => $kostkontrakan
        ]);
    }
}
