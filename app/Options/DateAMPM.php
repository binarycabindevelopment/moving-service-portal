<?php

namespace App\Options;

use KilroyWeb\Options\BaseOption;

class DateAMPM extends BaseOption {

	public function getArray(){
        return [
            'AM'=>'AM',
            'PM'=>'PM',
        ];
    }

}