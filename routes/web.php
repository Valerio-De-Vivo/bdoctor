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
Route::post('/doctor/{id', 'GuestMessageController@store')->name('guest.doctor.show');
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


Route::get('/admin/checkout', 'PaymentController@checkout', function () {
  $gateway = new Gateway([
  'environment' => 'sandbox',
  'merchantId' => 'z9xjz69y8xcr6b76',
  'publicKey' => '6zx6h86sj6fk4r84',
  'privateKey' => 'afedfc1902367c2089fa3388146d7841'
  ]);
})->name('admin-checkout');
// Route::post('/admin/checkout', 'PaymentController@checkout');


Route::get('/homepagamento', function () {
    $gateway = new Gateway([
        'environment' => config('sandbox'),
        'merchantId' => config('z9xjz69y8xcr6b76'),
        'publicKey' => config('6zx6h86sj6fk4r84'),
        'privateKey' => config('afedfc1902367c2089fa3388146d7841')
    ]);

    $token = $gateway->ClientToken()->generate();

    return view('admin.homepagamento', [
        'token' => $token
    ]);
});

Route::post('/checkout', function (Request $request) {
    $gateway = new Gateway([
      'environment' => config('sandbox'),
      'merchantId' => config('z9xjz69y8xcr6b76'),
      'publicKey' => config('6zx6h86sj6fk4r84'),
      'privateKey' => config('afedfc1902367c2089fa3388146d7841')
    ]);

    $amount = $request->amount;
    $nonce = $request->payment_method_nonce;

    $result = $gateway->transaction()->sale([
        'amount' => $amount,
        'paymentMethodNonce' => $nonce,
        'customer' => [
            'firstName' => 'Tony',
            'lastName' => 'Stark',
            'email' => 'tony@avengers.com',
        ],
        'options' => [
            'submitForSettlement' => true
        ]
    ]);

    if ($result->success) {
        $transaction = $result->transaction;
        // header("Location: transaction.php?id=" . $transaction->id);

        return back()->with('success_message', 'Transaction successful. The ID is:'. $transaction->id);
    } else {
        $errorString = "";

        foreach ($result->errors->deepAll() as $error) {
            $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
        }

        // $_SESSION["errors"] = $errorString;
        // header("Location: index.php");
        return back()->withErrors('An error occurred with the message: '.$result->message);
    }
});

Route::get('/hosted', function () {
    $gateway = new Gateway([
      'environment' => config('sandbox'),
      'merchantId' => config('z9xjz69y8xcr6b76'),
      'publicKey' => config('6zx6h86sj6fk4r84'),
      'privateKey' => config('afedfc1902367c2089fa3388146d7841')
    ]);

    $token = $gateway->ClientToken()->generate();

    return view('admin.hostedpagamento', [
        'token' => $token
    ]);
});
