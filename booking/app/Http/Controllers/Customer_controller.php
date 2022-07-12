<?php

namespace App\Http\Controllers;
use App\Models\Location;
use App\Models\Agent_user;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class Customer_controller extends Controller
{
    public function index()
    {
        $agent_user = Agent_user::first();

        return view('customer_upload')->with('active','customer_upload')
            ->with('agent_user', $agent_user);
    }

    public function customer_upload_process(Request $request)
    {
        //  Schema::disableForeignKeyConstraints();
        // DB::table('locations')->truncate();
        // Schema::enableForeignKeyConstraints();
        date_default_timezone_set('Asia/Manila');
            $date = date('Y-m-d');

            $fileName = $_FILES["agent_csv_file"]["tmp_name"];
            $csv = array();

         if(($handle = fopen($fileName, "r")) !== FALSE)
         {
            while(($data = fgetcsv($handle, 1000, ",")) !== FALSE)
            {
                $csv[] = $data;
            }
         }

         return $csv;

         $counter = count($csv);

         if ($csv[0][1] == 'export_customer_applied_to_agent') {
             return 'incorrect_file';
         }else{
            for ($i=1; $i < $counter; $i++) { 
                    $customer = Customer::find($csv[$i][0]);
                    if (!$customer) {
                        $customer_saved = new Location([
                            'id' => $csv[$i][0],
                            'location_id' => $csv[$i][1],
                            'detailed_location' => $csv[$i][2],
                            'store_name' => $csv[$i][3], 
                        ]);
                        $location_saved->save();
                    }
             }
             

             fclose($handle);
         }

         

         // return 'saved';
    }
}
