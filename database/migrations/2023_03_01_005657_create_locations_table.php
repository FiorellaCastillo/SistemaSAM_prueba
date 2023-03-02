<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('location_name_id')->unsigned();
            $table->string('location_phone_number');
            $table->bigInteger('location_province_id')->unsigned();
            $table->string('location_address');
            $table->foreign('location_name_id')->references('id')->on ('companies');
            $table->foreign('location_province_id')->references('id')->on ('provinces');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locations');
    }
};
