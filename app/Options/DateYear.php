<?php

namespace App\Options;

use KilroyWeb\Options\BaseOption;

class DateYear extends BaseOption {

	public function getArray(){
        $items = [];
        for($i=2019;$i<=date('Y')+1;$i++){
            $items[sprintf('%04d', $i)] = sprintf('%04d', $i);
        }
        return $items;
    }

}