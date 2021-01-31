<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class PosController extends Controller
{
    public function index()
    {
    	$title = 'Penjualan Barang';

    	return view('pos.index',compact('title'));
    }

    public function get_barang($kode)
    {
    	$dt = Barang::where('kode',$kode)->first();

    	return response()->json([
    		'data' => $dt
    	]);
    }
}
