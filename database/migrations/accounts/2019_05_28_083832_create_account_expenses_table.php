<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccountExpensesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_expenses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('date');
            $table->string('paid_from_account');
            $table->string('amount');
            $table->string('expense_category');
            $table->string('expense_name')->nullable();
            $table->integer('vendor_id')->unsigned()->nullable();
            $table->integer('team_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned();
            $table->text('note')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('cascade');
            $table->foreign('team_id')->references('id')->on('team_members')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('project_id')->unsigned()->nullable(); 
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
        Schema::drop('account_expenses');
    }
}
