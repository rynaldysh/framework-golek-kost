<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Validator;
use App\Models\Usergeneral;
use App\Models\Jasaangkut;
use App\Models\Pesanjasa;
use App\Models\Pesanjasadetail;

class PesanJasaController extends Controller
{
    public function store(Request $request){
        //nama, email, password
        $validasi = Validator::make($request->all(), [
            'user_id' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'tanggal' => 'required',
            'detail_lokasi_asal' => 'required',
            'detail_lokasi_tujuan' => 'required',
            'type_asal' => 'required',
            'type_tujuan' => 'required'
        ]);

        if($validasi->fails()){
            $val = $validasi->errors()->all();
            return $this->error($val[0]);
        }

        $kode_pesan_jasa = "INV/KPJ/".now()->format('Y-m-d')."/".rand(100, 999);
        $status = "MENUNGGU";
        $created_att = now();

        $dataPesanjasa = array_merge($request->all(), [
            'kode_pesan_jasa' => $kode_pesan_jasa,
            'status' => $status,
            'created_att' => $created_att,
        ]);

        \DB::beginTransaction();
        $pesanjasa = Pesanjasa::create($dataPesanjasa);
        foreach($request->jasaangkuts as $jasaangkut){
            $detail = [
                'pesan_jasa_id' => $pesanjasa->id,
                'jasaangkut_id' => $jasaangkut['id'],
            ];
            $pesanjasadetail = Pesanjasadetail::create($detail);
        }

        if (!empty($pesanjasa) && !empty($pesanjasadetail)){
            \DB::commit();
            return response()->json([
                'success' => 1,
                'message' => 'Pesan Jasa berhasil',
                'pesanjasa' => collect($pesanjasa)
            ]);
        } else {
            \DB::rollback();
            $this->error('pesanjasa gagal');
        }
    }

    public function history($id){
        $pesanjasas = Pesanjasa::with(['user'])->whereHas('user', function($query) use ($id){
            $query->whereId($id);
        })->orderBy("id", "desc")->get();

        foreach($pesanjasas as $pesanjasa){
            $details = $pesanjasa->details;
            foreach($details as $detail){
                $detail->jasaangkut;
            }
        }
        
        if (!empty($pesanjasas)){
            return response()->json([
                'success' => 1,
                'message' => 'Pesan Jasa Berhasil',
                'pesanjasas' => collect($pesanjasas)
            ]);
        } else {
            $this->error('Pesan Jasa Gagal');
        }
    }

    public function batal($id){
        $pesanjasa = Pesanjasa::where('id', $id)->first();
        if ($pesanjasa) {
            //update data

            $pesanjasa->update([
                'status' => "BATAL",
            ]);

            return response()->json([
                'success' => 1,
                'message' => 'Berhasil',
                'pesanjasa' => $pesanjasa
            ]);
        } else {
            return $this->error('Gagal memuat pesan jasa');
        }        
    }

    public function error($pasan){
        return response()->json([
            'success' => 0,
            'message' => $pasan
        ]);
    }
}
