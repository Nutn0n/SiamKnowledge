<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\creditlog;
use App\Course;
use App\Profile;
use DB;
use Sentinel;

class AdminController extends Controller
{
    //Control Everything about admin and staff thing.
    public function dashboard(){
        $sentineluser = Sentinel::getUser();
        $user = Profile::find($sentineluser->id);
    	$creditlog = creditlog::where('confirmed', false)->get();
        $tutorprofile = Profile::where('status', 'Tutor')->take(10)->get();
        $studentprofile = Profile::where('status', 'Student')->take(10)->get();
        $course = Course::get();
    	return view('admin.admin')->with('data', [
            'creditlog'=>$creditlog,
            'course' =>$course,
            'tutorprofiles'=>$tutorprofile,
            'studentprofiles'=>$studentprofile,
            'user'=>$user,
            'sentinel'=>$sentineluser,
            ]);
    }
    public function search($keyword){
    	$result = Profile::where('name', 'LIKE', '%'.$keyword.'%')->get();
    	return view('admin.search')->with('results', $result);
    }
}
