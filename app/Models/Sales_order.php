<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales_order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'principal_id',
        'mode_of_transaction',
        'sku_type',
        'total_amount',
        'agent_id',
    ];
}
