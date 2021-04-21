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
// Ricerca per città
// Route::post('/search','DoctorController@search')->name('search');
// Da controllare
// Inivio messaggio guest
Route::resource('/send_message', 'GuestMessageController');
// Inivio recensione guest
Route::resource('/send_review', 'ReviewController');



Auth::routes();

// Route::get('/home', 'HomeController@index')->name
// ('home')->middleware('auth');

Route::prefix('admin')
->namespace('Admin')
->middleware('auth')
->group(function () {

Route::get('/', 'DoctorController@index')->name('dashboard-dottore');
Route::get('/profilo', 'DoctorController@create')->name('profilo-dottore');
Route::get('/sponsorizzazioni', function () {return view('admin.sponsor');})->name('sponsorizzazioni-dottore');

// Rotta profilo
Route::resource('/doctor', 'DoctorController');
// Rotta messaggio
Route::resource('/message', 'AdminMessageController');
// Rotta recensioni
Route::resource('/review', 'AdminReviewController');
// Rotta statistiche
Route::resource('/statistics', 'AdminStatisticsController');
});
