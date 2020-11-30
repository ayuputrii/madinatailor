<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelSupplier extends Model
{
  protected $table = "_supplier";

  protected $fillable = [
          'kode_supplier', 'nama_supplier', 'alamat_supplier', 'kota_supplier'
      ];

  public $timestamps = false;

  protected $dates = ['deleted_at'];
}
