<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', 'HomeController@index')->name('guest-index');

Route::get('/ricerca', function () {return view('guest.search');})->name('ricerca-avanzata');


// Collegamento ai profili
Route::get('/doctor', 'DoctorController@index')->name('show.doctors');
// Collegamento dottori
Route::get('/doctor/{id}','DoctorController@showProfile')->name('show.doctor');
// Recensioni e messaggi
Route::post('/message','GuestMessageController@store');
Route::post('/review', 'ReviewController@store');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name
// ('home')->middleware('auth');

Route::prefix('admin')
->namespace('Admin')
->middleware('auth')
->group(function () {

Route::get('/', 'DoctorController@index')->name('dashboard-dottore');
// Route::get('/profilo', 'DoctorController@create')->name('profilo-dottore');
Route::get('/sponsorizzazioni', function () {return view('admin.sponsor');})->name('sponsorizzazioni-dottore');

// Rotta profilo
Route::resource('/doctor', 'DoctorController');
Route::get('/create', 'DoctorController@edit')->name('crea-dottore');
Route::post('/create', 'DoctorController@update')->name('crea-dottore');
// Rotta messaggio
Route::get('/message', 'AdminMessageController@index')->name('admin.message');
Route::delete('/message/{mess}', 'AdminMessageController@destroy')->name('message.destroy');
// Rotta recensioni
Route::resource('/review', 'AdminReviewController');
// Rotta statistiche
Route::resource('/statistics', 'chartController');
Route::get('/statistics', 'chartController@index')->name('admin.statistics');
});
