<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BrgKeluar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brg_keluar', function (Blueprint $table) {
            $table->id();
            $table->string('no_brg_keluar')->nullable();
            $table->string('id_barang')->nullable();
            $table->string('id_user')->nullable();



            $table->integer('jml_brg_keluar')->nullable();
            $table->integer('total')->nullable();

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
        Schema::dropIfExists('brg_keluar');

    }
}
