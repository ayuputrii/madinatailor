<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelBarangKeluar;
use App\ModelBarang;
use DB;

use PDF;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = ModelBarang::all();
        $barangkeluar = ModelBarangKeluar::all();
        return view('barangkeluar.barangkeluar', ['barangkeluar' => $barangkeluar, 'barang' => $barang]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barangkeluar.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('_barangkeluar')->insert([
            'kode_barang'     => $request->kode_barang,
            'tgl_keluar'      => $request->tgl_keluar,
            'penerima'        => $request->penerima,
            'jml_brg_keluar'  => $request->jml_brg_keluar,
            'keperluan'       => $request->keperluan
        ]);
        return redirect('/barangkeluar')->with('Sukses, Berhasil menambahkan Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $barangkeluar = ModelBarangKeluar::all();
        return view('barankeluar.detail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang = ModelBarang::all();
        $barangkeluar = DB::table('_barangkeluar')->where('kode_barang',$id)->get();

        return view('barangkeluar.edit',['barangkeluar' => $barangkeluar, 'barang' => $barang]);
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
        $barangkeluar = DB::table('_barangkeluar')->where('kode_barang',$request->id)->update([
            'kode_barang'     => $request->kode_barang,
            'tgl_keluar'      => $request->tgl_keluar,
            'penerima'        => $request->penerima,
            'jml_brg_keluar'  => $request->jml_brg_keluar,
            'keperluan'       => $request->keperluan
        ]);
        $barangkeluar = ModelBarangKeluar::where('kode_barang',$id);
        $barangkeluar->update($request->except(['_token']));

        return redirect('/barangkeluar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('_barangkeluar')->where('id_brgkeluar',$id)->delete();

        return redirect('/barangkeluar')->with('Data sukses di Delete');
    }

    public function pdf($id)
    {
    	$barangkeluar = ModelBarangKeluar::where('id_brgkeluar', $id);

    	$pdf = PDF::loadview('barangkeluar/cetak/keluar_pdf',['barangkeluar'=>$barangkeluar]);
    	return $pdf->stream();
    }
}
