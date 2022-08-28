<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    public function index(){
        $transaksiMenunggu['listMenunggu'] = Transaksi::whereStatus("MENUNGGU")->get();

        $transaksiSelesai['listSelesai'] = Transaksi::whereStatus("SELESAI")->orWhere("Status", "BATAL")->get();

        return view ('transaksi')->with($transaksiMenunggu)->with($transaksiSelesai);
    }

    public function batal($id){
        $transaksi = Transaksi::where('id', $id)->first();
        $transaksi->update([
            'status' => "BATAL",
        ]);
        return redirect('transaksi');       
    }
}
