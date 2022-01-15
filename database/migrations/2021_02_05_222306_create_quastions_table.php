<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuastionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quastions', function (Blueprint $table) {
            $table->id();
            $table->string('quastion');
            $table->integer('mark')->unsigned();
            $table->foreignId('quizzes_id')->unsigned();
            $table->foreign('quizzes_id')->references('id')->on('Quiz')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('quastions');
    }
}
