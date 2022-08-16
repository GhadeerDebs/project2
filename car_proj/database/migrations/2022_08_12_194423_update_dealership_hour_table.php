<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDealershipHourTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dealership_hour', function (Blueprint $table) {
            $table->time('startTime');
         $table->enum('status', ['true','false'])->default('false');
            $table->dropForeign('dealership_hour_hour_id_foreign');
           $table->dropColumn('hour_id');

         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('dealership_hour', function (Blueprint $table) {
            $table->dropColumn('startTime');
            $table->dropColumn('status');
            $table->unsignedBigInteger('hour_id')->unsigned();
         });
    }
}





