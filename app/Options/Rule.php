<?php

namespace App\Options;

use KilroyWeb\Options\BaseOption;

class Rule extends BaseOption {

	public function getArray(){
	    $items = [];
	    $rules = \App\Rule::get();
	    foreach($rules as $rule){
	        $items[$rule->id] = $rule->name;
        }
        return $items;
    }

}