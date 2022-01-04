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

/* Route::get('', function () {
    return view('maintenance');
}); */

Route::get('', 'HomeController@home');
Route::get('blog/{slug}', 'HomeController@blog');
Route::get('news/{slug}', 'HomeController@news');
Route::get('about', 'HomeController@about');
Route::get('contact', 'HomeController@contact');
Route::get('blogs', 'HomeController@blogs');
Route::get('sponsors', 'HomeController@sponsors');
Route::get('legal/{slug}', 'HomeController@legal');

Route::get('mua', 'HomeController@mua');
Route::get('faq', 'HomeController@faq');
Route::get('media', 'HomeController@media');

if(setting('site.registration')) {
    Route::get('enroll', ['as'=>'enroll.one','uses'=>'EnrollController@stepone']);
    Route::get('enroll/{id}/pay', ['as'=>'enroll.two', 'uses'=>'EnrollController@steptwo']);
    Route::get('enroll/{id}/account', ['as'=>'enroll.three', 'uses'=>'EnrollController@stepthree']);
    Route::get('enroll/{id}/success', ['as'=>'enroll.success', 'uses'=>'EnrollController@success']);
    
    Route::post('enroll', ['as'=>'enroll','uses'=>'EnrollController@enroll']);
    Route::post('enroll/pay', ['as'=>'enroll.pay', 'uses'=>'EnrollController@pay']);
    Route::post('enroll/account', ['as'=>'enroll.account', 'uses'=>'EnrollController@account']);
    
    Route::get('enroll/pay', 'EnrollController@redirect');
    Route::get('enroll/account', 'EnrollController@redirect');
} else {
    Route::get('enroll', ['as'=>'enroll.closed','uses'=>'EnrollController@closed']);
}

Route::post('contact/send', ['as'=>'contact','uses'=>'HomeController@contactform']);

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
