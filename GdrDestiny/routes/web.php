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


//after logging
Route::get('/home', 'HomeController@index')->name('home');

//add class by user
Route::get('/user/AddClass','UserclasseController@addClass')->name('addClass');
Route::post('/user/AddClass','UserclasseController@storeClass')->name('storeClass');

//add skills
Route::post('/user/{idUser}/StoreSkills','UserskillController@storeSkills')->name('storeSkills');
Route::get('/user/{idUser}/{skillFrom}/AddSkills','UserskillController@addSkills')->name('addSkills');

//Modify the level of skill
Route::get('/user/{idUser}/{idSkill}/UpdateSkillLevel','UserskillController@updateSkill')->name('updateSkillLevel');

//show skill
Route::get('/user/{idUser}/Abilita','SkillController@show')->name('showSkills');

//show profile
Route::get('/user/{idUser}','ChiamateAjaxController@showUser')->name('userProfile');
