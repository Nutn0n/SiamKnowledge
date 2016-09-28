<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Course;
use App\interest;
use Sentinel;
use App\User;
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
	public function viewmycourse(){
		$Courses = Course::where('user_id', Sentinel::getUser()->id)->get();
		return view('viewmycourse')->with('data', ['course'=>$Courses]);
	}
	public function showcourse(){
		$Courses = Course::where('available', True)->get();
		return view('showcourse')->with('Courses', $Courses);
	}
	public function interest($id){
		$interest = new interest;
		$interest->user_id = Sentinel::getUser()->id;
		$interest->course_id = $id;
		$interest->save();
		return back();
	}
	public function showcoursepage($id){
		$Course = Course::find($id);
		$tutor = false;
		$haveinterest = true;
		if(Sentinel::check()){
			if(Sentinel::getUser()->hasAccess(['Interest',])){
				$tutor = true;
			}
			if(interest::where([['user_id', Sentinel::getUser()->id], ['course_id', $id]])->get()->isEmpty()){
				$haveinterest = false;
			}
			}
		
		return view('showcoursepage')->with('data', ['Course'=>$Course, 'tutor'=>$tutor, 'haveinterest'=>$haveinterest]);
	}
	public function uninterest($id){
		interest::where([['course_id', $id], ['user_id', Sentinel::getUser()->id]])->delete();
		return back();

	}
	public function manage($id){
		$Course = Course::find($id);
		return view('managecourse')->with('data', ['course'=>$Course]);
	}
	public function selecttutor($id, $tutorid){
		$User = User::find(Sentinel::getUser()->id);
		$Course = Course::find($id);
		if($User->credit->credit >= $Course->credit){
			$Course->tutor_id = $tutorid;
			$Course->available = 0;
			$Course->save();
			$User->credit->reservedcredit += $Course->credit;
			$User->credit->credit = $User->credit->credit - $Course->credit;
			$User->credit->save();
			return "success";
		}
		else{
			return "not enough credit";
		}
	}
}