<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'JobController@showcourse')->name('welcome');
Route::get('/addcourse', function(){
	return view('addcourse');
})->middleware('Checkuser');
Route::post('/addcourse', 'JobController@addcourse')->middleware('Checkuser');
Route::get('/studentregister', function(){
	return view('register');
});
Route::post('/studentregister','RegisterController@registerStudent');
Route::post('/tutorregister', 'RegisterController@registerTutor');
Route::get('/tutorregister', function(){
    return view('register');
});
Route::get('/course/{id}', 'JobController@showcoursepage');
Route::get('/course/{id}/interest', 'JobController@interest');
Route::get('/check', function(){
    return var_dump(Sentinel::check());
});
Route::get('/login', function(){
    return view('register');
});
Route::post('/login', 'RegisterController@login');
Route::get('/logout', function(){
    Sentinel::logout();
    return redirect()->route('welcome');
});
Route::get('/course/{id}/uninterest', 'JobController@uninterest');
Route::get('/run',function(){
Sentinel::getRoleRepository()->createModel()->create([
    'name' => 'Student',
    'slug' => 'student',
    'permissions'   => array(
        'Addcourse' => true,
    ),
]);
Sentinel::getRoleRepository()->createModel()->create([
    'name' => 'Tutor',
    'slug' => 'Tutor',
    'permissions'   => array(
        'Interest' => true,

    ),
]);
});
