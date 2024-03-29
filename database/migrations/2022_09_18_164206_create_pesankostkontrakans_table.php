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
        Schema::create('pesankostkontrakans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('usergeneral_id')->unsigned();
            $table->string('kode_pesan_kostkontrakan');
            $table->string('status')->nullable();
            $table->string('name')->nullable();
            $table->string('tanggal')->nullable();
            $table->string('phone')->nullable();
            $table->string('detail_lokasi')->nullable();
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
        Schema::dropIfExists('pesankostkontrakans');
    }
};
