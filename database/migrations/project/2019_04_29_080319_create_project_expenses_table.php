<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProjectExpensesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_expenses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('expense_id')->unsigned();
            $table->integer('project_id')->unsigned();
            $table->string('date');
            $table->string('amount')->nullable();
            $table->text('description')->nullable();
            $table->string('carrier')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('expense_id')->references('id')->on('expense_types')->onDelete('cascade');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('project_expenses');
    }
}
