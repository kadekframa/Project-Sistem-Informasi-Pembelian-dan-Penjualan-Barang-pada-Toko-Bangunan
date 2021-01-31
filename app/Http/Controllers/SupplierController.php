<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Master_supplier;

class SupplierController extends Controller
{
    public function index()
    {
    	$title = 'Mater Data Supllier';
    	$data = Master_supplier::orderBy('supplier','asc')->get();

    	return view('supplier.index', compact('title','data'));
    }

    public function add()
    {
    	$title = 'Tambah Data Supplier';

    	return view('supplier.add', compact('title'));
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'supplier' => 'required'
    	]);

    	$b['supplier'] = $request->supplier;

    	Master_supplier::insert($b);

    	\Session::flash('sukses','Data Supllier Berhasil Ditambah');

    	return redirect('supplier');
    }

    public function edit($id)
    {
    	$title = 'Edit Data Supplier';
    	$dt = Master_supplier::find($id);

    	return view('supplier.edit', compact('title','dt'));
    }

    public function update(Request $request, $id)
    {
    	$this->validate($request, [
    		'supplier' => 'required'
    	]);

    	$b['supplier'] = $request->supplier;

    	Master_supplier::where('id',$id)->update($b);

    	\Session::flash('sukses','Data Supllier Berhasil Diupdate');

    	return redirect('supplier');
    	finish();
    }

    public function delete($id)
    {
    	try {
    		Master_supplier::where('id',$id)->delete();
    		\Session::flash('sukses','Data Berhasil Dihapus');
    	} catch (Exception $e) {
    		\Session::flash('gagal',$e->getMessage());
    		
    	}

    	return redirect('supplier');
    }
}
