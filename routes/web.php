<?php
/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
Route::get('/detail/freeday', function () {
    return view('freedaydetail');
});

Route::get('/phpmyadmin', function(){
	return view('errors.pmyadmin');
});
Route::get('/admin', function(){
        return view('errors.myadmin');
});



// Route::get('tools/labreport-print', 'LabReportController@showSummary');

//        Route::get('/tools/labreport-print', function () {
  //              return view('abstract.index');
    //    });
      //  Route::post('/tools/labreport-print', function(){
        //            return view('abstract.index');
          //  });


//Remove below comment if no symlinks
Route::get('img/profile/{img_name}', 'ImageController@profilePicture');
Route::get('img/staff/{img_name}', 'ImageController@staffPicture');
Route::get('download/pdf/{pdf_filename}', 'PDFController@download');

//No Csrf Protection Api
Route::group(['prefix' => 'api/v1' , 'middleware' => ['api-special', 'role:admin|senior|junior|staff']], function () {
Route::get('freeday/server-time', 'Api\v1\FreeDayController@serverTime');
    Route::post('freeday/get', 'Api\v1\FreeDayController@checkGet');
    Route::get('freeday/getusers', 'Api\v1\FreeDayController@getUsers');
    Route::post('freeday/check', 'Api\v1\FreeDayController@checkPost');
    Route::post('freeday/remove', 'Api\v1\FreeDayController@removePost');
});



Route::group(['prefix' => 'api/v1' , 'middleware' => ['api-special', 'role:admin|senior|junior']], function () {

    Route::post('user-picture/{camp_id}/upload', 'Api\v1\UserProfileController@uploadPicture');
    Route::post('staff-picture/{number}/upload', 'Api\v1\StaffProfileController@uploadPicture');

    Route::get('attendance/server-time', 'Api\v1\AttendanceCheckingController@serverTime');
    Route::post('attendance/get', 'Api\v1\AttendanceCheckingController@checkGet');
    Route::get('attendance/getusers', 'Api\v1\AttendanceCheckingController@getUsers');
    Route::post('attendance/check', 'Api\v1\AttendanceCheckingController@checkPost');
    Route::post('attendance/remove', 'Api\v1\AttendanceCheckingController@removePost');


});

Route::group(['prefix' => 'api/v1' , 'middleware' => ['web', 'role:admin|senior|junior', 'api']], function () {
    Route::get('user-profile/{searchStr}', 'Api\v1\UserProfileController@find');
    Route::get('user-card-html/{camp_id}', 'Api\v1\UserProfileController@getUserCardHTMLbyId');

    Route::get('staff-profile/{searchStr}', 'Api\v1\StaffProfileController@find');
    Route::get('staff-card-html/{camp_id}', 'Api\v1\StaffProfileController@getUserCardHTMLbyId');
});

Route::group(['middleware' => ['web', 'auth']], function () {

    //Route::get('logout', 'Auth\AuthController@logout');

    Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
    Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
    Route::post('password/reset', 'Auth\PasswordController@reset');

    Route::get('/', function () {
        return view('home');
    });
    Route::get('/starvotefinal', function () {
        return view('starvotefinal');
    });
    Route::get('/vote', function () {
        return view('vote');
    });
    Route::get('/allStar', function () {
        return view('liststar');
    });
    Route::post('/allStar', function () {
        return view('liststar');
    });
    Route::get('/dashboard', 'DashboardController@show');
    Route::get('/change-password', 'ProfileController@changepasswordShow');
    Route::get('/dashboard', function() {
       return redirect('/');
    });


//Router User 

    Route::group(['middleware' => ['role:admin|user|usertest']], function(){
        Route::get('profile/labreport', 'LabReportController@show');
        Route::post('profile/labreport', 'LabReportController@submit');
//	    Route::get('profile/starvote/viewpicture/wa','');
	    Route::get('checkAttendanceLog', 'AttendanceCheckingController@log');

//      Route::get('final/{params}', 'FinalStarVoteController@getForReturn');
//      Route::post('final/{params}', 'FinalStarVoteController@postToSave');
    });

    Route::group(['middleware' => ['role:admin|senior|junior|user|usertest|staff']], function(){
        Route::get('profile/resetpassword', 'ResetPasswordController@show');
        Route::post('profile/resetpassword', 'ResetPasswordController@resetpassword');

        Route::get('profile/starvote', 'StarVoteController@showvote');
        Route::get('profile/starvote/viewpicture', 'StarVoteController@viewpicture');
        Route::get('profile/starvote/DiaoChan', 'StarVoteController@glacio');
        Route::get('profile/starvote/Lubu', 'StarVoteController@fulmo');
        Route::get('profile/starvote/XiahouYuan', 'StarVoteController@arbaro');
        Route::get('profile/starvote/ZhugeLiang', 'StarVoteController@lafo');
	Route::get('/announcement/StarvoteResult', function() {
       		return view('starvoteResult');
    	});

	 Route::get('tools/labreport-print', 'LabReportController@showSummary');

        Route::get('/tools/labreport-print', function () {
                return view('abstract.index');
        });
        Route::post('/tools/labreport-print', function(){
                    return view('abstract.index');
            });

        Route::post('profile/starvote/DiaoChan/', 'StarVoteController@Vote');
        Route::post('profile/starvote/Lubu/', 'StarVoteController@Vote');
        Route::post('profile/starvote/XiahouYuan/', 'StarVoteController@Vote');
        Route::post('profile/starvote/ZhugeLiang/', 'StarVoteController@Vote');
    });



    Route::group(['middleware' => ['role:admin|senior|junior']], function(){

	Route::get('final/{params}', 'FinalStarVoteController@getForReturn');
    Route::post('final/{params}', 'FinalStarVoteController@postToSave');
	Route::get('/leaflet2/status', 'leafletController@show');
	Route::post('/leaflet2/status', 'leafletController@Approve');
	Route::get('/protocol/Staffuser', function () {
                return view('userlist');
        });
	Route::get('/protocol/checkBack', function () {
                return view('checkBack.check');
        });

	Route::get('/list/Dataviewer', function () {
                return view('dataviewer');
        });

	Route::get('/System/Registration', function () {
                return view('allRegis');
        });

    Route::get('/leaflet2', function () {
                return view('leaflet.index');
    });

    Route::post('/leaflet2', function () {
                return view('leaflet.index');
    });
	
	Route::get('/Report/Sum', function(){
		return view('Report.index');
	});

        Route::get('/VoteResult/StarCount', function () {
        	return view('VoteCount.StarCount');
	});
        Route::get('/VoteResult/StaffCount', function () {
        	return view('VoteCount.StaffCount');
        });

    });
	Route::group(['middleware' => ['role:admin|senior|junior|staff']], function(){

	Route::get('tools/freeday-checking', 'FreeDayController@show');
	});


    Route::group(['middleware' => ['role:admin|senior|junior']], function(){

        Route::get('tools/labreport-summary', 'LabReportController@showSummary');

	

        Route::get('tools/userdata-viewer', 'UserDataViewerController@show');
        Route::get('tools/attendance-checking', 'AttendanceCheckingController@show');
        Route::get('tools/rfid-attendance-checking', 'RfidAttendanceCheckingController@show');
        Route::get('tools/qr-attendance-checking', 'QRAttendanceCheckingController@show');

        Route::get('tools/create-user', 'CreateUserController@show');
        Route::post('tools/create-user', 'CreateUserController@insert');
	Route::get('tools/freeday', function(){
	    return view('freeday.select');
	});

        Route::get('tools/freeday/{userid}', function($userid){
            return view('freeday.register', ['userid' => $userid]);
        });
        Route::post('tools/freeday/{userid}', function($userid){
            return view('freeday.register', ['userid' => $userid]);
        });
        Route::get('tools/edit-user/{userid}', 'EditUserController@show');
        Route::post('tools/edit-user', 'EditUserController@save');
	    Route::get('tools/attendance-log', function(){
	            return view('Report.attendance');
	    });

	    Route::post('tools/attendance-log', function(){
	            return view('Report.attendance');
	    });

        Route::get('magic/first-time-registration', 'FirstTimeRegistrationController@chooseType');
        Route::post('magic/first-time-registration/photo', 'FirstTimeRegistrationController@takePhoto');
        Route::post('magic/first-time-registration/informationTH', 'FirstTimeRegistrationController@informationTH');
        Route::post('magic/first-time-registration/RFIDth', 'FirstTimeRegistrationController@RFIDth');
        Route::post('magic/first-time-registration/informationEN', 'FirstTimeRegistrationController@informationEN');
	    Route::post('magic/first-time-registration/register', 'FirstTimeRegistrationController@register');
        Route::post('magic/first-time-registration/finish', 'FirstTimeRegistrationController@finish');

        Route::get('tools/master-resetpassword', 'MasterResetPasswordController@show');
        Route::post('tools/master-resetpassword', 'MasterResetPasswordController@resetpassword');

        Route::get('/magic/staff-registration', 'StaffProfileRegisController@show');
        Route::post('/magic/staff-registration/photo', 'StaffProfileRegisController@takePhoto');
        Route::post('/magic/staff-registration/finish', 'StaffProfileRegisController@finish');

        Route::get('/tools/staffdata-viewer','StaffDataViewerController@show');
	    
        Route::get('/Protocol/checkList', function () {
                return view('checkList');
        });



    	Route::get('/Protocol/checkFirstTime', function(){
    		return view('checkFirst');
    	});
    	Route::get('/Protocol/checkFinishRegis', function(){
    		return view('checkRegis');
    	});
       

        Route::get('/Protocol/checkAll', function () {
                return view('all.index');
        });
        Route::post('/Protocol/checkAll', function(){
                    return view('all.index');
        });

    });

    Route::group(['middleware' => ['role:admin']], function(){
        Route::get('tools/data-importer', 'DataImporterController@show');
        Route::post('tools/data-importer/validation', 'DataImporterController@upload');
        Route::post('tools/data-importer/insert', 'DataImporterController@insert');
        Route::get('tools/data-importer/finish', 'DataImporterController@finish');
        Route::get('tools/data-importer/finish', 'DataImporterController@finish');
    });

});

/* 
Route::group(['middleware' => 'web'], function () {

    Route::get('login', 'Auth\AuthController@showLoginForm');
    Route::post('login', 'Auth\AuthController@login');

    // Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
    // Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
    // Route::post('password/reset', 'Auth\PasswordController@reset');

});
*/


/*    Can be replace by Route::auth();

    // Authentication Routes...
    Route::get('login', 'Auth\AuthController@showLoginForm');
    Route::post('login', 'Auth\AuthController@login');
    Route::get('logout', 'Auth\AuthController@logout');

     Registration Routes...
    Route::get('register', 'Auth\AuthController@showRegistrationForm');
    Route::post('register', 'Auth\AuthController@register');

    // Password Reset Routes...
    Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
    Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
    Route::post('password/reset', 'Auth\PasswordController@reset');
*/


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
