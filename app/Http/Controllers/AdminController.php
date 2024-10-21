<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Realtron;
use App\Models\Agent;
use Illuminate\Support\Facades\Validator; // Import the Validator facade

class AdminController extends Controller
{
   public function realtrondetails(){
      $realtron = Realtron::all();
    if(request()->expectsJson()){
     return response()->json([
        'sucess'=>true,
        'message'=>'realtron fetched',
        'realtron'=>$realtron,
     ]);
    }else{
     return view('admin.realtrondetails',compact('realtron'));
    }
  
     }
  
     public function view_properties()
{
    // Fetch all agents from the database
    $view_properties = Agent::all();

    // Check if the request expects a JSON response
    if (request()->expectsJson()) {
        return response()->json([
            'success' => true,
            'message' => 'Properties fetched successfully',
            'data' => $view_properties,
        ]);
    } else {
        // Render a view if the request does not expect JSON
        return view('admin.view_properties', compact('view_properties'));
    }
}

  
   
  
}
