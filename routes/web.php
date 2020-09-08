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

Route::get('/writings_outers', 'WritingsController@index' );
Route::get('/check_writings', 'WritingsController@create' );
Route::post('/create_writings', 'WritingsController@store' );
Route::get('/{user}/edit_outers', 'WritingsController@edit' );
Route::get('/{user}/preview_outers', 'WritingsController@preview' );
Route::post('/update_outers', 'WritingsController@update' ); 

Route::get('/writings_inner', 'InnerController@index' );
Route::get('/check_writings_inner', 'InnerController@create' );
Route::post('/create_writings_inner', 'InnerController@store' );
Route::get('/{user}/edit_outers_inner', 'InnerController@edit' );
Route::get('/{user}/preview_outers_inner', 'InnerController@preview' );
Route::post('/update_inner', 'InnerController@update' ); 

Route::get('/chcek_setions', 'InnerController@chcek_setions' );

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
