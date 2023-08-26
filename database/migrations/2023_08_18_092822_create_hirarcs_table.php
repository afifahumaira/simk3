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
        Schema::create('hirarcs', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('user_id')->nullable();
            $table->foreignId('departemen_id')->nullable();
            $table->foreignId('location_id')->nullable();
            $table->varchar('activity')->nullable();
            $table->varchar('hazard')->nullable();
            $table->varchar('risk')->nullable();
            $table->varchar('kesesuaian');
            $table->varchar('kondisi');
            $table->varchar('kendali');
            $table->varchar('current_severity');
            $table->varchar('current_exposure');
            $table->varchar('current_probability');
            $table->varchar('current_risk_rating');
            $table->varchar('current_risk_category');
            $table->varchar('penyebab');
            $table->varchar('usulan');
            $table->varchar('form_diperlukan');
            $table->varchar('sop');
            $table->varchar('residual_severity');
            $table->varchar('residual_exposure');
            $table->varchar('residual_probability');
            $table->varchar('residual_risk_rating');
            $table->varchar('residual_risk_category');
            $table->varchar('penanggung_jawab');
            $table->varchar('status');
            $table->timestamps('created_at');
            $table->timestamps('updated_at');
            $table->timestamps('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hirarcs');
    }
};
