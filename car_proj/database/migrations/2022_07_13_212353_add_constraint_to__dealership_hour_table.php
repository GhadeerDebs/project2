<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConstraintToDealershipHourTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dealership_hour', function (Blueprint $table) {
            // $table->foreign('dealership_id')->references('id')->on('dealership')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('hour_id')->references('id')->on('hours')->onUpdate('cascade')->onDelete('cascade');
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
                       $table->dropForeign('hour_id');

        });
    }
}
