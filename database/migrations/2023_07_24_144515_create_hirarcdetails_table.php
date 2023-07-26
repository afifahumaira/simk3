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
        Schema::create('hirarcdetails', function (Blueprint $table) {
            $table->string('current_severity');
            $table->string('surrent_exposure');
            $table->string('surrent_probability');
            $table->string('surrent_sirk_rating');
            $table->string('penyebab');
            $table->string('usulan');
            $table->timestamp('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hirarcdetails');
    }
};
