<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('question');

            // MC Question
            $table->boolean('mcQuestion');
            $table->string('answerA')->nullable();
            $table->string('answerB')->nullable();
            $table->string('answerC')->nullable();
            $table->string('answerD')->nullable();

            // Answers
            $table->string('correctAnswer');
            $table->integer('points');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
