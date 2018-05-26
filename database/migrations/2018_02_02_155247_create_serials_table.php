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
            $table->time('start_time')->nullable(false);
            $table->time('end_time')->nullable(false);
            $table->unsignedInteger('patient')->nullable(true);
            $table->unsignedInteger('serial_date')->nullable(false);
            $table->timestamps();
            $table->foreign('serial_date')->references('id')->on('dates')->onDelete('cascade');
            $table->foreign('patient')->references('id')->on('patients')->onDelete('cascade');
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
