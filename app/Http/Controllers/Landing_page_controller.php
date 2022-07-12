<?php

namespace App\Http\Controllers;
use App\Models\Agent_user;
use App\Models\Location;
use Illuminate\Http\Request;

class Landing_page_controller extends Controller
{
    public function proceed_to_controller()
    {
        $user_check = Agent_user::count();
        if ($user_check == 0) {
            return view('user_login');
        }else{
            return view('location_upload');
        }
    }

    public function user_credential(Request $request)
    {

        // $file= $request->file('user_image');
        // $filename= $file->getClientOriginalName();
        // $file->move(public_path('images'), $filename);
           
        // $user_save = new Agent_user([
        //     'agent_id' => $request->input('user_id'),
        //     'agent_name' => $request->input('agent_name'),
        //     'agent_image' => $filename,
        // ]);

        // $user_save->save();
        return redirect('location_upload');
    }
}
