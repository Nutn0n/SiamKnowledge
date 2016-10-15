<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\log;
use App\Course;

class AdminController extends Controller
{
    //Control Everything about admin and staff thing.
    public function dashboard(){
    	$data = log::where('status', 'confirm')->get();
    	return view('admin.dashboard')->with('data', $data);
    }
    public function coursedashboard(){

    } 
}
