<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodReceipt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_good_receipt', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_pembelian')->unsigned();
            $table->string('document_no',115);
            $table->integer('status')->unsigned();
            $table->timestamps();

            $table->foreign('order_pembelian')->references('id')->on('tb_order_pembelian')->onDelete('restrict');
            $table->foreign('status')->references('id')->on('tb_status')->onDelete('restrict');

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
        Schema::table('tb_good_receipt', function (Blueprint $table) {
            //
        });
    }
}
