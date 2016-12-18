<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('login');
});
Route::post('login','HomeController@login');
Route::get('logout','HomeController@logout');
Route::get('register','HomeController@register');
route::post('regisform','HomeController@regisform');
Route::get('dashboard','HomeController@dashboard');
Route::get('dashboard/admin','HomeController@dashboardAdmin');
Route::get('dashboard/dosen','HomeController@dosen');

Route::get('dailylog/{id_akt?}','DailyLogController@dailylog');
Route::get('dailyLog/remove/{id_akt}','DailyLogController@dailylogRemove');
Route::post('postdailylog','DailyLogController@posdailylog');

Route::get('proposal','InternController@proposal');
Route::post('daftarkp','InternController@daftarkp');
route::get('internform','InternController@intern');

Route::get('companylist','CompanyController@listperusahaan');
Route::get('company/remove/{id}','CompanyController@listperusahaanRemove');
Route::get('company/update/{id}','CompanyController@listperusahaanUpdate');
route::post('tambahperusahaan','CompanyController@tambahperusahaan');
route::post('updateperusahaan','CompanyController@updateperusahaan');

Route::get('dosen','HomeController@registerDosen');
route::post('dosen','HomeController@regisformDosen');
route::get('admin/approval/{id}','AdminController@approval');
route::post('admin/approval/{id}','AdminController@approval');

Route::get('accepted','AdminController@accepted');
route::get('rejected','AdminController@rejected');
route::get('logs/{id}','AdminController@logs');
