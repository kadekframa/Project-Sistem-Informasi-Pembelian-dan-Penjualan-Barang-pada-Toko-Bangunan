<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewDaftarOrderPembelianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_list_order_pembelian', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_pembelian')->unsigned();
            $table->integer('barang')->unsigned();
            $table->integer('qty');
            $table->integer('buy');
            $table->integer('grand_total');

            $table->foreign('order_pembelian')->references('id')->on('tb_order_pembelian')->onDelete('cascade');
            $table->foreign('barang')->references('id')->on('tb_barang')->onDelete('restrict');

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
        Schema::table('tb_list_order_pembelian', function (Blueprint $table) {
            //
        });
    }
}
