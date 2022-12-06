<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use Validator;
use App\Models\Usergeneral;

class AuthController extends Controller
{
    public function login(Request $request){
        // dd($requset->all());die();
        $usergeneral = Usergeneral::where('email', $request->email)->first();

        if($usergeneral){

            // $usergeneral->update([
            //     'fcm' => $request->fcm
            // ]);  
            //bcrypt dan sha256
            // if (bcrypt(Hash::check($request->password, $user->password))){
            //     return response()->json([
            //                 'success' => 1,
            //                 'message' => 'Selamat datang '.$user->name,
            //                 'user' => $user
            //             ]);
            // }

            //hanya sha256
            // if (Hash::check($request->password, $user->password)){
            //     return response()->json([
            //                 'success' => 1,
            //                 'message' => 'Selamat datang '.$user->name,
            //                 'user' => $user
            //             ]);
            // }

            //hanya bcrypt
            if(password_verify($request->password, $usergeneral->password)){
                return response()->json([
                    'success' => 1,
                    'message' => 'Selamat datang '.$usergeneral->name,
                    'usergeneral' => $usergeneral
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
            'email' => 'required|unique:usergenerals',
            'phone' => 'required|unique:usergenerals|min:11|max:13',
            'password' => 'required|min:6',
        ]);

        if($validasi->fails()){
            $val = $validasi->errors()->all();
            return $this->error($val[0]);
        }       

        $usergeneral = Usergeneral::create(array_merge($request->all(), [
            //'password' => bcrypt(Hash('sha256',$request->password)) //untuk bcrypt + sha 526
            // 'password' => Hash('sha256',$request->password) //hanya sha256
            'password' => bcrypt($request->password) //hanya bcrypt
        ]));

        if($usergeneral){
            return response()->json([
                'success' => 1,
                'message' => 'Pendaftaran atas nama '.$usergeneral->name.' berhasil',
                'usergenerals' => $usergeneral
            ]);
        }

        return $this->error('Registrasi gagal');

    }

    public function error($pasan){
        return response()->json([
            'success' => 0,
            'message' => $pasan
        ]);
    }

}