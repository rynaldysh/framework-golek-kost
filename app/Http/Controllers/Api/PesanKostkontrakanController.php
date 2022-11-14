<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Validator;
use App\Models\Usergeneral;
use App\Models\Kostkontrakan;
use App\Models\Pesankostkontrakan;
use App\Models\Pesankostkontrakandetail;

class PesanKostkontrakanController extends Controller
{
    public function store(Request $request){
        //nama, email, password
        $validasi = Validator::make($request->all(), [
            'user_id' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'tanggal' => 'required'
        ]);

        if($validasi->fails()){
            $val = $validasi->errors()->all();
            return $this->error($val[0]);
        }

        $kode_pesan_kostkontrakan = "INV/KPKK/".now()->format('Y-m-d')."/".rand(100, 999);
        $status = "MENUNGGU";
        $created_att = now();

        $dataPesankostkontrakan = array_merge($request->all(), [
            'kode_pesan_kostkontrakan' => $kode_pesan_kostkontrakan,
            'status' => $status,
            'created_att' => $created_att,
        ]);

        \DB::beginTransaction();
        $pesankostkontrakan = Pesankostkontrakan::create($dataPesankostkontrakan);
        foreach($request->kostkontrakans as $kostkontrakan){
            $detail = [
                'pesan_kostkontrakan_id' => $pesankostkontrakan->id,
                'kostkontrakan_id' => $kostkontrakan['id'],
            ];
            $pesankostkontrakandetail = Pesankostkontrakandetail::create($detail);
        }

        if (!empty($pesankostkontrakan) && !empty($pesankostkontrakandetail)){
            \DB::commit();
            return response()->json([
                'success' => 1,
                'message' => 'Pesan kost atau kontrakan berhasil',
                'pesankostkontrakan' => collect($pesankostkontrakan)
            ]);
        } else {
            \DB::rollback();
            $this->error('Pesan kost atau kontrakan gagal');
        }
    }

    public function history($id){
        $pesankostkontrakans = Pesankostkontrakan::with(['user'])->whereHas('user', function($query) use ($id){
            $query->whereId($id);
        })->orderBy("id", "desc")->get();

        foreach($pesankostkontrakans as $pesankostkontrakan){
            $details = $pesankostkontrakan->details;
            foreach($details as $detail){
                $detail->kostkontrakan;
            }
        }
        
        if (!empty($pesankostkontrakans)){
            return response()->json([
                'success' => 1,
                'message' => 'Pesan kost atau kontrakan Berhasil',
                'pesankostkontrakans' => collect($pesankostkontrakans)
            ]);
        } else {
            $this->error('Pesan kost atau kontrakan Gagal');
        }
    }

    public function batal($id){
        $pesankostkontrakan = Pesankostkontrakan::where('id', $id)->first();
        if ($pesankostkontrakan) {
            //update data

            $pesankostkontrakan->update([
                'status' => "BATAL",
            ]);

            return response()->json([
                'success' => 1,
                'message' => 'Berhasil',
                'pesankostkontrakan' => $pesankostkontrakan
            ]);
        } else {
            return $this->error('Gagal memuat pesan kost atau kontrakan');
        }        
    }

    public function selesai($id){
        $pesankostkontrakan = Pesankostkontrakan::where('id', $id)->first();
        if ($pesankostkontrakan) {
            //update data

            $pesankostkontrakan->update([
                'status' => "SELESAI",
            ]);

            return response()->json([
                'success' => 1,
                'message' => 'Berhasil',
                'pesankostkontrakan' => $pesankostkontrakan
            ]);
        } else {
            return $this->error('Gagal memuat pesan kost atau kontrakan');
        }        
    }

    public function error($pasan){
        return response()->json([
            'success' => 0,
            'message' => $pasan
        ]);
    }
}
