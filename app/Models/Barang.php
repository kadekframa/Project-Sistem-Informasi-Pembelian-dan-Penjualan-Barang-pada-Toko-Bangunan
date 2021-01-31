<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'tb_barang';

    public function jenis_id_r()
    {
    	return $this->belongsTo('App\Models\Master_jenisbarang','jenis_id','id');
    }

    public function satuan_id_r()
    {
    	return $this->belongsTo('App\Models\Master_satuan','satuan_id','id');
    }

    public function supplier_id_r()
    {
    	return $this->belongsTo('App\Models\Master_supplier','supplier_id','id');
    }
}
