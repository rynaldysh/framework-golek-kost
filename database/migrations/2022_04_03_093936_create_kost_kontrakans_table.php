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
        Schema::create('kost_kontrakans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('harga');
            $table->string('lokasi');
            $table->string('mayoritas');
            $table->string('deskripsi');
            $table->string('image');
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
        Schema::dropIfExists('kost_kontrakans');
    }
};
