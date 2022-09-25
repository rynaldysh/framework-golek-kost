<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;
use Validator;
use Auth;

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
            'name' => 'required',
            'harga' => 'required',
            'lokasi' => 'required',
            'nama_pemilik' => 'required',
            'deskripsi' => 'required',
            'image' => 'required',
        ]);

        if($validasi->fails()){
            $val = $validasi->errors()->all();
            return $this->error($val[0]);
        }       

        $barang = Barang::create(array_merge($request->all()));

        if($barang){
            return response()->json([
                'success' => 1,
                'message' => 'Tambah barang berhasil',
                'barang' => $barang
            ]);
        }

        return $this->error('Tambah barang gagal');

    }

    public function error($pasan){
        return response()->json([
            'success' => 0,
            'message' => $pasan
        ]);
    }

    public function uploadbaranggambar(Request $request, $id){

        // $transaksi = Transaksi::with(['details.produk', 'user'])->where('id', $id)->first();
        $barang = Barang::where('id', $id)->first();
        if ($transaksi) {
            $fileName = '';
            if ($request->image->getClientOriginalName()){
                $file = str_replace(' ' , ' ',$request->image->getClientOriginalName());
                $fileName = date('mYDHs').rand(1,999).'_'.$file;
                $request->image->storeAs('public/barang', $fileName);
            } else {
            return $this->error('Gagal upload foto barang');
            }
            //update data

            $transaksi->update([
                'image' => $fileName
            ]);

            return response()->json([
                'success' => 1,
                'message' => 'Berhasil',
                'barang' => $barang
            ]);
        } else {
            return $this->error('Gagal memuat transaksi');
            }       
    }

}
