<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRuanganToJadwalPerkuliahan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jadwal_perkuliahan', function (Blueprint $table) {
            //
            $table->string('ruangan')->after('mata_kuliah_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jadwal_perkuliahan', function (Blueprint $table) {
            $table->dropColumn('ruangan');
        });
    }
}
