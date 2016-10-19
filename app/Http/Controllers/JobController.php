<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Course;
use App\interest;
use Sentinel;
use App\User;
use Carbon;
class JobController extends Controller
{
    public function addcourse(Request $request){
		$Course = new Course;
		$Course->user_id = Sentinel::getUser()->id;
		$Course->subject = $request->input('subject');
		$Course->credit = 3;
		$Course->length = $request->input('length');
		$Course->startdate = $request->input('date');
		$Course->place = $request->input('place');
		$Course->objective = $request->input('objective');
		$Course->time = $request->input('time');
		$Course->topic = $request->input('topic');
		$Course->inter = $request->input('inter');
		$Course->group = $request->input('group');
		$Course->available = true;
		if($Course->save()){
			return Carbon::now();
		}
		else{
			return 'error';
		}
	}
	public function viewmycourse(){
		$Courses = Course::where('user_id', Sentinel::getUser()->id)->get();
		return view('student-viewmycourse')->with('data', ['course'=>$Courses]);
	}
	public function showcourse(){
		$Courses = Course::where('available', True)->get();
		foreach ($Courses as $Course) {
			$Course->date = Carbon::parse($Course->startdate)->day;
			$Course->month = Carbon::parse($Course->startdate)->format('M');
		}
		return view('tutor-showcourse')->with('Courses', $Courses);
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
		$Course->date = Carbon::parse($Course->startdate)->day;
		$Course->month = Carbon::parse($Course->startdate)->format('M');
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
		
		return view('tutor-showcoursepage')->with('data', ['Course'=>$Course, 'tutor'=>$tutor, 'haveinterest'=>$haveinterest]);
	}
	public function uninterest($id){
		interest::where([['course_id', $id], ['user_id', Sentinel::getUser()->id]])->delete();
		return back();

	}
	public function manage($id){
		$Course = Course::find($id);
		return view('student-managecourse')->with('data', ['course'=>$Course]);
	}
	public function viewprofile($id){
		$User = User::find($id);
		if($User->profile->status=='tutor'){
			return $User->profile->name;
		}
		else{
			return 'what the fuck are you doing here???? fuckoffffff';
		}
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