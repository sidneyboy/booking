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

    public function sales_register_details()
    {
      return $this->hasMany('App\Models\Sales_register_details', 'sales_register_id');
    }

    public function sales_register_details_for_inventory_filter()
    {
      return $this->hasMany('App\Models\Sales_register_details', 'sales_register_id')->select('inventory_id');
    }
}
