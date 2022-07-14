<?php

namespace App\Http\Controllers;

use App\Models\Agent_user;
use App\Models\Sales_register;
use App\Models\Sales_order;
use App\Models\Customer;
use Illuminate\Http\Request;

class Collection_controller extends Controller
{
    public function index()
    {
        $agent_user = Agent_user::first();
        $customer = Customer::select('id', 'store_name')->get();
        return view('collection', [
            'customer' => $customer,
        ])->with('active', 'collection')
            ->with('agent_user', $agent_user);
    }

    public function collection_generate_customer_payables(Request $request)
    {
        $sales_register = Sales_register::select('dr', 'date_delivered', 'principal_id', 'status', 'total_amount','sku_type')->where('customer_id', $request->input('customer_id'))
            ->where('status', '!=', 'paid')
            ->get();

        $sales_order = Sales_order::select('total_amount','principal_id','sku_type','status')->where('customer_id', $request->input('customer_id'))
            ->where('status', '!=', 'paid')
            ->get();

        return view('collection_generate_customer_payables', [
            'sales_register' => $sales_register,
            'sales_order' => $sales_order,
        ]);
    }
}
