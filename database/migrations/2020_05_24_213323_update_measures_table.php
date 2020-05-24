<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMeasuresTable extends Migration
{
    public function up()
    {
        //er moet een opgave tabel bij
        Schema::create('problem',function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('name',100);
        });
        
        //een kaartlaag is nu gekoppeld aan een gidssoort of opgave
        Schema::table('layers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100);
            $table->string('title', 100);
            $table->unsignedBigInteger('municipality_id');
            $table->unsignedBigInteger('guidespecie_id');
            $table->unsignedBigInteger('problem_id');
            $table->timestamps();

            $table->foreign('municipality_id')->references('id')->on('municipalities')->onDelete('cascade');
            $table->foreign('guidespecie_id')->references('id')->on('guide_species')->onDelete('cascade');
            $table->foreign('problem_id')->references('id')->on('problem')->onDelete('cascade');
        });   

        //de antwoorden van een vraag zijn nu gekoppeld aan een gidssoort of opgave
        Schema::table('question_answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('answer', 100);
            $table->unsignedBigInteger('question_id');
            $table->unsignedBigInteger('guidespecie_id');
            $table->unsignedBigInteger('problem_id');
            $table->timestamps();

            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->foreign('guidespecie_id')->references('id')->on('guide_species')->onDelete('cascade');
            $table->foreign('problem_id')->references('id')->on('problem')->onDelete('cascade');
        });

        //kaartenlagen worden gegenereerd op basis van gidssoort of opgave
        Schema::dropIfExists('layer_question_answer');
 
        //maatregelen zijn nu gekoppeld aan een gidssoort of opgave
        Schema::table('measures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100);
            $table->string('description', 300);
            $table->unsignedBigInteger('municipality_id');
            $table->unsignedBigInteger('guidespecie_id');
            $table->unsignedBigInteger('problem_id');
            $table->timestamps();

            $table->foreign('municipality_id')->references('id')->on('municipalities')->onDelete('cascade');
            $table->foreign('guidespecie_id')->references('id')->on('guide_species')->onDelete('cascade');
            $table->foreign('problem_id')->references('id')->on('problem')->onDelete('cascade');
        });
    }
}
