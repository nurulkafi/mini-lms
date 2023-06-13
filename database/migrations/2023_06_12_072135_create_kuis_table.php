<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKuisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pertanyaan_kuis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('materi_pembelajaran_id');
            $table->text('Pertanyaan');
            // $table->foreign('ExamID')->references('ExamID')->on('exams');
            $table->timestamps();
        });

        Schema::create('jawaban_kuis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pertanyaan_kuis_id');
            $table->text('PilihanJawaban');
            $table->boolean('JawabanBenar');
            $table->timestamps();
        });

        Schema::create('jawaban_mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('pertanyaan_kuis_id');
            $table->text('jawaban');
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
        Schema::dropIfExists('jawaban_mahasiswa');
        Schema::dropIfExists('jawaban_kuis');
        Schema::dropIfExists('pertanyaan_kuis');
    }
}
