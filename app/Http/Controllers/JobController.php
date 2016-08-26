<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Course;
use Sentinel;

class JobController extends Controller
{
    public function addcourse(Request $request){
		$Course = new Course;
		$Course->user_id = Sentinel::getUser()->id;
		$Course->subject = $request->input('subject');
		$Course->credit = $request->input('credit');
		$Course->time = $request->input('time');
		$Course->available = true;
		$Course->save();
		return 'successful';
	}
	public function showcourse(){
		$Courses = Course::where('available', True)->get();
		return view('showcourse')->with('Courses', $Courses);
	}
}
