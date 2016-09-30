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
/*Student Middleware*/
    Route::group(['middleware' => ['Checkuser:Student']], function () {
        Route::get('/addcourse', function(){return view('addcourse');});
        Route::post('/addcourse', 'JobController@addcourse');
        Route::get('/addcredit', function(){return view('addcredit');});
        Route::post('/addcredit', 'CreditController@addcredit');
        Route::post('/confirmcredit', 'CreditController@confirmcredit');
        Route::get('/viewmycourse', 'JobController@viewmycourse');
        Route::get('/viewmycourse/{id}', 'JobController@manage');
        Route::get('/viewmycourse/{id}/select/{tutorid}', 'JobController@selecttutor');
    });
/*Tutor Middleware*/
    Route::group(['middleware'=>['Checkuser:Tutor']], function(){
        Route::get('/course/{id}/uninterest', 'JobController@uninterest');
        

    });
/*Admin middleware*/
    Route::group(['middleware' => ['Checkuser:Admin']], function () {
        Route::get('/admin/credit/approve/{id}', 'CreditController@approvecredit');
        Route::get('/admin', 'AdminController@dashboard');
    });
    Route::get('/', 'JobController@showcourse')->name('welcome');
/*Register */
    Route::get('/studentregister', function(){
        return view('register');
    });
    Route::post('/studentregister','RegisterController@registerStudent');
    Route::post('/tutorregister', 'RegisterController@registerTutor');
    Route::get('/tutorregister', function(){
        return view('register');
    });
/*End Register */

Route::get('/course/{id}', 'JobController@showcoursepage');
Route::get('/login', function(){
    return view('login');
});
Route::post('/login', 'RegisterController@login');
Route::get('/logout', function(){
    Sentinel::logout();
    return redirect()->route('welcome');
});

Route::get('/course/{id}/interest', 'JobController@interest');

/*-------------------------*/
//Below here is for Debugging Purpose
//Not complete need to be implemented ASAP.
    Route::get('/assignadmin', function(){
        $user = Sentinel::findById(3);
        $role = Sentinel::findRoleByName('Admin');
        $role->users()->attach($user);
    });

    Route::get('/check', function(){
        return var_dump(Sentinel::check());
    });

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
    Sentinel::getRoleRepository()->createModel()->create([
        'name' => 'Admin',
        'slug' => 'Admin',
        'permissions'   => array(
            'dashboard.view' => true,

        ),
    ]);
    Sentinel::getRoleRepository()->createModel()->create([
        'name' => 'Staff',
        'slug' => 'Staff',
        'permissions'   => array(
            'dashboard.view' => true,

        ),
    ]);
    });
