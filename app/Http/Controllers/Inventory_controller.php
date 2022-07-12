<?php

namespace App\Http\Controllers;

use App\Models\Agent_user;
use App\Models\Inventory;
use App\Models\Audit_trail;
use Illuminate\Http\Request;

class Inventory_controller extends Controller
{
    public function index()
    {
        $agent_user = Agent_user::first();

        return view('inventory_upload')->with('active', 'inventory_upload')
            ->with('agent_user', $agent_user);
    }

    public function inventory_upload_process(Request $request)
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
            $sku = Inventory::find($csv[$i][0]);
            if ($sku) {
                Inventory::where('id', $csv[$i][0])
                    ->update([
                        'running_balance' => $csv[$i][7],
                        'price_1' => $csv[$i][8],
                        'price_2' => $csv[$i][9],
                        'price_3' => $csv[$i][10],
                        'price_4' => $csv[$i][11],
                    ]);
            } else {
                $sku_inventory_saved = new Inventory([
                    'id' => $csv[$i][0],
                    'sku_code' => $csv[$i][1],
                    'description' => $csv[$i][2],
                    'principal_id' => $csv[$i][4],
                    'sku_type' => $csv[$i][5],
                    'uom' => $csv[$i][6],
                    'running_balance' => $csv[$i][7],
                    'price_1' => $csv[$i][8],
                    'price_2' => $csv[$i][9],
                    'price_3' => $csv[$i][10],
                    'price_4' => $csv[$i][11],
                ]);

                $sku_inventory_saved->save();
            }
        }

        $audit_trail = new Audit_trail([
            'description' => 'Uploaded Inventory',
        ]);

        $audit_trail->save();
        

        fclose($handle);

        return 'saved';
    }
}
