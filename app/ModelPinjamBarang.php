<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelPinjamBarang extends Model
{
    protected $table = "_pinjambarang";

    protected $fillable = [
        'no_pinjam', 'tgl_pinjam', 'kode_barang', 'nama_barang', 'jml_pinjaman', 'peminjaman', 'tgl_kembali', 'keterangan'
    ];

    public $timestamps = false;

    protected $dates = ['deleted_at'];

    public function ModelBarang()
    {
      return $this->belongsTo('App\ModelBarang', 'kode_barang', 'kode_barang');
    }
}
