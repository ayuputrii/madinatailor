<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelBarang;
use App\ModelLokasi;
use App\ModelKategori;

use DB;
use PDF;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $num = ModelBarang::orderBy('kode_barang','desc')->count();
        $data_kode = ModelBarang::orderBy('kode_barang','desc')->first();
        if($num == 0){
            $code = 'BRG-001';
        }
        else{
            $c = $data_kode->kode_barang;
            $code = substr($c, 4)+1;
            $code = "BRG-00" .$code;
        }

        $kategori = ModelKategori::all();
        $lokasi = ModelLokasi::all();
        $barang = ModelBarang::all();
        return view('barang.barang', ['kategori' => $kategori, 'lokasi' => $lokasi, 'barang' => $barang, 'code' => $code]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('_barang')->insert([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'spesifikasi' => $request->spesifikasi,
            'kode_lokasi' => $request->kode_lokasi,
            'kode_kategori' => $request->kode_kategori,
            'jml_barang' => $request->jml_barang,
            'kondisi' => $request->kondisi,
            'jenis_barang' => $request->jenis_barang,
            'sumber_dana' => $request->sumber_dana
        ]);
        return redirect('/barang')->with('Sukses, Berhasil menambahkan Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $kategori = ModelKategori::all();
        $lokasi = ModelLokasi::all();
        $barang = ModelBarang::all();
        return view('barang.detail', ['kategori' => $kategori, 'lokasi' => $lokasi, 'barang' => $barang]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang = DB::table('_barang')->where('kode_barang',$id)->get();

        $kategori = ModelKategori::all();
        $lokasi = ModelLokasi::all();
        return view('barang.edit',['kategori' => $kategori, 'lokasi' => $lokasi,'barang' => $barang]);
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
        $barang = DB::table('_barang')->where('kode_barang',$request->id)->update([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'spesifikasi' => $request->spesifikasi,
            'kode_lokasi' => $request->kode_lokasi,
            'kode_kategori' => $request->kode_kategori,
            'jml_barang' => $request->jml_barang,
            'kondisi' => $request->kondisi,
            'jenis_barang' => $request->jenis_barang,
            'sumber_dana' => $request->sumber_dana
        ]);
        $barang = ModelBarang::where('kode_barang',$id);
        $barang->update($request->except(['_token']));

        return redirect('/barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('_barang')->where('kode_barang',$id)->delete();

        return redirect('/barang')->with('Data sukses di Delete');
    }

    public function pdf($id)
    {
    	$barang = ModelBarang::all();

    	$pdf = PDF::loadview('barang/cetak/barang_pdf',['barang'=>$barang]);
    	return $pdf->stream();
    }
}
