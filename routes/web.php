<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/home');
});

//Route untuk logout
Route::get('/keluar', function(){
	\Auth::logout();

	return redirect('/login');
});

Route::group(['middleware' =>'auth'], function(){
//Route Manage Supplier
	//list supplier
	Route::get('/supplier', 'SupplierController@index');

	//create supplier
	Route::get('/supplier/add', 'SupplierController@add');
	Route::post('/supplier/add', 'SupplierController@store');

	//edit supplier
	Route::get('/supplier/{id}', 'SupplierController@edit');
	Route::put('/supplier/{id}', 'SupplierController@update');

	//delete supplier
	Route::delete('/supplier/{id}', 'SupplierController@delete');

//Route Manage Jenis Barang
	//list jenis barang
	Route::get('/jenisbarang', 'JenisbarangController@index');

	//create jenisbarang
	Route::get('/jenisbarang/add','JenisbarangController@add');
	Route::post('/jenisbarang/add','JenisbarangController@store');

	//edit jenis barang
	Route::get('/jenisbarang/{id}','JenisbarangController@edit');
	Route::put('/jenisbarang/{id}','JenisbarangController@update');

	//delete jenis barang
	Route::delete('/jenisbarang/{id}','JenisbarangController@delete');

//Route Manage Satuan
	//list satuan
	Route::get('/satuan','SatuanController@index');

	//create satuan
	Route::get('/satuan/add','SatuanController@add');
	Route::post('/satuan/add','SatuanController@store');

	//edit satuan
	Route::get('/satuan/{id}','SatuanController@edit');
	Route::put('/satuan/{id}','SatuanController@update');


	//delete satuan
	Route::delete('/satuan/{id}','SatuanController@delete');

//Route Manage Barang
	//list barang
	Route::get('/barang','BarangController@index');

	//create barang
	Route::get('/barang/add','BarangController@add');
	Route::post('/barang/add','BarangController@store');

	//detail barang
	Route::get('/barang/detail/{id}','BarangController@detail');

	//edit barang
	Route::get('/barang/{id}','BarangController@edit');
	Route::put('/barang/{id}','BarangController@update');

	//delete barang
	Route::delete('/barang/{id}','BarangController@delete');


//Route Manage Order Pembelian
	//list daftar order pembelian
	Route::get('/po','PoController@index');

	//create order pembelian
	Route::get('/po/add','PoController@add');
	Route::get('/po/barang/{supplier}','PoController@get_barang');
	Route::post('/po/add','PoController@store');

	//approve order pembelian
	Route::get('/po/approved/{id}','PoController@approved');

	//detail order pembelian
	Route::get('/po/detail/{id}','PoController@detail');

	//Update order pembelian
	Route::put('/po/{id}','PoController@update');

	//hapus barang pada detail pembelian
	Route::delete('/po/line/{id}','PoController@hapus_barang_orderpembelian');

//Route Manage Good Receipt
	//list Good Receipt
	Route::get('gr','GrController@index');

	//detail Good Receipt
	Route::get('gr/{id}','GrController@detail');

	//approve Good Receipt
	Route::post('gr/approved/{id}','GrController@approved');

//Route Manage POS
	Route::get('pos','PosController@index');
	Route::get('barang/ajax/{kode}','PosController@get_barang');



});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
