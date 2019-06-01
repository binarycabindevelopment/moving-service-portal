<?php

namespace App;

use BinaryCabin\LaravelUUID\Traits\HasUUID;
use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{

    use HasUUID;

    protected $fillable = [
        'uuid',
        'name',
        'adjustment_factor',
        'maximum_hours_per_man',
        'minimum_hours_per_man',
        'travel_time',
        'two_men_on_one_truck_price',
        'three_men_on_one_truck_price',
        'four_men_on_one_truck_price',
        'five_men_on_one_truck_price',
        'service_charge_rate',
        'weight_limit_for_quote',
        'mileage_limit_for_quote',
        'allow_drive_time',
        'allow_double_drive_time',
        'truck_weight_limit',
        'additional_truck_service_charge',
        'premium_for_flights_of_stairs',
        'premium_for_parking_restrictions',
        'premium_for_parking_distance',
        'premium_charges',
        'premium_for_elevator',
        'packing_charges',
        'assembling_and_disassembling',
        'availability_saturday',
        'availability_saturday_rate_increase',
        'availability_sunday',
        'availability_sunday_rate_increase',
        'availability_holiday',
        'availability_holiday_rate_increase',
    ];

    public function locations(){
        return $this->hasMany(\App\Location::class,'rule_id');
    }
}
