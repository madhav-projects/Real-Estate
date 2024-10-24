<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use User;
use Auth;
use App\Models\Property;

class HomeController extends Controller
{
    //
    public function index(){
        if(Auth::id()){
            $usertype=Auth()->user()->usertype;

            if($usertype=='0'){
                return view ('user.index');
            }

            elseif($usertype=='1'){
                return view('admin.adminhome');
            }
            elseif($usertype=='realtron'){
                return view('realtron.realtronhome');
            }
            elseif($usertype=='agent'){
                return view('agents.agenthome');
            }
            else{
                return redirect()->back();
            }
        }
    }
    public function fetch_agent_property()
    {
        $user = Auth::user(); // Get the authenticated user
        $properties = Property::where('agent_name', $user->name)->get(); // Fetch properties assigned to the agent
    
        // Return the fetched properties in JSON format along with a custom message
        if (request()->expectsJson()) { // Corrected to expectsJson()
            return response()->json([
                'message' => 'Properties fetched successfully',
                'properties' => $properties, // Changed from $fetch_property to $properties
            ]);
        } else {
            return view('agents.properties', compact('properties')); // Assuming you have a 'properties' view for agents
        }
    }
    

}
