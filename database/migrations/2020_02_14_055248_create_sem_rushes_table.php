<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSemRushesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sem_rushes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('project_id');
            $table->string('keyword')->nullable();
            $table->integer('position')->nullable();
            $table->integer('previous_position')->nullable();
            $table->integer('search_volume')->nullable();
            $table->float('keyword_difficulty')->nullable();
            $table->float('cpc')->nullable();
            $table->string('url')->nullable();
            $table->integer('traffic')->nullable();
            $table->float('traffic_percentage')->nullable();
            $table->integer('traffic_cost')->nullable();
            $table->float('competition')->nullable();
            $table->bigInteger('number_of_results')->nullable();
            $table->longText('trends')->nullable();
            $table->string('timestamp')->nullable();
            $table->string('serp_features_by_keyword')->nullable();
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
        Schema::dropIfExists('sem_rushes');
    }
}
