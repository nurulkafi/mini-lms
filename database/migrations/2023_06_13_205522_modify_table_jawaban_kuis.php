<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyTableJawabanKuis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jawaban_kuis', function (Blueprint $table) {
            //
            $table->string('deskripsiJawaban');
            // $table->renameColumn('PilihanJawaban', 'opsi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jawaban_kuis', function (Blueprint $table) {
            //
            $table->dropColumn('deskripsiJawaban');
            // $table->renameColumn('PilihanJawaban', 'opsi');
        });
    }
}
