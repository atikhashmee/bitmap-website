<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmployeeLoansTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_loans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('date');
            $table->integer('employee_id')->unsigned();
            $table->string('amount');
            $table->text('purpose')->nullable();
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
        Schema::drop('employee_loans');
    }
}
