<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccountCategoriesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Category');
            $table->string('description')->nullable();
            $table->string('balance')->nullable();
            $table->nestedSet();
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
        $table->dropNestedSet();
        Schema::drop('account_categories');
    }
}
