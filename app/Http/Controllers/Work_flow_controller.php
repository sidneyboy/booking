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
use App\Models\Bad_order;
use App\Models\Bad_order_details;
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

    public function work_flow_check_customer_sales_order_status(Request $request)
    {
        $customer_allowed_number_of_sales_order = Customer::select('allowed_number_of_sales_order')->find($request->input('customer'));

        if ($customer_allowed_number_of_sales_order->allowed_number_of_sales_order == 0) {
            $sales_order_count = Sales_register::where('customer_id', $request->input('customer'))
                ->where('status', '!=', 'paid')
                ->count();

            $sales_register_count = Sales_order::where('customer_id', $request->input('customer'))
                ->count();

            if ($sales_order_count + $sales_register_count != 0) {
                return 'maximum_allowed_sales_order_consumed';
            } else {
                return 'procced';
            }
        } else {
            $sales_order_count = Sales_register::where('customer_id', $request->input('customer'))
                ->where('status', '!=', 'paid')
                ->count();

            $sales_register_count = Sales_order::where('customer_id', $request->input('customer'))
                ->count();

            if ($sales_order_count + $sales_register_count < $customer_allowed_number_of_sales_order->allowed_number_of_sales_order) {
                return 'proceed';
            } else {
                return 'maximum_allowed_sales_order_consumed';
            }
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
            'current_inventory_unit_price' => $request->input('current_inventory_unit_price'),
            'sales_register_id' => $request->input('sales_register_id'),
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
        $time = date('h:i:s a');
        $date_receipt = date('Y-m');

        $customer_principal_price = Customer_principal_price::select('price_level', 'customer_id', 'principal_id')
            ->where('customer_id', $request->input('customer_id'))
            ->where('principal_id', $request->input('principal_id'))
            ->first();

        $agent_user = Agent_user::select('agent_name', 'agent_id')->first();

        $bad_order_data = Bad_order::select('pcm_number')->latest()->first();

        if (!is_null($bad_order_data)) {
            $var_explode = explode('-', $bad_order_data->pcm_number);
            $year_and_month = $var_explode[3] . "-" . $var_explode[4];
            $series = $var_explode[5];


            if ($date_receipt != $year_and_month) {
                $pcm_number = "PCM-" . $agent_user->agent_name . "-" . $agent_user->agent_id . "-" . $date_receipt  . "-0001";
            } else {
                $pcm_number = "PCM-" . $agent_user->agent_name . "-" . $agent_user->agent_id . "-" . $date_receipt . "-" . str_pad($series + 1, 4, 0, STR_PAD_LEFT);
            }
        } else {
            $pcm_number = "PCM-" . $agent_user->agent_name . "-" . $agent_user->agent_id . "-" . $date_receipt  . "-0001";
        }



        $inventory_data = Inventory::select(
            'sku_type',
            'description',
            'sku_code',
            'id',
            'uom',
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
            'pcm_number' => strtoupper($pcm_number),


            'current_inventory_description' => $request->input('current_inventory_description'),
            'current_inventory_unit_price' => $request->input('current_inventory_unit_price'),
            'current_bo' => $request->input('current_bo'),
            'current_bo_inventory_id' => $request->input('current_bo_inventory_id'),
            'sales_register_id' => $request->input('sales_register_id'),
        ])->with('customer_principal_price', $customer_principal_price)
            ->with('principal_id', $request->input('principal_id'))
            ->with('customer_id', $request->input('customer_id'))
            ->with('agent_user', $agent_user)
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
            ->with('date', $date);
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
            'status' => 'New',
            'exported' => 'not_yet_exported',
            'amount_paid' => 0,
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

    public function work_flow_inventory_save(Request $request)
    {
        //return $request->input();
        date_default_timezone_set('Asia/Manila');
        $date = date('Y-m-d');


        //return $request->input();

        $pcm_number = $request->input('pcm_number');

        if (isset($pcm_number)) {
            $bad_order_save = new Bad_order([
                'pcm_number' => $request->input('pcm_number'),
                'total_bo' => $request->input('total_bo_amount'),
                'agent_id' => $request->input('agent_id'),
                'customer_id' => $request->input('customer_id'),
                'principal_id' => $request->input('principal_id'),
                'sales_register_id' => $request->input('sales_register_id'),
            ]);

            $bad_order_save->save();

            foreach ($request->input('current_bo_inventory_id') as $key => $bo_data) {
                $bad_order_details_save = new Bad_order_details([
                    'bad_order_id' => $bad_order_save->id,
                    'inventory_id' => $bo_data,
                    'quantity' => $request->input('current_bo_quantity')[$bo_data],
                    'unit_price' => $request->input('current_bo_unit_price')[$bo_data],
                ]);

                $bad_order_details_save->save();
            }
        }

        $sales_order_save = new Sales_order([
            'customer_id' => $request->input('customer_id'),
            'principal_id' => $request->input('principal_id'),
            'mode_of_transaction' => $request->input('mode_of_transaction'),
            'sku_type' => $request->input('sku_type'),
            'total_amount' => $request->input('total_amount'),
            'agent_id' => $request->input('agent_id'),
            'status' => 'New',
            'exported' => 'not_yet_exported',
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
