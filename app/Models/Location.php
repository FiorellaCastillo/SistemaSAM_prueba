<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; 

class Location extends Model{

    use HasFactory;
    protected $fillable =[
        'location_name_id',
        'location_phone_number',
        'location_province_id',
        'location_address',

    ];
}