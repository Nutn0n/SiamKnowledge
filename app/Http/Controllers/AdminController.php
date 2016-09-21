<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\log;

class AdminController extends Controller
{
    public function dashboard(){
    	$data = log::where('status', 'confirm')->get();
    	return view('admin.dashboard')->with('data', $data);
    }
}
