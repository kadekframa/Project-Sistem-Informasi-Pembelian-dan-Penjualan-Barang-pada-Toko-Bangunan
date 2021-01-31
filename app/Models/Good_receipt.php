<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Daftar_order_pembelian;

class Good_receipt extends Model
{
    protected $table = 'tb_good_receipt';

    public function status_id_r()
    {
    	return $this->belongsTo('App\Models\Master_status','status','id');
    }

    public function orderpembelian_id_r()
    {
    	return $this->belongsTo('App\Models\Order_pembelian','order_pembelian','id');
    }

    public function total_item()
    {
    	$id_po = $this->order_pembelian;
    	$total = Daftar_order_pembelian::where('order_pembelian',$id_po)->count();

    	return $total;
    }
}
