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
    public function profileedit(Request $request){
        $user = Profile::find(Sentinel::getUser()->id);
        $data = Profile::find($request->id);
        return view('admin.profile-edit')->with('data', ['user'=>$data, 'admin'=>$user]);
    }
    public function profiledelete(Request $request){
        $Profile = Profile::find($request->id);
        $Profile->delete();
        return redirect()->route('admin');
    }
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
    public function coursesearch($keyword){
        $userid = Profile::where('name', 'LIKE', '%'. $keyword.'%')->get();
        $course = Course::where('topic',$keyword)->get();
        return view('admin.coursesearch')->with('data', ['profile'=>$userid, 'course'=>$course]);
    }
}
