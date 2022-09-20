<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanjasa;

class PesanJasaController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $pesanMenunggu['listMenunggu'] = Pesanjasa::whereStatus("MENUNGGU")->get();

        $pesanSelesai['listSelesai'] = Pesanjasa::whereStatus("SELESAI")->orWhere("Status", "BATAL")->get();

        return view ('pesan')->with($pesanMenunggu)->with($pesanSelesai);
    }

    public function batal($id){
        $pesanJasa = Pesanjasa::where('id', $id)->first();
        $pesanJasa->update([
            'status' => "BATAL",
        ]);
        return redirect('pesanJasa');       
    }
}
