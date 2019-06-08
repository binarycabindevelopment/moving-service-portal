<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use BinaryCabin\LaravelUUID\Traits\HasUUID;

class Lead extends Model
{

    use HasUUID;

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'full_name',
        'phone',
        'street_address_1',
        'street_address_2',
        'city',
        'state',
        'zipcode',
        'move_date_at',
        'home_type',
        'need_box_packing',
        'flights_of_stairs_to_door',
        'elevator',
        'need_parking_permit',
        'distance_from_truck_to_door',
        'additional_details',
        'furniture_options',
        'box_options',
    ];

}
