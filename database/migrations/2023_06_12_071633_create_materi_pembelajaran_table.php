<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriPembelajaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materi_pembelajaran', function (Blueprint $table) {
            $table->id();
            $table->integer('pertemuan');
            $table->unsignedBigInteger('mata_kuliah_id');
            $table->integer('jenis_materi');
            $table->text('deskripsi');
            $table->timestamps();
        });
        Schema::create('file', function (Blueprint $table) {
            $table->id();
            $table->text('nama_file');
            $table->text('dir_file')->nullable();
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
        Schema::dropIfExists('materi_pembelajaran');
    }
}
