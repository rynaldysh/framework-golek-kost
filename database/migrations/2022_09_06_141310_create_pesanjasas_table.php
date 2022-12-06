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
        Schema::create('pesanjasas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('usergeneral_id')->unsigned();
            $table->string('kode_pesan_jasa');
            $table->string('status')->nullable();
            $table->string('name')->nullable();
            $table->string('tanggal')->nullable();
            $table->string('phone')->nullable();
            $table->string('detail_lokasi_asal')->nullable();
            $table->string('detail_lokasi_tujuan')->nullable();
            $table->string('type_asal')->nullable();
            $table->string('type_tujuan')->nullable();
            $table->string('deskripsi')->nullable();
            $table->timeStamp('created_att')->nullable();
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
        Schema::dropIfExists('pesanjasas');
    }
};
