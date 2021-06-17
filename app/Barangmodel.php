<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Barangmodel extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'id_barang';
    public $timestamps = false;
    protected $fillable = [
      'nama_barang', 'harga', 'stok'
    ];
}
