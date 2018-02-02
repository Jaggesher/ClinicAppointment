<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSerialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serials', function (Blueprint $table) {
            $table->increments('id');
            $table->time('serial_time');
            $table->unsignedInteger('patient')->nullable(false);
            $table->unsignedInteger('time')->nullable(false);
            $table->timestamps();
            $table->unique(['time','serial_time']);
            $table->foreign('time')->references('id')->on('times');
            $table->foreign('patient')->references('id')->on('patients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('serials');
    }
}
