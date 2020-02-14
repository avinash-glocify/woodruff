<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScreamingFrogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('screaming_frogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('project_id');
            $table->string('address')->nullable();
            $table->string('content')->nullable();
            $table->integer('status_code')->nullable();
            $table->string('status')->nullable();
            $table->string('indexability')->nullable();
            $table->string('indexability_status')->nullable();
            $table->string('title_1')->nullable();
            $table->integer('title_1_length')->nullable();
            $table->integer('title_1_pixel_width')->nullable();
            $table->string('meta_description_1')->nullable();
            $table->integer('meta_description_1_length')->nullable();
            $table->integer('meta_description_1_pixel_width')->nullable();
            $table->string('meta_keyword_1')->nullable();
            $table->integer('meta_keywords_1_length')->nullable();
            $table->string('h1_1')->nullable();
            $table->integer('h1_1_length')->nullable();
            $table->string('h1_2')->nullable();
            $table->integer('h1_2_length')->nullable();
            $table->string('h2_1')->nullable();
            $table->integer('h2_1_length')->nullable();
            $table->string('h2_2')->nullable();
            $table->integer('h2_2_length')->nullable();
            $table->string('meta_robots_1')->nullable();
            $table->string('x_robots_tag_1')->nullable();
            $table->string('meta_refresh_1')->nullable();
            $table->string('canonical_link_element_1')->nullable();
            $table->string('relnext_1')->nullable();
            $table->string('relprev_1')->nullable();
            $table->string('http_relnext_1')->nullable();
            $table->string('http_relprev_1')->nullable();
            $table->integer('size_bytes')->nullable();
            $table->integer('word_count')->nullable();
            $table->float('text_ratio')->nullable();
            $table->integer('crawl_depth')->nullable();
            $table->integer('link_score')->nullable();
            $table->integer('inlinks')->nullable();
            $table->integer('unique_inlinks')->nullable();
            $table->float('percentage_of_total')->nullable();
            $table->integer('outlinks')->nullable();
            $table->integer('unique_outlinks')->nullable();
            $table->integer('external_outlinks')->nullable();
            $table->integer('unique_external_outlinks')->nullable();
            $table->string('hash')->nullable();
            $table->float('response_time')->nullable();
            $table->string('last_modified')->nullable();
            $table->string('redirect_url')->nullable();
            $table->string('redirect_type')->nullable();
            $table->string('url_encoded_address')->nullable();
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
        Schema::dropIfExists('screaming_frogs');
    }
}
