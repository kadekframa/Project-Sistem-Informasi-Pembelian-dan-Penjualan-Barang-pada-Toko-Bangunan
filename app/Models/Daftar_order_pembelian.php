<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Daftar_order_pembelian extends Model
{
    protected $table = 'tb_list_order_pembelian';
    public $timestamps = false;

    public function barang_id_r()
    {
    	return $this->belongsTo('App\Models\Barang','barang','id');
    }

    public function sum_buy()
    {
        return $this->where('order_pembelian',$this->order_pembelian)->sum('buy');
    }

    public function sum_grand_total()
    {
        return $this->where('order_pembelian',$this->order_pembelian)->sum('grand_total');
    }
}
