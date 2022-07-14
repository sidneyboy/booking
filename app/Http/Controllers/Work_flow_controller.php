<?php

namespace App\Http\Controllers;

use App\Models\Agent_user;
use App\Models\Customer;
use App\Models\Principal;
use App\Models\Inventory;
use App\Models\Customer_principal_price;
use App\Models\Sales_register;
use App\Models\Sales_order_details;
use App\Models\Sales_order;
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

        if ($sales_register) {
            foreach ($sales_register->sales_register_details_for_inventory_filter as $key => $data) {
                $registered_inventory[] = $data->inventory_id;
            }

            $sales_order_inventory =  Inventory::select('sku_type', 'description', 'sku_code', 'id')
                ->where('principal_id', $request->input('principal'))
                ->where('sku_type', $request->input('sku_type'))
                ->whereNotIn('id', $registered_inventory)
                ->get();

            return view('work_flow_show_inventory', [
                'sales_register' => $sales_register,
                'sales_order_inventory' => $sales_order_inventory,
            ])->with('customer_id', $request->input('customer'))
                ->with('principal_id', $request->input('principal'))
                ->with('sku_type', $request->input('sku_type'));
        } else {
            $sales_order_inventory =  Inventory::select('sku_type', 'description', 'sku_code', 'id')
                ->where('principal_id', $request->input('principal'))
                ->where('sku_type', $request->input('sku_type'))
                ->get();

            return view('work_flow_no_inventory', [
                'sales_order_inventory' => $sales_order_inventory,
            ])->with('customer_id', $request->input('customer'))
                ->with('principal_id', $request->input('principal'))
                ->with('sku_type', $request->input('sku_type'));
        }
    }

    public function work_flow_suggested_sales_order(Request $request)
    {
        //return $request->input();
        date_default_timezone_set('Asia/Manila');
        $date = date('Y-m-d');

        $new_sales_order_inventory_quantity = array_filter($request->input('new_sales_order_inventory_quantity'));

        return view('work_flow_suggested_sales_order', [
            'current_bo' => $request->input('current_bo'),
            'current_inventory_id' => $request->input('current_inventory_id'),
            'current_remaining_inventory' => $request->input('current_remaining_inventory'),
            'current_inventory_description' => $request->input('current_inventory_description'),
            'prev_delivered_inventory' => $request->input('prev_delivered_inventory'),
            'new_sales_order_inventory_id' => $request->input('new_sales_order_inventory_id'),
            'new_sales_order_inventory_quantity' => $new_sales_order_inventory_quantity,
            'new_sales_order_inventory_description' => $request->input('new_sales_order_inventory_description'),
        ])->with('date_delivered', $request->input('date_delivered'))
            ->with('principal_id', $request->input('principal_id'))
            ->with('customer_id', $request->input('customer_id'))
            ->with('sku_type', $request->input('sku_type'))
            ->with('date', $date);
    }

    public function work_flow_final_summary(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        $date = date('Y-m-d');
        $customer_principal_price = Customer_principal_price::select('price_level', 'customer_id', 'principal_id')
            ->where('customer_id', $request->input('customer_id'))
            ->where('principal_id', $request->input('principal_id'))
            ->first();

        $inventory_data = Inventory::select(
            'sku_type',
            'description',
            'sku_code',
            'id',
            'price_1',
            'price_2',
            'price_3',
            'price_4'
        )->whereIn('id', $request->input('sales_order_final_inventory_id'))
            ->get();


        $agent_user = Agent_user::select('agent_id', 'agent_name')->first();


        return view('work_flow_final_summary', [
            'sales_order_final_inventory_description' => $request->input('sales_order_final_inventory_description'),
            'sales_order_final_inventory_id' => $request->input('sales_order_final_inventory_id'),
            'sales_order_final_quantity' => $request->input('sales_order_final_quantity'),
            'inventory_data' => $inventory_data,
        ])->with('customer_principal_price', $customer_principal_price)
            ->with('principal_id', $request->input('principal_id'))
            ->with('customer_id', $request->input('customer_id'))
            ->with('agent_user', $agent_user)
            ->with('mode_of_transaction', $request->input('mode_of_transaction'))
            ->with('sku_type', $request->input('sku_type'))
            ->with('date', $date);
    }

    public function work_flow_no_inventory_proceed_to_final_summary(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        $date = date('Y-m-d');
        $customer_principal_price = Customer_principal_price::select('price_level', 'customer_id', 'principal_id')
            ->where('customer_id', $request->input('customer_id'))
            ->where('principal_id', $request->input('principal_id'))
            ->first();

        $new_sales_order_inventory_quantity = array_filter($request->input('new_sales_order_inventory_quantity'));

        $inventory_data = Inventory::select(
            'sku_type',
            'description',
            'sku_code',
            'id',
            'price_1',
            'price_2',
            'price_3',
            'price_4'
        )->whereIn('id', array_keys($new_sales_order_inventory_quantity))
            ->get();

        $agent_user = Agent_user::select('agent_id', 'agent_name')->first();

        return view('work_flow_no_inventory_proceed_to_final_summary', [
            'inventory_data' => $inventory_data,
            'new_sales_order_inventory_description' => $request->input('new_sales_order_inventory_description'),
            'new_sales_order_inventory_quantity' => $request->input('new_sales_order_inventory_quantity'),
        ])->with('customer_id', $request->input('customer_id'))
            ->with('principal_id', $request->input('principal_id'))
            ->with('customer_principal_price', $customer_principal_price)
            ->with('sku_type', $request->input('sku_type'))
            ->with('agent_user', $agent_user)
            ->with('date', $date)
            ->with('mode_of_transaction', $request->input('mode_of_transaction'));
    }

    public function work_flow_no_inventory_save(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        $date = date('Y-m-d');
        //return $request->input();
        $sales_order_save = new Sales_order([
            'customer_id' => $request->input('customer_id'),
            'principal_id' => $request->input('principal_id'),
            'mode_of_transaction' => $request->input('mode_of_transaction'),
            'sku_type' => $request->input('sku_type'),
            'total_amount' => $request->input('total_amount'),
            'agent_id' => $request->input('agent_id'),
        ]);

        $sales_order_save->save();

        foreach ($request->input('inventory_id') as $key => $data) {
            $sales_order_details_save = new Sales_order_details([
                'sales_order_id' => $sales_order_save->id,
                'inventory_id' => $data,
                'quantity' => $request->input('sales_order_quantity')[$data],
                'unit_price' => $request->input('unit_price')[$data],
                'sku_type' => $request->input('sku_type'),
            ]);

            $sales_order_details_save->save();
        }

        return 'saved';
    }
}
