<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Master_satuan;

class SatuanController extends Controller
{
    public function index()
    {
    	$title = 'Master Data Satuan';
    	$data = Master_satuan::orderBy('satuan','asc')->get();

    	return view('satuan.index', compact('title','data'));
    	finish();
    }

    public function add()
    {
    	$title = 'Tambah Data Satuan';

    	return view('satuan.add', compact('title'));
    }

    public function store(Request $request)
    {
    	$this->validate($request,[
    		'satuan' => 'required'
    	]);

    	$a['satuan'] = $request->satuan;

    	Master_satuan::insert($a);\Session::flash('sukses','Data Berhasil Ditambah');

    	return redirect('satuan');
    }

    public function edit($id)
    {
    	$title = 'Edit Data Satuan';
    	$dt = Master_satuan::find($id);

    	return view('satuan.edit', compact('title','dt'));
    }

    public function update(Request $request, $id)
    {
    	$this->validate($request,[
    		'satuan' => 'required'
    	]);

    	$a['satuan'] = $request->satuan;

    	Master_satuan::where('id', $id)->update($a);
    	\Session::flash('sukses','Data Berhasil Diupdate');

    	return redirect('satuan');
    	finish();
    }

    public function delete($id)
    {
        try {
            Master_satuan::where('id',$id)->delete();
            \Session::flash('sukses','Data Berhasil Dihapus');
        } catch (Exception $e) {
            \Session::flash('gagal',$e->getMessage());
        }

        return redirect('satuan');
    }
}
