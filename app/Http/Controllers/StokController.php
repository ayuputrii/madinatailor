<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelStok;
use App\ModelBarang;
use App\ModelBarangKeluar;
use App\ModelBarangMasuk;

use DB;
use PDF;

class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang       = ModelBarang::all();
        $barangkeluar = ModelBarangKeluar::all();
        $barangmasuk  = ModelBarangMasuk::all();
        $stok         = ModelStok::all();
        return view('stok.stok', ['barangkeluar' => $barangkeluar, 'barangmasuk' => $barangmasuk, 'barang' => $barang, 'stok' => $stok]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stok.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('_stok')->insert([
        'kode_barang'    => $request->kode_barang,
        'id_brgkeluar'   => $request->id_brgkeluar,
        'id_brgmasuk'    => $request->id_brgmasuk,
        'total_barang'   => $request->total_barang,
        'keterangan'     => $request->keterangan

        ]);
        return redirect('/stok')->with('Sukses, Berhasil menambahkan Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $stok = ModelStok::all();
        return view('stok.detail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang       = ModelBarang::all();
        $barangkeluar = ModelBarangKeluar::all();
        $barangmasuk  = ModelBarangMasuk::all();
        $stok         = DB::table('_stok')->where('id_stok',$id)->get();

        return view('stok.edit',['barangkeluar' => $barangkeluar, 'barangmasuk' => $barangmasuk, 'barang' => $barang, 'stok' => $stok]);
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
        $stok = DB::table('_stok')->where('id_stok',$request->id)->update([
            'kode_barang'    => $request->kode_barang,
            'id_brgkeluar'   => $request->id_brgkeluar,
            'id_brgmasuk'    => $request->id_brgmasuk,
            'total_barang'   => $request->total_barang,
            'keterangan'     => $request->keterangan

        ]);
        $stok = ModelStok::where('id_stok',$id);
        $stok->update($request->except(['_token']));

        return redirect('/stok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('_stok')->where('id_stok',$id)->delete();

        return redirect('/stok')->with('Data sukses di Delete');
    }

    public function pdf($id)
    {
    	$stok = ModelStok::all();
    	$pdf = PDF::loadview('barang/cetak/stok_pdf',['stok'=>$stok]);
    	return $pdf->stream();
    }
}
