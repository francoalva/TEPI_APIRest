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
        Schema::create('dispositivos', function (Blueprint $table) {
            $table->id();
            $table->string('DIS_nombre');
            $table->timestamps();
            
            $table->integer('BOD_id')->unsigned();
            $table->foreign('BOD_id')->references('id')->on('bodegas');

            $table->integer('MOD_id')->unsigned();
            $table->foreign('MOD_id')->references('id')->on('modelos');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dispositivos');
    }
};
