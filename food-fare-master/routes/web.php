<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/','LoginController@index');

Route::get('/login', function () {
    return view('login',['errors'=>[]]);
});
Route::post('/loginSubmit','LoginController@loginSubmit');

Route::get('/signup', function () {
    return view('signup',['errors'=>[]]);
});


Route::get('/forgetpassword', function () {
    return view('forgot',['errors'=>[]]);
});
Route::post('/signUpSubmit','LoginController@signUpSubmit');

Route::get('/admin/login', function () {
    return view('adminlogin',['errors'=>[]]);
});


Route::post('/adminSubmit','LoginController@adminSubmit');
Route::post('/forgetpasswordSubmit','LoginController@forgetpasswordSubmit');
Route::post('/checkemail','LoginController@emailCheck');



Route::group(['middleware' => ['session.check']], function () {
    
    Route::get('/adminmagazines', function () {
        return view('adminmagazines',['errors'=>[]]);
    });
    Route::get('/home', function () {
		return view('index',['errors'=>[]]);
	});
	
	
    Route::post('/adminEventSubmit','AdminController@adminEventSubmit');
    Route::get('/addnewenvent', function () {
        return view('addnewenvent',['errors'=>[]]);
    });
    Route::get('/adminhomepage','AdminController@adminEventList');
	
	Route::get('/deleteEvent/{id}','AdminController@deleteEvent');
	Route::get('/editadminprofile','AdminController@editAdminProfile');
	Route::post('/updateAdminProfile','AdminController@updateAdminProfile');
    Route::post('/editevent','AdminController@editAdmin');
    Route::post('/adminMagazine','AdminController@adminMagazineSubmit');
	   
    
    Route::post('/registerevent','UserController@registerEvent');
    //user
	Route::get('/editprofile','UserController@editProfile');
	Route::post('/updateProfile','UserController@updateProfile');
	Route::get('/listingdata/{listing}/{strategy}','UserController@strategyMethod');
    Route::get('/eventsdata','UserController@eventsData');
    
    Route::get('/magazinedata','UserController@magazineData');
    Route::get('/magazines', function () {
        return view('magazines',['errors'=>[]]);
    });
    
    Route::get('/newevents', function () {
        return view('newevents');
	});
		
	Route::get('/magazinelist','AdminController@magazineList');
		
	Route::get('/deleteMagazine/{id}','AdminController@deleteMagazine');

    Route::get('/participation','UserController@participation');
    Route::post('/unregisterEvent','UserController@unregisterEvent');
    Route::get('/logout','LoginController@logout');
});