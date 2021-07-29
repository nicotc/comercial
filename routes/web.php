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
/* ['verify' => true] */
/* Route::get('/home', 'HomeController@index')->middleware('verified');
 */

    Route::get('/home', 'HomeController@index')->name('home');


    Route::resource('yidn2orderstats', 'yidn2orderstatsController');
    Route::resource('yidn2wccustomerlookups', 'yidn2wccustomerlookupController');
    Route::resource('uorder', 'UorderController');
    Route::resource('eorder', 'EorderController');
    Route::resource('ordenes', 'ordenesController');
    Route::resource('importars', 'importarController');
    Route::resource('importarItems', 'importar_itemsController');
    Route::resource('ordenesitems', 'ordenesitemsController');
    Route::resource('porcentajes', 'PorcentajesController');
    Route::resource('users', 'UserController');
