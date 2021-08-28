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
Route::put('/message/update','MessageController@update')->name('updateMessage');



//get constants from gdrConst file
Route::name('gdrConsts.')->prefix('/consts')->group(function () {
    
    Route::get('messages','gdrConstsController@showConstsMessages')->name('messages');
    Route::get('meteo','gdrConstsController@showConstsMeteo')->name('meteo');
    Route::get('chat','gdrConstsController@showConstsChat')->name('chat');
    

});

//to update the meteo
Route::name('meteo.update.')->prefix('/meteo/update')->group(function(){

    Route::put('/middlemap/{idMiddlemap}','MiddlemapController@update')->name('middlemap');
    Route::put('/bottommap/{idBottommap}','BottommapController@update')->name('bottommap');

});

//to get info meteo
Route::name('meteo.get.')->prefix('/meteo/get')->group(function(){

    Route::get('/middlemap/{idMiddlemap}','MiddlemapController@showMeteo')->name('middlemap');
    Route::get('/bottommap/{idBottommap}','BottommapController@showMeteo')->name('bottommap');


});

//action route
Route::get('/action/{idChat}/last','ActionController@show')->name('action.show');
Route::post('/action/{idChat}/store', 'ActionController@store')->name('action.store');

// add one news in chat
Route::post("/chat/{chat}/news/add","ChatNewsController@create");
Route::delete('/news/{news}',"ChatNewsController@destroy");

//system of user online
Route::get('/usersonline','UserController@index')->middleware('modOnMasterAdminOrGestore');

//get specs and skills for chat
Route::get('/user/skills/specs', 'UserController@skillsAndSpecs');

Route::get('/user/all','UserController@allUsers')->name('allUsers');

