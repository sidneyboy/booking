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
        'status',
    ];

    public function principal()
    {
        return $this->belongsTo('App\Models\Principal', 'principal_id');
    }

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer', 'customer_id');
    }
}
