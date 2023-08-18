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
        Schema::create('investigasis', function (Blueprint $table) {
            $table->id('id');
            $table->bigInteger('p2k3_id');
            $table->bigInteger('laporinsiden_id');
            $table->bigInteger('departemen_id');
            $table->varchar('kategori');
            $table->varchar('penyebab_langsung');
            $table->varchar('penyebab_tidak_langsung');
            $table->varchar('penyebab_dasar');
            $table->date('tenggat_waktu');
            $table->varchar('tindakan');
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
        Schema::dropIfExists('investigasis');
    }
};
