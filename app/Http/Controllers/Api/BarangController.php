<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Models\Barang;
use App\Models\Usergeneral;

class BarangController extends Controller
{
    public function index(){
        // dd($requset->all());die();
        $barang = Barang::all();
        return response()->json([
            'success' => 1,
            'message' => 'Get barang berhasil',
            'barangs' => $barang
        ]);
    }
    
    public function uploadbarang(Request $request){
        //nama, email, password        
        $validasi = Validator::make($request->all(), [
            'user_id' => 'required',
            'name' => 'required',
            'harga' => 'required',
            'lokasi' => 'required',
            'deskripsi' => 'required',
        ]);


        if($validasi->fails()){
            $val = $validasi->errors()->all();
            return $this->error($val[0]);
        }       

        $kode_input_barang = "CRT/KIB/".now()->format('Y-m-d')."/".rand(100, 999);
        $status = "TERSEDIA";
        $created_att = now();

        $dataInputBarang = array_merge($request->all(), [
            'kode_input_barang' => $kode_input_barang,
            'status' => $status,
            'created_att' => $created_att,
        ]);

        \DB::beginTransaction();
        $barang = Barang::create($dataInputBarang);

        if (!empty($barang)){
            \DB::commit();
            return response()->json([
                'success' => 1,
                'message' => 'Input barang berhasil',
                'barang' => collect($barang)
            ]);
        } else {
            \DB::rollback();
            $this->error('Input barang gagal');
        }

        return $this->error('Tambah barang gagal');

    }

    public function uploadbaranggambar(Request $request, $id){

        // $transaksi = Transaksi::with(['details.produk', 'user'])->where('id', $id)->first();
        $barang = Barang::where('id', $id)->first();
        if ($barang) {
            $fileName = '';
            if ($request->image->getClientOriginalName()){
                $file = str_replace(' ' , ' ',$request->image->getClientOriginalName());
                $fileName = date('mYDHs').rand(1,999).'_'.$file;
                $request->image->storeAs('public/barang', $fileName);
            } else {
            return $this->error('Gagal upload foto barang');
            }
            //update data

            $barang->update([
                'image' => $fileName
            ]);

            return response()->json([
                'success' => 1,
                'message' => 'Berhasil',
                'barang' => $barang
            ]);
        } else {
            return $this->error('Gagal memuat gambar');
            }       
    }

    public function history($id){
        $barangs = Barang::with(['user'])->whereHas('user', function($query) use ($id){
            $query->whereId($id);
        })->orderBy("id", "desc")->get();

        // foreach($barangs as $barang){
        //     $details = $barang->details;
        //     foreach($details as $detail){
        //         $detail->barang; //user?
        //     }
        // }
        
        if (!empty($barangs)){
            return response()->json([
                'success' => 1,
                'message' => 'Barang berhasil',
                'barangs' => collect($barangs)
            ]);
        } else {
            $this->error('Barang gagal');
        }
    }

    public function terjual($id){
        $barang = Barang::where('id', $id)->first();
        if ($barang) {
            //update data

            $barang->update([
                'status' => "TERJUAL",
            ]);

            return response()->json([
                'success' => 1,
                'message' => 'Berhasil',
                'barang' => $barang
            ]);
        } else {
            return $this->error('Gagal memuat penjualan barang');
        }        
    }

    public function error($pasan){
        return response()->json([
            'success' => 0,
            'message' => $pasan
        ]);
    }

}
