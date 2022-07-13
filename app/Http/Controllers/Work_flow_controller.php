<?php

namespace App\Http\Controllers;

use App\Models\Agent_user;
use App\Models\Customer;
use App\Models\Principal;
use App\Models\Inventory;
use App\Models\Customer_principal_price;
use App\Models\Customer_principal_code;
use App\Models\Sales_register;
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


        $sales_register = Sales_register::select('id', 'date_delivered')
            ->where('customer_id', $request->input('customer'))
            ->where('principal_id', $request->input('principal'))
            ->where('sku_type', $request->input('sku_type'))
            ->latest()
            ->first();

        foreach ($sales_register->sales_register_details_for_inventory_filter as $key => $data) {
            $registered_inventory[] = $data->inventory_id;
        }

        // $prev_inventory = Inventory::select('sku_type', 'description', 'sku_code', 'id')
        //     ->whereIn('id', $registered_inventory)
        //     ->get();

        $sales_order_inventory =  Inventory::select('sku_type', 'description', 'sku_code', 'id')
            ->where('principal_id', $request->input('principal'))
            ->where('sku_type', $request->input('sku_type'))
            ->whereNotIn('id', $registered_inventory)
            ->get();

        return view('work_flow_show_inventory', [
            'sales_register' => $sales_register,
            'sales_order_inventory' => $sales_order_inventory,
        ])->with('customer_id', $request->input('customer'))
            ->with('principal_id', $request->input('principal'));
    }

    public function work_flow_suggested_sales_order(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        $date = date('Y-m-d');
        //return $request->input();
        // $order_data = array_filter($request->input('sales_order_quantity'));
        // $bo_data = array_filter($request->input('bo'));
        // $remaining_data = array_filter($request->input('remaining'));
        // $inventory_data = array_filter($request->input('inventory_id'));
        // $sales_order_inventory_data = array_filter($request->input('sales_order_inventory'));


        // $sales_register = Sales_register::where('customer_id', $request->input('customer_id'))
        //     ->where('principal_id', $request->input('principal_id'))
        //     ->latest()
        //     ->first();

        return view('work_flow_suggested_sales_order', [
            // 'sales_register' => $sales_register,
            'current_bo' => $request->input('current_bo'),
            'current_inventory_id' => $request->input('current_inventory_id'),
            'current_remaining_inventory' => $request->input('current_remaining_inventory'),
            'current_inventory_description' => $request->input('current_inventory_description'),
            'prev_delivered_inventory' => $request->input('prev_delivered_inventory'),
        ])->with('date_delivered', $request->input('date_delivered'))
          ->with('date', $date);
    }
}
