<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email',150)->nullable(false)->unique();
            $table->string('fname', 20)->nullable(false);
            $table->string('lname', 20)->nullable(false);
            $table->string('gender', 10)->nullable(false);
            $table->unsignedInteger('age')->nullable(false);
            $table->string('phone', 11)->nullable(false);
            $table->string('password')->nullable(false);
            $table->string('img', 50)->nullable(false)->default("image/patient.jpg");
            $table->rememberToken();
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
        Schema::dropIfExists('patients');
    }
}
