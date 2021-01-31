<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order_pembelian;
use App\Models\Master_supplier;
use App\Models\Barang;
use App\Models\Daftar_order_pembelian;
use App\Models\Good_receipt;

class PoController extends Controller
{
    public function index()
    {
        $title = 'List Order Pembelian';
        $data = Order_pembelian::withCount('daftar_order_pembelian_r')->orderBy('created_at','desc')->get();

        return view('orderpembelian.index', compact('title','data'));
    }

    public function add()
    {
    	$title = 'Tambah Order Pembelian';
    	$doc_no = 'PO-'.time();
    	$suppliers = Master_supplier::orderBy('supplier','asc')->get();

    	return view('orderpembelian.add', compact('title','doc_no','suppliers'));
    }

    public function store(Request $request)
    {
        try {
            $barang = $request->barang;
            $qty = $request->qty;

            $document_no = $request->document_no;
            $supplier = $request->supplier;

            $id_po = Order_pembelian::insertGetId([
                'document_no' => $document_no,
                'supplier' => $supplier,
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            foreach ($qty as $e=>$qt) {
                if($qt == 0){
                    continue;
                }

                $dt_barang = Barang::where('id',$barang[$e])->first();
                $buy = $dt_barang->buy;
                $grand_total = $qt * $buy;

                Daftar_order_pembelian::insert([
                    'order_pembelian' =>$id_po,
                    'barang' =>$barang[$e],
                    'qty' => $qt,
                    'buy' => $buy,
                    'grand_total' => $grand_total
                ]);
            }

            \Session::flash('sukses','Order Pembelian Berhasil Dibuat');
        } catch (Exception $e) {
            \Session::flash('gagal',$e->getMessage());
        }

        return redirect('po');
    }

    public function get_barang($supplier)
    {
    	
    	$title = 'Tambah Order Pembelian';
    	$doc_no = 'PO-'.time();
    	$suppliers = Master_supplier::orderBy('supplier','asc')->get();
    	$barang = Barang::where('supplier_id',$supplier)->get();

    	return view('orderpembelian.add', compact('title','doc_no','suppliers','barang','supplier'));
    }

    public function approved($id)
    {
        try {
            $po = Order_pembelian::find($id);
            Order_pembelian::where('id',$id)->update([
                'status' => 2
            ]);

            Good_receipt::where('order_pembelian',$id)->delete();

            Good_receipt::insert([
                'order_pembelian' =>$id,
                'document_no' =>'GR-'.rand(),
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            \Session::flash('sukses','Order Pembelian Berhasil di Approved'); 
        } catch (Exception $e) {
            \Session::flash('gagal',$e->getMessage());
        }

        return redirect()->back();
    }

    public function detail($id)
    {
        $title = 'Detail Order Pembelian';
        $dt = Order_pembelian::find($id);

        return view('orderpembelian.details',compact('title','dt'));
    }

    public function update(Request $request)
    {
        try {
            $qty = $request->qty;
            $id_line = $request->id_line;
            $buy = $request->buy;
            $barang = $request->barang;

            foreach ($qty as $e => $dt) {
                $data['qty'] = $dt;
                $data['grand_total'] = $dt * $buy[$e];
                $data['buy'] = $buy[$e];
                // $data['updated_at'] = date('Y-m-d H:i:s');
                $line = $id_line[$e];

                Daftar_order_pembelian::where('id',$line)->update($data);

                Barang::where('id',$barang[$e])->update([
                    'buy' => $data['buy']
                ]);

                \Session::flash('sukses','Data Berhasil Disimpan');
            }
        } catch (Exception $e) {
            \Session::flash('gagal',$e->getMessage());
        }

        return redirect('po');
    }

    public function hapus_barang_orderpembelian($id)
    {
        try {
            Daftar_order_pembelian::where('id',$id)->delete();

            \Session::flash('sukses','Data Berhasil Dihapus');
        } catch (Exception $e) {
            \Session::flash('gagal',$e->getMessage());
        }

        return redirect()->back();
    }
}
