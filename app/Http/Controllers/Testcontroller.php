<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Faker;
use Sentinel;
use App\User;
use factory;
use App\Profile;
use App\Credit;
use App\Course;

class Testcontroller extends Controller
{
    public function test(Faker\Generator $faker){
    	
    	/*for ($i=1; $i < 26; $i++) {
    		$email = $faker->safeEmail;
	    	$credentials = [

	    		'email'    => $email,
	   			'password' => '12345678',
			];
			$user = Sentinel::registerAndActivate($credentials);
			$Profile = new Profile(['name' => $faker->name,
		        'calledname' => $faker->safeEmail,
		        'birthdate' => $faker->randomDigitNotNull,
		        'gender' => 'male',
		        'school' => $faker->company,
		        'university' => $faker->company,
		        'field' => 'sci-math',
		        'inter' => 'no-not-inter',
		        'email' => $email,
		        'phone' => '020200103',
		        'lineid' => $faker->name,
		        'status' => 'Student',]);
			User::find($user->id)->profile()->save($Profile);
			$Credit = new Credit();
			User::find($user->id)->profile()->save($Credit);
			$role = Sentinel::findRoleByName('Student');
			$role->users()->attach($user);

		}

		for ($i=0; $i < 10; $i++) {
			$email = $faker->safeEmail;
	    	$credentials = [
	    		'email'    => $email,
	   			'password' => '12345678',
			];
			$user = Sentinel::registerAndActivate($credentials);
			$Profile = new Profile(['name' => $faker->name,
		        'calledname' => $faker->safeEmail,
		        'birthdate' => $faker->randomDigitNotNull,
		        'gender' => 'male',
		        'school' => $faker->company,
		        'university' => $faker->company,
		        'field' => 'sci-math',
		        'inter' => 'no-not-inter',
		        'email' => $email,
		        'phone' => '020200103',
		        'lineid' => $faker->name,
		        'status' => 'Tutor',]);
			User::find($user->id)->profile()->save($Profile);
			$role = Sentinel::findRoleByName('Tutor');
			$role->users()->attach($user);
		}
		
		for ($i=0; $i <25 ; $i++) { 
		$Course = new Course;
		$Course->user_id = rand(1,);
		$Course->subject = $faker->sentence($nbWords = 6, $variableNbWords = true);
		$Course->credit = 3;
		$Course->length = 2.5;
		$Course->startdate = '10-11-2016';
		$Course->place = 'Paragon';
		$Course->objective = $faker->realText($maxNbChars = 200, $indexSize = 2);
		$Course->time = '10:00 PM';
		$Course->topic = 'เลข';
		$Course->inter = 'no-not-inter';
		$Course->group = 'group';
		$Course->verificationcode = mt_rand(100000, 999999);
		$Course->available = true;
		$Course->save();*/
	}
	

}

