<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDepositesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deposites', function (Blueprint $table) {
            $table->increments('id');
            $table->string('date');
            $table->string('paid_to_account');
            $table->string('amount');
            $table->string('category');
            $table->integer('project_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned();
            $table->string('deposit_name')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('deposites');
    }
}
