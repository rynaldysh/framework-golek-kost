<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use Validator;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request){
        // dd($requset->all());die();
        $user = User::where('email', $request->email)->first();

        if($user){

            $user->update([
                'fcm' => $request->fcm
            ]);

            if(password_verify($request->password, $user->password)){
                return response()->json([
                    'success' => 1,
                    'message' => 'Selamat datang '.$user->name,
                    'user' => $user
                ]);
            }
            return $this->error('Password Salah');
        }
        return $this->error('Email tidak terdaftar');
    }

    public function register(Request $request){
        //nama, email, password
        $validasi = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users',
            'phone' => 'required|unique:users',
            'password' => 'required|min:6'
        ]);

        if($validasi->fails()){
            $val = $validasi->errors()->all();
            return $this->error($val[0]);
        }

        $user = User::create(array_merge($request->all(), [
            'password' => bcrypt($request->password)
        ]));

        if($user){
            return response()->json([
                'success' => 1,
                'message' => 'Selamat datang Register Berhasil',
                'user' => $user
            ]);
        }

        return $this->error('Registrasi gagal');

    }

    public function update(Request $request, $id){

        $user = User::where('id', $id)->first();
        if ($user){

            $user->update($request->all());
            return $this->success($user);
        }

        return $this->error("Tidak ada user");
    }

    public function upload(Request $request, $id){
        $user = User::where('id', $id)->first();
        
        if ($user) {

            $fileName = "";
            if ($request->image) {
                $image = $request->image->getClientOriginalName();
                $image = str_replace('','', $image);
                $image = date('Hs').rand(1, 999)."_".$image;
                $fileName = $image;
                $request->image->storeAs('public/user', $image);
            } else {
                return $this->error("Image wajib dikirim");
            }

            $user->update([
                'image' => $fileName
            ]);
            return $this->success($user);
        }  
        return $this->error("User tidak ditemukan");
    }

    public function error($pasan){
        return response()->json([
            'success' => 0,
            'message' => $pasan
        ]);
    }

}