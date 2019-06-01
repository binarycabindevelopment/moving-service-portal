<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uuid');
            $table->string('name')->nullable();
            $table->float('adjustment_factor')->nullable();
            $table->float('maximum_hours_per_man')->nullable();
            $table->float('minimum_hours_per_man')->nullable();
            $table->float('travel_time')->nullable();
            $table->float('two_men_on_one_truck_price')->nullable();
            $table->float('three_men_on_one_truck_price')->nullable();
            $table->float('four_men_on_one_truck_price')->nullable();
            $table->float('five_men_on_one_truck_price')->nullable();
            $table->float('service_charge_rate')->nullable();
            $table->float('weight_limit_for_quote')->nullable();
            $table->float('mileage_limit_for_quote')->nullable();
            $table->boolean('allow_drive_time')->nullable();
            $table->boolean('allow_double_drive_time')->nullable();
            $table->float('truck_weight_limit')->nullable();
            $table->float('additional_truck_service_charge')->nullable();
            $table->float('premium_for_flights_of_stairs')->nullable();
            $table->float('premium_for_parking_restrictions')->nullable();
            $table->float('premium_for_parking_distance')->nullable();
            $table->float('premium_charges')->nullable();
            $table->float('premium_for_elevator')->nullable();
            $table->float('packing_charges')->nullable();
            $table->float('assembling_and_disassembling')->nullable();
            $table->boolean('availability_saturday')->nullable();
            $table->float('availability_saturday_rate_increase')->nullable();
            $table->boolean('availability_sunday')->nullable();
            $table->float('availability_sunday_rate_increase')->nullable();
            $table->boolean('availability_holiday')->nullable();
            $table->float('availability_holiday_rate_increase')->nullable();
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
        Schema::dropIfExists('rules');
    }
}
