<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_members', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('team_types_id');
            $table->foreign('team_types_id')->references('id')->on('team_types')->onDelete('cascade');
            $table->string('visibility', 200)->nullable();
            $table->string('employee_status', 200)->nullable();
            $table->string('member_name', 200);
            $table->string('designation', 200)->nullable();
            $table->mediumText('description')->nullable();
            $table->string('email', 100)->nullable();
            $table->string('linkedin', 100)->nullable();
            $table->string('twitter', 100)->nullable();
            $table->string('instagram', 100)->nullable();
            $table->string('memberimage', 200)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('team_members');
    }
}
