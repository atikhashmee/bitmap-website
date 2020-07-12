<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProtfolioImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('protfolio_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('protfolios_id')->unsigned();
            $table->foreign('protfolios_id')->references('id')->on('protfolios')->onDelete('cascade');
            $table->string('images', 200)->nullable();
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
        Schema::dropIfExists('protfolio_images');
    }
}
