<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelSupplier;
use DB;
use PDF;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $num = ModelSupplier::orderBy('kode_supplier','desc')->count();
        $data_kode = ModelSupplier::orderBy('kode_supplier','desc')->first();
        if($num == 0){
            $code = 'SPL-001';
        }
        else{
            $c = $data_kode->kode_supplier;
            $code = substr($c, 4)+1;
            $code = "SPL-00" .$code;
        }

        $supplier = ModelSupplier::all();
        return view('supplier.supplier', ['supplier' => $supplier, 'code' => $code]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supplier.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
     {
         DB::table('_supplier')->insert([
            'kode_supplier' => $request->kode_supplier,
             'nama_supplier' => $request->nama_supplier,
             'alamat_supplier' => $request->alamat_supplier,
             'kota_supplier' => $request->kota_supplier
         ]);
         return redirect('/supplier')->with('Sukses, Berhasil menambahkan Data');
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $supplier = ModelSupplier::all();
        return view('supplier.detail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier = DB::table('_supplier')->where('kode_supplier',$id)->get();

        return view('supplier.edit',['supplier' => $supplier]);
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
        $supplier = DB::table('_supplier')->where('kode_supplier',$request->id)->update([
            'kode_supplier'   => $request->kode_supplier,
            'nama_supplier'   => $request->nama_supplier,
            'alamat_supplier' => $request->alamat_supplier,
            'kota_supplier'   => $request->kota_supplier
        ]);
        $supplier = ModelSupplier::where('kode_supplier',$id);
        $supplier->update($request->except(['_token']));

        return redirect('/supplier');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('_supplier')->where('kode_supplier',$id)->delete();

        return redirect('/supplier')->with('Data sukses di Delete');
    }

    public function pdf($id)
    {
    	$supplier = ModelSupplier::all();
    	$pdf = PDF::loadview('barang/cetak/supplier_pdf',['supplier'=>$supplier]);
    	return $pdf->stream();
    }
}
