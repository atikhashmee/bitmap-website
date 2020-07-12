<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProtfolioFaqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('protfolio_faqs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('protfolios_id')->unsigned();
            $table->foreign('protfolios_id')->references('id')->on('protfolios')->onDelete('cascade');
            $table->string('title', 200)->nullable();
            $table->mediumText('description')->nullable();
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
        Schema::dropIfExists('protfolio_faqs');
    }
}
