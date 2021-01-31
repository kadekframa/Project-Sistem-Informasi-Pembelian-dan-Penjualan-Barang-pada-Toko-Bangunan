<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Good_receipt;
use App\Models\Barang;

class GrController extends Controller
{
    public function index()
    {
    	$title = 'Good Receipt';
    	$data = Good_receipt::orderBy('created_at','desc')->get();

    	return view('goodreceipt.index',compact('title','data'));
    }

    public function detail($id)
    {
    	$title = 'Detail Good Receipt';
    	$dt = Good_receipt::find($id);

    	return view('goodreceipt.detail',compact('title','dt'));
    }

    public function approved($id)
    {
    	try {
    		$data = Good_receipt::find($id);

    		if($data->status == 2){
    			\Session::flash('gagal','Mohon Maaf Dokumen Ini Sudah Pernah Diapproved'); 

    			return redirect()->back();
    		}

    		\DB::transaction(function()use($id,$data){
    			Good_receipt::where('id',$id)->update([
    			'status'=>2
    		]);

    		foreach ($data->orderpembelian_id_r->daftar_order_pembelian_r  as $df) {
    			$qty = $df->qty;
    			$barang = $df->barang;

    			$pd = Barang::find($barang);
    			$stock_sekarang = $pd->stok;
    			$stock_baru = $stock_sekarang + $qty;

    			Barang::where('id',$barang)->update([
    				'stok' => $stock_baru
    			]);
    		}
    		});

    		\Session::flash('sukses','Data Berhasil Diapproved');
    	} catch (Exception $e) {
    		\Session::flash('gagal',$e->getMessage());
    	}

    	return redirect()->back();
    }
}
