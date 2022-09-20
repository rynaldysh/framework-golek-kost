<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JasaAngkut;
use App\Models\Produk;

class JasaAngkutController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user['listUser'] = JasaAngkut::all();
        return view ('jasaangkut')->with($user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fileName = '';
        if ($request->image->getClientOriginalName()){
            $file = str_replace(' ' , ' ',$request->image->getClientOriginalName());
            $fileName = date('mYDHs').rand(1,999).'_'.$file;
            $request->image->storeAs('public/jasaangkut', $fileName);
        }
        $jasaangkut = JasaAngkut::create(array_merge($request->all(), [
            'image' => $fileName
        ]));
        return redirect('jasaangkut');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
