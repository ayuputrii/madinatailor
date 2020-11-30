<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelPinjamBarang;
use App\ModelBarang;

use DB;
use PDF;

class PinjamBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $num = ModelPinjamBarang::orderBy('no_pinjam','desc')->count();
        $data_kode = ModelPinjamBarang::orderBy('no_pinjam','desc')->first();
        if($num == 0){
            $code = '001';
        }
        else{
            $c = $data_kode->no_pinjam;
            $code = substr($c, 4)+1;
            $code = "00" .$code;
        }

        $barang       = ModelBarang::all();
        $pinjambarang = ModelPinjamBarang::all();
        return view('pinjambarang.pinjambarang', ['barang' => $barang, 'pinjambarang' => $pinjambarang, 'code' => $code]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pinjambarang.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('_pinjambarang')->insert([
            'no_pinjam'     => $request->no_pinjam,
            'tgl_pinjam'    => $request->tgl_pinjam,
            'kode_barang'   => $request->kode_barang,
            'jml_pinjaman'  => $request->jml_pinjaman,
            'peminjaman'    => $request->peminjaman,
            'tgl_kembali'   => $request->tgl_kembali,
            'keterangan'    => $request->keterangan
        ]);
        return redirect('/pinjambarang')->with('Sukses, Berhasil menambahkan Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $pinjambarang = ModelPinjamBarang::all();
        return view('pinjambarang.detail');
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
        $pinjambarang = DB::table('_pinjambarang')->where('no_pinjam',$id)->get();
        return view('pinjambarang.edit',['barang' => $barang, 'pinjambarang' => $pinjambarang]);
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
        $pinjambarang = DB::table('_pinjambarang')->where('no_pinjam',$request->id)->update([
          'no_pinjam'     => $request->no_pinjam,
          'tgl_pinjam'    => $request->tgl_pinjam,
          'kode_barang'   => $request->kode_barang,
          'jml_pinjaman'  => $request->jml_pinjaman,
          'peminjaman'    => $request->peminjaman,
          'tgl_kembali'   => $request->tgl_kembali,
          'keterangan'    => $request->keterangan
        ]);
        $pinjambarang = ModelPinjamBarang::where('no_pinjam',$id);
        $pinjambarang->update($request->except(['_token']));

        return redirect('/pinjambarang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('_pinjambarang')->where('no_pinjam',$id)->delete();

        return redirect('/pinjambarang')->with('Data sukses di Delete');
    }

    public function pdf($id)
    {
    	$pinjambarang = ModelPinjamBarang::all();
    	$pdf = PDF::loadview('barang/cetak/pinjam_pdf',['pinjambarang'=>$pinjambarang]);
    	return $pdf->stream();
    }
}
