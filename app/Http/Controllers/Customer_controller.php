<?php

namespace App\Http\Controllers;

use App\Models\Agent_user;
use App\Models\Customer_principal_code;
use App\Models\Customer_principal_price;
use App\Models\Customer;
use App\Models\Audit_trail;
use DB;
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



        $counter = count($csv);

        if ($csv[0][1] != 'export_customer_applied_to_agent') {
            return 'incorrect_file';
        } else {
            for ($i = 1; $i < $counter; $i++) {
                $customer = Customer::find($csv[$i][0]);
                if (!$customer) {
                    $customer_saved = new Customer([
                        'id' => $csv[$i][0],
                        'location_id' => $csv[$i][1],
                        'credit_limit' => $csv[$i][2],
                        'store_name' => $csv[$i][3],
                    ]);
                    $customer_saved->save();
                }
            }

            $audit_trail = new Audit_trail([
                'description' => 'Uploaded export_customer_applied_to_agent ' . $csv[0][2] . ' Export Code',
            ]);

            $audit_trail->save();

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
}
