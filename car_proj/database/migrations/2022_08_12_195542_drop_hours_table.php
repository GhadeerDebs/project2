<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
                  Schema::dropIfExists('hours');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          Schema::create('hours', function (Blueprint $table) {
            $table->id();
            $table->time('startTime');
            $table->enum('status', ['true','false'])->default('false');
            $table->timestamps();
        });
    }
}

