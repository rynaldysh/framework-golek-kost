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
        Schema::create('pesankostkontrakandetails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pesan_kostkontrakan_id')->unsigned();
            $table->integer('kostkontrakan_id')->unsigned();
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
        Schema::dropIfExists('pesankostkontrakandetails');
    }
};
