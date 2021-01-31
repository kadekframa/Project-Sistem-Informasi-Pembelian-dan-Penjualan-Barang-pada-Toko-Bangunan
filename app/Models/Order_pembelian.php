<?php
 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Daftar_order_pembelian;

class Order_pembelian extends Model
{
    protected $table = 'tb_order_pembelian';

    public function supplier_id_r()
    {
    	return $this->belongsTo('App\Models\Master_supplier','supplier','id');
    }

    public function status_id_r()
    {
    	return $this->belongsTo('App\Models\Master_status','status','id');
    }

    public function daftar_order_pembelian_r()
    {
    	return $this->hasMany('App\Models\Daftar_order_pembelian','order_pembelian');
    }

    public function grandtotal_r()
    {
    	$po = $this->id;
    	$total = Daftar_order_pembelian::where('order_pembelian',$po)->sum('grand_total');

    	return $total;
    }
}