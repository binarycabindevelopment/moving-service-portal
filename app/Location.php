<?php

namespace App;

use BinaryCabin\LaravelUUID\Traits\HasUUID;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasUUID;

    protected $fillable = [
        'uuid',
        'rule_id',
        'city',
        'state',
        'zipcode',
    ];
}
