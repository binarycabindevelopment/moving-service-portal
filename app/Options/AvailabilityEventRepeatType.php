<?php

namespace App\Options;

use KilroyWeb\Options\BaseOption;

class AvailabilityEventRepeatType extends BaseOption {

	public function getArray(){
        return [
            'daily' => 'Daily',
            'daily_no_weekends' => 'Daily (Without Weekends)',
            'weekly' => 'Weekly',
            'monthly' => 'Monthly',
            'yearly' => 'Yearly',
        ];
    }

}