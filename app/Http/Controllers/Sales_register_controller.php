<?php

namespace App\Http\Controllers;

use App\Models\Agent_user;
use App\Models\Sales_register;
use App\Models\Audit_trail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class Sales_register_controller extends Controller
{
    public function index()
    {
        $agent_user = Agent_user::first();

        return view('sales_register_upload')->with('active', 'sales_register_upload')
            ->with('agent_user', $agent_user);
    }

    public function sales_register_upload_process(Request $request)
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

        for ($i = 1; $i < $counter; $i++) {
            $sales_register_saved = new Sales_register([
                'customer_id' => $csv[$i][0],
                'principal_id' => $csv[$i][1],
                'export_code' => $csv[$i][2],
                'total_amount' => $csv[$i][3],
                'dr' => $csv[$i][4],
                'date_delivered' => $csv[$i][5],
                'status' => $csv[$i][6],
            ]);
            $sales_register_saved->save();
            $sales_register_saved_last_id = $sales_register_saved->id;
        }

        fclose($handle);

        $audit_trail = new Audit_trail([
            'description' => 'Uploaded Sales Register',
        ]);

        $audit_trail->save();

        return 'saved';
    }
}
