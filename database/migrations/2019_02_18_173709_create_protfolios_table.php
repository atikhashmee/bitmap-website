<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProtfoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('protfolios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('protfolio_categories_id')->unsigned();
            $table->foreign('protfolio_categories_id')->references('id')->on('protfolio_categories')->onDelete('cascade');
            $table->string('project_title', 100)->nullable();
            $table->mediumText('about_project')->nullable();
            $table->longText('description_project')->nullable();
            $table->dateTime('date')->nullable();
            $table->string('client_name', 100)->nullable();
            $table->mediumText('project_location')->nullable();
            $table->string('video_url', 100)->nullable();
            $table->mediumText('video_description')->nullable();
            $table->string('project_cover_photo', 100)->nullable();
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
        Schema::dropIfExists('protfolios');
    }
}
