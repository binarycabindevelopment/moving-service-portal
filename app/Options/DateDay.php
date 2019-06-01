<?php

namespace App\Options;

use KilroyWeb\Options\BaseOption;

class DateDay extends BaseOption {

	public function getArray(){
        $items = [];
        for($i=1;$i<=32;$i++){
            $items[sprintf('%02d', $i)] = sprintf('%02d', $i);
        }
        return $items;
    }

}