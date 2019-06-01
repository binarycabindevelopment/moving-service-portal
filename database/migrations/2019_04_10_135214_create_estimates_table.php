<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstimatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estimates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uuid');
            $table->string('source')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('pickup_address_street_1')->nullable();
            $table->string('pickup_address_street_2')->nullable();
            $table->string('pickup_address_city')->nullable();
            $table->string('pickup_address_state')->nullable();
            $table->string('pickup_address_zipcode')->nullable();
            $table->string('destination_address_street_1')->nullable();
            $table->string('destination_address_street_2')->nullable();
            $table->string('destination_address_city')->nullable();
            $table->string('destination_address_state')->nullable();
            $table->string('destination_address_zipcode')->nullable();
            $table->string('move_date_month')->nullable();
            $table->string('move_date_day')->nullable();
            $table->string('move_date_year')->nullable();
            $table->string('home_type')->nullable();
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
        Schema::dropIfExists('estimates');
    }
}
