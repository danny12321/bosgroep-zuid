<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMeasuresTable extends Migration
{
    public function up()
    {
        Schema::create('problem',function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('name',100);
        });
        
        Schema::update('layers', function (Blueprint $table) {
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


 
        
        Schema::update('measures', function (Blueprint $table) {
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
