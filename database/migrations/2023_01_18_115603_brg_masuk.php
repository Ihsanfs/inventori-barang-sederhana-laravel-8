<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BrgMasuk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brg_masuk', function (Blueprint $table) {
            $table->id();
            $table->string('no_brg_masuk')->nullable();
            $table->string('nama_barang')->nullable();
            $table->string('id_barang')->nullable();
            $table->string('id_user')->nullable();
            $table->integer('jml_brg_masuk')->nullable();
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
        Schema::dropIfExists('brg_masuk');

    }
}
