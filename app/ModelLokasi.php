<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelLokasi extends Model
{
    protected $table = "_lokasi";

    protected $fillable = [
        'kode_lokasi', 'nama_lokasi'
    ];

    public $timestamps = false;

    protected $dates = ['deleted_at'];
}
