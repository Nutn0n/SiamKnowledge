<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use App\Http\Requests;
use App\Credit;
use App\Profile;
use App\User;

class RegisterController extends Controller
{
    public function registerStudent(Request $request){
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
		$profile->firstname = $request->firstname;
		$profile->lastname = $request->lastname;
		$profile->grade = $request->grade;
		$profile->status = 'student';
		$profile->school  = $request->school;
		$usermodel->Profile()->save($profile);
		return "registered";
    }
    public function registerTutor(Request $request){
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
		$profile->firstname = $request->firstname;
		$profile->lastname = $request->lastname;
		$profile->grade = $request->grade;
		$profile->school  = $request->school;
		$profile->status = 'tutor';
		$profile->teachhours = 0;
		$profile->tutorgrade = 1;
		$usermodel->Profile()->save($profile);
		return "registered";
    }
    public function login(Request $request){
    	$credentials = [
		    'email'    => $request->email,
		    'password' => $request->password,
		];
		$login = Sentinel::authenticateAndRemember($credentials);
    	if($login != False){
    	return "loggedin";
    	}
    	else{
    		return "wrong passwd";
    	}
    }
}
