<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTreasuresTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treasures', function (Blueprint $table) {
            $table->increments('id');
            $table->string('account_name');
            $table->string('account_number');
            $table->string('branch_location')->nullable();
            $table->string('account_type')->nullable();
            $table->string('accoutn_status')->nullable();
            $table->string('opening_balance', 100)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('treasures');
    }
}
