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
        $kostkontrakan = Kostkontrakan::where('lokasi','Sleman')->get();
        return response()->json([
            'success' => 1,
            'message' => 'Get kost kontrakan sleman berhasil',
            'kostkontrakans' => $kostkontrakan
        ]);
    }

    public function kotaYogyakarta(){
        // dd($requset->all());die();
        $kostkontrakan = Kostkontrakan::where('lokasi','Kota Yogyakarta')->get();
        return response()->json([
            'success' => 1,
            'message' => 'Get kost kontrakan Kota Yogyakarta berhasil',
            'kostkontrakans' => $kostkontrakan
        ]);
    }

    public function bantul(){
        // dd($requset->all());die();
        $kostkontrakan = Kostkontrakan::where('lokasi','Bantul')->get();
        return response()->json([
            'success' => 1,
            'message' => 'Get kost kontrakan Bantul berhasil',
            'kostkontrakans' => $kostkontrakan
        ]);
    }

    public function gunungKidul(){
        // dd($requset->all());die();
        $kostkontrakan = Kostkontrakan::where('lokasi','Gunung Kidul')->get();
        return response()->json([
            'success' => 1,
            'message' => 'Get kost kontrakan Gunung Kidul berhasil',
            'kostkontrakans' => $kostkontrakan
        ]);
    }

    
}
