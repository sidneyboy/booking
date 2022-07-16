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
        $sales_register = Sales_register::select('id', 'dr', 'date_delivered', 'principal_id', 'status', 'total_amount', 'sku_type','customer_id')
            ->where('customer_id', $request->input('customer_id'))
            ->where('status', '!=', 'paid')
            ->get();

        $sales_order = Sales_order::select('id', 'total_amount', 'principal_id', 'sku_type', 'status','customer_id')
            ->where('customer_id', $request->input('customer_id'))
            ->where('status', '!=', 'paid')
            ->get();

        return view('collection_generate_customer_payables', [
            'sales_register' => $sales_register,
            'sales_order' => $sales_order,
        ])->with('customer_id', $request->input('customer_id'));
    }

    public function collection_generate_final_summary(Request $request)
    {
        $sales_register_amount_paid = array_filter($request->input('sales_register_amount_paid'));
        $sales_order_amount_paid = array_filter($request->input('sales_order_amount_paid'));

        return view('collection_generate_final_summary', [
            'sales_register_amount_paid' => str_replace(',', '', $sales_register_amount_paid),
            'sales_register_dr' => $request->input('sales_register_dr'),
            'sales_register_principal' => $request->input('sales_register_principal'),
            'sales_register_sku_type' => $request->input('sales_register_sku_type'),
            'sales_register_total_amount' => $request->input('sales_register_total_amount'),
            'sales_register_remarks' => $request->input('sales_register_remarks'),
            'sales_register_mode_of_transaction' => $request->input('sales_register_mode_of_transaction'),
            


            'sales_order_amount_paid' => str_replace(',', '', $sales_order_amount_paid),
            'sales_order_dr' => $request->input('sales_order_dr'),
            'sales_order_principal' => $request->input('sales_order_principal'),
            'sales_order_sku_type' => $request->input('sales_order_sku_type'),
            'sales_order_total_amount' => $request->input('sales_order_total_amount'),
            'sales_order_remarks' => $request->input('sales_order_remarks'),
            'sales_order_mode_of_transaction' => $request->input('sales_order_mode_of_transaction'),

        ]);
    }

    public function collection_save(Request $request)
    {
        foreach ($request->input('sales_register_id') as $data) {
            Sales_register::where('id', $data)
                ->update(['status' => 'paid']);
        }

        foreach ($request->input('sales_order_id') as $data) {
            Sales_order::where('id', $data)
                ->update(['status' => 'paid']);
        }

        return 'saved';
    }
}
