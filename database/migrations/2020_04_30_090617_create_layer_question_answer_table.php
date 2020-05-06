<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLayerQuestionAnswerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('layer_question_answer', function (Blueprint $table) {
            $table->unsignedBigInteger('question_answer_id');
            $table->unsignedBigInteger('layer_id');
            $table->timestamps();

            $table->foreign('question_answer_id')->references('id')->on('question_answers')->onDelete('cascade');
            $table->foreign('layer_id')->references('id')->on('layers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('layer_question_answer');
    }
}
