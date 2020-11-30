<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\ModelLokasi;

class LokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $num = ModelLokasi::orderBy('kode_lokasi','desc')->count();
        $data_kode = ModelLokasi::orderBy('kode_lokasi','desc')->first();
        if($num == 0){
            $code = 'LC-001';
        }
        else{
            $c = $data_kode->kode_lokasi;
            $code = substr($c, 4)+1;
            $code = "LC-00" .$code;
        }

        $lokasi = ModelLokasi::all();
        return view('lokasi.lokasi', ['lokasi' => $lokasi, 'code' => $code]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lokasi.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('_lokasi')->insert([
            'kode_lokasi' => $request->kode_lokasi,
            'nama_lokasi' => $request->nama_lokasi
        ]);
        return redirect('/lokasi')->with('Sukses, Berhasil menambahkan Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $lokasi =  ModelLokasi::all();
        return view('lokasi.detail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lokasi = DB::table('_lokasi')->where('kode_lokasi',$id)->get();

        return view('lokasi.edit',['lokasi' => $lokasi]);
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
        $lokasi = DB::table('_lokasi')->where('kode_lokasi',$request->id)->update([
            'kode_lokasi' => $request->kode_lokasi,
            'nama_lokasi' => $request->nama_lokasi
        ]);
        $lokasi = ModelLokasi::where('kode_lokasi',$id);
        $lokasi->update($request->except(['_token']));

        return redirect('/lokasi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('_lokasi')->where('id_lokasi',$id)->delete();

        return redirect('/lokasi')->with('Data sukses di Delete');
    }
}
