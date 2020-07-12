<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExpendituresTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenditures', function (Blueprint $table) {
            $table->increments('id');
            $table->string('date');
            $table->integer('expense_id')->unsigned();
            $table->string('is_employee');
            $table->integer('employee_id')->unsigned()->nullable();
            $table->string('amount');
            $table->text('description')->nullable();
            $table->string('token')->nullable();
            $table->timestamps();   
            $table->softDeletes();
            $table->foreign('expense_id')->references('id')->on('expense_types')->onDelete('cascade');
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
        Schema::drop('expenditures');
    }
}
