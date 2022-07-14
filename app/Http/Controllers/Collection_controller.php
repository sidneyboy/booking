<?php

namespace App\Http\Controllers;

use App\Models\Agent_user;
use App\Models\Sales_register;
use Illuminate\Http\Request;

class Collection_controller extends Controller
{
    public function index()
    {
        $agent_user = Agent_user::first();
        $sales_register_customer = Sales_register::groupBy('customer_id')->get();
        return view('collection', [
            'sales_register_customer' => $sales_register_customer,
        ])->with('active', 'collection')
            ->with('agent_user', $agent_user); asdasd
    }
}
