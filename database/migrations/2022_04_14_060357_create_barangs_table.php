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
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->integer('usergeneral_id')->unsigned();
            $table->string('kode_input_barang');
            $table->string('name_pemilik');
            $table->double('notelfon');
            $table->string('name');
            $table->double('harga');
            $table->string('status')->nullable();
            $table->string('lokasi');
            $table->longText('deskripsi');
            $table->string('image')->nullable();
            $table->string('created_att')->nullable();   
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
        Schema::dropIfExists('barangs');
    }
};
