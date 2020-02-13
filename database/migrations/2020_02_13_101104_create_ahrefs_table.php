<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAhrefsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ahrefs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('project_id');
            $table->integer('ahref_number')->nullable();
            $table->integer('domain_rating')->nullable();
            $table->integer('url_rating_desc')->nullable();
            $table->integer('referring_domains')->nullable();
            $table->string('referring_page_url')->nullable();
            $table->string('referring_page_title')->nullable();
            $table->integer('internal_links_count')->nullable();
            $table->integer('external_links_count')->nullable();
            $table->string('link_url')->nullable();
            $table->string('textpre')->nullable();
            $table->string('link_anchor')->nullable();
            $table->string('textpost')->nullable();
            $table->string('type')->nullable();
            $table->string('backlink_status')->nullable();
            $table->string('first_seen')->nullable();
            $table->string('last_check')->nullable();
            $table->string('day_lost')->nullable();
            $table->string('language')->nullable();
            $table->integer('traffic')->nullable();
            $table->integer('keywords')->nullable();
            $table->integer('js_rendered')->nullable();
            $table->integer('linked_domains')->nullable();
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
        Schema::dropIfExists('ahrefs');
    }
}
