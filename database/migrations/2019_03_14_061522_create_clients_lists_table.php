<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Compnay_name', 100)->nullable();
            $table->string('phone_number', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->mediumText('address')->nullable();
            $table->string('avater', 100)->nullable();
            $table->boolean('status')->nullable()->default(false);
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
        Schema::dropIfExists('clients_lists');
    }
}
