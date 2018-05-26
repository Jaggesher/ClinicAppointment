<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email',150)->nullable(false)->unique();
            $table->string('name',50)->nullable(false);
            $table->string('sort_msg',150)->nullable(false);
            $table->string('category',150)->nullable(false);
            $table->string('district',150);
            $table->text('description')->nullable(false);
            $table->string('password')->nullable(false);
            $table->string('img', 50)->nullable(false)->default("image/doctor.jpg");
            $table->timestamps();
            $table->rememberToken();
            $table->foreign('category')->references('category')->on('categories')->onDelete('cascade');
            $table->foreign('district')->references('district')->on('districts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctors');
    }
}
