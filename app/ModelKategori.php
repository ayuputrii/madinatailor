<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelKategori extends Model
{
    protected $table = "_kategori";

    protected $fillable = [
        'kode_kategori', 'nama_kategori'
    ];

    public $timestamps = false;

    protected $dates = ['deleted_at'];
}
