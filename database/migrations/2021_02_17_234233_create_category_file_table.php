<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryFileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_file', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->foreignId('file_id')->references('id')->on('files')->onDelete('cascade');
            $table->foreignId('category_id')->references('id')->on('categories')->onDelete('cascade');            

            $table->timestamps();
        });
/*
        Schema::table('category_file', function($table) {
            
            $table->foreing('file_id')->references('id')->on('files');
            $table->foreing('category_id')->references('id')->on('categories');
        });*/
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_file');
    }
}
