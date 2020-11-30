<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelStok extends Model
{
    protected $table = "_stok";

    protected $fillable = [
        'kode_barang', 'nama_barang', 'id_brgkeluar', 'id-brgmasuk', 'total_barang', 'keterangan'
    ];

    public $timestamps = false;

    protected $dates = ['deleted_at'];

    public function ModelBarang()
      {
        return $this->belongsTo('App\ModelBarang', 'kode_barang', 'kode_barang');
      }
    public function ModelBarangKeluar()
      {
        return $this->belongsTo('App\ModelBarangKeluar', 'id_brgkeluar', 'id_brgkeluar');
      }
    public function ModelBarangMasuk()
      {
        return $this->belongsTo('App\ModelBarangMasuk', 'id_brgmasuk', 'id_brgmasuk');
      }
}
