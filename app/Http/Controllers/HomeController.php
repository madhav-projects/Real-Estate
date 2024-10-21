<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use User;
use Auth;

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
}
