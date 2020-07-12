<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_forms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('contact_heading', 100)->nullable();
            $table->mediumText('little_description')->nullable();
            $table->string('email', 100)->nullable();
            $table->string('cell', 100)->nullable();
            $table->string('website', 100)->nullable();
            $table->mediumText('address')->nullable();
            $table->string('go_location', 100)->nullable();
            $table->string('note_on_go_location', 100)->nullable();
            $table->string('contact_image', 200)->nullable();
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
        Schema::dropIfExists('contact_forms');
    }
}
