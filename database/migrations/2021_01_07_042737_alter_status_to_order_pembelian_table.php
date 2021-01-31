<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterStatusToOrderPembelianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_order_pembelian', function (Blueprint $table) {
            $table->integer('status')->unsigned()->nullable()->after('supplier');

            $table->foreign('status')->references('id')->on('tb_status')->onDelete('restrict');
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
