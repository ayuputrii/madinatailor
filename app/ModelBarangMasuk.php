<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelBarangMasuk extends Model
{
    protected $table = "_barangmasuk";

    protected $fillable = [
        'kode_barang', 'nama_barang', 'tgl_masuk', 'jml_brg_masuk', 'kode_supplier'
    ];

    public $timestamps = false;

    protected $dates = ['deleted_at'];

    public function ModelBarang()
      {
        return $this->belongsTo('App\ModelBarang', 'kode_barang', 'kode_barang');
      }
    public function ModelSupplier()
      {
        return $this->belongsTo('App\ModelSupplier', 'kode_supplier', 'kode_supplier');
      }
}
