<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
//logo
Route::get('/', function () {
    return view('welcome');
})->name('welcome');
//home esterna
Route::get('/welcome', function () {
    return view('welcome2');
})->name('welcome2');

Auth::routes();
//logout
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
//registrazione
Route::get('registrati/razza','Auth\RegisterController@primoStep')->name('registrati1');
Route::get('registrati/{idRazza}/emisfero','Auth\RegisterController@secondoStep')->name('registrati2');
Route::get('registrati/{idRazza}/{idEmisfero}/sesso','Auth\RegisterController@terzoStep')->name('registrati3');
Route::get('registrati/{idRazza}/{idEmisfero}/{sesso}','Auth\RegisterController@quartoStep')->name('registrati4');

Route::get('ambientazione','GuidaController@indexAmbientazione')->name('ambientazione');
Route::get('regolamento','GuidaController@indexRegolamento')->name('regolamento');



Route::get('/home', 'HomeController@index')->name('home');
