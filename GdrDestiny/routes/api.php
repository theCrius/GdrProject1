<?php

use App\Http\Controllers\MessageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//messages actions
Route::post('/user/messages/delete','MessageController@destroy')->name('deleteMessages');
Route::get('/user/{idUser}/messages','MessageController@show')->name('showMessages');
Route::get('/user/{idUser}/newMessages','MessageController@showNewMessages')->name('showNewMessages');


//get constants from gdrConst file
Route::name('gdrConsts.')->prefix('/consts')->group(function () {
    
    Route::get('messages','gdrConstsController@showConstsMessages')->name('messages'); 

});

//to update the meteo
Route::name('meteo.update.')->prefix('/meteo/update')->group(function(){

    Route::put('/topmap/{idTopmap}','TopmapController@update')->name('topmap');
    Route::put('/middlemap/{idMiddlemap}','MiddlemapController@update')->name('middlemap');
    Route::put('/bottommap/{idBottommap}','BottommapController@update')->name('bottommap');

});

Route::name('meteo.get.')->prefix('/meteo/get')->group(function(){

    Route::get('/topmap/{idTopmap}','TopmapController@showMeteo')->name('topmap');
    Route::get('/middlemap/{idMiddlemap}','MiddlemapController@showMeteo')->name('middlemap');
    Route::get('/bottommap/{idBottommap}','BottommapController@showMeteo')->name('bottommap');


});
Route::get('/user/all','UserController@allUsers')->name('allUsers');

