<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelKategori;
use DB;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $num = ModelKategori::orderBy('kode_kategori','desc')->count();
        $data_kode = ModelKategori::orderBy('kode_kategori','desc')->first();
        if($num == 0){
            $code = 'KG-001';
        }
        else{
            $c = $data_kode->kode_kategori;
            $code = substr($c, 4+2);
            $code = "KG-00" .$code;
        }
        $kategori = ModelKategori::all();
        return view('kategori.kategori', ['kategori' => $kategori, 'code' => $code]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('_kategori')->insert([
            'kode_kategori' => $request->kode_kategori,
            'nama_kategori' => $request->nama_kategori
        ]);
        return redirect('/kategori')->with('Sukses, Berhasil menambahkan Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $kategori = ModelBarang::all();
        return view('kategori.detail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = DB::table('_kategori')->where('kode_kategori',$id)->get();

        return view('kategori.edit',['kategori' => $kategori]);
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
        $kategori = DB::table('_kategori')->where('kode_kategori',$request->id)->update([
            'kode_kategori' => $request->kode_kategori,
            'nama_kategori' => $request->nama_kategori
        ]);
        $kategori = ModelKategori::where('kode_kategori',$id);
        $kategori->update($request->except(['_token']));

        return redirect('/kategori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('_kategori')->where('id_kategori',$id)->delete();

        return redirect('/kategori')->with('Data sukses di Delete');
    }
}
