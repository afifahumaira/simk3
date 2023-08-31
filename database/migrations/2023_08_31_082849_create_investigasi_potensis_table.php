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
        Schema::create('investigasi_potensis', function (Blueprint $table) {
            $table->id();
            $table->string('potensibahaya_id');
            $table->string('departemen_id');
            $table->string('lokasi');
            $table->string('potensi_bahaya');
            $table->string('risiko');
            $table->string('usulan');
            $table->string('tindakan');
            $table->string('p2k3');
            $table->string('tenggat_waktu');
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
        Schema::dropIfExists('investigasi_potensis');
    }
};
