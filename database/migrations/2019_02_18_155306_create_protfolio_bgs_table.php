<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProtfolioBgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('protfolio_bgs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bg_title', 100)->nullable();
            $table->mediumText('bg_description')->nullable();
            $table->string('bg_image', 100)->nullable();
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
        Schema::dropIfExists('protfolio_bgs');
    }
}
