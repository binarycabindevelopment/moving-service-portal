<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRateIdToAvailabilityEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('availability_events', function (Blueprint $table) {
            $table->unsignedInteger('rule_id')->nullable();
            $table->float('rule_increase_percentage')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('availability_events', function (Blueprint $table) {
            //
        });
    }
}
