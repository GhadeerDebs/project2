<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisement', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['Sedan','Minivan','Jeep','MiniJeep','Coupe','SUV','Sports_sedan']);
            $table->integer('engine_capacity');
            $table->integer('engine_power');
            $table->enum('drivetrain', ['frontWHeelDrive','rearwheelDrive']);
            $table->integer('weight');
            $table->enum('gearbox', ['automatic','manual']);
            $table->string('color');
            $table->timestamps();
            $table->unsignedBigInteger('dealership_id');
            $table->foreign('dealership_id')->references('id')->on('dealership')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('model_id');
            $table->foreign('model_id')->references('id')->on('model')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advertisement');
    }
}
