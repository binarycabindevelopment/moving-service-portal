<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uuid');
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('full_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('street_address_1')->nullable();
            $table->string('street_address_2')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zipcode')->nullable();
            $table->dateTime('move_date_at')->nullable();
            $table->string('home_type')->nullable();
            $table->string('need_box_packing')->nullable();
            $table->string('flights_of_stairs_to_door')->nullable();
            $table->string('elevator')->nullable();
            $table->string('need_parking_permit')->nullable();
            $table->string('distance_from_truck_to_door')->nullable();
            $table->text('additional_details')->nullable();
            $table->text('furniture_options')->nullable();
            $table->text('box_options')->nullable();
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
        Schema::dropIfExists('leads');
    }
}
