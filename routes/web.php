<?php

use Illuminate\Support\Facades\Route;
use App\Mail\WelcomeEmail;

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
    Session::put('name_title', "Welcome To CMS");
    return view('welcome');
});
// CMS Rote List

//Route::prefix('admin')->middleware('auth')->group(function () {

//Route::prefix('admin')->middleware(['auth', 'password.confirm', 'verified'])->group(function () {   // passwordconfim and email verification

//Route::prefix('admin')->middleware(['auth','can:isAdmin'])->group(function () { // simple Gate

//Route::prefix('admin')->middleware(['auth','can:isAllowed, "Admin:Super Admin"'])->group(function () { // Parameter Gate

Route::prefix('admin')->middleware(['auth', /*'password.confirm',*/ 'verified', 'can:isAdmin'])->group(function () {
    Route::view('/', 'dashboard.admin');
    Route::resource('roles', 'RoleController');
    Route::resource('countries', 'CountryController');
    Route::resource('users', 'UserController');
    Route::resource('categories', 'CategoryController');
    Route::resource('products', 'ProductController');
    Route::resource('purchases', 'PurchaseController');

	Route::post('get-product', ['as'=>'get-product','uses'=>'PurchaseController@getProduct']);
	Route::post('get-amount', ['as'=>'get-amount','uses'=>'PurchaseController@getAmount']);
});

//Auth::routes();
Auth::routes(['verify' => true]); // 'register' => false array ma ad karvanthi remove register functionality.

Route::get('/home', 'HomeController@index')->name('home')->middleware('checkUser');

// see email preview
Route::get('/email', function(){
    return new WelcomeEmail();
});