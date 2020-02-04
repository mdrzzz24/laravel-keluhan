<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInputAspirasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('input_aspirasi', function (Blueprint $table) {
            $table->bigInteger('id_pelaporan')->primary();
            $table->bigInteger('id_penduduk');
            $table->string('jenis_aspirasi', 60);
            $table->mediumText('lokasi');
            $table->timestamp('tanggal', 0)->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('input_aspirasi');
    }
}
