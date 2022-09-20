<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesankostkontrakan;

class PesanKostkontrakanController extends Controller
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
        $pesanMenunggu['listMenunggu'] = Pesankostkontrakan::whereStatus("MENUNGGU")->get();

        $pesanSelesai['listSelesai'] = Pesankostkontrakan::whereStatus("SELESAI")->orWhere("Status", "BATAL")->get();

        return view ('pesan')->with($pesanMenunggu)->with($pesanSelesai);
    }

    public function batal($id){
        $pesanKostkontrakan = Pesankostkontrakan::where('id', $id)->first();
        $pesanKostkontrakan->update([
            'status' => "BATAL",
        ]);
        return redirect('pesanKostkontrakan');       
    }
}
