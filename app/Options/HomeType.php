<?php

namespace App\Options;

use KilroyWeb\Options\BaseOption;

class HomeType extends BaseOption {

	public function getArray(){
	    return $this->keysAsValues([
            'Studio',
            '1 Bedroom Apartment',
            '1 Bedroom Home',
            '2 Bedroom Apartment',
            '2 Bedroom Home',
            '3 Bedroom Home',
            '4 Bedroom Home',
            '5+ Bedroom Home',
        ]);
    }

}