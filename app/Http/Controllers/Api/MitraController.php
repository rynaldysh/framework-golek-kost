<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mitra;

class MitraController extends Controller
{
    public function index(){
        // dd($requset->all());die();
        $mitra = Mitra::all();
        return response()->json([
            'success' => 1,
            'message' => 'Get mitra berhasil',
            'mitras' => $mitra
        ]);
    }
}
