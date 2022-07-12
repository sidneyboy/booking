<?php

namespace App\Http\Controllers;

use App\Models\Agent_user;
use App\Models\Customer;
use App\Models\Principal;
use App\Models\Inventory;
use App\Models\Customer_principal_price;
use App\Models\Customer_principal_code;
use Illuminate\Http\Request;

class Work_flow_controller extends Controller
{
    public function index()
    {
        $agent_user = Agent_user::first();
        $customer = Customer::select('id', 'store_name')->get();
        $principal = Principal::select('id', 'principal')->where('principal', '!=', 'NONE')->get();

        return view('work_flow', [
            'customer' => $customer,
            'principal' => $principal,
        ])->with('active', 'work_flow')
            ->with('agent_user', $agent_user);
    }

    public function work_flow_show_inventory(Request $request)
    {
        $customer = Customer::select('store_name', 'credit_limit', 'id')->find($request->input('customer'));

        $customer_principal_price = Customer_principal_price::select('price_level')
            ->where('customer_id', $request->input('customer'))
            ->where('principal_id', $request->input('principal'))
            ->first();

        $customer_principal_code = Customer_principal_code::select('store_code')
            ->where('customer_id', $request->input('customer'))
            ->where('principal_id', $request->input('principal'))
            ->first();


        $inventory = Inventory::select('sku_type','description','sku_code','id')->where('principal_id', $request->input('principal'))
            ->where('sku_type', $request->input('sku_type'))
            ->where('running_balance', '!=', 0)
            ->get();

        return view('work_flow_show_inventory',[
            'customer' => $customer,
            'customer_principal_price' => $customer_principal_price,
            'customer_principal_code' => $customer_principal_code,
            'inventory' => $inventory,
        ]);
    }

    public function work_flow_suggested_sales_order(Request $request)
    {
        return $request->input();
    }
}
