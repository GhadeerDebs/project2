<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealershipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dealership', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('location');
            $table->integer('phone');
            $table->string('dealer_photo_path', 2048)->nullable();
            $table->timestamps();
        });
          DB::table('dealership')->insert(

             array(
                'name'     => 'Al saadeh',
                'location' => 'دمشق,مساكن برزة مقابل كلية الشرطة',
                'phone'    => '0942281129',
             )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dealership');
    }
}
