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
/*Student specific route Middleware*/
    Route::group(['middleware' => ['Checkuser:Student', 'Checkprivilege']], function () {
        Route::get('/viewmycourse/{id}', 'JobController@manage')->name('viewmycoursepage'); //need implement view code
        Route::get('/viewmycourse/{id}/select/{tutorid}', 'JobController@selecttutor')->name('selecttutor');
        Route::get('/viewmycourse/{id}/profile/{tutorid}', 'JobController@viewprofile')->name('tutorprofile');

    });
/*Student Middleware*/
    Route::group(['middleware' => ['Checkuser:Student']], function () {
        Route::get('/addcourse', function(){return view('student-addcourse');})->name('addcourse');
        Route::post('/addcourse', 'JobController@addcourse');
        Route::get('/addcredit', function(){return view('student-addcredit');})->name('addcredit');
        Route::post('/addcredit', 'CreditController@addcredit');
        Route::post('/confirmcredit', 'CreditController@confirmcredit');
        Route::get('/viewmycourse', 'JobController@viewmycourse')->name('viewmycourse');
        Route::get('/updateprofile', 'RegisterController@myprofile');
        Route::put('/updateprofile', 'RegisterController@updatemyprofile');
        //Support need implement!
        //Route::get('/support/{courseid}' ,'SupportController@contact');
        //Route::post('/support/{courseid}', 'SupportController@submit');
    });
/*Tutor Middleware*/
    Route::group(['middleware'=>['Checkuser:Tutor']], function(){
        Route::get('/course/{id}/uninterest', 'JobController@uninterest');
        Route::get('/course/{id}/interest', 'JobController@interest');
        Route::get('/course', 'JobController@showcourse')->name('course');
        Route::get('/course/{id}', 'JobController@showcoursepage')->name('courseinfo');
        Route::get('/answered', 'JobController@tutoranswered')->name('tutoranswered');
        Route::get('/verify/{id}', 'JobController@verify')->name('verify');
        Route::get('/verify/{courseid}/{code}', 'JobController@doverify')->name('doverify');
        Route::get('/myprofile', 'RegisterController@myprofiletutor');
        Route::put('/myprofile', 'RegisterController@updatemyprofiletutor');
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
        return mt_rand(100000, 999999);
    })->name('welcome');
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
