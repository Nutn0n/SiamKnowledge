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
        Route::get('/addcourse', function(){return view('addcourse');})->name('addcourse');
        Route::post('/addcourse', 'JobController@addcourse');
        Route::get('/addcredit', function(){return view('addcredit');})->name('addcredit');
        Route::post('/addcredit', 'CreditController@addcredit');
        Route::post('/confirmcredit', 'CreditController@confirmcredit');
        Route::get('/viewmycourse', 'JobController@viewmycourse')->name('viewmycourse');
        Route::get('/viewmycourse/{id}', 'JobController@manage');
        Route::get('/viewmycourse/{id}/select/{tutorid}', 'JobController@selecttutor');
        Route::get('/profile/{id}', 'JobController@viewprofile');
        Route::get('/myprofile', function(){return view('student-profile');});
    });
/*Tutor Middleware*/
    Route::group(['middleware'=>['Checkuser:Tutor']], function(){
        Route::get('/course/{id}/uninterest', 'JobController@uninterest');
        Route::get('/course/{id}/interest', 'JobController@interest');
        Route::get('/course', function(){return view('showcourse');});

    });
/*Admin middleware*/
    Route::group(['middleware' => ['Checkuser:Admin']], function () {
        Route::get('/admin/credit/approve/{id}', 'CreditController@approvecredit');
        Route::get('/admin', 'AdminController@dashboard');
    });
/*Guest middleware*/
    Route::group(['middleware' => ['Guest']], function () {
        /*Register */
            Route::get('/studentregister', function(){return view('register');})->name('register');
            Route::post('/studentregister','RegisterController@registerStudent');
            Route::post('/tutorregister', 'RegisterController@registerTutor');
            Route::get('/tutorregister', function(){return view('register');});
            Route::get('/login', function(){return view('login');});
            Route::post('/login', 'RegisterController@login');
        /*End Register */
    });
/*Not protected route*/
    Route::get('/', function(){
        return 'welcome';
    })->name('welcome');
    //Route::get('/course/{id}', 'JobController@showcoursepage');
/*End not protected route*/

Route::get('/logout', function(){
    Sentinel::logout();
    return redirect()->route('welcome');
});


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
        'name' => 'Reception',
        'slug' => 'Reception',
        'permissions'   => array(
            'dashboard.view' => true,
            'profile.view' =>true,

        ),
    ]);
    Sentinel::getRoleRepository()->createModel()->create([
        'name' => 'Support',
        'slug' => 'Support',
        'permissions'   => array(
            'dashboard.view' => true,
            'support.panel' =>true,

        ),
    ]);
    Sentinel::getRoleRepository()->createModel()->create([
        'name' => 'Business',
        'slug' => 'Business',
        'permissions'   => array(
            'dashboard.money.view' => true,
            'credit.edit' =>true,

        ),
    ]);
    });
