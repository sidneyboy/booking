<?php

namespace App\Http\Controllers;

use App\Models\Agent_user;
use App\Models\Sales_register;
use App\Models\Sales_order;
use App\Models\Customer;
use App\Models\Collection;
use App\Models\Collection_details;
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
        $sales_register = Sales_register::select('id', 'dr', 'date_delivered', 'principal_id', 'status', 'total_amount', 'sku_type', 'customer_id', 'amount_paid')
            ->where('customer_id', $request->input('customer_id'))
            ->where('status', '!=', 'paid')
            ->get();

        $sales_order = Sales_order::select('id', 'total_amount', 'principal_id', 'sku_type', 'status', 'customer_id', 'amount_paid')
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

        // if (array_sum($request->input('sales_register_amount_paid')) != 0) {
        //     $sales_register_amount_paid = array_filter($request->input('sales_register_amount_paid'));
        //     return view('collection_generate_final_summary', [
        //         'sales_register_amount_paid' => str_replace(',', '', $sales_register_amount_paid),
        //         'sales_register_dr' => $request->input('sales_register_dr'),
        //         'sales_register_principal' => $request->input('sales_register_principal'),
        //         'sales_register_sku_type' => $request->input('sales_register_sku_type'),
        //         'sales_register_total_amount' => $request->input('sales_register_total_amount'),
        //         'sales_register_remarks' => $request->input('sales_register_remarks'),
        //         'sales_register_mode_of_transaction' => $request->input('sales_register_mode_of_transaction'),
        //         'sales_register_store_name' => $request->input('sales_register_store_name'),
        //         'sales_register_balance' => $request->input('sales_register_balance'),
        //         'customer_id' => $request->input('customer_id'),
        //         'checker' => 'sales_register',
        //     ]);
        // } elseif (array_sum($request->input('sales_order_amount_paid')) != 0) {
        //     $sales_order_amount_paid = array_filter($request->input('sales_order_amount_paid'));
        //     return view('collection_generate_final_summary', [
        //         'sales_order_amount_paid' => str_replace(',', '', $sales_order_amount_paid),
        //         'sales_order_dr' => $request->input('sales_order_dr'),
        //         'sales_order_principal' => $request->input('sales_order_principal'),
        //         'sales_order_sku_type' => $request->input('sales_order_sku_type'),
        //         'sales_order_total_amount' => $request->input('sales_order_total_amount'),
        //         'sales_order_remarks' => $request->input('sales_order_remarks'),
        //         'sales_order_mode_of_transaction' => $request->input('sales_order_mode_of_transaction'),
        //         'sales_order_store_name' => $request->input('sales_order_store_name'),
        //         'sales_order_balance' => $request->input('sales_order_balance'),
        //         'customer_id' => $request->input('customer_id'),
        //         'checker' => 'sales_order',
        //     ]);
        // } else if (array_sum($request->input('sales_order_amount_paid')) != 0 and array_sum($request->input('sales_register_amount_paid')) != 0) {
        //     $sales_register_amount_paid = array_filter($request->input('sales_register_amount_paid'));
        //     $sales_order_amount_paid = array_filter($request->input('sales_order_amount_paid'));

        //     return view('collection_generate_final_summary', [
        //         'sales_register_amount_paid' => str_replace(',', '', $sales_register_amount_paid),
        //         'sales_register_dr' => $request->input('sales_register_dr'),
        //         'sales_register_principal' => $request->input('sales_register_principal'),
        //         'sales_register_sku_type' => $request->input('sales_register_sku_type'),
        //         'sales_register_total_amount' => $request->input('sales_register_total_amount'),
        //         'sales_register_remarks' => $request->input('sales_register_remarks'),
        //         'sales_register_mode_of_transaction' => $request->input('sales_register_mode_of_transaction'),
        //         'sales_register_store_name' => $request->input('sales_register_store_name'),
        //         'sales_register_balance' => $request->input('sales_register_balance'),




        //         'sales_order_amount_paid' => str_replace(',', '', $sales_order_amount_paid),
        //         'sales_order_dr' => $request->input('sales_order_dr'),
        //         'sales_order_principal' => $request->input('sales_order_principal'),
        //         'sales_order_sku_type' => $request->input('sales_order_sku_type'),
        //         'sales_order_total_amount' => $request->input('sales_order_total_amount'),
        //         'sales_order_remarks' => $request->input('sales_order_remarks'),
        //         'sales_order_mode_of_transaction' => $request->input('sales_order_mode_of_transaction'),
        //         'sales_order_store_name' => $request->input('sales_order_store_name'),
        //         'sales_order_balance' => $request->input('sales_order_balance'),
        //         'customer_id' => $request->input('customer_id'),
        //         'checker' => 'both',
        //     ]);
        // }


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
            'sales_register_store_name' => $request->input('sales_register_store_name'),
            'sales_register_balance' => $request->input('sales_register_balance'),
            'sales_register_total_bo' => $request->input('sales_register_total_bo'),



            'sales_order_amount_paid' => str_replace(',', '', $sales_order_amount_paid),
            'sales_order_dr' => $request->input('sales_order_dr'),
            'sales_order_principal' => $request->input('sales_order_principal'),
            'sales_order_sku_type' => $request->input('sales_order_sku_type'),
            'sales_order_total_amount' => $request->input('sales_order_total_amount'),
            'sales_order_remarks' => $request->input('sales_order_remarks'),
            'sales_order_mode_of_transaction' => $request->input('sales_order_mode_of_transaction'),
            'sales_order_store_name' => $request->input('sales_order_store_name'),
            'sales_order_balance' => $request->input('sales_order_balance'),
            'customer_id' => $request->input('customer_id'),
            'checker' => 'both',
        ]);
    }

    public function collection_save(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        $date = date('Y-m-d H:i:s');


        $sales_order_id = $request->input('sales_order_id');
        $sales_register_id = $request->input('sales_register_id');

        if (isset($sales_order_id)) {
            foreach ($request->input('sales_order_id') as $key => $data) {
                $sales_order_collection_saved = new Collection([
                    'customer_id' => $request->input('customer_id'),
                    'principal' => $request->input('sales_order_principal')[$data],
                    'total_amount' => $request->input('sales_order_total_amount')[$data],
                    'amount_paid' => $request->input('sales_order_amount_paid')[$data],
                    'mode_of_transaction' => $request->input('sales_order_mode_of_transaction')[$data],
                    'dr' => 'No Invoice Yet',
                    'sku_type' => $request->input('sales_order_sku_type')[$data],
                    'balance' => $request->input('sales_order_balance')[$data],
                    'exported' => '',
                    'remarks' => $request->input('sales_order_remarks')[$data],
                    'total_bo' => 0,
                ]);

                $sales_order_collection_saved->save();

                // $file = $request->file('sales_order_image')[$data];
                // $filename = $file->getClientOriginalName();
                // $file->move(public_path('images'), $filename);

                // $sales_order_collection_details_saved = new Collection_details([
                //     'collection_id' => $sales_order_collection_saved->id,
                //     'image' => $filename,
                // ]);

                // $sales_order_collection_details_saved->save();

                if ($request->input('sales_order_balance')[$data] != 0) {
                    Sales_order::where('id', $data)
                        ->update([
                            'status' => 'partial',
                            'amount_paid' => $request->input('sales_order_amount_paid')[$data],
                            'updated_at' => $date,
                        ]);
                } else {
                    Sales_order::where('id', $data)
                        ->update([
                            'status' => 'paid',
                            'amount_paid' => $request->input('sales_order_amount_paid')[$data],
                            'updated_at' => $date,
                        ]);
                }
            }
        }



        if (isset($sales_register_id)) {
            if (count($request->input('sales_register_id')) != 0) {
                foreach ($request->input('sales_register_id') as $key => $data) {
                    $sales_register_collection_saved = new Collection([
                        'customer_id' => $request->input('customer_id'),
                        'principal' => $request->input('sales_register_principal')[$data],
                        'total_amount' => $request->input('sales_register_total_amount')[$data],
                        'amount_paid' => $request->input('sales_register_payment_data')[$data],
                        'mode_of_transaction' => $request->input('sales_register_mode_of_transaction')[$data],
                        'dr' => $request->input('sales_register_dr')[$data],
                        'sku_type' => $request->input('sales_register_sku_type')[$data],
                        'balance' => $request->input('sales_register_balance')[$data],
                        'remarks' => $request->input('sales_register_remarks')[$data],
                        'exported' => '',
                        'total_bo' => $request->input('sales_register_total_bo')[$data],
                    ]);

                    $sales_register_collection_saved->save();

                    // $file = $request->file('sales_register_image')[$data];
                    // $filename = $file->getClientOriginalName();
                    // $file->move(public_path('images'), $filename);

                    // $sales_register_collection_details_saved = new Collection_details([
                    //     'collection_id' => $sales_register_collection_saved->id,
                    //     'image' => $filename,
                    // ]);

                    // $sales_register_collection_details_saved->save();

                    if ($request->input('sales_register_balance')[$data] != 0) {
                        Sales_register::where('id', $data)
                            ->update([
                                'status' => 'partial',
                                'amount_paid' => $request->input('sales_register_payment_data')[$data],
                                'updated_at' => $date,
                            ]);
                    } else {
                        Sales_register::where('id', $data)
                            ->update([
                                'status' => 'paid',
                                'amount_paid' => $request->input('sales_register_payment_data')[$data],
                                'updated_at' => $date,
                            ]);
                    }
                }
            }
        }

        return 'saved';
    }

    public function collection_export()
    {
        $agent_user = Agent_user::first();
        $collection = Collection::where('exported', '!=', 'exported')->get();
        return view('collection_export', [
            'collection' => $collection,
        ])->with('active', 'collection_export')
            ->with('agent_user', $agent_user);
    }
}
