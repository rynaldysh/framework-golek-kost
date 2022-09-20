<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JasaAngkut;

class JasaAngkutController extends Controller
{
    public function index(){
        // dd($requset->all());die();
        $jasaangkut = Jasaangkut::all();
        return response()->json([
            'success' => 1,
            'message' => 'Get jasa angkut berhasil',
            'jasaangkuts' => $jasaangkut
        ]);
    }
}
