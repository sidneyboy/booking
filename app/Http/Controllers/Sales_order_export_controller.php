<?php

namespace App\Http\Controllers;
use App\Models\Agent_user;
use App\Models\Sales_order;
use Illuminate\Http\Request;

class Sales_order_export_controller extends Controller
{
    public function index()
    {
        date_default_timezone_set('Asia/Manila');
        $date = date('Y-m-d');
        
        $agent_user = Agent_user::first();
        $sales_order = Sales_order::where('exported','!=','exported')->get();
        return view('sales_order_export',[
            'sales_order' => $sales_order,
        ])->with('active', 'sales_order_export')
            ->with('agent_user', $agent_user)
            ->with('date', $date);
    }
}