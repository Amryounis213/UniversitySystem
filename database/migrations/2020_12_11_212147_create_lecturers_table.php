<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLecturersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lecturers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->mediumText('image')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('degree',['Debloma','BA','MA','PH']);
            //forignK 
            $table->foreignId('roles_id');
            $table->foreignId('colleges_id');
            $table->foreignId('sections_id');
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
        Schema::dropIfExists('lecturers');
    }
}
