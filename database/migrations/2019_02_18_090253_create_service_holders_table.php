<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceHoldersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_holders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('service_name', 200)->nullable();
            $table->mediumText('about_service')->nullable();
            $table->longText('long_about_sevice')->nullable();
            $table->string('date_time',100)->nullable();
            $table->integer('price')->unsigned()->nullable();
            $table->string('services_photo', 200)->nullable();
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
        Schema::dropIfExists('service_holders');
    }
}
