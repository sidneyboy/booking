<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales_register extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'export_code',
        'total_amount',
        'dr',
        'date_delivered',
        'principal_id',
        'status'
    ];
}
