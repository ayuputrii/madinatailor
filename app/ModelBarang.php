<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelBarang extends Model
{
    protected $table = "_barang";

    protected $fillable = [
        'kode_barang', 'nama_barang', 'spesifikasi', 'kode_lokasi', 'kode_kategori', 'jml_barang', 'kondisi', 'jenis_barang', 'sumber_dana'
    ];

    public $timestamps = false;

    protected $dates = ['deleted_at'];

    public function ModelStok()
    {
      return $this->hasOne('App\ModelStok');
    }
    public function ModelLokasi()
    {
      return $this->hasOne('App\ModelLokasi', 'kode_lokasi', 'kode_lokasi');
    }
    public function ModelKategori()
    {
      return $this->hasOne('App\ModelKategori', 'kode_kategori', 'kode_kategori');
    }
}
