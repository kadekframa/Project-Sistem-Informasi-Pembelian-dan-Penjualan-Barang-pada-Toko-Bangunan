<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewOrderPembelianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_order_pembelian', function (Blueprint $table) {
            $table->increments('id');
            $table->string('document_no',40);
            $table->integer('supplier')->unsigned();
            $table->timestamps();

            $table->foreign('supplier')->references('id')->on('tb_supplier')->onDelete('restrict');
            
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
        Schema::table('tb_order_pembelian', function (Blueprint $table) {
            //
        });
    }
}
