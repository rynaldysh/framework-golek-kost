<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanjasa;
use PDF;


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
        $pesanMenunggu['listMenungguJasa'] = Pesanjasa::whereStatus("MENUNGGU")->get();

        $pesanSelesai['listSelesaiJasa'] = Pesanjasa::whereStatus("SUDAH DI KONFIRMASI")->orWhere("Status", "BATAL")->get();

        return view ('pesanjasa')->with($pesanMenunggu)->with($pesanSelesai);
    }

    public function batal($id){
        $pesanJasa = Pesanjasa::where('id', $id);
        $pesanJasa->update([
            'status' => "BATAL",
        ]);
        return redirect('pesanjasa');       
    }

    public function selesai($id){
        $pesanJasa = Pesanjasa::where('id', $id);
        $pesanJasa->update([
            'status' => "SELESAI",
        ]);
        return redirect('pesanjasa');       
    }

    public function confirm($id){
        $pesanJasa = Pesanjasa::where('id', $id)->first();
        $pesanJasa->update([
            'status' => "SUDAH DI KONFIRMASI",
        ]);
        return redirect('pesanjasa');       
    }

    public function exportjasa($id){
        $data = Pesanjasa::where('id',$id)->get();
        
        // where('id', $id)->first();
       
        // $pdf = PDF::loadview('dataPesanjasa-pdf',['pesanJasa'=>$pesanJasa]);
        // $pdf->download('data.pdf');

        // return redirect('pesanjasa');     
        
        
        view()->share('data',$data);
        $pdf = PDF::loadview('dataPesanjasa-pdf');
        return $pdf->download('data.pdf');    
        
        
        
        
    }
}
