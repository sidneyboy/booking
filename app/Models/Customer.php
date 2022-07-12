<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

     protected $fillable = [
        'id',
        'location_id',
        'store_name',
        'credit_limit',
    ];

    public function customer_principal_price()
    {
      return $this->hasMany('App\Models\Customer_principal_price', 'customer_id');
    }

    public function customer_principal_code()
    {
      return $this->hasMany('App\Models\Customer_principal_code', 'customer_id');
    }
}
