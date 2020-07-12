<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsListsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_name');
            $table->string('quantity')->nullable();
            $table->integer('unit_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->string('price');
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('unit_id')->references('id')->on('product_units')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('product_categories')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products_lists');
    }
}
