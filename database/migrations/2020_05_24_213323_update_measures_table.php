<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMeasuresTable extends Migration
{
    public function up()
    {
        //er moet een opgave tabel bij
        Schema::create('problems',function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('name',100);
            $table->unsignedBigInteger('municipality_id');
            $table->timestamps();

            $table->foreign('municipality_id')->references('id')->on('municipalities')->onDelete('cascade');
        });
        
        //een kaartlaag is nu gekoppeld aan een gidssoort of opgave
        Schema::table('layers', function (Blueprint $table) {
            $table->unsignedBigInteger('guidespecie_id')->nullable();
            $table->unsignedBigInteger('problem_id')->nullable();

            $table->foreign('guidespecie_id')->references('id')->on('guide_species')->onDelete('cascade');
            $table->foreign('problem_id')->references('id')->on('problems')->onDelete('cascade');
        });   

        //de antwoorden van een vraag zijn nu gekoppeld aan een gidssoort of opgave
        Schema::table('question_answers', function (Blueprint $table) {

            $table->unsignedBigInteger('guidespecie_id')->nullable();
            $table->unsignedBigInteger('problem_id')->nullable();

            $table->foreign('guidespecie_id')->references('id')->on('guide_species')->onDelete('cascade');
            $table->foreign('problem_id')->references('id')->on('problems')->onDelete('cascade');
        });

        //kaartenlagen worden gegenereerd op basis van gidssoort of opgave
        Schema::dropIfExists('layer_question_answer');
 
        //maatregelen zijn nu gekoppeld aan een gidssoort of opgave
        Schema::table('measures', function (Blueprint $table) {

            $table->unsignedBigInteger('guidespecie_id')->nullable();
            $table->unsignedBigInteger('problem_id')->nullable();

            $table->foreign('guidespecie_id')->references('id')->on('guide_species')->onDelete('cascade');
            $table->foreign('problem_id')->references('id')->on('problems')->onDelete('cascade');
        });
    }
    public function down(){
        Schema::dropIfExists('problem');
    }
}
