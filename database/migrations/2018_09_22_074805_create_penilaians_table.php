<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenilaiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penilaians', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_nilai');
            $table->integer('id_santri')->unsigned();
            $table->foreign('id_santri')->references('id')->on('santris')->onDelete('cascade');
            $table->integer('id_kategori')->unsigned();
            $table->foreign('id_kategori')->references('id')->on('kategoris')->onDelete('cascade');
            $table->string('keterangan');
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
        Schema::dropIfExists('penilaians');
        $table->dropForeign(['id_santri','id_kategori']);
    }
}
