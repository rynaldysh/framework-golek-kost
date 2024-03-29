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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('usergeneral_id')->unsigned();
            $table->string('kode_payment');
            $table->string('kode_trx');
            $table->integer('total_item')->unsigned();
            $table->bigInteger('total_harga')->unsigned();
            $table->integer('kode_unik')->unsigned();
            $table->string('status')->nullable();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('detail_lokasi')->nullable();
            $table->string('kurir')->nullable();
            $table->string('jasa_pengiriman');
            $table->integer('ongkir')->unsigned();
            $table->bigInteger('total_transfer')->unsigned();
            $table->string('bank');
            $table->string('bukti_transfer')->nullable();
            $table->timeStamp('created_att')->nullable();
            $table->timeStamp('expired_at')->nullable();
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
        Schema::dropIfExists('transaksis');
    }
};
