<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProjectsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('project_title');
            $table->integer('client_id')->unsigned();
            $table->foreign('client_id')->references('id')->on('clients_lists')->onDelete('cascade');
            $table->string('location');
            $table->string('contact_number');
            $table->string('status');
            $table->string('budget');
            $table->string('project_budget_status', 100)->nullable();
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
        Schema::drop('projects');
    }
}
