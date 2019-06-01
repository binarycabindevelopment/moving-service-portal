<?php

namespace App\Options;

use KilroyWeb\Options\BaseOption;

class AvailabilityEventType extends BaseOption {

	public function getArray(){
        return [
            'base'=>'Base Rate',
            'block'=>'Rate Block'
        ];
    }

}