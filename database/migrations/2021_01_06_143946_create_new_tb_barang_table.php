<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewTbBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_barang', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode',60);
            $table->string('namabarang',60);
            $table->integer('jenis_id')->unsigned();
            $table->integer('satuan_id')->unsigned();
            $table->integer('supplier_id')->unsigned();
            $table->string('stok',40);
            $table->string('minimal_stok',40);
            $table->integer('buy');
            $table->string('hargajual',40);
            $table->timestamps();

            $table->foreign('jenis_id')->references('id')->on('tb_jenisbarang')->onDelete('restrict');
            $table->foreign('satuan_id')->references('id')->on('tb_satuan')->onDelete('restrict');
            $table->foreign('supplier_id')->references('id')->on('tb_supplier')->onDelete('restrict');
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_barang', function (Blueprint $table) {
            //
        });
    }
}
