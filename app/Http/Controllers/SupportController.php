<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Course;

class SupportController extends Controller
{
    //
    public function contact($courseid){
    	$coursesubject = Course::where('id', $courseid)->first()->subject;
    	return view('support')->with('data', ['coursesubject'=>$coursesubject]);
    }
}
