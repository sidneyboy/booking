<?php

namespace App\Http\Controllers;

use App\Models\Agent_user;
use App\Models\Customer_principal_code;
use App\Models\Customer_principal_price;
use App\Models\Customer;
use App\Models\Location;
use App\Models\Audit_trail;
use App\Models\Customer_principal_discount;
use App\Models\Customer_export;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class Customer_controller extends Controller
{
    public function index()
    {
        $agent_user = Agent_user::first();

        return view('customer_upload')->with('active', 'customer_upload')
            ->with('agent_user', $agent_user);
    }

    public function customer_upload_process(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        $date = date('Y-m-d');

        $fileName = $_FILES["agent_csv_file"]["tmp_name"];
        $csv = array();

        if (($handle = fopen($fileName, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $csv[] = $data;
            }
        }

        //return $csv;

        $counter = count($csv);

        if ($csv[0][1] != 'export_customer_applied_to_agent') {
            return 'incorrect_file';
        } else {
            for ($i = 1; $i < $counter; $i++) {
                $customer = Customer::find($csv[$i][0]);

                if ($customer) {
                    Customer::where('id', $csv[$i][0])
                        ->update([
                            'location_id' => $csv[$i][1],
                            'credit_limit' => $csv[$i][2],
                            'store_name' => $csv[$i][3],
                            'allowed_number_of_sales_order' => $csv[$i][5],
                            'special_account' => $csv[$i][6],
                            'mode_of_transaction' => $csv[$i][7],
                            'status' => $csv[$i][8],
                        ]);
                } else {
                    $customer_saved = new Customer([
                        'id' => $csv[$i][0],
                        'location_id' => $csv[$i][1],
                        'credit_limit' => $csv[$i][2],
                        'store_name' => $csv[$i][3],
                        'allowed_number_of_sales_order' => $csv[$i][5],
                        'special_account' => $csv[$i][6],
                        'mode_of_transaction' => $csv[$i][7],
                        'status' => $csv[$i][8],
                    ]);
                    $customer_saved->save();
                }
            }

            // $audit_trail = new Audit_trail([
            //     'description' => 'Uploaded export_customer_applied_to_agent ' . $csv[0][2] . ' Export Code',
            // ]);

            // $audit_trail->save();

            fclose($handle);

            return 'saved';
        }
    }

    public function customer_principal_code_upload()
    {
        $agent_user = Agent_user::first();

        return view('customer_principal_code_upload')->with('active', 'customer_principal_code_upload')
            ->with('agent_user', $agent_user);
    }

    public function customer_principal_code_upload_process(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        $date = date('Y-m-d');

        $fileName = $_FILES["agent_csv_file"]["tmp_name"];
        $csv = array();

        if (($handle = fopen($fileName, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $csv[] = $data;
            }
        }

        $counter = count($csv);

        if ($csv[0][1] != 'export_customer_principal_code') {
            return 'incorrect_file';
        } else {
            for ($i = 1; $i < $counter; $i++) {
                $customer_principal_code = new Customer_principal_code([
                    'customer_id' => $csv[$i][0],
                    'principal_id' => $csv[$i][1],
                    'store_code' => $csv[$i][2],
                ]);
                $customer_principal_code->save();
            }

            $audit_trail = new Audit_trail([
                'description' => 'Uploaded export_customer_principal_code ' . $csv[0][2] . ' Export Code',
            ]);

            $audit_trail->save();
        }

        return 'saved';
    }

    public function customer_principal_price_upload()
    {
        $agent_user = Agent_user::first();

        return view('customer_principal_price_upload')->with('active', 'customer_principal_price_upload')
            ->with('agent_user', $agent_user);
    }

    public function customer_principal_price_upload_process(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        $date = date('Y-m-d');

        $fileName = $_FILES["agent_csv_file"]["tmp_name"];
        $csv = array();

        if (($handle = fopen($fileName, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $csv[] = $data;
            }
        }

        $counter = count($csv);

        if ($csv[0][1] != 'export_customer_price_per_principal') {
            return 'incorrect_file';
        } else {
            for ($i = 1; $i < $counter; $i++) {
                $customer_principal_price = new Customer_principal_price([
                    'customer_id' => $csv[$i][0],
                    'principal_id' => $csv[$i][1],
                    'price_level' => $csv[$i][2],
                ]);
                $customer_principal_price->save();
            }

            $audit_trail = new Audit_trail([
                'description' => 'Uploaded export_customer_price_per_principal ' . $csv[0][2] . ' Export Code',
            ]);

            $audit_trail->save();
        }

        return 'saved';
    }

    public function customer_principal_discount_upload()
    {
        $agent_user = Agent_user::first();

        return view('customer_principal_discount_upload')->with('active', 'customer_principal_discount_upload')
            ->with('agent_user', $agent_user);
    }


    public function customer_principal_discount_process(Request $request)
    {

        date_default_timezone_set('Asia/Manila');
        $date = date('Y-m-d');

        $fileName = $_FILES["agent_csv_file"]["tmp_name"];
        $csv = array();

        if (($handle = fopen($fileName, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $csv[] = $data;
            }
        }

        //return $csv;

        $counter = count($csv);
        $agent_user = Agent_user::select('agent_id')->first();

        if ($csv[0][4] == 'principal_discount') {
            for ($i = 1; $i < $counter; $i++) {
                $customer_saved = new Customer_principal_discount([
                    'customer_id' => $csv[$i][0],
                    'principal_id' => $csv[$i][1],
                    'discount_name' => $csv[$i][2],
                    'discount_rate' => $csv[$i][3],
                ]);
                $customer_saved->save();
            }
            return 'saved';
        } else {
            return 'incorrect_file';
        }
    }

    public function new_customer()
    {
        date_default_timezone_set('Asia/Manila');
        $date = date('Y-m-d');

        $schedule_day = date('l', strtotime($date));

        $agent_user = Agent_user::first();
        $location = location::select('id', 'location')->get();
        return view('new_customer', [
            'location' => $location,
        ])->with('active', 'new_customer')
            ->with('agent_user', $agent_user)
            ->with('schedule_day', $schedule_day);
    }




    public function customer_export_generate_customer(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        $date = date('Y-m-d');

        if ($request->input('select_mode') == 'New Customer') {
            $agent_user = Agent_user::first();
            $location = location::select('id', 'location')->get();
            return view('customer_export_generate_customer_new_customer')
                ->with('agent_user', $agent_user)
                ->with('location', $location);
        }
    }

    public function customer_export_generate_final_summary(Request $request)
    {
        $explode = explode('-', $request->input('location'));
        $location_id = $explode[0];
        $location = $explode[1];
        return view('customer_export_generate_final_summary')
            ->with('agent_name', $request->input('agent_name'))
            ->with('store_name', $request->input('store_name'))
            ->with('contact_number', $request->input('contact_number'))
            ->with('contact_person', $request->input('contact_person'))
            ->with('detailed_address', str_replace(',', ' ', $request->input('detailed_address')))
            ->with('kob', $request->input('kob'))
            ->with('latitude', $request->input('latitude'))
            ->with('longitude', $request->input('longitude'))
            ->with('location_id', $location_id)
            ->with('location', $location);
    }

    public function customer_export_new_customer_saved(Request $request)
    {
        // $explode = explode('-', $request->input('location'));
        // $location_id = $explode[0];
        // $location = $explode[1];

        $customer_export_saved = new Customer_export([
            'store_name' => $request->input('store_name'),
            'contact_person' => $request->input('contact_person'),
            'contact_number' => $request->input('contact_number'),
            'location' => $request->input('location'),
            'location_id' => $request->input('location_id'),
            'detailed_address' => $request->input('detailed_address'),
            'longitude' => $request->input('longitude'),
            'latitude' => $request->input('latitude'),
            'exported' => 'not_yet',
            'kob' => $request->input('kob'),
            'status' => 'Pending Approval',
        ]);

        $customer_export_saved->save();

        return 'saved';
    }




















    public function customer_export_saved(Request $request)
    {
        $explode = explode('-', $request->input('location'));
        $location_id = $explode[0];
        $location = $explode[1];

        $customer_export_saved = new Customer_export([
            'schedule_day' => $request->input('schedule_day'),
            'store_name' => $request->input('store_name'),
            'contact_person' => $request->input('contact_person'),
            'contact_number' => $request->input('contact_number'),
            'location' => $location,
            'location_id' => $location_id,
            'detailed_address' => $request->input('detailed_address'),
            'coordinates' => $request->input('coordinates'),
            'exported' => 'not_yet',
            'kob' => $request->input('kob'),
        ]);

        $customer_export_saved->save();

        return 'saved';
    }

    public function new_customer_generate_csv(Request $request)
    {
        //return 'asdasd';
        //return $request->input();
        date_default_timezone_set('Asia/Manila');
        $date = date('Ymd');
        $time = date('His');

        $agent_user = Agent_user::first();
        $customer_export = Customer_export::where('exported', '!=', 'exported')->get();
        return view('new_customer_generate_csv', [
            'customer_export' => $customer_export,
            'agent_user' => $agent_user,
        ])->with('date', $date)
            ->with('time', $time)
            ->with('active', 'new_customer_generate_csv');
    }

    public function customer_export(Request $request)
    {
        foreach ($request->input('customer_export_id') as $key => $data) {
            Customer_export::where('id', $data)
                ->update(['exported' => 'exported']);
        }

        return 'saved';
    }
}
