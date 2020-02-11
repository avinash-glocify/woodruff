<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('url');
            $table->string('sitemap')->nullable();
            $table->string('landing_page_path')->nullable();
            $table->bigInteger('sessions')->nullable();
            $table->float('change_sessions')->nullable();
            $table->float('goal_conversion_rate_all_goals')->nullable();
            $table->float('change_goal_conversion_rate_all_goals')->nullable();
            $table->float('transaction_revenue')->nullable();
            $table->float('change_transaction_revenue')->nullable();
            $table->float('ecommerce_conversion_rate')->nullable();
            $table->float('change_ecommerce_conversion_rate')->nullable();
            $table->float('bounce_rate')->nullable();
            $table->float('change_bounce_rate')->nullable();
            $table->float('avg_time_on_page')->nullable();
            $table->float('change_avg_time_on_page')->nullable();
            $table->integer('impressions')->nullable();
            $table->float('clicks')->nullable();
            $table->float('ctr')->nullable();
            $table->float('average_position')->nullable();
            $table->string('keyword')->nullable();
            $table->integer('position')->nullable();
            $table->integer('previous_position')->nullable();
            $table->integer('search_volume')->nullable();
            $table->float('keyword_difficulty')->nullable();
            $table->float('cpc')->nullable();
            $table->float('traffic')->nullable();
            $table->float('traffic_cost')->nullable();
            $table->float('competition')->nullable();
            $table->bigInteger('number_of_results')->nullable();
            $table->text('trends')->nullable();
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
        Schema::dropIfExists('project_details');
    }
}
