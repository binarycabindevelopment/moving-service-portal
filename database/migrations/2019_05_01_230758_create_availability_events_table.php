<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvailabilityEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('availability_events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uuid');
            $table->string('type')->nullable();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_all_day')->nullable();
            $table->boolean('is_repeatable')->nullable();
            $table->dateTime('start_at')->nullable();
            $table->dateTime('end_at')->nullable();
            $table->string('repeat_type')->nullable();
            $table->dateTime('repeat_end_at')->nullable();
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
        Schema::dropIfExists('availability_events');
    }
}
