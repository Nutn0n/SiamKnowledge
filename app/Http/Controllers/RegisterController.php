<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use App\Http\Requests;

class RegisterController extends Controller
{
    public function registerStudent(Request $request){
    	$credentials = [
		    'email'    => $request->email,
		    'password' => $request->password,
		];
		$user = Sentinel::register($credentials);
		$role = Sentinel::findRoleByName('Student');
		$role->users()->attach($user);
		Sentinel::loginAndRemember($user);
		return "registered";
    }
    public function registerTutor(Request $request){
    	$credentials = [
		    'email'    => $request->email,
		    'password' => $request->password,
		];
		$user = Sentinel::register($credentials);
		$role = Sentinel::findRoleByName('Tutor');
		$role->users()->attach($user);
		Sentinel::loginAndRemember($user);
		return "registered";
    }
}
