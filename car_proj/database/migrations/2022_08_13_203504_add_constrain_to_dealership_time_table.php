<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConstrainToDealershipTimeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dealership_time', function (Blueprint $table) {
           $table->foreign('dealership_id')->references('id')->on('dealership')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dealership_time', function (Blueprint $table) {
            $table->dropForeign('dealership_time_dealership_id_foreign');
           $table->dropColumn('dealership_id');
        });
    }
}
