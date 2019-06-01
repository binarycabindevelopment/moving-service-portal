<?php

namespace App\Options;

use KilroyWeb\Options\BaseOption;

class DateMinute extends BaseOption {

	public function getArray(){
        return [
            '00' => '00',
            '15' => '15',
            '30' => '30',
            '45' => '45',
        ];
    }

}