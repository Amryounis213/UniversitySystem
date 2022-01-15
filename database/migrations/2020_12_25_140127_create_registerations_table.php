<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegisterationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registerations', function (Blueprint $table) {
            $table->id();
            $table->integer('users_id');
            $table->integer('courses_id');
            $table->integer('lecturers_id');
            $table->integer('hours');
            $table->string('coursename');
            $table->string('lecturer_firstname');
            $table->string('lecturer_lastname');
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
        Schema::dropIfExists('registerations');
    }
}
