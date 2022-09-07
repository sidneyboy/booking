<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer_export extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_name',
        'contact_person',
        'contact_number',
        'location',
        'location_id',
        'detailed_address',
        'coordinates',
        'longitude',
        'latitude',
        'kob',
        'status',
    ];
}
