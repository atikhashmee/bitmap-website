<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProjectLoanPaymentsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_loan_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('loans_id')->unsigned();
            $table->integer('project_id')->unsigned();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->string('date');
            $table->string('amount');
            $table->string('remarks')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('loans_id')->references('id')->on('project_loands')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('project_loan_payments');
    }
}
