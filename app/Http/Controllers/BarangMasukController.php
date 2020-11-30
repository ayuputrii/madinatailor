<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelBarangMasuk;
use App\ModelBarang;
use App\ModelSupplier;
use Dompdf\Dompdf;
use PDF;

use DB;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang      = ModelBarang::all();
        $supplier    = ModelSupplier::all();
        $barangmasuk = ModelBarangMasuk::all();
        return view('barangmasuk.barangmasuk', ['barangmasuk' => $barangmasuk, 'barang' => $barang, 'supplier' => $supplier]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barangmasuk.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('_barangmasuk')->insert([
            'kode_barang'   => $request->kode_barang,
            'tgl_masuk'     => $request->tgl_masuk,
            'jml_brg_masuk' => $request->jml_brg_masuk,
            'kode_supplier' => $request->kode_supplier
        ]);
        return redirect('/barangmasuk')->with('Sukses, Berhasil menambahkan Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $barangmasuk = ModelBarangMasuk::all();
        return view('barangmasuk.detail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier    = ModelSupplier::all();
        $barang      = ModelBarang::all();
        $barangmasuk = DB::table('_barangmasuk')->where('kode_barang',$id)->get();

        return view('barangmasuk.edit',['barangmasuk' => $barangmasuk, 'barang' => $barang, 'supplier' => $supplier]);
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
        $barangmasuk = DB::table('_barangmasuk')->where('kode_barang',$request->id)->update([
            'kode_barang' => $request->kode_barang,
            'tgl_masuk' => $request->tgl_masuk,
            'jml_brg_masuk' => $request->jml_brg_masuk,
            'kode_supplier' => $request->kode_supplier
        ]);
        $barangmasuk = ModelBarangMasuk::where('kode_barang',$id);
        $barangmasuk->update($request->except(['_token']));

        return redirect('/barangmasuk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('_barangmasuk')->where('id_brgmasuk',$id)->delete();

        return redirect('/barangmasuk')->with('Data sukses di Delete');
    }

    // Cetak
    public function pdf($id)
    {
    	$barangmasuk = ModelBarangMasuk::where('id_brgmasuk', $id)->get();

        $pdf = PDF::loadview('barangmasuk/cetak/masuk_pdf',['barangmasuk'=>$barangmasuk]);
    	return $pdf->stream();
    }
}
