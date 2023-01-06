<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Validator;
use App\Models\Usergeneral;
use App\Models\Barang;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;

class TransaksiController extends Controller
{
    public function index(){
        $transaksi = Transaksi::all();
        return response()->json([
            'success' => 1,
            'message' => 'Get transaksi berhasil',
            'transaksis' => $transaksi
        ]);
    }

    public function store(Request $request){
        //nama, email, password
        $validasi = Validator::make($request->all(), [
            'usergeneral_id' => 'required',
            'total_item' => 'required',
            'total_harga' => 'required',
            'name' => 'required',
            'jasa_pengiriman' => 'required',
            'ongkir' => 'required',
            'total_transfer' => 'required',
            'bank' => 'required',
            'phone' => 'required'
        ]);

        if($validasi->fails()){
            $val = $validasi->errors()->all();
            return $this->error($val[0]);
        }

        $kode_payment = "INV/PYM/".now()->format('Y-m-d')."/".rand(100, 999);
        $kode_trx = "INV/TRX/".now()->format('Y-m-d')."/".rand(100, 999);
        $kode_unik = rand(1000000, 9999999); 
        $status = "MENUNGGU";
        $created_att = now();
        $expired_at = now()->addDay();

        $dataTransaksi = array_merge($request->all(), [
            'kode_payment' => $kode_payment,
            'kode_trx' => $kode_trx,
            'kode_unik' => $kode_unik,
            'status' => $status,
            'created_att' => $created_att,
            'expired_at' => $expired_at,
        ]);       

        \DB::beginTransaction();
        $transaksi = Transaksi::create($dataTransaksi);
        foreach($request->barangs as $barang){
            $detail = [
                'transaksi_id' => $transaksi->id,
                'barang_id' => $barang['id'],
                'total_item' => $barang['total_item'],
                'catatan' => $barang['catatan'],
                'total_harga' => $barang['total_harga'],
            ];
            $transaksiDetail = TransaksiDetail::create($detail);
        }

        if (!empty($transaksi) && !empty($transaksiDetail)){
            \DB::commit();
            return response()->json([
                'success' => 1,
                'message' => 'Transaksi berhasil',
                'transaksi' => collect($transaksi)
            ]);
        } else {
            \DB::rollback();
            $this->error('Transaksi gagal');
        }
    }

    public function history($id){
        $transaksis = Transaksi::with(['user'])->whereHas('user', function($query) use ($id){
            $query->whereId($id);
        })->orderBy("id", "desc")->get();

        foreach($transaksis as $transaksi){
            $details = $transaksi->details;
            foreach($details as $detail){
                $detail->barang;
            }
        }
        
        if (!empty($transaksis)){
            return response()->json([
                'success' => 1,
                'message' => 'Transaksi berhasil',
                'transaksis' => collect($transaksis)
            ]);
        } else {
            $this->error('Transaksi gagal');
        }
    }

    public function batal($id){
        // $transaksi = Transaksi::with(['details.produk', 'user'])->where('id', $id)->first();
        $transaksi = Transaksi::where('id', $id)->first();
        if ($transaksi) {
            //update data

            $transaksi->update([
                'status' => "BATAL",
            ]);

            return response()->json([
                'success' => 1,
                'message' => 'Berhasil',
                'transaksi' => $transaksi
            ]);
        } else {
            return $this->error('Gagal memuat transaksi');
        }        
    }

    public function upload(Request $request, $id){

        // $transaksi = Transaksi::with(['details.produk', 'user'])->where('id', $id)->first();
        $transaksi = Transaksi::where('id', $id)->first();
        if ($transaksi) {
            $fileName = '';
            if ($request->image->getClientOriginalName()){
                $file = str_replace(' ' , ' ',$request->image->getClientOriginalName());
                $fileName = date('mYDHs').rand(1,999).'_'.$file;
                $request->image->storeAs('public/transfer', $fileName);
            } else {
            return $this->error('Gagal upload bukti transfer');
            }
            //update data

            $transaksi->update([
                'status' => "DIBAYAR",
                'bukti_transfer' => $fileName
            ]);

            return response()->json([
                'success' => 1,
                'message' => 'Berhasil',
                'transaksi' => $transaksi
            ]);
        } else {
            return $this->error('Gagal upload transaksi');
            }        

        // return response()->json([
        //     'success' => 1,
        //     'message' => 'Berhasil upload bukti transfer',
        //     'image' => $fileName
        // ]);
    }

    public function proses($id){
        // $transaksi = Transaksi::with(['details.produk', 'user'])->where('id', $id)->first();
        $transaksi = Transaksi::where('id', $id)->first();
        if ($transaksi) {
            //update data

            $transaksi->update([
                'status' => "PROSES",
            ]);

            return response()->json([
                'success' => 1,
                'message' => 'Berhasil',
                'transaksi' => $transaksi
            ]);
        } else {
            return $this->error('Gagal memuat transaksi');
        }        
    }

    public function dikirim($id){
        // $transaksi = Transaksi::with(['details.produk', 'user'])->where('id', $id)->first();
        $transaksi = Transaksi::where('id', $id)->first();
        if ($transaksi) {
            //update data

            $transaksi->update([
                'status' => "DIKIRIM",
            ]);

            return response()->json([
                'success' => 1,
                'message' => 'Berhasil',
                'transaksi' => $transaksi
            ]);
        } else {
            return $this->error('Gagal memuat transaksi');
        }        
    }

    public function selesai($id){
        // $transaksi = Transaksi::with(['details.produk', 'user'])->where('id', $id)->first();
        $transaksi = Transaksi::where('id', $id)->first();
        if ($transaksi) {
            //update data

            $transaksi->update([
                'status' => "SELESAI",
            ]);

            return response()->json([
                'success' => 1,
                'message' => 'Berhasil',
                'transaksi' => $transaksi
            ]);
        } else {
            return $this->error('Gagal memuat transaksi');
        }        
    }

    public function error($pasan){
        return response()->json([
            'success' => 0,
            'message' => $pasan
        ]);
    }
}
