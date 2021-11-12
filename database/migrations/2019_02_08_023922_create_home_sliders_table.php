<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomeSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_sliders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slider_Title', 200)->nullable();
            $table->longText('slider_Description')->nullable();
            $table->string('project_url', 100)->nullable();
            $table->date('project_date')->nullable();
            $table->string('image_link', 200)->nullable();
            $table->string('visibilty', 200)->nullable();
            $table->integer('image_order')->default(0);
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
        Schema::dropIfExists('home_sliders');
    }
}
