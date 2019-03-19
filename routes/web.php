<?php

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

Route::get('/', 'maincontroller@index');
Route::get('/member/register', 'maincontroller@register');
Route::post('/checklogin','maincontroller@checklogin');
Route::post('/register','maincontroller@registration');
Route::get('/activation/{emailaddress}/stardom_dashboard','maincontroller@activateEmail');
Route::get('/activation/forbidden39e871871bcacae98a50eec3699ac173/stardom_dashboard', 'maincontroller@forbidden')->name('forbidden');
Route::get('/activation/success/39e871871bcacae98a50eec3699ac173/stardom_dashboard', 'maincontroller@activatedmessage')->name('activatedmessage');
Route::get('/activation/failedReuse/39e871871bcacae98a50eec3699ac173/stardom_dashboard', 'maincontroller@msg')->name('msg');
Route::get('/OneTimePassword/verify/{emailaddress}/39e871871bcacae98a50eec3699ac173/stardom_dashboard', 'maincontroller@otp')->name('otp');
Route::post('checkotp','maincontroller@checkotp');
Route::get('/stardom_dashboard/profile','maincontroller@stardom_dashboard');
Route::post('/resendOTP','maincontroller@resendOTP');
Route::post('/savepost','maincontroller@savepost');
Route::post('/loadfeeds','maincontroller@loadfeeds');
