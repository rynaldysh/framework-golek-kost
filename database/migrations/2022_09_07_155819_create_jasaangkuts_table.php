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
        Schema::create('jasaangkuts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('nomortelfon');
            $table->string('harga');
            $table->string('lokasi');
            $table->longtext('deskripsi');
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
        Schema::dropIfExists('jasaangkuts');
    }
};
