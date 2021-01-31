<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Master_jenisbarang;

class JenisbarangController extends Controller
{
    public function index()
    {
    	$title = 'Master Data Jenis Barang';
    	$data = Master_jenisbarang::orderBy('jenis_barang','asc')->get();

    	return view('jenisbarang.index', compact('title','data'));
        finish();
    }

    public function add()
    {
    	$title = 'Tambah Jenis Barang';

    	return view('jenisbarang.add', compact('title'));
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'jenis_barang' => ' required'
    	]);

    	$a['jenis_barang'] = $request->jenis_barang;
    	$a['created_at'] = date('Y-m-d H:i:s');
    	$a['updated_at'] = date('Y-m-d H:i:s');

    	Master_jenisbarang::insert($a);\Session::flash('sukses','Data Berhasil Ditambah');

    	return redirect('jenisbarang');
    }

    public function edit($id)
    {
        $title = 'Edit Jenis Barang';
        $dt = Master_jenisbarang::find($id);

        return view('jenisbarang.edit', compact('title','dt'));

    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'jenis_barang' => ' required'
        ]);

        $a['jenis_barang'] = $request->jenis_barang;
        $a['created_at'] = date('Y-m-d H:i:s');
        $a['updated_at'] = date('Y-m-d H:i:s');

        Master_jenisbarang::where('id',$id)->update($a);

        \Session::flash('sukses','Data Berhasil Diupdate');

        return redirect('jenisbarang');
    }

    public function delete($id)
    {
        try {
            Master_jenisbarang::where('id',$id)->delete();

            \Session::flash('sukses','Data Berhasil Dihapus');
        } catch (Exception $e) {
            \Session::flash('gagal;',$e->getMessage());
            
        }

        return redirect('jenisbarang');
    }
}
