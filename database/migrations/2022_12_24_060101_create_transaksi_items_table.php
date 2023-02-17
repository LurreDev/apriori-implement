<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_items', function (Blueprint $table) {
            $table->id();
            $table->integer('jumlah_produk');
            $table->foreignId('produks_id')->unsigned();
            $table->foreign('produks_id')->references('id')
              ->on('produks');
            $table->foreignId('transaksis_id')->unsigned();
            $table->foreign('transaksis_id')->references('id')
              ->on('transaksis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi_items');
    }
};
