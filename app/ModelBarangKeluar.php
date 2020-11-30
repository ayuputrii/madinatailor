<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelBarangKeluar extends Model
{
    protected $table = "_barangkeluar";

    protected $fillable = [
        'kode_barang', 'nama_barang', 'tgl_keluar', 'penerima', 'jml_brg_keluar', 'keperluan'
    ];

    public $timestamps = false;

    protected $dates = ['deleted_at'];

    public function ModelBarang()
      {
        return $this->belongsTo('App\ModelBarang', 'kode_barang', 'kode_barang');
      }
}
