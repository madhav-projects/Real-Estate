<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\property;
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
         // Fetch all agents and companies from the database
         $view_properties = Agent::all();
         $companies = Realtron::all();
     
         // Check if the request expects a JSON response
         if (request()->expectsJson()) {
             return response()->json([
                 'success' => true,
                 'message' => 'Properties fetched successfully',
                 'data' => $view_properties,
             ]);
         } else {
             // Render a view if the request does not expect JSON
             return view('agents.properties', compact('view_properties', 'companies'));
         }
     }
     

     public function addproperty(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'agent_name' =>'required|string|max:255',
            'company_name' =>'required|string|max:255',
            'property_type' => 'required|string|max:255',
            'selling_type' => 'required|string|max:255',
            'bhk' => 'required|string|max:255',
            'bedroom' => 'required|string|max:255',
            'bathroom' => 'required|string|max:255',
            'kitchen' => 'required|string|max:255',
            'balcony' => 'required|string|max:255',
            'hall' => 'required|string|max:255',
            'floor' => 'required|string|max:255',
            'total_floor' => 'required|string|max:255',
            'area_size' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'image1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image3' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image4' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation Error',
                'errors' => $validator->errors()
            ], 422);
        }

        // If validation passes, proceed to store the property data
        $property = new Property();
        $property->agent_name = $request->agent_name;
        $property->company_name = $request->company_name;
        $property->property_type = $request->property_type;
        $property->selling_type = $request->selling_type;
        $property->bhk = $request->bhk;
        $property->bedroom = $request->bedroom;
        $property->bathroom = $request->bathroom;
        $property->kitchen = $request->kitchen;
        $property->balcony = $request->balcony;
        $property->hall = $request->hall;
        $property->floor = $request->floor;
        $property->total_floor = $request->total_floor;
        $property->area_size = $request->area_size;
        $property->city = $request->city;
        $property->state = $request->state;
        $property->address = $request->address;
        $property->status = $request->status;
      // Handling image uploads

if ($request->hasFile('image1')) {
    $image1 = $request->file('image1');
    $imageName1 = uniqid().'.'.$image1->getClientOriginalExtension();
    $image1->move(public_path('properties'), $imageName1);
    $property->image1 = 'properties/'.$imageName1;
}

if ($request->hasFile('image2')) {
    $image2 = $request->file('image2');
    $imageName2 = uniqid().'.'.$image2->getClientOriginalExtension();
    $image2->move(public_path('properties'), $imageName2);
    $property->image2 = 'properties/'.$imageName2;
}

if ($request->hasFile('image3')) {
    $image3 = $request->file('image3');
    $imageName3 = uniqid().'.'.$image3->getClientOriginalExtension();
    $image3->move(public_path('properties'), $imageName3);
    $property->image3 = 'properties/'.$imageName3;
}

if ($request->hasFile('image4')) {
    $image4 = $request->file('image4');
    $imageName4 = uniqid().'.'.$image4->getClientOriginalExtension();
    $image4->move(public_path('properties'), $imageName4);
    $property->image4 = 'properties/'.$imageName4;
}
 
        // Save the property
        $property->save();

        // Return success response
        return response()->json([
            'status' => 'success',
            'message' => 'Property added successfully',
            'data' => $property
        ], 201);
    }

    public function show_properties()
    {
       
        $property = property::all();
        
        // Return the fetched categories in JSON format along with a custom message
        if(request()->expectsjson()){
        return response()->json([
            'message' => 'Properties fetched successfully',
            'property' => $property,
        ]);
    } 
    else{
        return view('agents.showproperty', compact('property'));
    }
}



  
}
