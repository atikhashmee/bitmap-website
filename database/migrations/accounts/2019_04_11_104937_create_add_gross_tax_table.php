<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddGrossTaxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('paysaleries', function (Blueprint $table) {
              $table->string('tax', 100)->nullable()->after('payamount');
              $table->string('loan', 100)->nullable()->after('tax');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('paysaleries', function (Blueprint $table) {
            $table->dropColumn('tax');
            $table->dropColumn('loan');
        });
    }
}
