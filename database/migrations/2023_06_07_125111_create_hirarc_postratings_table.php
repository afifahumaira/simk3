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
        Schema::create('hirarc_postratings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hirarc_detail_id');
            $table->unsignedBigInteger('hirarc_id');
            $table->float('post_severity');
            $table->float('post_exposure');
            $table->float('post_probability');
            $table->float('hasilpostcontrol');
            $table->timestamps();

            $table->foreign('hirarc_detail_id')
                ->references('id')
                ->on('hirarc_details')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreign('hirarc_id')
                ->references('id')
                ->on('hirarcs')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hirarc_postratings');
    }
};
