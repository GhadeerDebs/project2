<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdvIdToAppointmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('appoinement', function (Blueprint $table) {
            $table->unsignedBigInteger('adv_id')->nullable();
            $table->foreign('adv_id')->references('id')->on('advertisement')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('appoinement', function (Blueprint $table) {
            //
        });
    }
}
