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
Route::get('dailylog','HomeController@dailylog');
Route::get('companylist','HomeController@listperusahaan');
Route::post('login','HomeController@login');
Route::post('postdailylog','HomeController@posdailylog');
Route::get('register','HomeController@register');
route::post('regisform','HomeController@regisform');
Route::get('dashboard','HomeController@dashboard');
route::get('internform','HomeController@intern');
route::post('tambahperusahaan','HomeController@tambahperusahaan');
Route::get('proposal','HomeController@proposal');
Route::post('daftarkp','HomeController@daftarkp');
Route::get('logout','HomeController@logout');