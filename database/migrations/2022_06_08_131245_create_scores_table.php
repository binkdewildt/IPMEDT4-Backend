<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->integer('score');

            $table->timestamp('created_at')->useCurrent();

            $table->integer('answeredQuestions')->default(0);

            // Foreign keys
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('scores', function(Blueprint $table) {
            $table->dropForeign('scores_user_id_foreign');
        });

        Schema::dropIfExists('scores');
    }
}
