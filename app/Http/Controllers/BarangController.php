<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Barang;

use App\Models\Master_jenisbarang;
use App\Models\Master_satuan;
use App\Models\Master_supplier;

class BarangController extends Controller
{
    public function index()
    {
    	$title = 'Data Barang';
    	$data = Barang::orderBy('namabarang','asc')->get();
    	

    	return view('barang.index', compact('title','data'));
    }

    public function add()
    {
    	$title = 'Tambah Data Barang';
    	$jenisbarang = Master_jenisbarang::orderBy('jenis_barang','asc')->get();
    	$satuan = Master_satuan::orderBy('satuan','asc')->get();
        $supplier = Master_supplier::orderBy('supplier','asc')->get();
    	$kode =time();

    	return view('barang.add', compact('title','jenisbarang','satuan','supplier','kode'));
    }

    public function store(Request $request)
    {
    	$this->validate($request,[
    		'kode' => 'required',
    		'namabarang' => 'required',
    		'jenis_id' => 'required',
    		'satuan_id' => 'required',
            'supplier_id' => 'required',
    		'minimal_stok' => 'required',
            'buy' => 'required',
    		'hargajual' => 'required'
    	]);

    	$data = $request->except(['_token']);
    	$data['created_at'] = date('Y-m-d H:i:s');
    	$data['updated_at'] = date('Y-m-d H:i:s');
        $data['stok'] = 0;

    	Barang::insert($data);
    	\Session::flash('sukses','Data Berhasil Ditambah');
    	return redirect('barang');
    }

    public function detail($id)
    {
        $title = 'Detail Data Barang';
        $jenisbarang = Master_jenisbarang::orderBy('jenis_barang','asc')->get();
        $dt = Barang::find($id);
        $satuan = Master_satuan::orderBy('satuan','asc')->get();
        $supplier = Master_supplier::orderBy('supplier','asc')->get();
        $kode =time();

        return view('barang.detail', compact('title','dt','jenisbarang','satuan','supplier','kode'));
    }

    public function edit($id)
    {
    	$title = 'Edit Data Barang';
    	$jenisbarang = Master_jenisbarang::get();
    	$satuan = Master_satuan::get();
        $supplier = Master_supplier::get();
    	$dt = Barang::find($id);

    	return view('barang.edit', compact('title','jenisbarang','satuan','supplier','dt'));
    }

    public function update(Request $request, $id)
    {
    	$this->validate($request,[
    		'kode' => 'required',
    		'namabarang' => 'required',
    		'jenis_id' => 'required',
    		'satuan_id' => 'required',
            'supplier_id' => 'required',
    		'minimal_stok' => 'required',
            'buy' => 'required',
    		'hargajual' => 'required'
    	]);

    	$data = $request->except(['_token','_method']);
    	// $data['created_at'] = date('Y-m-d H:i:s');
    	$data['updated_at'] = date('Y-m-d H:i:s');
        $data['stok'] = 0;

    	Barang::where('id',$id)->update($data);
    	\Session::flash('sukses','Data Berhasil Ditambah');

    	return redirect('barang');
    }

    public function delete($id)
    {
    	try {
    		Barang::where('id',$id)->delete();

    		\Session::flash('sukses','Data Berhasil Dihapus');
    	} catch (Exception $e) {
    		\Session::flash('gagal',$e->getMessage());
    	}

    	return redirect()->back();
    }
}
