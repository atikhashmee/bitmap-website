<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProjectVendorsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_vendors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_task_id')->unsigned();
            $table->integer('vendor_id')->unsigned();
            $table->integer('project_id')->unsigned();
            $table->string('budget')->nullable();
            $table->string('payment_type');
            $table->text('extra_requirement')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('project_task_id')->references('id')->on('project_tasks')->onDelete('cascade');
            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('cascade');
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
        Schema::drop('project_vendors');
    }
}
