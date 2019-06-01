<?php

use Illuminate\Database\Seeder;

class AvailabilityEventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $minModels = 5;
        for($i=0;$i<$minModels;$i++){
            $availabilityEvent = factory(\App\AvailabilityEvent::class)->create();
        }
    }
}
