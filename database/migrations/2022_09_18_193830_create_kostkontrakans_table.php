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
        Schema::create('kostkontrakans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('nomortelfon');
            $table->double('harga');
            $table->string('rasiobayar');
            $table->string('lokasi');            
            $table->string('pengelola');
            $table->double('sisakamar');
            $table->double('totalkamar');
            $table->string('mayoritas');
            $table->longText('deskripsi');
            $table->string('listrik');
            $table->string('air');
            $table->string('wifi');
            $table->string('bed');
            $table->string('ac');
            $table->string('kamarmandi');
            $table->string('kloset');
            $table->string('satpam');
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
        Schema::dropIfExists('kostkontrakans');
    }
};
