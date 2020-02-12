<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoogleAnalyticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('google_analytics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('project_id');
            $table->string('landing_page_path')->nullable();
            $table->integer('sessions')->nullable();
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
        Schema::dropIfExists('google_analytics');
    }
}
