<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaysaleriesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paysaleries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('date');
        
            $table->integer('employee_id')->unsigned();
            $table->string('payamount');
            $table->string('token')->nullable();
            $table->timestamps();
            $table->softDeletes();
        
            $table->foreign('employee_id')->references('id')->on('team_members')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('paysaleries');
    }
}
