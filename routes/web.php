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
/*Route::group(['middleware'=>['web']],function(){

    Route::resource('users','UserController');
    Route::auth();
    });*/
    /*Route::group(['middleware' =>['web']],function(){
        Route:resource('users','UserController');


    });*/

Route::get('/wypisz_firmy', 'CompaniesController@index' );
Route::get('/check_firmy', 'CompaniesController@create' );
Route::post('/create_company', 'CompaniesController@store' );
Route::post('/update_company', 'CompaniesController@update' );
Route::get('/{user}/edit_firmy', 'CompaniesController@edit' );



Route::get('/wypisywanie', 'UserController@index' );
Route::get('/check_create', 'UserController@create' );
Route::post('/create', 'UserController@store' );
Route::get('/{user}/edit', 'UserController@edit' );
Route::post('/update', 'UserController@update' );

Route::get('/check_writings', 'WritingsController@create' );
Route::post('/create_writings', 'WritingsController@store' );

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
