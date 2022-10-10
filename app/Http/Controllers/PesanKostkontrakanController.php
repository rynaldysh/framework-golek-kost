<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesankostkontrakan;
use PDF;

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
        $pesanMenunggu['listMenungguKost'] = Pesankostkontrakan::whereStatus("MENUNGGU")->get();

        $pesanSelesai['listSelesaiKost'] = Pesankostkontrakan::whereStatus("SUDAH DI KONFIRMASI")->orWhere("Status", "BATAL")->get();

        return view ('pesankostkontrakan')->with($pesanMenunggu)->with($pesanSelesai);
    }

    public function batal($id){
        $pesanKostkontrakan = Pesankostkontrakan::where('id', $id)->first();
        $pesanKostkontrakan->update([
            'status' => "BATAL",
        ]);
        return redirect('pesankostkontrakan');       
    }

    public function confirm($id){
        $pesanKostkontrakan = Pesankostkontrakan::where('id', $id)->first();
        $pesanKostkontrakan->update([
            'status' => "SUDAH DI KONFIRMASI",
        ]);
        return redirect('pesankostkontrakan');       
    }

    public function exportkost($id){
        $data = Pesankostkontrakan::where('id',$id)->get();
        
        // where('id', $id)->first();
       
        // $pdf = PDF::loadview('dataPesanjasa-pdf',['pesanJasa'=>$pesanJasa]);
        // $pdf->download('data.pdf');

        // return redirect('pesanjasa');     
        
        
        view()->share('data',$data);
        $pdf = PDF::loadview('dataPesankostkontrakan-pdf');
        return $pdf->download('data.pdf');    
        
        
        
        
    }
}
