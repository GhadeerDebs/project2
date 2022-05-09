<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMakeYearsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('make_years', function (Blueprint $table) {
            $table->id();
            $table->year('year');
            $table->unsignedBigInteger('make_id');
            $table->foreign('make_id')->references('id')->on('make')->onUpdate('cascade')->onDelete('cascade');
            
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('make_years');
    }
}
