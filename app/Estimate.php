<?php

namespace App;

use BinaryCabin\LaravelUUID\Traits\HasUUID;
use Illuminate\Database\Eloquent\Model;

class Estimate extends Model
{

    use HasUUID;

    protected $fillable = [
        'uuid',
        'source',
        'first_name',
        'last_name',
        'email',
        'phone',
        'pickup_address_street_1',
        'pickup_address_street_2',
        'pickup_address_city',
        'pickup_address_state',
        'pickup_address_zipcode',
        'destination_address_street_1',
        'destination_address_street_2',
        'destination_address_city',
        'destination_address_state',
        'destination_address_zipcode',
        'move_date_month',
        'move_date_day',
        'move_date_year',
        'home_type',
    ];

    public function getRuleAttribute(){
        //Find rate based on location and calendar? (//TODO)
        $pickupZipcode = $this->pickup_address_zipcode;
        $rule = \App\Rule::whereHas('locations', function($query) use($pickupZipcode){
            $query->where('zipcode',$pickupZipcode);
        })->first();
        return $rule;
    }

}
