<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Order_pembelian;
use App\Models\Daftar_order_pembelian;
use App\Models\Master_supplier;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $title = 'Beranda Admin';
        $total_order_pembelian = Daftar_order_pembelian::sum('grand_total');
        $total_supllier = Master_supplier::count();
        $total_barang = Barang::count();

        return view('home',compact('title','total_order_pembelian','total_barang','total_supllier'));
    }
}