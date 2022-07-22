<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'principal',
        'total_amount',
        'amount_paid',
        'mode_of_transaction',
        'dr',
        'sku_type',
        'balance',
        'exported',
        'remarks',
        'total_bo',
    ];

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer', 'customer_id');
    }
}
