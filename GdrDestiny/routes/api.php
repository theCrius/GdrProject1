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

Route::get('/user/all','UserController@allUsers')->name('allUsers');

