<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExtensionRuleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extension_rule', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->foreignId('extension_id')->references('id')->on('extensions')->onDelete('cascade');
            $table->foreignId('rule_id')->references('id')->on('rules')->onDelete('cascade');            

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
        Schema::dropIfExists('extension_rule');
    }
}
