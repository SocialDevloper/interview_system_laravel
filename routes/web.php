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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
/* login with google A/c */
Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');

/* login with Facebook */
Route::get('auth/facebook', 'Auth\FacebookController@redirectToFacebook');
Route::get('auth/facebook/callback', 'Auth\FacebookController@handleFacebookCallback');

/* candidate */
Route::get('candidate/{candidate}/remove', 'CandidateController@remove')->name('candidate.remove');
Route::get('candidate/trash', 'CandidateController@trash')->name('candidate.trash');
Route::get('candidate/recover/{id}', 'CandidateController@recoverCand')->name('candidate.recover');
Route::post('candidate/fetchAll', 'CandidateController@fetchAll')->name('candidate.fetchAll');
Route::get('lang/{locale}', 'LocalizationController@index');
Route::get('candidate/lang/{locale}', 'LocalizationController@index');
Route::resource('candidate', 'CandidateController');

/* For datatable candidate listing */
Route::post('/daterange/fetch_data', 'DateRangeController@fetch_data')->name('daterange.fetch_data');
Route::resource('daterange', 'DateRangeController');
Route::post('export', 'DateRangeController@export')->name('export');
Route::get('importExportView', 'DateRangeController@importExportView');
Route::post('import', 'DateRangeController@import')->name('import');

Route::post('pdf','DateRangeController@createPDF')->name('makePdf');;

// post AJAX
Route::resource('posts', 'PostController');


Route::resource('crud','CrudsController');

// Employee Crud with all attribute of form
Route::resource('employees', 'EmployeeController');

// AJAX Student all attribute of form
Route::resource('students', 'StudentController');

Route::post('students/update', 'StudentController@update')->name('students.update');

Route::get('students/destroy/{id}', 'StudentController@destroy');

