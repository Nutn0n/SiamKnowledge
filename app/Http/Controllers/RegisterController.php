<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use App\Http\Requests;
use App\Credit;
use App\Profile;
use DB;
use App\User;

class RegisterController extends Controller
{
    public function registerStudent(Request $request){
    	$this->validate($request, [
  			'name' => 'required',
    		'calledname' => 'required',
    		'birthdate' => 'required',
    		'gender' => 'required',
    		'field' => 'required',
    		'inter' => 'required',
    		'email' => 'required|unique:users,email',
    		'phone' => 'required|numeric',
    		'password' => 'required|confirmed',
    		]);
    	$credentials = [
		    'email'    => $request->email,
		    'password' => $request->password,
		];
		$user = Sentinel::registerAndActivate($credentials);
		$role = Sentinel::findRoleByName('Student');
		$role->users()->attach($user);
		Sentinel::loginAndRemember($user);
		$usermodel = User::find(Sentinel::getUser()->id);
		$usermodel->Credit()->save(new Credit);
		$profile = new Profile;
		$profile->name = $request->name;
		$profile->calledname = $request->calledname;
		$profile->birthdate = $request->birthdate;
		$profile->gender  = $request->gender;
		$profile->school  = $request->school;
		$profile->university  = $request->university;
		$profile->field  = $request->field;
		$profile->inter  = $request->inter;
		$profile->email  = $request->email;
		$profile->phone  = $request->phone;
		$profile->lineid  = $request->lineid;
		$profile->status = 'Student';
		$profile->school  = $request->school;
		$usermodel->Profile()->save($profile);
		$request->session()->flash('status', 'สมัครสมาชิกเรียบร้อย');
        return redirect()->route('viewmycourse');
    }
    public function registerTutor(Request $request){
    	 $this->validate($request, [
    		'name' => 'required',
    		'calledname' => 'required',
    		'birthdate' => 'required',
    		'gender' => 'required',
    		'field' => 'required',
    		'inter' => 'required',
    		'email' => 'required|unique:users,email',
    		'phone' => 'required|numeric',
    		'lineid' => 'required',
    		'password' => 'required|confirmed',
    		]);
    	$credentials = [
		    'email'    => $request->email,
		    'password' => $request->password,
		];
		$user = Sentinel::registerAndActivate($credentials);
		$role = Sentinel::findRoleByName('Tutor');
		$role->users()->attach($user);
		Sentinel::loginAndRemember($user);
		$usermodel = User::find(Sentinel::getUser()->id);
		$usermodel->Credit()->save(new Credit);
		$profile = new Profile;
		$profile->name = $request->name;
		$profile->calledname = $request->calledname;
		$profile->birthdate = $request->birthdate;
		$profile->gender  = $request->gender;
		$profile->school  = $request->school;
		$profile->university  = $request->university;
		$profile->field  = $request->field;
		$profile->inter  = $request->inter;
		$profile->email  = $request->email;
		$profile->phone = $request->phone;
		$profile->lineid  = $request->lineid;
		$profile->status = 'Tutor';
		$profile->teachhours = 0;
		$profile->tutorgrade = 'White';
		$usermodel->Profile()->save($profile);
        $request->session()->flash('status', 'สมัครสมาชิกเรียบร้อย');
		return redirect()->route('course');

    }
    public function login(Request $request){
    	$this->validate($request, [
    		'email' => 'required',
    		'password' => 'required',
    		]);
    	$credentials = [
		    'email'    => $request->email,
		    'password' => $request->password,
		];
		$login = Sentinel::authenticateAndRemember($credentials);
    	if($login != False){
            if(Sentinel::getUser()->roles->first()->name == 'Student'){
    	       return redirect()->route('viewmycourse');
            }
            elseif (Sentinel::getUser()->roles->first()->name == 'Tutor') {
                return redirect()->route('course');
            }
            else{
                return redirect()->route('welcome');
            }
    	}
    	else{
    		$request->flash();
    		return back()->with('errors', collect(['loginfail']));
    	}
    }

    public function myprofile(){
    	$profile = Profile::find(Sentinel::getUser()->id);
    	return view('student-profile')->with('profile', $profile);
    }
    public function myprofiletutor(){
        $profile = Profile::find(Sentinel::getUser()->id);
        return view('tutor-myprofile')->with('profile', $profile);
    }

    public function updatemyprofile(Request $request){
        $this->validate($request, [
            'avatar' => 'max:2000|image'
            ]);
    	$profile = Profile::find(Sentinel::getUser()->id);
    	$profile->name = $request->name;
    	$profile->calledname = $request->calledname;
    	$profile->birthdate = $request->birthdate;
    $profile->university = $request->university;
    	$profile->school = $request->school;
    	$profile->email = $request->email;
    	$profile->phone = $request->phone;

        if ($request->file('avatar')->isValid()) {
            $path = $request->avatar->store('public/avatars');
            $profile->avatar = $path;
        }
    	$profile->save();
    	return back();
    }
    public function updatemyprofileadmin(Request $request){
        $this->validate($request, [
            'avatar' => 'max:2000|image'
            ]);
        $profile = Profile::find($request->id);
        $profile->name = $request->name;
        $profile->calledname = $request->calledname;
        $profile->birthdate = $request->birthdate;
        $profile->university = $request->university;
        $profile->school = $request->school;
        $profile->email = $request->email;
        $profile->phone = $request->phone;
        DB::table('activations')
            ->where('id', $request->id)
            ->update(['completed' => $request->active]);
        $profile->tutorgrade = $request->tutorgrade;
        if($request->avatar != Null){
        if ($request->file('avatar')->isValid()) {
            $path = $request->avatar->store('public/avatars');
            $profile->avatar = $path;
        }}
        $profile->save();
        return back();
    }

    public function updatemyprofiletutor(Request $request){
        $this->validate($request, [
            'avatar' => 'max:2000|image'
        ]);
        $profile = Profile::find(Sentinel::getUser()->id);
        $profile->name = $request->name;
        $profile->calledname = $request->calledname;
        $profile->birthdate = $request->birthdate;
        $profile->university = $request->university;
        $profile->email = $request->email;
        $profile->phone = $request->phone;
        $profile->bio = $request->bio;
        $profile->save();
        return back();
    }
}
